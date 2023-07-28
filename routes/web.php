<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/**
 * TOPページ
 * 更新情報を取得
 * 知っトク情報を取得
 * 難易度別に各言語のランキングTOP3のデータを取得(サイドバー)
 */
Route::get('/', [App\Http\Controllers\MainController::class, 'index'])->name('top');

/**
 * ゲーム画面
 * ゲーム結果(スコア)の表示
 */
Route::get('typinggame{language?}/{level?}', [App\Http\Controllers\TypinggameController::class, 'gamestart'])->name('game');

/**
 * ゲーム画面
 * ゲーム結果(スコア)の送信(ランキング作成のため)
 */
Route::post('typinggame', [App\Http\Controllers\TypinggameController::class, 'gameresult'])->name('game');

/**
 * 言語一覧画面
 * 言語別のリストを表示
 * デフォルトはHTML
 */
Route::get('vocabularies', [App\Http\Controllers\DictionaryController::class, 'getdictionary'])->name('dictionary');

/**
 * ランキング表示画面
 * コース(難易度)別に各言語カテゴリーのランキングTOP10を表示
 * デフォルトはのんびりコース
 */
Route::get('ranking', [App\Http\Controllers\RankingController::class, 'getranking'])->name('ranking');

/**
 * マイスコア表示画面
 * コース(難易度)別に各言語カテゴリーのハイスコアを表示
 * デフォルトはのんびりコース
 */
Route::get('myscore', [App\Http\Controllers\MyscoreController::class, 'getmyscore'])->name('myscore');

/**
 * マイスコア登録(暫定)
 * ゲーム画面が未だなのでテスト用に作成
 */
Route::post('myscore', [App\Http\Controllers\MyscoreController::class, 'setmyscore'])->name('myscore');

Route::get('myscoreresult', [App\Http\Controllers\MyscoreController::class, 'getmyscoreresult'])->name('myscoreresult');

/**
 * お問い合わせフォーム画面
 * お問い合わせ画面を表示
 */
Route::get('contact', [App\Http\Controllers\ContactController::class, 'getcontact'])->name('contact');

/**
 * お問い合わせフォーム画面
 * ユーザにフォームから問い合わせ内容を送信してもらう
 */
Route::post('contact', [App\Http\Controllers\ContactController::class, 'sendcontact'])->name('contact');

/**
 * お問い合わせの確認画面
 * ユーザにフォームから問い合わせ内容に間違いがないか確認してもらう
 * カテゴリが単語追加要望ならDBに登録する
 */
Route::get('verification', [App\Http\Controllers\ContactController::class, 'getverification'])->name('verification');

/**
 * お問い合わせの確認画面
 * ユーザにフォームから問い合わせ内容に間違いがないか確認してもらう
 * カテゴリが単語追加要望ならDBに登録する
 */
Route::post('verification', [App\Http\Controllers\ContactController::class, 'sendverification'])->name('verification');

/**
 * 更新情報一覧画面
 * 更新情報の一覧を表示する
 */
Route::get('article', [App\Http\Controllers\ArticleController::class, 'getarticle'])->name('article');


/**
 * 知っトク記事一覧画面
 * 知っトク情報の一覧を表示する
 */
Route::get('knowhow', [App\Http\Controllers\KnowhowController::class, 'getknowhow'])->name('knowhow');

/**
 * 知っトク記事各詳細画面
 * 知っトク情報の個別詳細記事を表示する
 */
Route::get('details', [App\Http\Controllers\KnowhowController::class, 'getdetails'])->name('details');

/**
 * 利用規約画面
 * 静的なページ
 */
Route::get('terms', [App\Http\Controllers\TermsController::class, 'getterms'])->name('terms');

/**
 * プライバシーポリシーのページ
 * 静的なページ
 */
Route::get('privacypolicy', [App\Http\Controllers\PrivacypolicyController::class, 'getprivacypolicy'])->name('privacypolicy');

/**
 * 制作者チームの紹介とゲーム概要の説明のページ
 * 静的なページ
 */
Route::get('about', [App\Http\Controllers\AboutController::class, 'getabout'])->name('about');

// Auth
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/**
 * 管理画面のTOPページ
 */
Route::get('admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admintop');

/**
 * 管理画面ログアウト
 * 福島
 */
Route::get(
    'admin/logout',
    [App\Http\Controllers\AdminController::class, 'logout']
)->name('logout');


/**
 * 管理画面
 * 登録してあるユーザ情報を検索する
 */
