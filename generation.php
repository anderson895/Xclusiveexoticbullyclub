<?php
    include "src/components/header.php";
?>
<!-- Wrapper -->
<div class="flex flex-row items-start justify-between md:justify-start p-4 bg-black border-b border-gray-700 w-full text-sm text-gray-300 markAsRegistered">

  <!-- DETAILS SECTION (Left on mobile, hidden on md and up) -->
  <div class="w-1/2 flex flex-col space-y-2 items-start text-left pr-2 md:hidden">
    <div class="space-y-1">
      <p><span class="font-semibold text-gray-300">Owner:</span> <span class="capitalize dog_owner_name">Lucy Ethan</span></p>
      <p><span class="font-semibold text-gray-300">Country:</span> <span class="capitalize dog_country">Philippines</span></p>
      <p><span class="font-semibold text-gray-300">Breeder:</span> <span class="capitalize dog_breeder_name">Juan Dela Cruz</span></p>
    </div>

    <div class="flex justify-start gap-2 text-xs flex-wrap">
      <span class="px-2 py-1 bg-yellow-500/10 border border-yellow-400 rounded-full">
        Height: <span class="dog_height"></span>
      </span>
      <span class="px-2 py-1 bg-purple-500/10 border border-purple-400 rounded-full">
        <span class="dog_color"></span>
      </span>
      <span class="px-2 py-1 bg-yellow-500/10 border border-purple-400 rounded-full">
        <span class="material-icons text-yellow-400 text-sm">cake</span> 
        <span class="dog_date_of_birth"></span>
      </span>
    </div>
  </div>

  <!-- LINK SECTION (Right on mobile, Left on desktop) -->
  <div class="w-1/2 flex flex-col space-y-2 items-end md:items-start text-right md:text-left pl-2 md:pl-0">
    <a href="#" id="dog_facebook_link" class="flex items-center space-x-2" target="_blank" rel="noopener">
      <img src="static/assets/icons/facebook.png" alt="Facebook" class="w-4 h-4">
      <span id="dog_facebook_name" class="lowercase"></span>
    </a>
    <a href="#" id="dog_ig_link" class="flex items-center space-x-2" target="_blank" rel="noopener">
      <img src="static/assets/icons/instagram.png" alt="Instagram" class="w-4 h-4">
      <span id="dog_ig_name" class="lowercase"></span>
    </a>
    <div class="flex items-center space-x-2">
      <img src="static/assets/icons/phone.png" alt="Phone" class="w-4 h-4">
      <span id="dog_contact_number" ></span>
    </div>
  </div>


</div>


<div class="w-full mx-auto mt-6 bg-gradient-to-br from-zinc-900 to-black text-white rounded-2xl overflow-hidden shadow-2xl">


  <!-- Header: Avatar, Name, CBR No. -->
  <div class="px-5 py-5 bg-[#0D0D0D] border-b border-gray-700 rounded-t-2xl ">
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-2">
      <div class="flex items-start gap-4">
        <!-- Dog Avatar -->
        <img
          src="#"
          alt="Dog Avatar"
          id="result_dog_image"
          class="w-14 h-14 rounded-full border-2 border-yellow-400 object-cover shadow"
        />

        <!-- Dog Name and XEBC -->
        <div class="flex flex-col leading-tight">
          <h2 id="result_dog_name" class="text-xl font-bold text-yellow-300 uppercase tracking-wide flex items-center gap-1">
            TESLA 
            <span class="dog_gender markAsRegistered">♂</span>
          </h2>

          <span class="text-sm text-gray-400 markAsRegistered">
            XEBC NO. <span class="dog_code" class="text-white font-medium"></span>
          </span>
        </div>
      </div>
    </div>

  </div>
<!-- Container Section -->
<div class="flex flex-col sm:flex-row bg-[#0D0D0D] overflow-hidden border border-gray-700 text-white markAsRegistered">

  <!-- Image Section -->
  <div class="w-full sm:w-1/2 aspect-[4/3] sm:aspect-auto">
    <img
      id="result_dog_banner"
      src="#"
      alt="Dog Banner"
      class="w-full h-full object-cover"

    />
  </div>

