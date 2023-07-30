<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cookie;

class MyscoreController extends Controller
{
    /**
     * getmyscore function
     * コース(難易度)別に各言語カテゴリーのハイスコアを表示させる
     * @param Request $request
     * @return void
     */
    public function getmyscore(Request $request)
    {
        // コース(難易度)別に各言語カテゴリーのハイスコアを表示させる(デフォルトはのんびりコース)

        return view('fronts.myscore');
    }

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
}
