/**
 * confirm_dialog
 * 登録する前に確定させるAlertを表示する
 * @param {string} msg
 * @returns
 */
function confirm_dialog(msg) {
    // 確認ダイアログ
    var result = window.confirm(msg);

    if (result) {
        // OKがクリックされました
        return true;
    } else {
        // キャンセルがクリックされました
        return false;
    }
}

/**
 * delete_confirm_dialog
 * 削除する前に確定させるAlertを表示する
 * @param {string} msg
 * @param {string} url
 * @returns
 */
function delete_confirm_dialog(msg, url) {
    // 確認ダイアログ
    var result = window.confirm(msg);

    if (result) {
        // OKがクリックされたら、指定のデータ削除処理（url）に転送する
        window.location.href = url;
        // return true;
    } else {
        // キャンセルがクリックされました
        return false;
    }
}


// サイドバークリックしたら色変わる処理
    const listItems = document.querySelectorAll(".sidebar li");
// サイドバーの中のリストを取得する
function activeLink() {
    listItems.forEach((item) => item.classList.remove("active"));

            this.classList.add("active");
        }
        listItems.forEach((item) => {
            item.addEventListener("click", activeLink);
        });



        // ヘッダーの設定
// ページが読み込まれた後に処理を実行する
    // window.onload = function () {
        // ナビゲーションのリンク要素を取得
        // const navLinks = document.querySelectorAll(".navList a");

        // リンク要素にクリックイベントを追加
        // navLinks.forEach(link => {
        //     link.addEventListener("click", function (event) {
                // event.preventDefault(); // リンクのデフォルトの挙動（ページ遷移）をキャンセル
                // this.style.color = "white"; // クリックされたリンクの文字色を変更
    //         });
    //     });
    // };


// サイドバー
// var $subNav = $('#sub-nav');

// $('.sub-menu > a').on('click', function (e) {
//     e.preventDefault();
//     var index = $(this).parent().index() + 1;
//     $subNav.find('#sub-nav' + index).addClass('is-active');

//     $('#sidebar').addClass('is-open-submenu');
// });

// サブメニューのタイトルをクリックすると閉じる
// $('.sub-menu-head').on('click', function () {
//     $(this).parent().removeClass('is-active');
//     $('#sidebar').removeClass('is-open-submenu');
// });
