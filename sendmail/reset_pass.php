<?php


function reset_pass()
{
    if ($_GET['key'] && $_GET['reset']) {

        $email = $_GET['key'];
        $pass = $_GET['reset'];
        $con = createDBConnection();
        $sql = "select email,passKH from khachhang where md5(email)='$email' and md5(passKH)='$pass'";
        $result = $con->query($sql);
        if ($result->num_rows > 0) {
?>
            <form method="post" action="submit_new.php">
                <input type="hidden" name="email" value="<?php echo $email; ?>">
                <p>Enter New password</p>
                <input type="password" name='password'>
                <input type="submit" name="submit_password">
            </form>
<?php
        }
    }
}
function get_pass()
{
    if (isset($_POST['submit_email']) && isset($_POST['email'])) {
        $email = $_SESSION['typemail'] = $_POST['email'];
        $con = createDBConnection();
        $sql = "select userKH,email,passKH from khachhang where email='$email'";
        $result = $con->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $userKH = $row['userKH'];
                $email = $row['email'];
                $pass = $row['passKH'];
            }
            $mail_receiver = $email;
            $name_receiver = $userKH;
            $subject = 'Reset Password';
            $message = "Đây là mật khẩu của bạn: <b>$pass</b>";
            createSMTPconnection($mail_receiver, $name_receiver, $subject, $message);
            unset($_SESSION['typemail']);
            echo '<script>alert("Check Your Email!!")</script>';
        } else {
            echo '<script>alert("Mail is not exist..")</script>';
        }
    }
}
get_pass();



?>