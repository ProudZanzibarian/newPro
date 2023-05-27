<?php session_start(); ?>
<?php include_once("header.php"); ?>
<?php include_once("sidebar2.php"); ?>
<?php include_once("backColor.php"); ?>
<style>
    .flip-card {
        background-color: transparent;
        width: 300px;
        height: 300px;
        perspective: 1000px;
    }

    .flip-card-inner {
        position: relative;
        width: 100%;
        height: 100%;
        text-align: center;
        transition: transform 0.6s;
        transform-style: preserve-3d;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
    }

    .flip-card:hover .flip-card-inner {
        transform: rotateY(180deg);
    }

    .flip-card-front,
    .flip-card-back {
        position: absolute;
        width: 100%;
        height: 100%;
        -webkit-backface-visibility: hidden;
        backface-visibility: hidden;
    }

    .flip-card-front {
        background-color: #bbb;
        color: black;
    }

    .flip-card-back {
        background-color: #333;
        color: white;
        transform: rotateY(180deg);
    }

    .image-container {
        position: relative;
        width: 100%;
        height: 0;
        padding-bottom: 75%;
        overflow: hidden;
    }

    .card-image {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    button {
        border: none;
        outline: 0;
        padding: 12px;
        color: white;
        background-color: #333;
        border: 2px solid red;
        text-align: center;
        cursor: pointer;
        width: 100%;
        font-size: 18px;
    }

    .Heading {
        margin-top: -50px;
        z-index: 1;
        color: #fff;
        font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
    }

</style>
<div class="Heading text-center">
    <h2>Tours Table</h2>
</div>
<div class="container text-center"  id="tourContainer">



    <div class="row text-center">
        <?php
        try {
            $query = $conn->prepare("SELECT * FROM tours t, toursImg m WHERE t.tourID = m.tourID");
            $query->execute();
            $res = $query->fetch();
            while ($res = $query->fetch()) {

                $tourName = $res["tourName"];
                $tourImgName = $res["tourImgName"];
                $shortDesc = $res["shortDesc"];

        ?>
<div class="card-tour">
    <img src="img/tour-image.jpg" alt="Tour Image" width="300" height="400">
    <div class="card-tour-inner">
      <h2 class="card-tour-title">Tour Name</h2>
      <p class="card-tour-description">Tour description goes here</p>
      <div class="add-to-cart">
        <button>Add to Cart</button>
      </div>
    </div>
  </div>
        <?php
            }
        } catch (PDOException $th) {
            echo "Error" . $th->getMessage();
        }
        ?>
    </div>

</div>
<!-- <?php require_once("footer.php"); ?> -->