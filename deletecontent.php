<?php
    include "database.php";

    if (isset($_GET['deleteid'])) {
        $row_id = $_GET['deleteid'];

        $sql = "SELECT * FROM `main_page` WHERE id = ?";
    
        $stmt = $con->prepare($sql);
        $stmt->bind_param("i", $row_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $uimage = $row['image'];
        $stmt->close();

        if (file_exists($uimage)) {
            if (unlink($uimage)) {
                echo "File deleted successfully.";
            } else {
                echo "Error deleting the file.";
            }
        } else {
            echo "The file does not exist.";
        }

        $delsql = "DELETE FROM `main_page` WHERE id = ?";

        $delstmt = $con->prepare($delsql);
        $delstmt->bind_param("i", $row_id);
        $delstmt->execute();

        // Check if the deletion was successful
        if ($delstmt->affected_rows > 0) {
            header("location: ./administrationpanel.php?admpanelallowed=true");
        } else {
            header("location: ./administrationpanel.php?admpanelallowed=true");
        }

        $delstmt->close();
    }
?>