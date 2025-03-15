<?php

namespace App\Http\Controllers\Core;

use App\Http\Controllers\Controller;
use App\Models\Goal;
use App\Models\ImgSub;
use App\Models\Question;
use App\Models\Quiz;
use App\Models\SdGoal;
use App\Models\SdImgSub;
use App\Models\SdQuestion;
use App\Models\SdQuiz;
use App\Models\SdResult;
use App\Models\SdSubject;
use App\Models\SdSubSubject;
use App\Models\SdUser;
use App\Models\Subject;
use App\Models\SubSubject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class CoreController extends Controller
{
    public function goal()
    {
        $data = SdGoal::where('is_active', 1)->first();
        return view('pages.sd.goal', compact('data'));
    }

    public function subject()
    {
        $datas = SdSubject::where('is_active', 1)->get();
        return view('pages.sd.subject.subject', compact('datas'));
    }

    public function subjectDetail($id)
    {
        $datas = SdSubSubject::where('sd_subject_id', $id)->get();

        return view('pages.sd.subject.detail', compact('datas'));
    }

    public function SubSubjectDetail($id)
    {
        $data = SdSubSubject::where('id', $id)
            ->select('sd_subject_id', 'name', 'content')
            ->first();

        $dataImages = SdImgSub::where('sd_sub_subject_id', $id)->get();

        return view('pages.sd.subject.detailSubject', compact('data', 'dataImages'));
    }

    public function quiz()
    {
        $user = Auth::user(); // Ambil user yang login
        $idUser = SdUser::where('external_id', $user->id)->first();

        $datas = SdQuiz::where('is_active', 1)
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
            $quiz->done = SdResult::where('sd_user_id', $idUser->id)
                ->where('sd_quiz_id', $quiz->id)
                ->exists();
            return $quiz;
        });


        return view('pages.sd.quiz.quiz', compact('datas'));
    }

    public function questions($id)
    {
        $datas = SdQuestion::where('sd_quiz_id', $id)
            ->select('id', 'name', 'a', 'b', 'c', 'd')
            ->get();

        $title = SdQuiz::where('id', $id)
            ->select('id', 'name')
            ->first();

        return view('pages.sd.quiz.question', compact('datas', 'title'));
    }

    public function gallery()
    {
        $datas = SdImgSub::all();
        return view('pages.sd.gallery', compact('datas'));
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

        // Update di tabel SdUser jika ada
        $sdUser = SdUser::where('external_id', $user->id)->first();
        if ($sdUser) {
            $sdUser->update([
                'name' => $request->name,
                'email' => $request->email,
            ]);
        }

        // Update di tabel Users
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        return redirect()->route('profile.sd')->with('success', 'Profile updated successfully!');
    }
}
