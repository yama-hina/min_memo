$(function () {
    // グループIDの取得
    let group_id = js_php_g;
    // アルバムIDの取得
    let album_id = js_php_a;

    // データの取得と表示
    $.ajax({
        type: "POST",
        url: "../js/load_js_1.php",
        dataType: "json",
        data: {
            // アルバムid,グループidを送信
            album_load: album_id,
            group_load: group_id
        },
        async: false,
        cache: false
    })
        .done(function (json) {
            console.log(json);
            var all_pages_num = Object.keys(json).length;
            for (i = 0; i < all_pages_num; i++) {
                var div = $('<div>').attr('class', 'hll');
                if (i == 0) {
                    div.append('<div class="wall" style="display: none;"></div>');
                    div.append('<div class="title">' + json[0][0].html + '</div>');
                } else {
                    div.append('<div class="wall"></div>');
                    containerTag = $('<div>').addClass('container').attr('data-croffle-ref', 'element$' + Number(i - 1));
                    let targetLength = Number(Object.keys(json[i]).length) - 1;
                    for (j = 0; j < targetLength; j++) {
                        var targetTag = $('<div>').attr('class', json[i][j].className);
                        $(targetTag).attr('style', json[i][j].style);
                        $(targetTag).append(json[i][j].html);
                        $(containerTag).append(targetTag);
                    }
                    $(div).append(containerTag);
                }
                var bImg = $('<div>').addClass('background_img');
                bImg.addClass('element$' + Number(i - 1));
                $(bImg).append(json[i].backgroundImg);
                $(div).append(bImg);
                $('#flipbook').append(div);
            }
            console.log($('.container').slice(-1));
            $('.container').slice(-1).after("<div class='behind'></div>");
            $('.container').slice(-1).remove();
        })//失敗時
        .fail(function (error) {
            console.log("通信失敗");
            console.log("失敗", error.status, error.statusText);
        })//どちらでも
        .always(function () {
            console.log("処理終了");
        })

    // 本の縦幅 = スマホの横幅
    let book_height = window.parent.screen.width;

    // 比率
    let per = book_height / 30;

    // 本の横幅
    let book_width = per * 40;

    // サイズ
    $('#flipbook').turn({
        width: 400,
        height: 300,
        autoCenter: true
    });
});
