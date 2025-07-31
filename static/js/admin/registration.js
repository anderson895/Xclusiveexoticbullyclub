$(document).ready(function () {



$('#frmDogRegister').on('submit', function(e) {
          e.preventDefault();
          var type = $('#type').val();
          if (type === null) {
              alertify.error("Please select a type.");
              return; 
          }
           var dog_image = $('#dog_image').val();
           if (dog_image === "") {
               alertify.error("Please upload an image.");
               return; 
           }
           
          $('.spinner').show();
          $('#frmDogRegister').prop('disabled', true);
  
          var formData = new FormData(this);
          formData.append('requestType', 'DogRegister'); 
  
          // Perform the AJAX request
          $.ajax({
            type: "POST",
            url: "../controller/admin/end-points/controller.php",
            data: formData,
            contentType: false,
            processData: false, 
            dataType: "json", // Important to auto-parse JSON response
            success: function(response) {
                console.log(response);

                if (response.status === 200) {
                    $('.spinner').hide();
                    Swal.fire('Success!', response.message, 'success').then(() => {
                        window.location.href = 'registered';

                    });
                } else {
                    Swal.fire('Error', response.message || 'Something went wrong.', 'error');
                }
            },
            error: function(xhr, status, error) {
                console.error("AJAX Error:", xhr.responseText);
                Swal.fire('Error', 'An unexpected error occurred.', 'error');
            }
        });

      });
});