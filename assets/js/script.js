



const form_filled = document.querySelector(".contact-form");

if (form_filled) {

    // console.log(document.querySelector(".contact-form"));


    form_filled.addEventListener('submit', function(e){
        e.preventDefault();
    
        let action = e.currentTarget.getAttribute('action');
        let th = e.currentTarget;
    
        let form = th;
    
        let formData = new FormData(form);
    
        let xhr = new XMLHttpRequest();
    
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4) {
                if (xhr.status === 200) {
                    console.log('Отправлено');
                }
            }
        }
    
        xhr.open('POST', action, true);
        xhr.send(formData);
    
        form.reset();
    });
}

if ( name === freeformContentFallbackBlock ) { 
    innerHTML = autop( innerHTML ).trim(); 
} 





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

