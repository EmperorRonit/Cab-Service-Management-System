var password = document.getElementById("password");
var repeat_password = document.getElementById("repeat_password");

function ValidPassword() {
    if (password.value != repeat_password.value) {
        repeat_password.setCustomValidity("Passwords Don't Match");
    }
}

password.onchange = ValidPassword;
repeat_password.onkeyup = ValidPassword;