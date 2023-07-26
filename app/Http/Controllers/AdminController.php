<?php
// 名前空間
namespace App\Http\Controllers;

// クラスをインポートする
//クライアントからのリクエストを受信するためのクラス

use App\Models\Facility;

use Illuminate\Http\Request;

//クライアントへレスポンスするためのクラス
// use App\Models\News;

// Auth
use Illuminate\Support\Facades\Auth;

// DBクラスをインポートする
use Illuminate\Support\Facades\DB;

use App\Models\News;
// use App\Models\Category;
use App\Models\PostCategory;
use App\Models\Contact;
// use App\Models\Favorite;
use App\Models\Game;
use App\Models\Knowhow;
use App\Models\Language;
// use App\Models\Like;
use App\Models\Level;
use App\Models\Score;
use App\Models\User;
use App\Models\Vocabulary;

// スーパークラスControllerを継承して独自のクラスを作成する
class AdminController extends Controller
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
     * adminTop function
     * 管理画面のトップページ
     *
     * @return void
     */
    public function index()
    {
        // ログインユーザーの情報取得
        $login_user = Auth::user();

        // 新着ニュースを読み込む
        $news = News::where('is_show', 1)
            ->where('deleted_at', null)
            ->orderBy('id', 'desc')
            ->limit(3)
            ->get();

        // News件数
        $news_count = News::whereNull('deleted_at')->count();
        // Contact件数
        $contact_count = Contact::count();
        // PostCategory件数
        $postcategory_count = PostCategory::count();
        // Game件数
        $game_count = Game::whereNull('deleted_at')->count();
        // Knowhow件数
        $knowhow_count = Knowhow::whereNull('deleted_at')->count();
        // Language件数
        $language_count = Language::whereNull('deleted_at')->count();
        // Score件数
        $score_count = Score::count();
        // User件数
        $user_count = User::whereNull('deleted_at')->count();
        // Vocabulary件数
        $vocabulary_count = Vocabulary::whereNull('deleted_at')->count();

        $counts = [
            'news_count' => $news_count,
            'contact_count' => $contact_count,
            'postcategory_count' => $postcategory_count,
            'game_count' => $game_count,
            'knowhow_count' => $knowhow_count,
            'language_count' => $language_count,
            'score_count' => $score_count,
            'user_count' => $user_count,
            'vocabulary_count' => $vocabulary_count,
        ];

        // テンプレートファイルに渡すデータ（連想配列）
        $data = [
            'news_list' => $news,
            'counts' => $counts,
            'login_user' => $login_user,
        ];
        return view('cms.cms_main', $data);
    }

    /**
     * editarticle function
     *
     * @return void
     */
    public function editarticle(Request $request)
    {
    }

    /**
     * ログアウト
     *
     * @return void
     */
    public function logout()
    {
        Auth::logout();

        // リダイレクトの生成
        return redirect()->route('admintop');
    }
}
