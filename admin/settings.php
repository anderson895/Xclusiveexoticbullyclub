<?php
include "../src/components/admin/header.php";
include "../src/components/admin/nav.php";
?>

<!-- Settings Form Container -->
<div class="max-w-xl mx-auto mt-10 bg-[#0D0D0D] border border-gray-700 rounded-2xl shadow-xl p-6 text-white">
  <h2 class="text-2xl font-bold text-[#FFD700] mb-6 uppercase tracking-wide text-center">Account Settings</h2>

  <form id="frmUpdateSettings" class="space-y-5">
    <input hidden type="text" id="admin_id" name="admin_id" value="<?=$On_Session[0]['admin_id']?>">
    <!-- Full Name -->
    <div>
      <label for="fullname" class="block text-sm font-medium text-gray-300 mb-1">Full Name</label>
      <input
        type="text"
        name="fullname"
        id="fullname"
        class="w-full px-4 py-2 bg-black border border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500 text-white"
        value="<?=$On_Session[0]['admin_fullname']?>"
        
      />
    </div>

    <!-- Email -->
    <div>
      <label for="email" class="block text-sm font-medium text-gray-300 mb-1">Email</label>
      <input
        type="email"
        name="email"
        id="email"
        class="w-full px-4 py-2 bg-black border border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500 text-white"
        value="<?=$On_Session[0]['admin_email']?>"
        
      />
    </div>

    <!-- Old Password -->
    <div>
      <label for="old_password" class="block text-sm font-medium text-gray-300 mb-1">Old Password</label>
      <input
        type="password"
        name="old_password"
        id="old_password"
        class="w-full px-4 py-2 bg-black border border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500 text-white"
        
      />
    </div>

    <!-- New Password -->
    <div>
      <label for="new_password" class="block text-sm font-medium text-gray-300 mb-1">New Password</label>
      <input
        type="password"
        name="new_password"
        id="new_password"
        class="w-full px-4 py-2 bg-black border border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500 text-white"
        
      />
    </div>

    <!-- Confirm Password -->
    <div>
      <label for="confirm_password" class="block text-sm font-medium text-gray-300 mb-1">Confirm Password</label>
      <input
        type="password"
        name="confirm_password"
        id="confirm_password"
        class="w-full px-4 py-2 bg-black border border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500 text-white"
        
      />
    </div>

    <!-- Submit Button -->
    <div class="pt-4">
      <button
        type="submit"
        class="w-full bg-[#FFD700] hover:bg-yellow-400 text-black font-semibold py-2 px-4 rounded-lg transition"
      >
        Save Changes
      </button>
    </div>
  </form>
</div>

<?php include "../src/components/admin/footer.php"; ?>
<script src="../static/js/admin/settings.js"></script>