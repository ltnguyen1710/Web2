<?php include 'components/header.php'; ?>
<?php include 'process/statistical.php'?>
<?php
if (isLoginedAdmin()) {
?>

    <body class="w3-content" style="max-width:1200px">
        <?php include 'components/nav.php'; ?>

        <div class="w3-container">
            <h5><b>Order Status</b></h5>
            <div id="pie-chart"></div>

            <h5><b>Product Quantity</b></h5>
            <div id="product-chart"></div>
        </div>
        </div>


        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">
            google.load("visualization", "1", {
                packages: ["corechart"]
            });
            google.setOnLoadCallback(drawCharts);

            function drawCharts() {

                // BEGIN PIE CHART
                var processed = <?php echo $processed ? $processed : 0; ?>;
                var nonprocessed = <?php echo $nonprocessed ? $nonprocessed : 0; ?>;
                // bill chart data
                var pieData = google.visualization.arrayToDataTable([
                    ['Order', 'Status'],
                    ['Proccessed', processed],
                    ['Non-Proccessed', nonprocessed],
                ]);
                // pie chart options
                var pieOptions = {
                    backgroundColor: 'transparent',
                    pieHole: 0.4,
                    // colors: ["cornflowerblue",
                    //     "olivedrab",
                    //     "orange",
                    //     "tomato",
                    //     "crimson",
                    //     "purple",
                    //     "turquoise",
                    //     "forestgreen",
                    //     "navy",
                    //     "gray"
                    // ],
                    pieSliceText: 'value',
                    tooltip: {
                        text: 'percentage'
                    },
                    fontName: 'Open Sans',
                    chartArea: {
                        width: '94%',
                        height: '94%',
                        left: 100
                    },
                    legend: {
                        textStyle: {
                            fontSize: 13
                        },
                    },
                    is3D: true,
                };
                // draw bill chart
                if (processed !== 0 || nonprocessed !== 0) {
                    var pieChart = new google.visualization.PieChart(document.getElementById('pie-chart'));
                    pieChart.draw(pieData, pieOptions);
                } else {
                    document.getElementById('pie-chart').innerHTML = "Don't have order yet"
                }

                var loaiSP = []
                var sizeL = []
                var sizeXL = []
                loaiSP = <?php echo json_encode($product['category']); ?>;
                sizeL = <?php echo json_encode($product['sizeL']); ?>;
                sizeXL = <?php echo json_encode($product['sizeXL']); ?>;
                // product chart data
                var productData = google.visualization.arrayToDataTable([
                    ['Products', 'Quantity'],
                    [loaiSP[0], parseInt(sizeL[0]) + parseInt(sizeXL[0])],
                    [loaiSP[1], parseInt(sizeL[1]) + parseInt(sizeXL[1])],
                ]);
                // draw product chart

                var productChart = new google.visualization.PieChart(document.getElementById('product-chart'));
                productChart.draw(productData, pieOptions);
            }
        </script>
    </body>
<?php
} else {
?>

    <body>

        <div class="w3-modal-content" style="max-width:600px">

            <div class="w3-center  "><br>
                <img src="../Images/ANHNEN/logocheck.jpg" alt="" width="20%">
            </div>

            <form action='index.php' method="post" class="w3-container">
                <div class="w3-section">
                    <label><b>User name</b></label>
                    <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Enter User name" name="admin" required value="checker">
                    <label><b>Password</b></label>
                    <input class="w3-input w3-border" type="password" placeholder="Enter Password" name="psw" required value="12345">
                    <input class="w3-button w3-block w3-black w3-section w3-padding" type="submit" value="Log in">
                    <input class="w3-check w3-margin-top " type="checkbox" checked="checked"> Remember me
                </div>
            </form>



        </div>

    </body>
<?php
}
$con->close();
?>

</html>