<?php
    include("connection.php");
    // INNER JOIN Chapter ON Courses.courseId = Chapter.courseId
    $sql = "SELECT * FROM Courses"; 
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $emparray = array();
        while($row = $result->fetch_assoc()) {
            $emparray[] = $row;
        }
        echo json_encode($emparray);
    } else {
        echo "0 results";
    }
    
    $conn->close();
?>