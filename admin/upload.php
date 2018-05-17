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
    <h2>Upload</h2>
</div>
<form method="POST" action="" enctype="multipart/form-data">
    <div class="input-group">
        <label>Choose Video:</label>
        <input  type="file" name="video"/>
    </div>
    <div class="input-group">
        <label>Name:</label>
        <input type="text" name="name"/>
    </div>

    <div class="input-group">
        <label>Description:</label>
        <textarea placeholder="Enter Description" name="description"></textarea>
    </div>

    <div class="input-group">
        <label>User type</label>
        <select name="category">
            <option value="HTML" name="category">HTML</option>
            <option value="JScript" name="category">Javascript</option>
            <option value="CSS" name="category">CSS</option>
        </select>
    </div>

    <div class="input-group">
        <input type="submit" name="submit" value="Upload" class="success"/>
    </div>
    <?php
    if(isset($_POST['submit'])){
        // Create database connection
        $db = mysqli_connect("localhost", "root", "", "vls");
        $target="videos/";
        $target=$target.basename($_FILES['video']['name']);
        //Getting Selected video Type
        $type=pathinfo($target,PATHINFO_EXTENSION);
        //Allow Certain File Format To Upload
        if($type!='mp4' &&$type!='avi'){
            echo "Only Mp4,Avi file format are allowed to Upload";
        }
        else{
            //checking for Exsisting video Files
            if(file_exists($target)){
                echo "File Exist";
            }else{

                //Moving The video file to Desired Directory
                $upload_success=move_uploaded_file($_FILES['video']['tmp_name'],$target);
                if($upload_success==TRUE){
                    //Getting Selected video Information
                    $video=$_FILES['video']['name'];
                    $size=$_FILES['video']['size'];
                    // Get text
                    $title = mysqli_real_escape_string($db, $_POST['name']);
                    $description = mysqli_real_escape_string($db, $_POST['description']);
                    $category = mysqli_real_escape_string($db, $_POST['category']);
                    $sql="INSERT INTO videos (video,title,description,category)VALUES('$video','$title','$description','$category')";
                    $result=mysqli_query($db,$sql);
                    if($result==TRUE){
                        echo "<p style='color:chocolate'>Your video  is successfully Uploaded!</p>";
                    }
                }
            }


        }

    }
    ?>
</form>




</body>
</html>