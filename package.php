<?php include("header.php") ?>




<div class="container mt-2 text-center" id="content">
  <div class="card text-center">
    <div class="card-header">
      <ul class="nav nav-tabs card-header-tabs">
        <li class="nav-item">
          <a class="nav-link active" id="map" aria-current="true" href="#">Map</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="galery" href="#">Galery</a>
        </li>
      </ul>
    </div>
    <div class="card-body" id="map-show">
      <h5 class="card-title">Special title treatment</h5>
      <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
      <a href="#" class="btn btn-primary">Go somewhere</a>
    </div>

    <div class="card-body" id="galery-show">
      <h5 class="card-title">Here THere will be alot of images </h5>
      <p class="card-text" >Naataka kula hata kama wewe hutani mm natka ka ngombe weee</p>
      <a href="#" class="btn btn-primary">Go somewhere</a>
    </div>
    </div>

  <div id="accordion">

    <div class="card">
      <div class="card-header">
        <a class="card-link" data-toggle="collapse" href="#collapseOne">
          Collapsible Group Item #1
        </a>
      </div>
      <div id="collapseOne" class="collapse show" data-parent="#accordion">
        <div class="card-body" id="body">
          Lorem ipsum..
        </div>
      </div>
    </div>

    <div class="card">
      <div class="card-header">
        <a class="collapsed card-link" data-toggle="collapse" href="#collapseTwo">
          Collapsible Group Item #2
        </a>
      </div>
      <div id="collapseTwo" class="collapse" data-parent="#accordion">
        <div class="card-body" id="body">
          Lorem ipsum..
        </div>
      </div>
    </div>

    <div class="card">
      <div class="card-header">
        <a class="collapsed card-link" data-toggle="collapse" href="#collapseThree">
          Collapsible Group Item #3
        </a>
      </div>
      <div id="collapseThree" class="collapse" data-parent="#accordion">
        <div class="card-body" id="body">
          Lorem ipsum..
        </div>
      </div>
    </div>

  </div>

</div>





</div>

<?php include("footer.php") ?>