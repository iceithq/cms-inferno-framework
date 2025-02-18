<h3>My home
  <span class="pull-right">
    <?php echo anchor('blog/home', 'Visit site', 'target="_blank" class="btn btn-primary"'); ?>
  </span>
</h3>
<p>Your central hub for taking the next steps, accessing our support center, and navigating through quick links.</p>

<h4>Views</h4>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<figure class="highcharts-figure">
  <div id="container"></div>
  <p class="highcharts-description">
    A basic column chart comparing estimated corn and wheat production
    in some countries.
    The chart is making use of the axis crosshair feature, to highlight
    the hovered country.
  </p>
</figure>
<script>
  Highcharts.chart('container', {
    chart: {
      type: 'column'
    },
    title: {
      // text: 'Corn vs wheat estimated production for 2020',
      text: 'View Statistics',
      // align: 'left'
    },
    // subtitle: {
    //     text:
    //         'Source: <a target="_blank" ' +
    //         'href="https://www.indexmundi.com/agriculture/?commodity=corn">indexmundi</a>',
    //     align: 'left'
    // },
    xAxis: {
      // categories: ['USA', 'China', 'Brazil', 'EU', 'India', 'Russia'],
      categories: <?php echo json_encode($column_chart_categories); ?>, //['Mar 20', 'Mar 21', 'Mar 22', 'Mar 23', 'Mar 24', 'Mar 25', 'Mar 26'],
      crosshair: true,
      // accessibility: {
      //     description: 'Countries'
      // }
    },
    yAxis: {
      min: 0,
      title: {
        // text: '1000 metric tons (MT)'
        text: 'Views',
      }
    },
    // tooltip: {
    //     valueSuffix: ' (1000 MT)'
    // },
    plotOptions: {
      column: {
        pointPadding: 0.2,
        borderWidth: 0
      }
    },
    series: [{
        name: 'Views',
        data: <?php echo json_encode($column_chart_data); ?>, //[406292, 260000, 107000, 68300, 27500, 14500]
      },
      // {
      //     name: 'Wheat',
      //     data: [51086, 136000, 5500, 141000, 107180, 77000]
      // }
    ]
  });
</script>

<h4>Quick links</h4>
<ul>
  <li>
    <?php echo anchor('blog/posts/add', '📝 Write a blog post'); ?>
  </li>
  <li>
    <?php echo anchor('blog/pages/add', '📄 Add a page'); ?>
  </li>
  <li>
    <?php echo anchor('blog/uploads/add', '📷 Upload media'); ?>
  </li>
</ul>