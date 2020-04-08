function menu() {
    var x = document.getElementById("navbar");
    if (x.className === "navbar-container") {
        x.className += " res";
    } else {
        x.className = "navbar-container";
    }


}
function scroll_to_about() {
    document.getElementById('about_container').scrollIntoView({ behavior: 'smooth', block: 'center' });
}
function scroll_to_top() {
    document.getElementById('welcome_div').scrollIntoView({ behavior: 'smooth', block: 'center' });
}

