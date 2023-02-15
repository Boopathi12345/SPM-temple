demo();
function demo() {
    $.ajax({
        type: "get",
        url: "/api/DashboardChart",
        success: function(data) {
          //  console.log(data);
       var full_data=data[0];
    let cardColor, headingColor, axisColor, borderColor, shadeColor;
  
    if (isDarkStyle) {
      cardColor = config.colors_dark.cardColor;
      headingColor = config.colors_dark.headingColor;
      axisColor = config.colors_dark.axisColor;
      borderColor = config.colors_dark.borderColor;
      shadeColor = 'dark';
    } else {
      cardColor = config.colors.white;
      headingColor = config.colors.headingColor;
      axisColor = config.colors.axisColor;
      borderColor = config.colors.borderColor;
      shadeColor = 'light';
    }
  
   
    // Analytics - Bar Chart
    // --------------------------------------------------------------------
    const analyticsBarChartEl = document.querySelector('#analyticsBarChart'),
      analyticsBarChartConfig = {
        chart: {
          height: 450,
          type: 'bar',
          toolbar: {
            show: false
          }
        },
        plotOptions: {
          bar: {
            horizontal: false,
            columnWidth: '20%',
            borderRadius: 3,
            startingShape: 'rounded'
          }
        },
        dataLabels: {
          enabled: false
        },
        colors: [config.colors.success, config.colors.primary,config.colors.warning],
        series: [
          {
            name: 'Payment',
            data: full_data["payment"],
          },
          {
            name: 'Expenses',
            data: full_data["expenses"]
          },
          {
            name: 'Remaining',
            data: full_data["total"]
          }
        ],
        grid: {
          borderColor: borderColor,
          padding: {
            bottom: -8
          }
        },
        xaxis: {
          categories: full_data["months"],
          axisBorder: {
            show: false
          },
          axisTicks: {
            show: false
          },
          labels: {
            style: {
              colors: axisColor
            }
          }
        },
        yaxis: {
         
          labels: {
            style: {
              colors: axisColor
            }
          }
        },
        legend: {
          show: true
        },
        tooltip: {
          y: {
            formatter: function (val) {
              return '<i class="bx bx-rupee"></i>' + val;
            }
          }
        }
      };
    if (typeof analyticsBarChartEl !== undefined && analyticsBarChartEl !== null) {
      const analyticsBarChart = new ApexCharts(analyticsBarChartEl, analyticsBarChartConfig);
      analyticsBarChart.render();
    }
},
});
   
  }
  DashboardCountValue(new Date().getFullYear());
  function DashboardCountValue(Value){
    $.ajax({
        type: "get",
        url: "/api/DashboardCount",
        data:{value:Value},
        success: function(data) {
          $("#payment").html(" ");
          $("#expenses").html(" ");
          $("#total_value").html(" ");
          $("#select_year").val(Value);    
          
$("#payment").append(data[0].payment);
$("#expenses").append(data[0].expenses);
$("#total_value").append(data[0].total);
        }
    });
  }