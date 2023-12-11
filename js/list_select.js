$(document).ready(function() {
    loadContent('group_list.php'); // 最初のファイルを読み込む関数を呼び出す
  });

$("#group").on("click" , function(){
    loadContent('group_list.php'); // 最初のファイルを読み込む関数を呼び出す
});
$("#schedule").on("click" , function(){
    loadContent('schedule_list.php'); // 最初のファイルを読み込む関数を呼び出す
});

function loadContent(filename) {
    $.ajax({
      url: filename,
      dataType: 'html',
      success: function(result) {
        $("#content").html(result); // レスポンスをcontent要素に表示
      },
      error: function() {
        $("#content").html("エラーが発生しました"); // エラーメッセージを表示
      }
    });
  }