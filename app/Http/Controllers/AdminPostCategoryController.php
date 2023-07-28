<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Facility;

//クライアントへレスポンスするためのクラス
// Auth
use Illuminate\Support\Facades\Auth;

// DBクラスをインポートする
use Illuminate\Support\Facades\DB;

use App\Models\PostCategory;

class AdminPostCategoryController extends Controller
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
     * 記事カテゴリの一覧ページ
     *
     * @return void
     */
    public function showcategory(Request $request)
    {
        // ログインユーザーの情報取得
        $login_user = Auth::user();

        // 検索条件を取得
        $s = "";
        if (isset($request->s)) {
            $s = $request->s;
        }

        // 記事カテゴリを読み込む
        if ($s != '') {
            $items = PostCategory::where('category_name', 'like', '%' . $s . '%')
                ->get();
        } else {
            $items = PostCategory::where('deleted_at', null)
                // ->orderBy('id', 'desc')
                ->get();
        }

        // 件数
        $postcategory_count = count($items);

        // Bladeファイルに渡すデータ（連想配列）
        $data = [
            'postcategory_list' => $items,
            'count' => $postcategory_count,
            'login_user' => $login_user,
            's' => $s,
        ];

        // Bladeファイルを呼び出す
        return view('cms.cms_postcategory_list', $data);
    }

    /**
     * addarticle function
     * 新規投稿画面を表示
     *
     * @param Request $request
     * @return void
     */
    public function newcategory(Request $request)
    {
        // ログインユーザーの情報取得
        $login_user = Auth::user();

        // ニュースカテゴリー
        $category_items = PostCategory::All();
        $data = [
            'login_user' => $login_user,
            'category_items' => $category_items
        ];
        return view('cms.cms_postcategory_new', $data);
    }

    /**
     * storearticle function
     * 記事カテゴリ新規投稿処理
     *
     * @param Request $request
     * @return void
     */
    public function storecategory(Request $request)
    {
        // ログインユーザーの情報取得
        $login_user = Auth::user();

        // バリデーション
        $this->validate($request, PostCategory::$rules);

        // 登録用記事カテゴリのインスタンスを生成
        $postcategory = new PostCategory();

        // 入力データを取得
        $form = $request->all();

        // _tokenを入力データから無くす
        unset($form['_token']);

        // インスタンスのuser_idプロパティにログイン中のユーザーIDを代入
        $postcategory->created_at = date("Y-m-d H:i:s");

        // インスタンスを保存
        $postcategory->fill($form)->save();

        return redirect(route('indexcategory'));
    }

    /**
     * editarticle function
     * 記事カテゴリ変更画面を表示
     *
     * @param Request $request
     * @return void
     */
    public function editcategory(Request $request)
    {
        // ログインユーザーの情報取得
        $login_user = Auth::user();

        // idによる編集するデータを取得
        $item = PostCategory::find($request->id);

        // 記事カテゴリカテゴリー
        $category_items = PostCategory::All();

        // 渡すデータ
        $data = [
            'postcategory' => $item,
            'category_items' => $category_items,
            'login_user' => $login_user,
        ];

        // ブレッドファイルを呼び出す
        return view('cms.cms_postcategory_edit', $data);
    }

    /**
     * updatearticle function
     * 記事カテゴリ編集の登録処理
     *
     * @param Request $request
     * @return void
     */
    public function updatecategory(Request $request)
    {
        // ログインユーザーの情報取得
        $login_user = Auth::user();

        // バリデーション
        $this->validate($request, PostCategory::$rules);

        // 編集する元のデータを読み込む
        $postcategory = PostCategory::find($request->id);

        // 編集結果を取得
        $form = $request->all();

        // _tokenを削除
        unset($form['_token']);

        // 更新日時を刷新
        $postcategory->updated_at = date("Y-m-d H:i:s");

        // インスタンスに編集結果を入れ替え、保存
        $postcategory->fill($form)->save();

        return redirect(route('indexcategory'));
    }

    /**
     * deletearticle function
     * 記事カテゴリを削除
     *
     * @param Request $request
     * @return void
     */
    public function deletecategory(Request $request)
    {
        // ログインユーザーの情報取得
        $login_user = Auth::user();

        // News::find($request->id)->delete();

        // 論理削除処理
        // deleted_atフィル―ドに現在の日時を代入
        $param = [
            'deleted_at' => date("Y-m-d H:i:s"),
            // 'deleted_user_id' => $login_user->id,
        ];

        // DBクリエターで更新処理
        DB::table('post_categories')->where('id', $request->id)
            ->update($param);

        return redirect(route('indexcategory'));
    }
}
