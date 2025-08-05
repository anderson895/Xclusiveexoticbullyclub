<?php


include "../src/components/admin/header.php";
include "../src/components/admin/nav.php";


?>

<!-- Top Bar -->
<div class="flex justify-between items-center bg-[#0D0D0D] p-4 mb-6 rounded-md shadow-lg">
  <h2 class="text-xl font-bold text-[#FFD700] uppercase tracking-wide">Registered Dogs</h2>
  <div class="w-10 h-10 bg-gray-700 rounded-full flex items-center justify-center text-white font-bold shadow-md">
    <?php echo strtoupper(substr($_SESSION['admin_fullname'], 0, 1)); ?>
  </div>
</div>

<!-- Table Card -->
<div class="bg-[#1A1A1A] rounded-lg shadow-lg p-6 text-[#CCCCCC]">

  <!-- Search Input -->
  <div class="mb-4">
    <input
      type="text"
      id="searchInput"
      class="w-full max-w-xs px-4 py-2 rounded-md bg-[#0D0D0D] border border-gray-600 text-[#CCCCCC] placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-[#FFD700]"
      placeholder="Search dogs..."
    />
  </div>

  <!-- Table Container -->
  <div class="overflow-x-auto rounded-md">
    <table class="w-full text-sm text-left text-[#CCCCCC]">
      <thead class="bg-[#0D0D0D] text-[#FFD700] uppercase text-xs">
        <tr>
          <th class="p-3">Code</th>
          <th class="p-3">Image</th>
          <th class="p-3">Name</th>
          <th class="p-3">Owner</th>
          <th class="p-3">Breeder</th>
          <th class="p-3">Country</th>
          <th class="p-3">Color</th>
          <th class="p-3">Type</th>
          <th class="p-3">Birthday</th>
          <th class="p-3">Gender</th>
          <th class="p-3 text-center">Action</th>
        </tr>
      </thead>
      <tbody id="dogTableBody" class="divide-y divide-gray-700">
        <!-- Dynamic Data -->
      </tbody>
    </table>
  </div>
</div>





<!-- Modal -->
<div id="dogModal" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/30 backdrop-blur-sm p-4">
  <div class="bg-[#1A1A1A]/90 backdrop-blur-md rounded-lg shadow-xl w-full max-w-xl mx-auto p-6 text-[#CCCCCC] relative max-h-[90vh] overflow-y-auto">
    <button id="closeModal" class="absolute top-2 right-2 text-white hover:text-red-500 text-xl">&times;</button>

    <h2 class="text-2xl font-bold text-[#FFD700] mb-4">Dog Details</h2>
    <div id="modalContent" class="space-y-2">
      <!-- Filled by JS -->
    </div>
  </div>
</div>






<?php include "../src/components/admin/footer.php"; ?>
<script src="../static/js/admin/registered.js"></script>