<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body>

</body>

</html>

<?php 
    include_once "function.php"; 
$cn= new mysqli("localhost","root","","jongdeng_news");
session_start();
function register(){
    global $cn;
    if(isset($_POST['btn_register'])){
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $profile = $_FILES['image']['name'];
        if(!empty($username) && !empty($email) && !empty($password) && !empty($profile)){
            $profile = rand(1,9999).'-'.$profile;
            $part = "assets/image/".$profile;
            move_uploaded_file($_FILES['image']['tmp_name'],$part);
            $password = md5($_POST['password']);
            $sql = "INSERT INTO `table_user`(`id`, `username`, `email`, `password`, `profile`)
            VALUES (null,'$username','$email','$password','$profile')";
            $rs = $cn->query($sql);
            if($rs){
                echo "
                <script>
                    swal('Successfull!', 'You clicked the button!', 'success');
                </script>
                ";
                
            }
        }
       
    }
}
register();

function login(){
    global $cn;
    if(isset($_POST['btn_login'])){
        $name_email = $_POST['name_email'];
        $password = $_POST['password'];
        if(!empty($name_email) && !empty($password)){
            $password = md5($_POST['password']);
            $sql = "SELECT * FROM `table_user` WHERE (`username`='$name_email' || `email`='$name_email') AND `password`='$password'";
            $rs = $cn->query($sql);
            $row = mysqli_fetch_assoc($rs);
            if($row){
                $session_id = $row['id'];
                $_SESSION['id'] = $session_id;
                header("location:index.php");
            }
        }
    }
}
login();

function logout(){
    
    if(isset($_POST['btn-logout'])){
       unset($_SESSION['id']);
       header("location:login.php");
    }
}
logout();

function Insert_Logo(){
    global $cn;
    if(isset($_POST['submit_logo'])){
        $status = $_POST['status'];
        $image = $_FILES['image']['name'];
        if(!empty($image) && !empty($status)){
            $image = rand(1,9999).'-'. $_FILES['image']['name'];
            $part = "assets/image/".$image;
            move_uploaded_file($_FILES['image']['tmp_name'],$part);
            $sql ="INSERT INTO `table_logo`(`id`, `image`, `status`) VALUES (null,'$image','$status')";
            $rs = $cn->query($sql);
            if($rs){
                echo "
                <script>
                    swal('Successfull!', 'You clicked the button!', 'success');
                </script>
                ";
            }
        }
    }
}
Insert_Logo();

function image($type){
    $image = rand(1,9999).'-'. $_FILES[$type]['name'];
    $part = "assets/image/".$image;
    move_uploaded_file($_FILES[$type]['tmp_name'],$part);
    return $image;
}
function Update_logo(){
    global $cn;
    if(isset($_POST['update_logo'])){
        $id = $_POST['id'];
        $status = $_POST['status'];
        $image = image("image");
        $sql = "UPDATE `table_logo` SET `image`='$image',`status`='$status' WHERE `id`=$id";
        $rs = $cn->query($sql);
        if($rs){
            echo "
                <script>
                    swal('Update Successfull!', 'You clicked the button!', 'success');
                </script>
                ";
        }
    }
}
Update_logo();

function Delete_logo(){
    global $cn;
    if(isset($_POST['accept_delete'])){
       $id_remove = $_POST['remove_id'];
       $sql = "DELETE FROM `table_logo` WHERE `id`= $id_remove";
       $rs = $cn->query($sql);
    }
}
Delete_logo();

function Insert_Sport_news(){
    global $cn;
    if(isset($_POST['btn-sport'])){
        $auth_id = $_SESSION['id'];
        $title = $_POST['title'];
        $type = $_POST['type'];
        $category = $_POST['category'];
        $image = $_FILES['image']['name'];
        $description = $_POST['description'];
         if(!empty($title) && !empty($type) && !empty($category) && !empty($description) && !empty($image)){
            $image = rand(1,9999).'-'. $_FILES['image']['name'];
            $part = "assets/image/".$image;
            move_uploaded_file($_FILES['image']['tmp_name'],$part);
            $sql = "INSERT INTO `table_news`(`Auth_id`, `banner`, `news_type`, `category`, `title`, `description`) 
            VALUES ('$auth_id','$image','$type','$category','$title','$description')";
            $rs = $cn->query($sql);
            if($rs){
                echo "
                <script>
                    swal('Successfull!', 'You clicked the button!', 'success');
                </script>
                ";
            }
         }
    }
}
Insert_Sport_news();

function Update_sport_news(){
    global $cn;
    if(isset($_POST['Update_sport'])){
        $id = $_POST['id'];
        $title = $_POST['title'];
        $category = $_POST['category'];
        $type = $_POST['type'];
        $image = $_FILES['image']['name'];
        $image = rand(1,9999).'-'. $_FILES['image']['name'];
        $part = "assets/image/".$image;
        move_uploaded_file($_FILES['image']['tmp_name'],$part);
        $description = $_POST['description'];
        $sql = "UPDATE `table_news` SET `banner`='$image', `news_type`='$type', `category`='$category',`title`='$title',`description`='$description' WHERE `id`=$id";
        $rs = $cn->query($sql);
        if($rs){
            echo "
                <script>
                    swal('Update Successfull!', 'You clicked the button!', 'success');
                </script>
                ";
        }else{
            echo '
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Holy guacamole!</strong> You should check in on some of those fields below.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
            ';
        }
    }
}

Update_sport_news();

function delete_news(){
    global $cn;
    if(isset($_POST['btn-delete'])){
        $id_remove = $_POST['remove_id'];
        $sql = "DELETE FROM `table_news` WHERE `id`= $id_remove";
        $rs = $cn->query($sql);
    }
}
delete_news();