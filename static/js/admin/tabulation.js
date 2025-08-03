// DYNAMIC PART
  
  $("#addPageantBtn").click(function (e) { 
    e.preventDefault();
    $("#addshowModal").fadeIn();
  });


  $("#closeAddPageantModal").click(function (e) { 
  e.preventDefault();

    // Hide modal
    $("#addshowModal").fadeOut();

    // Remove all contestant groups inside the update modal
    $('#contestant_list').empty();
  });



// SELECT TO
  function getSelectedContestantIds() {
    const selected = [];
    $('.select-contestant').each(function () {
      const val = $(this).val();
      if (val) selected.push(val);
    });
    return selected;
  }

  function initSelect2(modalSelector = null) {
  $('.select-contestant').select2({
    placeholder: 'Search for a dog',
    allowClear: true,
    width: '100%',
    minimumInputLength: 1,
    dropdownParent: modalSelector ? $(modalSelector) : $(document.body),
    ajax: {
      url: "../controller/admin/end-points/controller.php",
      method: "GET",
      data: function (params) {
        return {
          requestType: "fetch_search_registered_dogs",
          search: params.term || ''
        };
      },
      dataType: 'json',
      delay: 250,
      processResults: function (response) {
        const selectedIds = getSelectedContestantIds();
        const availableDogs = response.data.filter(dog =>
          !selectedIds.includes(dog.dog_id.toString())
        );

        return {
          results: availableDogs.map(dog => ({
            id: dog.dog_id,
            text: `${dog.dog_name} (${dog.dog_code})`
          }))
        };
      },
      cache: true
    }
  });
}


  $(document).ready(function () {





  $(document).on('click', '.addNewContestant', function () {
    $('#newContestantName').val('');
    $('#addContestantModal').fadeIn();
  });

  // Close Add Contestant Modal
  $('#closeAddContestantModal').click(function () {
    $('#addContestantModal').fadeOut();
  });






    initSelect2();

    // Add a new contestant field
    $('#addContestantField').on('click', function () {
      const newField = `
        <div class="contestant-group flex items-center gap-2 mt-2">
          <select name="contestants[]" class="select-contestant w-full bg-[#0D0D0D] border border-gray-600 text-sm rounded-md focus:ring-2 focus:ring-[#FFD700] focus:outline-none">
            <option></option>
          </select>
          <input type="number" name="points[]" value="0" min="0" class="points-input w-20 px-2 py-1 rounded-md bg-[#0D0D0D] border border-gray-600 text-sm focus:ring-2 focus:ring-[#FFD700] focus:outline-none" placeholder="Points">
          <button type="button" class="remove-contestant text-red-500 text-lg font-bold">&times;</button>
        </div>
      `;
      $('#contestantFields').append(newField);
      initSelect2();
    });

    // Remove contestant field
    $(document).on('click', '.remove-contestant', function () {
      $(this).closest('.contestant-group').remove();
    });

    // Select all available contestants
    $('#selectAllContestants').on('click', function () {
      $.ajax({
        url: "../controller/admin/end-points/controller.php",
        method: "GET",
        data: { requestType: "fetch_all_registered_dogs" },
        dataType: "json",
        success: function (response) {
          const selectedIds = getSelectedContestantIds();
          const availableDogs = response.data.filter(dog =>
            !selectedIds.includes(dog.dog_id.toString())
          );

          if (availableDogs.length === 0) {
            alert("All contestants are already selected.");
            return;
          }

          availableDogs.forEach(dog => {
            const newField = `
              <div class="contestant-group flex items-center gap-2 mt-2">
                <select name="contestants[]" class="select-contestant w-full bg-[#0D0D0D] border border-gray-600 text-sm rounded-md focus:ring-2 focus:ring-[#FFD700] focus:outline-none">
                  <option value="${dog.dog_id}" selected>${dog.dog_name} (${dog.dog_code})</option>
                </select>
                <input type="number" name="points[]" value="0" min="0" class="points-input w-20 px-2 py-1 rounded-md bg-[#0D0D0D] border border-gray-600 text-sm focus:ring-2 focus:ring-[#FFD700] focus:outline-none" placeholder="Points">
                <button type="button" class="remove-contestant text-red-500 text-lg font-bold">&times;</button>
              </div>
            `;
            $('#contestantFields').append(newField);
          });

          initSelect2();
        },
        error: function () {
          alert("Failed to fetch contestants.");
        }
      });
    });

    // ALL REQUEST 

      const queryString = window.location.search;
      const urlParams = new URLSearchParams(queryString);
      const pagId = urlParams.get('pag_id');


    
    $('#frmCreatePageant').on('submit', function (e) {
      e.preventDefault();
      
      const categoryName = $('#name').val().trim();
      const contestantArray = [];

      $('.contestant-group').each(function () {
        const id = $(this).find('.select-contestant').val();
        const point = parseInt($(this).find('.points-input').val()) || 0;

        if (id) {
          contestantArray.push([id, point]);
        }
      });

      if (categoryName === "") {
        alertify.error("Please enter category name.");
        return;
      }

      if (contestantArray.length === 0) {
        alertify.error("Please select at least one contestant.");
        return;
      }

      $('.spinner').show();

      const formData = new FormData();
      formData.append('requestType', 'AddCategoryShow');
      formData.append('name', categoryName);
      formData.append('pagId', pagId);

      // Include contestants and points
      contestantArray.forEach((item, index) => {
        formData.append(`contestants[${index}][id]`, item[0]);
        formData.append(`contestants[${index}][points]`, item[1]);
      });

      $.ajax({
        type: "POST",
        url: "../controller/admin/end-points/controller.php",
        data: formData,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (response) {
          $('.spinner').hide();

          if (response.status === 200) {
            Swal.fire('Success!', response.message, 'success').then(() => {
              location.reload();
            });
          } else {
            Swal.fire('Error', response.message || 'Something went wrong.', 'error');
          }
        }
      });
    });


$.ajax({
  url: "../controller/admin/end-points/controller.php",
  method: "GET",
  data: { pagId: pagId, requestType: "fetch_pageant_category" },
  dataType: "json",
  success: function (response) {
    if (response.status === 200 && response.data.length > 0) {
      response.data.forEach((categoryData) => {
        const categoryName = categoryData.pc_category_name;
        const contestants = categoryData.contestants;

        let resultHTML = `

        

  <div class="bg-[#1A1A1A] rounded-lg p-4 shadow-md mb-6">
    <h2 class="text-xl font-bold text-[#FFD700] mb-4">Category: ${categoryName}</h2>
    
    <div class="overflow-x-auto">
      <table class="min-w-full text-left border-collapse border border-[#444]">
        <thead>
          <tr class="bg-[#333] text-[#FFD700]">
            <th class="p-2 border border-[#444]">#</th>
            <th class="p-2 border border-[#444]">Dog Name</th>
            <th class="p-2 border border-[#444]">Points</th>
            <th class="p-2 border border-[#444]">XEBC No</th>
            <th class="p-2 border border-[#444]">Country</th>
          </tr>
        </thead>
        <tbody>
`;

contestants.forEach((dog, index) => {
  resultHTML += `
    <tr class="hover:bg-[#2a2a2a]">
      <td class="p-2 border border-[#444]">${index + 1}</td>
      <td class="p-2 border border-[#444] contestant-name">${dog.dog_name}</td>
      <td class="p-2 border border-[#444] text-[#FFD700] font-bold ">${dog.points}</td>
      <td class="p-2 border border-[#444] text-[#FFD700] font-bold ">${dog.dog_code}</td>
      <td class="p-2 border border-[#444] text-[#FFD700] font-bold ">${dog.dog_country}</td>
    </tr>
  `;
});

resultHTML += `
        </tbody>
      </table>
    </div>

    <div class="flex flex-col sm:flex-row justify-end gap-2 mt-4">
      <button 
        class="updateContestant bg-green-500 hover:bg-green-600 text-black font-semibold px-4 py-2 rounded w-full sm:w-auto" 
        data-pc_id="${categoryData.pc_id}">
        Update Grades
      </button>
      <button 
        class="removeShow bg-red-500 hover:bg-red-600 text-white font-semibold px-4 py-2 rounded w-full sm:w-auto" 
        data-pc_id="${categoryData.pc_id}" data-category_name="${categoryName}">
        Remove Show
      </button>
    </div>
  </div>
`;


        $('#outputBody').append(resultHTML);
      });
    } else {
      $('#outputBody').html('<p class="text-gray-500 text-center">No data found.</p>');
    }
  },
  error: function (xhr, status, error) {
    console.error("AJAX Error:", status, error);
    $('#outputBody').html('<p class="text-red-500">Failed to load data.</p>');
  }
});


});






