



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