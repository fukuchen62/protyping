<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Facility;

//クライアントへレスポンスするためのクラス
// Auth
use Illuminate\Support\Facades\Auth;

// DBクラスをインポートする
use Illuminate\Support\Facades\DB;

use App\Models\Knowhow;
use App\Models\PostCategory;

class AdminKnowhowController extends Controller
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
     * 知っトク情報の一覧ページ
     *
     * @return void
     */
    public function showknowhow(Request $request)
    {
        // ログインユーザーの情報取得
        $login_user = Auth::user();

        // 検索条件を取得
        $s = "";
        if (isset($request->s)) {
            $s = $request->s;
        }

        // 知っトク情報を読み込む
        if ($s != '') {
            $items = Knowhow::where('title', 'like', '%' . $s . '%')
                ->orWhere('summary', 'like', '%' . $s . '%')
                ->orWhere('content', 'like', '%' . $s . '%')
                ->orderBy('created_at', 'desc')
                ->get();
        } else {
            $items = Knowhow::where('deleted_at', null)
                ->orderBy('created_at', 'desc')
                ->get();
        }

        // 件数
        $knowhow_count = count($items);

        // Bladeファイルに渡すデータ（連想配列）
        $data = [
            'knowhow_list' => $items,
            'count' => $knowhow_count,
            'login_user' => $login_user,
            's' => $s,
        ];

        // Bladeファイルを呼び出す
        return view('cms.cms_knowhow_list', $data);
    }

    /**
     * newknowhow function
     * 新規投稿画面を表示
     *
     * @param Request $request
     * @return void
     */
    public function newknowhow(Request $request)
    {
        // ログインユーザーの情報取得
        $login_user = Auth::user();

        // 知っトク情報カテゴリー
        $category_items = PostCategory::All();
        $data = [
            'login_user' => $login_user,
            'category_items' => $category_items
        ];
        return view('cms.cms_knowhow_new', $data);
    }

    /**
     * storeknowhow function
     * 知っトク情報投稿処理
     *
     * @param Request $request
     * @return void
     */
    public function storeknowhow(Request $request)
    {
        // ログインユーザーの情報取得
        $login_user = Auth::user();

        // バリデーション
        $this->validate($request, Knowhow::$rules);

        // 登録用知っトク情報のインスタンスを生成
        $knowhow = new Knowhow();

        // 入力データを取得
        $form = $request->all();

        // _tokenを入力データから無くす
        unset($form['_token']);

        // インスタンスのuser_idプロパティにログイン中のユーザーIDを代入
        $knowhow->created_user_id = $login_user->id;
        $knowhow->updated_user_id = $login_user->id;

        // インスタンスを保存
        $knowhow->fill($form)->save();

        return redirect(route('indexknowhow'));

        // // 知っトク情報を読み込む
        // $items = News::where('deleted_at', null)
        //     ->orderBy('id', 'desc')
        //     ->get();

        // // 知っトク情報の件数
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
     * editknowhow function
     * 知っトク情報変更画面を表示
     *
     * @param Request $request
     * @return void
     */
    public function editknowhow(Request $request)
    {
        // ログインユーザーの情報取得
        $login_user = Auth::user();

        // idによる編集するデータを取得
        $item = Knowhow::find($request->id);

        // 知っトク情報カテゴリー
        $category_items = PostCategory::All();

        // 渡すデータ
        $data = [
            'knowhow' => $item,
            'category_items' => $category_items,
            'login_user' => $login_user,
        ];

        // ブレッドファイルを呼び出す
        return view('cms.cms_knowhow_edit', $data);
    }

    /**
     * updateknowhow function
     * 知っトク情報編集の登録処理
     *
     * @param Request $request
     * @return void
     */
    public function updateknowhow(Request $request)
    {
        // ログインユーザーの情報取得
        $login_user = Auth::user();

        // バリデーション
        $this->validate($request, Knowhow::$rules);

        // 編集する元のデータを読み込む
        $knowhow = Knowhow::find($request->id);

        // 編集結果を取得
        $form = $request->all();

        // _tokenを削除
        unset($form['_token']);

        // 更新日時を刷新
        $knowhow->updated_at = date("Y-m-d H:i:s");
        $knowhow->updated_user_id = $login_user->id;

        // インスタンスに編集結果を入れ替え、保存
        $knowhow->fill($form)->save();

        return redirect(route('indexknowhow'));

        // // 知っトク情報を読み直す
        // $items = News::where('deleted_at', null)
        //     ->orderBy('id', 'desc')
        //     ->get();

        // // 知っトク情報の件数
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
     * deleteknowhow function
     * 知っトク情報を削除
     *
     * @param Request $request
     * @return void
     */
    public function deleteknowhow(Request $request)
    {
        // ログインユーザーの情報取得
        $login_user = Auth::user();

        // News::find($request->id)->delete();

        // 論理削除処理
        // deleted_atフィル―ドに現在の日時を代入
        $param = [
            'deleted_at' => date("Y-m-d H:i:s"),
            'deleted_user_id' => $login_user->id,
        ];

        // DBクリエターで更新処理
        DB::table('knowhows')->where('id', $request->id)
            ->update($param);

        return redirect(route('indexknowhow'));

        // // 知っトク情報を読み直す
        // $items = News::where('deleted_at', null)
        //     ->orderBy('id', 'desc')
        //     ->get();

        // // 知っトク情報の件数
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
