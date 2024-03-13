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
                            <th>Username</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Message</th>
                        </tr>
                        <?php  
                            $cn= new mysqli("localhost","root","","jongdeng_news");
                            $sql = "SELECT * FROM `table_feedback` ORDER BY `id` DESC LIMIT 5";
                            $rs = $cn->query($sql);
                            while($row = $rs->fetch_assoc()){
                                ?>
                        <tr>
                            <td><?php echo $row['id'] ?></td>
                            <td><?php echo $row['username'] ?></td>
                            <td><?php echo $row['email'] ?></td>
                            <td><?php echo $row['phone'] ?></td>
                            <td><?php echo $row['address'] ?></td>
                            <td><?php echo $row['description'] ?></td>
                        </tr>
                        <?php
                            }
                        ?>
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