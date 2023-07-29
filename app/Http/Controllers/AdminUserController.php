<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Facility;

//クライアントへレスポンスするためのクラス
// Auth
use Illuminate\Support\Facades\Auth;

// DBクラスをインポートする
use Illuminate\Support\Facades\DB;

use App\Models\User;

class AdminUserController extends Controller
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
     * ユーザーの一覧ページ
     *
     * @return void
     */
    public function showuser(Request $request)
    {
        // ログインユーザーの情報取得
        $login_user = Auth::user();

        // 検索条件を取得
        $s = "";
        if (isset($request->s)) {
            $s = $request->s;
        }

        // ユーザーを読み込む
        if ($s != '') {
            $items = User::where('name', 'like', '%' . $s . '%')
                ->orWhere('email', 'like', '%' . $s . '%')
                ->get();
        } else {
            $items = User::where('deleted_at', null)
                ->get();
        }

        // 件数
        $user_count = count($items);

        // Bladeファイルに渡すデータ（連想配列）
        $data = [
            'user_list' => $items,
            'count' => $user_count,
            'login_user' => $login_user,
            's' => $s,
        ];

        // Bladeファイルを呼び出す
        return view('cms.cms_user_list', $data);
    }
}