<!-- Details Section (visible only on sm and up) -->
<div class="hidden sm:flex w-full px-5 py-8 text-lg flex-col items-center justify-center text-center mt-4 space-y-6 max-w-xl mx-auto">

  <!-- Dog Info -->
  <div class="space-y-2">
    <p><span class="font-semibold text-gray-300">Owner:</span> <span class="capitalize text-white dog_owner_name">Lucy Ethan</span></p>
    <p><span class="font-semibold text-gray-300">Country:</span> <span class="capitalize text-white dog_country">Philippines</span></p>
    <p><span class="font-semibold text-gray-300">Breeder:</span> <span class="capitalize text-white dog_breeder_name">Juan Dela Cruz</span></p>
  </div>

  <!-- Tags -->
  <div class="flex flex-wrap justify-center gap-4 text-base">
    <span class="px-4 py-2 border border-yellow-400 rounded-full bg-yellow-500/10 flex items-center gap-2 hover:bg-yellow-400/20 transition">
      Height: <span class="dog_height">34cm</span>
    </span>

    <span class="px-4 py-2 border border-purple-400 rounded-full bg-purple-500/10 flex items-center gap-2 hover:bg-purple-400/20 transition">
      <span class="material-icons text-purple-300 text-base">palette</span>
      <span class="dog_color">Lilac</span>
    </span>

    <span class="px-4 py-2 border border-yellow-500 rounded-full bg-yellow-500/10 flex items-center gap-2 hover:bg-yellow-400/20 transition">
      <span class="material-icons text-yellow-400 text-base">cake</span>
      <span class="dog_date_of_birth">2023/04/01</span>
    </span>
  </div>

</div>




</div>




<!--generation tree section -->
<div class="max-w-screen-xl mx-auto space-y-8 pb-20 px-2 mt-8 markAsRegistered" >


      <!-- Generation 1: 1 Couple -->
      <div class="flex justify-center flex-wrap gap-1 md:gap-3">
        <div class="flex flex-col items-center">
          <img src="#" alt="Father" name="father" id="father" class="w-16 h-16 md:w-20 md:h-20 rounded-full border border-yellow-400 object-cover" />
          <span class="text-[10px] md:text-sm mt-[1px] text-yellow-600 font-semibold uppercase">Father</span>
        </div>
        <div class="flex flex-col items-center">
          <img src="#" alt="Mother" name="mother" id="mother" class="w-16 h-16 md:w-20 md:h-20 rounded-full border border-yellow-400 object-cover" />
          <span class="text-[10px] md:text-sm mt-[1px] text-yellow-600 font-semibold uppercase">Mother</span>
        </div>
      </div>



        <!-- Generation 2: 2 Couples -->
        <div class="flex justify-center flex-wrap gap-2 md:gap-8">
        <!-- Couple 1 -->
        <div class="flex flex-col items-center gap-1">
          <div class="flex flex-wrap justify-center gap-1">
            <div class="flex flex-col items-center">
              <img src="#" alt="Grand Father" name="grandfather1" id="grandfather1" class="w-12 h-12 md:w-16 md:h-16 rounded-full border-2 border-yellow-400 object-cover" />
              <span class="text-[9px] md:text-xs mt-[2px] text-yellow-600 font-semibold uppercase">Grand Father</span>
            </div>
            <div class="flex flex-col items-center">
              <img src="#" alt="Grand Mother" name="grandmother1" id="grandmother1" class="w-12 h-12 md:w-16 md:h-16 rounded-full border-2 border-yellow-400 object-cover" />
              <span class="text-[9px] md:text-xs mt-[2px] text-yellow-600 font-semibold uppercase">Grand Mother</span>
            </div>
          </div>
        </div>

        <!-- Couple 2 -->
        <div class="flex flex-col items-center gap-1">
          <div class="flex flex-wrap justify-center gap-1">
            <div class="flex flex-col items-center">
              <img src="#" alt="Grand Father" name="grandfather2" id="grandfather2" class="w-12 h-12 md:w-16 md:h-16 rounded-full border-2 border-yellow-400 object-cover" />
              <span class="text-[9px] md:text-xs mt-[2px] text-yellow-600 font-semibold uppercase">Grand Father</span>
            </div>
            <div class="flex flex-col items-center">
              <img src="#" alt="Grand Mother" name="grandmother2" id="grandmother2" class="w-12 h-12 md:w-16 md:h-16 rounded-full border-2 border-yellow-400 object-cover" />
              <span class="text-[9px] md:text-xs mt-[2px] text-yellow-600 font-semibold uppercase">Grand Mother</span>
            </div>
          </div>
        </div>
      </div>


      <!-- Generation 3: 4 Couples - Fit in 1 Row on Mobile -->
