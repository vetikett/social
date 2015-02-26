function hover(element) {
    element.style.boxShadow = "0px 0px 5px 0px rgba(50, 50, 50, 0.2)";
    element.style.webkitBoxShadow = "0px 0px 5px 0px rgba(50, 50, 50, 0.2)";
    element.style.mozBoxShadow = "0px 0px 5px 0px rgba(50, 50, 50, 0.2)";
    element.style.background = "#EBE8E8";
}
function unhover(element) {
    element.style.boxShadow = "none";
    element.style.webkitBoxShadow = "none";
    element.style.mozBoxShadow = "none";
    element.style.background = "#F1EEEE";
}

function messh(element) {
    element.setAttribute('src', 'http://localhost/social/imgs/mess_icon.png');
    element.style.cursor="pointer";
    element.style.boxShadow = "0px 0px 5px 0px rgba(50, 50, 50, 0.2)";
    element.style.webkitBoxShadow = "0px 0px 5px 0px rgba(50, 50, 50, 0.2)";
    element.style.mozBoxShadow = "0px 0px 5px 0px rgba(50, 50, 50, 0.2)";
}
function messoh(element) {
    element.setAttribute('src', 'http://localhost/social/imgs/mess_icon_nohover.png');
    element.style.boxShadow = "none";
    element.style.webkitBoxShadow = "none";
    element.style.mozBoxShadow = "none";
}