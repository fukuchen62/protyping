<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Facility;

//クライアントへレスポンスするためのクラス
// Auth
use Illuminate\Support\Facades\Auth;

// DBクラスをインポートする
use Illuminate\Support\Facades\DB;

use App\Models\Score;

class AdminScoreController extends Controller
{
    /**
     * コンストラクタ
     */
    public function __construct()
    {
        // ログインチェック
        $this->middleware('auth');
    }

    /**
     * index function
     * 言語の一覧ページ
     *
     * @return void
     */
    public function showscore(Request $request)
    {
        // ログインユーザーの情報取得
        $login_user = Auth::user();

        // 検索条件を取得
        $s = "";
        if (isset($request->s)) {
            $s = $request->s;
        }

        // 言語を読み込む
        if ($s != '') {
            $items = Score::where('language_id', 'like', '%' . $s . '%')
                ->orWhere('level_id', 'like', '%' . $s . '%')
                ->orWhere('user_id', 'like', '%' . $s . '%')
                ->orWhere('username', 'like', '%' . $s . '%')
                ->orWhere('score', 'like', '%' . $s . '%')
                ->get();
        } else {
            // $items = Score::where('deleted_at', null)
            //     ->orderBy('id', 'desc')
            //     ->get();
            $items = Score::all();
        }

        // 件数
        $score_count = count($items);

        // Bladeファイルに渡すデータ（連想配列）
        $data = [
            'score_list' => $items,
            'count' => $score_count,
            'login_user' => $login_user,
            's' => $s,
        ];

        // Bladeファイルを呼び出す
        return view('cms.cms_score_list', $data);
    }

    /**
     * addscore function
     * 新規投稿画面を表示
     *
     * @param Request $request
     * @return void
     */
    public function newscore(Request $request)
    {
        // ログインユーザーの情報取得
        $login_user = Auth::user();

        // ニュースカテゴリー
        $score_items = Score::All();
        $data = [
            'login_user' => $login_user,
            'score_items' => $score_items
        ];
        return view('cms.cms_score_new', $data);
    }

    /**
     * storescore function
     *
     *
     * @param Request $request
     * @return void
     */
    public function storescore(Request $request)
    {
        // ログインユーザーの情報取得
        $login_user = Auth::user();

        // バリデーション
        $this->validate($request, Score::$rules);

        // 登録用ニュースのインスタンスを生成
        $score = new Score();

        // 入力データを取得
        $form = $request->all();

        // _tokenを入力データから無くす
        unset($form['_token']);

        // インスタンスのuser_idプロパティにログイン中のユーザーIDを代入
        $score->created_user_id = $login_user->id;
        $score->updated_user_id = $login_user->id;

        // インスタンスを保存
        $score->fill($form)->save();

        return redirect(route('indexscore'));

        // // ニュースを読み込む
        // $items = News::where('deleted_at', null)
        //     ->orderBy('id', 'desc')
        //     ->get();

        // // ニュースの件数
        // $news_count = count($items);

        // // 渡すデータ
        // $data = [
        //     'news_list' => $items,
        //     'count' => $news_count,
        //     'login_user' => $login_user,
        // ];

        // // ブレッドファイルを読み込む
        // return view('cms.cms_news_list', $data);
    }

    /**
     * editscore function
     * 言語種別変更画面を表示
     *
     * @param Request $request
     * @return void
     */
    public function editscore(Request $request)
    {
        // ログインユーザーの情報取得
        $login_user = Auth::user();

        // idによる編集するデータを取得
        $item = Score::find($request->id);

        // スコアカテゴリー
        $score_items = Score::All();

        // 渡すデータ
        $data = [
            'score' => $item,
            'category_items' => $score_items,
            'login_user' => $login_user,
        ];

        // ブレッドファイルを呼び出す
        return view('cms.cms_score_edit', $data);
    }

    /**
     * updatescore function
     * スコア編集の登録処理
     *
     * @param Request $request
     * @return void
     */
    public function updatescore(Request $request)
    {
        // ログインユーザーの情報取得
        $login_user = Auth::user();

        // バリデーション
        $this->validate($request, Score::$rules);

        // 編集する元のデータを読み込む
        $score = Score::find($request->id);

        // 編集結果を取得
        $form = $request->all();

        // _tokenを削除
        unset($form['_token']);

        // 更新日時を刷新
        // $score->updated_at = date("Y-m-d H:i:s");
        // $score->updated_user_id = $login_user->id;

        // インスタンスに編集結果を入れ替え、保存
        $score->fill($form)->save();

        return redirect(route('indexscore'));

        // // ニュースを読み直す
        // $items = News::where('deleted_at', null)
        //     ->orderBy('id', 'desc')
        //     ->get();

        // // ニュースの件数
        // $news_count = count($items);

        // // 渡すデータ
        // $data = [
        //     'news_list' => $items,
        //     'count' => $news_count,
        //     'login_user' => $login_user,
        // ];

        // // ブレッドファイルを呼び出す
        // return view('cms.cms_news_list', $data);
    }

    /**
     * deletescore function
     * スコアを削除
     *
     * @param Request $request
     * @return void
     */
    public function deletescore(Request $request)
    {
        // ログインユーザーの情報取得
        $login_user = Auth::user();

        // News::find($request->id)->delete();

        // 論理削除処理
        // deleted_atフィル―ドに現在の日時を代入
        $param = [
            'deleted_at' => date("Y-m-d H:i:s"),
        ];

        // DBクリエターで更新処理
        DB::table('scores')->where('id', $request->id)
            ->update($param);

        return redirect(route('indexscore'));

        // // ニュースを読み直す
        // $items = News::where('deleted_at', null)
        //     ->orderBy('id', 'desc')
        //     ->get();

        // // ニュースの件数
        // $news_count = count($items);

        // // 渡すデータ
        // $data = [
        //     'news_list' => $items,
        //     'count' => $news_count,
        //     'login_user' => $login_user,
        // ];

        // return view('cms.cms_news_list', $data);
    }
}
