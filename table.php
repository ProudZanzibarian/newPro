<?php session_start(); ?>
<?php include("header.php"); ?>
<?php include("sidebar2.php"); ?>
<?php include("backColor.php"); ?>
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
</style>
<div class="container">

    <?php
    try {
        $query = $conn->prepare("SELECT * FROM tours t, toursImg m WHERE t.tourImgID = m.tourImgID");
        $query->execute();
        $n = 0;
        while ($res = $query->fetch()) {
    ?>
            <div class="row">
                <div class="flip-card">
                    <div class="flip-card-inner">
                        <div class="flip-card-front">
                            <img src="img/ha.png" alt="Avatar" style="width:300px;height:300px;">
                        </div>
                        <div class="flip-card-back">
                            <h1>John Doe</h1>
                            <p>Architect & Engineer</p>
                            <p>We love that guy</p>
                        </div>
                    </div>
                    <p><button>Add to Cart</button></p>
                </div>
            </div>
    <?php
        }
    } catch (PDOException $e) {
        //throw $th;
    }
    ?>
</div>