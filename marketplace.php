<?php
    include "src/components/header.php";
?>

<section class="bg-[#0D0D0D] text-[#CCCCCC] py-16 px-6">
  <div class="max-w-7xl mx-auto">

    <h2 class="text-3xl text-[#FFD700] font-bold text-center uppercase mb-12">Bully Marketplace</h2>
    <p class="text-center text-[#AAAAAA] text-sm italic mb-10">
      Browse our top quality American Bully, XL Bully, and Exotic Bully listings.
    </p>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">

      <!-- Product Card -->
      <div class="bg-[#1A1A1A] border border-[#333] rounded-xl p-4 hover:shadow-xl transition">
        <img src="static/assets/bullies/x_bullies.webp" alt="Heir to the Throne" class="w-full h-48 object-cover rounded-lg mb-4">
        <h3 class="text-lg font-semibold text-white">NW M-GRCH Heir to the Throne</h3>
        <p class="text-sm text-[#AAAAAA] mb-2">American Bully • Champion Line</p>
        <div class="flex justify-between items-center">
          <span class="text-[#FFD700] font-bold">$2,600</span>
          <button class="bg-[#FFD700] text-black px-4 py-1 rounded hover:bg-yellow-400 text-sm font-semibold">View</button>
        </div>
      </div>

      <!-- Product Card -->
      <div class="bg-[#1A1A1A] border border-[#333] rounded-xl p-4 hover:shadow-xl transition">
        <img src="static/assets/bullies/exotic_bullies.webp" alt="GRCH Mack" class="w-full h-48 object-cover rounded-lg mb-4">
        <h3 class="text-lg font-semibold text-white">GRCH BRB's Mack</h3>
        <p class="text-sm text-[#AAAAAA] mb-2">American Bully • Muscle Build</p>
        <div class="flex justify-between items-center">
          <span class="text-[#FFD700] font-bold">$2,070</span>
          <button class="bg-[#FFD700] text-black px-4 py-1 rounded hover:bg-yellow-400 text-sm font-semibold">View</button>
        </div>
      </div>

      <!-- Product Card -->
      <div class="bg-[#1A1A1A] border border-[#333] rounded-xl p-4 hover:shadow-xl transition">
        <img src="static/assets/bullies/shorty.webp" alt="CH Valley" class="w-full h-48 object-cover rounded-lg mb-4">
        <h3 class="text-lg font-semibold text-white">CH BPP's Valley</h3>
        <p class="text-sm text-[#AAAAAA] mb-2">XL Bully • Excellent Structure</p>
        <div class="flex justify-between items-center">
          <span class="text-[#FFD700] font-bold">$1,550</span>
          <button class="bg-[#FFD700] text-black px-4 py-1 rounded hover:bg-yellow-400 text-sm font-semibold">View</button>
        </div>
      </div>

      <!-- More cards... -->
      
    </div>

  </div>
</section>

<?php
    include "src/components/footer.php";
?>
