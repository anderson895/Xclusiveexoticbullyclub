 $(document).ready(function () {
    $("#addGettableBtn").click(function (e) { 
        e.preventDefault();
        $("#addGettableModal").fadeIn();
    });

     $("#closeAddGettableModal").click(function (e) { 
        e.preventDefault();
        $("#addGettableModal").fadeOut();
    });







    

    $('#frmAddGettable').on('submit', function(e) {
        e.preventDefault();

        var gettableName = $('#gettableName').val().trim();
        if (!gettableName) {
            alertify.error("Please enter event name.");
            return;
        }

        var gettableDescription = $('#gettableDescription').val().trim();
        if (!gettableDescription) {
            alertify.error("Please enter event description.");
            return;
        }
        
        var gettableImage = $('#gettableImage').val();
           if (gettableImage === "") {
               alertify.error("Please upload an image.");
               return; 
           }

        var gettableLink = $('#gettableLink').val().trim();
        if (!gettableLink) {
            alertify.error("Please enter Link.");
            return;
        }

        $('.spinner').show();
        $('#frmAddGettable button[type="submit"]').prop('disabled', true);

        var formData = new FormData(this);
        formData.append('requestType', 'AddGettable');

        $.ajax({
            type: "POST",
            url: "../controller/admin/end-points/controller.php",
            data: formData,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function(response) {
            $('.spinner').hide();
            $('#frmAddGettable button[type="submit"]').prop('disabled', false);

            if (response.status === 200) {
                Swal.fire('Success!', response.message, 'success').then(() => {
                window.location.href = 'gettable';
                });
            } else {
                Swal.fire('Error', response.message || 'Something went wrong.', 'error');
            }
            }
        });
        });

















        
});



  // Fetch data
  let currentPage = 1;
  let limit = 10; 

  function loadTable(page = 1) {
    currentPage = page;

    $.ajax({
      url: "../controller/admin/end-points/controller.php",
      method: "GET",
      data: { 
        requestType: "fetch_all_gettable_page_limit",
        page: page,
        limit: limit
      },
      dataType: "json",
      success: function (res) {

         let count = 1;

        $('#outputTableBody').empty();

        if (res.status === 200 && res.data.length > 0) {
          res.data.forEach(gettable => {
            $('#outputTableBody').append(`
              <tr class="hover:bg-[#2B2B2B] transition-colors">
                            <td class="p-3 text-center font-mono">${count++}</td>
                            <td class="p-3 text-center font-mono">${gettable.gt_name}</td>
                            <td class="p-3 text-center font-semibold">
                            ${gettable.gt_description 
                                ? (gettable.gt_description.length > 60 
                                    ? gettable.gt_description.substring(0, 60) + '...' 
                                    : gettable.gt_description)
                                : 'N/A'}
                            </td>

                            <td class="p-3 text-center font-semibold">${gettable.gt_link}</td>

                            <!-- Banner Image Column -->
                           <td class="p-3">
                                <div class="flex justify-center items-center">
                                    ${gettable.gt_image ? 
                                        `<img src="../static/upload/${gettable.gt_image}" alt="Banner" class="w-20 h-12 object-cover rounded" />`
                                        : 
                                        '<span class="text-white-500 p-3 text-center font-semibold">N/A</span>'}
                                </div>
                            </td>


                            <td class="p-3 text-center">
                                <button class="viewDetailsBtn bg-yellow-400 hover:bg-yellow-500 text-black px-3 py-1 rounded text-xs font-semibold transition"
                                data-gt_id='${gettable.gt_id}'
                                data-gt_name='${gettable.gt_name}'
                                data-gt_description='${gettable.gt_description}'
                                data-gt_link='${gettable.gt_link}'
                                
                                >Details</button>
                                <button class="removeBtn bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded text-xs font-semibold transition"
                                data-gt_id='${gettable.gt_id}'
                                data-gt_name='${gettable.gt_name}'>Remove</button>
                            </td>
                            </tr>
            `);
          });

          renderPagination(res.total, limit, currentPage);

        } else {
          $('#outputTableBody').append(`
            <tr>
              <td colspan="11" class="p-4 text-center text-gray-400 italic">No record found</td>
            </tr>
          `);
          $('#pagination').empty();
        }
      }
    });
  }

  function renderPagination(totalRows, limit, currentPage) {
    let totalPages = Math.ceil(totalRows / limit);
    let paginationHTML = '';

    if (totalPages > 1) {
      paginationHTML += `
        <button class="px-3 py-1 bg-gray-700 text-white rounded ${currentPage === 1 ? 'opacity-50 cursor-not-allowed' : ''}" ${currentPage === 1 ? 'disabled' : ''} data-page="${currentPage - 1}">Prev</button>
      `;

      for (let i = 1; i <= totalPages; i++) {
        paginationHTML += `
          <button class="px-3 py-1 mx-1 rounded ${i === currentPage ? 'bg-yellow-400 text-black' : 'bg-gray-700 text-white'}" data-page="${i}">${i}</button>
        `;
      }

      paginationHTML += `
        <button class="px-3 py-1 bg-gray-700 text-white rounded ${currentPage === totalPages ? 'opacity-50 cursor-not-allowed' : ''}" ${currentPage === totalPages ? 'disabled' : ''} data-page="${currentPage + 1}">Next</button>
      `;
    }

    $('#pagination').html(paginationHTML);
  }

  $(document).on('click', '#pagination button', function () {
    let page = $(this).data('page');
    if (page) loadTable(page);
  });

  // Initial load
  loadTable();



  // Search filter
  $('#searchInput').on('input', function () {
    const term = $(this).val().toLowerCase();
    $('#outputTableBody tr').each(function () {
      $(this).toggle($(this).text().toLowerCase().includes(term));
    });
  });








  

