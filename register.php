<?php session_start(); ?>
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


    /* Style the tab content */
    .tabcontent {
        display: none;
        padding: 6px 12px;
        /* border: 1px solid #ccc; */
        border-top: none;
    }

</style>
<div class="container">
    <div class="tab">
        <button class="tablinks" onclick="openTab(event, 'Company')">Register a Company</button>
        <button class="tablinks" onclick="openTab(event, 'Guider')">Register a Guider</button>
    </div>

    <div id="Company" class="tabcontent">
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

    <div id="Guider" class="tabcontent">
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