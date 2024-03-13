<?php include('header.php');?>

<main class="sport">
    <section class="trending">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="content-trending">
                        <div class="content-left">
                            NATIONAL SOCIAL NEWS
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container">
            <div class="row">
                <?php 
                if(isset($_GET['page'])){
                    $page = $_GET['page'];
                }else{
                    $page = 1;
                }
                    list_sport_news('SOCIAL','National',$page,3);
                ?>

            </div>
            <div class="row pagination">
                <div class="col-12">
                    <ul>
                        <?php
                            pagination(3);
                        ?>
                        <!-- <li>
                            <a href="">1</a>
                        </li>
                        <li>
                            <a href="">2</a>
                        </li>
                        <li>
                            <a href="">3</a>
                        </li> -->
                    </ul>
                </div>
            </div>
        </div>
    </section>
</main>
<?php include('footer.php'); ?>