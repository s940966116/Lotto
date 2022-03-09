<!DOCTYPE html>
<html>
<head>
    <title>Lotto</title>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.min.css" rel="stylesheet">
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
    <script src="https://code.highcharts.com/modules/series-label.js"></script>

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
<body>
    <?php 
        echo '<a href="./main.php" style="text-decoration:none;color:red;">回到主畫面</a><br>';
    ?>
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
    <BR><BR>
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
</body>
</html>
