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
<!-- Result Dog Display -->



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
            TESLA <span class="text-blue-400 text-lg">♂</span>
          </h2>
          <span class="text-sm text-gray-400">
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
      src="#"
      alt="Dog Banner"
      class="w-full h-full object-cover"
      id="result_dog_banner"
    />
  </div>

  <!-- Details Section -->
<div class="w-full sm:w-1/2 px-5 py-6 space-y-6 text-sm flex flex-col items-center text-center mt-2 ">


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



<!--generation tree section -->
<div class="max-w-screen-xl mx-auto space-y-8 pb-20 px-2 mt-8 markAsRegistered">

  <!-- Generation 1: 1 Couple -->
  <div class="flex justify-center flex-wrap gap-1 md:gap-3">
    <div class="flex flex-col items-center">
      <img src="../static/assets/icons/default.png" alt="Father" name="father" id="father" class="bg-yellow-400 w-16 h-16 md:w-20 md:h-20 rounded-full border border-yellow-400 object-cover" />
      <span class="text-[10px] md:text-sm mt-[1px] text-yellow-600 font-semibold uppercase"></span>
    </div>
    <div class="flex flex-col items-center">
      <img src="../static/assets/icons/default.png" alt="Mother" name="mother" id="mother" class="bg-yellow-400 w-16 h-16 md:w-20 md:h-20 rounded-full border border-yellow-400 object-cover" />
      <span class="text-[10px] md:text-sm mt-[1px] text-yellow-600 font-semibold uppercase"></span>
    </div>
  </div>

  <!-- Generation 2: 2 Couples -->
  <div class="flex justify-center flex-wrap gap-2 md:gap-8">
    <!-- Couple 1 -->
    <div class="flex flex-col items-center gap-1">
      <div class="flex flex-wrap justify-center gap-1">
        <div class="flex flex-col items-center">
          <img src="../static/assets/icons/default.png" alt="Grand Father" name="grandfather1" id="grandfather1" class="bg-yellow-400 w-12 h-12 md:w-16 md:h-16 rounded-full border-2 border-yellow-400 object-cover" />
          <span class="text-[9px] md:text-xs mt-[2px] text-yellow-600 font-semibold uppercase"></span>
        </div>
        <div class="flex flex-col items-center">
          <img src="../static/assets/icons/default.png" alt="Grand Mother" name="grandmother1" id="grandmother1" class="bg-yellow-400 w-12 h-12 md:w-16 md:h-16 rounded-full border-2 border-yellow-400 object-cover" />
          <span class="text-[9px] md:text-xs mt-[2px] text-yellow-600 font-semibold uppercase"></span>
        </div>
      </div>
    </div>

    <!-- Couple 2 -->
    <div class="flex flex-col items-center gap-1">
      <div class="flex flex-wrap justify-center gap-1">
        <div class="flex flex-col items-center">
          <img src="../static/assets/icons/default.png" alt="Grand Father" name="grandfather2" id="grandfather2" class="bg-yellow-400 w-12 h-12 md:w-16 md:h-16 rounded-full border-2 border-yellow-400 object-cover" />
          <span class="text-[9px] md:text-xs mt-[2px] text-yellow-600 font-semibold uppercase"></span>
        </div>
        <div class="flex flex-col items-center">
          <img src="../static/assets/icons/default.png" alt="Grand Mother" name="grandmother2" id="grandmother2" class="bg-yellow-400 w-12 h-12 md:w-16 md:h-16 rounded-full border-2 border-yellow-400 object-cover" />
          <span class="text-[9px] md:text-xs mt-[2px] text-yellow-600 font-semibold uppercase"></span>
        </div>
      </div>
    </div>
  </div>

  <!-- Generation 3: 4 Couples -->
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

<link rel="stylesheet" href="../src/selectto.css">


<!-- Modal -->
<div id="dogModal" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/30 backdrop-blur-sm transition duration-300 ease-in-out">

  <div class="bg-[#1A1A1A] rounded-2xl shadow-2xl p-8 w-full max-w-md space-y-6 text-white">
    <h2 class="text-2xl font-extrabold text-[#FFD700] text-center" id="modalTitle">Update Details</h2>
    <p class="text-center text-sm text-gray-300 font-medium" id="generation">: </p>

    <form id="updateGenForm" class="space-y-5">
      <input type="hidden" id="dogRole" name="dogRole">
      <input type="hidden" id="gen_dog_id" name="main_dog_id">
      <input type="hidden" id="dog_id" name="dog_id" value="<?php echo $_GET['dog_id']; ?>">

      <div>
        <label class="block text-sm font-medium text-gray-300 mb-1">Dog Type</label>
        <select id="dogType" name="dogType" class="bg-[#2C2C2C] text-white w-full px-3 py-2 border border-gray-500 rounded-lg shadow-sm focus:ring-yellow-400 focus:border-yellow-400">
          <option value="registered">Registered</option>
          <option value="not_registered">Not Registered</option>
        </select>
      </div>

      <!-- Registered Section -->
      <div id="registeredSection">
        <label for="registeredDog" class="block text-sm font-medium text-gray-300 mb-1">
          Select Registered Dog
        </label>
        <select id="registeredDog" name="dog_id" class="select2-tailwind w-full bg-[#2C2C2C] text-white border border-gray-500 rounded-lg">
          <option value="">-- Select Dog --</option>
        </select>
      </div>

      <!-- Not Registered Section -->
      <div id="notRegisteredSection" class="hidden space-y-4">
        <div>
          <label for="dogName" class="block text-sm font-medium text-gray-300 mb-1">Dog Name</label>
          <input type="text" id="dogName" name="dogName" class="bg-[#2C2C2C] text-white w-full px-3 py-2 border border-gray-500 rounded-lg shadow-sm focus:ring-yellow-400 focus:border-yellow-400">
        </div>
        <div>
          <label for="dogImage" class="block text-sm font-medium text-gray-300 mb-1">Dog Image</label>
          <input type="file" id="dogImage" name="dog_image" class="w-full text-sm file:mr-4 file:py-2 file:px-4 file:border file:border-gray-500 file:rounded-lg file:bg-yellow-100 file:text-yellow-700 hover:file:bg-yellow-200 bg-[#2C2C2C] text-white">
        </div>
      </div>

      <!-- Buttons -->
      <div class="flex justify-end space-x-3 pt-2">
        <button type="button" onclick="closeModal()" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg transition">Cancel</button>
        <button type="submit" class="bg-green-500 hover:bg-green-600 text-black font-semibold px-4 py-2 rounded-lg transition">Save</button>
      </div>
    </form>
  </div>
</div>





<?php include "../src/components/admin/footer.php"; ?>
<script src="../static/js/admin/generation.js"></script>