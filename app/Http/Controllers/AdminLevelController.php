<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Facility;

//クライアントへレスポンスするためのクラス
// Auth
use Illuminate\Support\Facades\Auth;

// DBクラスをインポートする
use Illuminate\Support\Facades\DB;

use App\Models\Level;

class AdminLevelController extends Controller
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
    public function showlevel(Request $request)
    {
        // ログインユーザーの情報取得
        $login_user = Auth::user();

        // 検索条件を取得
        $s = "";
        if (isset($request->s)) {
            $s = $request->s;
        }
        // 言語を読み込む
        if (
            $s != ''
        ) {
            $items = Level::where('level', 'like', '%' . $s . '%')
                ->get();
        } else {
            // レベルをすべて取得
            $items = Level::all();
        }

        // 件数
        $level_count = count($items);

        // Bladeファイルに渡すデータ（連想配列）
        $data = [
            'level_list' => $items,
            'count' => $level_count,
            'login_user' => $login_user,
            's' => $s,
        ];

        // Bladeファイルを呼び出す
        return view('cms.cms_level_list', $data);
    }

    /**
     * addlevel function
     * 新規投稿画面を表示
     *
     * @param Request $request
     * @return void
     */
    public function newlevel(Request $request)
    {
        // ログインユーザーの情報取得
        $login_user = Auth::user();

        // ニュースカテゴリー
        $level_items = Level::All();
        $data = [
            'login_user' => $login_user,
            'level_items' => $level_items
        ];
        return view('cms.cms_level_new', $data);
    }

    /**
     * storelevel function
     *
     *
     * @param Request $request
     * @return void
     */
    public function storelevel(Request $request)
    {
        // ログインユーザーの情報取得
        $login_user = Auth::user();

        // バリデーション
        $this->validate($request, Level::$rules);

        // 登録用ニュースのインスタンスを生成
        $level = new Level();

        // 入力データを取得
        $form = $request->all();

        // _tokenを入力データから無くす
        unset($form['_token']);

        // インスタンスのuser_idプロパティにログイン中のユーザーIDを代入
        $level->created_user_id = $login_user->id;
        $level->updated_user_id = $login_user->id;

        // インスタンスを保存
        $level->fill($form)->save();

        return redirect(route('indexlevel'));

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
     * editlevel function
     * 言語種別変更画面を表示
     *
     * @param Request $request
     * @return void
     */
    public function editlevel(Request $request)
    {
        // ログインユーザーの情報取得
        $login_user = Auth::user();

        // idによる編集するデータを取得
        $item = Level::find($request->id);

        // スコアカテゴリー
        $level_items = Level::All();

        // 渡すデータ
        $data = [
            'level' => $item,
            'category_items' => $level_items,
            'login_user' => $login_user,
        ];

        // ブレッドファイルを呼び出す
        return view('cms.cms_level_edit', $data);
    }

    /**
     * updatelevel function
     * スコア編集の登録処理
     *
     * @param Request $request
     * @return void
     */
    public function updatelevel(Request $request)
    {
        // ログインユーザーの情報取得
        $login_user = Auth::user();

        // バリデーション
        $this->validate($request, Level::$rules);

        // 編集する元のデータを読み込む
        $level = Level::find($request->id);

        // 編集結果を取得
        $form = $request->all();

        // _tokenを削除
        unset($form['_token']);

        // 更新日時を刷新
        // $score->updated_at = date("Y-m-d H:i:s");
        // $score->updated_user_id = $login_user->id;

        // インスタンスに編集結果を入れ替え、保存
        $level->fill($form)->save();

        return redirect(route('indexlevel'));

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
     * deletelevel function
     * スコアを削除
     *
     * @param Request $request
     * @return void
     */
    public function deletelevel(Request $request)
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
        DB::table('level')->where('id', $request->id)
            ->update($param);

        return redirect(route('indexlevel'));

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
