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
<div class="max-w-screen-md mx-auto my-10" id="result-dog-section">
  <h2 id="result_dog_name" class="text-center text-2xl font-bold text-yellow-600 mb-4 uppercase">Result Dog</h2>

  <div class="flex justify-center">
    <div class="flex flex-col items-center">
      <img src="" alt="Result Dog" id="result_dog_image" class="w-24 h-24 rounded-full border-4 border-yellow-500 object-cover" />
    
    </div>
  </div>
</div>




<div class="max-w-screen-xl mx-auto space-y-16">

  <!-- Generation 1: 1 Couple -->
  <div class="flex justify-center">
    <div class="flex flex-col items-center">
      <div class="flex space-x-2">
        <div class="flex flex-col items-center">
          <img src="#" alt="Father" name="father" id="father" class="w-20 h-20 rounded-full border-4 border-yellow-400" />
          <span class="text-xs mt-1 text-gray-700 font-semibold">Father</span>
        </div>
        <div class="flex flex-col items-center">
          <img src="#" alt="Mother" name="mother" id="mother" class="w-20 h-20 rounded-full border-4 border-yellow-400" />
          <span class="text-xs mt-1 text-gray-700 font-semibold">Mother</span>
        </div>
      </div>
    </div>
  </div>

  <!-- Generation 2: 2 Couples -->
  <div class="flex justify-center space-x-32">
    <!-- Couple 1 -->
    <div class="flex flex-col items-center">
      <div class="flex space-x-2">
        <div class="flex flex-col items-center">
          <img src="#" alt="Grand Father" name="grandfather1" id="grandfather1" class="w-20 h-20 rounded-full border-4 border-yellow-400" />
          <span class="text-xs mt-1 text-gray-700 font-semibold">Grand Father</span>
        </div>
        <div class="flex flex-col items-center">
          <img src="#" alt="Grand Mother" name="grandmother1" id="grandmother1" class="w-20 h-20 rounded-full border-4 border-yellow-400" />
          <span class="text-xs mt-1 text-gray-700 font-semibold">Grand Mother</span>
        </div>
      </div>
     
    </div>

    <!-- Couple 2 -->
    <div class="flex flex-col items-center">
      <div class="flex space-x-2">
        <div class="flex flex-col items-center">
          <img src="#" alt="Grand Father" name="grandfather2" id="grandfather2" class="w-20 h-20 rounded-full border-4 border-yellow-400" />
          <span class="text-xs mt-1 text-gray-700 font-semibold">Grand Father</span>
        </div>
        <div class="flex flex-col items-center">
          <img src="#" alt="Grand Mother" name="grandmother2" id="grandmother2" class="w-20 h-20 rounded-full border-4 border-yellow-400" />
          <span class="text-xs mt-1 text-gray-700 font-semibold">Grand Mother</span>
        </div>
      </div>
   
    </div>
  </div>

  <!-- Generation 3: 4 Couples -->
  <div class="flex justify-center space-x-20">
    <!-- Couple 1 -->
    <div class="flex flex-col items-center">
      <div class="flex space-x-2">
        <div class="flex flex-col items-center">
          <img src="#" alt="Great Grand Father" name="ggfather1" id="ggfather1" class="w-16 h-16 rounded-full border-4 border-yellow-400" />
          <span class="text-[10px] mt-1 text-gray-700 font-semibold">Great Grand Father</span>
        </div>
        <div class="flex flex-col items-center">
          <img src="#" alt="Great Grand Mother" name="ggmother1" id="ggmother1" class="w-16 h-16 rounded-full border-4 border-yellow-400" />
          <span class="text-[10px] mt-1 text-gray-700 font-semibold">Great Grand Mother</span>
        </div>
      </div>
      
    </div>

    <!-- Couple 2 -->
    <div class="flex flex-col items-center">
      <div class="flex space-x-2">
        <div class="flex flex-col items-center">
          <img src="#" alt="Great Grand Father" name="ggfather2" id="ggfather2" class="w-16 h-16 rounded-full border-4 border-yellow-400" />
          <span class="text-[10px] mt-1 text-gray-700 font-semibold">Great Grand Father</span>
        </div>
        <div class="flex flex-col items-center">
          <img src="#" alt="Great Grand Mother" name="ggmother2" id="ggmother2" class="w-16 h-16 rounded-full border-4 border-yellow-400" />
          <span class="text-[10px] mt-1 text-gray-700 font-semibold">Great Grand Mother</span>
        </div>
      </div>
      
    </div>

    <!-- Couple 3 -->
    <div class="flex flex-col items-center">
      <div class="flex space-x-2">
        <div class="flex flex-col items-center">
          <img src="#" alt="Great Grand Father" name="ggfather3" id="ggfather3" class="w-16 h-16 rounded-full border-4 border-yellow-400" />
          <span class="text-[10px] mt-1 text-gray-700 font-semibold">Great Grand Father</span>
        </div>
        <div class="flex flex-col items-center">
          <img src="#" alt="Great Grand Mother" name="ggmother3" id="ggmother3" class="w-16 h-16 rounded-full border-4 border-yellow-400" />
          <span class="text-[10px] mt-1 text-gray-700 font-semibold">Great Grand Mother</span>
        </div>
      </div>
    
    </div>

    <!-- Couple 4 -->
    <div class="flex flex-col items-center">
      <div class="flex space-x-2">
        <div class="flex flex-col items-center">
          <img src="#" alt="Great Grand Father" name="ggfather4" id="ggfather4" class="w-16 h-16 rounded-full border-4 border-yellow-400" />
          <span class="text-[10px] mt-1 text-gray-700 font-semibold">Great Grand Father</span>
        </div>
        <div class="flex flex-col items-center">
          <img src="#" alt="Great Grand Mother" name="ggmother4" id="ggmother4" class="w-16 h-16 rounded-full border-4 border-yellow-400" />
          <span class="text-[10px] mt-1 text-gray-700 font-semibold">Great Grand Mother</span>
        </div>
      </div>
     
    </div>
  </div>