Route::get('adminfinduser', [App\Http\Controllers\AdminController::class, 'searchuser'])->name('finduser');

/**
 * 管理画面
 * 登録してあるユーザ情報の一覧を表示する
 */
Route::get('adminindexuser', [App\Http\Controllers\AdminController::class, 'showuser'])->name('indexuser');

/**
 * 管理画面
 * ユーザ情報の新規登録画面を表示する
 */
Route::get('adminadduser', [App\Http\Controllers\AdminController::class, 'newuser'])->name('adduser');

/**
 * 管理画面
 * ユーザ情報を新規で登録する
 */
Route::post('adminadduser', [App\Http\Controllers\AdminController::class, 'storeuser'])->name('adduser');

/**
 * 管理画面
 * 登録済みのユーザ情報の編集画面を表示する
 */
Route::get('adminadduser', [App\Http\Controllers\AdminController::class, 'edituser'])->name('edituser');

/**
 * 管理画面
 * 登録済みのユーザ情報を編集する
 */
Route::post('adminadduser', [App\Http\Controllers\AdminController::class, 'updateuser'])->name('edituser');

/**
 * 管理画面
 * 登録済みのユーザ情報を削除する
 */
Route::get('adminadduser', [App\Http\Controllers\AdminGameController::class, 'deleteuser'])->name('edituser');

/**
 * 管理画面
 * 登録済みのユーザ情報を削除する
 */
Route::get('adminfindgame', [App\Http\Controllers\AdminGameController::class, 'searchgame'])->name('findgame');

/**
 * 管理画面
 * 登録してあるゲーム設定情報の一覧を表示する
 */
Route::get('adminindexgame', [App\Http\Controllers\AdminGameController::class, 'showgame'])->name('indexgame');

/**
 * 管理画面
 * ゲーム設定情報の新規登録画面を表示する
 */
Route::get('adminaddgame', [App\Http\Controllers\AdminGameController::class, 'newgame'])->name('addgame');

/**
 * 管理画面
 * ゲーム設定情報を新規で登録する
 */
Route::post('adminaddgame', [App\Http\Controllers\AdminGameController::class, 'storegame'])->name('addgame');

/**
 * 管理画面
 * 登録済みのゲーム設定情報の編集画面を表示する
 */
Route::get('admineditgame', [App\Http\Controllers\AdminGameController::class, 'editgame'])->name('editgame');

/**
 * 管理画面
 * 登録済みのゲーム設定情報を編集する
 */
Route::post('admineditgame', [App\Http\Controllers\AdminGameController::class, 'updategame'])->name('editgame');

/**
 * 管理画面
 * 登録済みのゲーム設定情報を削除する
 */
Route::get('admindeletegame', [App\Http\Controllers\AdminGameController::class, 'deletegame'])->name('deletegame');

/**
 * 管理画面
 * 登録してある言語種別情報を検索する
 */
Route::get('adminfindlanguage', [App\Http\Controllers\AdminLanguageController::class, 'searchlanguage'])->name('findlanguage');

/**
 * 管理画面
 * 登録してある言語種別情報の一覧を表示する
 */
Route::get('adminindexlanguage', [App\Http\Controllers\AdminLanguageController::class, 'showlanguage'])->name('indexlanguage');

/**
 * 管理画面
 * 言語種別情報の新規登録画面を表示する
 */
Route::get('adminaddlanguage', [App\Http\Controllers\AdminLanguageController::class, 'newlanguage'])->name('addlanguage');

/**
 * 管理画面
 * 言語種別情報を新規で登録する
 */
Route::post('adminaddlanguage', [App\Http\Controllers\AdminLanguageController::class, 'storelanguage'])->name('addlanguage');

/**
 * 管理画面
 * 登録済みの言語種別情報の編集画面を表示する
 */
Route::get('admineditlanguage', [App\Http\Controllers\AdminLanguageController::class, 'editlanguage'])->name('editlanguage');

/**
 * 管理画面
 * 登録済みの言語種別情報を編集する
 */
Route::post('admineditlanguage', [App\Http\Controllers\AdminLanguageController::class, 'updatelanguage'])->name('editlanguage');

/**
 * 管理画面
 * 登録済みの言語種別情報を削除する
 */
Route::get('admindeletelanguage', [App\Http\Controllers\AdminLanguageController::class, 'deletelanguage'])->name('deletelanguage');

/**
 * 管理画面
 * 登録してある単語情報を検索する
 */
Route::get('adminfindvocabulary', [App\Http\Controllers\AdminVocabularyController::class, 'searchvocabulary'])->name('findvocabulary');

