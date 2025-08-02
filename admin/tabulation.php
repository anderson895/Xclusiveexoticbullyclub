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

  <!-- Add Button -->
  <button
    id="addPageantBtn"
    class="mr-4 bg-[#FFD700] text-black font-semibold px-4 py-2 rounded-md hover:bg-yellow-500 transition"
  >
    + Create Category
  </button>
</div>
</div>


<!-- Container where the result will be shown -->
<div id="outputBody" class="mt-6 rounded-lg p-6 text-[#CCCCCC]"></div>


<!-- Modal -->
<div id="addshowModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black/30 backdrop-blur-sm" style="display:none;">
  <div class="bg-[#1A1A1A]/90 backdrop-blur-md rounded-lg shadow-xl w-full max-w-xl mx-auto p-6 text-[#CCCCCC] relative">
    <button id="closeAddPageantModal" class="absolute top-2 right-2 text-white hover:text-red-500 text-xl">&times;</button>

    <div id="modalContent" class="space-y-2">
      <h3 class="text-lg font-bold text-[#FFD700]">Add Category</h3>
      <form id="frmCreatePageant" class="space-y-4">
        <div>
          <label for="name" class="block text-sm font-medium">Category Name</label>
          <input type="text" id="name" name="name" class="w-full px-3 py-2 rounded-md bg-[#0D0D0D] border border-gray-600 focus:outline-none focus:ring-2 focus:ring-[#FFD700]">
        </div>

        <!-- Contestant fields wrapper -->
        <div>
          <label class="block text-sm font-medium">Contestants</label>
          <div id="contestantFields" class="space-y-2">
            <div class="contestant-group flex items-center gap-2">
              <select name="contestants[]" class="select-contestant w-full bg-[#0D0D0D] border border-gray-600 text-sm rounded-md focus:ring-2 focus:ring-[#FFD700] focus:outline-none">
                <option></option>
              </select>
              <input type="number" name="points[]" value="0" min="0" class="points-input w-20 px-2 py-1 rounded-md bg-[#0D0D0D] border border-gray-600 text-sm focus:ring-2 focus:ring-[#FFD700] focus:outline-none" placeholder="Points">
              <button type="button" class="remove-contestant text-red-500 text-lg font-bold">&times;</button>
            </div>
          </div>

          <button type="button" id="addContestantField" class="mt-2 text-sm text-blue-400 hover:underline">+ Add another contestant</button>
          <button type="button" id="selectAllContestants" class="mb-2 text-sm text-green-400 hover:underline">+ Select all available contestants</button>
        </div>

        <div class="text-right">
          <button type="submit" class="bg-[#FFD700] text-black font-semibold px-4 py-2 rounded-md hover:bg-yellow-500">Save</button>
        </div>
      </form>
    </div>
  </div>
</div>


<!-- Select2 CSS -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Select2 JS -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<!-- Custom Styles for Select2 to match Tailwind input -->

<link rel="stylesheet" href="../src/selectto.css">







<!-- Add Contestant Modal -->
<div id="addContestantModal" class="fixed inset-0 z-50  flex items-center justify-center bg-black/30 backdrop-blur-sm" style="display:none;">
  <div class="bg-[#1A1A1A] rounded-lg shadow-lg w-full max-w-md p-6 text-[#CCCCCC] relative">
    <button id="closeAddContestantModal" class="absolute top-2 right-2 text-white hover:text-red-500 text-xl">&times;</button>
    <h2 class="text-lg font-bold text-[#FFD700] mb-4">Add New Contestant</h2>
    <form id="frmNewContestant">
    <input type="text" id="newContestantName" class="w-full px-3 py-2 rounded-md bg-[#0D0D0D] border border-gray-600 focus:outline-none" placeholder="Enter contestant name">
    <div class="text-right mt-4">
      <button id="confirmAddContestant" class="bg-blue-500 hover:bg-blue-600 text-black font-semibold px-4 py-2 rounded">Add</button>
    </div>
    </form>
  </div>
</div>





<?php include "../src/components/admin/footer.php"; ?>










<script src="../static/js/admin/tabulation.js"></script>
