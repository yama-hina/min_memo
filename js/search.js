
console.log('ok');

$('#sbtn').on('click', (event) =>{
    event.preventDefault();
    $("#search-tex").empty();

    console.log('送信クリック');

    // // アイコン変更
    // $('#search-text').css('background-image',"data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24'><path fill='%23ffffff' d='M15,14C12.33,14 7,15.33 7,18V20H23V18C23,15.33 17.67,14 15,14M6,10V7H4V10H1V12H4V15H6V12H9V10M15,12A4,4 0 0,0 19,8A4,4 0 0,0 15,4A4,4 0 0,0 11,8A4,4 0 0,0 15,12Z' /></svg>")
    // //検索ボタンを隠す
    // $('#sbtn').css('display', 'none');
    // //中の文字を消す
    // $('#search-text').removeAttr('placeholder');
    // $('#search-text').css('color', 'transparent');
    // $('#search-wrap').css('width', '60%');

    const search = $('#search-text').val();

    $.ajax({
        type: 'GET',
        data: {
            code: search,
        },
        url: '../js/search_ajax.php',
        caches: false
    })

    .done((data) => {
        console.log(data);
        $("#search_result").empty();

        const id = (data.id);
        const name = (data.name);
        const icon = (data.icon);
        const joinid = (data.invitation);

        $("#search_result").append(
            "<div id='Modal' class='modal'>" +
                "<div class='modal-content'>" +
                    "<div class='modal-header'>" +
                        "<span class='modalClose'>×</span>" +
                    "</div>" +
                    "<div class='modal-body'>" +
                        "<h2>" + name + "</h2>" +
                        "<div class='icon_big'><img src='" + icon + "'></div>" +
                        "<form action='./invitation.php' method='GET'enctype = 'multipart/form-data'>" +
                            "<div class='longBtnDarkOrange'><button type='submit' class='button' name='group_id' value='"+ joinid +"'>参加する</button></div>" +
                        "</form>" +
                    "</div>" +
                "</div>" +
            "</div>"
        );

        const modal = document.getElementById('Modal');
        modal.style.display = 'block';

        const buttonClose = document.getElementsByClassName('modalClose')[1];

        buttonClose.addEventListener('click', modalClose);
        function modalClose() {
            modal.style.display = 'none';
            $('#sbtn').css('display', 'block');
        }

        addEventListener('click', outsideClose);
        function outsideClose(e) {
          if (e.target == modal) {
            modal.style.display = 'none';
            $('#sbtn').css('display', 'block');
          }
        }
    })
    .fail((data => {
        console.log('no');

        $("#search_result").append(
            "<div id='Modal' class='modal'>" +
                "<div class='modal-content'>" +
                    "<div class='modal-header'>" +
                        "<span class='modalClose'>×</span>" +
                    "</div>" +
                    "<div class='modal-body'>" +
                        "<br>" +
                        "<br>" +
                        "<br>" +
                        "<br>" +
                        "<h2>招待コードが間違っています</h2>" +
                    "</div>" +
                "</div>" +
            "</div>"
        );
        const modal = document.getElementById('Modal');
        modal.style.display = 'block';

        const buttonClose = document.getElementsByClassName('modalClose')[1];

        buttonClose.addEventListener('click', modalClose);
        function modalClose() {
            modal.style.display = 'none';
            $('#sbtn').css('display', 'block');
        }
        addEventListener('click', outsideClose);
        function outsideClose(e) {
          if (e.target == modal) {
            modal.style.display = 'none';
            $('#sbtn').css('display', 'block');
          }
        }


    }))
})