/**
 * 管理画面
 * 登録してある単語情報の一覧を表示する
 */
Route::get('adminindexvocabulary', [App\Http\Controllers\AdminVocabularyController::class, 'showvocabulary'])->name('indexvocabulary');

/**
 * 管理画面
 * 単語情報の新規登録画面を表示する
 */
Route::get('adminaddvocabulary', [App\Http\Controllers\AdminVocabularyController::class, 'newvocabulary'])->name('addvocabulary');

/**
 * 管理画面
 * 単語情報を新規で登録する
 */
Route::post('adminaddvocabulary', [App\Http\Controllers\AdminVocabularyController::class, 'storevocabulary'])->name('addvocabulary');

/**
 * 管理画面
 * 登録済みの単語情報の編集画面を表示する
 */
Route::get('admineditvocabulary', [App\Http\Controllers\AdminVocabularyController::class, 'editvocabulary'])->name('editvocabulary');

/**
 * 管理画面
 * 登録済みの単語情報を編集する
 */
Route::post('admineditvocabulary', [App\Http\Controllers\AdminVocabularyController::class, 'updatevocabulary'])->name('editvocabulary');

/**
 * 管理画面
 * 登録済みの単語情報を削除する
 */
Route::get('admindeletevocabulary', [App\Http\Controllers\AdminVocabularyController::class, 'deletevocabulary'])->name('deletevocabulary');

/**
 * 管理画面
 * 登録してあるゲームレベルの情報を検索する
 */
Route::get('adminfindlevel', [App\Http\Controllers\AdminLevelController::class, 'searchlevel'])->name('findlevel');

/**
 * 管理画面
 * 登録してあるゲームレベルの情報の一覧を表示する
 */
Route::get('adminindexlevel', [App\Http\Controllers\AdminLevelController::class, 'showlevel'])->name('indexlevel');

/**
 * 管理画面
 * ゲームレベルの情報の新規登録画面を表示する
 */
Route::get('adminaddlevel', [App\Http\Controllers\AdminLevelController::class, 'newlevel'])->name('addlevel');

/**
 * 管理画面
 * ゲームレベルの情報を新規で登録する
 */
Route::post('adminaddlevel', [App\Http\Controllers\AdminLevelController::class, 'storelevel'])->name('addlevel');

/**
 * 管理画面
 * 登録済みのゲームレベルの情報の編集画面を表示する
 */
Route::get('admineditlevel', [App\Http\Controllers\AdminLevelController::class, 'editlevel'])->name('editlevel');

/**
 * 管理画面
 * 登録済みのゲームレベルの情報を編集する
 */
Route::post('admineditlevel', [App\Http\Controllers\AdminLevelController::class, 'updatelevel'])->name('editlevel');

/**
 * 管理画面
 * 登録済みのゲームレベルの情報を削除する
 */
Route::get('admindeletelevel', [App\Http\Controllers\AdminLevelController::class, 'deletelevel'])->name('deletelevel');

/**
 * 管理画面
 * 登録してあるゲームスコアの情報を検索する
 */
Route::get('adminfindscore', [App\Http\Controllers\AdminScoreController::class, 'searchscore'])->name('findscore');

/**
 * 管理画面
 * 登録してあるゲームスコアの情報の一覧を表示する
 */
Route::get('adminindexscore', [App\Http\Controllers\AdminScoreController::class, 'showscore'])->name('indexscore');

/**
 * 管理画面
 * ゲームスコアの情報の新規登録画面を表示する
 */
Route::get('adminaddscore', [App\Http\Controllers\AdminScoreController::class, 'newscore'])->name('addscore');

/**
 * 管理画面
 * ゲームスコアの情報を新規で登録する
 */
Route::post('adminaddscore', [App\Http\Controllers\AdminScoreController::class, 'storescore'])->name('addscore');

/**
 * 管理画面
 * 登録済みのゲームスコアの情報の編集画面を表示する
 */
Route::get('admineditscore', [App\Http\Controllers\AdminScoreController::class, 'editscore'])->name('editscore');

/**
 * 管理画面
 * 登録済みのゲームスコアの情報を編集する
 */
Route::post('admineditscore', [App\Http\Controllers\AdminScoreController::class, 'updatescore'])->name('editscore');

/**
 * 管理画面
 * 登録済みのゲームスコアの情報を削除する
 */
Route::get('admindeletescore', [App\Http\Controllers\AdminScoreController::class, 'deletescore'])->name('deletecore');

