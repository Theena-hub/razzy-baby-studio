<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
include('admin/dashboard/db.php');
// Fetch service from the database
$query = "SELECT * FROM tbl_service WHERE status = 1";
$result = mysqli_query($conn, $query);
$serviceData = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<!-- Head Start -->
<?php include('head.php') ?>

<body>

    <!-- Header Start -->
    <?php include('header.php') ?>

    <!-- Page Name Start -->
    <section class="page-name-area page-name-two-area background-image overlay-white" data-src="assets/img/Contactus.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-name-col text-center">
                        <!-- <h6>Photography</h6> -->
                        <h2>Contactus</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Separator Start -->
    <section class="contact-separator-area top-space parallax overlay-black background-image"
        data-src="assets/img/Footer.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="contact-info-box">
                        <!--<h2>Contact us</h2>-->
                        <h5>Address</h5>
                        <p><a href="https://maps.app.goo.gl/9gdGtmRBX2Tc9jrQA" target="_blank">Razzy Baby Studio<br />No 121A, 7th Street, Tatabad,<br/>Coimbatore 641012.</a></p>
                        <h5>Email</h5>
                        <p><a href="mailto:razzybabystudio@gmail.com">razzybabystudio@gmail.com</a></p>
                        <h5>Office Number</h5>
                        <p><a href="tel:9626749626">+91 9626 74 9626</a></p>
                        <p><a href="tel:9626519626">+91 9626 51 9626</a></p>
                        <p><a href="tel:04224379626">0422 437 9626</a></p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="contact-separator-col">
                        <form id='addEnquiry'>
                            <div class="row">
                                <div class="col-sm-12">
                                    <input class="form-control" type="text" name="name" id="name" placeholder="Your Name" required>
                                </div>
                                <div class="col-sm-6">
                                    <input class="form-control" type="text" name="mobile" id="mobile" placeholder="Phone Number" required>
                                </div>
                                <div class="col-sm-6">
                                    <select id="serviceId" name="serviceId" class="form-select form-control"
                                        aria-label="Default select example" required>
                                        <option value="" disabled hidden selected>Select Service</option>
                                        <?php foreach ($serviceData as $data): ?>
                                            <option value="<?= $data['id']; ?>">
                                                <?= $data['name']; ?>
                                            </option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                                <div class="col-sm-12">
                                    <textarea class="form-control" placeholder="Your Message" id="message"
                                        name="message"></textarea>
                                </div>
                                <div class="col-sm-12">
                                    <input type="hidden" name="req_type" id="req_type" value="add">
                                    <button class="btn btn-primary my-btn" type="submit" name="addData" value="submit">Book Now</button>                                                                
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!--<div class="col-lg-6">-->
                <!--    <div class="contact-separator-col">-->
                <!--        <h2>Welcome to the home a la carte flat shot - $125</h2>-->
                <!--        <p>We accept a very limited number of weddings each year and the average couple spends about-->
                <!--            $5900 on full wedding day coverage. </p>-->
                <!--        <a class="btn btn-primary my-btn" href="service.html" role="button">Take services</a>-->
                <!--    </div>-->
                <!--</div>-->
            </div>
        </div>
    </section>

    <!-- Footer Start -->    
    <?php include('footer.php')?>

    <!-- Script Start -->
    <?php include('script.php') ?>
    <?php include('form_backend.php') ?>
    <script>
        $(document).ready(function () {
            $('#addEnquiry').submit(function (e) {
                e.preventDefault();
                var formData = $('#addEnquiry').serialize();
                // ajax request
                $.ajax({
                    type: "POST",
                    url: "admin/dashboard/backend/backend-enquiry.php",
                    data: formData,
                    success: function (response) {
                        if(response.trim() === "Your Enquiry Sended Successfully!"){
                            Swal.fire({
                                text: "Your Enquiry Send Successfully!",
                                icon: "success",
                            }).then(()=>{
                                window.location.reload(true);
                            });
                        }else{
                            Swal.fire({
                                title: "Oops...",
                                text: "Your Enquiry Submission Failed!",
                                icon: "error",
                            });
                        }
                    },
                    error: function (error) {
                        console.log(error);
                    }
                });
            });
        });
    </script>
</body>

</html>