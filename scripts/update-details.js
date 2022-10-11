//Js script for the account details update page
//Ensures safety checks for user inputting a new pasword
//Author - Aziah Miller
password1 = document.getElementById('pass');

password2 = document.getElementById('cpass');

password1.addEventListener('input', function(){
    password2.required = true;
    if(password1.value === ""){
	password2.required = false;
	password1.required= false;
}
});

password2.addEventListener('input', function(){
    password1.required = true;
    if(password2.value === ""){
	password1.required = false;
}
});

function validatePassword(){
    if(password1.value !== password2.value){
        return false;
    }
    return true;
};

email1 = document.getElementById('email');

email2 = document.getElementById('cemail');

password1.addEventListener('input', function(){
    email2.required = true;
    if(email1.value === ""){
	email2.required = false;
	email1.required= false;
}
});

email2.addEventListener('input', function(){
    email1.required = true;
    if(email2.value === ""){
	email1.required = false;
}
});


function validateEmail(){
    if(email1.value !== email2.value){
        return false;
    }
    return true;
};

function submitForm(event){
            if(!validatePassword()){
                event.preventDefault();
                 document.getElementById("pass_error").style.visibility = 'visible';
                 return;
        }
            if(!validateEmail()){
                event.preventDefault();
                document.getElementById("email_error").style.visibility = 'visible';
    }

};

