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


<input type="text" id="dog_id" value="<?=$_GET['dog_id']?>">
<div class="max-w-screen-xl mx-auto space-y-16">

  <!-- Generation 1 Label -->
  <div class="text-center">
    <h2 class="text-2xl font-bold text-gray-800 uppercase">Generation 1</h2>
    <p class="text-sm text-gray-500">Great-Great Grandparents</p>
  </div>

  <!-- Generation 1: 1 Couple -->
  <div class="flex justify-center">
    <div class="flex flex-col items-center">
      <div class="flex space-x-2">
        <img src="dog1.jpg" alt="Dog A" class="w-20 h-20 rounded-full border-4 border-yellow-400" />
        <img src="dog2.jpg" alt="Dog B" class="w-20 h-20 rounded-full border-4 border-yellow-400" />
      </div>
      <p class="text-center mt-2 text-sm">黑社会<br>X<br>红色风暴</p>
    </div>
  </div>

  <!-- Generation 2 Label -->
  <div class="text-center mt-10">
    <h2 class="text-2xl font-bold text-gray-800 uppercase">Generation 2</h2>
    <p class="text-sm text-gray-500">Great Grandparents</p>
  </div>

  <!-- Generation 2: 2 Couples -->
  <div class="flex justify-center space-x-32">
    <!-- Couple 1 -->
    <div class="flex flex-col items-center">
      <div class="flex space-x-2">
        <img src="dog3.jpg" alt="Terror" class="w-20 h-20 rounded-full border-4 border-yellow-400" />
        <img src="dog4.jpg" alt="Dwarf" class="w-20 h-20 rounded-full border-4 border-yellow-400" />
      </div>
      <p class="text-center mt-2 text-sm">恐怖<br>X<br>DWARF</p>
    </div>

    <!-- Couple 2 -->
    <div class="flex flex-col items-center">
      <div class="flex space-x-2">
        <img src="dog5.jpg" alt="Focus" class="w-20 h-20 rounded-full border-4 border-yellow-400" />
        <img src="dog6.jpg" alt="NANA1" class="w-20 h-20 rounded-full border-4 border-yellow-400" />
      </div>
      <p class="text-center mt-2 text-sm">FOCUS<br>X<br>NANA1</p>
    </div>
  </div>

  <!-- Generation 3 Label -->
  <div class="text-center mt-10">
    <h2 class="text-2xl font-bold text-gray-800 uppercase">Generation 3</h2>
    <p class="text-sm text-gray-500">Grandparents</p>
  </div>

  <!-- Generation 3: 4 Couples -->
  <div class="flex justify-center space-x-20">
    <!-- Couple 1 -->
    <div class="flex flex-col items-center">
      <div class="flex space-x-2">
        <img src="dog7.jpg" alt="Problem" class="w-16 h-16 rounded-full border-4 border-yellow-400" />
        <img src="dog8.jpg" alt="Boogie" class="w-16 h-16 rounded-full border-4 border-yellow-400" />
      </div>
      <p class="text-center mt-2 text-xs">PROBLEM<br>X<br>BOOGIE</p>
    </div>

    <!-- Couple 2 -->
    <div class="flex flex-col items-center">
      <div class="flex space-x-2">
        <img src="dog9.jpg" alt="Hazard" class="w-16 h-16 rounded-full border-4 border-yellow-400" />
        <img src="dog10.jpg" alt="ADEA" class="w-16 h-16 rounded-full border-4 border-yellow-400" />
      </div>
      <p class="text-center mt-2 text-xs">HAZARD<br>X<br>ADEA</p>
    </div>

    <!-- Couple 3 -->
    <div class="flex flex-col items-center">
      <div class="flex space-x-2">
        <img src="dog11.jpg" alt="China Line" class="w-16 h-16 rounded-full border-4 border-yellow-400" />
        <img src="dog12.jpg" alt="Masha" class="w-16 h-16 rounded-full border-4 border-yellow-400" />
      </div>
      <p class="text-center mt-2 text-xs">中国线...<br>X<br>玛莎...</p>
    </div>

    <!-- Couple 4 -->
    <div class="flex flex-col items-center">
      <div class="flex space-x-2">
        <img src="dog13.jpg" alt="MACCHI" class="w-16 h-16 rounded-full border-4 border-yellow-400" />
        <img src="dog14.jpg" alt="DEACON" class="w-16 h-16 rounded-full border-4 border-yellow-400" />
      </div>
      <p class="text-center mt-2 text-xs">MACCHI...<br>X<br>DEACON</p>
    </div>
  </div>

</div>




<?php include "../src/components/admin/footer.php"; ?>
<script src="../static/js/admin/generation.js"></script>