<?php


include "../src/components/admin/header.php";
include "../src/components/admin/nav.php";


?>

<!-- Top Bar -->
<div class="flex justify-between items-center bg-[#0D0D0D] p-4 mb-6 rounded-md shadow-lg">
  <h2 class="text-xl font-bold text-[#FFD700] uppercase tracking-wide">Dogs Generation</h2>
  <div class="w-10 h-10 bg-gray-700 rounded-full flex items-center justify-center text-white font-bold shadow-md">
    <?php echo strtoupper(substr($_SESSION['admin_fullname'], 0, 1)); ?>
  </div>
</div>


<!-- Generation Tree Container -->
<div class="flex flex-col items-center space-y-8 text-[#CCCCCC]">

  <!-- First Generation (Root Dog) -->
  <div class="flex flex-col items-center">
    <span class="material-icons text-[#FFD700] text-3xl mb-1">pets</span>
    <div class="bg-[#1A1A1A] text-sm px-4 py-2 rounded-lg shadow text-center">
      <strong class="text-[#FFD700]">Dog A</strong><br>
      Root Generation
    </div>
  </div>

  <!-- Connecting Line -->
  <div class="w-0.5 bg-[#444] h-6"></div>

  <!-- Second Generation -->
  <div class="flex justify-center space-x-20">
    <!-- Parent 1 -->
    <div class="flex flex-col items-center">
      <span class="material-icons text-[#FFD700] text-2xl mb-1">pets</span>
      <div class="bg-[#1A1A1A] text-sm px-3 py-2 rounded-lg shadow text-center">
        <strong class="text-[#FFD700]">Dog B</strong><br>
        Sire
      </div>
    </div>

    <!-- Parent 2 -->
    <div class="flex flex-col items-center">
      <span class="material-icons text-[#FFD700] text-2xl mb-1">pets</span>
      <div class="bg-[#1A1A1A] text-sm px-3 py-2 rounded-lg shadow text-center">
        <strong class="text-[#FFD700]">Dog C</strong><br>
        Dam
      </div>
    </div>
  </div>

  <!-- Connecting Lines -->
  <div class="flex justify-center items-center space-x-20">
    <div class="w-0.5 bg-[#444] h-6"></div>
    <div class="w-0.5 bg-[#444] h-6"></div>
  </div>

  <!-- Third Generation -->
  <div class="flex justify-center space-x-10 flex-wrap max-w-5xl">

    <!-- Grandparents of Dog B -->
    <div class="flex flex-col items-center">
      <span class="material-icons text-[#FFD700] text-xl mb-1">pets</span>
      <div class="bg-[#1A1A1A] text-xs px-3 py-2 rounded-lg shadow text-center">
        <strong class="text-[#FFD700]">Dog D</strong><br>
        Grandsire
      </div>
    </div>

    <div class="flex flex-col items-center">
      <span class="material-icons text-[#FFD700] text-xl mb-1">pets</span>
      <div class="bg-[#1A1A1A] text-xs px-3 py-2 rounded-lg shadow text-center">
        <strong class="text-[#FFD700]">Dog E</strong><br>
        Granddam
      </div>
    </div>

    <!-- Grandparents of Dog C -->
    <div class="flex flex-col items-center">
      <span class="material-icons text-[#FFD700] text-xl mb-1">pets</span>
      <div class="bg-[#1A1A1A] text-xs px-3 py-2 rounded-lg shadow text-center">
        <strong class="text-[#FFD700]">Dog F</strong><br>
        Grandsire
      </div>
    </div>

    <div class="flex flex-col items-center">
      <span class="material-icons text-[#FFD700] text-xl mb-1">pets</span>
      <div class="bg-[#1A1A1A] text-xs px-3 py-2 rounded-lg shadow text-center">
        <strong class="text-[#FFD700]">Dog G</strong><br>
        Granddam
      </div>
    </div>
  </div>

</div>





<?php include "../src/components/admin/footer.php"; ?>
<script src="../static/js/admin/generation.js"></script>