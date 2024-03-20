<!DOCTYPE html>
<html lang="en">
    <!-- Head - Start -->
    <?php include('head.php') ?>
<body>

    <!-- Header Start -->
    <?php include('header.php') ?>

    <!-- Page Name Start -->
    <section class="page-name-area page-name-two-area background-image overlay-white" data-src="assets/img/Gallery.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-name-col text-center">
                        <!-- <h6>Photography</h6> -->
                        <h2>Our Gallery</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- project Start -->  
    <section class="project-area pb-0">
        <div class="container">
            <div class="row">
                <div class="col-xl-6">
                    <div class="py-2">
                        <h2 class="col-blue">Explore Our Photography Work list</h2>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="nav-col">
                        <div class="my-gallery">
                            <div class="gallery-nav">
                                <ul>
                                    <li><a data-filter="*" href="#" class="active">All Photos</a></li>
                                    <?php
                                        $query = "SELECT tbl_gallery_images.*, tbl_service.name AS service_name
                                                FROM tbl_gallery_images
                                                JOIN tbl_service ON tbl_gallery_images.service_id = tbl_service.id
                                                WHERE tbl_gallery_images.status = 1 group by service_id asc";
                                        $result = mysqli_query($conn, $query);                                    
                                        while ($row = mysqli_fetch_array($result)) {
                                    ?>
                                            <li><a data-filter=".s_<?= $row['service_id'] ?>" href="#"><?= $row['service_name'] ?></a></li>
                                    <?php
                                        }
                                    ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="my-gallery">
                        <div class="gallery-container masonry-gallery">
                            <?php
                                $query1 = "SELECT * FROM `tbl_gallery_images` WHERE status='1' order by id desc";
                                $result1 = mysqli_query($conn, $query1);                                    
                                while ($row1 = mysqli_fetch_array($result1)) {
                                    $s_id = $row1['service_id'];
                                    $s_img = 'admin/dashboard/uploads/'. $row1['image'];
                            ?>
                                    <div class="item s_<?= $s_id ?>">
                                        <div class="project-item">
                                            <img src="<?= $s_img ?>" alt="">
                                            <div class="project-overlay">
                                                <ul>
                                                    <li>
                                                        <a href="<?= $s_img ?>" class="html5lightbox" data-group="mygroup" data-thumbnail="<?= $s_img ?>"><img src="assets/img/click.png" alt="click"></a>
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
    <?php include('footer.php') ?>

    <!-- Script - Start -->
    <?php include('script.php') ?>
    <?php include('form_backend.php') ?>

    <!-- All Included JavaScript -->
    <script src="js/html5lightbox.js"></script>

</body>

</html>