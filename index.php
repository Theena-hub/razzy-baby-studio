<!DOCTYPE html>
<html lang="en">
<!-- Head Start -->
<?php 
    include('head.php');
?>
<style>
    .event-owl-carousel .owl-dots{
        position:absolute;
        left:50%;
        bottom:0;
        transform:translate(-50%,-50%);
    }
    .instaFeed-owl-carousel .owl-dots .owl-dot span, .event-owl-carousel .owl-dots .owl-dot span{
        width: 12px !important;
        height: 12px !important;
        border: none !important;
        background: gray !important;
        box-shadow: none !important;
    }
    .instaFeed-owl-carousel .owl-dots .owl-dot.active span, .instaFeed-owl-carousel .owl-dots .owl-dot:hover span, 
    .event-owl-carousel .owl-dots .owl-dot.active span, .event-owl-carousel .owl-dots .owl-dot:hover span{
        width: 16px !important;
        height: 16px !important;
        background: #00b4d8 !important;
        border-color: none !important;    
    }
</style>
<body>

    <!-- Header Start -->
    <?php include('header.php')?>

    <!-- Main Slider Start -->
    <section class="main-slider-section">
        <div class="pogoSlider" id="pogo-slider">
            <?php
                $query = "SELECT * FROM `tbl_homebanner` WHERE status='1' order by id asc";
                $result = mysqli_query($conn, $query);
                while ($row = mysqli_fetch_array($result)) {
                    $title = $row['title'];
                    $url = $row['redirect'];
                    $redirect = ($url=='#')?'#':"service.php?sid=$url";
                    $img = 'admin/dashboard/uploads/'. $row['image'];
            ?>
                    <div class="pogoSlider-slide" data-transition="fade" data-duration="1000" style="background-image:url(<?= $img ?>);">
                        <!-- Slider Elements -->
                        <div class="silder-elements container text-right">
                            <p class="pogoSlider-slide-element slider-main-title" data-in="slideUp" data-out="slideUp" data-duration="1000" data-delay="500"><?= $title ?></p>
                            <div class="pogoSlider-slide-element" data-in="slideLeft" data-out="slideUp" data-duration="1000" data-delay="500">
                                <a href="<?= $redirect ?>"><button class="my-btn prto">Our Portfolio</button></a>
                            </div>
                        </div>
                    </div>
            <?php
                }
            ?>
        </div>
    </section>

    <!-- About Start -->
    <!--<section class="about-area">-->
    <!--    <div class="container">-->
    <!--        <div class="row">-->
    <!--            <div class="col-lg-9">-->
    <!--                <div class="about-col">-->
    <!--                    <img src="assets/img/img2.jpg" alt="image" class="img-fluid">-->
    <!--                    <div class="about-box">-->
    <!--                        <h5>Take time for yourself</h5>-->
    <!--                        <h2>Hello! I'm Mahfuz Riad Creative Photographer</h2>-->
    <!--                        <p>With our team of Photographers & videographers we strive to capture the true essence of your wedding story and tell it through still images and cinematic films.</p>-->
    <!--                        <a class="btn btn-primary my-btn" href="aboutus.php" role="button">About us</a>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</section>-->

    <!-- Service Start -->
    <section class="service-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="my-title">
                        <h2 class="col-blue">Our Services</h2>
                        <p class="ebg">"Capture the precious moments of your little one's early days with our professional baby photography services. Our experienced photographers specialize in creating timeless portraits that beautifully preserve the innocence and joy of infancy, From adorable newborn poses to playful toddler shots."</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php
                    $query2 = "SELECT * FROM `tbl_service` WHERE status='1' order by id asc";
                    $result2 = mysqli_query($conn, $query2);                
                    while ($row2 = mysqli_fetch_array($result2)) {
                        $pimg = 'admin/dashboard/uploads/'. $row2['image'];
                ?>
                        <div class="col-lg-6">
                            <a href="service.php?sid=<?= $row2['id'] ?>">
                                <div class="service-col">
                                    <img src="<?= $pimg ?>" alt="img">
                                    <h4 class="col-blue"><?= $row2['name'] ?></h4>
                                    <p class="shortText ebg"><?= $row2['description'] ?></p>
                                </div>
                            </a>
                        </div>
                <?php 
                    }
                ?>
            </div>
        </div>
    </section>

    <!-- We are start -->
    <section class="we-are-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="we-are-col">
                        <h2 class="col-blue">Our Creative Baby Photography</h2>
                        <p class="ebg">"Embark on a whimsical journey through the enchanting world of babyhood with our creative baby photography. Our talented team specializes in capturing the extraordinary in the ordinary, transforming everyday moments into magical memories. From dreamy fairy-tale settings to imaginative props and playful poses, we infuse each session with boundless creativity, ensuring that every image is a work of art. Let us weave a tapestry of wonder and delight, preserving the fleeting innocence and boundless joy of your little one in captivating photographs that will be treasured for generations to come."</p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="we-are-img2">
                        <img src="assets/img/home_img.jpg" alt="image" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- project Start -->
    <section class="project-area">
        <div class="container">
            <div class="row">
                <div class="col-xl-6">
                    <div>
                        <h5 class="col-blue">SELECTED PROJECTS</h5>
                        <h2 class="col-blue">Explore Our Photography Work list</h2>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="nav-col">
                        <div class="my-gallery">
                            <div class="gallery-nav">
                                <ul>
                                    <li><a data-filter="*" class="active" onclick="hide9()">All Photos</a></li>
                                    <?php
                                        $query3 = "SELECT tbl_home_images.*, tbl_service.name AS service_name
                                                FROM tbl_home_images
                                                JOIN tbl_service ON tbl_home_images.service_id = tbl_service.id
                                                WHERE tbl_home_images.status = 1 group by service_id asc";
                                        $result3 = mysqli_query($conn, $query3);                                    
                                        while ($row3 = mysqli_fetch_array($result3)) {
                                            $sid = $row3['service_id'];
                                    ?>
                                            <li><a data-filter=".s_<?= $sid ?>" onclick="showservice(<?= $sid ?>)"><?= $row3['service_name'] ?></a></li>
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
                        <div id="myList" class="gallery-container masonry-gallery">
                            <?php
                                $i = 1;
                                $query4 = "SELECT * FROM `tbl_home_images` WHERE status='1'";
                                $result4 = mysqli_query($conn, $query4);
                                while ($row4 = mysqli_fetch_array($result4)) {
                                    $s_id = $row4['service_id'];
                                    $s_img = 'admin/dashboard/uploads/'. $row4['image'];
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
                    <div class="load-more-btn text-center">
                        <a class="btn btn-primary my-btn" href="gallery.php" role="button">Load More</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Pricing Start -->
    <!-- <section class="pricing-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="my-title">
                        <h5 class="col-blue">Pricing Paln</h5>
                        <h2 class="col-blue">Choose your Right Plan</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-6">
                    <div class="pricing-col">
                        <div class="pricing-header">
                            <img src="images/camera-icon.png" alt="">
                            <h6>Normal Plan</h6>
                            <h2>$100</h2>
                        </div>
                        <div class="pricing-content">
                            <ul>
                                <li>Photo clip  - 30</li>
                                <li>Video clip - 5</li>
                                <li>Photo edit -30</li>
                                <li>Frem  - No</li>
                            </ul>
                        </div>
                        <a class="btn btn-primary my-btn" href="service.html" role="button">Hire Now</a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="pricing-col">
                        <div class="pricing-header">
                            <img src="images/camera-icon.png" alt="">
                            <h6>Classic Plan</h6>
                            <h2>$200</h2>
                        </div>
                        <div class="pricing-content">
                            <ul>
                                <li>Photo clip  - 100</li>
                                <li>Video clip - 20</li>
                                <li>Photo edit -100</li>
                                <li>Frem  - 10</li>
                            </ul>
                        </div>
                        <a class="btn btn-primary my-btn" href="service.html" role="button">Hire Now</a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="pricing-col">
                        <div class="pricing-header">
                            <img src="images/camera-icon.png" alt="">
                            <h6>Premium Plan</h6>
                            <h2>$400</h2>
                        </div>
                        <div class="pricing-content">
                            <ul>
                                <li>Photo clip  - 200</li>
                                <li>Video clip - 50</li>
                                <li>Photo edit -200</li>
                                <li>Frem  - 50</li>
                            </ul>
                        </div>
                        <a class="btn btn-primary my-btn" href="service.html" role="button">Hire Now</a>
                    </div>
                </div>
            </div>
        </div>
    </section> -->
    
    <!-- Event Slider Start -->
    <div class='container-fluid' style='height:90vh;padding:80px 0'>
        <div class="my-title">
            <h5 class="col-blue">Activities</h5>
            <h2 class="col-blue">Birthday Party Events</h2>
        </div>
        <div class="owl-carousel owl-theme event-owl-carousel">
            <?php
                $query4 = "SELECT * FROM `tbl_event` where status='1' order by id asc";
                $result4 = mysqli_query($conn, $query4);                
                while ($row4 = mysqli_fetch_array($result4)) {
                    $eimg = 'admin/dashboard/uploads/'. $row4['image'];

                ?>

                    <div class="item" style="background-image:url(<?= $eimg ?>);height:97vh;background-size: cover;background-repeat: no-repeat;background-position: center;"></div>
            <?php
                }
            ?>          
        </div>
    </div>

    <!-- Testimonial Start -->
    <section class="testimonial-area background-image" data-src="images/bg/testimonial.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="my-title text-center">
                        <!--<h6 class="col-blue">Client Says</h6>-->
                        <h2 class="col-blue">Explore Our client Review</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-9">
                    <div class="testimonial-col">
                        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                          <ol class="carousel-indicators" style="margin:0">
                            <?php
                                $query5 = "SELECT * FROM `tbl_testimonial` where status='1'";
                                $result5 = mysqli_query($conn, $query5);
                                $sl_no = 0;              
                                while ($row5 = mysqli_fetch_array($result5)) {
                                    $tes_img = 'admin/dashboard/uploads/'. $row5['image'];
                                ?>

                                    <li style="background: url('<?= $tes_img ?>') no-repeat center / cover" data-target="#carouselExampleIndicators" data-slide-to="<?= $sl_no ?>"><p><?= $row5['name'] ?></p></li>
                            <?php
                                $sl_no++;
                                }
                            ?>          

                          </ol>
                          <div class="carousel-inner">
                            <?php
                                    $query6 = "SELECT * FROM `tbl_testimonial` where status='1'";
                                    $result6 = mysqli_query($conn, $query6);
                                    while ($row6 = mysqli_fetch_array($result6)) {
                                    ?>
                                        <div class="carousel-item">
                                            <p class="ebg">“ <?= $row6["review"]?> ”</p>
                                        </div>
                                <?php
                                    }
                                ?>          
                          </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Insta feed start -->
    <div class='container-fluid' style='padding-top:80px;padding-bottom:120px'>
        <div class="my-title">
            <h2 class="col-blue">Instagram Feed</h2>
        </div>
        <div class='container'>
            <div class='row'>
                <div class="owl-carousel owl-theme instaFeed-owl-carousel">
                    <?php
                        $query6 = "SELECT * FROM `tbl_instagram` where status='1'";
                        $result6 = mysqli_query($conn, $query6);
                        while ($row6 = mysqli_fetch_array($result6)) {
                            $ins_img = 'admin/dashboard/uploads/'. $row6['image'];
                        ?>
                            <div class="item">
                                <a href='<?= $row6['link'] ?>' target='_blank'>
                                    <img style="border-radius:15px" src='<?= $ins_img ?>' alt='image'/>
                                </a>
                            </div>
                    <?php
                        }
                    ?> 
                    <!-- <div class="item">
                        <a href='#'>
                            <img src='images/camera-man.png' alt='image'/>
                        </a>
                    </div> -->
                </div>
            </div>
        </div>
    </div>

    <!-- Contact Separator Start -->
    <?php include('contactdiv.php') ?>

    <!-- Footer Start -->
    <?php include('footer.php') ?>

    <!-- Script Start -->
    <?php include('script.php') ?>
    <?php include('form_backend.php') ?>

    <!-- All Included JavaScript -->
    <script src="js/html5lightbox.js"></script>

    <script>
        const hide9 = ()=>{
            $('#myList div:gt(18)').hide();
        }
        const showservice = (serid)=>{
            console.log("s_"+serid);
            $(".s_"+serid).show();
            $(".project-item").show();
            $(".project-overlay").show();
        }
        $(document).ready(function() {
            hide9();
        });
        $('.carousel-indicators li:first-child').addClass('active');
        $('.carousel-inner div:first-child').addClass('active');
        $('.event-owl-carousel').owlCarousel({
            loop: true,
            // margin: 10,
            nav: false,
            dots: true,
            autoplay: true,
            autoplayTimeout: 3000,
            smartSpeed: 1000,
            autoplayHoverPause: false,
            navText: ["<i class=fa-solid fa-angle-left></i>,<i class=fa-solid fa-angle-right></i>"],
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 1
                },
                1000: {
                    items: 1
                }
            }
        });
        $('.instaFeed-owl-carousel').owlCarousel({
            loop: true,
            margin: 20,
            nav: false,
            dots: false,
            autoplay: true,
            autoplayTimeout: 4900,
            autoplaySpeed: 4900,
            autoplayTimeout: 4000,
            smartSpeed: 1500,
            slideTransition: 'linear',
            autoplayHoverPause: false,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 2
                },
                1000: {
                    items: 4
                }
            }
        })
    </script>
</body>

</html>