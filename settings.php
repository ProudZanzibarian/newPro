<?php session_start(); ?>
<?php require_once("header.php"); ?>
<?php include("sidebar2.php"); ?>
 
</style>
<div class="container">
    
<?php include("sidebar3.php"); ?></div>

<div class="container text-center"> 
    <img src="img/ha.png" alt="Avatar Logo" class="rounded-pill mb-1" width="300px">
<div class="btn btn-primary" id="btn-1" style="width:100%;">Change Profile</div>
    <div class="card" style="padding: 20px;">
        <form>
            <div class="row">
                <div class="col-lg-6">
                    <input class="form-control" type="text" value="Mark">

                    <input class="form-control" type="text" value="Jhonsan">

                    <input class="form-control" type="email" value="mark@example.com">

                    <input class="form-control" type="text" value="Street">


                </div>

                <div class="col-lg-6">
                    <input class="form-control" type="text" value="" placeholder="City">

                    <input class="form-control" type="text" value="" placeholder="State">

                    <input class="form-control" type="password" value="11111122333">

                    <input class="form-control" type="password" value="11111122333">

                </div>
            </div>
            <input type="reset" class="btn btn-secondary" id="btn-1" value="Cancel">
            <input type="button" class="btn btn-primary" id="btn-2" value="Save Changes">

        </form>
    </div>
</div>