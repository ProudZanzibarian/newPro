var ma = document.getElementById("map-show");
var ga = document.getElementById("galery-show");
var map = document.getElementById("map");
map.addEventListener("click", displayMap);
var gal = document.getElementById("galery");
gal.addEventListener("click", displayGalery);
function displayMap() {
    ma.style.display = "block";
    ga.style.display = "none";

    map.className = "nav-link active";
    gal.className = "nav-link";
}
function displayGalery() {
    ga.style.display = "block";
    ma.style.display = "none";

    gal.className = "nav-link active";
    map.className = "nav-link";
    

}

//  navbar  Scroll
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    document.getElementById("nav").style.top = "0";
  } else {
    document.getElementById("nav").style.top = "-50px";
  }
}


// dark mode 
function myFunction() {
  var element = document.body;
  var panels = document.getElementById("panels");
  element.classList.toggle("dark-mode");
  panels.style.backgroundImage = "linear-gradient(to bottom right, rgb(116, 117, 119), rgb(236, 239, 246))";
}
