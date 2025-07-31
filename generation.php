<?php
    include "src/components/header.php";
?>

<!-- Result Dog Display -->
<div class="max-w-screen-md mx-auto my-10 rounded-lg shadow-lg overflow-hidden" id="result-dog-section" >
  


  <!-- Overlay Content -->
  <div class="bg-gray-900 bg-opacity-90 p-6 text-center">
    <!-- Dog Name -->
    <h2 id="result_dog_name" class="text-3xl font-bold text-yellow-400 mb-4 uppercase">Result Dog</h2>

    <!-- Thumbnail & Info -->
    <div class="flex flex-col items-center space-y-4">
      <!-- Dog Thumbnail -->
      <img src="" alt="Result Dog" id="result_dog_image"
           class="w-28 h-28 rounded-full border-4 border-yellow-500 shadow-md object-cover" />

      <!-- Dog Info -->
      <div class="text-white space-y-2 text-sm sm:text-base">
        <p><span class="font-semibold">Breeder:</span> <span id="dog_breeder_name" class="ml-1"></span></p>
        <p><span class="font-semibold">Owner:</span> <span id="dog_owner_name" class="ml-1"></span></p>
        <p><span class="font-semibold">Code:</span> <span id="dog_code" class="ml-1"></span></p>
      </div>
    </div>
  </div>
</div>



