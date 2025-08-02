<?php


include "../src/components/admin/header.php";
include "../src/components/admin/nav.php";


?>

<!-- Top Bar -->
<div class="flex justify-between items-center bg-[#0D0D0D] p-4 mb-6 rounded-md shadow-lg">
  <h2 class="text-xl font-bold text-[#FFD700] uppercase tracking-wide">Points Chart</h2>
  <div class="w-10 h-10 bg-gray-700 rounded-full flex items-center justify-center text-white font-bold shadow-md">
    <?php echo strtoupper(substr($_SESSION['admin_fullname'], 0, 1)); ?>
  </div>
</div>




<!-- Table Card -->
<div class="bg-[#1A1A1A] rounded-lg shadow-lg p-6 text-[#CCCCCC]">

  <!-- Search Input -->
 <div class="mb-4 flex justify-between items-center">
  <!-- Search Input -->
  <input
    type="text"
    id="searchInput"
    class="w-full max-w-xs px-4 py-2 rounded-md bg-[#0D0D0D] border border-gray-600 text-[#CCCCCC] placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-[#FFD700]"
    placeholder="Search..."
  />

  <!-- Add Button -->
  <button
    id="addPageantBtn"
    class="ml-4 bg-[#FFD700] text-black font-semibold px-4 py-2 rounded-md hover:bg-yellow-500 transition"
  >
    + Create Show
  </button>
</div>


  <!-- Table Container -->
  <div class="overflow-x-auto rounded-md">
    <table class="w-full text-sm text-left text-[#CCCCCC]">
      <thead class="bg-[#0D0D0D] text-[#FFD700] uppercase text-xs">
        <tr>

          <th class="p-3">#</th>
          <th class="p-3 text-center">Show Name</th>
          <th class="p-3 text-center">Description</th>
          
          <th class="p-3 text-center">Action</th>
        </tr>
      </thead>
      <tbody id="pageantTableBody" class="divide-y divide-gray-700">
        <!-- Dynamic Data -->
      </tbody>
    </table>
  </div>
</div>



<!-- Spinner Overlay -->
    <div id="spinner" class="absolute inset-0 flex items-center justify-center z-50" style="display:none; background-color: rgba(255, 255, 255, 0.7);">
        <div class="w-12 h-12 border-4 border-blue-600 border-t-transparent rounded-full animate-spin"></div>
    </div>


<!-- Modal -->
<div id="addshowModal" class="fixed inset-0 z-50  flex items-center justify-center bg-black/30 backdrop-blur-sm" style="display:none;">
  <div class="bg-[#1A1A1A]/90 backdrop-blur-md rounded-lg shadow-xl w-full max-w-xl mx-auto p-6 text-[#CCCCCC] relative">
    <button id="closeAddPageantModal" class="absolute top-2 right-2 text-white hover:text-red-500 text-xl">&times;</button>

    <div id="modalContent" class="space-y-2">
      <h3 class="text-lg font-bold text-[#FFD700]">Add New Entry</h3>
      <form id="frmCreatePageant" class="space-y-4">
        <div>
          <label for="name" class="block text-sm font-medium">Name</label>
          <input type="text" id="name" name="name" required class="w-full px-3 py-2 rounded-md bg-[#0D0D0D] border border-gray-600 focus:outline-none focus:ring-2 focus:ring-[#FFD700]">
        </div>
        <div>
          <label for="description" class="block text-sm font-medium">Description</label>
          <textarea id="description" name="description" required class="w-full px-3 py-2 rounded-md bg-[#0D0D0D] border border-gray-600 focus:outline-none focus:ring-2 focus:ring-[#FFD700]"></textarea>
        </div>
        <div class="text-right">
          <button type="submit" class="bg-[#FFD700] text-black font-semibold px-4 py-2 rounded-md hover:bg-yellow-500">Save</button>
        </div>
      </form>
    </div>
  </div>
</div>







<?php include "../src/components/admin/footer.php"; ?>
<script src="../static/js/admin/pointchart.js"></script>