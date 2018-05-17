<?php include ('server.php');?>
<?php

// Create database connection
$db = mysqli_connect("localhost", "root", "", "vls");

//initialize message variable
$msg = "";
$results = mysqli_query($db,"SELECT * FROM videos WHERE category='JScript' ORDER BY time DESC");

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Video Learning System</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="styles.css">

</head>
<body>

<div class="row">
    <?php
    while ($row = mysqli_fetch_array($results)) {
        echo "<div class='col-md-6'>";
        echo "<div class='panel panel-info'>";
        echo "<div class='panel-heading' style='background-color: #3c3d41; color: whitesmoke'>";

        echo "<h2 class='panel-title'>" .$row['title']."</h2>";

        echo "</div>";

        echo "<div class='panel-body'>";
        echo "<div class='row'>";

        echo "<video width='620px' height='440px' controls>";
        echo "<source src='videos/".$row['video']."' alt='videos".$row['title']."'>";
        echo "</video>";

        echo "<div class='header3'>";
        echo "<h3>DESCRIPTION</h3>";
        echo"</div>";
        echo "<div class='desc'>";
        echo "<p><strong>Title:</strong>".$row['title']."</p>";
        echo "<p><strong>Description:</strong>".$row['description']. "</p>";


        echo "</div>";
        echo "</div>";
        echo "</div>";

        echo "</div>";

        echo "</div>";
    }?>
</div>

</body>
</html>
