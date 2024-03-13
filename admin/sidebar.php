<?php
    include_once "function.php";
    if(isset($_SESSION['id'])){
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>

    <!-- @theme style -->
    <link rel="stylesheet" href="assets/style/theme.css">

    <!-- @Bootstrap -->
    <link rel="stylesheet" href="assets/style/bootstrap.css">

    <!-- @script -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/theme.js"></script>
    <script src="assets/js/bootstrap.js"></script>

    <!-- @tinyACE -->
    <script src="https://cdn.tiny.cloud/1/5gqcgv8u6c8ejg1eg27ziagpv8d8uricc4gc9rhkbasi2nc4/tinymce/6/tinymce.min.js"
        referrerpolicy="origin"></script>

</head>

<body>
    <main class="admin">
        <div class="container-fluid">
            <div class="row">
                <div class="col-2">
                    <div class="content-left">
                        <div class="wrap-top">
                            <img src="assets/icon/admin-logo.png" alt="">
                            <h5>Jong Deng News</h5>
                        </div>
                        <?php 
                            $cn = new mysqli("localhost","root","","jongdeng_news");
                            $session_id = $_SESSION['id'];
                            $sql = "SELECT * FROM `table_user` WHERE `id` = $session_id";
                            $rs = $cn->query($sql);
                            $row = mysqli_fetch_assoc($rs);
                        ?>
                        <div class="wrap-center">
                            <img src="assets/image/<?php echo $row['profile'] ?>" width="40px" height="40px" alt="">
                            <h6>Welcome Admin <?php echo $row['username'] ?></h6>
                        </div>
                        <div class="wrap-bottom">
                            <ul>
                                <li class="parent">
                                    <a class="parent" href="javascript:void(0)">
                                        <span>Logo</span>
                                        <img src="assets/icon/arrow.png" alt="">
                                    </a>
                                    <ul class="child">
                                        <li>
                                            <a href="Add_Logo.php">Add Logo Post</a>
                                            <a href="View_Logo.php">View Logo Post</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="parent">
                                    <a class="parent" href="javascript:void(0)">
                                        <span>LISTS NEWS</span>
                                        <img src="assets/icon/arrow.png" alt="">
                                    </a>
                                    <ul class="child">
                                        <li>
                                            <a href="Add_sport_new.php">ADD ONATHER NEWS</a>
                                            <a href="View_sport_new.php">VIEWS ALL NEWS</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="parent">
                                    <a class="parent" href="javascript:void(0)">
                                        <span>Feedback</span>
                                        <img src="assets/icon/arrow.png" alt="">
                                    </a>
                                    <ul class="child">
                                        <li>
                                            <a href="View_feedback.php">View Feedback</a>
                                        </li>
                                    </ul>
                                </li>
                                <!-- <li class="parent">
                                    <a class="parent" href="javascript:void(0)">
                                        <span>MAIN MENU</span>
                                        <img src="assets/icon/arrow.png" alt="">
                                    </a>
                                    <ul class="child">
                                        <li>
                                            <a href="1">View Post</a>
                                            <a href="1">Add New</a>
                                        </li>
                                    </ul>
                                </li> -->
                                <li class="parent">
                                    <a class="parent" href="logout.php">
                                        <span>LOGOUT</span>
                                        <img src="assets/icon/arrow.png" alt="">
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <?php
    }else{
        header("localhost:login.php");
        exit();
    }
                ?>