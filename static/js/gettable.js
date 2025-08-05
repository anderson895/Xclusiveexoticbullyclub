$(document).ready(function () {
    $.ajax({
        url: "controller/admin/end-points/controller.php",
        method: "GET",
        data: { requestType: "fetch_all_gettable" },
        dataType: "json",
        success: function (res) {
            const grid = $('#gettableGrid');
            grid.empty();

            if (res.status === 200 && res.data.length > 0) {
                res.data.forEach((gettable, i) => {
                    const card = $(`
                        <div class="bg-[#1A1A1A] border border-[#333] rounded-xl p-4 shadow-sm transform scale-95 opacity-0 transition-all duration-500 hover:shadow-2xl hover:scale-100 cursor-pointer">
                            <img src="static/upload/${gettable.gt_image}" alt="${gettable.gt_name}" class="w-full h-48 object-cover rounded-lg mb-4">
                            <h3 class="text-lg font-semibold text-white">${gettable.gt_name}</h3>
                            <p class="text-sm text-[#AAAAAA] mb-3">${gettable.gt_description}</p>
                            <button
                                class="bg-[#FFD700] text-black px-4 py-2 rounded hover:bg-yellow-400 text-sm font-semibold view-btn transition"
                                data-link="${gettable.gt_link}">
                                Visit Link
                            </button>
                        </div>
                    `);

                    // Append and trigger fade-in animation
                    grid.append(card);
                    setTimeout(() => card.removeClass('opacity-0 scale-95'), i * 100);
                });
            } else {
                grid.html(`<p class="text-center text-[#AAAAAA] col-span-full">No data available.</p>`);
            }
        },
        error: function () {
            $('#gettableGrid').html(`<p class="text-center text-red-500 col-span-full">Failed to load data.</p>`);
        }
    });

    // On click, open the link in a new tab
    $(document).on('click', '.view-btn', function () {
        const link = $(this).data('link');
        if (link) {
            window.open(link, '_blank');
        } else {
            alert("No link available.");
        }
    });
});