<?php 
    include('sidebar.php');
?>
<div class="col-10">
    <div class="content-right">
        <div class="top">
            <h3>All Sport News</h3>
        </div>
        <div class="bottom view-post">
            <figure>
                <form method="post" enctype="multipart/form-data">
                    <!-- <div class="block-search">
                                        <input type="text" class="form-control" placeholder="SEARCH HERE">
                                        <button type="submit">
                                        <img src="search.png" alt=""></button>
                                    </div> -->
                    <table class="table" border="1px">
                        <tr>
                            <th>ID</th>
                            <th>Type</th>
                            <th>Image</th>
                            <th>Actions</th>
                        </tr>

                        <?php
                                $cn = new mysqli("localhost","root","","jongdeng_news");
                                $sql = "SELECT * FROM `table_logo` ";
                                $rs = $cn->query($sql);
                                while($row=$rs->fetch_assoc()){
                                    ?>
                        <tr>
                            <td><?php echo $row['id'] ?></td>
                            <td><?php echo $row['status'] ?></td>
                            <td><img src="assets/image/<?php echo $row['image'] ?>" width="50px" height="35px" /></td>
                            <td width="150px">
                                <a href="edit_logo.php?id=<?php echo $row['id'] ?>" class="btn btn-primary">Update</a>
                                <button type="button" remove-id="<?php echo $row['id'] ?>"
                                    class="btn btn-danger btn-remove" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal">
                                    Remove
                                </button>
                            </td>
                            <?php
                                    
                                }
                                
                            ?>
                        </tr>
                    </table>
                    <ul class="pagination">
                        <li>
                            <a href="">1</a>
                            <a href="">2</a>
                            <a href="">3</a>
                            <a href="">4</a>
                        </li>
                    </ul>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <h5 class="modal-title" id="exampleModalLabel">Are you sure to remove this post?
                                    </h5>
                                </div>
                                <div class="modal-footer">
                                    <form action="" method="post">
                                        <input type="hidden" class="value_remove" name="remove_id">
                                        <button type="submit" name="accept_delete" class="btn btn-danger">Yes</button>
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">No</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </figure>
        </div>
    </div>
</div>
</div>
</div>
</main>
</body>

</html>