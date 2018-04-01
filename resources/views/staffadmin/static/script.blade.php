  <!-- Essential javascripts for application to work-->
    <script src="{{ asset('js/staffAdminJs/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('js/staffAdminJs/popper.min.js') }}"></script>
    <script src="{{ asset('js/staffAdminJs/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/staffAdminJs/main.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/staffAdminJs/bootstrap-datepicker.min.js') }}"></script>

    <!-- The javascript plugin to display page loading on top-->
    <script src="{{ asset('js/staffAdminJs/plugin/pace.min.js') }}"></script>
    <!-- Page specific javascripts-->
    <script type="text/javascript" src="{{ asset('js/staffAdminJs/plugin/chart.js') }}"></script>
    <!-- Page specific javascripts-->
    <script type="text/javascript">
    var data = {
      labels: ["January", "February", "March", "April", "May","June"],
      datasets: [
        {
          label: "My Second dataset",
          fillColor: "rgba(151,187,205,0.2)",
          strokeColor: "rgba(151,187,205,1)",
          pointColor: "rgba(151,187,205,1)",
          pointStrokeColor: "#fff",
          pointHighlightFill: "#fff",
          pointHighlightStroke: "rgba(151,187,205,1)",
          data: [2, 4, 3, 9, 6,5]
        }
      ]
    };

    var ctxb = $("#barChartDemo").get(0).getContext("2d");
    var barChart = new Chart(ctxb).Bar(data);

    $('#demoDate').datepicker({
      format: "dd/mm/yyyy",
      autoclose: true,
      todayHighlight: true
    });

    </script>
