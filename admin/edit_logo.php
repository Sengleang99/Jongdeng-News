<?php 
    include('sidebar.php');
        $id_logo = $_GET['id'];
        $sql = "SELECT * FROM `table_logo` WHERE `id`=$id_logo";
        $rs = $cn->query($sql);
        $row = mysqli_fetch_assoc($rs);
        $select_header="";
        $select_footer="";
        if($row['status'] == "Header"){
            $select_header="selected";
        }else{
            $select_footer="selected";
        }
?>
<div class="col-10">
    <div class="content-right">
        <div class="top">
            <h3>Edit Logo</h3>
        </div>
        <div class="bottom">
            <figure>
                <form method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Image</label>
                        <input type="file" name="image" class="form-control">
                        <input type="text" hidden value="<?php echo $row['image'] ?>">
                        <input type="text" hidden name="id" value="<?php echo $id_logo ?>">
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select class="form-select" name="status">
                            <option value="Header" <?php echo $select_header="selected";?>>Header</option>
                            <option value="Footer" <?php echo $select_footer="selected";?>>Footer</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <button type="submit" name="update_logo" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </figure>
        </div>
    </div>
</div>