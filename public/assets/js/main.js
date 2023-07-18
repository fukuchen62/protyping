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
