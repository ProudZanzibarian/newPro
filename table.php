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
        background-color: #2980b9;
        color: white;
        transform: rotateY(180deg);
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
<div class="container">
    <?php
    try {
        $query = $conn->prepare("SELECT * FROM tours t, toursImg m WHERE t.toursImgID = m.toursImgID");
        $res = $query->fetch();
        while ($res = $query->fetch()) {
    ?>
        <div class="row text-center">
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="flip-card">
                    <a href="tour.php?id=<?php echo $res['toursID'];?>">
                        <div class="flip-card-inner">
                            <div class="flip-card-front">
                                <img src="img/<?php echo $res["tourImgName"]; ?>" alt="Avatar" style="width:100%;height:300px;">
                            </div>

                            <div class="flip-card-back">
                                <h4><?php echo $res["tourName"]; ?></h4>
                                <p><?php echo $res["shortDesc"]; ?></p>
                            </div>
                        </div>
                    </a>
                    <a href="#"><button>Add to Cart</button></a>
                </div>
            </div>
        </div>
    <?php
        }
    } catch (PDOException $e) {
        //throw $th;
    }
    ?>

</div>