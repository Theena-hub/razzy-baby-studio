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
                <div class="col-md-6 d-md-block d-none bg-primary p-0 mt-n1 vh-100 overflow-hidden">
                    <img src="../assets/images/auth/02.png" class="img-fluid gradient-main animated-scaleX"
                        alt="images">
                </div>
                <div class="col-md-6 p-0">
                    <div class="card card-transparent auth-card shadow-none d-flex justify-content-center mb-0">
                        <div class="card-body">
                            <a href="../../dashboard/index.html" class="navbar-brand d-flex align-items-center mb-3">
                                <!--Logo start-->
                                <!--logo End-->

                                <!--Logo start-->
                                <div class="logo-main">
                                    <div class="logo-normal">
                                        <img src="../../assets/img/logo.svg" alt="coursenexgen" />
                                    </div>
                                </div>
                                <!--logo End-->
                            </a>
                            <h2 class="mb-2">Reset Password</h2>
                            <p>OTP Will Send To Your Email Id</p>
                            <form id='forgot_pass_form'>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="floating-label form-group">
                                            <label for="otp_mail" class="form-label">Email</label>
                                            <input type="email" class="form-control" name="otp_mail" id="otp_mail"
                                                placeholder="Enter Your  email">
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" name="req_type" id="req_type" value="send_otp">
                                <button type="submit" class="btn btn-primary">Send OTP</button><br>
                                <a href="login.php">Login</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <?php include('script.php') ?>
    <script>
        $('#forgot_pass_form').submit(function(e) { 
            e.preventDefault();
            var frmdata = $('#forgot_pass_form').serialize();
            $.ajax({
                url:'backend.php',
                type:'POST',
                dataType:'html',
                data:frmdata,
                success:function(a){
                    if(a==''){
                        window.location.href='change_password.php';
                    }
                    else{
                        Swal.fire({
                            title: 'Try Again!',
                            text: a,
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