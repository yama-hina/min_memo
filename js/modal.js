const buttonOpen = document.getElementById('modalOpen');
const modal = document.getElementById('easyModal');
const buttonClose = document.getElementsByClassName('modalClose')[0];

console.log();

// ボタンがクリックされた時
buttonOpen.addEventListener('click', modalOpen);
function modalOpen() {
    // let cookie = document.cookie;
    // console.log(cookie);
    // if(cookie != ''){
    //   window.location.href = './group_list.php';
    //   console.log('aaa');
    console.log('click');
    modal.style.display = 'block';
}

// バツ印がクリックされた時
buttonClose.addEventListener('click', modalClose);
function modalClose() {
  modal.style.display = 'none';
}

// モーダルコンテンツ以外がクリックされた時
addEventListener('click', outsideClose);
function outsideClose(e) {
  if (e.target == modal) {
    modal.style.display = 'none';
  }
}