//  // Sample dataset with images STATIC version
//   const registryData = [
//     {
//       name: "Thor",
//       chip: "123456",
//       breed: "American Bully",
//       owner: "Mark Reyes",
//       image: "static/assets/bullies/exotic_bullies.webp"
//     },
//     {
//       name: "Luna",
//       chip: "654321",
//       breed: "Pocket Bully",
//       owner: "Anna Santos",
//       image: "static/assets/bullies/x_bullies.webp"
//     },
//     {
//       name: "Thor",
//       chip: "789012",
//       breed: "Exotic Bully",
//       owner: "Carlos Dela Cruz",
//       image: "static/assets/bullies/french.webp"
//     },
//     {
//       name: "Max",
//       chip: "987654",
//       breed: "Classic Bully",
//       owner: "John Cruz",
//       image: "static/assets/bullies/shorty.webp"
//     }
//   ];

//   $('#searchForm').on('submit', function(e) {
//     e.preventDefault();
//     const query = $('#searchInput').val().trim().toLowerCase();
//     const results = registryData.filter(entry =>
//       entry.name.toLowerCase() === query || entry.chip === query
//     );

//     const $output = $('#searchResult');
//     $output.empty();

//     if (results.length > 0) {
//      results.forEach((result, index) => {
//         $output.append(`
//             <div class="flex flex-col sm:flex-row bg-white/5 hover:bg-white/10 hover:scale-[1.02] transition-all duration-300 ease-in-out text-white rounded-lg overflow-hidden shadow-lg border border-white/10">
//             <img src="${result.image}" alt="${result.name}" class="w-full sm:w-40 h-60 sm:h-40 object-cover flex-shrink-0">
//             <div class="p-4">
//                 <h3 class="text-xl font-semibold text-yellow-300 mb-2">${result.name}</h3>
//                 <p><strong>XEBC No #:</strong> ${result.chip}</p>
//                 <p><strong>Breed:</strong> ${result.breed}</p>
//                 <p><strong>Owner:</strong> ${result.owner}</p>
//             </div>
//             </div>
//         `);
//         });



//       $output.removeClass('hidden');
//     } else {
//       $output.html(`
//         <div class="col-span-full text-center text-red-400">
//           <h3 class="text-xl font-bold">No result found</h3>
//           <p>Try checking the name or chip number again.</p>
//         </div>
//       `).removeClass('hidden');
//     }
//   });


let registryData = [];

// Fetch all registered dogs from the server when the page loads
$(document).ready(function () {
  $.ajax({
    url: "controller/admin/end-points/controller.php",
    method: "GET",
    data: { requestType: "fetch_all_registered_dogs" },
    dataType: "json",
    success: function (response) {
      if (response.status === 200) {
        registryData = response.data;
      } else {
        console.error("Error fetching dog data:", response);
      }
    },
    error: function (xhr, status, error) {
      console.error("AJAX error:", error);
    }
  });
});

// Handle search form submit
$('#searchForm').on('submit', function (e) {
  e.preventDefault();
  const query = $('#searchInput').val().trim().toLowerCase();

  const results = registryData.filter(entry =>
    entry.dog_name.toLowerCase() === query || entry.dog_code === query
  );

  const $output = $('#searchResult');
  $output.empty();

  if (results.length > 0) {
    results.forEach((result) => {
      $output.append(`
        <div onclick="window.location.href='generation.php?dog_id=${result.dog_id}'"
          class="cursor-pointer flex flex-col sm:flex-row bg-white/5 hover:bg-white/10 hover:scale-[1.02] transition-all duration-300 ease-in-out text-white rounded-lg overflow-hidden shadow-lg border border-white/10">
          
          <img src="static/upload/${result.dog_image}" alt="${result.dog_name}" class="w-full sm:w-40 h-60 sm:h-40 object-cover flex-shrink-0">
          
          <div class="p-4">
            <h3 class="text-xl font-semibold text-yellow-300 mb-2">${result.dog_name}</h3>
            <p><strong>XEBC No #:</strong> ${result.dog_code}</p>
            <p><strong>Owner:</strong> ${result.dog_owner_name}</p>
            <p><strong>Breeder Name:</strong> ${result.dog_breeder_name}</p>
          </div>
        </div>
      `);

    });

    $output.removeClass('hidden');
  } else {
    $output.html(`
      <div class="col-span-full text-center text-red-400">
        <h3 class="text-xl font-bold">No result found</h3>
        <p>Try checking the name or chip number again.</p>
      </div>
    `).removeClass('hidden');
  }
});
