<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Xclusive Exotic Bully Club</title>
  <link rel="icon" type="image/x-icon" href="static/favicon.ico">
  <link href="./src/output.css" rel="stylesheet" />

  <!-- Google Fonts: Poppins -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

      <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

</head>
<body class="bg-[#0D0D0D] text-white font-[Poppins]">



<header class="bg-[#1A1A1A] border-b border-[#333] relative">
  <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between relative">
    <!-- Logo Section -->
    <div class="flex items-center space-x-3 z-10">
      <img src="static/logo.jpg" alt="Logo" class="w-10 h-10 rounded-full border border-gray-700" />
      <span class="text-[#FFD700] text-xl font-bold">XEBC</span>
    </div>

    <!-- Hamburger Button -->
    <button id="menuToggle" class="md:hidden z-10 text-[#FFD700] focus:outline-none">
      <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2"
        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
        <path stroke-linecap="round" stroke-linejoin="round"
          d="M4 6h16M4 12h16M4 18h16"></path>
      </svg>
    </button>

    <!-- Desktop Nav -->
    <nav class="absolute left-1/2 transform -translate-x-1/2 space-x-6 hidden md:flex">
      <a href="index" class="text-[#CCCCCC] hover:text-white">Home</a>
      <a href="registration" class="text-[#CCCCCC] hover:text-white">Registration</a>
      <a href="standard" class="text-[#CCCCCC] hover:text-white">Standard</a>
      <a href="events" class="text-[#CCCCCC] hover:text-white">Events</a>
      <!-- <a href="gettable" class="text-[#CCCCCC] hover:text-white">Gettable</a>
      <a href="pointchart" class="text-[#CCCCCC] hover:text-white">Points Chart</a> -->
    </nav>
  </div>

  <!-- Mobile Nav -->
  <nav id="mobileMenu" class="md:hidden px-6 pb-4 space-y-2 hidden bg-[#1A1A1A]">
    <a href="index" class="block text-[#CCCCCC] hover:text-yellow-400 active:text-yellow-400 focus:text-yellow-400 transition-colors duration-200">Home</a>
    <a href="registration" class="block text-[#CCCCCC] hover:text-yellow-400 active:text-yellow-400 focus:text-yellow-400 transition-colors duration-200">Registration</a>
    <a href="standard" class="block text-[#CCCCCC] hover:text-yellow-400 active:text-yellow-400 focus:text-yellow-400 transition-colors duration-200">Standard</a>
    <a href="events" class="block text-[#CCCCCC] hover:text-yellow-400 active:text-yellow-400 focus:text-yellow-400 transition-colors duration-200">Events</a>
    <!-- <a href="gettable" class="block text-[#CCCCCC] hover:text-yellow-400 active:text-yellow-400 focus:text-yellow-400 transition-colors duration-200">Gettable</a>
    <a href="pointchart" class="block text-[#CCCCCC] hover:text-yellow-400 active:text-yellow-400 focus:text-yellow-400 transition-colors duration-200">Points Chart</a> -->
  </nav>

</header>

<script>
  document.getElementById('menuToggle').addEventListener('click', function () {
    const menu = document.getElementById('mobileMenu');
    menu.classList.toggle('hidden');
  });
</script>



<?php include "plugins/PageSpinner.php"; ?>