<!-- @import jquery & sweet alert  -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<?php
    $cn= new mysqli("localhost","root","","jongdeng_news");
function get_logo($type){
    global $cn;
    $sql = "SELECT * FROM `table_logo` WHERE `status`='$type' ORDER BY id DESC";
    $rs = $cn->query($sql);
    $row = mysqli_fetch_assoc($rs);
    echo $row['image'];
}
function get_title(){
    global $cn;
    $sql = "SELECT * FROM `table_news` ORDER BY `id` DESC LIMIT 3";
    $rs = $cn->query($sql);
    while($row=$rs->fetch_assoc()){
        $id = $row['id'];
        $title = $row['title'];
        echo '
            <i class="fas fa-angle-double-right"></i>
            <a href="news-detail.php?id='.$id.'">'.$title.'</a> &ensp;
        ';
    }
}
function get_news_detail($get_id){
    global $cn;
    $sql  = "SELECT * FROM `table_news` WHERE `id` = '$get_id'";
    $rs = $cn->query($sql);
    $row = mysqli_fetch_assoc($rs);
    $image = $row['banner'];
    $title = $row['title'];
    $description = $row['description'];
    $date = $row['create_at'];
    echo '
    <div class="main-news">
    <div class="thumbnail">
        <img src="../admin/assets/image/'.$image.'" width="730px" height="415px">
    </div>
    <div class="detail">
        <h3 class="title">'.$title.'</h3>
        <div class="date">'.$date.'</div>
        <div class="description">
            '.$description.'
        </div>
    </div>
</div>
    ';

}
function get_news_type($id){
    global $cn;
    $sql  = "SELECT * FROM `table_news` WHERE `id` = '$id'";
    $rs = $cn->query($sql);
    $row = mysqli_fetch_assoc($rs);
    return $row['news_type'];
}

function get_related_news($id){
    global $cn;
    $news_sport = get_news_type($id);
    $sql  = "SELECT * FROM `table_news` WHERE `news_type` = '$news_sport' AND `id` NOT IN($id) ORDER BY `id` DESC LIMIT 2";
    $rs = $cn->query($sql);
    while($row = $rs->fetch_assoc()){
        $id = $row['id'];
        $image = $row['banner'];
        $title = $row['title'];
        $description = $row['description'];
        $date = $row['create_at'];
        echo '
        <figure>
        <a href="news-detail.php?id='.$id.'">
            <div class="thumbnail">
            <img src="../admin/assets/image/'.$image.'" width="350px" height="200px">
            </div>
            <div class="detail">
                <h3 class="title">'.$title.'</h3>
                <div class="date">'.$date.'</div>
                <div class="description">
                    '.$description.'
                </div>
            </div>
        </a>
    </figure>
        ';
    }
}

function get_viewer($id){
    global $cn;
    $sql = "UPDATE `table_news` SET `viewer`=`viewer`+1 WHERE `id`='$id'";
    $rs = $cn->query($sql);

}
function get_min_news($type){
    global $cn;
    if($type == "TRENDING"){
        $sql  = "SELECT * FROM `table_news` ORDER BY `viewer` DESC LIMIT 1";
        $rs = $cn->query($sql);
        $row = mysqli_fetch_assoc($rs);
        $id = $row['id'];
        $image = $row['banner'];
        $title = $row['title'];
        echo '
        <figure>
        <a href="news-detail.php?id='.$id.'">
            <div class="thumbnail">
            <img src="../admin/assets/image/'.$image.'" width="730px" height="415px">
                <div class="title">
                '.$title.'
                </div>
            </div>
        </a>
    </figure>
        ';
    }else{
        $sql = "SELECT * FROM `table_news` WHERE `id` != (SELECT `id` FROM `table_news` ORDER BY `viewer` DESC LIMIT 1) ORDER BY `id` DESC LIMIT 2";
        $rs = $cn->query($sql);
        while($row=$rs->fetch_assoc()){
        $id = $row['id'];
        $image = $row['banner'];
        $title = $row['title'];
        echo '
        <div class="col-12">
        <figure>
        <a href="news-detail.php?id='.$id.'">
            <div class="thumbnail">
            <img src="../admin/assets/image/'.$image.'" width="350px" height="200px">
                <div class="title">
                '.$title.'
                </div>
            </div>
        </a>
        </figure>
        </div>
        ';
        }
        
    }
}

