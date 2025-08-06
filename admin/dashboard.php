<?php
include "../src/components/admin/header.php";
include "../src/components/admin/nav.php";
?>

<!-- Top Bar -->
<div class="flex justify-between items-center bg-[#0D0D0D] p-4 mb-6 rounded-md shadow-lg">
    <h2 class="text-xl font-bold text-[#FFD700] uppercase tracking-wide">Dashboard</h2>
    <div class="w-10 h-10 bg-gray-600 rounded-full flex items-center justify-center text-white font-bold shadow-md">
        <?php echo strtoupper(substr($_SESSION['admin_fullname'], 0, 1)); ?>
    </div>
</div>

<!-- Dashboard Summary Cards -->
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-6 gap-6 mb-6">
  <div class="bg-[#1A1A1A] p-4 rounded-lg shadow text-center border border-[#333]">
    <p class="text-[#CCCCCC] text-sm">Total Exclusive</p>
    <h2 class="text-3xl font-bold text-[#FFD700]" id="totalExclusive">0</h2>
  </div>
  <div class="bg-[#1A1A1A] p-4 rounded-lg shadow text-center border border-[#333]">
    <p class="text-[#CCCCCC] text-sm">Total Regular</p>
    <h2 class="text-3xl font-bold text-[#FFD700]" id="totalRegular">0</h2>
  </div>
  <div class="bg-[#1A1A1A] p-4 rounded-lg shadow text-center border border-[#333]">
    <p class="text-[#CCCCCC] text-sm">Total Registered</p>
    <h2 class="text-3xl font-bold text-[#FFD700]" id="totalRegistered">0</h2>
  </div>
  <div class="bg-[#1A1A1A] p-4 rounded-lg shadow text-center border border-[#333]">
    <p class="text-[#CCCCCC] text-sm">Total Not Registered</p>
    <h2 class="text-3xl font-bold text-[#FFD700]" id="totalNotRegistered">0</h2>
  </div>
  <div class="bg-[#1A1A1A] p-4 rounded-lg shadow text-center border border-[#333]">
    <p class="text-[#CCCCCC] text-sm">Total Gettable</p>
    <h2 class="text-3xl font-bold text-[#FFD700]" id="totalGettable">0</h2>
  </div>
  <div class="bg-[#1A1A1A] p-4 rounded-lg shadow text-center border border-[#333]">
    <p class="text-[#CCCCCC] text-sm">Total Events</p>
    <h2 class="text-3xl font-bold text-[#FFD700]" id="totalEvents">0</h2>
  </div>
</div>

<!-- Chart Panel -->
<div class="bg-[#1A1A1A] p-6 rounded-lg shadow border border-[#333]">
  <h3 class="text-xl font-semibold text-white mb-4">📊 Registration Overview</h3>
  <div id="dashboardChart"></div>
</div>



<?php
include "../src/components/admin/footer.php";
?>

<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

<script src="../static/js/admin/dashboard.js"></script>