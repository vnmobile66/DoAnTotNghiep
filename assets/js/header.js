window.onscroll = function(){
  myFunction()
};
let mybutton = document.getElementById("myBtn");
var navbar = document.getElementById("navbar");
var sticky = navbar.offsetTop;
function myFunction() {
  if (window.pageYOffset >= sticky) {
    navbar.classList.add("sticky");
    mybutton.style.display = "block";
  } else {
    navbar.classList.remove("sticky");
    mybutton.style.display = "none";
  }
}
function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}

let btnMenu = document.querySelector("#menu");
let listItems = document.querySelector("#list");
btnMenu.addEventListener('click',function(){
  listItems.classList.toggle("show-menu");
})