function get_sport_news(){
    global $cn;
    $sql = "SELECT * FROM `table_news` WHERE `news_type`='Sport' LIMIT 3";
    $rs = $cn->query($sql);
    while($row=$rs->fetch_assoc()){
        $id = $row['id'];
        $image = $row['banner'];
        $title = $row['title'];
        echo '
                <div class="col-4">
                    <figure>
                        <a href="news-detail.php?id='.$id.'">
                            <div class="thumbnail">
                            <img src="../admin/assets/image/'.$image.'" width="350px" height="200px">
                                <div class="title">
                                    '.$title.'
                                </div>
                            </div>
                        </a>
                    </figure>
                </div>
        ';
    }
}
function get_social_news(){
    global $cn;
    $sql = "SELECT * FROM `table_news` WHERE `news_type`='SOCIAL' LIMIT 3";
    $rs = $cn->query($sql);
    while($row=$rs->fetch_assoc()){
        $id = $row['id'];
        $image = $row['banner'];
        $title = $row['title'];
        echo '
                <div class="col-4">
                    <figure>
                        <a href="news-detail.php?id='.$id.'">
                            <div class="thumbnail">
                            <img src="../admin/assets/image/'.$image.'" width="350px" height="200px">
                                <div class="title">
                                    '.$title.'
                                </div>
                            </div>
                        </a>
                    </figure>
                </div>
        ';
    }
}
function get_entertainment_news(){
    global $cn;
    $sql = "SELECT * FROM `table_news` WHERE `news_type`='ENTERTAINMENT' LIMIT 3";
    $rs = $cn->query($sql);
    while($row=$rs->fetch_assoc()){
        $id = $row['id'];
        $image = $row['banner'];
        $title = $row['title'];
        echo '
                <div class="col-4">
                    <figure>
                        <a href="news-detail.php?id='.$id.'">
                            <div class="thumbnail">
                            <img src="../admin/assets/image/'.$image.'" width="350px" height="200px">
                                <div class="title">
                                    '.$title.'
                                </div>
                            </div>
                        </a>
                    </figure>
                </div>
        ';
    }
}

function Search($query){
    global $cn;
    $sql = "SELECT * FROM `table_news` WHERE `title` LIKE '%$query%'";
    $rs = $cn->query(($sql));
    while($row= $rs->fetch_assoc()){
        $id = $row['id'];
        $image = $row['banner'];
        $title = $row['title'];
        $description = $row['description'];
        $date = $row['create_at'];
        echo '
        <div class="col-4">
            <figure>
                <a href="news-detail.php?id='.$id.'">
                    <div class="thumbnail">
                    <img src="../admin/assets/image/'.$image.'" width="350px" height="200px">
                    </div>
                    <div class="detail">
                        <h3 class="title">'.$title.'</h3>
                        <div class="date">'.$date.'</div>
                        <div class="description">
                           '.$description.'
                        </div>
                    </div>
                </a>
            </figure>
        </div>
        ';
    }
}
function list_sport_news($news_type,$category,$page,$limit){
    $start = ($page-1)*$limit;
    global $cn;
    $sql = "SELECT * FROM `table_news` WHERE `news_type` = '$news_type' AND `category` = '$category' LIMIT $start,$limit";
    $rs = $cn->query($sql);
    while($row=$rs->fetch_assoc()){
        $id = $row['id'];
        $image = $row['banner'];
        $title = $row['title'];
        $description = $row['description'];
        $date = $row['create_at'];
        echo '
        <div class="col-4">
        <figure>
            <a href="news-detail.php?id='.$id.'">
                <div class="thumbnail">
                <img src="../admin/assets/image/'.$image.'" width="350px" height="200px">
                </div>
                <div class="detail">
                    <h3 class="title">'.$title.'</h3>
                    <div class="date">'.$date.'</div>
                    <div class="description">
                       '.$description.'
                    </div>
                </div>
            </a>
        </figure>
    </div>
                        ';
    }
}
function pagination($limit){
    global $cn;
    $sql = "SELECT COUNT(id)AS total_post FROM `table_news`";
    $rs = $cn->query($sql);
    $row = mysqli_fetch_assoc($rs);
    $total_post = $row['total_post'];
    $pagination = ceil($total_post / $limit);
    for($i=1; $i<=$pagination; $i++){
        echo '
            <li>
                <a href="?page='.$i.'">'.$i.'</a>
            </li>
        ';
    }
}
function contact(){
    global $cn;
    if(isset($_POST['btn_message'])){
        $username = $_POST['username'];
        $email = $_POST['email'];
        $phone = $_POST['telephone'];
        $address = $_POST['address'];
        $message = $_POST['message'];
        $sql = "INSERT INTO `table_feedback`(`username`, `email`, `phone`, `address`, `description`) 
        VALUES ('$username','$email','$phone','$address','$message')";
        $rs = $cn->query($sql);
       
    }
}
contact();
?>



<!-- // @Connection database
// $con = new mysqli('','root','',''); -->