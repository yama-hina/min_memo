const options = {

    // 「Next」ボタンの表示テキストを変更
    nextLabel: "次へ",

    // 「Back」ボタンの表示テキストを変更
    prevLabel: "戻る",

    finishLabel: "終了"

};

const tg = new tourguide.TourGuideClient(options);



$("#chutorial_btn").click(function(){
    tg.start();
});