// FOR UPDATE CONTESTANT



$(document).on('click', '.updateContestant', function () {
  const pc_id = $(this).data('pc_id');

  // Clear any old contestant fields
  $('#contestant_list').empty();
  $('#updateContestantModal').fadeIn();

  $.ajax({
    url: "../controller/admin/end-points/controller.php",
    method: "GET",
    data: {
      requestType: "fetch_category_contestants",
      pc_id: pc_id
    },
    dataType: "json",
    success: function (response) {
      if (response.status === 200 && response.data.length > 0) {
        const contestants = response.data[0].contestants;

        contestants.forEach((dog) => {
          const field = `
            <div class="contestant-group flex items-center gap-2 mt-2">
              <select name="contestants[]" class="select-contestant w-full bg-[#0D0D0D] border border-gray-600 text-sm rounded-md focus:ring-2 focus:ring-[#FFD700] focus:outline-none">
                <option value="${dog.dog_id}" selected>${dog.dog_name} (${dog.dog_code})</option>
              </select>
              <input type="number" name="points[]" value="${dog.points}" min="0"
                class="text-white points-input w-20 px-2 py-1 rounded-md bg-[#0D0D0D] border border-gray-600 text-sm focus:ring-2 focus:ring-[#FFD700] focus:outline-none" placeholder="Points">
              <button type="button" class="remove-contestant text-red-500 text-lg font-bold">&times;</button>
            </div>
          `;
          $('#contestant_list').append(field);
        });

        // Set hidden input
        $('#update_pc_id').val(pc_id);

        // Initialize Select2
        initSelect2();
      } else {
        alert("No contestants found.");
      }
    },
    error: function () {
      alert("Failed to fetch contestants.");
    }
  });
});




