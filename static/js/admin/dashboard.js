$(document).ready(function () {
  $.ajax({
    url: "../controller/admin/end-points/controller.php",
    method: "GET",
    data: { requestType: "getDataAnalytics" },
    dataType: "text",
    success: function (res) {
      const parts = res.trim().split('}{').map((part, index, arr) => {
        if (arr.length > 1) {
          if (index === 0) return part + '}';
          if (index === arr.length - 1) return '{' + part;
          return '{' + part + '}';
        }
        return part;
      });

      let analyticsData = {};
      let statusData = {};

      try {
        analyticsData = JSON.parse(parts[0]);
        if (parts.length > 1) statusData = JSON.parse(parts[1]);
      } catch (e) {
        console.error("JSON Parse Error:", e);
        return;
      }

      if (statusData.status === 200) {
        // Update summary cards
        $('#totalExclusive').text(analyticsData.totalExclusive);
        $('#totalRegular').text(analyticsData.totalRegular);
        $('#totalRegistered').text(analyticsData.totalRegistered);
        $('#totalNotRegistered').text(analyticsData.totalNotRegistered);
        $('#totalGettable').text(analyticsData.totalGettable);
        $('#totalEvents').text(analyticsData.totalEvents);

        // Prepare chart data
        const stats = {
          totalExclusive: parseInt(analyticsData.totalExclusive),
          totalRegular: parseInt(analyticsData.totalRegular),
          totalRegistered: parseInt(analyticsData.totalRegistered),
          totalNotRegistered: parseInt(analyticsData.totalNotRegistered),
          totalGettable: parseInt(analyticsData.totalGettable),
          totalEvents: parseInt(analyticsData.totalEvents)
        };

        const options = {
          chart: {
            type: 'bar',
            height: 300,
            background: '#1A1A1A',
            foreColor: '#CCCCCC'
          },
          series: [{
            name: 'Count',
            data: [
              stats.totalExclusive,
              stats.totalRegular,
              stats.totalRegistered,
              stats.totalNotRegistered,
              stats.totalGettable,
              stats.totalEvents
            ]
          }],
          xaxis: {
            categories: [
              'Exclusive',
              'Regular',
              'Registered',
              'Not Registered',
              'Gettable',
              'Events'
            ],
            labels: {
              style: { colors: '#CCCCCC' }
            }
          },
          yaxis: {
            labels: {
              style: { colors: '#CCCCCC' }
            }
          },
          colors: ['#FFD700', '#00BFFF', '#4ADE80', '#EF4444', '#818CF8', '#FFA500'],
          grid: {
            borderColor: '#333'
          },
          tooltip: {
            theme: 'dark'
          }
        };

        const chart = new ApexCharts(document.querySelector("#dashboardChart"), options);
        chart.render();
      }
    },
    error: function (xhr, status, error) {
      console.error("AJAX error:", error);
    }
  });
});
