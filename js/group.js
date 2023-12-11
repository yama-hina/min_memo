function submitForm() {
    document.getElementById("form").submit();
}

var jsArray = null;
var eventElements = document.querySelectorAll('.event.background');

// ページロード後に実行
window.onload = function() {
    // AjaxでJSONデータを取得してグローバル変数にセット
    jsArray = getJsonData();
    console.log(jsArray);

    jsArray.forEach(function(subArray) {
        if (subArray['judge']) {
            var eventId = subArray['event_id'];
            var targetElement = document.querySelector('.event.background[id="' + eventId + '"]');
            if (targetElement) {
                targetElement.style.backgroundImage = 'url(../group/' + subArray['group_id'] + '/event_img/' + eventId + '/group' + subArray['group_id'] + '_' + subArray['id'] + '.' + subArray['extension'] + ')';
                // JSで生成された背景にスタイルを適用（疑似要素を使用できないのでfilterを使わず、文字を縁取りするように変えました）
                // background-repeat
                targetElement.style.backgroundRepeat = 'no-repeat';
                targetElement.style.backgroundPosition = 'center center';
                targetElement.style.backgroundSize = 'cover';

            }
        }
    });
};
