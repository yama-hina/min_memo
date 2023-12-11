
var scheduleList = []; // 予定を格納する配列
var mapJSON = "";

// セッションの取得の関数
function getSessionData() {
  var xhr = new XMLHttpRequest();
  xhr.open('GET', 'get_session_data.php', true);
  
  xhr.onreadystatechange = function() {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        var sessionData = JSON.parse(xhr.responseText);
        console.log(sessionData.sessionData1);
        console.log(sessionData.sessionData2);
        // セッションデータを使用する後続の処理
      } else {
        console.error('セッションデータの取得に失敗しました');
      }
    }
  };
  
  xhr.send();
}


document.getElementById('bookmark').addEventListener('submit', function (event) {
  event.preventDefault(); // フォームのリロードをキャンセル
  // 以下にフォームデータの取得や非同期送信などの処理を記述する
  var title = document.getElementById("comment").value;
  var day = document.getElementById("day").value;
  //var time = document.getElementById("time").value;
  var hour = document.getElementById("hour").value;
  var minute = document.getElementById("minute").value;
  var url = document.getElementById("url").value;
  var imgInput = document.getElementById("fileUpload");
  // 入力値が空でない場合のみ処理を実行
  if (title !== "" && hour !== "" && minute !== "" && day !== "") {
    const formData = new FormData();
    // 選択された画像ファイルをフォームデータに追加
    for (let i = 0; i < imgInput.files.length; i++) {
      formData.append('img[]', imgInput.files[i]);
    }
    const time = `${hour.toString().padStart(2, '0')}:${minute.toString().padStart(2, '0')}`;

    // 画像の保存とデータベースの処理を非同期で行い、既に登録されている場合は、登録する画像のファイル名のみを返す
    const xhr = new XMLHttpRequest();
    xhr.open('POST', '../js/img_save.php');

    xhr.onload = function () {
      if (xhr.status === 200) {
        if (document.getElementById("fileUpload").value !== "") {
          response = JSON.parse(xhr.responseText);
          if (mapJSON !== "") {
            var schedule = {
              title: title,
              day: day,
              time: time,
              url: url,
              img: response.img,
              map: mapJSON
            };
          }
          else {
            var schedule = {
              title: title,
              day: day,
              time: time,
              url: url,
              img: response.img
            };
          }

        } else {
          if (mapJSON !== "") {
            var schedule = {
              title: title,
              day: day,
              time: time,
              url: url,
              map: mapJSON
            };
          }
          else {
            var schedule = {
              title: title,
              day: day,
              time: time,
              url: url
            };

          }
        }
        fetch('../js/get_echojson.php')
          .then(response => response.json())
          .then(data => {
            
            data.push(schedule)
            sortScheduleList(data); // 予定を時間順に並び替え
            // scheduleListをJSON形式に変換

            const scheduleListJSON = JSON.stringify(data);
            console.log(scheduleListJSON);
            //jsonをフォルダに非同期で保存 
            get_JSON(scheduleListJSON);
          })
          .catch(function(){
            var scheduleListJSON = JSON.stringify(schedule);
            //jsonをフォルダに非同期で保存 
            scheduleListJSON = "[" + scheduleListJSON + "]";
            get_JSON(scheduleListJSON);
          })



        // 入力フィールドをクリアする
        document.getElementById("comment").value = "";
        document.getElementById("time").value = "";
        document.getElementById("day").value = "";
        document.getElementById("fileUpload").value = "";
        document.getElementById("url").value = "";
        




      } else {
        // 接続がされなかった場合の処理
        console.error('An error occurred while uploading the image.');
      }
    };
    xhr.send(formData);
  }


  // 年月日で並び替える関数
  function sortScheduleList(data) {
    data.sort(function (a, b) {
      // 日付と時間を組み合わせて新しい値を作成
      var datetimeA = new Date(a.day + " " + a.time);
      var datetimeB = new Date(b.day + " " + b.time);

      // 新しい値を比較してソート
      return datetimeA - datetimeB;
    });
  }
});

