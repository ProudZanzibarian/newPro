<?php session_start(); ?>
<?php include_once("header.php"); ?>
<?php include_once("sidebar2.php"); ?>
<?php include_once("backColor.php"); ?>
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
                    <p class="card-img"><?php include_once("slideShow.php"); ?></p>
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
            echo "Error" . $e->getMessage();
        } ?>
        <div class="col-lg-4 col-sm-12">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">Smart Tour</h5>
                    <p class="card-text">
                    <div class="row">
            <div class="col"></div>
            <div class="col">
                <div class="avatar-container mb-2" id="avator_settings_container">
                    <img src="img/users/<?php echo $res["userName"] . "/" . $res["profile"]; ?>" alt="Avatar Logo" class="avatar-image">
                </div>
            </div>
            <div class="col"></div>
        </div>
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
                            <th>User Name:</th>
                            <td><?php echo $res["userName"]; ?></td>

                        </tr>

                    </table>
                    <hr>
                    <a href="settings.php" class="btn btn-primary" id="btn-1">View</a>
                </div>
            </div>
        </div>
    </div>

</div>

<?php require_once("footer.php"); ?>
