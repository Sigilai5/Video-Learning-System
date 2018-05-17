<?php
$db = mysqli_connect('127.0.0.1','root','','vls');
if (isset($_GET['video'])){
	$vid=mysqli_real_escape_string($db,$_GET['video']);

	$sql ="SELECT * FROM videos WHERE id = $vid";

	$resp = mysqli_query($db,$sql);
	$rows = array();
	$video = mysqli_fetch_assoc($resp);

}else{
	echo "Error in query parameters";
	exit(0);
}
?>
<!DOCTYPE html>
<html>
<head>
  <script src="../js/jquery.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <link href="../css/bootstrap.css" rel="stylesheet" type="text/css">
  <link href="css/styles.css" rel="stylesheet" type="text/css">
  <script src="../js/jquery.js"></script>
  <script src="../js/scripts.js"></script>
</head>
<body>
<div class="wrapper">
  <nav id="sidebar">
    <div class="sidebar-header">
      <h3><strong>VLS</strong></h3>
    </div>
    <ul class="list-unstyled components">
      <li class="active"><a href="../">HOME</a></li>
      <li><a href="#">ABOUT</a></li>
      <li>
        <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false">VIDEOS</a>
        <ul class="collapse list-unstyled" id="homeSubmenu">
          <li><a href="#">HTML VIDEOS</a></li>
          <li><a href="#">CSS VIDEOS</a></li>
          <li><a href="#">JAVASCRIPT VIDEOS</a></li>
        </ul>
      </li>
      <li><a href="#">CONTACT</a></li>
    </ul>
  </nav>
  <div id="main">
  <nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
    <a href="../">
		<div class="navbar-header navbar-left navbar-icon">
		  <img src="img/vls-icon.png" class="vls-icon img-circle">
		</div>
    </a>
    <div class="nav navbar-header navbar-left"><h4 class="navbar-text"><strong>VIDEO LEARNING SYSTEM</strong></h4></div>
    <!-- Collection of nav links, forms, and other content for toggling -->
    <div id="navbarCollapse" class="collapse navbar-collapse">
      <ul class="navbar-nav navbar-left popup">
        <button class="btn btn-default btn-login">
          <span class="glyphicon glyphicon-th" id="sidebarCollapse" onclick="openNav()"><strong>Menu</strong></span>
      </button>
      </ul>
      <ul class="nav navbar-nav">
        <li class="active"><a href="../"><strong>Home</strong></a></li>
      </ul>
      <form class="navbar-form navbar-left" autocomplete="off" id="searchForm">
        <div class="input-group searchbox">
          <input aria-controls="suggestions" aria-haspopup="true" type="text" class="form-control" placeholder="Search" id="searchInput">
          <ul role="menu" aria-labelledby="searchInput" id="suggestions"></ul>
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
</div>
 <div id="target" class="row" style="display: block;">
  	<div class="col-xs-12 row result">
      <div class="col-xs-12 videoplay">
        <video width="80%" height="80%" controls>
          <source src="<?php print '../'.$video['video']; ?>">
        </video>
        <div id="videoinfo">
	        <h3><?php echo $video['name']?></h3>
	        <h4><p><?php echo $video['description']?></p></h4>
	    </div>
      </div>
    </div>
  </div>
</body>
</html>