// PHPからJSONデータを非同期で取得し表示
function json_encode_php() {
  let t = 0;
  var xhr = new XMLHttpRequest();
  xhr.open('GET', '../js/get_session_data.php', true);
  
  xhr.onreadystatechange = function() {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        var sessionData = JSON.parse(xhr.responseText);
        console.log(sessionData.group_id);
        console.log(sessionData.event_id);
        fetch('../js/get_echojson.php')
    .then(response => response.json())
    .then(data => {
      //jsonデータをループで表示 
      data.forEach((item , index) => {
        // 要素を追加する場所を指定
        var targetElement = document.getElementById('table'); // 追加したい要素のIDを指定
        

        if (index > 0) {
          let prevData = data[index - 1];
          let prevDate = prevData.day; // 前の要素の日付
          let prevTime = prevData.time; // 前の要素の時間
          // 前の要素と日付・時間が同じ場合に条件判定を行う
          console.log(prevDate);
          if (item.day === prevDate) {
            console.log("aa");
            // 条件を満たす場合の処理
              let trElement = document.createElement("tr");
              let tdElement1 = document.createElement("td");
              let tdElement2 = document.createElement("td");
              var pElement = document.createElement('p');
              var pElement1 = document.createElement('p');
              var pElement2 = document.createElement('p');
              var pElement3 = document.createElement('p');
              var pElement4 = document.createElement('p');

              let content1 = document.createTextNode(item.time);
              tdElement1.appendChild(content1);

              var deleteButton = document.createElement("button");
              deleteButton.textContent = "削除";
              deleteButton.dataset.index = t; // 削除ボタンにインデックスを設定
              pElement.appendChild(deleteButton);
              t++

              pElement1.textContent = item.title;
              tdElement2.appendChild(pElement);
              tdElement2.appendChild(pElement1);


                // img img 要素を作成
              if (data && item.img) {
                  if (data && Array.isArray(item.img)) {
                  item.img.forEach(val => {
                    var imgElement = document.createElement('img');
                    imgElement.id = "add_img";
                    // src テキストを設定
                    imgElement.src = "../group/" + sessionData.group_id + "/bookmark_img/" + sessionData.event_id + "/" + val;
                    pElement2.appendChild(imgElement);
                    tdElement2.appendChild(pElement2);
                  });
                }else{
                  var imgElement = document.createElement('img');
                  imgElement.id = "add_img";
                  // src テキストを設定
                  imgElement.src = "../group/" + sessionData.group_id + "/bookmark_img/" + sessionData.event_id + "/" + item.img;
                  pElement2.appendChild(imgElement);
                  tdElement2.appendChild(pElement2); 
                }
              }

                // url url 要素を作成
              if (data && item.url && item.url !== "") {
                var urlElement = document.createElement('a');
                // titleをてきすとに設定
                urlElement.textContent = item.url;
                // 要素を追加
                urlElement.href = item.url;
                pElement3.appendChild(urlElement);
                tdElement2.appendChild(pElement3);
              }

              if(data && item.map && item.map !== ""){
                  var aElement = document.createElement('a');
                  aElement.id = "mapURL";
                  // src テキストを設定
                  aElement.textContent = item.map.name
                  aElement.href = item.map.url;
                  pElement4.appendChild(aElement);
                  tdElement2.appendChild(pElement4);
              }
              trElement.appendChild(tdElement1);
              trElement.appendChild(tdElement2);
              targetElement.appendChild(trElement);
          }else{
            console.log("bb");
            // 条件を満たす場合の処理
            let trElement = document.createElement("tr");
            let tdElement1 = document.createElement("td");
            let tdElement2 = document.createElement("td");
            var pElement = document.createElement('p');
            var pElement1 = document.createElement('p');
            var pElement2 = document.createElement('p');
            var pElement3 = document.createElement('p');
            var pElement4 = document.createElement('p');
            const dateObject = new Date(item.day);
            let content = document.createTextNode(dateObject.getDate() + "日");

            tdElement1.appendChild(content);
            let content1 = document.createTextNode(item.time);
            tdElement1.appendChild(content1);

            var deleteButton = document.createElement("button");
            deleteButton.textContent = "削除";
            deleteButton.dataset.index = t; // 削除ボタンにインデックスを設定
            pElement.appendChild(deleteButton);
            t++

            pElement1.textContent = item.title;
            tdElement2.appendChild(pElement);
            tdElement2.appendChild(pElement1);


              // img img 要素を作成
            if (data && item.img) {
              item.img.forEach(val => {
                var imgElement = document.createElement('img');
                imgElement.id = "add_img";
                // src テキストを設定
                imgElement.src = "../group/" + sessionData.group_id + "/bookmark_img/" + sessionData.event_id + "/" + val;
                pElement2.appendChild(imgElement);
                tdElement2.appendChild(pElement2);
              })
            }

              // url url 要素を作成
            if (data && item.url && item.url !== "") {
              var urlElement = document.createElement('a');
              // titleをてきすとに設定
              urlElement.textContent = item.url;
              // 要素を追加
              urlElement.href = item.url;
              pElement3.appendChild(urlElement);
              tdElement2.appendChild(pElement3);
            }

            if(data && item.map && item.map !== ""){
                var aElement = document.createElement('a');
                aElement.id = "mapURL";
                // src テキストを設定
                aElement.textContent = item.map.name
                aElement.href = item.map.url;
                pElement4.appendChild(aElement);
                tdElement2.appendChild(pElement4);
            }
            trElement.appendChild(tdElement1);
            trElement.appendChild(tdElement2);
            targetElement.appendChild(trElement);
          }
        }else{
          let trElement = document.createElement("tr");
          let tdElement1 = document.createElement("td");
          let tdElement2 = document.createElement("td");
          var pElement = document.createElement('p');
          var pElement1 = document.createElement('p');
          var pElement2 = document.createElement('p');
          var pElement3 = document.createElement('p');
          var pElement4 = document.createElement('p');

          let content1 = document.createTextNode(item.time);
          tdElement1.appendChild(content1);

          var deleteButton = document.createElement("button");
          deleteButton.textContent = "削除";
          deleteButton.dataset.index = t; // 削除ボタンにインデックスを設定
          pElement.appendChild(deleteButton);
          t++

          pElement1.textContent = item.title;
          tdElement2.appendChild(pElement);
          tdElement2.appendChild(pElement1);


            // img img 要素を作成
          if (data && item.img) {
            item.img.forEach(val => {
              var imgElement = document.createElement('img');
              imgElement.id = "add_img";
              // src テキストを設定
              imgElement.src = "../group/" + sessionData.group_id + "/bookmark_img/" + sessionData.event_id + "/" + val;
              pElement2.appendChild(imgElement);
              tdElement2.appendChild(pElement2);
            })
          }

            // url url 要素を作成
          if (data && item.url && item.url !== "") {
            var urlElement = document.createElement('a');
            // titleをてきすとに設定
            urlElement.textContent = item.url;
            // 要素を追加
            urlElement.href = item.url;
            pElement3.appendChild(urlElement);
            tdElement2.appendChild(pElement3);
          }

          if(data && item.map && item.map !== ""){
              var aElement = document.createElement('a');
              aElement.id = "mapURL";
              // src テキストを設定
              aElement.textContent = item.map.name
              aElement.href = item.map.url;
              pElement4.appendChild(aElement);
              tdElement2.appendChild(pElement4);
          }
          trElement.appendChild(tdElement1);
          trElement.appendChild(tdElement2);
          targetElement.appendChild(trElement);
        }


        // // 要素を追加する場所を指定
        // var targetElement = document.getElementById('bookmarkPreview'); // 追加したい要素のIDを指定

        // // h1 title 要素を作成
        // var h1Element = document.createElement('h1');
        // // titleをてきすとに設定
        // h1Element.textContent = item.title;
        // // 要素を追加
        // targetElement.appendChild(h1Element);

        // // 削除ボタンの生成
        // var deleteButton = document.createElement("button");
        // deleteButton.textContent = "削除";
        // deleteButton.dataset.index = t; // 削除ボタンにインデックスを設定
        // targetElement.appendChild(deleteButton);
        // t++
        // // ここまでが削除ボタンの表示処理

        // // img img 要素を作成
        // if (data && item.img) {
        //   item.img.forEach(val => {
        //     var imgElement = document.createElement('img');
        //     imgElement.id = "add_img";
        //     // src テキストを設定
        //     imgElement.src = "../group/" + sessionData.group_id + "/bookmark_img/" + sessionData.event_id + "/" + val;
        //     targetElement.appendChild(imgElement);

        //   })
        // }

        // // url url 要素を作成
        // if (data && item.url && item.url !== "") {
        //   var urlElement = document.createElement('a');
        //   // titleをてきすとに設定
        //   urlElement.textContent = item.url;
        //   // 要素を追加
        //   targetElement.appendChild(urlElement);
        //   urlElement.href = item.url;
        //   targetElement.appendChild(urlElement);
        // }

        // if(data && item.map && item.map !== ""){
        //     var aElement = document.createElement('a');
        //     aElement.id = "mapURL";
        //     // src テキストを設定
        //     aElement.textContent = item.map.name
        //     aElement.href = item.map.url;
        //     targetElement.appendChild(aElement);
        // }

        // // daytime p 要素を作成
        // var pElement = document.createElement('p');
        // // テキストを設定
        // pElement.textContent = item.day + item.time;
        // targetElement.appendChild(pElement);

        // 削除ボタンの処理
        deleteButton.addEventListener("click", function (event) {
          var index = parseInt(event.target.dataset.index);
          console.log(index);
          removeSchedule(index);
          get_JSON(JSON.stringify(data));

        });


        function removeSchedule(index) {
          const deleteImg = data.splice(index, 1);
          console.log(deleteImg);
          $.ajax({
            type:"POST",
            url:"../js/delete_bookmark_img.php",
            data: { value: deleteImg }
          })
          .done((data) =>{
            console.log("delete");
            console.log(data);
          })
        }
      });
    })
    .catch(error => console.error('JSONデータの取得に失敗しました。', error));
        // セッションデータを使用する後続の処理
      } else {
        console.error('セッションデータの取得に失敗しました');
      }
    }
  };
  
  xhr.send();
  
}


