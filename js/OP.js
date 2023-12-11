// const buttonOpen = document.getElementById('modalOpen');
// const modal = document.getElementById('easyModal');
// const buttonClose = document.getElementsByClassName('modalClose')[0];

// console.log();

// // ボタンがクリックされた時
// buttonOpen.addEventListener('click', modalOpen);
// function modalOpen() {
//     let cookie = document.cookie;
//     console.log(cookie);
//     if(cookie != ''){
//       window.location.href = './group_list.php';
//       console.log('aaa');
//     }else{
//       modal.style.display = 'block';
      
//     }
// }

// // バツ印がクリックされた時
// buttonClose.addEventListener('click', modalClose);
// function modalClose() {
//   modal.style.display = 'none';
// }

// // モーダルコンテンツ以外がクリックされた時
// addEventListener('click', outsideClose);
// function outsideClose(e) {
//   if (e.target == modal) {
//     modal.style.display = 'none';
//   }
// }


document.body.addEventListener('click', function() {

  function checkCookieExists(cookieName) {
  var cookies = document.cookie.split(';');

  for (var i = 0; i < cookies.length; i++) {
    var cookie = cookies[i].trim();

    // クッキーの名前が一致するかを判定
    if (cookie.startsWith(cookieName + '=')) {
      return true;
    }
  }

  return false;
}

// "user_id"クッキーが存在するかを判定
if (checkCookieExists('user_id')) {
  location.assign('./top.php');
} else {
  location.assign('./login.php');
}

});
