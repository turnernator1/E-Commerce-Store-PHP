<?php
session_start();
$session_value = (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : ''; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="Styles/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Homepage</title>
</head>

<body>


<!-- Includes header  -->

<div class="Header">
    <div class="Container">
    <div class="topnav">
        <a class="logo">S.E.N.I.O.R</a>
        <a href="home.php"><b class="active">Home</b></a>
        <a href="Catalog.php"><b>Shop</b></a>
        <a href="home.php"><b>Marketplace</b></a>
        <a href="Support.php"><b>Support</b></a>
        <div class="topnav-right">
            <a href="signin.php"><c>Account</c></a>
            <a href="signin.php"><c>Sign in</c></a>
            <a href="cart.php"><c>Cart</c></a>
        </div>
    </div>

<!-- Includes header  -->