<?php
try {
    if (isset($_GET["tID"])) {
        $tourID = $_GET["tID"];

        $query = $conn->prepare("SELECT * FROM tours t, toursImg m WHERE m.tourID = :tourID");
        $query->execute(array(":tourID" => $tourID));

        // Fetch all images for the tour
        $images = $query->fetchAll();

        if (!empty($images)) {
?>
            <style>
                .slideshow-container {
                    position: relative;
                    max-width: 1000px;
                    margin: auto;
                }

                .mySlides {
                    display: none;
                    text-align: center;
                }

                .mySlides img {
                    width: 100%;
                    height: auto;
                }

                .prev,
                .next {
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

                .dot-container {
                    text-align: center;
                    padding: 20px;
                }

                .dot {
                    display: inline-block;
                    width: 15px;
                    height: 15px;
                    margin: 0 2px;
                    background-color: #bbb;
                    border-radius: 50%;
                    cursor: pointer;
                    transition: background-color 0.6s ease;
                }

                .dot.active {
                    background-color: #717171;
                }
            </style>

            <div class="slideshow-container">
                <?php
                foreach ($images as $key => $image) {
                    $tourName = str_replace(" ", "_", $image["tourName"]);
                    $tourImgName = $image["tourImgName"];
                ?>
                    <div class="mySlides fade">
                        <img src="img/tours/<?php echo $tourName; ?>/<?php echo $tourImgName; ?>">
                    </div>
                <?php
                }
                ?>

                <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                <a class="next" onclick="plusSlides(1)">&#10095;</a>
            </div>

            <br>

            <div class="dot-container">
                <?php
                // Creating dot indicators for each slide
                foreach ($images as $key => $image) {
                ?>
                    <span class="dot" onclick="currentSlide(<?php echo $key + 1; ?>)"></span>
                <?php
                }
                ?>
            </div>

            <script>
    var slideIndex = 0;
    showSlides();

    function showSlides() {
        var i;
        var slides = document.getElementsByClassName("mySlides");
        var dots = document.getElementsByClassName("dot");

        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        slideIndex++;
        if (slideIndex > slides.length) {
            slideIndex = 1;
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex - 1].style.display = "block";
        dots[slideIndex - 1].className += " active";

        setTimeout(showSlides, 3000); // Change slide every 3 seconds
    }

    function plusSlides(n) {
        showSlides(slideIndex += n);
    }

    function currentSlide(n) {
        showSlides(slideIndex = n);
    }
</script>
<?php
        } else {
            echo "No images found";
        }
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