/**
 * 管理画面
 * 登録してある記事情報を検索する
 */
Route::get('adminfindarticle', [App\Http\Controllers\AdminController::class, 'searcharticle'])->name('findarticle');

/**
 * 管理画面
 * 登録してある記事情報の一覧を表示する
 */
Route::get('adminindexarticle', [App\Http\Controllers\AdminNewsController::class, 'showarticle'])->name('indexarticle');

/**
 * 管理画面
 * 記事情報の新規登録画面を表示する
 */
Route::get('adminaddarticle', [App\Http\Controllers\AdminNewsController::class, 'newarticle'])->name('addarticle');

/**
 * 管理画面
 * 記事情報を新規で登録する
 */
Route::post('adminaddarticle', [App\Http\Controllers\AdminNewsController::class, 'storearticle'])->name('addarticle');

/**
 * 管理画面
 * 登録済みの記事情報の編集画面を表示する
 */
Route::get('admineditarticle', [App\Http\Controllers\AdminNewsController::class, 'editarticle'])->name('editarticle');

/**
 * 管理画面
 * 登録済みの記事情報を編集する
 */
Route::post('admineditarticle', [App\Http\Controllers\AdminNewsController::class, 'updatearticle'])->name('editarticle');

/**
 * 管理画面
 * 登録済みの記事情報を削除する
 */
Route::get('admindeletearticle', [App\Http\Controllers\AdminNewsController::class, 'deletearticle'])->name('deletearticle');

/**
 * 管理画面
 * 登録してある知っトク情報を検索する
 */
Route::get('adminfindknowhow', [App\Http\Controllers\AdminKnowhowController::class, 'searchknowhow'])->name('findknowhow');

/**
 * 管理画面
 * 登録してある知っトク情報の一覧を表示する
 */
Route::get('adminindexknowhow', [App\Http\Controllers\AdminKnowhowController::class, 'showknowhow'])->name('indexknowhow');

/**
 * 管理画面
 * 知っトク情報の新規登録画面を表示する
 */
Route::get('adminaddknowhow', [App\Http\Controllers\AdminKnowhowController::class, 'newknowhow'])->name('addknowhow');

/**
 * 管理画面AdminKnowhowController
 * 知っトク情報を新規で登録する
 */
Route::post('adminaddknowhow', [App\Http\Controllers\AdminKnowhowController::class, 'storeknowhow'])->name('addknowhow');

/**
 * 管理画面
 * 登録済みの知っトク情報の編集画面を表示する
 */
Route::get('admineditknowhow', [App\Http\Controllers\AdminKnowhowController::class, 'editknowhow'])->name('editknowhow');

/**AdminKnowhowController
 * 管理画面
 * 登録済みの知っトク情報を編集する
 */
Route::post('admineditknowhow', [App\Http\Controllers\AdminKnowhowController::class, 'updateknowhow'])->name('editknowhow');

/**
 * 管理画面
 * 登録済みの知っトク情報を削除する
 */
Route::get('admindeleteknowhow', [App\Http\Controllers\AdminKnowhowController::class, 'deleteknowhow'])->name('deleteknowhow');

/**
 * 管理画面
 * 登録してあるカテゴリ情報を検索する
 */
Route::get('adminfindcategory', [App\Http\Controllers\AdminController::class, 'searchcategory'])->name('findcategory');

/**
 * 管理画面
 * 登録してあるカテゴリ情報の一覧を表示する
 */
Route::get('adminindexcategory', [App\Http\Controllers\AdminController::class, 'showcategory'])->name('indexcategory');

/**
 * 管理画面
 * カテゴリ情報の新規登録画面を表示する
 */
Route::get('adminaddcategory', [App\Http\Controllers\AdminController::class, 'newcategory'])->name('addcategory');

/**
 * 管理画面
 * カテゴリ情報を新規で登録する
 */
Route::post('adminaddcategory', [App\Http\Controllers\AdminController::class, 'storecategory'])->name('addcategory');

/**
 * 管理画面
 * 登録済みのカテゴリ情報の編集画面を表示する
 */
Route::get('admineditcategory', [App\Http\Controllers\AdminController::class, 'editcategory'])->name('editcategory');

/**
 * 管理画面
 * 登録済みのカテゴリ情報を編集する
 */
Route::post('admineditcategory', [App\Http\Controllers\AdminController::class, 'updatecategory'])->name('editcategory');

/**
 * 管理画面
 * 登録済みのカテゴリ情報を削除する
 */
