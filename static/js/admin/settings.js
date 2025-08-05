
$('#frmUpdateSettings').on('submit', function(e) {
    e.preventDefault();

    var fullname = $('#fullname').val().trim();
    var email = $('#email').val().trim();
    var newpassword = $('#newpassword').val();
    var confirmpassword = $('#confirmpassword').val();

    // Validate required fields
    if (fullname === '') {
        alertify.error('Fullname is required');
        return;
    }

    if (email === '') {
        alertify.error('Email is required');
        return;
    }

    // Optional: Validate email format
    var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailPattern.test(email)) {
        alertify.error('Invalid email format');
        return;
    }

    // If new password is filled, validate confirmation
    if (newpassword !== '' && confirmpassword !== newpassword) {
        alertify.error('Confirm Password does not match');
        return;
    }

    var formData = new FormData(this);
    formData.append('requestType', 'UpdateSettings');

    $.ajax({
        type: "POST",
        url: "../controller/admin/end-points/controller.php",
        data: formData,
        dataType: 'json',
        processData: false,
        contentType: false,
       success: function(response) {
            console.log(response);

            if (response.status === 200) {
                $('.spinner').hide();
                Swal.fire('Success!', response.message, 'success').then(() => {
                    window.location.href = 'settings';
                });
            } else if (response.status === 204) {
                $('.spinner').hide();
                Swal.fire('No Changes', response.message, 'info');
            } else {
                $('.spinner').hide();
                Swal.fire('Error', response.message || 'Something went wrong.', 'error');
            }
        }

    });
});
