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
  <h2 class="text-center text-2xl font-bold text-yellow-600 mb-4">Result Dog</h2>
  <div class="flex justify-center">
    <div class="flex flex-col items-center">
      <img src="" alt="Result Dog" id="result_dog_image" class="w-24 h-24 rounded-full border-4 border-yellow-500 object-cover" />
      <span id="result_dog_name" class="mt-2 text-lg font-semibold text-gray-800">Dog Name</span>
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
      <p class="text-center mt-2 text-sm"><br>X<br></p>
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
      <p class="text-center mt-2 text-sm"><br>X<br></p>
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
      <p class="text-center mt-2 text-sm"><br>X<br></p>
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
      <p class="text-center mt-2 text-xs"><br>X<br></p>
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
      <p class="text-center mt-2 text-xs"><br>X<br></p>
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
      <p class="text-center mt-2 text-xs"><br>X<br></p>
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
      <p class="text-center mt-2 text-xs"><br>X<br></p>
    </div>
  </div>
</div>


<script>
$(document).ready(function () {
    const dogId = getUrlParameter('dog_id');

    if (dogId) {
        $.ajax({
            url: "../controller/admin/end-points/controller.php",
            type: 'GET',
            data: { dog_id: dogId, requestType: "fetch_dogs_generation" },
            dataType: 'json',
            success: function (response) {
                if (response.status === 200) {
                    const data = response.data;

                    // Main Dog
                    $('#result_dog_name').text(data.main_dog_name ?? 'Unknown');
                    updateImageOrIcon('#result_dog_image', data.main_dog_image);

                    // Generation members
                    updateDog('father', data.father_name, data.father_image);
                    updateDog('mother', data.mother_name, data.mother_image);
                    updateDog('grandfather1', data.grandfather1_name, data.grandfather1_image);
                    updateDog('grandmother1', data.grandmother1_name, data.grandmother1_image);
                    updateDog('grandfather2', data.grandfather2_name, data.grandfather2_image);
                    updateDog('grandmother2', data.grandmother2_name, data.grandmother2_image);
                    updateDog('ggfather1', data.ggfather1_name, data.ggfather1_image);
                    updateDog('ggmother1', data.ggmother1_name, data.ggmother1_image);
                    updateDog('ggfather2', data.ggfather2_name, data.ggfather2_image);
                    updateDog('ggmother2', data.ggmother2_name, data.ggmother2_image);
                    updateDog('ggfather3', data.ggfather3_name, data.ggfather3_image);
                    updateDog('ggmother3', data.ggmother3_name, data.ggmother3_image);
                    updateDog('ggfather4', data.ggfather4_name, data.ggfather4_image);
                    updateDog('ggmother4', data.ggmother4_name, data.ggmother4_image);
                }
            },
            error: function (xhr, status, error) {
                console.error("AJAX error:", error);
            }
        });
    }

    function getUrlParameter(name) {
        const url = new URL(window.location.href);
        return url.searchParams.get(name);
    }

    // Replace image with pets icon if missing
    function updateImageOrIcon(selector, imagePath) {
        if (imagePath && imagePath.trim() !== '') {
            $(selector).attr('src', '../static/upload/' + imagePath).show();
            $(selector).next('.material-icons').remove(); // remove icon if image exists
        } else {
            const icon = $('<span class="material-icons text-yellow-500 text-5xl">pets</span>');
            $(selector).hide().after(icon);
        }
    }

    // Update generation name and image/icon
    function updateDog(id, name, image) {
        const imgSelector = '#' + id;
        const labelSelector = $(imgSelector).next('span');
        labelSelector.text(name ?? 'UNKNOWN');
        updateImageOrIcon(imgSelector, image);
    }
});
</script>





<?php include "../src/components/admin/footer.php"; ?>
<script src="../static/js/admin/generation.js"></script>