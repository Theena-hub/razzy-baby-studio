
<!DOCTYPE html>
<html lang="en">
    <!-- Head - Start -->
    <?php include('head.php') ?>
<body>

    <!-- Header Start -->
    <?php include('header.php') ?>
    <?php
        $s_id = $_GET['sid'];
        $query = "SELECT * FROM `tbl_service` WHERE id='$s_id' and status='1'";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_array($result);
        $b_img = 'admin/dashboard/uploads/'. $row['image_two'];

    ?>

    <!-- Page Name Start -->
    <section class="page-name-area page-name-two-area background-image overlay-white" data-src="<?= $b_img ?>">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-name-col text-center">
                        <!-- <h6>Photography</h6> -->
                        <h2>Our Services</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- project Start -->
    <section class="project-area pb-0">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="my-title text-center">
                        <h2 class="col-blue"><?= $row['name'] ?></h2>
                        <p class="ebg"><?= $row[ 'description' ] ?></p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="my-gallery">
                        <div class="gallery-container masonry-gallery">
                            <?php
                                $query2 = "SELECT * FROM `tbl_service_images` WHERE service_id='$s_id' and status='1' order by id desc";
                                $result2 = mysqli_query($conn, $query2);                                    
                                while ($row2 = mysqli_fetch_array($result2)) {
                                    $img = 'admin/dashboard/uploads/'. $row2['image'];
                            ?>
                                    <div class="item">
                                        <div class="project-item">
                                            <img src="<?= $img ?>" alt="">
                                            <div class="project-overlay">
                                                <ul>
                                                    <li>
                                                        <a href="<?= $img ?>" class="html5lightbox" data-group="mygroup" data-thumbnail="<?= $img ?>"><img src="assets/img/click.png" alt=""></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                            <?php
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
        
    <!-- Contact Separator Start -->
    <?php include('contactdiv.php') ?>

    <!-- Footer Start -->
    <?php include('footer.php')?>

    <!-- Script - Start -->
    <?php include('script.php') ?>
    <?php include('form_backend.php') ?>

    <!-- All Included JavaScript -->
    <script src="js/html5lightbox.js"></script>

</body>

</html>