<?php session_start(); ?>
<?php include_once("header.php"); ?>
<?php include_once("sidebar2.php"); ?>
<?php include_once("backColor.php"); ?>
<style>
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
<div class="container text-center" id="tourContainer">



    <div class="row text-center">
        <?php
        try {
            $query = $conn->prepare("SELECT * FROM tours t, toursImg m WHERE t.tourID = m.tourID");
            $query->execute();
            $res = $query->fetch();
            while ($res = $query->fetch()) {
                
                $tourName = str_replace(" ", "_", $res["tourName"]);
                $tourImgName = $res["tourImgName"];
                $shortDesc = $res["shortDesc"];
        ?>
                <div class="card-tour" style=" background: url('img/tours/<?php echo $tourName; ?>/<?php echo $tourImgName; ?>');">
                <a href="tour.php?tID=<?php echo $res["tourID"]; ?>"><div class="hover-text">Click to View</div></a>
                    <div class="card-tour-inner">
                        <h2 class="card-tour-title"><?php echo $tourName; ?></h2>
                        <p class="card-tour-description"><?php echo $shortDesc; ?></p>
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
<?php require_once("footer.php"); ?>