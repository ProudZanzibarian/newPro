<div class="back-color">
    <div class="container" id="search-tab">
        <?php
        try {

            $query = $conn->prepare("SELECT * FROM `tourist` WHERE userName = :name");
            $user = $_SESSION["user"];
            $query->execute(array(":name" => $user));
            $res = $query->fetch();
        ?>
            <div><?php include("sidebar3.php"); ?></div>
            <form class="text-center" width="400px">
                <input type="text" id="search" name="search" placeholder="&#xF002; Search" style="font-family:Arial, FontAwesome">
            </form>
            <span class="avatar-container" class="dropdown" id="avator_backColor_container">
                   <a href="settings.php" > <img style="object-fit: cover;" src="img/users/<?php echo $res["userName"] . "/" . $res["profile"]; ?>" alt="Avatar Logo" class="avatar-image" id="userAvator"></a>

        </span>
    </div>

</div>
<?php
        } catch (\Throwable $th) {
            //throw $th;
        }
?>