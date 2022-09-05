// hamburger toggler
const myhamburger = document.querySelector('.myhamburger');
const mobile_menu = document.querySelector('.mobile-menu');
const mobile_side_menu = document.querySelector('.mobile-side-menu');
const overlay_effect = document.querySelector('.overlay');
const textbox = document.querySelector('.textBox');
const mydropdown = document.querySelector('.mydropdown');


myhamburger.addEventListener('click', function(){
    this.classList.toggle('is-active');
    mobile_menu.classList.toggle('is-active');
    overlay_effect.classList.toggle('is-active');
});



// custom dropdown menu for main pages
function show(menu)
{
  document.querySelector('.textBox').value = menu;
}


textbox.addEventListener('click', function(){
    mobile_side_menu.classList.toggle('menu-active');
    mydropdown.classList.toggle('active');
    overlay_effect.classList.toggle('is-active');
});
