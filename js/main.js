var header = document.querySelector("header");
var paddingTopHeader = window
  .getComputedStyle(header, null)
  .getPropertyValue("padding-top");
var paddingBottomHeader = window
  .getComputedStyle(header, null)
  .getPropertyValue("padding-bottom");
var heightHeader = header.offsetHeight;
var paddingTop = parseInt(paddingTopHeader);
var paddingBottom = parseInt(paddingBottomHeader);
document.getElementById("hero").style.marginTop =
  heightHeader + paddingTop + paddingBottom + "px";

function validateLogin() {
    let username = document.forms["formLogin"]["email"].value;
    let password = document.forms["formLogin"]["password"].value;
    if (username === "admin@example.com" && password === "admin") {
        window.location.href = "/dashboard.html";
        return;
    }
    alert("Incorrect email or password");
}
