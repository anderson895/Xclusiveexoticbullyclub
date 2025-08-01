
  $(document).ready(function () {
    $("#addPageantBtn").click(function (e) { 
        e.preventDefault();
        $("#addshowModal").fadeIn();
    });

     $("#closeAddPageantModal").click(function (e) { 
        e.preventDefault();
        $("#addshowModal").fadeOut();
    });







    
$('#frmCreatePageant').on('submit', function(e) {
          e.preventDefault();
          var name = $('#name').val();
          if (name === null) {
              alertify.error("Please Enter Pageant Name.");
              return; 
          }
         
           
          $('.spinner').show();
          $('#frmCreatePageant').prop('disabled', true);
  
          var formData = new FormData(this);
          formData.append('requestType', 'CreatePageant'); 
  
          // Perform the AJAX request
          $.ajax({
            type: "POST",
            url: "../controller/admin/end-points/controller.php",
            data: formData,
            contentType: false,
            processData: false, 
            dataType: "json", 
            success: function(response) {
                console.log(response);

                if (response.status === 200) {
                    $('.spinner').hide();
                    Swal.fire('Success!', response.message, 'success').then(() => {
                        window.location.href = 'pointchart';

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




   










    $.ajax({
        url: "../controller/admin/end-points/controller.php",
        method: "GET",
        data: { requestType: "fetch_all_pageant" },
        dataType: "json",
        success: function (res) {
            if (res.status === 200) {
            let count = 1; // ✅ Initialize the count

            res.data.forEach(pageant => {
                $('#pageantTableBody').append(`
                <tr class="hover:bg-[#2B2B2B] transition-colors">
                    <td class="p-3 text-center font-mono">${count++}</td>
                    <td class="p-3 text-center font-mono">${pageant.pag_name}</td>
                    <td class="p-3 text-center font-semibold">${pageant.pag_description}</td>
                    <td class="p-3 text-center">
                    <a href="tabulation?pag_id=${pageant.pag_id}" 
                        class="inline-block bg-[#FFD700] hover:bg-yellow-500 text-black px-3 py-1 rounded text-xs font-semibold transition">
                        Tabulation
                    </a>
                    </td>
                </tr>
                `);
            });
            }
        }
        });


  // Search filter
  $('#searchInput').on('input', function () {
    const term = $(this).val().toLowerCase();
    $('#pageantTableBody tr').each(function () {
      $(this).toggle($(this).text().toLowerCase().includes(term));
    });
  });

  });