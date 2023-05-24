<div id="navbar">
  <div class="container">
  <a href="#home">Home</a>
  <a href="#news">News</a>
  <a href="#contact">Contact</a>
  <a href="#about" style="float: right;" onclick="document.getElementById('id01').style.display='block'" >Login</a>
  </div>
</div>
<script>
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    document.getElementById("navbar").style.top = "-15";
  } else {
    document.getElementById("navbar").style.top = "-70";
  }
}
</script>