<div class="max-w-screen-xl mx-auto space-y-16 pb-40 px-4" id="generationtree">

  <!-- Generation 1: 1 Couple -->
  <div class="flex justify-center flex-wrap gap-4">
    <div class="flex flex-col items-center">
      <img src="#" alt="Father" name="father" id="father" class="w-28 h-28 rounded-full border-4 border-yellow-400 object-cover" />
      <span class="text-sm mt-1 text-yellow-600 font-semibold uppercase">Father</span>
    </div>
    <div class="flex flex-col items-center">
      <img src="#" alt="Mother" name="mother" id="mother" class="w-28 h-28 rounded-full border-4 border-yellow-400 object-cover" />
      <span class="text-sm mt-1 text-yellow-600 font-semibold uppercase">Mother</span>
    </div>
  </div>

  <!-- Generation 2: 2 Couples -->
  <div class="flex justify-center flex-wrap gap-8 md:gap-32">
    <!-- Couple 1 -->
    <div class="flex flex-col items-center gap-4">
      <div class="flex flex-wrap justify-center gap-4">
        <div class="flex flex-col items-center">
          <img src="#" alt="Grand Father" name="grandfather1" id="grandfather1" class="w-28 h-28 rounded-full border-4 border-yellow-400 object-cover" />
          <span class="text-sm mt-1 text-yellow-600 font-semibold uppercase">Grand Father</span>
        </div>
        <div class="flex flex-col items-center">
          <img src="#" alt="Grand Mother" name="grandmother1" id="grandmother1" class="w-28 h-28 rounded-full border-4 border-yellow-400 object-cover" />
          <span class="text-sm mt-1 text-yellow-600 font-semibold uppercase">Grand Mother</span>
        </div>
      </div>
    </div>

    <!-- Couple 2 -->
    <div class="flex flex-col items-center gap-4">
      <div class="flex flex-wrap justify-center gap-4">
        <div class="flex flex-col items-center">
          <img src="#" alt="Grand Father" name="grandfather2" id="grandfather2" class="w-28 h-28 rounded-full border-4 border-yellow-400 object-cover" />
          <span class="text-sm mt-1 text-yellow-600 font-semibold uppercase">Grand Father</span>
        </div>
        <div class="flex flex-col items-center">
          <img src="#" alt="Grand Mother" name="grandmother2" id="grandmother2" class="w-28 h-28 rounded-full border-4 border-yellow-400 object-cover" />
          <span class="text-sm mt-1 text-yellow-600 font-semibold uppercase">Grand Mother</span>
        </div>
      </div>
    </div>
  </div>

  <!-- Generation 3: 4 Couples -->
  <div class="flex justify-center flex-wrap gap-8 md:gap-16">
    <!-- Couple 1 -->
    <div class="flex flex-col items-center gap-4">
      <div class="flex flex-wrap justify-center gap-4">
        <div class="flex flex-col items-center">
          <img src="#" alt="Great Grand Father" name="ggfather1" id="ggfather1" class="w-28 h-28 rounded-full border-4 border-yellow-400 object-cover" />
          <span class="text-xs mt-1 text-yellow-600 font-semibold uppercase">Great Grand Father</span>
        </div>
        <div class="flex flex-col items-center">
          <img src="#" alt="Great Grand Mother" name="ggmother1" id="ggmother1" class="w-28 h-28 rounded-full border-4 border-yellow-400 object-cover" />
          <span class="text-xs mt-1 text-yellow-600 font-semibold uppercase">Great Grand Mother</span>
        </div>
      </div>
    </div>

    <!-- Couple 2 -->
    <div class="flex flex-col items-center gap-4">
      <div class="flex flex-wrap justify-center gap-4">
        <div class="flex flex-col items-center">
          <img src="#" alt="Great Grand Father" name="ggfather2" id="ggfather2" class="w-28 h-28 rounded-full border-4 border-yellow-400 object-cover" />
          <span class="text-xs mt-1 text-yellow-600 font-semibold uppercase">Great Grand Father</span>
        </div>
        <div class="flex flex-col items-center">
          <img src="#" alt="Great Grand Mother" name="ggmother2" id="ggmother2" class="w-28 h-28 rounded-full border-4 border-yellow-400 object-cover" />
          <span class="text-xs mt-1 text-yellow-600 font-semibold uppercase">Great Grand Mother</span>
        </div>
      </div>
    </div>

    <!-- Couple 3 -->
    <div class="flex flex-col items-center gap-4">
      <div class="flex flex-wrap justify-center gap-4">
        <div class="flex flex-col items-center">
          <img src="#" alt="Great Grand Father" name="ggfather3" id="ggfather3" class="w-28 h-28 rounded-full border-4 border-yellow-400 object-cover" />
          <span class="text-xs mt-1 text-yellow-600 font-semibold uppercase">Great Grand Father</span>
        </div>
        <div class="flex flex-col items-center">
          <img src="#" alt="Great Grand Mother" name="ggmother3" id="ggmother3" class="w-28 h-28 rounded-full border-4 border-yellow-400 object-cover" />
          <span class="text-xs mt-1 text-yellow-600 font-semibold uppercase">Great Grand Mother</span>
        </div>
      </div>
    </div>

    <!-- Couple 4 -->
    <div class="flex flex-col items-center gap-4">
      <div class="flex flex-wrap justify-center gap-4">
        <div class="flex flex-col items-center">
          <img src="#" alt="Great Grand Father" name="ggfather4" id="ggfather4" class="w-28 h-28 rounded-full border-4 border-yellow-400 object-cover" />
          <span class="text-xs mt-1 text-yellow-600 font-semibold uppercase">Great Grand Father</span>
        </div>
        <div class="flex flex-col items-center">
          <img src="#" alt="Great Grand Mother" name="ggmother4" id="ggmother4" class="w-28 h-28 rounded-full border-4 border-yellow-400 object-cover" />
          <span class="text-xs mt-1 text-yellow-600 font-semibold uppercase">Great Grand Mother</span>
        </div>
      </div>
    </div>
  </div>
</div>




<div id="noGenerationNotice" class="hidden text-center text-gray-600 italic bg-yellow-50 border border-yellow-300 p-4 rounded-md shadow-sm mb-10">
    Lineage data is unavailable for unregistered dogs.
</div>


<?php
    include "src/components/footer.php";
?>

<script src="static/js//generation.js"></script>