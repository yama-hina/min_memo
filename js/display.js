// 縦向きの時にアラート出すやつ
$(window).on('load orientationchange resize', function () {
    // angle:画面の向き感知
    let angle = screen && screen.orientation && screen.orientation.angle;
    console.log(angle);
    if (angle === undefined) {
        angle = window.orientation;    // iOS用
    }

    if (angle === 0) {
        alert("スマートフォンを横画面にしてください");
    }
});