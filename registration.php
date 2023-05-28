<?php include_once("header.php"); ?>

<style>
    #registration {
        width: 70%;
        height: 70.4%;
        background-color: #333;
        margin-top: 120px;
    }

    /* Full-width input fields */
    input[type=text],
    input[type=email],
    input[type=date],
    input[type=password] {
        width: 100%;
        padding: 10px;
        margin: 5px 0 22px 0;
        display: inline-block;
        border: none;
        background: #f1f1f1;
    }

    #agree {
        font-size: 6px;
    }

    input[type=text]:focus,
    input[type=email]:focus,
    input[type=date]:focus,

    input[type=password]:focus {
        background-color: #ddd;
        outline: none;
    }

    /* Overwrite default styles of hr */
    hr {
        border: 1px solid #f1f1f1;
        margin-bottom: 20px;
    }

    .signup-form {
        overflow-x: hidden;
        overflow-y: scroll;
        height: 50%;
    }

    /* Set a style for the submit button */
    .registerbtn {
        background-color: rgba(230, 191, 153, 0.982);
        color: white;
        padding: 16px 20px;
        margin: 8px 0;
        border: none;
        cursor: pointer;
        width: 100%;
        opacity: 0.9;
    }

    .registerbtn:hover {
        opacity: 1;
        border: solid;
        border-color: rgba(230, 191, 153, 0.982);
        background-color: #333;
    }

    #regBar {
        background-image: url("img/01.jpg");
        margin-top: -1.1%;
        width: 35%;
        height: 70.4%;
        margin-left: -1.1%;
        position: absolute;
        z-index: 1;
        animation: none;
        animation-duration: .5s;
    }

    @keyframes go {
        from {
            margin-left: -1%;
        }

        to {
            margin-left: 34.5%;
        }
    }

    @keyframes return {
        from {
            margin-left: 34.5%;
        }

        to {
            margin-left: -1%;
        }
    }


    a {
        color: dodgerblue;
    }

    @media (max-width: 1000px) {
        #regBar {
            display: none;
        }

        #registration {
            width: 100%;
            height: auto;
            padding: 20px;
            margin-top: auto;
        }

        .signup-form {
            height: auto;
            overflow: visible;
        }

        #signIn-cont {
            display: none;
            height: 100vh;
            display: none;
            justify-content: center;
            align-items: center;
        }

        #loginButton {
            display: block;
        }
    }

    
    #SIGNIN {
        display: none;
        transition: display 3s;
    }
</style>
<div class="container" id="registration">
    <div class="row">
        <div class="col-lg-6 col-sm-12" id="signUp">
            <div id="regBar">
                <div class="container text-center" style="padding-top:100px; float:left;" id="SIGNUP">
                    <h2>Are you new here?</h2>
                    <p>Join us to experience the nature of Tanzania</p>
                    <button class="btn-info" onclick="right()">SIGNUP</button>
                </div>
                <div class="container text-center" style="padding-top:100px; float:right;" id="SIGNIN">
                    <h2>One of us?</h2>
                    <p>If you already have an account, just sign in. We've missed you!</p>
                    <button class="btn-info mt-4" onclick="left()">SIGNIN</button>
                </div>
            </div>
            <div class="container mt-3">
                <form action="handlers/registration.php" method="post">
                    <div class="signup-form text-center">
                        <div class="row">
                            <div class="col-lg-6 col-sm-12">
                                <input type="text" placeholder="First Name" name="Fname" id="Fname" required>
                            </div>
                            <div class="col-lg-6 col-sm-12">
                                <input type="text" placeholder="Last Name" name="Lname" id="Lname" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-8">
                                <input type="email" placeholder="Enter Email" name="email" id="email" required>
                            </div>
                            <div class="col-4">
                                <input type="date" name="dob" id="dob" required>
                            </div>
                        </div>
                        <input type="text" placeholder="User Name" name="userName" id="userName" required>
                        <?php
                        if (isset($_GET['status']) && $_GET['status'] == 0) {
                            echo $ErrorMessage = "<span color='red'><b>user Exist</b></span>";
                        }
                        ?>
                        <div class="row">
                            <div class="col-7">
                                <input type="text" placeholder="City" name="city" id="city" required>

                            </div>

                            <div class="col-5">
                                <input type="text" placeholder="State" name="state" id="state" required>

                            </div>
                        </div>
                        <input type="password" placeholder="Enter Password" name="psw" id="psw" required>
                        <?php
                        if (isset($_GET['status']) && $_GET['status'] == 1) {
                            echo $ErrorMessage = "<span color='red'><b>Password does not match</b></span>";
                        }
                        ?>
                        <input type="password" placeholder="Repeat Password" name="psw-repeat" id="psw-repeat" required>
                    </div>
                    <hr>
                    <p>Already have an<a onclick="showLoginForm()" href="#"> Account</a></p>

                    <button type="submit" name="submit" class="registerbtn mb-5">Register</button>
                </form>
            </div>
        </div>

        <div class="col-lg-6 col-sm-12" id="signIn-cont">
            <form class="mt-5" action="handlers/login.php" method="post">
                <div class="container">
                    <input type="text" placeholder="Enter Username" name="uname" required>
                    <?php
                    if (isset($_GET['error']) && $_GET['error'] == 0) {
                        echo $ErrorMessage = "<span style=\"color:red;\"><b>User Name does not exit!</b></span>";
                    }
                    ?>
                    <input type="password" placeholder="Enter Password" name="psw" required>
                    <?php
                    if (isset($_GET['error']) && $_GET['error'] == 1) {
                        echo $ErrorMessage = "<span style=\"color:red;\"><b>Wrong Password!</b></span>";
                    }
                    ?>

                    <button type="submit" name="submit" class="registerbtn">Login</button>
                    <label>
                        <input type="checkbox" checked="checked" name="remember"> Remember me
                    </label>
                    <p>I Don't Have an<a onclick="showSignUpForm()" href="#"> Account</a></p>
                    <p><span class="forgot" style="float:left;">Forgot <a href="#">password?</a></span></p>

                </div>
            </form>
        </div>
    </div>
</div>

<script>
    var bar = document.getElementById("regBar");
    signup = document.getElementById("SIGNUP");
    signin = document.getElementById("SIGNIN");

    function right() {
        bar.style.animation = "go 0.9s ease-in-out";
        bar.style.marginLeft = "34.5%";
        signin.style.display = "block";
        signup.style.display = "none";

    }

    function left() {
        bar.style.animation = "return 0.9s ease-in-out";
        bar.style.marginLeft = "-1%";
        signup.style.display = "block";
        signin.style.display = "none";

    }




    var loginForm = document.getElementById("signIn-cont");
    var signUpForm = document.getElementById("signUp");

    function showLoginForm() {
        signUpForm.style.display = "none";
        loginForm.style.display = "block";
    }

    function showSignUpForm() {
        loginForm.style.display = "none";
        signUpForm.style.display = "block";
    }
</script>