console.log('OK');
// $('#file_upload').on('change', function(){
//     // let file = $(this).prop('files')[0];
//     // $('#fileName').text(file.name);

//     let file = $(this).prop('files')[0];
//     $('#fileName').text(file.name);

// });


$(function(){
    $('#file_upload').change(function(){
        if ( !this.files.length ) {
            return;
        }
        $('#prev').text('');
    
        var $files = $(this).prop('files');
        var len = $files.length;
        for ( var i = 0; i < len; i++ ) {
            var file = $files[i];
            var fr = new FileReader();
    
            fr.onload = function(e) {
                var src = e.target.result;
                var img = '<img src="'+ src +'">';
                $('#prev').append(img);
            }
    
            fr.readAsDataURL(file);
        }
    
        // $('#preview').css({
        //     'display':'flex',
        // });
      
    });
  });

//「全て選択」のチェックボックス
let checkAll = document.getElementById("checkAll");
//「全て選択」以外のチェックボックス
let el = document.getElementsByClassName("checks");

//全てのチェックボックスをON/OFFする
const funcCheckAll = (bool) => {
    for (let i = 0; i < el.length; i++) {
        console.log(bool);
        el[i].checked = bool;
    }
}

//「checks」のclassを持つ要素のチェック状態で「全て選択」のチェック状態をON/OFFする
const funcCheck = () => {
    console.log(el[0].checked);
    let count = 0;
    for (let i = 0; i < el.length; i++) {
        if (el[i].checked) {
            count += 1;
        }
    }

    if (el.length === count) {
        checkAll.checked = true;
    } else {
        checkAll.checked = false;
    }
};

//「全て選択」のチェックボックスをクリックした時
// checkAll.addEventListener("click",() => {
//     funcCheckAll(checkAll.checked);
// },false);
$("#checkAll").on("click",function(){
    // 全選択の表示変更
    console.log("check");
    if($('#checkAll').text() === '全員選択'){
        $('#checkAll').text('選択解除');
        funcCheckAll(true);
    }
    else{
        $('#checkAll').text('全員選択');
        funcCheckAll(false);
    }
});

// $("#checkAll").css("display","block");


//「全て選択」以外のチェックボックスをクリックした時
for (let i = 0; i < el.length; i++) {
    el[i].addEventListener("click", funcCheck, false);
}


//写真削除のjs
// var del = [];
// $(document).on("touchstart" , '.delete_photo' , function(){
//     var aa = $(this).children().attr("class");
//     if(aa != 'border'){
//         $(this).children().addClass("border");
//     }
//     else{
//         $(this).children().removeClass("border");
//     }
// });
// $(document).on("touchstart" , '.img_delete' , function(){
//     var text = document.querySelectorAll(".border");
//     if(text === "" || text === null || text === undefined || text.length == 0){
//         console.log('aa');
//     }
//     else{
//         console.log(text[0].attributes[0].value);
//         for(var i = 0; i < text.length; i++){
//             del.push(text[i].attributes[0].value);
//         }
//         location.href = 'event_change.php?delete='+del;
//     }
// })
// searchWordの実行
$('#search-text').on('input', function(){
    let serch_txt;
    var fo_list = [];
    // 検索文字
    serch_txt = $(this).val();
    // labelをループ
    $('.boxes label').each(function(index) {
        if($(this).text() == serch_txt){
            fo_list.push($(this).prop('for'));
            $('.boxes label').css('display','none');
        }
    });
    if(fo_list.length != 0){
        $(fo_list).each(function(index){
            $('.boxes label[for="'+fo_list[index]+'"]').css('display','block');
        })
    }else{
        $('.boxes label').css('display','block');
    }

});

// イベントの日付に期間を自動で入力するjs
function copyDateValue() {
    var date1 = document.getElementById("start_date").value;
    document.getElementById("finish_date").value = date1;
  }