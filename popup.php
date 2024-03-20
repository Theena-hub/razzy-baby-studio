<?php
    // Fetch service from the database
    $q1 = "SELECT * FROM tbl_service WHERE status = 1";
    $res1 = mysqli_query($conn, $q1);
    $s_data = mysqli_fetch_all($res1, MYSQLI_ASSOC);
?>
 
 <!-- popup section -->
 <section class="popup">
    <div class="popupdiv row">
        <div class="popimg col-md-6">
            <img src="assets/img/pop_img.jpg" alt="img">
        </div>
        <div class="formdiv col-md-6">
            <center><h3>Enquiry Now</h3></center>
            <form id='addFormEnquiry'>
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
                            <?php foreach ($s_data as $data): ?>
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
                        <center><button class="btn btn-light sb-btn" type="submit" name="addData" value="submit">Book Now</button></center>                                                             
                    </div>
                </div>
            </form>
        </div>
        <button class="cl-btn" onclick="closeForm()">&times;</button>
    </div>
</section>

<script>
    const openForm = () =>{
        $(".popup").css('display', 'flex');
    }
    const closeForm = () =>{
        $(".popup").hide();
    }
</script>