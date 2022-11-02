<!DOCTYPE html>
<html lang="en">
<?php
require_once('../process/login.php');
if (isset($_POST['admin'])) {
    if (adminlogin($_POST['admin'], $_POST['psw']) == "") {
        echo '<script>alert("Wrong password")</script>';
    } else {
        echo '<script>alert("Login successfully")</script>';
    }
}
?>
<?php $con = createDbConnection();
$sql = "select count(maDon) as daxuly from donhang where tinhtrang='Da xu ly'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);
$processed = $row['daxuly'];
$sql = "select count(maDon) as chuaxuly from donhang where tinhtrang='Chua xu ly'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);
$nonprocessed = $row['chuaxuly'];
$sql = "select sum(sanpham.sizeL) as sumofsizeL, sum(sanpham.sizeXL) as sumofsizeXL, loaisanpham.loaiSP from sanpham,loaisanpham where sanpham.maloaiSP = loaisanpham.maloaiSP GROUP BY loaisanpham.maloaiSP";
$result = mysqli_query($con, $sql);
$product = [
    'category' => array(),
    'sizeL' => array(),
    'sizeXL' => array()
];
while ($row = mysqli_fetch_assoc($result)) {
    array_push($product['category'], $row['loaiSP']);
    array_push($product['sizeL'], $row['sumofsizeL']);
    array_push($product['sizeXL'], $row['sumofsizeXL']);
}
?>


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../SOURCE.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>CHECKERVIET</title>
    <style>
        .w3-sidebar a,
        form {
            font-family: "Roboto", sans-serif
        }

        body,
        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        .w3-wide {
            font-family: "Montserrat", sans-serif;
        }
    </style>

</head>
<?php
if (isLoginedAdmin()) {
?>

    <body class="w3-content" style="max-width:1200px">
        <!-- Sidebar/menu -->
        <nav class="w3-sidebar w3-bar-block w3-white w3-collapse w3-top" style="z-index:3;width:250px" id="mySidebar">
            <div class="w3-container w3-display-container w3-padding-16">
                <i onclick="w3_close()" class="fa fa-remove w3-hide-large w3-button w3-display-topright"></i>
                <a href="#"><img src="../Images/ANHNEN/logocheck.jpg" alt="LOGO" width="40%"></a>
            </div>
            <div class="w3-padding-64 w3-large w3-text-gray" style="font-weight:bold">
                <a href="#" class="w3-button w3-block w3-light-grey w3-left-align">Home</a>
                <a href="admin.php" class="w3-bar-item w3-button w3-white">Order management</a>
                <a href="Productmanagement.php" class="w3-bar-item w3-button w3-white">Product management</a>
                <a href="user.php" class="w3-button w3-block w3-white w3-left-align">User management</a>
            </div>
        </nav>

        <!-- Top menu on small screens -->
        <header class="w3-bar w3-top w3-hide-large w3-black w3-xlarge">
            <div class="w3-bar-item w3-wide"><a href="demo.html" class="w3-button">CHECKERVIET</div>
            <a href="javascript:void(0)" class="w3-bar-item w3-button w3-padding-10 w3-right" onclick="w3_open()"><i class="fa fa-bars"></i></a>
        </header>

        <!-- Overlay effect when opening sidebar on small screens -->
        <div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

        <!-- !PAGE CONTENT! -->
        <div class="w3-main" style="margin-left:250px">

            <!-- Push down content on small screens -->
            <div class="w3-hide-large" style="margin-top:83px"></div>

            <!-- Top header -->
            <header class="w3-container w3-xlarge w3-padding-24">
                <p class="w3-left">Hi admin</p>
                <p class="w3-right">

                    <!-- Log out icon -->
                    <a href="logoutadmin.php" class="w3-bar-item w3-button  w3-right">
                        <i class="fa fa-sign-out  "></i>
                    </a>

                </p>
            </header>

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