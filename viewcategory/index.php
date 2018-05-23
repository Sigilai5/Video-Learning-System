<?php

$db = mysqli_connect("localhost", "root", "", "vls");

$msg = "";
$cat = mysqli_real_escape_string($db,$_GET['category']);
$results = mysqli_query($db,"SELECT * FROM videos WHERE category = '$cat' ORDER BY time DESC");

?>
<!doctype html>
<html lang="en">
<head>
  <script src="../js/jquery.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <link href="../css/bootstrap.css" rel="stylesheet" type="text/css">
  <link href="../css/styles.css" rel="stylesheet" type="text/css">
  <script src="../js/jquery.js"></script>
  <script src="js/scripts.js"></script>
  <title>Video Learning System</title>
</head>
<body>
<div class="wrapper">
  <nav id="sidebar">
    <div class="sidebar-header">
      <h3><strong>VLS</strong></h3>
    </div>
    <ul class="list-unstyled components">
      <li class="active"><a href="/vls/">HOME</a></li>
      <li><a href="#">ABOUT</a></li>
      <li>
        <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false">VIDEOS</a>
        <ul class="collapse list-unstyled" id="homeSubmenu">
        </ul>
      </li>
      <li><a href="#">CONTACT</a></li>
    </ul>
  </nav>
  <div id="main">
  <nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
    <a href="/vls">
      <div class="navbar-header navbar-left navbar-icon">
        <img src="img/vls-icon.png" class="vls-icon img-circle">
      </div>
    </a>
    <div class="nav navbar-header navbar-left"><h4 class="navbar-text"><strong>VIDEO LEARNING SYSTEM</strong></h4></div>
    <!-- Collection of nav links, forms, and other content for toggling -->
    <div id="navbarCollapse" class="collapse navbar-collapse">
      <ul class="navbar-nav navbar-left popup">
        <button class="btn btn-default btn-login" onclick="openNav()">
          <span class="glyphicon glyphicon-th" id="sidebarCollapse" ><strong>Menu</strong></span>
      </button>
      </ul>
      <ul class="nav navbar-nav">
        <li class="active"><a href="/vls/"><strong>Home</strong></a></li>
      </ul>
      <form class="navbar-form navbar-left" autocomplete="off" id="searchForm">
        <div class="input-group searchbox">
          <input type="text" class="form-control" placeholder="Search" id="searchInput" list="suggestions">
          <datalist id="suggestions"></datalist>
          <span class="input-group-btn">
            <button type="button" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
          </span>
        </div>
      </form>
      <ul class="nav navbar-nav navbar-right">
        <button class="btn btn-default navbar-btn btn-login"><strong>Login</strong></button>
      </ul>
    </div>
  </div>
  </div>
<div id='target' class="container">
<div class="row">
   <?php
   while ($row = mysqli_fetch_array($results)) {
       echo "<div class='col-xs-4'>";
       echo "<div class='panel panel-info''>";
       echo "<div class='panel-heading' style='background-color: #3c3d41; color: whitesmoke'>";

       echo "<h2 class='panel-title'>" .$row['name']."</h2>";

       echo "</div>";

       echo "<div class='panel-body'>";
       echo "<div class='row'>";

       echo "<video width='100%' height='50%' controls>";
       echo "<source src='../".$row['video']."' alt='videos".$row['name']."'>";
       echo "</video>";

       echo "<div class='header3' style='height: 25%;color: black;'>";
       echo "<a href=../watch/?video=".$row['id']."><h4><strong style='color: black;'>".$row['name']."</strong></h4></a>";
       echo"</div>";
       echo "<div class='desc' style='height: 25%'>";
       echo "<textarea rows=3 >".$row['description']. "</textarea>";


       echo "</div>";
       echo "</div>";
       echo "</div>";

       echo "</div>";

       echo "</div>";
   }?>
</div>
<script type="text/javascript">$("#target").show();$('h2').quickfit()</script>
</body>
</html>