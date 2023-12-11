const myFunc = ()=>{
    const form = document.forms[0];
    const button = form.querySelectorAll('button');
    const loader = $('#load_bg');
    const loader1 = $('#loader');
    const loader2 = $('.load_img');
    const loader3 = $('.load_p');
    const v = $('#wrap');

    button[2].addEventListener('click', (e)=>{
        //ローダーを表示する
        loader.css('display','block');
        loader1.css('display','block');
        loader2.css('display','block');
        loader3.css('display','block');
        v.css('display','none');
        console.log(loader);
        //～
        //非同期処理追加
        //～

    }, false);
};
myFunc();