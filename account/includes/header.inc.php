<?php ob_start();
session_start(); ?>

<!-- If the user is not logged in, and tries to access the user account page, take them back to login -->
<?php
if (!isset($_SESSION['user_email']) && !isset($_SESSION['user_password'])) {
  $_SESSION['loginRedirect'] = "Please, login to access your dashboard!";
  header("Location: /prolist/login");
}
?>

<!doctype html>
<html x-data="data()">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title><?php if (isset($page_title)) {
            echo "$page_title";
          } else {
            echo "prolist user account";
          } ?></title>
  <meta name="description" content="vvv" />
  <meta name="keywords" content="vv" />

  <meta property="og:type" content="website">
  <meta property="og:title" content="prolist - find crypto projects at ease">
  <meta property="og:description" content="With prolist, you can find correct data about a crypto project">
  <meta property="og:image" content="https://script.viserlab.com/hyiplab/demo/assets/images/seo/5fcc92c79ffe31607242439.jpg" />
  <meta property="og:image:type" content="image/jpg" />
  <meta property="og:image:width" content="600" />
  <meta property="og:image:height" content="315" />
  <meta property="og:url" content="https://example.com">

  <link rel="stylesheet" href="/prolist/assets/tailscss/output.css" />
  <link rel="stylesheet" href="/prolist/assets/css/index.css" />

  <!-- Add project -->
  <link rel="stylesheet" href="/prolist/assets/user/css/index.css" />

  <!-- WYSIWYG -->
  <script src="/prolist/assets/user/js/tinymce/tinymce.min.js" referrerpolicy="origin"></script>
  <!-- WYSIWYG -->
  <!-- End projects -->

</head>

<body>
  <!-- Backdrop -->
  <div class="backdrop absolute w-full h-screen hidden bg-[#2b2424] opacity-25 z-30"></div>
  <!-- End Backdrop -->
  <div class="flex min-h-screen bg-gray-50 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen }">