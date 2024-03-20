<!DOCTYPE html>
<html lang="en">
    <!-- Head - Start -->
    <?php include('head.php') ?>
<body>

    <!-- Header Start -->
    <?php include('header.php') ?>

    <!-- Page Name Start -->
    <section class="page-name-area page-name-two-area background-image overlay-white" data-src="assets/img/Rental.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-name-col text-center">
                        <!-- <h6>Rental</h6> -->
                        <h2>Rental Service</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- project Start -->
    <section class="project-area pb-0">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="my-gallery">
                        <div class="gallery-container masonry-gallery">
                            <?php
                                $query = "SELECT * FROM `tbl_rental` WHERE status='1' ORDER BY id DESC";
                                $result = mysqli_query($conn, $query);                
                                while ($row = mysqli_fetch_array($result)) {
                                    $pdf = 'admin/dashboard/uploads/documents/'. $row['document'];
                                    $img = 'admin/dashboard/uploads/'. $row['image'];
                            ?>
                                    <div class="item">
                                        <div class="project-item">
                                            <img src="<?= $img ?>" alt="img">
                                            <div class="project-overlay">
                                                <ul>
                                                    <li>
                                                        <a href="<?= $img ?>" class="html5lightbox" data-group="mygroup" data-thumbnail="<?= $img ?>" title="Project 1"><img src="images/click.png" alt=""></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <a href="<?= $pdf ?>" class="d-flex justify-content-center mt-2" target="_blank"><button class="my-btn">download</button></a>
                                    </div>
                            <?php 
                                }
                            ?>
                        </div>
                    </div>
                    <!--<div class="load-more-btn text-center">-->
                    <!--    <a class="btn btn-primary my-btn" href="#" role="button">Load More</a>-->
                    <!--</div>-->
                </div>
            </div>
        </div>
    </section>
    
    <!-- Contact Separator Start -->
    <?php include('contactdiv.php') ?>

    <!-- Footer Start -->
    <?php include('footer.php') ?>
    <?php include('form_backend.php') ?>

    <!-- script -->
    <?php include('script.php') ?>

    <!-- jQuery -->
    <script src="js/jquery.min.js"></script>

    <!-- popper.min -->
    <script src="js/popper.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

        <!-- All Included JavaScript -->
    <script src="js/stellarnav.min.js"></script>
    <script src="js/jarallax.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/froogaloop2.min.js"></script>
    <script src="js/html5lightbox.js"></script>
    <script src="js/isotope.pkgd.min.js"></script>
    <script src="js/jquery.pogo-slider.js"></script>

    <!-- Custom Js -->
    <script src="js/custom.js"></script>

</body>

</html>