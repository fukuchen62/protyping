<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Score;
use App\Models\Level;
use App\Models\Vocabulary;
use App\Models\Language;
use App\Models\Game;

class TypinggameController extends Controller
{

    /**
     * gamestart function
     * ゲーム画面を表示する
     * @param Request $request
     * @return void
     */
    public function gamestart(Request $request, $language = null, $level = null)
    {
        // モデルからデータを取得
        $items = Vocabulary::all();
        $data = [
            'param' => '',
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

        // リクエストから得点とプレイヤー名を取得
        $score = $request->input('score');
        // $playerName = $request->input('player_name');

        // データベースに登録
        $scoreModel = new Score();
        $scoreModel->score = $score;
        $scoreModel->save();

        // 必要な場合はレスポンスを返す
        return response()->json(['message' => 'Score saved successfully']);
    }
}
