<?php

namespace App\Http\Controllers\Logic;

use App\Http\Controllers\Controller;
use App\Models\SdQuestion;
use App\Models\SdQuiz;
use App\Models\SdResult;
use App\Models\SdScore;
use App\Models\SdUser;
use App\Models\SmaQuestion;
use App\Models\SmaQuiz;
use App\Models\SmaResult;
use App\Models\SmaScore;
use App\Models\SmaUser;
use App\Models\SmpQuestion;
use App\Models\SmpQuiz;
use App\Models\SmpResult;
use App\Models\SmpScore;
use App\Models\SmpUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuizController extends Controller
{
    public function submitQuiz(Request $request, $quizId)
    {
        $user = Auth::user();
        $idUser = SdUser::where('external_id', $user->id)->first();

        if (!$idUser) {
            return redirect()->route('profile.sd')->with('error', 'User tidak ditemukan.');
        }

        $quiz = SdQuiz::find($quizId);
        if (!$quiz) {
            return redirect()->route('profile.sd')->with('error', 'Quiz tidak ditemukan.');
        }


        $answers = $request->input('answer', []);
        $totalQuestions = count($answers);
        $correctCount = 0;
        // dd($quiz, $idUser, $request->all());
        foreach ($answers as $questionId => $userAnswer) {
            $question = SdQuestion::find($questionId);

            if (!$question) {
                continue;
            }

            $isCorrect = (strcasecmp($question->answer, $userAnswer) === 0) ? 1 : 0;
            // dd($question->answer,$userAnswer, $isCorrect);
            SdResult::create([
                'sd_user_id' => $idUser->id,
                'sd_quiz_id' => $quizId,
                'sd_question_id' => $questionId,
                'answer' => $userAnswer,
                'is_correct' => $isCorrect,
            ]);

            if ($isCorrect) {
                $correctCount++;
            }
        }

        // Hitung skor
        $score = ($totalQuestions > 0) ? ($correctCount / $totalQuestions) * 100 : 0;

        SdScore::updateOrCreate(
            [
                'sd_user_id' => $idUser->id,
                'sd_quiz_id' => $quizId,
            ],
            ['score' => $score]
        );

        return redirect()->route('profile.sd')->with('success', 'Quiz berhasil dikumpulkan! Skor Anda: ' . $score);
    }

    public function smpSubmitQuiz(Request $request, $quizId)
    {
        $user = Auth::user();
        $idUser = SmpUser::where('external_id', $user->id)->first();

        if (!$idUser) {
            return redirect()->route('profile.smp')->with('error', 'User tidak ditemukan.');
        }

        $quiz = SmpQuiz::find($quizId);
        if (!$quiz) {
            return redirect()->route('profile.smp')->with('error', 'Quiz tidak ditemukan.');
        }


        $answers = $request->input('answer', []);
        $totalQuestions = count($answers);
        $correctCount = 0;
        // dd($quiz, $idUser, $request->all());
        foreach ($answers as $questionId => $userAnswer) {
            $question = SmpQuestion::find($questionId);

            if (!$question) {
                continue;
            }

            $isCorrect = (strcasecmp($question->answer, $userAnswer) === 0) ? 1 : 0;
            // dd($question->answer,$userAnswer, $isCorrect);
            SmpResult::create([
                'smp_user_id' => $idUser->id,
                'smp_quiz_id' => $quizId,
                'smp_question_id' => $questionId,
                'answer' => $userAnswer,
                'is_correct' => $isCorrect,
            ]);

            if ($isCorrect) {
                $correctCount++;
            }
        }

        // Hitung skor
        $score = ($totalQuestions > 0) ? ($correctCount / $totalQuestions) * 100 : 0;

        SmpScore::updateOrCreate(
            [
                'smp_user_id' => $idUser->id,
                'smp_quiz_id' => $quizId,
            ],
            ['score' => $score]
        );

        return redirect()->route('profile.smp')->with('success', 'Quiz berhasil dikumpulkan! Skor Anda: ' . $score);
    }

    public function smaSubmitQuiz(Request $request, $quizId)
    {
        $user = Auth::user();
        $idUser = SmaUser::where('external_id', $user->id)->first();

        if (!$idUser) {
            return redirect()->route('quiz.sma')->with('error', 'User tidak ditemukan.');
        }

        $quiz = SmaQuiz::find($quizId);
        if (!$quiz) {
            return redirect()->route('quiz.sma')->with('error', 'Quiz tidak ditemukan.');
        }


        $answers = $request->input('answer', []);
        $totalQuestions = count($answers);
        $correctCount = 0;
        // dd($quiz, $idUser, $request->all());
        foreach ($answers as $questionId => $userAnswer) {
            $question = SmaQuestion::find($questionId);

            if (!$question) {
                continue;
            }

            $isCorrect = (strcasecmp($question->answer, $userAnswer) === 0) ? 1 : 0;
            // dd($question->answer,$userAnswer, $isCorrect);
            SmaResult::create([
                'sma_user_id' => $idUser->id,
                'sma_quiz_id' => $quizId,
                'sma_question_id' => $questionId,
                'answer' => $userAnswer,
                'is_correct' => $isCorrect,
            ]);

            if ($isCorrect) {
                $correctCount++;
            }
        }

        // Hitung skor
        $score = ($totalQuestions > 0) ? ($correctCount / $totalQuestions) * 100 : 0;

        SmaScore::updateOrCreate(
            [
                'sma_user_id' => $idUser->id,
                'sma_quiz_id' => $quizId,
            ],
            ['score' => $score]
        );

        return redirect()->route('quiz.sma')->with('success', 'Quiz berhasil dikumpulkan! Skor Anda: ' . $score);
    }
}
