<?php
    include "src/components/header.php";
?>
<!-- Top Header -->
<div class="flex items-center justify-between p-4 bg-black border-b border-gray-700 flex-wrap">
  

  <div class="flex flex-col sm:flex-row sm:items-center mt-2 sm:mt-0 text-sm text-gray-300">
    <div class="flex items-center space-x-1 mb-2 sm:mb-0 mx-2">
      <img src="static/assets/icons/facebook.png" alt="Facebook" class="w-4 h-4">
      <span id="dog_facebook_name"></span>
    </div>

    &nbsp;
    &nbsp;
    &nbsp;
    <div class="flex items-center space-x-1 mb-2 sm:mb-0 mx-2">
      <img src="static/assets/icons/instagram.png" alt="Instagram" class="w-4 h-4">
      <span id="dog_ig_name"></span>
    </div>
    &nbsp;
    &nbsp;
    &nbsp;
    <div class="flex items-center space-x-1 mx-2">
      <img src="static/assets/icons/phone.png" alt="Phone" class="w-4 h-4">
    <span id="dog_contact_number"></span>
    </div>
  </div>
</div>


<!-- 
<div class="max-w-full sm:max-w-5xl mx-auto mt-6 bg-gradient-to-br from-zinc-900 to-black text-white rounded-2xl overflow-hidden shadow-2xl ">

  <div class="px-5 py-5 bg-[#0D0D0D] border-b border-gray-700 rounded-t-2xl">
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-2">
      <div class="flex items-center gap-4">
        <img
          src="https://via.placeholder.com/48"
          alt="Dog Avatar"
          id="result_dog_image"
          class="w-14 h-14 rounded-full border-2 border-yellow-400 object-cover shadow"
        />
        <h2 id="result_dog_name" class="text-xl font-bold text-yellow-300 uppercase tracking-wide flex items-center gap-1">
          TESLA <span class="text-blue-400 text-lg">♂</span>
        </h2>
      </div>
      <span class="text-sm text-gray-400">
        XEBC NO. <span id="dog_code" class="text-white font-medium">990000011578227</span>
      </span>
    </div>
  </div>

  <div class="relative w-full aspect-[4/3] sm:aspect-[4/1]">
    <img
      src="https://utfs.io/f/f54d38cd-157d-41fe-a6c4-8cca8439e265-oogk4m.jpg"
      alt="Dog Banner"
      class="w-full h-full object-cover"
    />
  </div>

  <div class="px-5 pt-6 pb-8 bg-[#0D0D0D] border-t border-gray-700 text-white text-sm space-y-6 rounded-b-2xl">

    <div class="text-center space-y-1">
      <p><span class="font-semibold text-gray-300">Owner:</span> <span class="capitalize text-white" id="dog_owner_name">Lucy Ethan</span></p>
      <p><span class="font-semibold text-gray-300">Country:</span> <span class="capitalize text-white" id="dog_country">Philippines</span></p>
      <p><span class="font-semibold text-gray-300">Breeder:</span> <span class="capitalize text-white" id="dog_breeder_name">Juan Dela Cruz</span></p>
    </div>

    <div class="flex flex-wrap justify-center gap-3">
      <span class="px-3 py-1 border border-yellow-400 rounded-full bg-yellow-500/10 flex items-center gap-1 hover:bg-yellow-400/20 transition">
        
       Height : <span id="dog_height">34cm</span>
      </span>

      <span class="px-3 py-1 border border-purple-400 rounded-full bg-purple-500/10 flex items-center gap-1 hover:bg-purple-400/20 transition">
        <span class="material-icons text-purple-300 text-sm">palette</span>
        <span id="dog_color">Lilac</span>
      </span>

      <span class="px-3 py-1 border border-yellow-500 rounded-full bg-yellow-500/10 flex items-center gap-1 hover:bg-yellow-400/20 transition">
        <span class="material-icons text-yellow-400 text-sm">cake</span>
        <span id="dog_date_of_birth">2023/04/01</span>
      </span>
    </div>
  </div>
</div> -->

<div class="w-full mx-auto mt-6 bg-gradient-to-br from-zinc-900 to-black text-white rounded-2xl overflow-hidden shadow-2xl">


  <!-- Header: Avatar, Name, CBR No. -->
  <div class="px-5 py-5 bg-[#0D0D0D] border-b border-gray-700 rounded-t-2xl">
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-2">
      <div class="flex items-start gap-4">
        <!-- Dog Avatar -->
        <img
          src="https://via.placeholder.com/48"
          alt="Dog Avatar"
          id="result_dog_image"
          class="w-14 h-14 rounded-full border-2 border-yellow-400 object-cover shadow"
        />

        <!-- Dog Name and XEBC -->
        <div class="flex flex-col leading-tight">
          <h2 id="result_dog_name" class="text-xl font-bold text-yellow-300 uppercase tracking-wide flex items-center gap-1">
            TESLA <span class="text-blue-400 text-lg">♂</span>
          </h2>
          <span class="text-sm text-gray-400">
            XEBC NO. <span id="dog_code" class="text-white font-medium">990000011578227</span>
          </span>
        </div>
      </div>
    </div>

  </div>
<!-- Container Section -->
<div class="flex flex-col sm:flex-row bg-[#0D0D0D] overflow-hidden border border-gray-700 text-white">

  <!-- Image Section -->
  <div class="w-full sm:w-1/2 aspect-[4/3] sm:aspect-auto">
    <img
      src="https://utfs.io/f/f54d38cd-157d-41fe-a6c4-8cca8439e265-oogk4m.jpg"
      alt="Dog Banner"
      class="w-full h-full object-cover"
    />
  </div>

  <!-- Details Section -->
<div class="w-full sm:w-1/2 px-5 py-6 space-y-6 text-sm flex flex-col items-center text-center mt-20">


  <!-- Dog Info -->
  <div class="space-y-2">
    <p><span class="font-semibold text-gray-300">Owner:</span> <span class="capitalize text-white" id="dog_owner_name">Lucy Ethan</span></p>
    <p><span class="font-semibold text-gray-300">Country:</span> <span class="capitalize text-white" id="dog_country">Philippines</span></p>
    <p><span class="font-semibold text-gray-300">Breeder:</span> <span class="capitalize text-white" id="dog_breeder_name">Juan Dela Cruz</span></p>
  </div>

  <!-- Tags -->
  <div class="flex flex-wrap justify-center gap-3">
    <span class="px-3 py-1 border border-yellow-400 rounded-full bg-yellow-500/10 flex items-center gap-1 hover:bg-yellow-400/20 transition">
      Height: <span id="dog_height">34cm</span>
    </span>

    <span class="px-3 py-1 border border-purple-400 rounded-full bg-purple-500/10 flex items-center gap-1 hover:bg-purple-400/20 transition">
      <span class="material-icons text-purple-300 text-sm">palette</span>
      <span id="dog_color">Lilac</span>
    </span>

    <span class="px-3 py-1 border border-yellow-500 rounded-full bg-yellow-500/10 flex items-center gap-1 hover:bg-yellow-400/20 transition">
      <span class="material-icons text-yellow-400 text-sm">cake</span>
      <span id="dog_date_of_birth">2023/04/01</span>
    </span>
  </div>
</div>


</div>





<div class="max-w-screen-xl mx-auto space-y-16 pb-40 px-4 mt-20" id="generationtree">


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