// グループIDの取得
let group_id = js_php_g;

// アルバムIDの取得
let album_id = js_php_a;

// ページ数
let totalpage = 0;

let lastElementNumber = null;

let targets = [];
let moveables = [];
let selectos = [];
// 画像選択中かどうか

const ABCList = { 0: "A", 1: "B", 2: "C", 3: "D", 4: "E", 5: "F", 6: "G", 7: "H", 8: "I", 9: "J", 10: "K", 11: "L", 12: "M", 13: "N", 14: "O", 15: "P", 16: "Q", 17: "R", 18: "S", 19: "T", 20: "U", 21: "V", 22: "W", 23: "X", 24: "Y", 25: "Z" };

var phone_flg = false;
var orientation = screen && screen.orientation && screen.orientation.angle;
if (orientation != 0) {
    loadBook();
}


$(window).on('load orientationchange resize', function () {
    orientation = screen && screen.orientation && screen.orientation.angle;
    setTimeout(function () {
        if (orientation != 0 && phone_flg == false) {
            loadBook();
        }
    }, 100);
})

let beforePage = 1;
let page = null;
let element = null;

// タップ開始時ページめくりの無効化＆ページリセット
$(document).on("touchstart", ".target", function () {
    let now_page = $(this).parents().eq(3).attr("page");
    $("#flipbook").turn("page", now_page).turn("stop");
    $("#flipbook").turn("disable", true);
    var containerTag = $(this).parent();
    $(this).remove();
    containerTag.append(this)
    now_target = $(this);
});

// タップ終了時ページめくりの有効化
$(document).on("touchend", ".target", function () {
    $("#flipbook").turn("disable", false);
});

// ページつかんだ時に画像選択の解除
$("#flipbook").on("start", function (event, pageObject, corner) {
    imgSelectDown();
});

// 回転・拡大縮小 開始時
$(document).on("touchmove", ".moveable-control", function () {
    $("#flipbook").turn("disable", true);
});
// 回転・拡大縮小　終了時
$(document).on("touchend", ".moveable-control", function () {
    $("#flipbook").turn("disable", false);
});

// 壁タップ時 
$(document).on("touchend", ".wall", function () {
    var wall = $(this);
    setTimeout(function () {
        console.log('aaa');
        console.log(wall);
        $('.wall').css("display", "block");
        $(wall).css("display", "none");
        element = $(wall).next().data("croffleRef");
        imgSelectDown();
    }, 10);
});

// ページ背景のタップ時
$(document).on('touchstart', '.background_img', function () {
    imgSelectDown();
})

// 画像タップ時追加
$(document).on('click', '.img_stack', function (e) {
    var src = $(e.target).attr("src");
    if (element != null && element != 'element$-1' && element) {
        // element番号
        let mark = element.slice(-1);
        // elementタグ
        let tag = $('.target' + ABCList[mark]).slice(-1)[0];
        // targetクラス
        let tagClass = $(tag).attr('class');

        if (tagClass == undefined) {
            let changeNumber = 1;
            $("div[data-croffle-ref='" + element + "']").append("<div class='target target" + ABCList[mark] + " target" + changeNumber + "'><img src='./" + src + "' width='100px' height='auto' alt=''></div>");
        } else {
            let tagNumebr = tagClass.split(' ')[2];
            // 追加するtarget番号
            let changeNumber = Number(tagNumebr.slice(-1)) + 1;
            $("div[data-croffle-ref='" + element + "']").append("<div class='target target" + ABCList[mark] + " target" + changeNumber + "'><img src='./" + src + "' width='100px' height='auto' alt=''></div>");
        }
    }
});

// 削除ボタンタップ時
$(document).on('touchstart', '.remove_button', function () {
    $(now_target[0]).remove();
});


// 背景画像タップ時追加
$(document).on('click', '.img_background_stack', function (e) {
    var src = $(e.target).attr("src");
    console.log(src);
    console.log(element);
    if (element == null || element == 'element$-1') {
        console.log('aaa');
        $('.element\\$-1').children().remove();
        $('.element\\$-1').append("<img class='' src='" + src + "'></img>");
    } else {
        $('.' + CSS.escape(element)).children().remove();
        $('.' + CSS.escape(element)).append("<img class='' src='" + src + "'></img>");
    }
});