<div class="flex justify-center flex-wrap gap-1 md:gap-x-6">
  <!-- Couple 1 -->
  <div class="flex flex-col items-center gap-[2px] px-2 md:px-4">
    <div class="flex justify-center gap-[2px]">
      <div class="flex flex-col items-center">
        <img src="../static/assets/icons/default.png" alt="Great Grand Father" name="ggfather1" id="ggfather1"
          class="bg-yellow-400 w-6 h-6 md:w-12 md:h-12 rounded-full border border-yellow-400 object-cover" />
        <span class="text-[6px] md:text-[9px] mt-[1px] text-yellow-600 font-semibold uppercase text-center">Great Grand Father</span>
      </div>
      <div class="flex flex-col items-center">
        <img src="../static/assets/icons/default.png" alt="Great Grand Mother" name="ggmother1" id="ggmother1"
          class="bg-yellow-400 w-6 h-6 md:w-12 md:h-12 rounded-full border border-yellow-400 object-cover" />
        <span class="text-[6px] md:text-[9px] mt-[1px] text-yellow-600 font-semibold uppercase text-center">Great Grand Mother</span>
      </div>
    </div>
  </div>

  <!-- Couple 2 -->
  <div class="flex flex-col items-center gap-[2px] px-2 md:px-4">
    <div class="flex justify-center gap-[2px]">
      <div class="flex flex-col items-center">
        <img src="../static/assets/icons/default.png" alt="Great Grand Father" name="ggfather2" id="ggfather2"
          class="bg-yellow-400 w-6 h-6 md:w-12 md:h-12 rounded-full border border-yellow-400 object-cover" />
        <span class="text-[6px] md:text-[9px] mt-[1px] text-yellow-600 font-semibold uppercase text-center">Great Grand Father</span>
      </div>
      <div class="flex flex-col items-center">
        <img src="../static/assets/icons/default.png" alt="Great Grand Mother" name="ggmother2" id="ggmother2"
          class="bg-yellow-400 w-6 h-6 md:w-12 md:h-12 rounded-full border border-yellow-400 object-cover" />
        <span class="text-[6px] md:text-[9px] mt-[1px] text-yellow-600 font-semibold uppercase text-center">Great Grand Mother</span>
      </div>
    </div>
  </div>

  <!-- Couple 3 -->
  <div class="flex flex-col items-center gap-[2px] px-2 md:px-4">
    <div class="flex justify-center gap-[2px]">
      <div class="flex flex-col items-center">
        <img src="../static/assets/icons/default.png" alt="Great Grand Father" name="ggfather3" id="ggfather3"
          class="bg-yellow-400 w-6 h-6 md:w-12 md:h-12 rounded-full border border-yellow-400 object-cover" />
        <span class="text-[6px] md:text-[9px] mt-[1px] text-yellow-600 font-semibold uppercase text-center">Great Grand Father</span>
      </div>
      <div class="flex flex-col items-center">
        <img src="../static/assets/icons/default.png" alt="Great Grand Mother" name="ggmother3" id="ggmother3"
          class="bg-yellow-400 w-6 h-6 md:w-12 md:h-12 rounded-full border border-yellow-400 object-cover" />
        <span class="text-[6px] md:text-[9px] mt-[1px] text-yellow-600 font-semibold uppercase text-center">Great Grand Mother</span>
      </div>
    </div>
  </div>

  <!-- Couple 4 -->
  <div class="flex flex-col items-center gap-[2px] px-2 md:px-4">
    <div class="flex justify-center gap-[2px]">
      <div class="flex flex-col items-center">
        <img src="../static/assets/icons/default.png" alt="Great Grand Father" name="ggfather4" id="ggfather4"
          class="bg-yellow-400 w-6 h-6 md:w-12 md:h-12 rounded-full border border-yellow-400 object-cover" />
        <span class="text-[6px] md:text-[9px] mt-[1px] text-yellow-600 font-semibold uppercase text-center">Great Grand Father</span>
      </div>
      <div class="flex flex-col items-center">
        <img src="../static/assets/icons/default.png" alt="Great Grand Mother" name="ggmother4" id="ggmother4"
          class="bg-yellow-400 w-6 h-6 md:w-12 md:h-12 rounded-full border border-yellow-400 object-cover" />
        <span class="text-[6px] md:text-[9px] mt-[1px] text-yellow-600 font-semibold uppercase text-center">Great Grand Mother</span>
      </div>
    </div>
  </div>
</div>





</div>

<div id="noGenerationNotice" class="hidden text-center text-gray-600 italic bg-yellow-50 border border-yellow-300 p-4 shadow-sm mb-10">
    Lineage data is unavailable for unregistered dogs.
</div>


<?php
    include "src/components/footer.php";
?>

<script src="static/js//generation.js"></script>