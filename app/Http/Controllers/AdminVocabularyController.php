<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Facility;

//クライアントへレスポンスするためのクラス
// Auth
use Illuminate\Support\Facades\Auth;

// DBクラスをインポートする
use Illuminate\Support\Facades\DB;

use App\Models\Vocabulary;
use App\Models\Language;
use Language_Pack_Upgrader_Skin;

class AdminVocabularyController extends Controller
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
    public function showvocabulary(Request $request)
    {
        // ログインユーザーの情報取得
        $login_user = Auth::user();

        // 検索条件を取得
        $s = "";
        if (isset($request->s)) {
            $s = $request->s;
        }

        $formIdentifier = $request->input('form_identifier');
        $lang_id = 1;     //言語ID

        // 言語を読み込む
        if ($s != '') {
            // 検索で絞られた場合
            $items = Vocabulary::where('word_spell', 'like', '%' . $s . '%')
                ->orWhere('japanese', 'like', '%' . $s . '%')
                ->orWhere('pronunciation', 'like', '%' . $s . '%')
                ->orWhere('meaning', 'like', '%' . $s . '%')
                ->orWhere('notion', 'like', '%' . $s . '%')
                ->orWhere('usage', 'like', '%' . $s . '%')
                ->orderBy('word_spell', 'asc')
                ->get();
        } elseif ($formIdentifier === 'form2') {
            // 言語が絞られた場合
            $lang_id = $request->input('language');
            $items = Vocabulary::where('language_id', $lang_id)
                ->orderBy('word_spell', 'asc')
                ->get();
        } else {
            $items = Vocabulary::where('deleted_at', null)
                ->where('language_id', $lang_id)
                ->orderBy('word_spell', 'asc')
                ->get();
        }

        // 件数
        $vocabulary_count = count($items);

        // 言語一覧
        $langlist =
            Language::where('deleted_at', null)
            ->orderBy('id', 'asc')
            ->get();

        // Bladeファイルに渡すデータ（連想配列）
        $data = [
            'vocabulary_list' => $items,
            'count' => $vocabulary_count,
            'login_user' => $login_user,
            's' => $s,
            'langlist' => $langlist,
            'language_id' => $lang_id,
        ];

        // Bladeファイルを呼び出す
        return view('cms.cms_vocabulary_list', $data);
    }

    /**
     * addvocabulary function
     * 新規投稿画面を表示
     *
     * @param Request $request
     * @return void
     */
    public function newvocabulary(Request $request)
    {
        // ログインユーザーの情報取得
        $login_user = Auth::user();

        // 単語カテゴリー
        $vocabulary_items = Vocabulary::All();

        // 言語一覧
        $langlist =
            Language::where('deleted_at', null)
            ->orderBy('id', 'asc')
            ->get();

        $data = [
            'login_user' => $login_user,
            'vocabulary_items' => $vocabulary_items,
            'langlist' => $langlist,
        ];
        return view('cms.cms_vocabulary_new', $data);
    }

    /**
     * storevocabulary function
     *
     *
     * @param Request $request
     * @return void
     */
    public function storevocabulary(Request $request)
    {
        // ログインユーザーの情報取得
        $login_user = Auth::user();

        // バリデーション
        $this->validate($request, Vocabulary::$rules);

        // 登録用ニュースのインスタンスを生成
        $vocabulary = new Vocabulary();

        // 入力データを取得
        $form = $request->all();

        // _tokenを入力データから無くす
        unset($form['_token']);

        // インスタンスのuser_idプロパティにログイン中のユーザーIDを代入
        $vocabulary->created_user_id = $login_user->id;
        $vocabulary->updated_user_id = $login_user->id;

        // インスタンスを保存
        $vocabulary->fill($form)->save();

        return redirect(route('indexvocabulary'));
    }

    /**
     * editvolabulary function
     * 言語種別変更画面を表示
     *
     * @param Request $request
     * @return void
     */
    public function editvocabulary(Request $request)
    {
        // ログインユーザーの情報取得
        $login_user = Auth::user();

        // idによる編集するデータを取得
        $item = Vocabulary::find($request->id);

        // 単語カテゴリー
        $vocabulary_items = Vocabulary::All();

        // 言語一覧
        $langlist =
            Language::where('deleted_at', null)
            ->orderBy('id', 'asc')
            ->get();

        // 渡すデータ
        $data = [
            'vocabulary' => $item,
            'category_items' => $vocabulary_items,
            'login_user' => $login_user,
            'langlist' => $langlist,
        ];

        // ブレッドファイルを呼び出す
        return view('cms.cms_vocabulary_edit', $data);
    }

    /**
     * updatevocabulary function
     * 単語編集の登録処理
     *
     * @param Request $request
     * @return void
     */
    public function updatevocabulary(Request $request)
    {
        // ログインユーザーの情報取得
        $login_user = Auth::user();

        // バリデーション
        $this->validate($request, Vocabulary::$rules);

        // 編集する元のデータを読み込む
        $vocabulary = Vocabulary::find($request->id);

        // 編集結果を取得
        $form = $request->all();

        // _tokenを削除
        unset($form['_token']);

        // 更新日時を刷新
        $vocabulary->updated_at = date("Y-m-d H:i:s");
        $vocabulary->updated_user_id = $login_user->id;

        // インスタンスに編集結果を入れ替え、保存
        $vocabulary->fill($form)->save();

        return redirect(route('indexvocabulary'));

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
     * deletevocabulary function
     * 単語を削除
     *
     * @param Request $request
     * @return void
     */
    public function deletevocabulary(Request $request)
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
        DB::table('vocabularies')->where('id', $request->id)
            ->update($param);

        return redirect(route('indexvocabulary'));

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
