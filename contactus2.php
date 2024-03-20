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

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/styles.css">
    <!-- owlcarousel -->
</head>

<body>
    <div class="container-fluid bg-primary text-white d-flex justify-content-center align-items-center"
        style="height: 100vh;">
        <div class="container">
            <form action="POST" id='addEnquiry'>
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" placeholder="Enter your name" required>
                </div>
                <div class="form-group">
                    <label for="mobile">Mobile Number</label>
                    <input type="text" name="mobile" id="mobile" placeholder="Enter your mobile number" required>
                </div>
                <div class="form-group">
                    <label for="service">Service</label>
                    <select id="service" name="service" class="form-select" aria-label="Default select example"
                        required>
                        <option value="" disabled selected>Select Service</option>
                        <?php foreach ($serviceData as $data): ?>
                            <option value="<?= $data['id']; ?>">
                                <?= $data['name']; ?>
                            </option>
                        <?php endforeach ?>
                    </select>
                    <input type="hidden" name="serviceId" id="serviceId" value="">
                </div>
                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea class="form-control" id="message" rows="3" name="message"></textarea>
                </div>
                <input type="hidden" name="req_type" id="req_type" value="add">
                <input type="submit" class="btn btn-success mt-3" name="addData" value="submit" />
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        $(document).ready(function () {
            $('#addEnquiry').submit(function (e) {
                e.preventDefault();              

                var formData = $('#addEnquiry').serialize();
                console.log(formData);
                // ajax request
                $.ajax({
                    type: "POST",
                    url: "admin/dashboard/backend/backend-enquiry.php",
                    data: formData,
                    success: function (response) {
                        console.log(response);
                        var data = JSON.parse(response);
                        alert(data.message);
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