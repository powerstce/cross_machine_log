      google.charts.load('current', {'packages':['corechart', 'bar']});
      google.charts.setOnLoadCallback(drawStuff);

      function drawStuff() {

        var button = document.getElementById('change-chart');
        var chartDiv = document.getElementById('chart_div');

        var data = google.visualization.arrayToDataTable([
          ['Galaxy', 'Distance', 'Distance Old', 'Brightness', 'Brightness Old'],
          ['Canis Major Dwarf', 8000, 16000, 23.3, 20.3],
          ['Sagittarius Dwarf', 24000, 48000,4.5, 1.5],
          ['Ursa Major II Dwarf', 30000, 60000,14.3, 11.3],
          ['Lg. Magellanic Cloud', 50000, 100000, 0.9, 0.1],
          ['Bootes I', 60000, 120000, 13.1, 10.1]
        ]);

        var materialOptions = {
          width: 900,
          chart: {
            title: 'Nearby galaxies',
            subtitle: 'distance on the left, brightness on the right'
          },
          series: {
            0: { axis: 'actual' }, // Bind series 0 to an axis named 'distance'.
            1: { axis: 'old' },
            2: { axis: 'actual' }, // Bind series 1 to an axis named 'brightness'.
            3: { axis: 'old' },
          },
          axes: {
            y: {
              actual: {label: 'actual data'}, // Left y-axis.
              old: {side: 'right', label: 'old data'} // Right y-axis.
            }
          },
          stacked: true
        };

        var classicOptions = {
          width: 900,
          series: {
            0: {targetAxisIndex: 0},
            1: {targetAxisIndex: 1}
          },
          title: 'Nearby galaxies - distance on the left, brightness on the right',
          vAxes: {
            // Adds titles to each axis.
            0: {title: 'parsecs'},
            1: {title: 'apparent magnitude'}
          }
        };

        function drawMaterialChart() {
          var materialChart = new google.charts.Bar(chartDiv);
          materialChart.draw(data, google.charts.Bar.convertOptions(materialOptions));
          button.innerText = 'Change to Classic';
          button.onclick = drawClassicChart;
        }

        function drawClassicChart() {
          var classicChart = new google.visualization.ColumnChart(chartDiv);
          classicChart.draw(data, classicOptions);
          button.innerText = 'Change to Material';
          button.onclick = drawMaterialChart;
        }

        drawClassicChart();
    };
