<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cookie;

use App\Models\Score;

class MyscoreController extends Controller
{
    // /**
    //  * getmyscore function
    //  * コース(難易度)別に各言語カテゴリーのハイスコアを表示させる
    //  * @param Request $request
    //  * @return void
    //  */
    // public function getmyscore(Request $request)
    // {
    //     // コース(難易度)別に各言語カテゴリーのハイスコアを表示させる(デフォルトはのんびりコース)

    //     return view('fronts.myscore');
    // }

    // /**
    //  * setmyscore function
    //  * スコアをクッキーに保存する
    //  * ゲーム画面ができてないのでテスト用
    //  * @param Request $request
    //  * @return void
    //  */
    // public function setmyscore(Request $request, Response $response)
    // {
    //     // コース(難易度)別に各言語カテゴリーのハイスコアを表示させる(デフォルトはのんびりコース)
    //     // フォームから送信されたデータを取得
    //     $data = $request->input('data');

    //     // クッキーにデータを保存 (ここでは1時間の有効期限を設定しています)

    //     $response = response()->view('fronts.myscore', ['data' => $data]);

    //     $response->cookie('saved_data', $data, 60); // 60分 = 1時間

    //     // 保存完了メッセージを表示するなど、適宜リダイレクトやレスポンスを返す
    //     //return redirect()->back()->with('success', 'データがクッキーに保存されました！');

    //     // return view('fronts.myscoreresult', ['data' => $data]);

    //     return $response;
    // }

    // public function getmyscoreresult(Request $request)
    // {
    //     // コース(難易度)別に各言語カテゴリーのハイスコアを表示させる(デフォルトはのんびりコース)

    //     return view('fronts.myscore');
    // }

    /**
     * setmyscore
     * お気に入りをクッキーに書き込み
     *
     * @return void
     */
    public function setmyscore(Request $request)
    {
        // ゲームフォームから送信されたデータを取得
        if ($request->input('data') != null) {
            $data = $request->input('data');

            // 連想配列からそれぞれのデータを取り出して、変数に代入
            $language_id = $data['language_id'];
            $level_id = $data['level_id'];
            $user_id = $data['user_id'];
            $username = $data['username'];
            $score = $data['score'];

            // ゲーム結果(スコア)の送信(ランキング作成のため)
            $score = $request->input('score');
            $language_id = $request->input('language_id');
            $level_id = $request->input('level_id');
            $user_id = $request->input('user_id');
            $username = $request->input('username');

            // cookieがすでにあったら、
            if ($request->hasCookie('myscore')) {
                $score_list = $request->cookie('myscore');

                // 配列に変換
                $station_array = explode(',', $station_list);
            }
        } else {
        }





        if ($request->id != "") {

            // cookieがすでにあったら、
            if ($request->hasCookie('id')) {
                $input1 = $request->id;

                $station_list = $request->cookie('id');

                // 配列に変換
                $station_array = explode(',', $station_list);

                // foreachで完全一致かどうか見る
                $flag_delete = 0;
                foreach ($station_array as $key => $value) {


                    // お気に入りリストから該当IDを外す
                    if ($value == $input1) {
                        array_splice($station_array, $key, 1);
                        $flag_delete = 1;
                    }
                }

                // 新規追加の場合は、
                if ($flag_delete == 0) {
                    array_push($station_array, $input1);
                }

                // 配列から文字列に変換
                $station_id = implode(',', $station_array);
            } else {
                $station_id .= $request->id;
            }

            $data = [
                'id' => $request->id,
                'url' => 'roadstation',
            ];

            $response = response()->view('fronts.cookie_save', $data);

            // １年保存
            $response->cookie('id', $station_id, 525600);

            return $response;
        }
    }


    /**
     * getmyscore
     * お気に入りを読み込んで、My Scoreに表示
     *
     * @return void
     */
    public function getmyscore(Request $request)
    {
        $station_list = null;

        if ($request->hasCookie('id')) {

            $station_id = explode(',', $request->cookie('id'));

            foreach ($station_id as $id) {
                if ($id != 0) {
                    $station = RoadStation::find($id);
                    // 道の駅idを配列に加える
                    $station_list[] = $station;
                }
            }
        }

        $data = [
            'stations' => $station_list,
        ];

        return view('fronts.myscore', $data);
    }
}
