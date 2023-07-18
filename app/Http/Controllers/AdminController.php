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

use App\Models\Activity;
use App\Models\News;
use App\Models\RoadStation;
use App\Models\SpecialGoods;
use App\Models\Blog;
use App\Models\User;
use App\Models\ProductType;


// スーパークラスControllerを継承して独自のクラスを作成する
class AdminController extends Controller
{
    /**
     * コンストラクタ
     */
    public function __construct()
    {
        // ログインチェック
        // $this->middleware('auth');
    }

    /**
     * adminTop function
     * 管理画面のトップページ
     *
     * @return void
     */
    public function adminTop()
    {
        // // ログインユーザーの情報取得
        // $login_user = Auth::user();

        // // 新着ニュースを読み込む
        // $items = News::where('is_show', 1)
        //     ->where('deleted_at', null)
        //     ->orderBy('id', 'desc')
        //     ->limit(3)
        //     ->get();

        // // News件数
        // $news_count = News::whereNull('deleted_at')->count();
        // // Activity件数
        // $activity_count = Activity::whereNull('deleted_at')->count();
        // // RoadStation件数
        // $roadStation_count = RoadStation::whereNull('deleted_at')->count();
        // // SpecialGoods件数
        // $specialGoods_count = SpecialGoods::whereNull('deleted_at')->count();
        // // Blog件数
        // $blog_count = Blog::whereNull('deleted_at')->count();
        // // ProductType件数
        // $productType_count = ProductType::whereNull('deleted_at')->count();
        // // User件数
        // $user_count = User::whereNull('deleted_at')->count();

        // $counts = [
        //     'news_count' => $news_count,
        //     'activity_count' => $activity_count,
        //     'roadStation_count' => $roadStation_count,
        //     'specialGoods_count' => $specialGoods_count,
        //     'blog_count' => $blog_count,
        //     'productType_count' => $productType_count,
        //     'user_count' => $user_count,
        // ];

        // テンプレートファイルに渡すデータ（連想配列）
        $data = [
            // 'news_list' => $items,
            // 'counts' => $counts,
            // 'login_user' => $login_user,
        ];
        return view('cms.cms_main', $data);
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