<?php
include('server.php');

if (!isAdmin()) {
    $_SESSION['msg'] = "You must log in first";
    header('location:login.php');
}

if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['user']);
    header("location:login.php");
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>Home</title>

    <link rel="stylesheet" href="styles.css">
    <style>
        .header {
            background: #003366;
        }
        button[name=register_btn] {
            background: #003366;
        }
    </style>
</head>
<body>
<div class="header">
    <h2>Admin - Home Page</h2>

</div>
<div class="content">
    <!-- notification message -->
    <?php if (isset($_SESSION['success'])) : ?>
        <div class="error success" >
            <h3>
                <?php
                echo $_SESSION['success'];
                unset($_SESSION['success']);
                ?>
            </h3>
        </div>
    <?php endif ?>

    <!-- logged in user information -->
    <div class="profile_info">

        <div>
            <?php  if (isset($_SESSION['user'])) : ?>
                <strong><?php echo $_SESSION['user']['username']; ?></strong>

                <big>
                    <i  style="color: #888;">(<?php echo ucfirst($_SESSION['user']['user_type']); ?>)</i>
                    <br>
                    <a href="home.php?logout='1'" style="color: red;">logout</a><br>
                    <center>
                    &nbsp; <a href="create_user.php"><button class="btn">+ Add New Admin</button></a><br>
                        <h1><a href="upload.php"><button class="btn">+Videos</button></a></h1>
                    </center>
                </big>

            <?php endif ?>
        </div>
    </div>
</div>
</body>
</html>