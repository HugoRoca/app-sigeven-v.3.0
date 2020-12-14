<?php

if (strlen(session_id()) < 1) {
  session_start();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <base href="./">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
  <meta name="description" content="CoreUI - Open Source Bootstrap Admin Template">
  <meta name="author" content="Hugo Roca">
  <meta name="keyword" content="">
  <title>.::. SIGEVEN 3.0 .::.</title>
  <link rel="apple-touch-icon" sizes="57x57" href="../content/assets/favicon/apple-icon-57x57.png">
  <link rel="apple-touch-icon" sizes="60x60" href="../content/assets/favicon/apple-icon-60x60.png">
  <link rel="apple-touch-icon" sizes="72x72" href="../content/assets/favicon/apple-icon-72x72.png">
  <link rel="apple-touch-icon" sizes="76x76" href="../content/assets/favicon/apple-icon-76x76.png">
  <link rel="apple-touch-icon" sizes="114x114" href="../content/assets/favicon/apple-icon-114x114.png">
  <link rel="apple-touch-icon" sizes="120x120" href="../content/assets/favicon/apple-icon-120x120.png">
  <link rel="apple-touch-icon" sizes="144x144" href="../content/assets/favicon/apple-icon-144x144.png">
  <link rel="apple-touch-icon" sizes="152x152" href="../content/assets/favicon/apple-icon-152x152.png">
  <link rel="apple-touch-icon" sizes="180x180" href="../content/assets/favicon/apple-icon-180x180.png">
  <link rel="icon" type="image/png" sizes="192x192" href="../content/assets/favicon/android-icon-192x192.png">
  <link rel="icon" type="image/png" sizes="32x32" href="../content/assets/favicon/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="96x96" href="../content/assets/favicon/favicon-96x96.png">
  <link rel="icon" type="image/png" sizes="16x16" href="../content/assets/favicon/favicon-16x16.png">
  <link rel="manifest" href="../content/assets/favicon/manifest.json">
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="msapplication-TileImage" content="../content/assets/favicon/ms-icon-144x144.png">
  <meta name="theme-color" content="#ffffff">
  <!-- Main styles for this application-->
  <link href="../content/css/style.css" rel="stylesheet">
  <link href="../content/vendors/@coreui/chartjs/css/coreui-chartjs.css" rel="stylesheet">
</head>

<body class="c-app">
  <div class="c-sidebar c-sidebar-dark c-sidebar-fixed c-sidebar-lg-show" id="sidebar">
    <div class="c-sidebar-brand d-lg-down-none">
      <svg class="c-sidebar-brand-full" width="118" height="46" alt="CoreUI Logo">
        <use xlink:href="../content/assets/brand/coreui.svg#full"></use>
      </svg>
      <svg class="c-sidebar-brand-minimized" width="46" height="46" alt="CoreUI Logo">
        <use xlink:href="../content/assets/brand/coreui.svg#signet"></use>
      </svg>
    </div>
    <ul class="c-sidebar-nav">
      <li class="c-sidebar-nav-title">Options</li>
      <?php
      if ($_SESSION['dashboard'] == 1) {
        echo '
        <li class="c-sidebar-nav-item">
          <a class="c-sidebar-nav-link" href="#">
            <svg class="c-sidebar-nav-icon">
              <use xlink:href="../content/vendors/@coreui/icons/svg/free.svg#cil-speedometer"></use>
            </svg> Dashboard
          </a>
        </li>
        ';
      }

      if ($_SESSION['warehouse'] == 1) {
        echo '
        <li class="c-sidebar-nav-item c-sidebar-nav-dropdown">
          <a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" href="#">
            <svg class="c-sidebar-nav-icon">
              <use xlink:href="../content/vendors/@coreui/icons/svg/free.svg#cil-calculator"></use>
            </svg> Warehouse</a>
          <ul class="c-sidebar-nav-dropdown-items">
            <li class="c-sidebar-nav-item">
              <a class="c-sidebar-nav-link" href="categories.php">
                <span class="c-sidebar-nav-icon"></span> Categories
              </a>
            </li>
            <li class="c-sidebar-nav-item">
              <a class="c-sidebar-nav-link" href="products.php">
                <span class="c-sidebar-nav-icon"></span> Products
              </a>
            </li>
          </ul>
        </li>
        ';
      }

      if ($_SESSION['purchases'] == 1) {
        echo '
        <li class="c-sidebar-nav-item c-sidebar-nav-dropdown">
          <a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" href="#">
            <svg class="c-sidebar-nav-icon">
              <use xlink:href="../content/vendors/@coreui/icons/svg/free.svg#cil-calculator"></use>
            </svg> Purchases</a>
          <ul class="c-sidebar-nav-dropdown-items">
            <li class="c-sidebar-nav-item">
              <a class="c-sidebar-nav-link" href="product_entry.php">
                <span class="c-sidebar-nav-icon"></span> Product Entry
              </a>
            </li>
            <li class="c-sidebar-nav-item">
              <a class="c-sidebar-nav-link" href="provider.php">
                <span class="c-sidebar-nav-icon"></span> Provider
              </a>
            </li>
          </ul>
        </li>
        ';
      }

      if ($_SESSION['sales'] == 1) {
        echo '
        <li class="c-sidebar-nav-item c-sidebar-nav-dropdown">
          <a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" href="#">
            <svg class="c-sidebar-nav-icon">
              <use xlink:href="../content/vendors/@coreui/icons/svg/free.svg#cil-calculator"></use>
            </svg> Sales</a>
          <ul class="c-sidebar-nav-dropdown-items">
            <li class="c-sidebar-nav-item">
              <a class="c-sidebar-nav-link" href="sales.php">
                <span class="c-sidebar-nav-icon"></span> Sales
              </a>
            </li>
            <li class="c-sidebar-nav-item">
              <a class="c-sidebar-nav-link" href="customers.php">
                <span class="c-sidebar-nav-icon"></span> Customers
              </a>
            </li>
          </ul>
        </li>
        ';
      }

      if ($_SESSION['access'] == 1) {
        echo '
        <li class="c-sidebar-nav-item c-sidebar-nav-dropdown">
          <a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" href="#">
            <svg class="c-sidebar-nav-icon">
              <use xlink:href="../content/vendors/@coreui/icons/svg/free.svg#cil-calculator"></use>
            </svg> Access</a>
          <ul class="c-sidebar-nav-dropdown-items">
            <li class="c-sidebar-nav-item">
              <a class="c-sidebar-nav-link" href="users.php">
                <span class="c-sidebar-nav-icon"></span> Users
              </a>
            </li>
            <li class="c-sidebar-nav-item">
              <a class="c-sidebar-nav-link" href="permissions.php">
                <span class="c-sidebar-nav-icon"></span> Permissions
              </a>
            </li>
          </ul>
        </li>
        ';
      }

      if ($_SESSION['inquiries'] == 1) {
        echo '
        <li class="c-sidebar-nav-item c-sidebar-nav-dropdown">
          <a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" href="#">
            <svg class="c-sidebar-nav-icon">
              <use xlink:href="../content/vendors/@coreui/icons/svg/free.svg#cil-calculator"></use>
            </svg> Inquiries</a>
          <ul class="c-sidebar-nav-dropdown-items">
            <li class="c-sidebar-nav-item">
              <a class="c-sidebar-nav-link" href="inquiries_sales.php">
                <span class="c-sidebar-nav-icon"></span> Sales
              </a>
            </li>
            <li class="c-sidebar-nav-item">
              <a class="c-sidebar-nav-link" href="inquiries_purchases.php">
                <span class="c-sidebar-nav-icon"></span> Purchases
              </a>
            </li>
          </ul>
        </li>
        ';
      }
      ?>
    </ul>
    <button class="c-sidebar-minimizer c-class-toggler" type="button" data-target="_parent" data-class="c-sidebar-minimized"></button>
  </div>
  <div class="c-wrapper c-fixed-components">
    <header class="c-header c-header-light c-header-fixed c-header-with-subheader">
      <button class="c-header-toggler c-class-toggler d-lg-none mfe-auto" type="button" data-target="#sidebar" data-class="c-sidebar-show">
        <svg class="c-icon c-icon-lg">
          <use xlink:href="../content/vendors/@coreui/icons/svg/free.svg#cil-menu"></use>
        </svg>
      </button><a class="c-header-brand d-lg-none" href="#">
        <svg width="118" height="46" alt="CoreUI Logo">
          <use xlink:href="../content/assets/brand/coreui.svg#full"></use>
        </svg></a>
      <button class="c-header-toggler c-class-toggler mfs-3 d-md-down-none" type="button" data-target="#sidebar" data-class="c-sidebar-lg-show" responsive="true">
        <svg class="c-icon c-icon-lg">
          <use xlink:href="../content/vendors/@coreui/icons/svg/free.svg#cil-menu"></use>
        </svg>
      </button>
      <ul class="c-header-nav d-md-down-none">
        <li class="c-header-nav-item px-3"><a class="c-header-nav-link" href="#">Dashboard</a></li>
        <li class="c-header-nav-item px-3"><a class="c-header-nav-link" href="#">Users</a></li>
        <li class="c-header-nav-item px-3"><a class="c-header-nav-link" href="#">Settings</a></li>
      </ul>
      <ul class="c-header-nav ml-auto mr-4">
        <li class="c-header-nav-item dropdown"><a class="c-header-nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
            <div class="c-avatar"><img class="c-avatar-img" src="../content/assets/img/avatars/6.jpg" alt="user@email.com"></div>
          </a>
          <div class="dropdown-menu dropdown-menu-right pt-0">
            <div class="dropdown-header bg-light py-2">
              <strong>Account</strong>
            </div>
            <a class="dropdown-item" href="#">
              <svg class="c-icon mr-2">
                <use xlink:href="../content/vendors/@coreui/icons/svg/free.svg#cil-user"></use>
              </svg> Profile
            </a>
            <a class="dropdown-item" href="#">
              <svg class="c-icon mr-2">
                <use xlink:href="../content/vendors/@coreui/icons/svg/free.svg#cil-settings"></use>
              </svg> Settings
            </a>
            <a class="dropdown-item" href="#">
              <svg class="c-icon mr-2">
                <use xlink:href="../content/vendors/@coreui/icons/svg/free.svg#cil-credit-card"></use>
              </svg> Payments<span class="badge badge-secondary ml-auto">42</span>
            </a>
            <a class="dropdown-item" href="#">
              <svg class="c-icon mr-2">
                <use xlink:href="../content/vendors/@coreui/icons/svg/free.svg#cil-file"></use>
              </svg> Projects<span class="badge badge-primary ml-auto">42</span>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="../../server/controllers/user.php?op=signout">
              <svg class="c-icon mr-2">
                <use xlink:href="../content/vendors/@coreui/icons/svg/free.svg#cil-account-logout"></use>
              </svg> Logout
            </a>
          </div>
        </li>
      </ul>
    </header>
    <div class="c-body">
      <main class="c-main">

