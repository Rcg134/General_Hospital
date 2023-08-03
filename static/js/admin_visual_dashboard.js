/** @format */

$(function () {
  getichart("../PHP/HospitalappController/admin_chart_dashboard_get.php","chart");
  getdoctorperformanceichart("../PHP/HospitalappController/admin_chart_doctor_performance_get.php","DoctorPerformanceChart");
});

function ichart(day, count,iid) {
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

  var chart = new ApexCharts(document.querySelector("#" + iid), data);

  chart.render();
}



function idoctorperformancechart(Doctor, count,iid) {
  var data = {
    chart: {
      type: "bar",
    },
    series: [
      {
        name: "Doctor Performance",
        data: count,
      },
    ],
    xaxis: {
      categories: Doctor,
    },
  };

  var chart = new ApexCharts(document.querySelector("#" + iid), data);

  chart.render();
}


function getichart(PHP,iid) {
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
      ichart(arrday, arrcount, iid);
    },
    error: function (xhr, ajaxOptions, thrownError) {
      showerror(thrownError);
    },
  });
}




function getdoctorperformanceichart(PHP, iid) {
  $.ajax({
    url: PHP,
    type: "get",
    contentType: false,
    processData: false,
    cache: false,
    success: function (dataResult) {
      let chartData = JSON.parse(dataResult);
      let arrdoctor = [];
      let arrcount = [];
      chartData.forEach((element) => {
        arrdoctor.push(element[0]);
        arrcount.push(element[1]);
      });
      idoctorperformancechart(arrdoctor, arrcount, iid);
    },
    error: function (xhr, ajaxOptions, thrownError) {
      showerror(thrownError);
    },
  });
}
