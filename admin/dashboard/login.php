<!doctype html>
<html lang="en" dir="ltr">

<head>
    <?php 
        include('head.php');
        // include('db.php');
    ?>
</head>

<body class=" " data-bs-spy="scroll" data-bs-target="#elements-section" data-bs-offset="0" tabindex="0">
    <!-- loader Start -->
    <?php include('loader.php') ?>
    <!-- loader END -->

    <div class="wrapper">
        <section class="login-content">
            <div class="row m-0 align-items-center bg-white vh-100">
                <div class="col-md-6">
                    <div class="row justify-content-center">
                        <div class="col-md-10">
                            <div class="card card-transparent shadow-none d-flex justify-content-center mb-0 auth-card">
                                <div class="card-body">
                                    <a href="#"
                                        class="navbar-brand d-flex align-items-center mb-3">
                                        <!--Logo start-->
                                        <!--logo End-->

                                        <!--Logo start-->
                                        <div class="logo-main">
                                            <div class="logo-normal">
                                                <img style='width:100%;height:auto' src="../assets/images/logo.png" alt="logo">
                                            </div>
                                        </div>
                                        <!--logo End-->
                                    </a>
                                    <h2 class="mb-2 text-center col-blue">Sign In</h2>
                                    <p class="text-center">Login to stay connected.</p>
                                    <form id='login_form'>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label for="email" class="form-label">Email</label>
                                                    <input type="email" class="form-control" name="email" id="email" placeholder="Enter Your  email">
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label for="pwd" class="form-label">Password</label>
                                                    <input type="password" class="form-control" name="pwd" id="pwd" placeholder="Enter Your password">
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <input type="checkbox" name="showpass" id="showpass" />
                                                <label for="showpass" class="clo">Show Password</label>
                                            </div>
                                            <!-- <div class="col-lg-12 d-flex justify-content-between">
                                                <a href="forgot_pass.php" class='p-1'>Forgot Password</a>
                                            </div> -->

                                        </div>
                                        <div class="d-flex justify-content-center mt-3">
                                            <input type="hidden" name="req_type" id="req_type" value="Login">
                                            <button type="submit" class="btn bg-color text-white">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 d-md-block d-none bg-primary p-0 mt-n1 vh-100 overflow-hidden">
                    <img src="../assets/images/login_img.jpg" class="img-fluid gradient-main animated-scaleX"
                        alt="images">
                </div>
            </div>
        </section>
    </div>
    <?php include('script.php') ?>
    <script>
        $('#showpass').on('change', () => {
            if ($('#showpass').prop('checked')) {
                $('#pwd').attr('type', 'text');
            } else {
                $('#pwd').attr('type', 'password');
            }
        });
        $('#login_form').submit(function (e) {
            e.preventDefault();
            var frmdata = $('#login_form').serialize();
            $.ajax({
                url: 'backend/backend.php',
                type: 'POST',
                dataType: 'html',
                data: frmdata,
                success: function (a) {
                    if (a == 'Success') {
                        Swal.fire({
                            title: 'SignIn Successfully',
                            icon: 'success',
                            confirmButtonColor: '#3085d6',
                            confirmButtonText: 'Ok'
                        }).then(()=>{
                            window.location.href = 'index.php';
                        })
                    }
                    else {
                        Swal.fire({
                            title: 'Try Again!',
                            text: 'Mail And Password Does Not Match',
                            icon: 'warning',
                            confirmButtonColor: '#3085d6',
                            confirmButtonText: 'Ok'
                        });
                    }
                }
            });
        });
    </script>
</body>

</html>