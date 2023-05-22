<?php session_start(); ?>
<?php include("header.php"); ?>
<?php include("sidebar2.php"); ?>
<?php include("backColor.php"); ?>
<div class="container" id="panels">
    <div class="card" id="info-Card">
        <div class="card-body">
            <div class="card-head">
                <h2 class="card-title" id="overTitle">Overall Tours
                    <span id="overBtn">
                        <a href="#" class="btn btn-primary" id="btn-1">View All</a>
                        <a href="#" class="btn btn-primary" id="btn-2">Edit</a>
                    </span>
                    <div class="dropdown">
                        <div class="dropdown-toggle" data-bs-toggle="dropdown"></div>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Link 1</a></li>
                            <li><a class="dropdown-item" href="#">Link 2</a></li>
                            <li><a class="dropdown-item" href="#">Link 3</a></li>
                            <li><a class="dropdown-item-text" href="#">Text Link</a></li>
                            <li><span class="dropdown-item-text">Just Text</span></li>
                        </ul>
                </h2>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-sm-12">
                    <h5>Total Tours</h5>
                    <h5>55</h5>
                </div>
                <div class="col-lg-4 col-sm-12">
                    <h5>Zanzibar Tours</h5>
                    <h5>55</h5>
                </div>
                <div class="col-lg-4 col-sm-12">
                    <h5>Safari Tours</h5>
                    <h5>55</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-lg-8 col-sm-12 ">
            <div class="card" id="show">
                <div class="card-body">
                    <p class="card-img"><?php include("slideShow.php"); ?></p>
                </div>
            </div>
        </div>
        <?php
        require_once("handlers/connection.php");
        try {
            $query = $conn->prepare("SELECT * FROM `tourist` WHERE userName = :name");
            $user = $_SESSION["user"];
            $query->execute(array(":name" => $user));
            $res = $query->fetch();
        } catch (PDOException $e) {
            echo "Error";
        } ?>
        <div class="col-lg-4 col-sm-12">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">Smart Tour</h5>
                    <p class="card-text">
                        <span>
                            <img src="img/<?php echo $res["profile"];?>" alt="Avatar Logo" class="rounded-pill" id="userPic">
                        </span>
                    </p>
                    <table>

                        <tr>
                            <th>Full Name:</th>
                            <td><?php echo $res["Fname"] . " " . $res["Lname"]; ?></td>
                        </tr>
                        <tr>
                            <th>Email:</th>
                            <td><?php echo $res["Email"]; ?></td>

                        </tr>
                        <tr>
                            <th>Suscription:</th>
                            <td>Subscribed</td>
                        </tr>

                    </table>
                    <hr>
                    <a href="#" class="btn btn-primary" id="btn-1">Subscribe</a>
                    <a href="#" class="btn btn-primary" id="btn-2">Edit</a>
                </div>
            </div>
        </div>
    </div>

</div>