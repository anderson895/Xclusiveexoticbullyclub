<?php
include "../src/components/admin/header.php";
include "../src/components/admin/nav.php";
?>

<!-- Top Bar -->
<div class="flex justify-between items-center bg-[#0D0D0D] p-4 mb-6 rounded-md shadow-lg">
    <h2 class="text-xl font-bold text-[#FFD700] uppercase tracking-wide">Registration</h2>
    <div class="w-10 h-10 bg-gray-600 rounded-full flex items-center justify-center text-white font-bold shadow-md">
        <?php echo strtoupper(substr($_SESSION['admin_fullname'], 0, 1)); ?>
    </div>
</div>



<!-- Registration Form Section -->
<div class="bg-[#1A1A1A] text-white p-6 rounded-lg shadow-lg">


    <!-- Spinner Overlay -->
    <div id="spinner" class="absolute inset-0 flex items-center justify-center z-50" style="display:none; background-color: rgba(255, 255, 255, 0.7);">
        <div class="w-12 h-12 border-4 border-blue-600 border-t-transparent rounded-full animate-spin"></div>
    </div>


    <!-- Form Start -->
    <form id="frmDogRegister" class="grid grid-cols-1 md:grid-cols-2 gap-6">

        <!-- Dog Image Upload -->
        <div class="col-span-1 md:col-span-2">
            <label class="block text-sm font-semibold mb-2">DOG IMAGE</label>
            <input type="file" id="dog_image" name="dog_image" accept="image/*"
                class="w-full bg-gray-800 text-white p-3 rounded-md border border-gray-600 file:bg-[#FFD700] file:text-black file:font-semibold file:border-none file:px-4 file:py-2">
        </div>

        <!-- Dog Name -->
        <div>
            <label class="block text-sm font-semibold mb-2">DOG NAME:</label>
            <input type="text" name="dog_name" required
                class="w-full p-3 rounded-md bg-gray-800 border border-gray-600 focus:outline-none focus:ring-2 focus:ring-[#FFD700]">
        </div>

        <!-- Owner Name -->
        <div>
            <label class="block text-sm font-semibold mb-2">OWNER NAME:</label>
            <input type="text" name="owner_name" required
                class="w-full p-3 rounded-md bg-gray-800 border border-gray-600 focus:outline-none focus:ring-2 focus:ring-[#FFD700]">
        </div>

        <!-- Breeder Name -->
        <div>
            <label class="block text-sm font-semibold mb-2">BREEDER NAME:</label>
            <input type="text" name="breeder_name"
                class="w-full p-3 rounded-md bg-gray-800 border border-gray-600 focus:outline-none focus:ring-2 focus:ring-[#FFD700]">
        </div>

 

        <!-- Country -->
        <div>
            <label class="block text-sm font-semibold mb-2">COUNTRY:</label>
            <input type="text" name="country"
                class="w-full p-3 rounded-md bg-gray-800 border border-gray-600 focus:outline-none focus:ring-2 focus:ring-[#FFD700]">
        </div>

        <!-- Color -->
        <div>
            <label class="block text-sm font-semibold mb-2">COLOR:</label>
            <input type="text" name="color"
                class="w-full p-3 rounded-md bg-gray-800 border border-gray-600 focus:outline-none focus:ring-2 focus:ring-[#FFD700]">
        </div>

        <!-- Height -->
        <div>
            <label class="block text-sm font-semibold mb-2">HEIGHT:</label>
            <input type="text" name="height"
                class="w-full p-3 rounded-md bg-gray-800 border border-gray-600 focus:outline-none focus:ring-2 focus:ring-[#FFD700]">
        </div>

        <!-- Date of Birth -->
        <div>
            <label class="block text-sm font-semibold mb-2">DATE OF BIRTH:</label>
            <input type="date" name="dob"
                class="w-full p-3 rounded-md bg-gray-800 border border-gray-600 focus:outline-none focus:ring-2 focus:ring-[#FFD700]">
        </div>

        <!-- Contact Number -->
        <div>
            <label class="block text-sm font-semibold mb-2">CONTACT NUMBER:</label>
            <input type="tel" name="contact_number"
                class="w-full p-3 rounded-md bg-gray-800 border border-gray-600 focus:outline-none focus:ring-2 focus:ring-[#FFD700]">
        </div>

        <!-- Facebook Name -->
        <div>
            <label class="block text-sm font-semibold mb-2">FACEBOOK NAME:</label>
            <input type="text" name="facebook_name"
                class="w-full p-3 rounded-md bg-gray-800 border border-gray-600 focus:outline-none focus:ring-2 focus:ring-[#FFD700]">
        </div>

        <!-- IG Name -->
        <div>
            <label class="block text-sm font-semibold mb-2">IG NAME:</label>
            <input type="text" name="ig_name"
                class="w-full p-3 rounded-md bg-gray-800 border border-gray-600 focus:outline-none focus:ring-2 focus:ring-[#FFD700]">
        </div>

        <!-- Type (Dropdown) -->
        <div class="md:col-span-2">
            <label class="block text-sm font-semibold mb-2">TYPE:</label>
            <select name="type" id="type" class="w-full p-3 rounded-md bg-gray-800 border border-gray-600 text-white">
                <option value="REGULAR">REGULAR</option>
                <option value="EXCLUSIVE">EXCLUSIVE</option>
            </select>
        </div>

        <!-- Submit Button -->
        <div class="md:col-span-2 text-right">
            <button type="submit"
                class="bg-[#FFD700] text-black font-bold py-3 px-6 rounded-md shadow hover:bg-yellow-400 transition">
                Register
            </button>
        </div>
    </form>
</div>


<?php include "../src/components/admin/footer.php";?>

<script src="../static/js/admin/registration.js"></script>