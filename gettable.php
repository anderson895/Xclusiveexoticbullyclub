<?php
    include "src/components/header.php";
?>

<section class="bg-[#0D0D0D] text-[#CCCCCC] py-16 px-6">
  <div class="max-w-7xl mx-auto">

    <h2 class="text-3xl text-[#FFD700] font-bold text-center uppercase mb-12">GETTABLE </h2>
    <p class="text-center text-[#AAAAAA] text-sm italic mb-10">
      Browse our top quality American Bully, XL Bully, and Exotic Bully listings.
    </p>

    <!-- Container where AJAX content will be injected -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
      <!-- Dynamic product cards will be injected here by gettable.js -->
    </div>

  </div>
</section>

<?php
    include "src/components/footer.php";
?>
<div id="gettableModal" class="fixed inset-0 bg-black bg-opacity-70 hidden items-center justify-center z-50">
  <div class="bg-[#1A1A1A] rounded-xl max-w-3xl w-full p-6 relative">
    <button id="closeModal" class="absolute top-2 right-2 text-white text-2xl">&times;</button>

      <!-- NEW (link instead of iframe) -->
      <a id="modalLink" href="#" target="_blank" rel="noopener noreferrer"
        class="inline-block mt-4 text-blue-400 underline hover:text-blue-200">
        Visit Social Media Profile
      </a>


    <!-- Image -->
    <img id="modalImage" src="" class="w-full h-48 object-cover rounded-lg mb-4" alt="">

    <!-- Info -->
    <h2 id="modalName" class="text-xl text-white font-bold mb-2"></h2>
    <p id="modalDescription" class="text-[#AAAAAA] text-sm"></p>
  </div>
</div>


<script src="static/js/gettable.js"></script>
