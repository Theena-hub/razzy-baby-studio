
<header class="header-area sticky">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-2 col-lg-5 col-8">
                <div class="site-logo">
                    <a href="index.php">
                        <img src="assets/img/logo-white.png" style="width:220px;height:70px" alt="logo">
                        <!-- <img src="assets/img/logo-black.png" style="width:220px;height:70px" alt="logo" class="logo-2"> -->
                    </a>
                </div>
            </div>
            <div class="col-xl-7 col-lg-2 col-4">
                <div id="main-nav" class="stellarnav">
                    <ul>
                        <li><a href="index.php" class="col-blue">Home</a></li>
                        <li class="menu-item-has-children"><a class="col-blue">Services</a>
                            <ul style="min-width:300px">
                                <?php
                                    $query = "SELECT * FROM `tbl_service` WHERE status='1' order by id asc";
                                    $result = mysqli_query($conn, $query);                                    
                                    while ($row = mysqli_fetch_array($result)) {
                                        $sid = $row['id'];
                                        $sname = $row['name'];
                                ?>
                                        <li><a href="service.php?sid=<?= $sid; ?>" class="col-blue"><?= $sname; ?></a></li>
                                <?php
                                    }
                                ?>
                            </ul>
                        </li>                               
                        <li><a href="gallery.php" class="col-blue">Gallery</a></li>
                        <li><a href="contact.php" class="col-blue">Contactus</a></li>
                        <li><a href="aboutus.php" class="col-blue">Aboutus</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-xl-3 col-lg-5 col-md-12 dis-none-991">
                <div class="header-social-col">
                    <ul>
                        <li><a href="https://www.instagram.com/razzybabystudio" target="_blank"><i class="fa fa-instagram"></i></a></li>
                        <li><a href="https://www.facebook.com/razzybabystudio" target="_blank"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="https://www.youtube.com/@RazzyBabyStudio" target="_blank"><i class="fa">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" viewBox="0 0 576 512"><path class="path" fill="#ffffff" d="M549.7 124.1c-6.3-23.7-24.8-42.3-48.3-48.6C458.8 64 288 64 288 64S117.2 64 74.6 75.5c-23.5 6.3-42 24.9-48.3 48.6-11.4 42.9-11.4 132.3-11.4 132.3s0 89.4 11.4 132.3c6.3 23.7 24.8 41.5 48.3 47.8C117.2 448 288 448 288 448s170.8 0 213.4-11.5c23.5-6.3 42-24.2 48.3-47.8 11.4-42.9 11.4-132.3 11.4-132.3s0-89.4-11.4-132.3zm-317.5 213.5V175.2l142.7 81.2-142.7 81.2z"/></svg>
                        </i></a></li>
                        <li><a href="https://wa.me/9626749626" target="_blank"><i class="fa fa-whatsapp"></i></a></li>
                    </ul>
                    <div class="header-btn">
                        <a onclick="openForm()">Book Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<?php include('popup.php') ?>