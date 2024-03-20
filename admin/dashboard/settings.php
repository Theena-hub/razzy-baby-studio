<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
include('db.php');
// Fetch categories from the database
$query = "SELECT * FROM tbl_team WHERE status = 1";
$result = mysqli_query($conn, $query);
$teamData = mysqli_fetch_all($result, MYSQLI_ASSOC);
// team description 
$sql = "SELECT * FROM tbl_team_description WHERE id=1 ";
$res = $conn->query($sql);
$row = mysqli_fetch_array($res);
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<?php include('head.php') ?>

<body class="  ">
    <!-- loader Start -->
    <?php include('loader.php') ?>
    <!-- loader End -->
    <!-- sidenav Start -->
    <?php include('sidenav.php') ?>
    <!-- sidenav End -->
    <main class="main-content">
        <div class="position-relative iq-banner">
            <!--Nav Start-->
            <?php include('topnav.php') ?>
            <!-- Nav Header Component Start -->
            <div class="iq-navbar-header" style="height: 215px;">
                <div class="container-fluid iq-container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="flex-wrap d-flex justify-content-between align-items-center">
                                <form class="form-horizontal" id='team_description' style="width: fit-content;">
                                    <div class="form-group">
                                        <textarea class="form-control" name="description" id="description"
                                            placeholder="Enter Team Description" cols="80" rows="3"
                                            readonly><?php echo $row['description']; ?></textarea>
                                    </div>
                                    <div class="form-group" id='form_actions'>
                                    </div>
                                </form>
                                <button id="edit_btn" class="btn btn-success" onclick='enable_edit()'>Edit</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="iq-header-img">
                    <img src="../assets/images/dashboard/top-header.png" alt="header"
                        class="theme-color-default-img img-fluid w-100 h-100 animated-scaleX">
                </div>
            </div>
            <!-- Nav Header Component End -->
            <!--Nav End-->
        </div>
        <div class="conatiner-fluid content-inner mt-n5 py-0">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="flex-wrap d-flex justify-content-between align-items-center">
                                <div>
                                    <h3>Team List</h3>
                                </div>
                                <a id="showPopup" class="btn btn-primary btn-link btn-soft-light">
                                    <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M11.8251 15.2171H12.1748C14.0987 15.2171 15.731 13.985 16.3054 12.2764C16.3887 12.0276 16.1979 11.7713 15.9334 11.7713H14.8562C14.5133 11.7713 14.2362 11.4977 14.2362 11.16C14.2362 10.8213 14.5133 10.5467 14.8562 10.5467H15.9005C16.2463 10.5467 16.5263 10.2703 16.5263 9.92875C16.5263 9.58722 16.2463 9.31075 15.9005 9.31075H14.8562C14.5133 9.31075 14.2362 9.03619 14.2362 8.69849C14.2362 8.35984 14.5133 8.08528 14.8562 8.08528H15.9005C16.2463 8.08528 16.5263 7.8088 16.5263 7.46728C16.5263 7.12575 16.2463 6.84928 15.9005 6.84928H14.8562C14.5133 6.84928 14.2362 6.57472 14.2362 6.23606C14.2362 5.89837 14.5133 5.62381 14.8562 5.62381H15.9886C16.2483 5.62381 16.4343 5.3789 16.3645 5.13113C15.8501 3.32401 14.1694 2 12.1748 2H11.8251C9.42172 2 7.47363 3.92287 7.47363 6.29729V10.9198C7.47363 13.2933 9.42172 15.2171 11.8251 15.2171Z"
                                            fill="currentColor"></path>
                                        <path opacity="0.4"
                                            d="M19.5313 9.82568C18.9966 9.82568 18.5626 10.2533 18.5626 10.7823C18.5626 14.3554 15.6186 17.2627 12.0005 17.2627C8.38136 17.2627 5.43743 14.3554 5.43743 10.7823C5.43743 10.2533 5.00345 9.82568 4.46872 9.82568C3.93398 9.82568 3.5 10.2533 3.5 10.7823C3.5 15.0873 6.79945 18.6413 11.0318 19.1186V21.0434C11.0318 21.5715 11.4648 22.0001 12.0005 22.0001C12.5352 22.0001 12.9692 21.5715 12.9692 21.0434V19.1186C17.2006 18.6413 20.5 15.0873 20.5 10.7823C20.5 10.2533 20.066 9.82568 19.5313 9.82568Z"
                                            fill="currentColor"></path>
                                    </svg>
                                    Add Team
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <!-- <?php
                                // $sno = 0;
                                // foreach ($teamData as $data):
                                    // $sno++;
                                    ?>
                                    <div class="col-md-6 col-12">
                                        <div class="card p-3" style="background: #E6F5F6;">
                                            <img class="img-fluid m-auto"
                                                style="width:120px;height: 120px;border-radius:50%"
                                                src="uploads/<?= $data['image']; ?>" alt="banner">
                                            <h5 class="text-center mt-2">
                                                <?= $data['name'] ?>
                                            </h5>
                                            <h6 class="text-center mt-2">
                                                <?= $data['designation'] ?>
                                            </h6>
                                            <a style="position: absolute;right:0;top:0"
                                                class='width-fit-content btn btn-sm btn-icon btn-danger delete-btn'
                                                data-id="<?= $data['id']; ?>" data-bs-toggle='tooltip'
                                                data-bs-placement='top' title='Delete' href='#'>
                                                <span class='btn-inner'>
                                                    <svg class='icon-20' width='20' viewBox='0 0 24 24' fill='none'
                                                        xmlns='http://www.w3.org/2000/svg' stroke='currentColor'>
                                                        <path
                                                            d='M19.3248 9.46826C19.3248 9.46826 18.7818 16.2033 18.4668 19.0403C18.3168 20.3953 17.4798 21.1893 16.1088 21.2143C13.4998 21.2613 10.8878 21.2643 8.27979 21.2093C6.96079 21.1823 6.13779 20.3783 5.99079 19.0473C5.67379 16.1853 5.13379 9.46826 5.13379 9.46826'
                                                            stroke='currentColor' stroke-width='1.5' stroke-linecap='round'
                                                            stroke-linejoin='round'></path>
                                                        <path d='M20.708 6.23975H3.75' stroke='currentColor'
                                                            stroke-width='1.5' stroke-linecap='round'
                                                            stroke-linejoin='round'></path>
                                                        <path
                                                            d='M17.4406 6.23973C16.6556 6.23973 15.9796 5.68473 15.8256 4.91573L15.5826 3.69973C15.4326 3.13873 14.9246 2.75073 14.3456 2.75073H10.1126C9.53358 2.75073 9.02558 3.13873 8.87558 3.69973L8.63258 4.91573C8.47858 5.68473 7.80258 6.23973 7.01758 6.23973'
                                                            stroke='currentColor' stroke-width='1.5' stroke-linecap='round'
                                                            stroke-linejoin='round'></path>
                                                    </svg>
                                                </span>
                                            </a>
                                            <a id="editshowPopup<?php echo $sno; ?>" style="position: absolute;left:0;top:0"
                                                class='width-fit-content btn btn-sm btn-icon btn-warning edit-btn'
                                                data-id="<?= $data['id']; ?>" data-bs-toggle='tooltip'
                                                data-bs-placement='top' title='Edit' href='#'>
                                                <span class='btn-inner'>
                                                    <svg class='icon-20' width='20' viewBox='0 0 24 24' fill='none'
                                                        xmlns='http://www.w3.org/2000/svg'>
                                                        <path
                                                            d='M11.4925 2.78906H7.75349C4.67849 2.78906 2.75049 4.96606 2.75049 8.04806V16.3621C2.75049 19.4441 4.66949 21.6211 7.75349 21.6211H16.5775C19.6625 21.6211 21.5815 19.4441 21.5815 16.3621V12.3341'
                                                            stroke='currentColor' stroke-width='1.5' stroke-linecap='round'
                                                            stroke-linejoin='round'></path>
                                                        <path fill-rule='evenodd' clip-rule='evenodd'
                                                            d='M8.82812 10.921L16.3011 3.44799C17.2321 2.51799 18.7411 2.51799 19.6721 3.44799L20.8891 4.66499C21.8201 5.59599 21.8201 7.10599 20.8891 8.03599L13.3801 15.545C12.9731 15.952 12.4211 16.181 11.8451 16.181H8.09912L8.19312 12.401C8.20712 11.845 8.43412 11.315 8.82812 10.921Z'
                                                            stroke='currentColor' stroke-width='1.5' stroke-linecap='round'
                                                            stroke-linejoin='round'></path>
                                                        <path d='M15.1655 4.60254L19.7315 9.16854' stroke='currentColor'
                                                            stroke-width='1.5' stroke-linecap='round'
                                                            stroke-linejoin='round'></path>
                                                    </svg>
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                <?php //endforeach; ?> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer Section Start -->
        <?php include('footer.php') ?>
        <!-- Footer Section End -->
    </main>
    <!-- Wrapper End-->   
    <!-- Edit - popup start-->
   
    <!-- Edit Banner - popup end-->
    <!-- script - start -->
    <?php include('script.php') ?>
    <!-- script - end -->
    <script>        
        $(document).ready(function () {           
            // fetch - start
            $('.edit-btn').click(function () {
                var id = $(this).data('id');
                console.log(id);
                // fetch category details using ajax call
                $.ajax({
                    type: 'POST',
                    url: 'backend/backend-team.php',
                    data: { req_type: 'fetch', id: id },
                    success: function (response) {
                        var result = JSON.parse(response);
                        var imagePath = result.data.image;

                        // Set the image source in the edit product modal
                        $('#edit_image_preview').attr('src', 'uploads/' + imagePath);
                        $('#edit_image_preview').css('display', 'block');

                        // Display the edit popup
                        $('#editOverlay').fadeIn();
                        $('#editPopup').fadeIn();
                    },
                    error: function (error) {
                        console.log(error);
                    }
                });
            });
            // fetch - end     

            $('#team_description').submit(function (e) {
                e.preventDefault();
                var frmdata = $("#team_description").serialize();
                $.ajax({
                    url: 'backend/backend-team.php',
                    type: 'POST',
                    dataType: 'html',
                    data: frmdata,
                    success: function (a) {
                        if (a == '') {
                            Swal.fire({
                                title: 'Updated!',
                                text: 'Team Description Updated Successfully!',
                                icon: 'success',
                                confirmButtonColor: '#3085d6',
                                confirmButtonText: 'Ok!'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    location.reload();
                                }
                            });
                        }
                    }
                });
            });
        });
        // // Team Description
        // function enable_edit() {
        //     $("#form_actions").append('<input type="hidden" name="req_type" id="req_type" value="description_update" ><input id="submit_btn" type="submit" class="btn btn-primary mx-2" value="Submit">');
        //     $("#card_head").append('<button id="cancel_btn" class="btn btn-warning" onclick="disable_edit()">Cancel</button>');
        //     $('#edit_btn').hide();
        //     $('textarea').attr("readonly", false);
        // }
        // function disable_edit() {
        //     $("#req_type").remove();
        //     $("#submit_btn").remove();
        //     $("#cancel_btn").remove();
        //     $('#edit_btn').show();
        //     $('textarea').attr("readonly", true);
        // }
    </script>
</body>

</html>