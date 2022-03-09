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
        table{
            font-size:12px;
            border-collapse:collapse;
        }
        .btn{
        margin-top:20px;
        width:75px;
        height:32px;
        background-color:#418bca;
        color:white;
        border:1px solid #418bca;
        border-radius:3px;
        cursor:pointer;
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
            <a class="collapse-item" href="function1.php">History Number</a>
            <a class="collapse-item" href="function2.php">Check Number</a>
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
          <div class="row">
            </div>
          </div>
        </div>
        <!-- /.container-fluid -->
      </div>
      <div style='width:800px'>
        <div style='margin-bottom:20px'>1. Choose 12 to 16 of your numbers.</div>
        <table border=1 align=center width=100% bordercolor=#608ec0 style='background-color:#f9f9f9;margin-top:15px;font-size:14px'>
            <?php echo $str; ?>
        </table>
        <div id="current_lotto_number" style='margin-top:20px'>2. Confirm your numbers. You have not selected any number.</div>
        <div id="summary_lotto_number" style='margin-top:20px'></div>
        <input type=submit id=generate name=generate class=btn value="Generate">
        <input type=submit id=clear name=clear class=btn style="margin-left:10px" value="Clear">
        <pre style="font-size:16px"><div id=result style='margin-top:20px'></div></pre>
    </div>

    <figure class="highcharts-figure">
        <div id="container"></div>
    </figure>

    <script>
        choose_num_string="";
        check_number_count=0;
        display_number_string="";
        $("input[name='generate']").mouseenter(function(){
            $(this).css({"background-color":"#346fa1"});
        });
        $("input[name='generate']").mouseleave(function(){
            $(this).css({"background-color":"#418bca"});
        });
        $("td[class^='lotto']").click(function(){
            choose_num_count=0;
            this_num=$(this).text();
            if (check_number_count==16 && $(this).css("background-color").match(/0, 0, 0, 0/)){
            message("You can only select 16 numbers.");
            }else{
                if ($(this).css("background-color").match(/177, 203, 216/)){
                    $(this).css({"background-color":"#f9f9f9","color":"#000000"});
                    choose_num_string=choose_num_string.replace("|"+this_num+", ","");
                }else{
                    $(this).css({"background-color":"#b1cbd8","color":"#ffffff"});
                    choose_num_string+="|"+this_num+", ";
                }
            }
            $("td[class^='lotto']").each(function(){
                if ($(this).css("background-color").match(/177, 203, 216/)){
                    choose_num_count++;
                }
            });   
            check_number_count=choose_num_count;
            if (choose_num_count==0){
                $("#current_lotto_number").html("2. Confirm your numbers. You have not selected any number.");
            }else{
                $("#current_lotto_number").html("Confirm your numbers. You have selected "+choose_num_count+" number.");
            }
            tmp=choose_num_string.replace(/\|/g, "");
            display_number_string=tmp.substr(0,tmp.length-2); 
            $("#summary_lotto_number").html(display_number_string);
        });

        $("#generate").click(function(){
            if (check_number_count<12){
            message("Please select 12 to 16 numbers.");
            }else{
                $("#result").load("result.php",{'num':display_number_string});
            }
        });
        $("#clear").click(function(){
            choose_num_string="";
            check_number_count=0;
            display_number_string="";
            $("td[class^='lotto']").css({"background-color":"#f9f9f9","color":"#000000"});
            $("#current_lotto_number").html("2. Confirm your numbers. You have not selected any number.");
            $("#summary_lotto_number").html("");
            $("#result").html("");
        });
        function message(message){
            Swal.fire({
                width: 600,
                type: 'warning',
                background: 'rgb(36, 49, 52)',
                allowOutsideClick: false,
                allowEscapeKey: false,
                allowEnterKey: false,
                confirmButtonText: '確定',
                cancelButtonText: '取消',
                title: "<div style='width:470px;font-size:18px;font-weight:bold;color:rgba(255,255,255,.9)'>"+message+"</div>",
            }).then((result)=>{
                if (result.value){
                }
            });
        }
    </script>
      <?php
        error_reporting(0); 
        $max=49;
        for($i=1;$i<=$max;$i++){
            if ($i%10==1){
                $str.="<tr align=center style='height:50px'>
                           <td class=lotto$i style='width:10%;cursor:pointer'>$i</td>";
            }elseif($i%10==0){
                $str.="<td class=lotto$i style='width:10%;cursor:pointer'>$i</td>
                       </tr>";
            }else{
                $str.="<td class=lotto$i style='width:10%;cursor:pointer'>$i</td>";
            }
        }
        if ($max%10!=0){
            for ($j=1;$j<=(10-$max%10);$j++){
                $str.="<td style='border:1px solid transparent;width:10%;background-color:#ffffff'></td>
                   </tr>";
            }
        }
    ?>
    
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
