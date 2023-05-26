<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administration Panel</title>
    <link rel="icon" type="image/x-icon" href="./images/logo.ico">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <button onclick="openAddContentPage()" type="button" class="btn btn-dark my-5">Add Content</button>
        <button onclick="openMainPage()" type="button" class="btn btn-dark my-5">View</button>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Database ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Location</th>
                    <th scope="col">description</th>
                    <th scope="col">image</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>

            <tbody>
                <?php
                    include 'database.php';

                    $sql = 'SELECT * FROM `main_page`';

                    $result = mysqli_query($con, $sql);

                    if ($result) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $id = $row['id'];
                            $name = $row['name'];
                            $location = $row['location'];
                            $description = $row['description'];
                            $image = $row['image'];
                            
                            echo '<tr>
                                        <th scope="row">'.$id.'</th>
                                        <td>'.$name.'</td>
                                        <td>'.$location.'</td>
                                        <td>'.$description.'</td>
                                        <td><img src="'.$image.'" alt="" style="width: 25%"class="img-thumbnail"></td>
                                        <td><button class="btn btn-dark my-2"><a href="./updatecontent.php?urowid='.$id.'&admpanelallowed=true" class="text-light">Update</a></button></td>
                                        <td><button class="btn btn-dark my-2"><a href="./deletecontent.php?deleteid='.$id.'&admpanelallowed=true" class="text-light">Delete</a></button></td>
                                 </tr>';
                        }
                    }
                ?>
                <!-- <tr>
                    <th scope="row">1</th>
                    <td>Bell Church</td>
                    <td>Bell Church Rd, La Trinidad, Benguet</td>
                    <td>Secret</td>
                    <td><img src="./images/BellChurch.jpg" alt="" style="width: 25%"class="img-thumbnail"></td>
                    <td><button type="button" class="btn btn-dark my-2">Edit</button></td>
                    <td><button type="button" class="btn btn-dark my-2">Delete</button></td>
                </tr> -->
            </tbody>
        </table>
    </div>
    <script>
        function openMainPage() {
            window.location.href = "./index.php";
        }

        function openAddContentPage() {
            window.location.href = "./addnewcontent.php";
        }
    </script>
</body>
</html>