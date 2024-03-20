<!DOCTYPE html>
<html lang="en">
<!-- head start -->
<?php include('head.php') ?>
<body>

    <!-- Header Start -->
    <?php include('header.php')?>

    <!-- Page Name Start -->
    <section class="page-name-area background-image" data-src="assets/img/Aboutus.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-name-col text-center">
                        <!-- <h6 class="col-white">Photography</h6> -->
                        <h2 class="col-white">Aboutus</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- We are start -->
    <section class="we-are-area we-are-two-area we-are-three-area">
        <div class="container">
            <div class="row justify-content-end">
                <div class="col-lg-6">
                    <div class="we-are-img2">
                        <img src="assets\img\about_img.jpeg" alt="image" class="img-fluid">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="we-are-col">
                        <h4 class="col-blue">We Are Razzy</h4>
                        <h2 class="col-blue">I take photographs with creativity, concept</h2>
                        <h4>YOU BRING THE LOVE</h4>
                        <p class="ebg">"Welcome to our baby photography team, where every smile, giggle, and milestone is a moment to treasure. With a passion for capturing the pure essence of infancy, our dedicated team of photographers brings creativity, patience, and expertise to every session. We understand the importance of preserving these fleeting moments, and we are honored to be a part of your family's journey, creating timeless memories that you'll cherish for a lifetime."</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    
    <!-- About Two Start -->
    <!--<section class="about-two-area">-->
    <!--    <div class="container">-->
    <!--        <div class="row">-->
    <!--            <div class="col-lg-7">-->
    <!--                <div class="about-two-col">-->
    <!--                    <img src="images/about/3.jpg" alt="" class="img-fluid">-->
    <!--                </div>-->
    <!--            </div>-->
    <!--            <div class="col-lg-5">-->
    <!--                <div class="about-two-col">-->
    <!--                    <p>Commodo cursus magna, vel scelerisque nisl consectetur et. Aenean lacinia bibendum nulla sed consectetur. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean lacinia bibendum nulla sed consectetur. Curabitur blandit tempus porttitor. Vestibulum id ligula.</p>-->
    <!--                    <div class="subtext">-->
    <!--                        <p>Commodo cursus magna, vel scelerisque nisl  consectetur et. Aenean lacinia bibendum nulla sed consectetur. Lorem ipsum dolor sit amet, Sed posuere consectetur est at lobortis.</p>-->
    <!--                    </div>-->
    <!--                    <p>Commodo cursus magna, vel scelerisque nisl consectetur et. Aenean lacinia bibendum nulla sed consectetur. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean lacinia </p>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</section>-->

    <!-- Team Start -->
    <section class="team-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="my-title">
                        <h6 class="col-blue">Our Experts</h6>
                        <h2 class="col-blue">Explore Our Team</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php
                    $query = "SELECT * FROM `tbl_team` WHERE status='1'";
                    $result = mysqli_query($conn, $query);                
                    while ($row = mysqli_fetch_array($result)) {
                        // $description = $row['description'];
                        $img = 'admin/dashboard/uploads/'. $row['image'];
                ?>
                        <div class="col-lg-3 col-md-6">
                            <div class="team-col">
                                <img src="<?= $img ?>" alt="image">
                                <h4><?= $row['name']; ?></h4>
                                <p><?= $row['designation']; ?></p>
                            </div>
                        </div>
                <?php 
                    }
                ?>
            </div>
        </div>
    </section>
    <section class="we-are-area we-are-two-area we-are-three-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="hightlight-text">
                        <?php
                            $query1 = "SELECT * FROM `tbl_team_description`";
                            $result1 = mysqli_query($conn, $query1);                
                            while ($row1 = mysqli_fetch_array($result1)) {
                        ?>
                                <h4 class="col-blue ebg"><?= $row1['description'] ?></h4>
                        <?php 
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonial Two Start -->
    <!--<section class="testimonial-two-area">-->
    <!--    <div class="container">-->
    <!--        <div class="row">-->
    <!--            <div class="col-lg-12">-->
    <!--                <div class="testimonial-two-col">-->
    <!--                    <div class="testimonial-carousel">-->
    <!--                        <div class="testimonial-item">-->
    <!--                            <p>“ The images you captured were precise, natural and beautiful. We spent so much time with our guests due to the fact that you knew exactly the </p>-->
    <!--                            <div class="testimonial-two-img">-->
    <!--                                <img src="images/testimonial-1.png" alt="">-->
    <!--                                <span>Marri Alen</span>-->
    <!--                            </div>-->
    <!--                            <img class="testimonial-pattrn" src="images/testimonial-bg.png" alt="">-->
    <!--                            <img class="quotation-img" src="images/quotation.png" alt="">-->
    <!--                        </div>-->
    <!--                        <div class="testimonial-item">-->
    <!--                            <p>“ The images you captured were precise, natural and beautiful. We spent so much time with our guests due to the fact that you knew exactly the </p>-->
    <!--                            <div class="testimonial-two-img">-->
    <!--                                <img src="images/testimonial-2.png" alt="">-->
    <!--                                <span>Sharp Mard</span>-->
    <!--                            </div>-->
    <!--                            <img class="testimonial-pattrn" src="images/testimonial-bg.png" alt="">-->
    <!--                            <img class="quotation-img" src="images/quotation.png" alt="">-->
    <!--                        </div>-->
    <!--                        <div class="testimonial-item">-->
    <!--                            <p>“ The images you captured were precise, natural and beautiful. We spent so much time with our guests due to the fact that you knew exactly the </p>-->
    <!--                            <div class="testimonial-two-img">-->
    <!--                                <img src="images/testimonial-1.png" alt="">-->
    <!--                                <span>Marri Alen</span>-->
    <!--                            </div>-->
    <!--                            <img class="testimonial-pattrn" src="images/testimonial-bg.png" alt="">-->
    <!--                            <img class="quotation-img" src="images/quotation.png" alt="">-->
    <!--                        </div>-->
    <!--                        <div class="testimonial-item">-->
    <!--                            <p>“ The images you captured were precise, natural and beautiful. We spent so much time with our guests due to the fact that you knew exactly the </p>-->
    <!--                            <div class="testimonial-two-img">-->
    <!--                                <img src="images/testimonial-2.png" alt="">-->
    <!--                                <span>Sharp Mard</span>-->
    <!--                            </div>-->
    <!--                            <img class="testimonial-pattrn" src="images/testimonial-bg.png" alt="">-->
    <!--                            <img class="quotation-img" src="images/quotation.png" alt="">-->
    <!--                        </div>-->
    <!--                        <div class="testimonial-item">-->
    <!--                            <p>“ The images you captured were precise, natural and beautiful. We spent so much time with our guests due to the fact that you knew exactly the </p>-->
    <!--                            <div class="testimonial-two-img">-->
    <!--                                <img src="images/testimonial-1.png" alt="">-->
    <!--                                <span>Marri Alen</span>-->
    <!--                            </div>-->
    <!--                            <img class="testimonial-pattrn" src="images/testimonial-bg.png" alt="">-->
    <!--                            <img class="quotation-img" src="images/quotation.png" alt="">-->
    <!--                        </div>-->
    <!--                        <div class="testimonial-item">-->
    <!--                            <p>“ The images you captured were precise, natural and beautiful. We spent so much time with our guests due to the fact that you knew exactly the </p>-->
    <!--                            <div class="testimonial-two-img">-->
    <!--                                <img src="images/testimonial-2.png" alt="">-->
    <!--                                <span>Sharp Mard</span>-->
    <!--                            </div>-->
    <!--                            <img class="testimonial-pattrn" src="images/testimonial-bg.png" alt="">-->
    <!--                            <img class="quotation-img" src="images/quotation.png" alt="">-->
    <!--                        </div>-->
    <!--                        <div class="testimonial-item">-->
    <!--                            <p>“ The images you captured were precise, natural and beautiful. We spent so much time with our guests due to the fact that you knew exactly the </p>-->
    <!--                            <div class="testimonial-two-img">-->
    <!--                                <img src="images/testimonial-1.png" alt="">-->
    <!--                                <span>Marri Alen</span>-->
    <!--                            </div>-->
    <!--                            <img class="testimonial-pattrn" src="images/testimonial-bg.png" alt="">-->
    <!--                            <img class="quotation-img" src="images/quotation.png" alt="">-->
    <!--                        </div>-->
    <!--                        <div class="testimonial-item">-->
    <!--                            <p>“ The images you captured were precise, natural and beautiful. We spent so much time with our guests due to the fact that you knew exactly the </p>-->
    <!--                            <div class="testimonial-two-img">-->
    <!--                                <img src="images/testimonial-2.png" alt="">-->
    <!--                                <span>Sharp Mard</span>-->
    <!--                            </div>-->
    <!--                            <img class="testimonial-pattrn" src="images/testimonial-bg.png" alt="">-->
    <!--                            <img class="quotation-img" src="images/quotation.png" alt="">-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</section>-->

    <!-- Works Start -->
    <!--<section class="works-area">-->
    <!--    <div class="container">-->
    <!--        <div class="row justify-content-center">-->
    <!--            <div class="col-lg-6">-->
    <!--                <div class="my-title">-->
    <!--                    <h6>Process</h6>-->
    <!--                    <h2>How it works</h2>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--        <div class="row justify-content-center">-->
    <!--            <div class="col-lg-4 col-md-6">-->
    <!--                <div class="works-col">-->
    <!--                    <h6>Step 1</h6>-->
    <!--                    <div class="my-icon">-->
    <!--                        <img src="images/icon-1.png" alt="">-->
    <!--                    </div>-->
    <!--                    <h5>Select your photo package</h5>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--            <div class="col-lg-4 col-md-6">-->
    <!--                <div class="works-col">-->
    <!--                    <h6>Step 2</h6>-->
    <!--                    <div class="my-icon">-->
    <!--                        <img src="images/icon-2.png" alt="">-->
    <!--                    </div>-->
    <!--                    <h5>Quilt & paperwork</h5>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--            <div class="col-lg-4 col-md-6">-->
    <!--                <div class="works-col">-->
    <!--                    <h6>Step 3</h6>-->
    <!--                    <div class="my-icon">-->
    <!--                        <img src="images/icon-3.png" alt="">-->
    <!--                    </div>-->
    <!--                    <h5>Download your images</h5>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</section>-->

    <!-- Separator Start -->
    <!--<section class="separator-area">-->
    <!--    <div class="container">-->
    <!--        <div class="row">-->
    <!--            <div class="col-lg-12">-->
    <!--                <div class="separator-col">-->
    <!--                    <div class="banner-img">-->
    <!--                        <img src="images/banner.jpg" alt="" class="img-fluid">-->
    <!--                        <div class="banner-box">-->
    <!--                            <h5>Take time for yourself</h5>-->
    <!--                            <h2>Hello! I'm Mafian Cris Creative <br>Photographer</h2>-->
    <!--                            <p>With our team of Photographers & videographers we strive to capture the true essence of your wedding story and tell it through still images and cinematic films.</p>-->
    <!--                            <a class="btn btn-primary my-btn" href="service.html" role="button">About us</a>-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                    <img src="images/pattren.png" alt="" class="left-pattren">-->
    <!--                    <img src="images/pattren.png" alt="" class="right-pattren">-->
    <!--                </div>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--    <div class="camaraman-img">-->
    <!--        <img src="images/camera-man.png" alt="">-->
    <!--    </div>-->
    <!--</section>-->

    <!-- Contact Separator Start -->
    <?php include('contactdiv.php') ?>

    <!-- Footer Start -->
    <?php include('footer.php') ?>

    <!-- Script Start -->
    <?php include('script.php') ?>
    <?php include('form_backend.php') ?>

</body>

</html>