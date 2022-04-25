<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title> Kelola Data Mahasiswa </title>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>"/>
	<script src="<?= base_url('assets/js/jquery-3.1.0.js'); ?>"></script>
	<script src="<?= base_url('assets/js/bootstrap.min.js'); ?>"></script>
	<!-- jquery : harus diatas bootstrap kalau engga nanti dia error -->
  <style type="text/css">
    .buttons{
      color: #2196f3;
      border : 1px solid #cabdbd;
      border-radius: 5px;
      padding: 2px 10px 2px 10px;
    }
  </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"><h2>Kelola Data Mahasiswa</h2></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">

        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="dashboard">Dashboard</a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link" href="logout">Logout</a>
        </li>
        
      </ul>
    </div>
  </div>
</nav>


<!-- <nav class="navbar navbar-expand-lg navbar-dark bg-primary" style="user-select: auto;">
  <div class="container-fluid" style="user-select: auto;">
    <a class="navbar-brand" href="#" style="user-select: auto;"><h2>Kelola Data Mahasiswa</h2></a>
    
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation" style="user-select: auto;">
      <span class="navbar-toggler-icon" style="user-select: auto;"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarColor01" style="user-select: auto;">
      <ul class="navbar-nav me-auto" style="user-select: auto;">
     </ul>
    </div>
  </div>
</nav> -->