$(document).on("click", ".viewDetailsBtn", function () {
  const gt_id = $(this).data("gt_id");
  const gt_name = $(this).data("gt_name");
  const gt_description = $(this).data("gt_description");
  const gt_link = $(this).data("gt_link");


  $("#gt_id").val(gt_id);
  $("#gt_name_update").val(gt_name);
  $("#gt_description_update").val(gt_description);
  $("#gt_link_update").val(gt_link);


 $('#eventDetailsModal').fadeIn();

});

// Close modal
$(document).on("click", "#closeEventDetailsModal", function () {
  $('#eventDetailsModal').fadeOut();
});








// ALL REQUEST
    $(document).on('click', '.removeBtn', function(e) {
        e.preventDefault();
        var gt_id = $(this).data('gt_id');
        var gt_name = $(this).data('gt_name');
        console.log(gt_id);
    
        Swal.fire({
            title: `Are you sure to Remove <span style="color:red;">${gt_name}</span> ?`,
            text: 'You won\'t be able to revert this!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, remove it!',
            cancelButtonText: 'No, cancel!',
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "../controller/admin/end-points/controller.php",
                    type: 'POST',
                    data: { gt_id: gt_id, requestType: 'removeGettable' },
                    dataType: 'json', 
                    success: function(response) {
                      console.log(response);
                        if (response.status === 200) {
                            Swal.fire(
                                'Removed!',
                                response.message, 
                                'success'
                            ).then(() => {
                                location.reload(); 
                            });
                        } else {
                            Swal.fire(
                                'Error!',
                                response.message, 
                                'error'
                            );
                        }
                    },
                    error: function() {
                        Swal.fire(
                            'Error!',
                            'There was a problem with the request.',
                            'error'
                        );
                    }
                });
            }
        });
    });







$(document).on("submit", "#frmUpdateGettable", function (e) {
  e.preventDefault();

  const form = this;
  const formData = new FormData(form);
  formData.append("requestType", "UpdateGettable");

  $.ajax({
    url: "../controller/admin/end-points/controller.php",
    method: "POST",
    data: formData,
    processData: false,
    contentType: false,
    dataType: "json",
    success: function (response) {
      if (response.status === 200) {
        Swal.fire('Success!', response.message || 'Event info updated.', 'success').then(() => {
            location.reload();
        });
      } else {
        alertify.error(response.message || "Error updating dog info.");
      }
    },
    error: function (xhr, status, error) {
      console.error("Update error:", error);
      alertify.error("Failed to update dog info. Please try again.");
    }
  });
});
