const nav = document.querySelector('nav');
const toggle_btn = document.getElementById('toggle-btn');
const content = document.querySelector('section');

/* funcion que me permite ocultar el menu (hide) y mostrarlo (expand) */
toggle_btn.onclick = function(){
    nav.classList.toggle('hide');
    content.classList.toggle('expand');
}


