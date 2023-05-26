<?php session_start(); ?>
<?php include("header.php"); ?>
<?php include("sidebar2.php"); ?>
<?php include("backColor.php"); ?>
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

    #images {
        display: block;
    }



    /* Slideshow container */

    * {
        box-sizing: border-box
    }

    body {
        font-family: Verdana, sans-serif;
        margin: 0
    }

    .mySlides {
        display: none
    }

    img {
        vertical-align: middle;
    }

    .slideshow-container {
        max-width: 1000px;
        position: relative;
        margin: auto;
    }

    .prev,
    .next {
        cursor: pointer;
        position: absolute;
        top: 50%;
        width: auto;
        padding: 16px;
        margin-top: -22px;
        color: white;
        font-weight: bold;
        font-size: 18px;
        transition: 0.6s ease;
        border-radius: 0 3px 3px 0;
        user-select: none;
    }

    .next {
        right: 0;
        border-radius: 3px 0 0 3px;
    }

    .prev:hover,
    .next:hover {
        background-color: rgba(0, 0, 0, 0.8);
    }

    .text {
        color: #f2f2f2;
        font-size: 15px;
        padding: 8px 12px;
        position: absolute;
        bottom: 8px;
        width: 100%;
        text-align: center;
    }

    .numbertext {
        color: #f2f2f2;
        font-size: 12px;
        padding: 8px 12px;
        position: absolute;
        top: 0;
    }

    .dot {
        cursor: pointer;
        height: 15px;
        width: 15px;
        margin: 0 2px;
        background-color: #bbb;
        border-radius: 50%;
        display: inline-block;
        transition: background-color 0.6s ease;
    }

    .active,
    .dot:hover {
        background-color: #717171;
    }

    .fade {
        animation-name: fade;
        animation-duration: 1.5s;
    }

    @keyframes fade {
        from {
            opacity: .4
        }

        to {
            opacity: 1
        }
    }

    @media only screen and (max-width: 300px) {

        .prev,
        .next,
        .text {
            font-size: 11px
        }
    }
</style>

<div class="container">
    <div class="row">
        <div class="col-lg-8 col-sm-12">
            <div class="tab">
                <button class="tablinks" onclick="openCity(event, 'Images')">Images</button>
                <button class="tablinks" onclick="openCity(event, 'Maps')">Maps</button>
            </div>

            <div id="Images" class="tabcontent">
                <div class="card">
                    <?php
                    try {
                        $query = $conn->prepare("SELECT * FROM tours t, toursImg m WHERE t.tourImgID = m.tourImgID");
                        $res = $query->fetch();
                        while ($res = $query->fetch()) {
                    ?>
                            <div class="slideshow-container">
                                <div class="mySlides fade">
                                    <div class="numbertext"><?php echo $res["tourImgID"]; ?></div>
                                    <img src="img/<?php echo $res["tourImagName"]; ?>" style="width:100%">
                                    <div class="text"><?php echo $res["tourImagName"]; ?></div>
                                </div>

                                <a class="prev" onclick="plusSlides(-1)">❮</a>
                                <a class="next" onclick="plusSlides(1)">❯</a>

                            </div>
                        <?php
                        } ?>

                        <br>

                        <div style="text-align:center">
                            <span class="dot" onclick="currentSlide(1)"></span>
                        </div>

                </div>
            </div>

            <div id="Maps" class="tabcontent">
                <h3>Maps</h3>
                <p>Maps is the capital of France.</p>
            </div>
        </div>
        <div class="col-lg-4 col-sm-12 text-center" style="margin-top:100px;">
            <a href="#" class="btn btn-primary" id="btn-1">View All</a>
            <hr>
            <a href="#" class="btn btn-primary" id="btn-1">View All</a>

        </div>
    </div>
    <div class="container">
        <h3>Description</h3>
        <p><?php echo $res["tourDescription"]; ?></p>
    <?php
                    } catch (PDOException $e) {
                        //throw $th;
                    }
    ?>

    </div>
    <br>
    <div class="row ">
        <div class="col-6">
            <div class="card">

            </div>
        </div>
        <div class="col-6">
            <div class="container">
                <table >
                    <tr>
                    <td><img src="img/ha.png" alt="Avatar Logo" class="rounded-pill" width="60px"></td>    
                    <td><h5> Usama Talib Juma</h5></td>
                    </tr>
                </table>
            </div>



        </div>
    </div>
</div>


<script>
    // Tab Show
    function openCity(evt, tabShow) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(tabShow).style.display = "block";
        evt.currentTarget.className += " active";
    }

    // slide Show
    let slideIndex = 1;
    showSlides(slideIndex);

    function plusSlides(n) {
        showSlides(slideIndex += n);
    }

    function currentSlide(n) {
        showSlides(slideIndex = n);
    }

    function showSlides(n) {
        let i;
        let slides = document.getElementsByClassName("mySlides");
        let dots = document.getElementsByClassName("dot");
        if (n > slides.length) {
            slideIndex = 1
        }
        if (n < 1) {
            slideIndex = slides.length
        }
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex - 1].style.display = "block";
        dots[slideIndex - 1].className += " active";
    }
</script>