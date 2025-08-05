$(document).ready(function () {
  $.ajax({
    url: "controller/admin/end-points/controller.php",
    method: "GET",
    data: { requestType: "fetch_all_pageant_and_category" },
    dataType: "json",
    success: function (res) {
      const pageantContainer = $("#pageant-list");
      pageantContainer.empty();

      if (res.status === 200 && Array.isArray(res.data) && res.data.length > 0) {
        // Group categories by pageant ID
        const pageantMap = new Map();

        res.data.forEach(category => {
          const pageant = category.pageant;
          if (!pageantMap.has(pageant.id)) {
            pageantMap.set(pageant.id, {
              ...pageant,
              categories: []
            });
          }
          pageantMap.get(pageant.id).categories.push(category);
        });

        // Render each pageant block
        pageantMap.forEach((pageant, id) => {
          let categoryBlocks = "";

          pageant.categories.forEach(category => {
            const categoryName = category.pc_category_name;
            const contestants = category.contestants;

            // Sort by points descending
            contestants.sort((a, b) => parseInt(b.points) - parseInt(a.points));

            let contestantHTML = contestants.map(c => `
              <li class="bg-[#1A1A1A] p-4 rounded-lg border border-[#333] flex justify-between items-center">
                <span>${c.dog_name}</span>
                <span class="text-[#FFD700] font-bold">${c.points} pts</span>
              </li>
            `).join("");

            categoryBlocks += `
              <div class="mb-10">
                <h3 class="text-2xl text-white font-semibold border-l-4 border-[#FFD700] pl-4 mb-4">${categoryName}</h3>
                <ol class="space-y-2">
                  ${contestantHTML}
                </ol>
              </div>
            `;
          });

          const pageantBlock = `
            <div class="mb-20">
              <h2 class="pageant-title text-3xl text-[#FFD700] font-bold text-center uppercase mb-2">${pageant.name}</h2>
              <p class="pageant-description text-center text-[#AAAAAA] text-sm italic mb-10">${pageant.description}</p>
              ${categoryBlocks}
            </div>
          `;

          pageantContainer.append(pageantBlock);
        });

      } else {
            pageantContainer.html(`
            <div class="text-center text-gray-400 mt-20">
                <h2 class="text-2xl font-bold mb-2">No Pageants Available</h2>
                <p class="italic">Please check back later for updates.</p>
            </div>
            `);

      }
    },
    error: function (xhr, status, error) {
      console.error("AJAX Error:", status, error);
      $("#pageant-list").html(`<p class="text-center text-red-500">Failed to load data.</p>`);
    }
  });
});
