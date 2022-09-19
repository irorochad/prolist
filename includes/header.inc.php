<?php ob_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title><?php if(isset($page_title)) {echo "$page_title";} else {echo "prolist - list your crypto profiles";} ?></title>
  <meta name="description" content="<?php if(isset($page_description)) {echo "$page_description";} ?>"  />
  <meta name="keywords" content="<?php if(isset($page_keywords)) {echo "$page_keywords";} ?>"  />

  <meta property="og:type" content="website">
    <meta property="og:title" content="prolist - find crypto projects at ease">
    <meta property="og:description" content="With prolist, you can find correct data about a crypto project">
    <meta property="og:image" content="https://script.viserlab.com/hyiplab/demo/assets/images/seo/5fcc92c79ffe31607242439.jpg"/>
    <meta property="og:image:type" content="image/jpg" />
    <meta property="og:image:width" content="600" />
    <meta property="og:image:height" content="315" />
    <meta property="og:url" content="https://example.com">

  <link rel="stylesheet" href="/prolist/assets/tailscss/output.css" />

  <link rel="stylesheet" href="/prolist/assets/css/index.css" />

  <link rel="stylesheet" href="/prolist/assets/css/owl.carousel.min.css">
  <link rel="stylesheet" href="/prolist/assets/css/owl.carousel.min.css">


</head>

<body class="bg-lightMode dark:bg-dakrMode">