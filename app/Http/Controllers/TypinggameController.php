<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Score;
use App\Models\Level;
use App\Models\Vocabulary;
use App\Models\Language;
use App\Models\Game;

use Illuminate\Support\Facades\Log;

class TypinggameController extends Controller
{

    /**
     * gamestart function
     * ゲーム画面を表示する
     * @param Request $request
     * @return void
     */
    public function gamestart(Request $request)
    {
        // ゲーム条件を取得
        $s1 = $request->input('language');
        $s2 = $request->input('level');

        // ゲーム条件に応じてデータを取得する
        if ($s1) {
            // HTML
            if ($s2 == 1) {
                // ゆっくりコース
                $items = Vocabulary::where('language_id', $s1)
                    ->Where('level_id', $s2)
                    ->get();
            } elseif ($s2 == 2) {
                // ダッシュコース
                $items = Vocabulary::where('language_id', $s1)
                    ->Where('level_id', $s2)
                    ->get();
            } else {
                // 不明な値の場合はデフォルト(HTMLののんびりコース)設定にする
                $items = Vocabulary::where('language_id', 1)
                    ->Where('level_id', 1)
                    ->get();
            }
        } else {
            // 指定がない場合はデフォルト(HTMLののんびりコース)設定にする
            $items = Vocabulary::where('language_id', 1)
                ->Where('level_id', 1)
                ->get();
        }

        $data = [
            'language' => $s1,
            'level' => $s2,
            'items' => $items,
        ];

        // ゲーム画面を表示する
        return view('fronts.games_typing', $data);
    }

    /**
     * gameresult function
     * ゲーム終了後にスコアを保存する場合に
     * @param Request $request
     * @return void
     */
    public function gameresult(Request $request)
    {
        // ゲーム結果(スコア)の送信(ランキング作成のため)
        $score = $request->input('score');

        // デバッグ用にログに出力して確認
        Log::info('Score received: ' . $score);

        // データベースに登録
        // 現状スコア以外はダミーデータを登録しておく
        $scoreModel = new Score();
        $scoreModel->language_id = 1;
        $scoreModel->level_id = 1;
        $scoreModel->user_id = 999;
        $scoreModel->username = "test";
        $scoreModel->score = $score;
        $scoreModel->save();

        // 必要な場合はレスポンスを返す
        return response()->json(['message' => 'Score saved successfully'], 200);
    }
}
