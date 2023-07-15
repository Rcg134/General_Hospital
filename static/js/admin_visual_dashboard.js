/** @format */

$(function () {
  getichart("../PHP/HospitalappController/admin_chart_dashboard_get.php");
});

function ichart(day, count) {
  var data = {
    chart: {
      type: "bar",
    },
    series: [
      {
        name: "Appointments",
        data: count,
      },
    ],
    xaxis: {
      categories: day,
    },
  };

  var chart = new ApexCharts(document.querySelector("#chart"), data);

  chart.render();
}

function getichart(PHP) {
  $.ajax({
    url: PHP,
    type: "get",
    contentType: false,
    processData: false,
    cache: false,
    success: function (dataResult) {
      let chartData = JSON.parse(dataResult);
      let arrday = [];
      let arrcount = [];
      chartData.forEach((element) => {
        arrday.push(element[0]);
        arrcount.push(element[1]);
      });
      ichart(arrday, arrcount);
    },
    error: function (xhr, ajaxOptions, thrownError) {
      showerror(thrownError);
    },
  });
}
