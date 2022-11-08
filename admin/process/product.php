<?php

if (isset($_POST['Insert'])) {
    $conn = createDbConnection();
    $sql = "select * from sanpham where tenSP='" . $_REQUEST['name'] . "'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        echo '<script>alert("This name has existed, add product failed")</script>';
        $result->free_result();
    } else {
        $sql = "select * from sanpham where hinhanhSP='" . $_FILES["myFile"]["name"] . "'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            echo '<script>alert("This image has existed, add product failed")</script>';
            $result->free_result();
        } else {
            $sql1 = "select maloaiSP from loaisanpham where loaiSP='" . $_REQUEST['typeSP'] . "'";
            $result = $conn->query($sql1);
            $row = $result->fetch_assoc();
            $maloaiSP = $row['maloaiSP'];
            $pname = $_FILES["myFile"]["name"];
            $tname = $_FILES['myFile']['tmp_name'];
            $uploaddir = "../Images/T-shirt/" . $pname;
            move_uploaded_file($tname, $uploaddir);
            $sql = sprintf(
                "INSERT INTO sanpham (maloaiSP,thongtinSP,tenSP,giaSP,hinhanhSP,sizeL,sizeXL) 
                        VALUES ( '%s','%s', '%s', '%s' ,'%s','%s', '%s')",
                $maloaiSP,
                $_REQUEST['bio'],
                $_REQUEST['name'],
                $_REQUEST['gia'],
                $pname,
                $_REQUEST['sizeL'],
                $_REQUEST['sizeXL']
            );
            if ($conn->query($sql) === TRUE) {
                echo '<script>alert("Insert successfully!")</script>';
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
    }

    $conn->close();
}
?>
<?php

if (isset($_POST['Update'])) {
    $conn = createDbConnection();
    $sql = "select * from sanpham where tenSP='" . $_REQUEST['ten'] . "'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0 && $_REQUEST['ten'] != $_REQUEST['oldname']) {
        echo '<script>alert("This name has existed, update failed")</script>';
        $result->free_result();
    } else {

        $sql1 = "select maloaiSP from loaisanpham where loaiSP='" . $_REQUEST['loaiSP'] . "'";
        $result = $conn->query($sql1);
        $row = $result->fetch_assoc();
        $maloaiSP = $row['maloaiSP'];
        if ($_FILES["hinh"]["name"] != "") {
            $sql = "select * from sanpham where hinhanhSP='" . $_FILES["hinh"]["name"] . "'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                echo '<script>alert("This image has existed, update failed")</script>';
                $result->free_result();
            } else {
                $pname = $_FILES["hinh"]["name"];
                $tname = $_FILES['hinh']['tmp_name'];
                $_REQUEST['imagehere1'] = $pname;
                $uploaddir = "../Images/T-shirt/" . $pname;
                move_uploaded_file($tname, $uploaddir);
                $sql = sprintf(
                    "UPDATE sanpham 
                SET tenSP = '%s', giaSP='%s', hinhanhSP='%s', thongtinSP='%s' ,maloaiSP='%s', sizeL='%s', sizeXL='%s'
                WHERE tenSP = '%s'",
                    $_REQUEST['ten'],
                    $_REQUEST['gia1'],
                    $_REQUEST['imagehere1'],
                    $_REQUEST['mota'],
                    $maloaiSP,
                    $_REQUEST['sizeL'],
                    $_REQUEST['sizeXL'],
                    $_REQUEST['oldname']
                );
                if ($conn->query($sql) === TRUE) {
                    echo '<script>alert("Update successfully!")</script>';
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }

                $conn->close();
            }
        } else {
            $sql = sprintf(
                "UPDATE sanpham 
                SET tenSP = '%s', giaSP='%s', thongtinSP='%s' ,maloaiSP='%s', sizeL='%s', sizeXL='%s'
                WHERE tenSP = '%s'",
                $_REQUEST['ten'],
                $_REQUEST['gia1'],
                $_REQUEST['mota'],
                $maloaiSP,
                $_REQUEST['sizeL'],
                $_REQUEST['sizeXL'],
                $_REQUEST['oldname']
            );
            // var_dump($sql);
            if ($conn->query($sql) === TRUE) {
                echo '<script>alert("Update successfully!")</script>';
                // header("Location:Productmanagement.php");
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }

            $conn->close();
        }
    }
}
?>
<?php
if (isset($_REQUEST['Delete'])) {
    $conn = createDbConnection();
    $sql = sprintf("DELETE FROM sanpham  WHERE tenSP = '%s'", $_REQUEST['ten']);
    var_dump($sql);
    if ($conn->query($sql) === TRUE) {
        echo "Deleted successfully";
        header("Location:Productmanagement.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>