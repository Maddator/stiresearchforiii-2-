<?php
    include "database.php";
            
    $uid = $_GET['urowid'];

    $sql = "SELECT * FROM `main_page` WHERE id = ?";

    $stmt = $con->prepare($sql);
    $stmt->bind_param("i", $uid);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $uname = $row['name'];
    $ulocation = $row['location'];
    $udescription = $row['description'];
    $uimage = $row['image'];
    $stmt->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Content</title>
    <link rel="icon" type="image/x-icon" href="./images/logo.ico">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <h1 class="text-center my-4">Update Content form</h1>
    <div class="container my-6">
        <form method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="Name">Name</label>
                <input type="text" class="form-control" name="Name" placeholder="Enter Name" value="<?php echo ''.$uname.'';?>">
            </div>
            <div class="form-group">
                <label for="Location">Location</label>
                <input type="text" class="form-control" name="Location" placeholder="Enter Location" value="<?php echo ''.$ulocation.'';?>">
            </div>
            <div class="form-group">
                <label for="Description">Description</label>
                <input type="text" class="form-control" name="Description" placeholder="Enter Description" value="<?php echo ''.$udescription.'';?>">
            </div>
            <div class="form-group">
                <label for="Image">Image</label>
                <input type="file" class="form-control-file" name="Image" placeholder="Upload Image" value="<?php echo ''.$uimage.'';?>">
            </div>
            <button type="submit" class="btn btn-dark" name="newcontentsubmit">Update</button>
        </form>
        <?php
            if (isset($_POST['newcontentsubmit'])) {
                $Name = $_POST['Name'];
                $Location = $_POST['Location'];
                $Description = $_POST['Description'];
                $Image = $_FILES['Image'];
                $ImageFileName = $Image['name'];
                $ImageFileTemp = $Image['tmp_name'];
                $ImageFileSize = $Image['size'];
                $Filename_separate = explode('.', $ImageFileName);
                $File_extension = strtolower(end($Filename_separate));

                $extension = array('jpeg', 'jpg', 'png');

                $errors = array();

                if (empty($Name) && empty($Location) && empty($Description)) {
                    array_push($errors, "All fields are required");
                } else if (empty($Name)) {
                    array_push($errors, "Name is required");
                } else if (empty($Location)) {
                    array_push($errors, "Location is required");
                } else if (empty($Description)) {
                    array_push($errors, "Description is required");
                } else if ($_FILES['Image']['size'] < 0) {
                    array_push($errors, "Image is required");
                }
                
                if (count($errors) > 0) {
                    foreach ($errors as $error) {
                        echo "<p>$error</p>";
                    }
                } else {
                    if (in_array($File_extension, $extension)) {
                        $upload_image = 'images/'.$ImageFileName;
                        move_uploaded_file($ImageFileTemp, $upload_image);

                        $sql = "UPDATE `main_page` SET name = ?, location = ?, description = ?, image = ? WHERE id = ?";
                        $stmt = $con->prepare($sql);
                        $stmt->bind_param("ssssi", $Name, $Location, $Description, $upload_image, $uid);
                        $stmt->execute();

                        if ($stmt->affected_rows > 0) {
                            header("location: ./administrationpanel.php?admpanelallowed=true");
                            exit;
                        } else {
                            echo "No rows were updated.";
                        }

                        $stmt->close();
                    }
                    
                }
            }
        ?>
    </div>
</body>
</html>