<?php 
include('sidebar.php');

// Pagination variables
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$limit = 5; // Number of records per page
$offset = ($page - 1) * $limit;

$cn = new mysqli("localhost", "root", "", "jongdeng_news");
$sql = "SELECT * FROM `table_news` ORDER BY id DESC LIMIT $limit OFFSET $offset";
$rs = $cn->query($sql);
?>

<div class="col-10">
    <div class="content-right">
        <div class="top">
            <h3>All View Sport News</h3>
        </div>
        <div class="bottom view-post">
            <figure>
                <form method="post" enctype="multipart/form-data">
                    <table class="table" border="1px">
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Categories</th>
                            <th>Photo</th>
                            <th>Description</th>
                            <th>Date</th>
                            <th>Viewer</th>
                            <th>Actions</th>
                        </tr>
                        <?php
                    while ($row = $rs->fetch_assoc()) {
                    ?>
                        <tr>
                            <td><?php echo $row['id'] ?></td>
                            <td><?php echo $row['title'] ?></td>
                            <td><?php echo $row['category'] ?></td>
                            <td><img src="assets/image/<?php echo $row['banner'] ?>" width="80px" height="80px" /></td>
                            <td><?php echo $row['description'] ?></td>
                            <td><?php echo $row['create_at'] ?></td>
                            <td><?php echo $row['viewer'] ?></td>
                            <td width="150px">
                                <a href="Edit_sport_news.php?id=<?php echo $row['id']; ?>"
                                    class="btn btn-primary">Update</a>
                                <button type="button" remove-id="<?php echo $row['id']; ?>"
                                    class="btn btn-danger btn-remove" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal">
                                    Remove
                                </button>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                    </table>

                    <!-- Pagination -->
                    <ul class="pagination">
                        <?php
                    // Previous page link
                    $prev = $page - 1;
                    if ($prev > 0) {
                        echo "<li><a href='?page=$prev'>Previous</a></li>";
                    }

                    // Page numbers
                    $total_pages_sql = "SELECT COUNT(*) as count FROM `table_news`";
                    $total_pages_result = $cn->query($total_pages_sql);
                    $total_pages_row = $total_pages_result->fetch_assoc();
                    $total_pages = ceil($total_pages_row['count'] / $limit);

                    for ($i = 1; $i <= $total_pages; $i++) {
                        echo "<li><a href='?page=$i'>$i</a></li>";
                    }

                    // Next page link
                    $next = $page + 1;
                    if ($next <= $total_pages) {
                        echo "<li><a href='?page=$next'>Next</a></li>";
                    }
                    ?>
                    </ul>
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
                                        <button type="submit" name="btn-delete" class="btn btn-danger">Yes</button>
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