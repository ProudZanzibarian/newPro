<?php session_start(); ?>
<?php 
if (!isset($_SESSION["user"]) && $_SESSION["user"] != "admin") {
             header("location: dashboard.php");
            }
        ?>
<?php include_once("header.php"); ?>
<?php include_once("sidebar2.php"); ?>
<?php include_once("backColor.php"); ?>

<style>
    h3 {
        color: red;
        text-decoration: solid underline 1.4px;
    }

    .tab {
        overflow: hidden;
        background-color: transparent;
        margin-top: -75px;
    }

    .tab button {
        background-color: inherit;
        float: left;
        width: 20%;
        border: none;
        outline: none;
        cursor: pointer;
        padding: 14px 16px;
        transition: 0.3s;
        font-size: 17px;
    }

    .tab button:hover {
        background-color: #ddd;
    }

    .tab button.active {
        background-color: #ccc;
    }

    /* Upload Card */
    #imgUploadCard {
        background-color: #fff;
        height: 300px;
        overflow: auto;
    }

    #imgUpload {
        float: left;
    }

    /* The Close Button (x) */
    .close {
        position: absolute;
        color: #000;
        font-size: 20px;
        font-weight: bold;
        text-decoration: none;
        float: right;
    }

    .close:hover,
    .close:focus {
        color: red;
        cursor: pointer;
    }


    /* Style the tab content */
    .tabcontent {
        display: none;
        padding: 6px 12px;
        border-top: none;
    }

    .uploads {
        margin-top: 25px;
        width: 200px;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        border-radius: 6%;
    }
</style>
<div class="container">
    <div class="tab">
        <button class="tablinks" onclick="openTab(event, 'Company')">Register a Company</button>
        <button class="tablinks" onclick="openTab(event, 'Guider')">Register a Guider</button>
        <button class="tablinks" onclick="openTab(event, 'tour')">Register a Tour</button>

    </div>

<!-- company-tab -->
    <div id="Company" class="tabcontent">
        <div class="card" style="padding: 20px;">
            <form method="POST" enctype="multipart/form-data" action="handlers/cRegister.php">

                <input class="form-control" name="cName" type="text" placeholder="Company Name">

                <label class="btn btn-secondary form-control form-control-lg" for="profile" id="customButton">Upload profile</label>
                <input type="file" style="display: none;" accept="image/png,image/jpeg" required id="profile" name="logo">

                <textarea name="cDesc" rows="10" cols="30" placeholder="Write Description.."></textarea>

                <input type="reset" class="btn btn-secondary" id="btn-1" value="Cancel">
                <input type="Submit" name="submit" class="btn btn-primary" id="btn-2" value="Save Changes">

            </form>
        </div>
    </div>

    <div id="Guider" class="tabcontent">
        <div class="card" style="padding: 20px;">

            <form method="POST" action="handlers/gRegister.php" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-lg-6">
                        <input class="form-control" type="text" placeholder="Full Name" name="name" required>
                        <input class="form-control" type="date" name="gDOB" required>
                        <input class="form-control" type="email" placeholder="Email" name="gEmail" required>
                        <input class="form-control" type="tel" placeholder="Phone Number" name="gNum" required>
                    </div>

                    <div class="col-lg-6">
                        <input class="form-control" type="text" placeholder="City" name="city" required>
                        <input class="form-control" type="text" placeholder="State" name="state" required>

                        <select class="form-control" name="cID" id="company" required>
                            <option value="">--Select Company--</option>
                            <?php
                            try {
                                $query = $conn->prepare("SELECT * FROM companies");
                                $query->execute();
                                while ($res = $query->fetch()) {
                            ?>
                                    <option value="<?php echo $res['companyID']; ?>"><?php echo $res['companyName']; ?></option>
                            <?php
                                }
                            } catch (\Throwable $th) {
                                // Handle the exception
                            }
                            ?>
                        </select>

                        <label class="btn btn-secondary form-control form-control-lg" for="gProfile" id="customButton">Upload profile</label>
                        <input type="file" style="display: none;" accept="image/png,image/jpeg" required id="gProfile" name="gProf">
                    </div>

                    <div class="col">
                        <textarea name="gExp" id="gExp" cols="30" rows="10" placeholder="Enter Experience.." required></textarea>
                    </div>
                </div>

                <input type="reset" class="btn btn-secondary" id="btn-1" value="Cancel">
                <input type="submit" name="submit" class="btn btn-primary" id="btn-2" value="Save Changes">
            </form>


        </div>
    </div>


    <!-- Tour Tab -->
    <div id="tour" class="tabcontent">
        <div class="card" style="padding: 20px;">
            <div class="row">
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <form action="handlers/tempImage.php" method="POST" enctype="multipart/form-data">
                        <input type="file" accept="image/png,image/jpeg" required name="imgUploaded" id="imgUploaded">
                        <button class="btn btn-secondary form-control form-control-lg" type="submit" name="submit" onclick="openTab(event, 'tour')" id="customButton">Upload Photo</button>
                    </form>
                    <div class="card" id="imgUploadCard">
                        <div class="row text-center">
                            <?php
                            try {
                                $query2 = $conn->prepare("SELECT * FROM tempImg");
                                $query2->execute();
                                while ($tempImg = $query2->fetch()) {
                            ?>
                                    <div class="col-lg-6 col-md-12 col-sm-12">
                                        <div class="container">
                                            <img src="img/tempImg/<?php echo $tempImg["tempName"]; ?>" id="imgUpload" alt="" class="uploads">
                                            <a href="handlers/deleteTourImg.php?tempID=<?php echo $tempImg["tempID"]; ?>" class="close" onclick="return confirm('Are you sure want to delete?');">&times;</a>

                                        </div>
                                    </div>
                            <?php  }
                            } catch (\Throwable $th) {
                                // echo "nothing";
                            }
                            ?>


                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <form method="POST" enctype="multipart/form-data" action="handlers/tRegister.php">

                        <input class="form-control" name="tName" type="text" placeholder="Tour Name">

                        <textarea name="sDesc" rows="2" cols="20" placeholder="Write Short Description.."></textarea>

                        <textarea name="lDesc" rows="10" cols="30" placeholder="Write Description.."></textarea>

                        <div>
                            <input type="reset" class="btn btn-secondary" id="btn-1" value="Cancel">
                            <input type="Submit" name="submit" class="btn btn-primary" id="btn-2" value="Save Changes">
                        </div>
                    </form>

                </div>


            </div>


        </div>




    </div>
</div>
</div>




<script>
    function openTab(evt, tabName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(tabName).style.display = "block";
        evt.currentTarget.className += " active";
    }
</script>
