//  navbar  Scroll
window.onscroll = function () { scrollFunction() };

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



