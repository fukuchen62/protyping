<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    /**
     * getcontact function
     * お問い合わせ画面を表示する
     * @param Request $request
     * @return void
     */
    public function getcontact(Request $request)
    {
        // お問い合わせ画面の表示

        return view('fronts.contacts_form');
    }

    /**
     * sendcontact function
     * お問い合わせフォームからメールを送信してもらう
     * @param Request $request
     * @return void
     */
    public function sendcontact(Request $request)
    {
        // お問い合わせフォームからメールを送信してもらう
        // バリデーションのルールを定義すると良いでしょう
        $validatedData = $request->validate([
            'contact_type' => 'required',
            'language_id' => 'required',
            'word_spell' => 'max:200',
            'japanese' => 'max:200',
            'meaning' => 'max:200',
            'usage' => 'max:200',
            'memo' => 'max:200',
            'contact_name' => 'max:50',
            'email' => 'max:100|email',
            'status' => 'requried',
        ]);

        // 入力内容をセッションに保存
        $request->session()->put('contactData', $validatedData);

        // 確認画面にリダイレクト
        // 送信確認画面に遷移する
        return redirect()->route('verification');

        // return view('fronts.contacts_verification')->with('success', 'お問い合わせ内容の確認');
    }

    /**
     * getverification function
     * お問い合わせ内容確認画面の表示
     * @param Request $request
     * @return void
     */
    public function getverification(Request $request)
    {
        // お問い合わせ内容確認画面の表示

        // セッションから入力内容を取得
        $contactData = session('contactData');

        return view('fronts.contacts_verification', compact('contactData'));
    }

    /**
     * sendverification function
     * お問い合わせ内容確認画面から送信してもらう
     * @param Request $request
     * @return void
     */
    public function sendverification(Request $request)
    {
        // お問い合わせ内容確認画面から送信してもらう

        // バリデーションを行う
        $this->validate($request, Contact::$rules);

        // 登録用インスタンスを生成する
        $verification = new Contact;

        // クエリー文字列から登録データを受け取る
        $form = $request->all();

        // csrfトーケンを登録データから無くす
        unset($form['_token']);

        // 登録データをインスタンスに代入して、保存する
        $verification->fill($form)->save();

        // お問い合わせフォームに遷移する
        return redirect()->route('complete')->with('success', 'お問い合わせが送信されました！');
    }

    public function getcomplete(Request $request)
    {
        // お問い合わせ画面の表示

        return view('fronts.contacts_complete');
    }
}
