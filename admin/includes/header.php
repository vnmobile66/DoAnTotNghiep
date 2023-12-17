<?php
<<<<<<< HEAD
    session_start();
=======
  session_start();
>>>>>>> a57f051fa770c9c73f7ad80e69ad48a62dfd514c
?>
<!DOCTYPE html>
<html lang="vi-VN">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin</title>
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <!-- CSS Files -->
    <link id="pagestyle" href="assets/css/material-dashboard.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>
    <style>
      .form-control,
      .form-select{
        border: 1px solid #ccc !important;
        padding: 8px 10px;
      }
      .ck-editor__editable[role="textbox"] {
        min-height: 200px;
      }
      .ck-content .image {
        max-width: 80%;
        margin: 20px auto;
      }
    </style>
</head>
<body class="g-sidenav-show  bg-gray-200">
    <?php include("sidebar.php");?>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <?php include("navbar.php") ;?>