console.log('OK');

//検索ボタン
//フォーカスされたとき

$("#form").focusin(function(e){ 
  console.log('フォーカス');
  //検索ボタンを出す
  $('#sbtn').css('opacity', '1');
  //中の文字を設定する
  // $('#search-text').css('background-image', 'url(../img/material/cross.png)');
  // $('#search-text').addClass("icon");
  $('#search-text').attr('placeholder', 'グループの招待コードを入力する');
  $('#search-text').css('color', 'black');
  $('#search-wrap').css('width', '96%');
  //いらない要素全部消す
  $('#modalOpen').css('opacity', '0');
  $('#mypage').css('opacity', '0');
  $('#headerText').css('opacity', '0');
});

//メインがクリックされたら
$("#form").focusout(function(e){
    console.log('はずれたよ');
    // アイコン変更
    $('#search-text').css('background-image',"data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24'><path fill='%23ffffff' d='M15,14C12.33,14 7,15.33 7,18V20H23V18C23,15.33 17.67,14 15,14M6,10V7H4V10H1V12H4V15H6V12H9V10M15,12A4,4 0 0,0 19,8A4,4 0 0,0 15,4A4,4 0 0,0 11,8A4,4 0 0,0 15,12Z' /></svg>")
    // クラス削除
    // $("search-text").removeClass("icon");
    //検索ボタンを隠す
    // $('#sbtn').css('display', 'none');
    $('#sbtn').css('opacity', '0');
    //中の文字を消す
    $('#search-text').removeAttr('placeholder');
    $('#search-text').css('color', 'transparent');
    $('#search-wrap').css('width', '60%');
    //必要なの全部出す
    $('#modalOpen').css('opacity', '1');
    $('#mypage').css('opacity', '1');
    $('#headerText').css('opacity', '1');
});


