<?php

namespace App\Http\Controllers\Core;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Goal;
use App\Models\ImgSub;
use App\Models\Question;
use App\Models\Quiz;
use App\Models\SmpGoal;
use App\Models\SmpImgSub;
use App\Models\SmpQuestion;
use App\Models\SmpQuiz;
use App\Models\SmpResult;
use App\Models\SmpSubject;
use App\Models\SmpSubSubject;
use App\Models\SmpUser;
use App\Models\Subject;
use App\Models\SubSubject;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class SmpCoreController extends Controller
{
    public function goal()
    {
        $data = SmpGoal::where('is_active', 1)->first();
        return view('pages.smp.goal', compact('data'));
    }

    public function subject()
    {
        $datas = SmpSubject::where('is_active', 1)->get();
        return view('pages.smp.subject.subject', compact('datas'));
    }

    public function subjectDetail($id)
    {
        $datas = SmpSubSubject::where('smp_subject_id', $id)->get();

        return view('pages.smp.subject.detail', compact('datas'));
    }

    public function SubSubjectDetail($id)
    {
        $data = SmpSubSubject::where('id', $id)
            ->select('smp_subject_id', 'name', 'content')
            ->first();

        $dataImages = SmpImgSub::where('smp_sub_subject_id', $id)->get();

        return view('pages.smp.subject.detailSubject', compact('data', 'dataImages'));
    }

    public function quiz()
    {
        $user = Auth::user(); // Ambil user yang login
        $idUser = SmpUser::where('external_id', $user->id)->first();

        $datas = SmpQuiz::where('is_active', 1)
            ->where(function ($query) {
                $query->where('start_date', '<=', now())
                    ->orWhereNull('start_date'); // Tambahkan kondisi ini
            })
            ->where(function ($query) {
                $query->where('end_date', '>=', now())
                    ->orWhereNull('end_date');
            })
            ->get();

        $datas->map(function ($quiz) use ($idUser) {
            $quiz->done = SmpResult::where('smp_user_id', $idUser->id)
                ->where('smp_quiz_id', $quiz->id)
                ->exists();
            return $quiz;
        });


        return view('pages.smp.quiz.quiz', compact('datas'));
    }

    public function questions($id)
    {
        $datas = SmpQuestion::where('smp_quiz_id', $id)
            ->select('id', 'name', 'a', 'b', 'c', 'd')
            ->get();

        $title = SmpQuiz::where('id', $id)
            ->select('id', 'name')
            ->first();

        // dd($title, $datas);

        return view('pages.smp.quiz.question', compact('datas', 'title'));
    }

    public function gallery()
    {
        $datas = SmpImgSub::all();
        return view('pages.smp.gallery', compact('datas'));
    }

    public function updateProfile(Request $request)
    {
        // Validasi input
        $data = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
        ]);

        if ($data->fails()) {
            return back()->withErrors($data->errors());
        }

        // Ambil user yang sedang login
        $user = Auth::user();

        // Update di tabel smpUser jika ada
        $smpUser = SmpUser::where('external_id', $user->id)->first();
        if ($smpUser) {
            $smpUser->update([
                'name' => $request->name,
                'email' => $request->email,
            ]);
        }

        // Update di tabel Users
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        return redirect()->route('profile.smp')->with('success', 'Profile updated successfully!');
    }
}