// jsonをサーバーに保存する関数
function get_JSON(scheduleListJSON) {
  // 作成したJSONデータをサーバーに送信する
  const xhr = new XMLHttpRequest();
  xhr.open('POST', '../js/save_json.php'); // 送信先のPHPスクリプトのパスを指定

  xhr.onload = function () {
    if (xhr.status === 200) {
      console.log(xhr.responseText);
      // 保存が成功した場合の処理
      location.reload();
    } else {
      console.error('An error occurred while saving the JSON data.');
      // 保存が失敗した場合の処理
    }
  };

  xhr.setRequestHeader('Content-Type', 'application/json');
  xhr.send(scheduleListJSON); // jsonDataには作成したJSONデータを指定
}

// マップを表示する処理
let map, infoWindow;
function initAutocomplete() {
  map = new google.maps.Map(document.getElementById("map"), {
    center: { lat: -33.8688, lng: 151.2195 },
    zoom: 15,
    mapTypeId: "roadmap",
  });

  map.setOptions({
    mapTypeControl: false,
    fullscreenControl: false,
    streetViewControl: false
  });

  infoWindow = new google.maps.InfoWindow();
  // Try HTML5 geolocation.
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(
      (position) => {
        const pos = {
          lat: position.coords.latitude,
          lng: position.coords.longitude,
        };


        map.setCenter(pos);

        new google.maps.Marker({
          position: pos,
          map,
          title: "location",
        })

      },
      () => {
        handleLocationError(true, infoWindow, map.getCenter());
      }
    );
  } else {
    // Browser doesn't support Geolocation
    handleLocationError(false, infoWindow, map.getCenter());
  }



  // 検索BOX
  const input = document.getElementById("pac-input");
  const searchBox = new google.maps.places.SearchBox(input);

  map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
  // Bias the SearchBox results towards current map's viewport.
  map.addListener("bounds_changed", () => {
    searchBox.setBounds(map.getBounds());
  });

  let markers = [];

  // Listen for the event fired when the user selects a prediction and retrieve
  // more details for that place.
  searchBox.addListener("places_changed", () => {

    const places = searchBox.getPlaces();
    console.log(places);

    if (places.length == 0) {
      return;
    }

    // Clear out the old markers.
    markers.forEach((marker) => {
      marker.setMap(null);
    });
    markers = [];

    // For each place, get the icon, name and location.
    const bounds = new google.maps.LatLngBounds();

    places.forEach((place, index) => {
      if (!place.geometry || !place.geometry.location) {
        console.log("Returned place contains no geometry");
        return;
      }

      const icon = {
        url: place.icon,
        size: new google.maps.Size(71, 71),
        origin: new google.maps.Point(0, 0),
        anchor: new google.maps.Point(17, 34),
        scaledSize: new google.maps.Size(25, 25),
      };

      const contentString =
        '<div class="window">' +
        '<h2>' + place.name + '</h2>' +
        '<button type="button" id="register" value="' + index + '">登録</button>' +
        '</div>';


      const infowindow = new google.maps.InfoWindow({
        content: contentString,
        ariaLabel: place.name,
      });


      // Create a marker for each place.

      const marker = new google.maps.Marker({
        map,
        title: place.name,
        position: place.geometry.location,
      });

      infowindow.open({
        anchor: marker,
        map,
      });

      marker.addListener("click", () => {
        infowindow.open({
          anchor: marker,
          map,
        });
      });

      $(document).off("click", "#register");
      $(document).on("click", "#register", function (e) {
        e.stopPropagation();
        $('.modal-container').addClass('active');
        const id = e.target.value;

        const ary_data = {};
        ary_data.name = places[id].name;

        $.ajax({
          type: "POST",
          url: "../js/map.php",
          data: { value: ary_data }
        })
          .done((data, status) => {
            mapJSON = JSON.parse(data);
            console.log("登録");
            infoWindow.close();
          });
      });

      $('.modal-close').on('click', function () {
        $('.modal-container').removeClass('active');
      });

      $(document).on('click', function (e) {
        if (!$(e.target).closest('.modal-body').length) {
          $('.modal-container').removeClass('active');
        }
      });

    });
    map.fitBounds(bounds);
    map.setCenter(places[0].geometry.location);
    map.setZoom(15);

  });
}

window.initAutocomplete = initAutocomplete;


json_encode_php();