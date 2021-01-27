
//client side validation
var username = document.getElementById("username");
var email = document.getElementById("email");
var password = document.getElementById("password");
var confirmpassword = document.getElementById("confirmPassword");

var usernameError = document.getElementById("usernameError")
var emailError = document.getElementById("emailError");
var passwordError = document.getElementById("passwordError");
var confirmPasswordError = document.getElementById("confirmPasswordError")

var badColor = "#ff6666";

function validateUsername(){
    var letters = /^[0-9a-zA-Z]+$/;

    if(!username.value.match(letters)){
        usernameError.style.color = badColor;
        usernameError.innerHTML = "Only numbers and letters allowed!";
    }else{
        usernameError.innerHTML = "";
    }
}

function validateEmail() {
    atpos = email.value.indexOf("@");
    dotpos = email.value.lastIndexOf(".");

    if (atpos < 1 || ( dotpos - atpos < 2 )){
        emailError.style.color = badColor;
        emailError.innerHTML = "Please enter correct email address!";
        email.focus();
    }else{
        emailError.innerHTML = "";
    }
}

function validatePass(){
    if (password.value.length < 6) {
        passwordError.style.color = badColor;
        passwordError.innerHTML = "Password must be atleast 8 digits!";
    } else if (password.value.search(/\d/) == -1) {
        passwordError.style.color = badColor;
        passwordError.innerHTML = "Password must contain a number!";
    } else if (password.value.search(/[a-zA-Z]/) == -1) {
        passwordError.style.color = badColor;
        passwordError.innerHTML = "Password must contain a letter";
    } else if (password.value.search(/[^a-zA-Z0-9\!\@\#\$\%\^\&\*\(\)\_\+\.\,\;\:]/) != -1) {
        passwordError.style.color = badColor;
        passwordError.innerHTML = "Password contains an invalid character!";
    }else{
        passwordError.innerHTML = "";
    }


    if(password.value !== confirmpassword.value){
        confirmPasswordError.style.color = badColor;
        confirmPasswordError.innerHTML = "Passwords Dont Match!";
    }else{
        confirmPasswordError.innerHTML = "";
    }
}
