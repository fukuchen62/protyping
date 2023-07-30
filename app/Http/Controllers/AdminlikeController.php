<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Facility;

//クライアントへレスポンスするためのクラス
// Auth
use Illuminate\Support\Facades\Auth;

// DBクラスをインポートする
use Illuminate\Support\Facades\DB;

use App\Models\Like;

class AdminLikeController extends Controller
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
    public function showlike(Request $request)
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
            $items = Like::where('users_id', 'like', '%' . $s . '%')
                ->orWhere('games_id', 'like', '%' . $s . '%')
                ->orWhere('news_id', 'like', '%' . $s . '%')
                ->orWhere('knowhow_id', 'like', '%' . $s . '%')
                ->get();
        } else {
            $items = Like::where('deleted_at', null)
                // ->orderBy('id', 'desc')
                ->get();
        }

        // 件数
        $like_count = count($items);

        // Bladeファイルに渡すデータ（連想配列）
        $data = [
            'like_list' => $items,
            'count' => $like_count,
            'login_user' => $login_user,
            's' => $s,
        ];

        // Bladeファイルを呼び出す
        return view('cms.cms_like_list', $data);
    }

    /**
     * newlike function
     * 新規投稿画面を表示
     *
     * @param Request $request
     * @return void
     */
    public function newlike(Request $request)
    {
        // ログインユーザーの情報取得
        $login_user = Auth::user();

        // 知っトク情報カテゴリー
        // $category_items = PostCategory::All();
        $data = [
            'login_user' => $login_user,
            // 'category_items' => $category_items
        ];
        return view('cms.cms_like_new', $data);
    }

    /**
     * storelike function
     * いいね新規投稿処理
     *
     * @param Request $request
     * @return void
     */
    public function storelike(Request $request)
    {
        // ログインユーザーの情報取得
        $login_user = Auth::user();

        // バリデーション
        $this->validate($request, Like::$rules);

        // 登録用知っトク情報のインスタンスを生成
        $like = new Like();

        // 入力データを取得
        $form = $request->all();

        // _tokenを入力データから無くす
        unset($form['_token']);

        // インスタンスのuser_idプロパティにログイン中のユーザーIDを代入
        $like->created_at = date("Y-m-d H:i:s");

        // インスタンスを保存
        $like->fill($form)->save();

        return redirect(route('indexlike'));
    }

    /**
     * editlike function
     * 知っトク情報変更画面を表示
     *
     * @param Request $request
     * @return void
     */
    public function editlike(Request $request)
    {
        // ログインユーザーの情報取得
        $login_user = Auth::user();

        // idによる編集するデータを取得
        $item = Like::find($request->id);

        // 知っトク情報カテゴリー
        // $category_items = PostCategory::All();

        // 渡すデータ
        $data = [
            'like' => $item,
            // 'category_items' => $category_items,
            'login_user' => $login_user,
        ];

        // ブレッドファイルを呼び出す
        return view('cms.cms_like_edit', $data);
    }

    /**
     * updatelike function
     * 知っトク情報編集の登録処理
     *
     * @param Request $request
     * @return void
     */
    public function updatelike(Request $request)
    {
        // ログインユーザーの情報取得
        $login_user = Auth::user();

        // バリデーション
        $this->validate($request, Like::$rules);

        // 編集する元のデータを読み込む
        $like = Like::find($request->id);

        // 編集結果を取得
        $form = $request->all();

        // _tokenを削除
        unset($form['_token']);

        // 更新日時を刷新
        // $like->updated_at = date("Y-m-d H:i:s");
        // $like->updated_user_id = $login_user->id;

        // インスタンスに編集結果を入れ替え、保存
        $like->fill($form)->save();

        return redirect(route('indexlike'));
    }

    /**
     * deletelike function
     * 知っトク情報を削除
     *
     * @param Request $request
     * @return void
     */
    public function deletelike(Request $request)
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
        DB::table('likes')->where('id', $request->id)
            ->update($param);

        return redirect(route('indexlike'));
    }
}
