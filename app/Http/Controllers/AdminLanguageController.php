<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Facility;

//クライアントへレスポンスするためのクラス
// Auth
use Illuminate\Support\Facades\Auth;

// DBクラスをインポートする
use Illuminate\Support\Facades\DB;

use App\Models\Language;

class AdminLanguageController extends Controller
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
    public function showlanguage(Request $request)
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
            $items = Language::where('language_name', 'like', '%' . $s . '%')
                ->orWhere('lang_icon', 'like', '%' . $s . '%')
                ->orWhere('discription', 'like', '%' . $s . '%')
                ->orderBy('id', 'asc')
                ->get();
        } else {
            $items = Language::where('deleted_at', null)
                ->orderBy('id', 'asc')
                ->get();
        }

        // 件数
        $language_count = count($items);

        // Bladeファイルに渡すデータ（連想配列）
        $data = [
            'language_list' => $items,
            'count' => $language_count,
            'login_user' => $login_user,
            's' => $s,
        ];

        // Bladeファイルを呼び出す
        return view('cms.cms_language_list', $data);
    }

    /**
     * addlanguage function
     * 新規投稿画面を表示
     *
     * @param Request $request
     * @return void
     */
    public function newlanguage(Request $request)
    {
        // ログインユーザーの情報取得
        $login_user = Auth::user();

        // ニュースカテゴリー
        $language_items = Language::All();
        $data = [
            'login_user' => $login_user,
            'language_items' => $language_items
        ];
        return view('cms.cms_language_new', $data);
    }

    /**
     * storelanguage function
     *
     *
     * @param Request $request
     * @return void
     */
    public function storelanguage(Request $request)
    {
        // ログインユーザーの情報取得
        $login_user = Auth::user();

        // バリデーション
        $this->validate($request, Language::$rules);

        // 登録用ニュースのインスタンスを生成
        $language = new Language();

        // 入力データを取得
        $form = $request->all();

        // _tokenを入力データから無くす
        unset($form['_token']);

        // インスタンスのuser_idプロパティにログイン中のユーザーIDを代入
        $language->created_user_id = $login_user->id;
        $language->updated_user_id = $login_user->id;

        // インスタンスを保存
        $language->fill($form)->save();

        return redirect(route('indexlanguage'));

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
     * editlanguage function
     * 言語種別変更画面を表示
     *
     * @param Request $request
     * @return void
     */
    public function editlanguage(Request $request)
    {
        // ログインユーザーの情報取得
        $login_user = Auth::user();

        // idによる編集するデータを取得
        $item = Language::find($request->id);

        // ニュースカテゴリー
        $language_items = Language::All();

        // 渡すデータ
        $data = [
            'language' => $item,
            'category_items' => $language_items,
            'login_user' => $login_user,
        ];

        // ブレッドファイルを呼び出す
        return view('cms.cms_language_edit', $data);
    }

    /**
     * updatelanguage function
     * ニュース編集の登録処理
     *
     * @param Request $request
     * @return void
     */
    public function updatelanguage(Request $request)
    {
        // ログインユーザーの情報取得
        $login_user = Auth::user();

        // バリデーション
        $this->validate($request, Language::$rules);

        // 編集する元のデータを読み込む
        $language = Language::find($request->id);

        // 編集結果を取得
        $form = $request->all();

        // _tokenを削除
        unset($form['_token']);

        // 更新日時を刷新
        $language->updated_at = date("Y-m-d H:i:s");
        $language->updated_user_id = $login_user->id;

        // インスタンスに編集結果を入れ替え、保存
        $language->fill($form)->save();

        return redirect(route('indexlanguage'));

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
     * deletelanguage function
     * ニュースを削除
     *
     * @param Request $request
     * @return void
     */
    public function deletelanguage(Request $request)
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
        DB::table('languages')->where('id', $request->id)
            ->update($param);

        return redirect(route('indexlanguage'));

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
