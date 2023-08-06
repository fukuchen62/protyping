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
        // モデルからデータを取得
        if (isset($request->s)) {
            // 指定IDを取得する
            $s = $request->s;
            $formIdentifier = $request->input('form_identifier');
            if ($formIdentifier === 'form1') {
                // 検索フォームからの自由検索
                $items = Vocabulary::where('word_spell', 'like', '%' . $s . '%')
                    // ->orWhere('japanese', 'like', '%' . $s . '%')
                    // ->orWhere('meaning', 'like', '%' . $s . '%')
                    // ->orWhere('usage', 'like', '%' . $s . '%')
                    // ->orderBy('id', 'desc')
                    ->simplePaginate(10);
            } elseif ($formIdentifier === 'form2') {
                // 言語選択された場合
                // $language_id = $request->input('param');
                $items = Vocabulary::where('language_id', $s)->simplePaginate(10);
            } else {
                $items = Vocabulary::where('language_id', 1)->simplePaginate(10);
            }
        } else {
            // 無条件で読み込む
            //$items = Vocabulary::all()->simplePaginate(10);
            $items = Vocabulary::where('language_id', 1)->simplePaginate(10);
        }

        $data = [
            'items' => $items,
        ];
        return view('fronts.languages_dictionary', $data);
    }
}
