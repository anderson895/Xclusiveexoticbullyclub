$(document).ready(function () {
    $.ajax({
        url: "controller/admin/end-points/controller.php",
        method: "GET",
        data: { requestType: "fetch_all_gettable" },
        dataType: "json",
        success: function (res) {
            const grid = $('#gettableGrid');
            const header = $('#gettableHeader');
            grid.empty(); // Clear previous data

            if (res.status === 200 && res.data.length > 0) {
                header.show(); // Show the heading if there's data

                res.data.forEach((gettable, i) => {
                    const fullDesc = gettable.gt_description;
                    const shortDesc = fullDesc.length > 60 ? fullDesc.substring(0, 60) + '...' : fullDesc;
                    const showViewMore = fullDesc.length > 60;

                    const card = $(`
                        <div class="bg-[#1A1A1A] border border-[#333] rounded-xl p-4 shadow-sm transform scale-95 opacity-0 transition-all duration-500 hover:shadow-2xl hover:scale-100 cursor-pointer">
                            <img src="static/upload/${gettable.gt_image}" alt="${gettable.gt_name}" class="w-full h-48 object-cover rounded-lg mb-4">
                            <h3 class="text-lg font-semibold text-white">${gettable.gt_name}</h3>
                            <p class="text-sm text-[#AAAAAA] mb-2 description">${shortDesc}</p>
                            ${showViewMore ? `<button class="text-yellow-400 text-xs underline view-more-btn mb-3" data-full="${fullDesc.replace(/"/g, '&quot;')}">View More</button>` : ''}
                            <button
                                class="bg-[#FFD700] text-black px-4 py-2 rounded hover:bg-yellow-400 text-sm font-semibold view-btn transition"
                                data-link="${gettable.gt_link}">
                                Visit Link
                            </button>
                        </div>
                    `);

                    grid.append(card);
                    setTimeout(() => card.removeClass('opacity-0 scale-95'), i * 100);
                });
            } else {
                header.hide(); // Hide the heading if no data
                grid.html(`
                    <div class="text-gray-400 text-center col-span-full mt-20">
                        <h2 class="text-2xl font-bold mb-2">No data available at the moment</h2>
                        <p class="italic">Please check back later for updates.</p>
                    </div>
                `);
            }
        },
        error: function () {
            $('#gettableGrid').html(`
                <p class="text-center text-red-500 col-span-full mt-10">
                    Failed to load data.
                </p>
            `);
        }
    });

    // Handle link clicks
    $(document).on('click', '.view-btn', function () {
        const link = $(this).data('link');
        if (link) {
            window.open(link, '_blank');
        } else {
            alert("No link available.");
        }
    });

    // Handle 'View More' click to show full description
    $(document).on('click', '.view-more-btn', function () {
        const fullText = $(this).data('full');
        const descPara = $(this).siblings('.description');

        descPara.text(fullText);
        $(this).remove(); // remove 'View More' button after expanding
    });
});
