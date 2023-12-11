//パスワードの目ぱちぱち
$("#passEye").click(function(){ 
    let elm = document.getElementById('passClick');
    let img = document.getElementById('eyeImg');
    if(elm.type == "text"){
        elm.type = "password";
        img.src = "../img/material/eye-slash.svg";
    }
    else{
        elm.type = "text";
        img.src = "../img/material/eye.svg";
    }
});

// const name = document.getElementById("name");
// const password = document.getElementById("passClick");

$("#name").click(function(){
    let c_img = document.getElementById("changeImage");
    c_img.style.backgroundImage="url(../img/material/name.png)"
})

$("#passClick").click(function(){
    let c_img = document.getElementById("changeImage");
    c_img.style.backgroundImage="url(../img/material/password.png)"
})

$("#birthday").click(function(){
    let c_img = document.getElementById("changeImage");
    c_img.style.backgroundImage="url(../img/material/birthday.png)"
})

$("#img").click(function(){
    let c_img = document.getElementById("changeImage");
    c_img.style.backgroundImage="url(../img/material/img.png)"
})