</div>




<!-- Modal -->
<div id="dogModal" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/30 backdrop-blur-sm transition duration-300 ease-in-out">

  <div class="bg-white rounded-2xl shadow-2xl p-8 w-full max-w-md space-y-6">
   <h2 class="text-2xl font-extrabold text-gray-800 text-center" id="modalTitle">Update Details</h2>
    <p class="text-center text-sm text-gray-600 font-medium" id="generation">: </p>

    <form id="updateGenForm" class="space-y-5">
      <input type="hidden" id="dogRole" name="dogRole">
      <input type="hidden" id="gen_dog_id" name="main_dog_id">

      <input type="hidden" id="dog_id" name="dog_id" value="<?php $_GET['dog_id'];?>">


      <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Dog Type</label>
        <select id="dogType" name="dogType" class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-yellow-400 focus:border-yellow-400">
          <option value="registered">Registered</option>
          <option value="not_registered">Not Registered</option>
        </select>
      </div>

      <!-- Registered Section -->
        <div id="registeredSection">
            <label for="registeredDog" class="block text-sm font-medium text-gray-700 mb-1">
                Select Registered Dog
            </label>
            <select id="registeredDog" name="dog_id" class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-yellow-400 focus:border-yellow-400">
                <option value="">-- Select Dog --</option>
            </select>
        </div>


      <!-- Not Registered Section -->
      <div id="notRegisteredSection" class="hidden space-y-4">
        <div>
          <label for="dogName" class="block text-sm font-medium text-gray-700 mb-1">Dog Name</label>
          <input type="text" id="dogName" name="dogName" class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-yellow-400 focus:border-yellow-400">
        </div>
        <div>
          <label for="dogImage" class="block text-sm font-medium text-gray-700 mb-1">Dog Image</label>
          <input type="file" id="dogImage" name="dogImage" class="w-full text-sm file:mr-4 file:py-2 file:px-4 file:border file:border-gray-300 file:rounded-lg file:bg-yellow-50 file:text-yellow-700 hover:file:bg-yellow-100">
        </div>
      </div>

      <!-- Buttons -->
      <div class="flex justify-end space-x-3 pt-2">
        <button type="button" onclick="closeModal()" class="px-4 py-2 bg-gray-200 text-gray-800 rounded-lg hover:bg-gray-300 transition">Cancel</button>
        <button type="submit" class="px-4 py-2 bg-yellow-500 text-white rounded-lg hover:bg-yellow-600 transition">Save</button>
      </div>
    </form>
  </div>
</div>




<?php include "../src/components/admin/footer.php"; ?>
<script src="../static/js/admin/generation.js"></script>