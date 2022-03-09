<!DOCTYPE html>
<html lang="en">

<head>
  <title>Frequency Chart</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.min.js"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.min.css" rel="stylesheet">
  <script src="https://code.highcharts.com/highcharts.js"></script>
  <script src="https://code.highcharts.com/modules/exporting.js"></script>
  <script src="https://code.highcharts.com/modules/export-data.js"></script>
  <script src="https://code.highcharts.com/modules/accessibility.js"></script>
  <script src="https://code.highcharts.com/modules/series-label.js"></script>
  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <style>
        .highcharts-figure, .highcharts-data-table table {
            width: 800px; 
            margin-left:0px;
        }

        #container {
            height: 400px;
        }

        .highcharts-data-table table {
            font-family: Verdana, sans-serif;
            border-collapse: collapse;
            border: 1px solid #EBEBEB;
            margin: 10px auto;
            text-align: center;
            width: 100%;
            max-width: 500px;
        }
        .highcharts-data-table caption {
            padding: 1em 0;
            font-size: 1.2em;
            color: #555;
        }
        .highcharts-data-table th {
            font-weight: 600;
            padding: 0.5em;
        }
        .highcharts-data-table td, .highcharts-data-table th, .highcharts-data-table caption {
            padding: 0.5em;
        }
        .highcharts-data-table thead tr, .highcharts-data-table tr:nth-child(even) {
            background: #f8f8f8;
        }
        .highcharts-data-table tr:hover {
            background: #f1f7ff;
        }      
    </style>
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="index.html">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Main Page</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Interface
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-cog"></i>
          <span>Functions</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Custom Functions:</h6>
            <a class="collapse-item" href="buttons.html">History Number</a>
            <a class="collapse-item" href="cards.html">Check Number</a>
            <a class="collapse-item" href="function3.php">Select Number</a>
          </div>
        </div>
      </li>
      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Chart
      </div>



      <!-- Nav Item - Charts -->
      <li class="nav-item">
        <a class="nav-link" href="chart.php">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Frequecy Charts</span></a>
      </li>
      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">


        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800" style="font-size: 40px">Frequency Chart</h1>
          </div>
          <!-- Content Row -->

          <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-8 col-lg-7">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <figure class="highcharts-figure">
                  <div id="container"></div>
                </figure>
                <script>
                      function highcharsinit(){
                          Highcharts.chart('container', {
                              chart: {
                                  type: 'column'
                              },
                              title: {
                                  text: 'Number Frequency Chart'
                              },
                              xAxis: {
                                  categories: new_number,
                                  crosshair: true
                              },
                              yAxis: {
                                  title: {
                                      text: 'The number of occurrences'
                                  }
                              },
                              tooltip: {
                                  headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                                  pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                                      '<td style="padding:0"><b>{point.y:.0f} times</b></td></tr>',
                                  footerFormat: '</table>',
                                  shared: true,
                                  useHTML: true
                              },
                              plotOptions: {
                                  column: {
                                      pointPadding: 0.2,
                                      borderWidth: 0
                                  }
                              },
                              series: [{
                                  name: 'occurrences',
                                  data: ocurrences
                              }]
                          });
                      }
                      $(document).ready(function() {
                          $.ajax({                                      
                              url: 'result1.php',//連接的URL   
                              data: "{}",//夾帶的參數
                              dataType: 'json', //資料格式 
                              success: function(data) //傳送成功的function
                                  {   
                                      
                                      numbers1 = [];
                                      ocurrences =[];
                                      percentage = [];
                                      
                                      for (var i =  0; i < data.length; i++)
                                      {
                                          numbers1.push({y:parseInt(data[i][0])});
                                          ocurrences.push({y:parseInt(data[i][1])});
                                          percentage.push({y:parseFloat(data[i][2])});
                                      }
                                      new_number = [];
                                      for($i = 0; $i < numbers1.length; $i++){
                                          new_number[$i] = numbers1[$i].y
                                      }
                                      console.log(new_number);
                                      highcharsinit();
                                  } //success end
                          }); //ajax end
                      });
                  </script>
              </div>
            </div>
          </div>

          <!-- Content Row -->
          <div class="row">
            </div>
          </div>
        </div>
        <!-- /.container-fluid -->
      </div>
      <!-- End of Main Content -->
    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>
