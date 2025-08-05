$(document).ready(function () {
  const stats = {
    registered: 150,
    events: 32,
    gettable: 120,
    notRegistered: 18
  };

  $('#totalRegistered').text(stats.registered);
  $('#totalEvents').text(stats.events);
  $('#totalGettable').text(stats.gettable);
  $('#totalNotRegistered').text(stats.notRegistered);

  const options = {
    chart: {
      type: 'bar',
      height: 300,
      background: '#1A1A1A',
      foreColor: '#CCCCCC'
    },
    series: [{
      name: 'Count',
      data: [stats.registered, stats.events, stats.gettable, stats.notRegistered]
    }],
    xaxis: {
      categories: ['Registered', 'Events', 'Gettable', 'Not Registered'],
      labels: {
        style: { colors: '#CCCCCC' }
      }
    },
    yaxis: {
      labels: {
        style: { colors: '#CCCCCC' }
      }
    },
    colors: ['#FFD700', '#4ADE80', '#818CF8', '#EF4444'],
    grid: {
      borderColor: '#333'
    },
    tooltip: {
      theme: 'dark'
    }
  };

  const chart = new ApexCharts(document.querySelector("#dashboardChart"), options);
  chart.render();
});
