<?php include('server.php') ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<div class="header">
    <h2>Login</h2>
</div>
<form method="post" action="login.php">

    <?php echo display_error(); ?>

    <div class="input-group">
        <label>Username</label>
        <input type="text" name="username" minlength="5" required>
    </div>
    <div class="input-group">
        <label>Password</label>
        <input type="password" name="password" required>
    </div>
    <div class="input-group">
        <button type="submit" class="btn" name="login_btn">Login</button>
    </div>

</form>
<!--http://www.learningaboutelectronics.com/Articles/How-to-create-a-searchable-database-using-MySQL-and-PHP.php#results-->
</body>
</html>