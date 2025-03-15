<?php

namespace App\Http\Controllers\Core;

use App\Http\Controllers\Controller;
use App\Models\SmaGoal;
use App\Models\SmaImgSub;
use App\Models\SmaQuestion;
use App\Models\SmaQuiz;
use App\Models\SmaSubject;
use App\Models\SmaSubSubject;
use Illuminate\Http\Request;

class SmaController extends Controller
{
    public function goal()
    {
        $data = SmaGoal::where('is_active', 1)->first();
        return view('pages.sma.goal', compact('data'));
    }

    public function subject()
    {
        $datas = SmaSubject::with('smaSubSubjects')->where('is_active', 1)->get();
        return view('pages.sma.subject.index', compact('datas'));
    }

    public function subjectDetail($id)
    {
        $data = SmaSubSubject::where('id', $id)
            ->select('sma_subject_id', 'name', 'content')
            ->first();

        $dataImages = SmaImgSub::where('sma_sub_subject_id', $id)->get();

        return view('pages.sma.subject.detail', compact('data', 'dataImages'));
    }

    public function gallery()
    {
        $datas = SmaImgSub::all();
        return view('pages.sma.gallery', compact('datas'));
    }

    public function quiz()
    {
        // $user = Auth::user(); // Ambil user yang login
        // $idUser = SdUser::where('external_id', $user->id)->first();

        $datas = SmaQuiz::where('is_active', 1)
            ->where(function ($query) {
                $query->where('start_date', '<=', now())
                    ->orWhereNull('start_date'); // Tambahkan kondisi ini
            })
            ->where(function ($query) {
                $query->where('end_date', '>=', now())
                    ->orWhereNull('end_date');
            })
            ->get();

        // $datas->map(function ($quiz) use ($idUser) {
        //     $quiz->done = SdResult::where('sd_user_id', $idUser->id)
        //         ->where('sd_quiz_id', $quiz->id)
        //         ->exists();
        //     return $quiz;
        // });


        return view('pages.sma.quiz.index', compact('datas'));
    }

    public function questions($id)
    {
        $datas = SmaQuestion::where('sma_quiz_id', $id)
            ->select('id', 'name', 'a', 'b', 'c', 'd')
            ->get();

        $title = SmaQuiz::where('id', $id)
            ->select('id', 'name')
            ->first();

        return view('pages.sma.quiz.detail', compact('datas', 'title'));
    }
}
