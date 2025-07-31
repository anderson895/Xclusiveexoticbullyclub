$(document).ready(function () {
  $.ajax({
    url: "controller/admin/end-points/controller.php",
    method: "GET",
    data: { requestType: "fetch_top_10_exclusive" },
    dataType: "json",
    success: function (response) {
      if (response.status === 200 && response.data.length > 0) {
        const slider = $("#bullySlider");
        slider.empty(); 

        response.data.forEach((dog, index) => {
          const card = `
            <div class="swiper-slide bg-[#2B2B2B] p-6 rounded-xl border border-[#333] w-72 shadow-lg relative text-center">
              <!-- Rank -->
              <div class="absolute top-3 right-3 bg-[#FFD700] text-black text-xs font-semibold px-2 py-1 rounded-full flex items-center gap-1 z-10 shadow">
                <span class="material-icons text-sm text-black">emoji_events</span> Xclusive
              </div>

              <!-- Dog Image -->
              <img src="static/upload/${dog.dog_image}" alt="${dog.dog_name}" class="w-full h-40 object-cover rounded-lg mb-4" />

              <!-- Dog Details -->
              <h3 class="text-xl font-bold text-[#FFD700] mb-1">${dog.dog_name}</h3>
              <p class="text-[#CCCCCC] text-sm mb-1">Breeder: ${dog.dog_breeder_name}</p>
              <p class="text-[#CCCCCC] text-sm mb-1">Owner: ${dog.dog_owner_name}</p>
              <p class="text-[#CCCCCC] text-sm">XEBC No: ${dog.dog_code}</p>
            </div>
          `;
          slider.append(card);
        });

        // Initialize Swiper after DOM update
        new Swiper(".mySwiper", {
          loop: true,
          slidesPerView: 1.2,
          spaceBetween: 20,
          breakpoints: {
            640: { slidesPerView: 1.5 },
            768: { slidesPerView: 2.5 },
            1024: { slidesPerView: 3 },
          },
          autoplay: {
            delay: 2500,
            disableOnInteraction: false,
          },
        });
      } else {
        console.error("No exclusive dogs found or bad response.");
      }
    },
    error: function (xhr, status, error) {
      console.error("AJAX Error:", status, error);
    }
  });
});