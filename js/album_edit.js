$('form').submit(function (e) {
    // フォームの送信を防止
    e.preventDefault();

    var img_stack = $(".eventContents");
    var img_stack2 = $(".img_stack");

    var add_id = [];
    for (var i = 0; i < img_stack.length; i++) {
        if ($(img_stack[i]).data("img_situation") == 1) {
            add_id.push($(img_stack2[i]).attr("id"));
        }
    }

    let err = 0
    var title = $('input[name="title"]').val();
    title = escapeSelectorString(title);
    var page = $('select[name="page"]').val();

    $('.title_error').empty();
    if (title == '') {
        $('.title_error').append('タイトルを入力してね');
        err = 1;
    }

    $('.page_error').empty();
    if (page == '') {
        $('.page_error').append('ページ数を選んでね');
        err = 1;
    }

    $('.event_error').empty();
    if (add_id.length == 0) {
        $('.event_error').append('イベントを選んでね');
        err = 1;
    }
    var form = this;
    console.log(form);
    if (!err) {
        var bgDiv = $('<div>').attr('class','bg');
        var loaderDIv = $('<div>').attr('id', 'loader');
        console.log(loaderDIv);
        loaderDIv.append('<img src="../img/phone.png" alt="" class="rotate" width = "80px" height = "auto">');
        var roteDiv = $('<p>').addClass('rote');
        roteDiv.append('横画面でご覧ください！');
        loaderDIv.append(roteDiv);
        bgDiv.append(loaderDIv);
        $('#load').append(bgDiv);
        setTimeout(function(){
            form.submit();
        },2950)
    } else {
        window.scroll({ top: 0, behavior: 'smooth' });
    }
});

// 追加画像選択：枠表示＆flag管理
$(document).on("click", ".eventContents", function () {
    var imgSituation = $(this).data("img_situation");

    if (imgSituation == 1) {
        $(this).data("img_situation", 0);
        $(this).css({ "border": "" });
    } else {
        $(this).data("img_situation", 1);
        $(this).css({ "border": "5px solid #FFA500" });
        $(this).css({ "border-radius": "10px" });
    }

    console.log($(this).data("img_situation"));
});

// エスケープ処理
function escapeSelectorString(val) {
    return val.replace(/[ !"#$%&'()*+,.\/:;<=>?@\[\\\]^`{|}~]/g, "\\$&");
}

$("#page").on("click", function () {
    $(this).parent(".custom-select").toggleClass("open");
});

$(document).click(function (e) {
    var container = $(".custom-select");

    if (container.has(e.target).length === 0) {
        container.removeClass("open");
    }
});

$("#page").on("change", function () {
    var selection = $(this).find("option:selected").text();
    var labelFor = $(this).attr("id");
    var label = $("[for='" + labelFor + "']");

    label.find(".selection-choice").html(selection);
});


// 年月検索
$("#year").on("change", function (e) {
    $.ajax({
        type: 'POST',
        url: '../js/album_serch.php',
        data: {
            title: $('#title_serch').val(),
            year: $('#year').val()
        }
    }).done(function (e) {
        var list = JSON.parse(e);
        $('.event').css('display', 'none');
        for (let i = 0; i < $('.event').length; i++) {
            for (j = 0; j < list.length; j++) {
                if ($('label').eq(i).attr('id') == list[j]['event_id']) {
                    $('.event').eq(i).css('display', 'block');
                }
            }
        }
    }).fail(function () {
        console.log('失敗');
    })
});


// タイトル検索
$('#title_serch_button').on('click', function (e) {
    e.preventDefault();
    $.ajax({
        type: 'POST',
        url: '../js/album_serch.php',
        data: {
            title: $('#title_serch').val(),
            year: $('#year').val()
        }
    }).done(function (e) {
        var list = JSON.parse(e);
        $('.event').css('display', 'none');
        for (let i = 0; i < $('.event').length; i++) {
            for (j = 0; j < list.length; j++) {
                if ($('label').eq(i).attr('id') == list[j]['event_id']) {
                    $('.event').eq(i).css('display', 'block');
                }
            }
        }
    }).fail(function () {
        console.log('失敗');
    })
});
