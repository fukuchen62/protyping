<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Level;
use App\Models\Language;
use App\Models\Vocabulary;


class DictionaryController extends Controller
{

    /**
     * getdictionary function
     * 言語別のリストを表示
     * デフォルトはHTML
     * @param Request $request
     * @return void
     */
    public function getdictionary(Request $request)
    {
        // 言語別のリストを表示(デフォルトはHTML)

        // モデルからデータを取得
        $items = Vocabulary::all();
        $data = [
            'items' => $items,
        ];
        return view('fronts.languages_dictionary', $data);
    }
}
