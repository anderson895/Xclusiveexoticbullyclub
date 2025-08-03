<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Xclusive Exotic Bully Club</title>
  <link href="../src/output.css" rel="stylesheet" />
   <link rel="icon" type="image/x-icon" href="../static/favicon.ico">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/AlertifyJS/1.13.1/css/alertify.css" integrity="sha512-MpdEaY2YQ3EokN6lCD6bnWMl5Gwk7RjBbpKLovlrH6X+DRokrPRAF3zQJl1hZUiLXfo2e9MrOt+udOnHCAmi5w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/AlertifyJS/1.13.1/alertify.min.js" integrity="sha512-JnjG+Wt53GspUQXQhc+c4j8SBERsgJAoHeehagKHlxQN+MtCCmFDghX9/AcbkkNRZptyZU4zC8utK59M5L45Iw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  
  
  
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">



  <!-- Select2 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

  <!-- jQuery (Required by Select2) -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <!-- Select2 JS -->
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


</head>

<body class="min-h-screen bg-[#0D0D0D] flex items-center justify-center px-4 font-[Poppins]">

  <div class="w-full max-w-sm p-8 bg-[#1A1A1A] rounded-2xl shadow-lg">

  <div class="flex justify-center mb-6">
      <img src="../static/logo.jpg" alt="Logo" class="w-20 h-20 rounded-full border-2 border-gray-700" />
  </div>

  <!-- Spinner Overlay -->
  <div id="spinner" class="absolute inset-0 flex items-center justify-center z-50" style="display:none; background-color: rgba(255, 255, 255, 0.7);">
    <div class="w-12 h-12 border-4 border-blue-600 border-t-transparent rounded-full animate-spin"></div>
  </div>

    <h2 class="text-2xl font-semibold text-[#FFD700] text-center mb-6">Administrator</h2>

    <form id="frmLogin" method="POST" class="space-y-5">
      <div>
        <label for="email" class="block text-sm text-[#CCCCCC] mb-1">Email</label>
        <input
          type="email"
          id="email"
          name="email"
          required
          class="w-full px-4 py-2 bg-[#2B2B2B] text-white rounded-md border border-[#333333] focus:outline-none focus:ring-2 focus:ring-[#4B4BF9]"
        />
      </div>

      <div>
        <label for="password" class="block text-sm text-[#CCCCCC] mb-1">Password</label>
        <input
          type="password"
          id="password"
          name="password"
          required
          class="w-full px-4 py-2 bg-[#2B2B2B] text-white rounded-md border border-[#333333] focus:outline-none focus:ring-2 focus:ring-[#4B4BF9]"
        />
      </div>

      <div class="flex items-center justify-between text-sm text-[#999999]">
        <label class="flex items-center space-x-2">
          <input type="checkbox" class="form-checkbox h-4 w-4 text-blue-500 border-[#444] bg-[#2B2B2B]">
          <span>Remember me</span>
        </label>
      </div>

      <button
        type="submit"
        class="w-full bg-[#3D40FF] text-white py-2 rounded-md hover:bg-[#2F32CC] transition duration-200 font-semibold"
      >
        Sign In
      </button>
    </form>
  </div>





<?php 
include "../src/components/admin/footer.php"; 
?>


<script src="../static/js/login.js"></script>