$('#closeUpdateContestantModal').click(function () {
  $('#updateContestantModal').fadeOut();

  // Remove all contestant groups inside the update modal
  $('#contestant_list').empty();
});







// Add new contestant field in Update Modal
$('#addUpdateContestantField').on('click', function () {
  const newField = `
    <div class="contestant-group flex items-center gap-2 mt-2">
      <select name="contestants[]" class="select-contestant w-full bg-[#0D0D0D] border border-gray-600 text-sm rounded-md focus:ring-2 focus:ring-[#FFD700] focus:outline-none">
        <option></option>
      </select>
      <input type="number" name="points[]" value="0" min="0" class="text-white points-input w-20 px-2 py-1 rounded-md bg-[#0D0D0D] border border-gray-600 text-sm focus:ring-2 focus:ring-[#FFD700] focus:outline-none" placeholder="Points">
      <button type="button" class="remove-contestant text-red-500 text-lg font-bold">&times;</button>
    </div>
  `;
  $('#contestant_list').append(newField);
  initSelect2();
});

// Select all available contestants in Update Modal
$('#selectAllUpdateContestants').on('click', function () {
  $.ajax({
    url: "../controller/admin/end-points/controller.php",
    method: "GET",
    data: { requestType: "fetch_all_registered_dogs" },
    dataType: "json",
    success: function (response) {
      const selectedIds = getSelectedContestantIds();
      const availableDogs = response.data.filter(dog =>
        !selectedIds.includes(dog.dog_id.toString())
      );

      if (availableDogs.length === 0) {
        alert("All contestants are already selected.");
        return;
      }

      availableDogs.forEach(dog => {
        const newField = `
          <div class="contestant-group flex items-center gap-2 mt-2">
            <select name="contestants[]" class="select-contestant w-full bg-[#0D0D0D] border border-gray-600 text-sm rounded-md focus:ring-2 focus:ring-[#FFD700] focus:outline-none">
              <option value="${dog.dog_id}" selected>${dog.dog_name} (${dog.dog_code})</option>
            </select>
            <input type="number" name="points[]" value="0" min="0" class="text-white points-input w-20 px-2 py-1 rounded-md bg-[#0D0D0D] border border-gray-600 text-sm focus:ring-2 focus:ring-[#FFD700] focus:outline-none" placeholder="Points">
            <button type="button" class="remove-contestant text-red-500 text-lg font-bold">&times;</button>
          </div>
        `;
        $('#contestant_list').append(newField);
      });

      initSelect2();
    },
    error: function () {
      alert("Failed to fetch contestants.");
    }
  });
});





$('#frmUpdateContestants').on('submit', function (e) {
  e.preventDefault();

  const pc_id = $('#update_pc_id').val();
  const contestantArray = [];

  $('.contestant-group').each(function () {
    const id = $(this).find('.select-contestant').val();
    const point = parseInt($(this).find('.points-input').val()) || 0;

    if (id) {
      contestantArray.push([id, point]);
    }
  });

  if (contestantArray.length === 0) {
    alertify.error("Please select at least one contestant.");
    return;
  }

  const formData = new FormData();
  formData.append('requestType', 'UpdateCategoryContestants');
  formData.append('pc_id', pc_id);

  contestantArray.forEach((item, index) => {
    formData.append(`contestants[${index}][id]`, item[0]);
    formData.append(`contestants[${index}][points]`, item[1]);
  });

  $('.spinner').show();

  $.ajax({
    type: "POST",
    url: "../controller/admin/end-points/controller.php",
    data: formData,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function (response) {
      $('.spinner').hide();

      if (response.status === 200) {
        Swal.fire('Updated!', response.message, 'success').then(() => {
          location.reload();
        });
      } else {
        Swal.fire('Error', response.message || 'Update failed.', 'error');
      }
    }
  });
});












    $(document).on('click', '.removeShow', function(e) {
        e.preventDefault();
        var pc_id = $(this).data('pc_id');
        var category_name = $(this).data('category_name');
        console.log(pc_id);
    
        Swal.fire({
            title: `Are you sure to Remove <span style="color:red;">${category_name}</span> ?`,
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
                    data: { pc_id: pc_id, requestType: 'removeShow' },
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



