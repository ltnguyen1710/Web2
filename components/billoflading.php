<!DOCTYPE html>
<html>
<?php
include '../process/login.php';

?>

<header class="w3-container w3-xlarge">

    <div class="w3-container w3-display-container w3-padding-16 ">
        <i onclick="w3_close()" class="fa fa-remove w3-hide-large w3-button w3-display-topright"></i>
        <a href="http://localhost/Web2/index.php"><img src="../Images/ANHNEN/logocheck.jpg" alt="LOGO" width="5%"></a>
        <div class="w3-main w3-right" style="margin-left:655px ">
            <div class="w3-hide-large" style="">
                <label for="username" style="height:300px;width:00px" class="col-md-10">
                    <h1>Bill of lading </h1>
                </label>
            </div>
        </div>
    </div>

</header>

<body>
    <div>
        <!-- <form action="http://localhost/Web2/components/billoflading.php">
            <header class="w3-container w3-xlarge">
            <hr>
            <label for="username">
                <h2>Enter your UserName: </h2>
            </label>
            <input style="margin: 10px" type="text" name="userName" id="userName" value="<?php echo isset($_REQUEST['userName']) ? $_REQUEST['userName'] : "" ?>">
            <button type="submit" onclick="findBilloflading()" name="Confirm"> Confirm</button>
            </hr>
        </header>
        </form> -->
    </div>
    <div class="w3-container ">
        <div class="row">
            <div class="col-md-10 ">
                <div class="panel panel-default panel-table">
                    <div class="panel-heading">
                        <div class="row " style="margin-left:680px ">
                            <div class="col col-xs-6">
                                <h1 class="panel-title" >History</h1>
                            </div>

                        </div>
                        <div class="panel-body" style="text-align: center">
                            <?php
                            $conn = createDbConnection();
                            $sql = "SELECT maDon,giaDon,ngaydat,userKH,sdt,diachinhan,mavandon FROM donhang where userKH='" . $_SESSION['username']  . "'";
                            $result = $conn->query($sql);
                            if ($result = mysqli_query($conn, $sql)) {

                                if (mysqli_num_rows($result) > 0) {
                            ?>
                                    <table class="table table-striped table-bordered table-list w3-center" style=" margin-left:350px" >
                                        <thead>
                                            <tr>
                                                <th width=40px>ID </th>
                                                <th width=30px>Price</th>
                                                <th width=150px>Date</th>
                                                <th width=100px>UserName</th>
                                                <th width=150px>Sđt</th>
                                                <th width=200px>Address</th>
                                                <th width=150px>Bill of lading</th>
                                            </tr>

                                        </thead>
                                        <tbody>
                                            <?php
                                            while ($row = mysqli_fetch_array($result)) {
                                            ?>
                                                <tr>
                                                    <td><?php echo $row['maDon'] ?></td>
                                                    <td>$<?php echo $row['giaDon'] ?></td>
                                                    <td><?php echo $row['ngaydat'] ?></td>
                                                    <td><?php echo $row['userKH'] ?></td>
                                                    <td><?php echo $row['sdt'] ?></td>
                                                    <td><?php echo $row['diachinhan'] ?></td>
                                                    <td><a href="https://tracking.ghn.dev/?order_code= + <?= $row['mavandon'] ?>" target="_blank" >Tình trạng đơn </a></td>
                                                </tr>
                        </div>
                    </div>
        <?php

                                            }
                                        }
                                    }
        ?>
        </tbody>
        </table>
                </div>
            </div>
        </div>
    </div>
    <script src="index.js"></script>
</body>

</html>