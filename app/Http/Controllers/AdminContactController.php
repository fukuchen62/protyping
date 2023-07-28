<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Facility;

//クライアントへレスポンスするためのクラス
// Auth
use Illuminate\Support\Facades\Auth;

// DBクラスをインポートする
use Illuminate\Support\Facades\DB;

use App\Models\Contact;

class AdminContactController extends Controller
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
    public function showcontact(Request $request)
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
            $items = Contact::where('contact_type', 'like', '%' . $s . '%')
                ->orWhere('language_id', 'like', '%' . $s . '%')
                ->orWhere('word_spell', 'like', '%' . $s . '%')
                ->orWhere('japanese', 'like', '%' . $s . '%')
                ->orWhere('meaning', 'like', '%' . $s . '%')
                ->orWhere('usage', 'like', '%' . $s . '%')
                ->orWhere('memo', 'like', '%' . $s . '%')
                ->orWhere('email', 'like', '%' . $s . '%')
                ->orWhere('status', 'like', '%' . $s . '%')
                ->get();
        } else {
            $items = Contact::all();
        }

        // 件数
        $contact_count = count($items);

        // Bladeファイルに渡すデータ（連想配列）
        $data = [
            'contact_list' => $items,
            'count' => $contact_count,
            'login_user' => $login_user,
            's' => $s,
        ];

        // Bladeファイルを呼び出す
        return view('cms.cms_contact_list', $data);
    }

    /**
     * addcontact function
     * 新規投稿画面を表示
     *
     * @param Request $request
     * @return void
     */
    public function newcontact(Request $request)
    {
        // ログインユーザーの情報取得
        $login_user = Auth::user();

        // お問い合わせカテゴリー
        $contact_items = Contact::All();
        $data = [
            'login_user' => $login_user,
            'contact_items' => $contact_items
        ];
        return view('cms.cms_contact_new', $data);
    }

    /**
     * storecontact function
     *
     *
     * @param Request $request
     * @return void
     */
    public function storecontact(Request $request)
    {
        // ログインユーザーの情報取得
        $login_user = Auth::user();

        // バリデーション
        $this->validate($request, Contact::$rules);

        // 登録用ニュースのインスタンスを生成
        $contact = new Contact();

        // 入力データを取得
        $form = $request->all();

        // _tokenを入力データから無くす
        unset($form['_token']);

        // インスタンスのuser_idプロパティにログイン中のユーザーIDを代入
        $contact->created_user_id = $login_user->id;
        $contact->updated_user_id = $login_user->id;

        // インスタンスを保存
        $contact->fill($form)->save();

        return redirect(route('indexcontact'));

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
     * editcontact function
     * 言語種別変更画面を表示
     *
     * @param Request $request
     * @return void
     */
    public function editcontact(Request $request)
    {
        // ログインユーザーの情報取得
        $login_user = Auth::user();

        // idによる編集するデータを取得
        $item = Contact::find($request->id);

        // ニュースカテゴリー
        $contact_items = Contact::All();

        // 渡すデータ
        $data = [
            'contact' => $item,
            'category_items' => $contact_items,
            'login_user' => $login_user,
        ];

        // ブレッドファイルを呼び出す
        return view('cms.cms_contact_edit', $data);
    }

    /**
     * updatecontact function
     * ニュース編集の登録処理
     *
     * @param Request $request
     * @return void
     */
    public function updatecontact(Request $request)
    {
        // ログインユーザーの情報取得
        $login_user = Auth::user();

        // バリデーション
        // $this->validate($request, Contact::$rules);

        // 編集する元のデータを読み込む
        $contact = Contact::find($request->id);

        // 編集結果を取得
        $form = $request->all();

        // _tokenを削除
        unset($form['_token']);

        // 更新日時を刷新
        $contact->updated_at = date("Y-m-d H:i:s");
        $contact->updated_user_id = $login_user->id;

        // インスタンスに編集結果を入れ替え、保存
        $contact->fill($form)->save();

        return redirect(route('indexcontact'));

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
     * deletecontact function
     * お問い合わせを削除
     *
     * @param Request $request
     * @return void
     */
    public function deletecontact(Request $request)
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
        DB::table('contacts')->where('id', $request->id)
            ->update($param);

        return redirect(route('indexcontact'));

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
