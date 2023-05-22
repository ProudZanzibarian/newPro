<style>
    /* Position the image container (needed to position the left and right arrows) */
    .SlideContainer {
        position: relative;
        width: 100%;
    }

    /* Hide the images by default */
    .mySlides {
        display: none;
    }

    /* Add a pointer when hovering over the thumbnail images */
    .cursor {
        cursor: pointer;
    }

    /* Number text (1/3 etc) */
    .numbertext {
        color: #f2f2f2;
        font-size: 12px;
        padding: 8px 12px;
        position: absolute;
        top: 0;
    }

    /* Container for image text */
    .caption-container {
        text-align: center;
        background-color: #222;
        padding: 2px 16px;
        color: white;
    }

    .row:after {
        content: "";
        display: table;
        clear: both;
    }


    /* Six columns side by side */
    .column {
        float: left;
        width: 16.66%;
    }

    /* Add a transparency effect for thumnbail images */
    .demo {
        opacity: 0.9;
    }

    .active,
    .demo:hover {
        opacity: 100;
    }

    .row {
        z-index: 1;
    }

    #thumbSlide {
        display: none;
        z-index: 1;
        position: absolute;
        transition: .0.3s;
    }
</style>

<body>
    <div class="SlideContainer">
        <div onmouseover="thumbShow(thum);" onmouseout="thumbHide(thum);">
            <div class="mySlides">
                <div class="numbertext">1 / 6</div>
                <img src="img/pic.jpg" style="width:100%">
            </div>

            <div class="mySlides">
                <div class="numbertext">2 / 6</div>
                <img src="img/pic.jpg" style="width:100%">
            </div>

            <div class="mySlides">
                <div class="numbertext">3 / 6</div>
                <img src="img/01.jpg" style="width:100%">
            </div>

            <div class="mySlides">
                <div class="numbertext">4 / 6</div>
                <img src="img/pic.jpg" style="width:100%">
            </div>

            <div class="mySlides">
                <div class="numbertext">5 / 6</div>
                <img src="img/pic.jpg" style="width:100%">
            </div>

            <div class="mySlides">
                <div class="numbertext">6 / 6</div>
                <img src="img/pic.jpg" style="width:100%">
            </div>
        </div>

        <div class="caption-container">
            <p id="caption"></p>
        </div>

        <div class="row" id="thumbSlide" onmouseover="thumbShow(thum);" onmouseout="thumbHide(thum);">
            <div class="column">
                <img class="demo cursor" src="img/pic.jpg" style="width:100%" onclick="currentSlide(1)" alt="The Woods">
            </div>
            <div class="column">
                <img class="demo cursor" src="img/pic.jpg" style="width:100%" onclick="currentSlide(2)" alt="Cinque Terre">
            </div>
            <div class="column">
                <img class="demo cursor" src="img/01.jpg" style="width:100%" onclick="currentSlide(3)" alt="Mountains and fjords">
            </div>
            <div class="column">
                <img class="demo cursor" src="img/pic.jpg" style="width:100%" onclick="currentSlide(4)" alt="Northern Lights">
            </div>
            <div class="column">
                <img class="demo cursor" src="img/pic.jpg" style="width:100%" onclick="currentSlide(5)" alt="Nature and sunrise">
            </div>
            <div class="column">
                <img class="demo cursor" src="img/pic.jpg" style="width:100%" onclick="currentSlide(6)" alt="Snowy Mountains">
            </div>
        </div>
    </div>

    <script>
        let slideIndex = 0;
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
            let dots = document.getElementsByClassName("demo");
            let captionText = document.getElementById("caption");
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
            captionText.innerHTML = dots[slideIndex - 1].alt;

            slideIndex++;
            if (slideIndex > slides.length) {
                slideIndex = 1
            }
            slides[slideIndex - 1].style.display = "block";
            setTimeout(showSlides, 2000); // Change image every 2 seconds
        }

        let thum = document.getElementById("thumbSlide");

        function thumbShow(thum) {
            thum.style.display = "block";
            thum.style.marginTop = "-120px";
            thum.style.opacity = "100";
            thum.style.backgroundColor = "#333";

        }

        function thumbHide(thum) {
            thum.style.display = "none";


        }
    </script>