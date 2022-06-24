


function singup(text){
    let inputEl = document.getElementById("contact-form__textarea");
    inputEl.scrollIntoView({block:"center", behavior:"smooth"});
    inputEl.value ="Здравствуйте, я хочу подключить " + text +" по адресу: ";
}



function cctv_info(img){
    if (img.src.search("info") == -1 ){
        document.querySelector("#"+img.id).setAttribute('src',img.src.replace(".png", "_info.png"));
    } else {
        document.querySelector("#"+img.id).setAttribute('src',img.src.replace("_info.png", ".png"));
    }
    
}
function onSubmit(token) {
    // отправить форму на сервер
    console.log(token);
    document.getElementById("contact-form").submit();
}

