<style>
    .sidebar2 {
        height: 100%;
        width: 60px;
        position: fixed;
        z-index: 1;
        top: 0;
        left: 0;
        background-color: rgba(33, 33, 33, 0.916);
        overflow-x: hidden;
        padding-top: 100px;
        transition: 0.3s;
    }
    .sidebar2:hover{
        width: 120px;

    }

    .sidebar2 a {
        position: absolute;
        left: -80px;
        transition: 0.3s;
        /* padding: 50px 8px 6px 16px; */
        text-decoration: none;
        font-size: 20px;
        color: beige;
        display: block;


    }

    .sidebar2 a:hover {
        color: red;
        left: 0;
    }
    #companies:hover{
        left: 0;
    }
    #home{
        margin-top: 60px;
    }
    #table{
        margin-top: 120px;
    }
    #client{
        margin-top: 180px;
    }
    #companies{
        margin-top: 240px;
        left: -105px;
    }
    #settings{
        margin-top: 300px;
    }
#contact{
    margin-top: 360px;
}


</style>
</head>

<body>

    <div class="sidebar2">
        <a href="dashboard.php" id="home">Home<i class="zmdi zmdi-home" style="padding-left:47px;"></i></a>
        <a href="table.php" id="table">Tables<i class="fa fa-table" style="padding-left:41px;"></i></a>
        <a href="#client" id="client">Client<i class="icon icon-people" style="padding-left:47px;"></i></a>
        <a href="#client" id="companies">Companies<i class="icon icon-people" style="padding-left:24px;"></i></a>
        <a href="#setting" id="settings">Setting<i class="icon icon-settings" style="padding-left:37px;"></i></a>
        <a href="#contact" id="contact">Contact<i class="icon icon-phone" style="padding-left:30px;"></i></a>

    </div>