// ページめくり時
$("#flipbook").bind("end", function (event, pageObject, Turn) {
    if (Turn) {
        beforePage = pageObject.next - 1;
        if (pageObject.page < pageObject.next) {
            page = pageObject.page;
        } else {
            page = pageObject.next - 1;
        }
        element = 'element$' + Number(page - 1);
        let elementNumber = element.slice(-1);
        if (page == 0) {
            $('.wall').css("display", "block");
            $('.title').prev().css("display", 'none');
        }
        else if (lastElementNumber < elementNumber) {
            $('.wall').css("display", "block");
            $('.behind').prev().css("display", 'none');
        }
        else {
            $('.wall').css("display", "block");
            $("div[data-croffle-ref='" + element + "']").prev().css("display", "none");
        }
    }
});

// ottion_button系
$('.btn_img').on('click', function () {
    for (let i = 0; i < 4; i++) {
        let child = $('#vPreview').children()[i];
        $(child).attr('style', 'display:none');
    }
    $('.img_area').removeAttr('style');
})


$('.btn_background').on('click', function () {
    for (let i = 0; i < 4; i++) {
        let child = $('#vPreview').children()[i];
        $(child).attr('style', 'display:none');
    }
    $('.img_background_area').removeAttr('style');
})


$('.btn_stamp').on('click', function () {
    for (let i = 0; i < 4; i++) {
        let child = $('#vPreview').children()[i];
        $(child).attr('style', 'display:none');
    }
    $('.stump_area').removeAttr('style');
})


$('.btn_text').on('click', function () {
    for (let i = 0; i < 4; i++) {
        let child = $('#vPreview').children()[i];
        $(child).attr('style', 'display:none');
    }
    $('.text_area').removeAttr('style');
})


// 編集完了ボタン
$('.album_ediding_end').on("click", function () {
    console.log('aaa');
    let editing = 1;
    // イベントID　例：1,2
    var divsJsons = {};
    var hlls = $('.page');
    for (var i = 0; i < hlls.length; i++) {
        var divsJson = {};
        var baImg = $(hlls[i]).find('.background_img').html();
        if (baImg != '') {
            divsJson['backgroundImg'] = $(baImg).attr('src').replace('../', '');
        } else {
            divsJson['backgroundImg'] = '';
        }
        if (i == 0) {
            let top_tag = $(hlls[i]).find('.title');
            var mediaDiv = {
                style: top_tag.attr('style'),
                className: top_tag.attr('class'),
                html: top_tag.html()
            };
            divsJson[0] = mediaDiv;
            console.log(divsJson);
        } else {
            var targetList = $(hlls[i]).find('.container').find('.target');
            for (var j = 0; j < targetList.length; j++) {
                var imgSrc = $(targetList[j]).html();
                var mediaDiv = {
                    style: $(targetList[j]).attr('style'),
                    className: $(targetList[j]).attr('class'),
                    html: $(imgSrc).attr('src').replace('./../', '')
                };
                divsJson[j] = mediaDiv;
            }
        }
        divsJsons[i] = divsJson;
    }
    console.log(divsJsons);
    var outputString = JSON.stringify(divsJsons);
    $.ajax({
        type: 'post',
        dataType: 'text',
        data: {
            'data': outputString,
            album_id: album_id,
            flg: editing
        },
        cache: false,
        url: "../js/save_js_1.php"
    }).done(function (data) {
        window.location.href = "./album_detail.php";
    })//失敗時
        .fail(function (error) {
            console.log("通信失敗");
            console.log("失敗", error.status, error.statusText);
        })//どちらでも
        .always(function () {
            console.log("処理終了");
        })
});

