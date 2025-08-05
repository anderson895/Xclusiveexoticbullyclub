$(document).ready(function () {
  // Fetch dog data
 $.ajax({
  url: "../controller/admin/end-points/controller.php",
  method: "GET",
  data: { requestType: "fetch_all_registered_dogs" },
  dataType: "json",
  success: function (res) {
    if (res.status === 200) {
      $('#dogTableBody').empty(); // Optional: clear existing content

      if (res.data.length > 0) {
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
              <td class="p-3">${dog.dog_type_status}</td>
              <td class="p-3">${dog.dog_date_of_birth}</td>
              <td class="p-3 flex items-center space-x-1">
                ${dog.dog_gender === 'male' 
                  ? `<span class="material-icons text-blue-400 text-sm">male</span> Male`
                  : dog.dog_gender === 'female' 
                    ? `<span class="material-icons text-red-400 text-sm">female</span> Female`
                    : 'N/A'}
              </td>
              <td class="p-3 text-center">
                <button class="viewDetailsBtn bg-yellow-400 hover:bg-yellow-500 text-black px-3 py-1 rounded text-xs font-semibold transition"
                  data-dog='${JSON.stringify(dog)}'>Details</button>
                <a href="generation?dog_id=${dog.dog_id}" 
                  class="inline-block bg-yellow-400 hover:bg-gray-400 text-black px-3 py-1 rounded text-xs font-semibold transition">
                  Generation
                </a>
                <button class="removeBtn bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded text-xs font-semibold transition"
                  data-dog='${JSON.stringify(dog)}'
                  data-dog_id='${dog.dog_id}'
                  data-dog_name='${dog.dog_name}'>Remove</button>
              </td>
            </tr>
          `);
        });
      } else {
        $('#dogTableBody').append(`
          <tr>
            <td colspan="11" class="p-4 text-center text-gray-400 italic">No record found</td>
          </tr>
        `);
      }
    }
  }
});


 $(document).on("click", ".viewDetailsBtn", function () {
  const dog = $(this).data("dog");

  $("#modalContent").html(`
   <form id="updateDogForm" enctype="multipart/form-data" class="w-full max-w-4xl mx-auto px-4">
  <input type="hidden" name="dog_id" value="${dog.dog_id ?? ''}">

  <!-- Image Uploads: Vertical on Mobile, Side-by-Side on Small+ -->
  <div class="flex flex-col sm:flex-row gap-6 mb-6">
    <!-- Profile Picture -->
    <div class="flex flex-col items-center text-center w-full sm:w-1/2">
      <div class="text-xs mb-1 text-white">📷 Profile Picture</div>
      <img src="../static/upload/${dog.dog_image ?? 'default-profile.png'}" class="w-24 h-24 rounded-full object-cover border-2 border-yellow-500 shadow" />
      <input type="file" name="dog_image" accept="image/*" class="mt-2 text-sm text-gray-300" />
    </div>

    <!-- Banner Image -->
    <div class="flex flex-col items-center text-center w-full sm:w-1/2">
      <div class="text-xs mb-1 text-white">🖼️ Banner Image</div>
      <img src="../static/upload/${dog.dog_banner ?? 'default-banner.jpg'}" class="w-40 h-24 object-cover rounded border border-gray-600 shadow" />
      <input type="file" name="dog_banner" accept="image/*" class="mt-2 text-sm text-gray-300" />
    </div>
  </div>

  <!-- Form Fields: 2 Columns on md+, 1 Column on Mobile -->
  <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
    <!-- Individual input fields (already responsive with w-full) -->
    <div>
      <label class="block text-sm mb-1 text-white">Name</label>
      <input name="dog_name" value="${dog.dog_name ?? ''}" class="w-full px-3 py-2 rounded bg-[#0D0D0D] border border-gray-600 text-white"/>
    </div>
    <div>
      <label class="block text-sm mb-1 text-white">Owner</label>
      <input name="dog_owner_name" value="${dog.dog_owner_name ?? ''}" class="w-full px-3 py-2 rounded bg-[#0D0D0D] border border-gray-600 text-white"/>
    </div>
    <div>
      <label class="block text-sm mb-1 text-white">Breeder</label>
      <input name="dog_breeder_name" value="${dog.dog_breeder_name ?? ''}" class="w-full px-3 py-2 rounded bg-[#0D0D0D] border border-gray-600 text-white"/>
    </div>
    <div>
      <label class="block text-sm mb-1 text-white">Country</label>
      <input name="dog_country" value="${dog.dog_country ?? ''}" class="w-full px-3 py-2 rounded bg-[#0D0D0D] border border-gray-600 text-white"/>
    </div>
    <div>
      <label class="block text-sm mb-1 text-white">Color</label>
      <input name="dog_color" value="${dog.dog_color ?? ''}" class="w-full px-3 py-2 rounded bg-[#0D0D0D] border border-gray-600 text-white"/>
    </div>
    <div>
      <label class="block text-sm mb-1 text-white">Height</label>
      <input name="dog_height" value="${dog.dog_height ?? ''}" class="w-full px-3 py-2 rounded bg-[#0D0D0D] border border-gray-600 text-white"/>
    </div>
    <div>
      <label class="block text-sm mb-1 text-white">Date of Birth</label>
      <input type="date" name="dog_date_of_birth" value="${dog.dog_date_of_birth ?? ''}" class="w-full px-3 py-2 rounded bg-[#0D0D0D] border border-gray-600 text-white"/>
    </div>
    <div>
      <label class="block text-sm mb-1 text-white">Contact Number</label>
      <input name="dog_contact_number" value="${dog.dog_contact_number ?? ''}" class="w-full px-3 py-2 rounded bg-[#0D0D0D] border border-gray-600 text-white"/>
    </div>
    <div>
      <label class="block text-sm mb-1 text-white">Facebook Name</label>
      <input name="dog_facebook_name" value="${dog.dog_facebook_name ?? ''}" class="w-full px-3 py-2 rounded bg-[#0D0D0D] border border-gray-600 text-white"/>
    </div>
    <div>
      <label class="block text-sm mb-1 text-white">Instagram Name</label>
      <input name="dog_ig_name" value="${dog.dog_ig_name ?? ''}" class="w-full px-3 py-2 rounded bg-[#0D0D0D] border border-gray-600 text-white"/>
    </div>
    <div>
      <label class="block text-sm mb-1 text-white">Facebook Link</label>
      <input name="dog_facebook_link" value="${dog.dog_facebook_link ?? ''}" class="w-full px-3 py-2 rounded bg-[#0D0D0D] border border-gray-600 text-white"/>
    </div>
    <div>
      <label class="block text-sm mb-1 text-white">Instagram Link</label>
      <input name="dog_ig_link" value="${dog.dog_ig_link ?? ''}" class="w-full px-3 py-2 rounded bg-[#0D0D0D] border border-gray-600 text-white"/>
    </div>
    <div>
      <label class="block text-sm mb-1 text-white">Registration Date</label>
      <input name="dog_date_registration" value="${dog.dog_date_registration ?? ''}" class="w-full px-3 py-2 rounded bg-[#0D0D0D] border border-gray-600 text-white"/>
    </div>
    <div>
      <label class="block text-sm mb-1 text-white">Dog Gender</label>
      <select name="dog_gender" class="w-full px-3 py-2 rounded bg-[#0D0D0D] border border-gray-600 text-white">
        <option value="male" ${(dog.dog_gender ?? '') === 'male' ? 'selected' : ''}>Male</option>
        <option value="female" ${(dog.dog_gender ?? '') === 'female' ? 'selected' : ''}>Female</option>
      </select>
    </div>
    <div>
      <label class="block text-sm mb-1 text-white">Dog Type</label>
      <select name="dog_type_status" class="w-full px-3 py-2 rounded bg-[#0D0D0D] border border-gray-600 text-white">
        <option value="regular" ${(dog.dog_type_status ?? '') === 'regular' ? 'selected' : ''}>Regular</option>
        <option value="exclusive" ${(dog.dog_type_status ?? '') === 'exclusive' ? 'selected' : ''}>Exclusive</option>
      </select>
    </div>
  </div>

  <!-- Submit Button -->
  <div class="mt-6 text-center sm:text-right">
    <button type="submit" class="bg-[#FFD700] text-black px-6 py-2 rounded hover:bg-yellow-500 font-semibold">
      Update
    </button>
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
    dataType: "json",
    success: function (response) {
      if (response.status === 200) {
        Swal.fire('Success!', response.message || 'Dog info updated.', 'success').then(() => {
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








    $(document).on('click', '.removeBtn', function(e) {
        e.preventDefault();
        var dog_id = $(this).data('dog_id');
        var dog_name = $(this).data('dog_name');
        console.log(dog_id);
    
        Swal.fire({
            title: `Are you sure to Remove <span style="color:red;">${dog_name}</span> ?`,
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
                    data: { dog_id: dog_id, requestType: 'removeDog' },
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
