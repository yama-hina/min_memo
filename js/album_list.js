$(function () {
    let group_id = js_php;
    $.ajax({
        type: 'POST',
        url: '../js/album_list_ajax.php',
        data: {
            load: group_id
        },
        async: false,
        cache: false
    }).done(function (data) {
        console.log(data);
        if (data.length != 0) {
            for (let h = 0; h < data.length; h++) {
                let album_id = data[h]['id'];
                // アルバムの情報を取得して表示する
                $.ajax({
                    type: "POST",
                    url: "../js/load_js_1.php",
                    data: {
                        album_load: album_id,
                        group_load: group_id
                    },
                    async: false,
                    cache: false
                }).done(function (json) {
                    var list = JSON.parse(json);
                    console.log(list);
                    console.log(list[0]);

                    if (h % 3 == 0) {
                        $('#contena').append("<div class='album-line' id='line" + h + "'></div>");
                        var album_div = document.createElement('div');
                        album_div.id = "album" + album_id;
                        $(album_div).addClass("book");
                        $("#line" + h).append(album_div);
                        console.log(album_div);

                        var media_div = document.createElement('div');
                        media_div.id = "flipbook" + album_id;
                        $(media_div).addClass("flipbook");
                        $(album_div).append(media_div);

                        var hll_div = document.createElement('div');
                        hll_div.className = "hll";
                        $("#flipbook" + album_id).append(hll_div);
                        console.log(list[0]['backgroundImg']);
                        $(hll_div).append("<div class='title'>" + list[0][0].html + "</div>");
                        $(hll_div).append("<a class='book_a' href='./album_list.php?id=" + album_id + "'></a>");
                        var backgroundImgSrc = list[0]['backgroundImg'];
                        var newDiv = $("<div class='background_img'></div>");
                        if (backgroundImgSrc == '') {
                            $(hll_div).append(newDiv);
                        } else {
                            var newImg = $("<img class='' src='./../" + backgroundImgSrc + "'>");
                            newDiv.append(newImg);
                            $(hll_div).append(newDiv);
                        }

                    } else if (h % 3 == 1) {
                        var album_div = document.createElement('div');
                        album_div.id = "album" + album_id;
                        $(album_div).addClass("book");
                        $("#line" + Number(h - 1)).append(album_div);
                        var media_div = document.createElement('div');
                        media_div.id = "flipbook" + album_id;
                        $(media_div).addClass("flipbook");
                        $(album_div).append(media_div);
                        var hll_div = document.createElement('div');
                        hll_div.className = "hll";
                        $(hll_div).append("<div class='title'>" + list[0][0].html + "</div>");
                        $(hll_div).append("<a class='book_a' href='./album_list.php?id=" + album_id + "'></a>");
                        var backgroundImgSrc = list[0]['backgroundImg'];
                        var newDiv = $("<div class='background_img'></div>");
                        if (backgroundImgSrc == '') {
                            $(hll_div).append(newDiv);
                        } else {
                            var newImg = $("<img class='' src='./../" + backgroundImgSrc + "'>");
                            newDiv.append(newImg);
                            $(hll_div).append(newDiv);
                        }
                        $("#flipbook" + album_id).append(hll_div);
                    } else if (h % 3 == 2) {
                        var album_div = document.createElement('div');
                        album_div.id = "album" + album_id;
                        $(album_div).addClass("book");
                        $("#line" + Number(h - 2)).append(album_div);
                        var media_div = document.createElement('div');
                        media_div.id = "flipbook" + album_id;
                        $(media_div).addClass("flipbook");
                        $(album_div).append(media_div);
                        var hll_div = document.createElement('div');
                        hll_div.className = "hll";
                        $(hll_div).append("<div class='title'>" + list[0][0].html + "</div>");
                        $(hll_div).append("<a class='book_a' href='./album_list.php?id=" + album_id + "'></a>");
                        var backgroundImgSrc = list[0]['backgroundImg'];
                        var newDiv = $("<div class='background_img'></div>");
                        if (backgroundImgSrc == '') {
                            $(hll_div).append(newDiv);
                        } else {
                            var newImg = $("<img class='' src='./../" + backgroundImgSrc + "'>");
                            newDiv.append(newImg);
                            $(hll_div).append(newDiv);
                        }
                        $("#flipbook" + album_id).append(hll_div);
                    }
                })
                    .fail(function (json) {
                        console.log('MISS');
                    })
            }
        }
    })

    // アルバム本棚のタイトルスタイル
    $(".add_text").css({ 'lineHeight': '112px', 'width': '84px', 'whiteSpace': 'noWrap', 'overflow': 'hidden', 'textOverflow': 'ellipsis', 'textAlign': 'center' });
});
