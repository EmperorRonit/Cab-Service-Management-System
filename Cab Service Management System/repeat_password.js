var password = document.getElementById("password");
var repeat_password = document.getElementById("repeat_password");

function ValidPass() {
    if (password.value != repeat_password.value) {
        repeat_password.setCustomValidity("Passwords Don't Match");
    }
}