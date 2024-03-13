<?php 
    include('sidebar.php');
?>
<div class="col-10">
    <div class="content-right">
        <div class="top">
            <h3>ADD ONATHER NEWS</h3>
        </div>
        <div class="bottom">
            <figure>
                <form method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" name="title" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Type</label>
                        <select class="form-select" name="type">
                            <option value="Sport">SPORT</option>
                            <option value="SOCIAL">SOCIAL</option>
                            <option value="ENTERTAINMENT">ENTERTAINMENT</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Category</label>
                        <select class="form-select" name="category">
                            <option value="National">National</option>
                            <option value="International">International</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Option</label>
                        <input type="checkbox" class="form-check-input">
                    </div>
                    <div class="form-group">
                        <label>File</label>
                        <input type="file" name="image" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control" name="description"></textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" name="btn-sport" class="btn btn-primary">Submit</button>
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