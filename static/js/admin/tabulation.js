
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

  // Add new contestant input field in form
  $('#addContestantField').click(function () {
    $('#contestantFields').append(`
      <div class="contestant-group flex items-center gap-2">
        <input type="text" name="contestants[]" class="contestant-input flex-1 px-3 py-2 rounded-md bg-[#0D0D0D] border border-gray-600 focus:outline-none" placeholder="Enter contestant name">
        <button type="button" class="remove-contestant text-red-500 text-lg font-bold">&times;</button>
      </div>
    `);
  });

  // Remove contestant input field in form
  $('#contestantFields').on('click', '.remove-contestant', function () {
    $(this).closest('.contestant-group').remove();
  });

  // Handle form submission
  $('#frmCreatePageant').submit(function (e) {
    e.preventDefault();

    const categoryName = $('#name').val().trim();
    const contestantArray = [];

    $('.contestant-input').each(function () {
      const val = $(this).val().trim();
      if (val) {
        contestantArray.push(val);
      }
    });

    if (contestantArray.length === 0) {
      alert("Please enter at least one contestant.");
      return;
    }

    // Build the grading table
    let resultHTML = `
      <div class="bg-[#1A1A1A] rounded-lg p-4 shadow-md">
        <h2 class="text-xl font-bold text-[#FFD700] mb-4">Category: ${categoryName}</h2>
        <table class="w-full text-left border-collapse border border-[#444]">
          <thead>
            <tr class="bg-[#333] text-[#FFD700]">
              <th class="p-2 border border-[#444]">#</th>
              <th class="p-2 border border-[#444]">Contestant Name</th>
              <th class="p-2 border border-[#444]">Grade Ring 1</th>
              <th class="p-2 border border-[#444]">Grade Ring 2</th>
              <th class="p-2 border border-[#444]">Total</th>
            </tr>
          </thead>
          <tbody>
    `;

    contestantArray.forEach((name, index) => {
      resultHTML += `
        <tr class="hover:bg-[#2a2a2a]">
          <td class="p-2 border border-[#444]">${index + 1}</td>
          <td class="p-2 border border-[#444] contestant-name">${name}</td>
          <td class="p-2 border border-[#444]">
            <input type="number" class="grade-input ring1 w-full px-2 py-1 bg-[#0D0D0D] border border-[#555] rounded text-white" min="0" max="100" placeholder="0-100">
          </td>
          <td class="p-2 border border-[#444]">
            <input type="number" class="grade-input ring2 w-full px-2 py-1 bg-[#0D0D0D] border border-[#555] rounded text-white" min="0" max="100" placeholder="0-100">
          </td>
          <td class="p-2 border border-[#444] total-score text-center text-[#FFD700] font-bold">0</td>
        </tr>
      `;
    });

    resultHTML += `
          </tbody>
        </table>
        <div class="text-right mt-4 space-x-2">
          <button id="addNewContestant" class="bg-blue-500 hover:bg-blue-600 text-black font-semibold px-4 py-2 rounded">+ Add Contestant</button>
          <button id="saveGrades" class="bg-green-500 hover:bg-green-600 text-black font-semibold px-4 py-2 rounded">Save Grades</button>
        </div>
      </div>
    `;

    $('#resultsContainer').html(resultHTML);
    $('#addshowModal').fadeOut();
  });

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