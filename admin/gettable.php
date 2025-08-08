<?php


include "../src/components/admin/header.php";
include "../src/components/admin/nav.php";


?>

<!-- Top Bar -->
<div class="flex justify-between items-center bg-[#0D0D0D] p-4 mb-6 rounded-md shadow-lg">
  <h2 class="text-xl font-bold text-[#FFD700] uppercase tracking-wide">Gettable</h2>
  <div class="w-10 h-10 bg-gray-700 rounded-full flex items-center justify-center text-white font-bold shadow-md">
    <?php echo strtoupper(substr($_SESSION['admin_fullname'], 0, 1)); ?>
  </div>
</div>




<!-- Table Card -->
<div class="bg-[#1A1A1A] rounded-lg shadow-lg p-6 text-[#CCCCCC]">

  <!-- Search Input -->
<div class="mb-4 flex flex-col sm:flex-row sm:justify-between sm:items-center gap-2">
  <!-- Search Input -->
  <input
    type="text"
    id="searchInput"
    class="w-full sm:max-w-xs px-4 py-2 rounded-md bg-[#0D0D0D] border border-gray-600 
           text-[#CCCCCC] placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-[#FFD700]"
    placeholder="Search..."
  />

  <!-- Add Button -->
  <button
    id="addGettableBtn"
    class="w-full sm:w-auto bg-[#FFD700] text-black font-semibold 
           text-sm sm:text-base px-3 py-1.5 sm:px-4 sm:py-2 rounded-md 
           hover:bg-yellow-500 transition"
  >
    + Add Gettable
  </button>
</div>


<!-- Table Container -->
<div class="overflow-x-auto rounded-md">
  <table class="w-full text-sm text-left text-[#CCCCCC]">
    <thead class="bg-[#0D0D0D] text-[#FFD700] uppercase text-xs">
      <tr>
        <th class="p-3">#</th>
        <th class="p-3 text-center">Name</th>
        <th class="p-3 text-center">Description</th>
        <th class="p-3 text-center">Link</th>
        <th class="p-3 text-center">Image</th>
        <th class="p-3 text-center">Action</th>
      </tr>
    </thead>
    <tbody id="outputTableBody" class="divide-y divide-gray-700">
      <!-- Dynamic Data -->
    </tbody>
  </table>
</div>

<!-- Pagination -->
<div id="pagination" class="mt-4 flex justify-center gap-2"></div>



<!-- Spinner Overlay -->
<div id="spinner" class="absolute inset-0 flex items-center justify-center z-50" style="display:none; background-color: rgba(255, 255, 255, 0.7);">
    <div class="w-12 h-12 border-4 border-blue-600 border-t-transparent rounded-full animate-spin"></div>
</div>


<!-- Modal -->

<div id="addGettableModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black/30 backdrop-blur-sm" style="display:none;">
  <div class="bg-[#1A1A1A]/90 backdrop-blur-md rounded-lg shadow-xl w-full max-w-xl mx-auto p-6 text-[#CCCCCC] relative">
    <button id="closeAddGettableModal" class="absolute top-2 right-2 text-white hover:text-red-500 text-xl">&times;</button>

    <div id="modalContent" class="space-y-4">
      <h3 class="text-lg font-bold text-[#FFD700]">ADD GETTABLE</h3>
      <form id="frmAddGettable" class="space-y-4">

        <!-- Event Name -->
        <div>
          <label for="gettableName" class="block text-sm font-medium text-[#FFD700]">Name</label>
          <input type="text" id="gettableName" name="gettableName" class="mt-1 w-full px-3 py-2 bg-[#0D0D0D] border border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-[#FFD700]">
        </div>

        <!-- Description -->
        <div>
          <label for="gettableDescription" class="block text-sm font-medium text-[#FFD700]">Description</label>
          <textarea id="gettableDescription" name="gettableDescription" rows="3" class="mt-1 w-full px-3 py-2 bg-[#0D0D0D] border border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-[#FFD700]"></textarea>
        </div>

        <!-- Upload Banner -->
        <div>
          <label for="gettableImage" class="block text-sm font-medium text-[#FFD700]">Upload Image</label>
          <input type="file" id="gettableImage" name="gettableImage" accept="image/*" class="mt-1 block w-full text-sm text-gray-300 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-[#FFD700] file:text-black hover:file:bg-yellow-400">
        </div>

         <!-- Description -->
        <div>
          <label for="social" class="block text-sm font-medium text-[#FFD700]">Social Link</label>
          <input type="text" id="gettableLink" name="gettableLink" class="mt-1 w-full px-3 py-2 bg-[#0D0D0D] border border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-[#FFD700]">

        </div>

        <!-- Submit Button -->
        <div class="text-right">
          <button type="submit" class="bg-[#FFD700] text-black font-semibold px-4 py-2 rounded hover:bg-yellow-400 transition">Submit</button>
        </div>

      </form>
    </div>
  </div>
</div>








<div id="eventDetailsModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black/30 backdrop-blur-sm" style="display:none;">
  <div class="bg-[#1A1A1A]/90 backdrop-blur-md rounded-lg shadow-xl w-full max-w-xl mx-auto p-6 text-[#CCCCCC] relative">
    <button id="closeEventDetailsModal" class="absolute top-2 right-2 text-white hover:text-red-500 text-xl">&times;</button>

    <div id="modalContent" class="space-y-4">
      <h3 class="text-lg font-bold text-[#FFD700]">EVENT DETAILS</h3>
      <form id="frmUpdateGettable" class="space-y-4">


        <input type="hidden" id="gt_id" name="gt_id">
        <!-- Event Name -->
        <div>
          <label for="gt_name_update" class="block text-sm font-medium text-[#FFD700]">Event Name</label>
          <input type="text" id="gt_name_update" name="gt_name" class="mt-1 w-full px-3 py-2 bg-[#0D0D0D] border border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-[#FFD700]">
        </div>

        <!-- Description -->
        <div>
          <label for="gt_description_update" class="block text-sm font-medium text-[#FFD700]">Description</label>
          <textarea id="gt_description_update" name="gt_description" rows="3" class="mt-1 w-full px-3 py-2 bg-[#0D0D0D] border border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-[#FFD700]"></textarea>
        </div>

        <div>
          <label for="gt_image_update" class="block text-sm font-medium text-[#FFD700]">Upload Banner</label>
          <input type="file" id="gt_image_update" name="gt_image" accept="image/*" class="mt-1 block w-full text-sm text-gray-300 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-[#FFD700] file:text-black hover:file:bg-yellow-400">
        </div>

        <!-- Description -->
        <div>
          <label for="gt_link_update" class="block text-sm font-medium text-[#FFD700]">Social Link</label>
          <input type="text" id="gt_link_update" name="gt_link" class="mt-1 w-full px-3 py-2 bg-[#0D0D0D] border border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-[#FFD700]">
        </div>
        <!-- Submit Button -->
        <div class="text-right">
          <button type="submit" class="bg-[#FFD700] text-black font-semibold px-4 py-2 rounded hover:bg-yellow-400 transition">UPDATE</button>
        </div>

      </form>
    </div>
  </div>
</div>


<?php include "../src/components/admin/footer.php"; ?>
<script src="../static/js/admin/gettable.js"></script>