Route::get('admineditcategory', [App\Http\Controllers\AdminController::class, 'deletecategory'])->name('editcategory');

/**
 * 管理画面
 * 登録してあるいいね情報を検索する
 */
Route::get('adminfindlike', [App\Http\Controllers\AdminController::class, 'searchlike'])->name('findlike');

/**
 * 管理画面
 * 登録してあるいいね情報の一覧を表示する
 */
Route::get('adminindexlike', [App\Http\Controllers\AdminController::class, 'showlike'])->name('indexlike');

/**
 * 管理画面
 * いいね情報の新規登録画面を表示する
 */
Route::get('adminaddlike', [App\Http\Controllers\AdminController::class, 'newlike'])->name('addlike');

/**
 * 管理画面
 * いいね情報を新規で登録する
 */
Route::post('adminaddlike', [App\Http\Controllers\AdminController::class, 'storelike'])->name('addlike');

/**
 * 管理画面
 * 登録済みのいいね情報の編集画面を表示する
 */
Route::get('dmineditlike', [App\Http\Controllers\AdminController::class, 'editlike'])->name('editlike');

/**
 * 管理画面
 * 登録済みのいいね情報を編集する
 */
Route::post('admineditlike', [App\Http\Controllers\AdminController::class, 'updatelike'])->name('editlike');

/**
 * 管理画面
 * 登録済みのいいね情報を削除する
 */
Route::get('admineditlike', [App\Http\Controllers\AdminController::class, 'deletelike'])->name('editlike');

/**
 * 管理画面
 * 登録してあるお気に入り情報を検索する
 */
Route::get('adminfindfavorite', [App\Http\Controllers\AdminController::class, 'searchfavorite'])->name('findfavorite');

/**
 * 管理画面
 * 登録してあるお気に入り情報の一覧を表示する
 */
Route::get('adminindexfavorite', [App\Http\Controllers\AdminController::class, 'showfavorite'])->name('indexfavorite');

/**
 * 管理画面
 * お気に入り情報の新規登録画面を表示する
 */
Route::get('adminaddfavorite', [App\Http\Controllers\AdminController::class, 'newfavorite'])->name('addfavorite');

/**
 * 管理画面
 * お気に入り情報を新規で登録する
 */
Route::post('adminaddfavorite', [App\Http\Controllers\AdminController::class, 'storefavorite'])->name('addfavorite');

/**
 * 管理画面
 * 登録済みのお気に入り情報の編集画面を表示する
 */
Route::get('admineditfavorite', [App\Http\Controllers\AdminController::class, 'editfavorite'])->name('editfavorite');

/**
 * 管理画面
 * 登録済みのお気に入り情報を編集する
 */
Route::post('admineditfavorite', [App\Http\Controllers\AdminController::class, 'updatefavorite'])->name('editfavorite');

/**
 * 管理画面
 * 登録済みのお気に入り情報を削除する
 */
Route::get('admineditfavorite', [App\Http\Controllers\AdminController::class, 'deletefavorite'])->name('editfavorite');

/**
 * 管理画面
 * 登録してあるお問い合わせ情報を検索する
 */
Route::get('adminfindcontact', [App\Http\Controllers\AdminContactController::class, 'searchcontact'])->name('findcontact');

/**
 * 管理画面
 * 登録してあるお問い合わせ情報の一覧を表示する
 */
Route::get('adminindexcontact', [App\Http\Controllers\AdminContactController::class, 'showcontact'])->name('indexcontact');

/**
 * 管理画面
 * お問い合わせ情報の新規登録画面を表示する
 */
Route::get('adminaddcontact', [App\Http\Controllers\AdminContactController::class, 'newcontact'])->name('addcontact');

/**
 * 管理画面
 * お問い合わせ情報を新規で登録する
 */
Route::post('adminaddcontact', [App\Http\Controllers\AdminContactController::class, 'storecontact'])->name('addcontact');

/**
 * 管理画面
 * 登録済みのお問い合わせ情報の編集画面を表示する
 */
Route::get('admineditcontact', [App\Http\Controllers\AdminContactController::class, 'editcontact'])->name('editcontact');

/**
 * 管理画面
 * 登録済みのお問い合わせ情報を編集する
 */
Route::post('admineditcontact', [App\Http\Controllers\AdminContactController::class, 'updatecontact'])->name('editcontact');

/**
 * 管理画面
 * 登録済みのお問い合わせ情報を削除する
 */
Route::get('admindeletecontact', [App\Http\Controllers\AdminContactController::class, 'deletecontact'])->name('deletecontact');
