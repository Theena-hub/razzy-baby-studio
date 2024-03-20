
<script>
    $(document).ready(function () {
        $('#addFormEnquiry').submit(function (e) {
            e.preventDefault();
            var formData = $('#addFormEnquiry').serialize();
            // ajax request
            $.ajax({
                type: "POST",
                url: "admin/dashboard/backend/backend-enquiry.php",
                data: formData,
                success: function (response) {
                    if(response.trim() === "Your Enquiry Sended Successfully!"){
                        console.log(response);
                        Swal.fire({
                            text: "Your Enquiry Send Successfully!",
                            icon: "success",
                            customClass: "custom-swal-modal"
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