function loadBook() {
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
            totalpage = all_pages_num;
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
                        $(targetTag).append('<img src="./../' + json[i][j].html + '" width="100px" height="auto" alt="">');
                        $(containerTag).append(targetTag);
                    }
                    $(div).append(containerTag);
                }
                var bImg = $('<div>').addClass('background_img');
                bImg.addClass('element$' + Number(i - 1));
                if (json[i].backgroundImg != '') {
                    $(bImg).append('<img class = "" src="./../' + json[i].backgroundImg + '">');
                }
                $(div).append(bImg);
                $('#flipbook').append(div);
            }
            console.log($('.container').slice(-1));
            $('.container').slice(-1).after("<div class='behind'></div>");
            $('.container').slice(-1).remove()
        })//失敗時
        .fail(function (error) {
            console.log("通信失敗");
            console.log("失敗", error.status, error.statusText);
        })//どちらでも
        .always(function () {
            console.log("処理終了");
        })

    // 削除ボタン
    const Editable = {
        name: "editable",
        props: [],
        events: [],
        render(moveable, React) {
            const rect = moveable.getRect();
            const { pos2 } = moveable.state;
            const EditableViewer = moveable.useCSS("div", `
        {
            position: absolute;
            left: 10px;
            top: 0px;
            will-change: transform;
            transform-origin: 0px 0px;
        }
        .remove_button {
            position: absolute;
            width: 16px;
            height: 16px;
            text-align:center;
            background: #4af;
            border-radius: 4px;
            appearance: none;
            border: 0;
            color: white;
        }
            `);
            return React.createElement(EditableViewer, {
                key: "editable-viewer",
                className: "moveable-editable",
                style: {
                    transform: `translate(${pos2[0]}px, ${pos2[1]}px) rotate(${rect.rotation}deg) translate(10px)`
                }
            }, [
                "\n            ",
                React.createElement("button", {
                    className: "remove_button"
                }, [
                    "×"
                ]),
                "\n            "
            ]);
        }
    };

    // Moveableのオプション設定
    const moveableOptions = {
        target: targets,
        draggable: true,
        throttleDrag: 1,
        edgeDraggable: false,
        startDragRotate: 0,
        throttleDragRotate: 0,
        scalable: true,
        keepRatio: true,
        throttleScale: 0,
        renderDirections: ["nw", "n", "ne", "w", "e", "sw", "s", "se"],
        rotatable: true,
        throttleRotate: 0,
        rotationPosition: "top",
        ables: [Editable],
        props: { editable: true }
    };

    // Selectoのオプション設定
    const selectoOptions = {
        selectableTargets: null,
        hitRate: 0,
        continueSelect: false,
        selectFromInside: false,
        ratio: 0
    };

    for (let i = 0; i < Number(totalpage - 2); i++) {
        const pageElement = document.querySelector(`[data-croffle-ref="element$${i}"]`);
        const moveableId = ABCList[i];

        // Moveableのインスタンスを作成
        const moveable = new Moveable(pageElement, moveableOptions);
        moveables.push(moveable);

        // Selectoのインスタンスを作成
        selectoOptions.container = pageElement;
        selectoOptions.selectableTargets = [`.target${moveableId}`];
        const selecto = new Selecto(selectoOptions);
        selectos.push(selecto);

        // 移動
        moveables[i].on("drag", e => {
            e.target.style.transform = e.transform;
        });
        // 拡大縮小
        moveables[i].on("scale", e => {
            e.target.style.transform = e.drag.transform;
        });
        // 回転
        moveables[i].on("rotate", e => {
            e.target.style.transform = e.drag.transform;
        });

        selectos[i].on("dragStart", e => {
            if ($(e.currentTarget.container).prev().attr('style') == 'display: none;') {
                const target = e.inputEvent.target;
                if (moveable.isMoveableElement(target) || targets.some(t => t === target || t.contains(target))) {
                    e.stop();
                }
            }
        });

        selectos[i].on("selectEnd", e => {
            if (e.isDragStart) {
                e.inputEvent.preventDefault();
                moveable.waitToChangeTarget().then(() => {
                    moveable.dragStart(e.inputEvent);
                });
            }
            moveable.target = e.selected;
        });
    }
    phone_flg = true;
    $("#flipbook").turn({
        width: 400,
        height: 300,
        autoCenter: true,
        disable: false
    });
    lastElementNumber = $('.container').slice(-1).attr('data-croffle-ref').slice(-1);
}

function imgSelectDown() {
    for (let i = 0; i < selectos.length; i++) {
        if (selectos[i].selectedTargets[0] != undefined) {
            moveables[i].target = [];
        }
    }
    $(selectos[0].target).removeAttr('style');
}