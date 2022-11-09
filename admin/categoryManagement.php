<?php include 'components/header.php'; ?>
<?php include 'process/category.php'; ?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
<?php
if (isLoginedAdmin()) {
?>

    <body class="w3-content" style="max-width:1200px">

        <?php include 'components/nav.php'; ?>

        <form style="padding-left: 15px;" onchange="reloadadmin()">
            <div>
                <button type="button" class="w3-button w3-blue" onclick="document.getElementById('themsp').style.display='block'">Add Category</button>
                <br>
                <br>
                <label for="searchOrder">Search order </label>
                <input type="text" id="textOrder" name="searchText" style="width: 20%" placeholder="Type Order ID or Username" value="<?php
                                                                                                                                        echo isset($_REQUEST['searchText']) ? $_REQUEST['searchText'] : "";
                                                                                                                                        ?>">
                <button class="button" onclick="reloadadmin()">Search</button>

            </div>
        </form>

        <br>
        <!--insert category-->
        <div id="themsp" class="w3-modal">
            <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">

                <div class="w3-center"><br>
                    <span onclick="document.getElementById('themsp').style.display='none'" class="w3-button w3-xlarge w3-transparent w3-display-topright" title="Close Modal">×</span>

                </div>

                <form class="w3-container" id="f7" action="categoryManagement.php" method="post" onsubmit="" enctype="multipart/form-data">
                    <ul>
                        <li>
                            <b><label for="name">Enter name of Category</label></b>
                            <input class="w3-input w3-input w3-border w3-margin-bottom " type="text" id="tenSP" name="nameCategory" maxlength="100" required>
                        </li>
                        <li>
                            <input class="w3-button w3-gray" type="submit" value="Add" name="Add" onclick="them()">
                        </li>
                    </ul>
                </form>

            </div>
        </div>
        <script>
            function reloadadmin() {
                var text = document.getElementById('textOrder').value
                window.location.href = "categoryManagement.php?searchText=" + text
            }
        </script>
        <!--Admin-->
        <div class="w3-container  ">
            <div class="row">
                <div class="col-md-10 ">
                    <div class="panel panel-default panel-table">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col col-xs-6">
                                    <h3 class="panel-title">Category list</h3>
                                </div>

                            </div>
                        </div>
                        <div class="panel-body">
                            <form action="categoryManagement.php" method="post">
                                <?php
                                $conn = createDbConnection();
                                if (isset($_REQUEST['searchText'])) {
                                    $seachtext = $_REQUEST['searchText'];
                                    $sql = "SELECT * FROM loaisanpham WHERE (loaiSP like '%$seachtext%')";
                                } else {
                                    $sql = "SELECT * FROM loaisanpham";
                                }

                                if ($result = mysqli_query($conn, $sql)) {

                                    if (mysqli_num_rows($result) > 0) {
                                ?>


                                        <table class="table table-striped table-bordered table-list">
                                            <thead>
                                                <tr>
                                                    <th>ID Category</th>
                                                    <th>Category</th>
                                                    <th>Delete</th>
                                                </tr>

                                            </thead>
                                            <tbody>
                                                <?php
                                                while ($row = mysqli_fetch_array($result)) {
                                                ?>
                                                    <tr>
                                                        <input type="text" name="categoryDelete" value="<?= $row['loaiSP'] ?>" hidden>
                                                        <td><?php echo $row['maloaiSP'] ?></td>
                                                        <td><?php echo $row['loaiSP'] ?></td>
                                                        <td align="center" width="75px"><button class="btn btn-default fa fa-trash" type="submit" onclick="return deleteCategory()"></button></td>
                                                    </tr>



                            </form>
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
        </div>
        <script>
            function deleteCategory() {
                var cof = confirm("Are you sure ?");
                return cof;
            }
        </script>

        <script>
            // Accordion
            function myAccFunc() {
                var x = document.getElementById("demoAcc");
                if (x.className.indexOf("w3-show") == -1) {
                    x.className += " w3-show";
                } else {
                    x.className = x.className.replace(" w3-show", "");
                }
            }

            function myAccFunc1() {
                var x = document.getElementById("demoAcc1");
                if (x.className.indexOf("w3-show") == -1) {
                    x.className += " w3-show";
                } else {
                    x.className = x.className.replace(" w3-show", "");
                }
            }

            // Click on the "Jeans" link on page load to open the accordion for demo purposes
            document.getElementById("myBtn").click();


            // Open and close sidebar
            function w3_open() {
                document.getElementById("mySidebar").style.display = "block";
                document.getElementById("myOverlay").style.display = "block";
            }

            function w3_close() {
                document.getElementById("mySidebar").style.display = "none";
                document.getElementById("myOverlay").style.display = "none";
            }
        </script>
    </body>
<?php
} else {
    echo '<script>window.location.replace("/WEB2/admin")</script>';
}
?>



</html>