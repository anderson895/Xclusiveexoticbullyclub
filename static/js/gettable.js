$(document).ready(function () {
    $.ajax({
        url: "controller/admin/end-points/controller.php",
        method: "GET",
        data: { requestType: "fetch_all_gettable" },
        dataType: "json",
        success: function (res) {
            const grid = $('#gettableGrid');
            const header = $('#gettableHeader');
            grid.empty();

            if (res.status === 200 && res.data.length > 0) {
                header.show();

                res.data.forEach((gettable, i) => {
                    const fullDescription = gettable.gt_description;
                    const isLong = fullDescription.length > 60;
                    const shortDescription = isLong ? fullDescription.substring(0, 60) + "..." : fullDescription;

                    const card = $(`
                        <div class="bg-[#1A1A1A] border border-[#333] rounded-xl p-4 shadow-sm transform scale-95 opacity-0 transition-all duration-500 hover:shadow-2xl hover:scale-100 cursor-pointer">
                            <img src="static/upload/${gettable.gt_image}" alt="${gettable.gt_name}" class="w-full h-48 object-cover rounded-lg mb-4">
                            <h3 class="text-lg font-semibold text-white">${gettable.gt_name}</h3>
                            <p class="text-sm text-[#AAAAAA] mb-3 description" data-full="${fullDescription}">
                                ${shortDescription}
                                ${isLong ? '<span class="toggle-view text-blue-400 cursor-pointer underline ml-1">View More</span>' : ''}
                            </p>
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
                header.hide();
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

    // Handle external link
    $(document).on('click', '.view-btn', function () {
        const link = $(this).data('link');
        if (link) {
            window.open(link, '_blank');
        } else {
            alert("No link available.");
        }
    });

    // Toggle full description
    $(document).on('click', '.toggle-view', function () {
        const desc = $(this).closest('.description');
        const fullText = desc.data('full');
        const isExpanded = $(this).text() === 'View Less';

        if (isExpanded) {
            const short = fullText.substring(0, 60) + '...';
            desc.html(`${short} <span class="toggle-view text-blue-400 cursor-pointer underline ml-1">View More</span>`);
        } else {
            desc.html(`${fullText} <span class="toggle-view text-blue-400 cursor-pointer underline ml-1">View Less</span>`);
        }
    });
});
