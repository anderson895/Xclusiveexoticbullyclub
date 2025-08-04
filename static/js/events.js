$(document).ready(function () {
    $.ajax({
        url: "controller/admin/end-points/controller.php",
        method: "GET",
        data: { requestType: "fetch_all_events" },
        dataType: "json",
        success: function (res) {
            if (res.status === 200) {
                const container = $(".max-w-6xl"); // target wrapper

                if (res.data.length > 0) {
                    // ✅ SORT by date ascending
                    res.data.sort((a, b) => new Date(a.event_date) - new Date(b.event_date));

                    res.data.forEach(event => {
                        const time24 = event.event_time;
                        const formattedTime = formatTo12Hour(time24);

                        const event_id = event.event_id;
                        const event_name = event.event_name;
                        const event_description = event.event_description;
                        const event_date = event.event_date;
                        const event_banner = event.event_banner;

                        // Convert date to day and month
                        const dateObj = new Date(event_date);
                        const day = dateObj.getDate();
                        const dayName = dateObj.toLocaleDateString('en-US', { weekday: 'short' }).toUpperCase();
                        const fullDate = dateObj.toLocaleDateString('en-US', { month: 'long', day: 'numeric' });

                        const bannerHTML = event_banner 
                            ? `<img src="static/upload/${event_banner}" alt="${event_name} Poster" class="w-full rounded shadow-lg" />`
                            : ``;

                        const html = `
                            <div class="flex gap-6">
                                <div class="w-20 text-center">
                                    <div class="text-sm font-bold text-white uppercase">${dayName}</div>
                                    <div class="text-3xl font-extrabold text-white">${day}</div>
                                    <div class="text-xs text-gray-400 mt-1 event_time">${formattedTime}</div>
                                </div>
                                <div class="flex-1">
                                    <div class="text-gray-400 font-semibold uppercase">${fullDate}</div>
                                    <h2 class="text-2xl font-bold mt-1 event_name">${event_name}</h2>
                                    <p class="text-sm mt-2 event_description text-gray-300 whitespace-pre-line">${event_description}</p>
                                </div>
                                <div class="md:w-1/3 mt-6 md:mt-0">
                                    ${bannerHTML}
                                </div>
                            </div>
                        `;

                        container.append(html);
                    });
                } else {
                    container.append(`
                        <div class="text-center text-gray-400 italic">
                            No events found.
                        </div>
                    `);
                }
            }
        }
    });
});

// Utility function to format time
function formatTo12Hour(time) {
    const [hour, minute] = time.split(':');
    const h = parseInt(hour);
    const ampm = h >= 12 ? 'PM' : 'AM';
    const h12 = h % 12 || 12;
    return `${h12}:${minute} ${ampm}`;
}
