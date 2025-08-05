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
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 px-4 py-6" id="gettableGrid"></div>

  </div>
</section>

<?php
    include "src/components/footer.php";
?>





<script src="static/js/gettable.js"></script>
