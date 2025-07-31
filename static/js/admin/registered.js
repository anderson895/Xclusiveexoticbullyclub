$(document).ready(function () {
  // Fetch dog data
  $.ajax({
    url: "../controller/admin/end-points/controller.php",
    method: "GET",
    data: { requestType: "fetch_all_registered_dogs" },
    dataType: "json",
    success: function (res) {
      if (res.status === 200) {
        res.data.forEach(dog => {
          $('#dogTableBody').append(`
            <tr class="hover:bg-[#2B2B2B] transition-colors">
              <td class="p-3 font-mono">${dog.dog_code}</td>
              <td class="p-3">
                <img src="../static/upload/${dog.dog_image}" alt="${dog.dog_name}" class="w-12 h-12 rounded object-cover border border-gray-600">
              </td>
              <td class="p-3 font-semibold">${dog.dog_name}</td>
              <td class="p-3">${dog.dog_owner_name}</td>
              <td class="p-3">${dog.dog_breeder_name}</td>
              <td class="p-3 capitalize">${dog.dog_country}</td>
              <td class="p-3">${dog.dog_color}</td>
              <td class="p-3">${dog.dog_date_of_birth}</td>
              <td class="p-3 text-center">
                <button class="viewBtn bg-[#FFD700] hover:bg-yellow-500 text-black px-3 py-1 rounded text-xs font-semibold transition"
                  data-dog='${JSON.stringify(dog)}'>View</button>
              </td>
            </tr>
          `);
        });
      }
    }
  });

  // Show modal with pre-filled dog data
  $(document).on("click", ".viewBtn", function () {
    const dog = $(this).data("dog");

    $("#modalContent").html(`
      <form id="updateDogForm" enctype="multipart/form-data">
        <input type="hidden" name="dog_id" value="${dog.dog_id}">

        <div class="flex items-center gap-4 mb-4">
          <img src="../static/upload/${dog.dog_image}" class="w-24 h-24 rounded object-cover border border-gray-600" />
          <input type="file" name="dog_image" accept="image/*" class="text-sm text-gray-400" />
        </div>

        <div class="grid grid-cols-2 gap-4">
          <div>
            <label class="block text-sm mb-1">Name</label>
            <input name="dog_name" value="${dog.dog_name}" class="w-full px-3 py-2 rounded bg-[#0D0D0D] border border-gray-600 text-white"/>
          </div>
          <div>
            <label class="block text-sm mb-1">Owner</label>
            <input name="dog_owner_name" value="${dog.dog_owner_name}" class="w-full px-3 py-2 rounded bg-[#0D0D0D] border border-gray-600 text-white"/>
          </div>
          <div>
            <label class="block text-sm mb-1">Breeder</label>
            <input name="dog_breeder_name" value="${dog.dog_breeder_name}" class="w-full px-3 py-2 rounded bg-[#0D0D0D] border border-gray-600 text-white"/>
          </div>
          <div>
            <label class="block text-sm mb-1">Country</label>
            <input name="dog_country" value="${dog.dog_country}" class="w-full px-3 py-2 rounded bg-[#0D0D0D] border border-gray-600 text-white"/>
          </div>
          <div>
            <label class="block text-sm mb-1">Color</label>
            <input name="dog_color" value="${dog.dog_color}" class="w-full px-3 py-2 rounded bg-[#0D0D0D] border border-gray-600 text-white"/>
          </div>
          <div>
            <label class="block text-sm mb-1">Height</label>
            <input name="dog_height" value="${dog.dog_height}" class="w-full px-3 py-2 rounded bg-[#0D0D0D] border border-gray-600 text-white"/>
          </div>
          <div>
            <label class="block text-sm mb-1">Date of Birth</label>
            <input type="date" name="dog_date_of_birth" value="${dog.dog_date_of_birth}" class="w-full px-3 py-2 rounded bg-[#0D0D0D] border border-gray-600 text-white"/>
          </div>
          <div>
            <label class="block text-sm mb-1">Contact Number</label>
            <input name="dog_contact_number" value="${dog.dog_contact_number}" class="w-full px-3 py-2 rounded bg-[#0D0D0D] border border-gray-600 text-white"/>
          </div>
          <div>
            <label class="block text-sm mb-1">Facebook</label>
            <input name="dog_facebook_name" value="${dog.dog_facebook_name}" class="w-full px-3 py-2 rounded bg-[#0D0D0D] border border-gray-600 text-white"/>
          </div>
          <div>
            <label class="block text-sm mb-1">Instagram</label>
            <input name="dog_ig_name" value="${dog.dog_ig_name}" class="w-full px-3 py-2 rounded bg-[#0D0D0D] border border-gray-600 text-white"/>
          </div>
        </div>

        <div class="mt-4 text-right">
          <button type="submit" class="bg-[#FFD700] text-black px-4 py-2 rounded hover:bg-yellow-500 font-semibold">Update</button>
        </div>
      </form>
    `);

    $("#dogModal").removeClass("hidden").addClass("flex");
  });

  // Close modal
  $("#closeModal").click(function () {
    $("#dogModal").addClass("hidden").removeClass("flex");
  });

  // Search filter
  $('#searchInput').on('input', function () {
    const term = $(this).val().toLowerCase();
    $('#dogTableBody tr').each(function () {
      $(this).toggle($(this).text().toLowerCase().includes(term));
    });
  });
});

// Handle update submission
$(document).on("submit", "#updateDogForm", function (e) {
  e.preventDefault();

  const form = this;
  const formData = new FormData(form);
  formData.append("requestType", "update_dog_details");

  $.ajax({
    url: "../controller/admin/end-points/controller.php",
    method: "POST",
    data: formData,
    processData: false,
    contentType: false,
    dataType: "json", // ✅ case-sensitive and must be in quotes
    success: function (response) {
      // Check if status is 200 and message is available
      if (response.status === 200) {
        Swal.fire('Success!', response.message || 'Dog info updated.', 'success').then(() => {
            location.reload();// ✅ Make sure 'registered' is a valid route or add `.php` if needed
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


