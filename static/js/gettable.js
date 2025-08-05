$(document).ready(function () {
    $.ajax({
        url: "controller/admin/end-points/controller.php",
        method: "GET",
        data: { requestType: "fetch_all_gettable" },
        dataType: "json",
        success: function (res) {
            if (res.status === 200 && res.data.length > 0) {
                let html = '';

                res.data.forEach(gettable => {
                    html += `
                        <div class="bg-[#1A1A1A] border border-[#333] rounded-xl p-4 hover:shadow-xl transition">
                            <img src="static/upload/${gettable.gt_image}" alt="${gettable.gt_name}" class="w-full h-48 object-cover rounded-lg mb-4">
                            <h3 class="text-lg font-semibold text-white">${gettable.gt_name}</h3>
                            <p class="text-sm text-[#AAAAAA] mb-2">${gettable.gt_description}</p>
                            <div class="flex justify-between items-center">
                                <button 
                                    class="bg-[#FFD700] text-black px-4 py-1 rounded hover:bg-yellow-400 text-sm font-semibold view-btn"
                                    data-name="${gettable.gt_name}"
                                    data-description="${gettable.gt_description}"
                                    data-image="static/upload/${gettable.gt_image}"
                                    data-link="${gettable.gt_link}"
                                >
                                    View
                                </button>
                            </div>
                        </div>
                    `;
                });

                $('.grid').html(html);
            } else {
                $('.grid').html(`<p class="text-center text-[#AAAAAA] col-span-full">No data available.</p>`);
            }
        },
        error: function (xhr, status, error) {
            console.error("AJAX error:", error);
            $('.grid').html(`<p class="text-center text-red-500 col-span-full">Failed to load data.</p>`);
        }
    });

    // Open modal
    $(document).on("click", ".view-btn", function () {
        const name = $(this).data("name");
        const desc = $(this).data("description");
        const image = $(this).data("image");
        const link = $(this).data("link");

        $("#modalName").text(name);
        $("#modalDescription").text(desc);
        $("#modalImage").attr("src", image).attr("alt", name);

        if (link) {
            $("#modalLink").attr("href", link).show();
        } else {
            $("#modalLink").hide();
        }

        $("#gettableModal").removeClass("hidden").addClass("flex");
    });

    // Close modal
    $(document).on("click", "#closeModal", function () {
        $("#gettableModal").addClass("hidden").removeClass("flex");
        $("#modalLink").attr("href", "#").hide();
    });
});
