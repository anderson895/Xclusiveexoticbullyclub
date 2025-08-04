<?php
    include "src/components/header.php";
?>
 

<section class="bg-[#0D0D0D] text-[#CCCCCC] py-16 px-6">
  <div class="max-w-6xl mx-auto">
    
    <h2 class="text-3xl text-[#FFD700] font-bold text-center uppercase mb-12">XEBC Points chart</h2>
    <p class="text-center text-[#AAAAAA] text-sm italic mb-10">
      Breed points are calculated by how many dogs were beaten when winning Best of Breed.
    </p>

    <!-- Breed Category: American Bully -->
    <div class="mb-10">
      <h3 class="text-2xl text-white font-semibold border-l-4 border-[#FFD700] pl-4 mb-4">American Bully</h3>
      <ol class="space-y-2">
        <li class="bg-[#1A1A1A] p-4 rounded-lg border border-[#333] flex justify-between items-center">
          <span>NW M-GRCH Biltmore Bullies Heir to the Throne</span>
          <span class="text-[#FFD700] font-bold">516 pts</span>
        </li>
        <li class="bg-[#1A1A1A] p-4 rounded-lg border border-[#333] flex justify-between items-center">
          <span>GRCH BRB's Mack</span>
          <span class="text-[#FFD700] font-bold">351 pts</span>
        </li>
        <li class="bg-[#1A1A1A] p-4 rounded-lg border border-[#333] flex justify-between items-center">
          <span>CH Ambytion Bullies Blessed</span>
          <span class="text-[#FFD700] font-bold">99 pts</span>
        </li>
        <li class="bg-[#1A1A1A] p-4 rounded-lg border border-[#333] flex justify-between items-center">
          <span>GRCH B-Unit Deadpool</span>
          <span class="text-[#FFD700] font-bold">97 pts</span>
        </li>
      </ol>
    </div>

    <!-- Breed Category: XL Bully -->
    <div class="mb-10">
      <h3 class="text-2xl text-white font-semibold border-l-4 border-[#FFD700] pl-4 mb-4">XL Bully</h3>
      <ol class="space-y-2">
        <li class="bg-[#1A1A1A] p-4 rounded-lg border border-[#333] flex justify-between items-center">
          <span>CH BPP's Valley of the Fallen</span>
          <span class="text-[#FFD700] font-bold">12 pts</span>
        </li>
        <li class="bg-[#1A1A1A] p-4 rounded-lg border border-[#333] flex justify-between items-center">
          <span>Golden Armor Bullies QOH</span>
          <span class="text-[#FFD700] font-bold">11 pts</span>
        </li>
      </ol>
    </div>

    <!-- Breed Category: Exotic Bully -->
    <div class="mb-10">
      <h3 class="text-2xl text-white font-semibold border-l-4 border-[#FFD700] pl-4 mb-4">Exotic Bully</h3>
      <ol class="space-y-2">
        <li class="bg-[#1A1A1A] p-4 rounded-lg border border-[#333] flex justify-between items-center">
          <span>M-GRCH Prime8Bullies Bankroll</span>
          <span class="text-[#FFD700] font-bold">167 pts</span>
        </li>
        <li class="bg-[#1A1A1A] p-4 rounded-lg border border-[#333] flex justify-between items-center">
          <span>GRCH Spotify Premium</span>
          <span class="text-[#FFD700] font-bold">116 pts</span>
        </li>
      </ol>
    </div>

    <!-- Add more breed categories below as needed -->
    
  </div>
</section>

<?php
    include "src/components/footer.php";
?>