<div class="row">
    <div
    id="myChart" style="width:100%; max-width:600px; height:500px;">
    </div>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script>
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
    var data = google.visualization.arrayToDataTable([
    ['Loại', 'Số lượng sản phẩm'],
    <?php
        $tongloai=count($listthongke);
        $i=1;
        foreach ($listthongke as $thongke) {
            extract($thongke);
            if($i==$tongloai) $dauphay=""; else $dauphay=",";
            echo "['".$thongke['tenloai']."',".$thongke['countsp']."]".$dauphay;
            $i+=1;
        }
    ?>
    ]);

    var options = {
    title:'World Wide Wine Production'
    };

    var chart = new google.visualization.PieChart(document.getElementById('myChart'));
    chart.draw(data, options);
    }
    </script>
</div>