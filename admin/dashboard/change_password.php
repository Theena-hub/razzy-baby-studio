
<html lang="en" dir="ltr">
<?php 
    include('head.php');
    include('db.php');
?>
<body class=" " data-bs-spy="scroll" data-bs-target="#elements-section" data-bs-offset="0" tabindex="0">
    <?php include('loader.php') ?>
    <div class="wrapper">
        <section class="login-content">
            <div class="row m-0 align-items-center bg-white vh-100">
                <div class="col-md-6 d-md-block d-none bg-primary p-0 mt-n1 vh-100 overflow-hidden">
                    <img src="../assets/images/auth/02.png" class="img-fluid gradient-main animated-scaleX" alt="images">
                </div>
                <div class="col-md-6 p-0">               
                    <div class="card card-transparent auth-card shadow-none d-flex justify-content-center mb-0">
                        <div class="card-body">
                            <a href="#" class="navbar-brand d-flex align-items-center mb-3">
                                <div class="logo-main">
                                    <div class="logo-normal">
                                        <img src="../../assets/img/logo.png" style='width:100%' alt="livin" />
                                    </div>
                                </div>
                            </a>
                            <h2 class="mb-2">Change Password</h2>
                            <form class="form-horizontal" id='change_pass_form'>
                    <div class="form-group row">
                        <label class="control-label col-sm-3 align-self-center mb-0" for="email1">Enter OTP:</label>
                        <div class="col-sm-9">
                        <input type="text" class="form-control" name="received_otp" id="received_otp" placeholder="Enter OTP">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-sm-3 align-self-center mb-0" for="email1">New Password:</label>
                        <div class="col-sm-9">
                        <input type="text" class="form-control" name="password" id="password" placeholder="Enter Your New Password">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-sm-3 align-self-center mb-0" for="email1">Confirm Your New Password:</label>
                        <div class="col-sm-9">
                        <input type="text" class="form-control" name="new_password" id="new_password" placeholder="Confirm Your New Password">
                        </div>
                    </div>
                    <div class="form-group text-center">
                        <input type="hidden" name="req_type" id="req_type" value="set_new_password" >
                        <button type="submit" class="btn btn-primary">Submit</button><br>
                        <a href="login.php" class='p-1'>Exit</a>
                    </div>
                </form>
                        </div>
                    </div>               
                </div>
            </div>
        </section>
    </div>
    <?php include('script.php')?>
     <script>
        $('#change_pass_form').submit(function(e) { 
            e.preventDefault();
            if($('#password').val() != $('#new_password').val()){
                Swal.fire({
                    title: 'Try Again!',
                    text: 'Password And Confirm Password Does Not Match',
                    icon: 'warning',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Ok'
                });
                return false;
            }
            var frmdata = $('#change_pass_form').serialize();
            $.ajax({
                url:'backend.php',
                type:'POST',
                dataType:'html',
                data:frmdata,
                success:function(a){
                    if(a=='Success'){
                        window.location.href='index.php';
                    }
                    else{
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