<?php 
    include('sidebar.php');
    $id_sport = $_GET['id'];
    $sql = "SELECT * FROM `table_news` WHERE `id`='$id_sport'";
    $rs = $cn->query($sql);
    $row = mysqli_fetch_assoc($rs);
    $select_national = "";
    $select_international = "";
    if($row['category'] == "National"){
        $select_national = "selected";
    } else {
        $select_international = "selected";
    }
?>
<?php
    $id_type = $_GET['id'];
    $sql = "SELECT * FROM `table_news` WHERE `id`='$id_type'";
    $rs = $cn->query($sql);
    $row = mysqli_fetch_assoc($rs);
    $select_sport = "";
    $select_social = "";
    $select_entertainment = "";
    if($row['news_type'] == "Sport"){
        $select_sport = "selected";
    } else if ($row['news_type'] == "SOCIAL"){
        $select_social = "selected";
    }else{
        $select_entertainment = "selected";
    }
?>
<div class="col-10">
    <div class="content-right">
        <div class="top">
            <h3>Edit News</h3>
        </div>
        <div class="bottom">
            <figure>
                <form method="post" enctype="multipart/form-data">
                    <?php include_once "function.php"; ?>
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" name="title" value="<?php echo $row['title']; ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Type</label>
                        <select class="form-select" name="type">
                            <option value="Sport" <?php echo $select_sport; ?>>SPORT</option>
                            <option value="SOCIAL" <?php echo $select_social; ?>>SOCIAL</option>
                            <option value="ENTERTAINMENT" <?php echo $select_entertainment; ?>>ENTERTAINMENT</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Category</label>
                        <select class="form-select" name="category">
                            <option value="National" <?php echo $select_national; ?>>National</option>
                            <option value="International" <?php echo $select_international; ?>>International</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Option</label>
                        <input type="checkbox" class="form-check-input">
                    </div>
                    <div class="form-group">
                        <label>File</label>
                        <input type="file" name="image" class="form-control">
                        <input type="text" hidden value="<?php echo $row['banner']; ?>">
                        <input type="text" hidden name="id" value="<?php echo $id_sport ?>">
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control" name="description"><?php echo $row['description']; ?></textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" name="Update_sport" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </figure>
        </div>
    </div>
</div>