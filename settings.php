<?php session_start(); ?>
<?php require_once("header.php"); ?>
<?php include("sidebar2.php"); ?>

</style>
<div class="container">

    <?php include("sidebar3.php"); ?></div>
<?php
try {

    $query = $conn->prepare("SELECT * FROM `tourist` WHERE userName = :name");
    $user = $_SESSION["user"];
    $query->execute(array(":name" => $user));
    $res = $query->fetch();
?>


    <form action="POST" action="handlers/updateProf.php" enctype="multipart/form-data">
        <div class="container text-center">


            <img src="img/ha.png" alt="Avatar Logo" class="rounded-pill mb-1" width="300px">
            <button class="btn btn-primary" type="submit" name="submit" id="btn-1" style="width:100%;">Change Profile</button>
            <?php
            if (isset($_GET['status']) && $_GET['status'] == 2) {
                    echo $ErrorMessage = "<span color='red'><b>Wrong Format (jpg or png only)</b></span>";
                }
                ?>
            <input type="file" accept="image/png,image/jpeg" required id="profile" name="logo">
            <div class="card" style="padding: 20px;">

    </form>


    <form method="post" action="handlers/EditUser.php" enctype="multipart/form-data">


        <div class="row">
            <div class="col-lg-6">
                <input class="form-control" type="text" name="Fname" value="<?php echo $res["Fname"]; ?>" placeholder="First Name">

                <input class="form-control" type="text" name="Lname" value="<?php echo $res["Lname"]; ?>" placeholder="Last Name">

                <input class="form-control" type="email" name="email" value="<?php echo $res["Email"]; ?>" placeholder="Email Address">

                <input class="form-control" type="text" name="userName" value="<?php echo $res["userName"]; ?>" placeholder="User Name">
            </div>


            <div class="col-lg-6">
                <input class="form-control" type="text" name="city" value="<?php echo $res["city"]; ?>" placeholder="City">

                <input class="form-control" type="text" name="state" value="<?php echo $res["state"]; ?>" placeholder="State">

                <input class="form-control" name="psw" type="password" name="psw" value="<?php echo $res["password"]; ?>" placeholder="Password">
                <?php
                if (isset($_GET['status']) && $_GET['status'] == 1) {
                    echo $ErrorMessage = "<span color='red'><b>Password does not match</b></span>";
                }
                ?>
                <input class="form-control" name="psw-repeat" type="password" value="<?php echo $res["password"]; ?>" placeholder="Repeat Password">

            </div>
            <div>
                <input class="form-control" type="date" name="dob" value="<?php echo $res["dob"]; ?>">
            </div>
        </div>
        <div>
            <input type="reset" class="btn btn-secondary" id="btn-1" value="Cancel">
            <input type="submit" name="submit" class="btn btn-primary" id="btn-2" value="Save Changes">
        </div>
    </form>
<?php
} catch (\Throwable $th) {
    //throw $th;
}
?>
</div>
</div>