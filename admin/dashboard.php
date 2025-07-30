<?php
include "../src/components/admin/header.php";
include "../src/components/admin/nav.php";
?>

<!-- Top Bar -->
<div class="flex justify-between items-center bg-[#0D0D0D] p-4 mb-6 rounded-md shadow-lg">
    <h2 class="text-xl font-bold text-[#FFD700] uppercase tracking-wide">Dashboard</h2>
    <div class="w-10 h-10 bg-gray-600 rounded-full flex items-center justify-center text-white font-bold shadow-md">
        <?php echo strtoupper(substr($_SESSION['admin_fullname'], 0, 1)); ?>
    </div>
</div>

<?php
include "../src/components/admin/footer.php";
?>
