<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cookie;

use App\Models\Score;
use App\Models\Language;

class MyscoreController extends Controller
{

    /**
     * setmyscore function
     * スコアをクッキーに保存する
     * ゲーム画面ができてないのでテスト用
     * @param Request $request
     * @return void
     */
    public function setmyscore(Request $request, Response $response)
    {
        // コース(難易度)別に各言語カテゴリーのハイスコアを表示させる(デフォルトはのんびりコース)
        // フォームから送信されたデータを取得
        $data = $request->input('data');

        // クッキーにデータを保存 (ここでは1時間の有効期限を設定しています)

        $response = response()->view('fronts.myscore', ['data' => $data]);

        $response->cookie('saved_data', $data, 60); // 60分 = 1時間

        // 保存完了メッセージを表示するなど、適宜リダイレクトやレスポンスを返す
        //return redirect()->back()->with('success', 'データがクッキーに保存されました！');

        // return view('fronts.myscoreresult', ['data' => $data]);

        return $response;
    }

    public function getmyscoreresult(Request $request)
    {
        // コース(難易度)別に各言語カテゴリーのハイスコアを表示させる(デフォルトはのんびりコース)

        return view('fronts.myscore');
    }


    /**
     * getmyscore
     * クッキーから記録を読み込んで、My Scoreに表示
     *
     * @return void
     */
    public function getmyscore(Request $request)
    {
        // 練習結果の配列
        $score_list = [];

        // レベル 初期値：1
        $level_id = 1;
        if (isset($request->level_id)) {
            $level_id = $request->level_id;
        }

        // 言語一覧を取得
        $languages = Language::where('deleted_at', null)
            ->where('is_show', 1)
            ->get();

        // すべてのクッキーを取得
        foreach ($languages as $lang) {
            // クッキー名：言語ID_レベルID
            $cookie_name = $lang->id . '_' . $level_id;

            if ($request->hasCookie($cookie_name)) {
                // 指定名で該当クッキーを取得
                $score = [
                    'name' => $lang->language_name
                ];
                $score['data'] = json_decode($request->cookie($cookie_name), true) ?? [];
                array_push($score_list, $score);
            }
        }

        $data = [
            'score_list' => $score_list,
            // 'cookie_names' => $cookie_names,
            'languages' => $languages,
            // 'levels' => $levels,
            'level_id' => $level_id,
        ];

        return view('fronts.myscore', $data);
    }
}
