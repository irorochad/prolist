<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// HEader Meta tags
$page_title = "Reset your password";
$page_description = "Prolist helps you find and discover crypto projects with accurate informations";
?>

<?php include "./includes/header.inc.php";
include "function.php"; ?>

<?php

// Include the php mailer configuration files
require './vendor/autoload.php';



// if the user did not pass in the GET ? method, he should be redirected to the login page. 
if (!isset($_GET['forgot'])) {
    header("Location: login");
}

// Call the reset password function to hadle the reset calling.
if (isset($_POST['email'])) {
    $email = $_POST['email'];
    $length = 50;
    $token = bin2hex(openssl_random_pseudo_bytes($length));

    if (!email_exists($email)) {
        // if the email is not found, use the $session to show an erorr msg. 
        $_SESSION['formError'] = "We couldn't find that email.";
    } else {
        $query = "UPDATE users SET `token` = '{$token}' WHERE email = '{$email}'";
        $runquery = mysqli_query($db_connection, $query);


        /*  
            SMTP CODES TO /CONFIGURE SEND EMAILS
        */
        //Server settings
        $mail = new PHPMailer(true);
        $mail->SMTPDebug = false;
        // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = Config::SMTP_HOST;                       //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                    //Enable SMTP authentication
        $mail->Username   = Config::SMTP_USERNAME;                   //SMTP username
        $mail->Password   = Config::SMTP_PASSWORD;                     //SMTP password
        $mail->SMTPSecure = 'tls';                                     // Enable TLS encryption, `ssl` also accepted
        $mail->Port = Config::SMTP_PORT;

        // $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        // $mail->Port       = 25;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`


        //Recipients
        $mail->setFrom('prolist@coinrach.com', 'coinrach');
        $mail->addAddress($email);     //the email the user entered.

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->CharSet = 'UTF-8';
        $mail->Subject = 'Password Confirmation';
        $mail->Body    = "<div><p>Hey, <br /> <br /> You're <b>about</b> to reset your pasword, <i>click</i> on the button below to rest it.<br/><br/> </p> 
        <a href='http://localhost/prolist/reset?email=$email&token=$token'>CLICK HERE</a>
        </div>";
        $mail->AltBody = "You're about to reset your pasword, click on the button below to rest it.";

        if ($mail->send()) {
            // if email was sent, we'll set a variable to true, else it will be false by default
            $emailSent = true;
            // echo "password confimation email as been sent.";

        } else {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
}

?>


<main class="min-h-screen flex flex-col items-center justify-center bg-gray-50 dark:bg-slate-900 space-y-10 py-12 px-4 sm:px-6 lg:px-8">
    <div>
        <h1 class="mt-6 text-center text-3xl font-extrabold text-gray-900 dark:text-gray-100">Reset account password</h1>
        <p class="mt-2 text-center text-sm text-gray-600">
            Or
            <a href="login" class="font-medium text-indigo-600 border-b border-indigo-600"> Login! </a>
        </p>
    </div>
    <form action="" method="post" class="w-full">
        <div class="max-w-md w-full mx-auto bg-white dark:bg-[#77325f2d] rounded-lg shadow-xl p-7 space-y-6">
            <?php if (!isset($emailSent)) : ?>
                <div class="flex flex-col">
                    <label class="text-sm font-bold text-gray-600 dark:text-gray-300 mb-1" for="email">Email Address</label>
                    <input class="border rounded-md bg-white dark:bg-slate-300 px-3 py-2" type="email" name="email" id="email" value="<?php echo isset($email) ? $email : '' ?>" placeholder="Enter your Email Address" />
                    <!-- If the email is not found, call this function to show the error. -->
                    <?php formErrorMsg(); ?>
                </div>

                <div>
                    <button name="loginBtn" class="w-full bg-indigo-600 text-white rounded-md p-2">Reset Password</button>
                </div>
            <?php else : ?>
                <div>
                    <p class="text-sm font-bold text-gray-600 dark:text-gray-300 uppercase"><?php echo "A rest email has been mailed to: " . $email; ?></p>
                </div>
            <?php endif; ?>
        </div>
    </form>
</main>

<?php include "./includes/footer.inc.php"; ?>