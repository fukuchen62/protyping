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
        $language_id = $request->input('language_id');
        $level_id = $request->input('level_id');
        $user_id = $request->input('user_id');
        $username = $request->input('username');

        // $score = 88;
        // $language_id = 1;
        // $level_id = 1;
        // $user_id = 0;
        // $username = 'username';
        // デバッグ用にログに出力して確認
        Log::info('Score received: ' . $score);
        Log::info('Received username: ' . $username);
        // データベースに登録
        // 現状スコア以外はダミーデータを登録しておく
        $scoreModel = new Score();
        $scoreModel->language_id = $language_id;
        $scoreModel->level_id = $level_id;
        $scoreModel->user_id = $user_id;
        $scoreModel->username = $username;
        $scoreModel->score = $score;
        $scoreModel->save();

        $response = response()->json(['message' => 'Score saved successfully'], 200);

        // クッキーに値を保存する
        switch ($scoreModel->language_id) {
            case '1':
                if ($scoreModel->level_id == 1) {
                    // ゆっくりコース
                    // 現在のクッキーを取得
                    $savedData1 = json_decode($request->cookie('saved_data1'), true) ?? [];

                    // 既存のベスト3の値を取得
                    $bestScores = isset($savedData1['best_scores']) ? $savedData1['best_scores'] : [];

                    // ベスト3の値を更新
                    array_push($bestScores, $score);
                    rsort($bestScores); // 値を降順にソート

                    if (count($bestScores) > 3) {
                        array_pop($bestScores); // 要素が3つを超える場合、最小値を削除
                    }

                    // 更新されたベスト3の値をセット
                    $savedData1['best_scores'] = $bestScores;
                    $response->withCookie(cookie('saved_data1', json_encode($savedData1), 600));
                    // $response->cookie('saved_data1', $score, 600); // 60分 = 1時間
                } elseif ($scoreModel->level_id == 2) {
                    // ダッシュコース
                    $response->cookie('saved_data7', $score, 600); // 60分 = 1時間
                } else {
                    // ゆっくりコース
                    $response->cookie('saved_data1', $score, 600); // 60分 = 1時間
                }
                break;
            case '2':
                if ($scoreModel->level_id == 1) {
                    // ゆっくりコース
                    $response->cookie('saved_data2', $score, 600); // 60分 = 1時間
                } elseif ($scoreModel->level_id == 2) {
                    // ダッシュコース
                    $response->cookie('saved_data8', $score, 600); // 60分 = 1時間
                } else {
                    // ゆっくりコース
                    $response->cookie('saved_data2', $score, 600); // 60分 = 1時間
                }
                break;
            case '3':
                if ($scoreModel->level_id == 1) {
                    // ゆっくりコース
                    $response->cookie('saved_data3', $score, 600); // 60分 = 1時間
                } elseif ($scoreModel->level_id == 2) {
                    // ダッシュコース
                    $response->cookie('saved_data9', $score, 600); // 60分 = 1時間
                } else {
                    // ゆっくりコース
                    $response->cookie('saved_data3', $score, 600); // 60分 = 1時間
                }
                break;
            case '4':
                if ($scoreModel->level_id == 1) {
                    // ゆっくりコース
                    $response->cookie('saved_data4', $score, 600); // 60分 = 1時間
                } elseif ($scoreModel->level_id == 2) {
                    // ダッシュコース
                    $response->cookie('saved_data10', $score, 600); // 60分 = 1時間
                } else {
                    // ゆっくりコース
                    $response->cookie('saved_data4', $score, 600); // 60分 = 1時間
                }
                break;
            case '5':
                if ($scoreModel->level_id == 1) {
                    // ゆっくりコース
                    $response->cookie('saved_data5', $score, 600); // 60分 = 1時間
                } elseif ($scoreModel->level_id == 2) {
                    // ダッシュコース
                    $response->cookie('saved_data11', $score, 600); // 60分 = 1時間
                } else {
                    // ゆっくりコース
                    $response->cookie('saved_data5', $score, 600); // 60分 = 1時間
                }
                break;
            case '6':
                if ($scoreModel->level_id == 1) {
                    // ゆっくりコース
                    $response->cookie('saved_data6', $score, 600); // 60分 = 1時間
                } elseif ($scoreModel->level_id == 2) {
                    // ダッシュコース
                    $response->cookie('saved_data12', $score, 600); // 60分 = 1時間
                } else {
                    // ゆっくりコース
                    $response->cookie('saved_data6', $score, 600); // 60分 = 1時間
                }
                break;
            default:
                if ($scoreModel->level_id == 1) {
                    // ゆっくりコース
                    $response->cookie('saved_data1', $score, 600); // 60分 = 1時間
                } elseif ($scoreModel->level_id == 2) {
                    // ダッシュコース
                    $response->cookie('saved_data7', $score, 600); // 60分 = 1時間
                } else {
                    // ゆっくりコース
                    $response->cookie('saved_data1', $score, 600); // 60分 = 1時間
                }
                break;
        }

        // $score1 = 0;
        // $score2 = 0;
        // $score3 = 0;

        // // 複数の値を配列として保存する
        // $data = [
        //     'score1' => $score1,
        //     'score2' => $score2,
        //     'score3' => $score3,
        // ];

        // // 言語ごとに前回の値と比べて何位に保存するか決める
        // switch ($language_id) {
        //     case '1':
        //         if ((request()->hasCookie('saved_data1')) == true) {;
        //             if ('score1' < $score) {
        //                 $data['score1'] = $score;
        //                 $response->cookie('saved_data1', $data['score1'], 600);
        //             } elseif ('score2' < $score) {
        //                 $data['score2'] = $score;
        //                 $response->cookie('saved_data1', $data['score2'], 600);
        //             } elseif ('score3' < $score) {
        //                 $data['score3'] = $score;
        //                 $response->cookie('saved_data1', $data['score3'], 600);
        //             }
        //         }
        //         break;
        //     case '2':
        //         if ((request()->hasCookie('saved_data2')) == true) {;
        //         }
        //         break;
        //     default:
        //         # code...
        //         break;
        // }

        // 必要な場合はレスポンスを返す
        return $response;
    }
}
