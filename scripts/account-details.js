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

function submitForm(event){
            if(!validatePassword()){
                event.preventDefault();
                 document.getElementById("pass_error").style.visibility = 'visible';
        }
}

