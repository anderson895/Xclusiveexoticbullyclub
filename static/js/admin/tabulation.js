
$(document).ready(function () {
  // Show Add Category Modal
  $("#addPageantBtn").click(function (e) { 
    e.preventDefault();
    $("#addshowModal").fadeIn();
  });

  // Close Add Category Modal
  $("#closeAddPageantModal").click(function (e) { 
    e.preventDefault();
    $("#addshowModal").fadeOut();
  });



  // Handle form submission
  // $('#frmCreatePageant').submit(function (e) {
  //   e.preventDefault();

  //   const categoryName = $('#name').val().trim();
  //   const contestantArray = [];

  //   $('.contestant-input').each(function () {
  //     const val = $(this).val().trim();
  //     if (val) {
  //       contestantArray.push(val);
  //     }
  //   });

  //   if (contestantArray.length === 0) {
  //     alert("Please enter at least one contestant.");
  //     return;
  //   }

  //   // Build the grading table
  //   let resultHTML = `
  //     <div class="bg-[#1A1A1A] rounded-lg p-4 shadow-md">
  //       <h2 class="text-xl font-bold text-[#FFD700] mb-4">Category: ${categoryName}</h2>
  //       <table class="w-full text-left border-collapse border border-[#444]">
  //         <thead>
  //           <tr class="bg-[#333] text-[#FFD700]">
  //             <th class="p-2 border border-[#444]">#</th>
  //             <th class="p-2 border border-[#444]">Contestant Name</th>
  //             <th class="p-2 border border-[#444]">Grade Ring 1</th>
  //             <th class="p-2 border border-[#444]">Grade Ring 2</th>
  //             <th class="p-2 border border-[#444]">Total</th>
  //           </tr>
  //         </thead>
  //         <tbody>
  //   `;

  //   contestantArray.forEach((name, index) => {
  //     resultHTML += `
  //       <tr class="hover:bg-[#2a2a2a]">
  //         <td class="p-2 border border-[#444]">${index + 1}</td>
  //         <td class="p-2 border border-[#444] contestant-name">${name}</td>
  //         <td class="p-2 border border-[#444]">
  //           <input type="number" class="grade-input ring1 w-full px-2 py-1 bg-[#0D0D0D] border border-[#555] rounded text-white" min="0" max="100" placeholder="0-100">
  //         </td>
  //         <td class="p-2 border border-[#444]">
  //           <input type="number" class="grade-input ring2 w-full px-2 py-1 bg-[#0D0D0D] border border-[#555] rounded text-white" min="0" max="100" placeholder="0-100">
  //         </td>
  //         <td class="p-2 border border-[#444] total-score text-center text-[#FFD700] font-bold">0</td>
  //       </tr>
  //     `;
  //   });

  //   resultHTML += `
  //         </tbody>
  //       </table>
  //       <div class="text-right mt-4 space-x-2">
  //         <button id="addNewContestant" class="bg-blue-500 hover:bg-blue-600 text-black font-semibold px-4 py-2 rounded">+ Add Contestant</button>
  //         <button id="saveGrades" class="bg-green-500 hover:bg-green-600 text-black font-semibold px-4 py-2 rounded">Save Grades</button>
  //       </div>
  //     </div>
  //   `;

  //   $('#resultsContainer').html(resultHTML);
  //   $('#addshowModal').fadeOut();
  // });

  // Auto compute total grade
  $('#resultsContainer').on('input', '.ring1, .ring2', function () {
    const row = $(this).closest('tr');
    const ring1 = parseFloat(row.find('.ring1').val()) || 0;
    const ring2 = parseFloat(row.find('.ring2').val()) || 0;
    const total = ring1 + ring2;
    row.find('.total-score').text(total);
  });

  // Open Add Contestant Modal
  $('#resultsContainer').on('click', '#addNewContestant', function () {
    $('#newContestantName').val('');
    $('#addContestantModal').fadeIn();
  });

  // Close Add Contestant Modal
  $('#closeAddContestantModal').click(function () {
    $('#addContestantModal').fadeOut();
  });

  // Confirm Add Contestant to Table
  $('#confirmAddContestant').click(function () {
    const newName = $('#newContestantName').val().trim();
    if (!newName) {
      alert('Please enter a name.');
      return;
    }

    const rowCount = $('#resultsContainer tbody tr').length + 1;

    const newRow = `
      <tr class="hover:bg-[#2a2a2a]">
        <td class="p-2 border border-[#444]">${rowCount}</td>
        <td class="p-2 border border-[#444] contestant-name">${newName}</td>
        <td class="p-2 border border-[#444]">
          <input type="number" class="grade-input ring1 w-full px-2 py-1 bg-[#0D0D0D] border border-[#555] rounded text-white" min="0" max="100" placeholder="0-100">
        </td>
        <td class="p-2 border border-[#444]">
          <input type="number" class="grade-input ring2 w-full px-2 py-1 bg-[#0D0D0D] border border-[#555] rounded text-white" min="0" max="100" placeholder="0-100">
        </td>
        <td class="p-2 border border-[#444] total-score text-center text-[#FFD700] font-bold">0</td>
      </tr>
    `;

    $('#resultsContainer tbody').append(newRow);
    $('#addContestantModal').fadeOut();
  });

  // Save Grades
  $('#resultsContainer').on('click', '#saveGrades', function () {
    const grades = [];

    $('#resultsContainer tbody tr').each(function () {
      const name = $(this).find('.contestant-name').text().trim();
      const ring1 = parseFloat($(this).find('.ring1').val()) || 0;
      const ring2 = parseFloat($(this).find('.ring2').val()) || 0;
      const total = ring1 + ring2;

      grades.push({ name, ring1, ring2, total });
    });

    console.log("Saved Grades:", grades);
    alert("Grades saved! Check console for full data.");
  });
});






  // DYNAMIC PART
// SELECT TO
  function getSelectedContestantIds() {
    const selected = [];
    $('.select-contestant').each(function () {
      const val = $(this).val();
      if (val) selected.push(val);
    });
    return selected;
  }

  function initSelect2() {
    $('.select-contestant').select2({
      placeholder: 'Search for a dog',
      allowClear: true,
      width: '100%',
      minimumInputLength: 1,
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
      },
      dropdownParent: $('#addshowModal')
    });
  }

  $(document).ready(function () {
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

    // FORM SUBMIT
    $('#frmCreatePageant').on('submit', function (e) {
      e.preventDefault();

      const queryString = window.location.search;
      const urlParams = new URLSearchParams(queryString);
      const pagId = urlParams.get('pag_id');

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
        },
        error: function (xhr, status, error) {
          $('.spinner').hide();
          console.error("AJAX Error:", xhr.responseText);
          Swal.fire('Error', 'An unexpected error occurred.', 'error');
        }
      });
    });
  });