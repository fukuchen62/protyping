<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Facility;

//クライアントへレスポンスするためのクラス
// Auth
use Illuminate\Support\Facades\Auth;

// DBクラスをインポートする
use Illuminate\Support\Facades\DB;

use App\Models\Game;

class AdminGameController extends Controller
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
    public function showgame(Request $request)
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
            $items = Game::where('game_name', 'like', '%' . $s . '%')
                ->orWhere('discription', 'like', '%' . $s . '%')
                ->orWhere('game_icon', 'like', '%' . $s . '%')
                ->orWhere('language_id', 'like', '%' . $s . '%')
                ->orWhere('level_id', 'like', '%' . $s . '%')
                ->orWhere('howmany', 'like', '%' . $s . '%')
                ->orWhere('second', 'like', '%' . $s . '%')
                ->get();
        } else {
            $items = Game::where('deleted_at', null)
                ->orderBy('id', 'desc')
                ->get();
        }

        // 件数
        $game_count = count($items);

        // Bladeファイルに渡すデータ（連想配列）
        $data = [
            'game_list' => $items,
            'count' => $game_count,
            'login_user' => $login_user,
            's' => $s,
        ];

        // Bladeファイルを呼び出す
        return view('cms.cms_game_list', $data);
    }

    /**
     * addgame function
     * 新規投稿画面を表示
     *
     * @param Request $request
     * @return void
     */
    public function newgame(Request $request)
    {
        // ログインユーザーの情報取得
        $login_user = Auth::user();

        // ニュースカテゴリー
        $game_items = Game::All();
        $data = [
            'login_user' => $login_user,
            'game_items' => $game_items
        ];
        return view('cms.cms_game_new', $data);
    }

    /**
     * storegame function
     *
     *
     * @param Request $request
     * @return void
     */
    public function storegame(Request $request)
    {
        // ログインユーザーの情報取得
        $login_user = Auth::user();

        // バリデーション
        $this->validate($request, Game::$rules);

        // 登録用ニュースのインスタンスを生成
        $game = new Game();

        // 入力データを取得
        $form = $request->all();

        // _tokenを入力データから無くす
        unset($form['_token']);

        // インスタンスのuser_idプロパティにログイン中のユーザーIDを代入
        $game->created_user_id = $login_user->id;
        $game->updated_user_id = $login_user->id;

        // インスタンスを保存
        $game->fill($form)->save();

        return redirect(route('indexgame'));

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
     * editgame function
     * 言語種別変更画面を表示
     *
     * @param Request $request
     * @return void
     */
    public function editgame(Request $request)
    {
        // ログインユーザーの情報取得
        $login_user = Auth::user();

        // idによる編集するデータを取得
        $item = Game::find($request->id);

        // ニュースカテゴリー
        $game_items = Game::All();

        // 渡すデータ
        $data = [
            'game' => $item,
            'category_items' => $game_items,
            'login_user' => $login_user,
        ];

        // ブレッドファイルを呼び出す
        return view('cms.cms_game_edit', $data);
    }

    /**
     * updategame function
     * ゲーム設定編集の登録処理
     *
     * @param Request $request
     * @return void
     */
    public function updategame(Request $request)
    {
        // ログインユーザーの情報取得
        $login_user = Auth::user();

        // バリデーション
        $this->validate($request, Game::$rules);

        // 編集する元のデータを読み込む
        $game = Game::find($request->id);

        // 編集結果を取得
        $form = $request->all();

        // _tokenを削除
        unset($form['_token']);

        // 更新日時を刷新
        $game->updated_at = date("Y-m-d H:i:s");
        $game->updated_user_id = $login_user->id;

        // インスタンスに編集結果を入れ替え、保存
        $game->fill($form)->save();

        return redirect(route('indexgame'));

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
     * deletegame function
     * ニュースを削除
     *
     * @param Request $request
     * @return void
     */
    public function deletegame(Request $request)
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
        DB::table('games')->where('id', $request->id)
            ->update($param);

        return redirect(route('indexgame'));

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
