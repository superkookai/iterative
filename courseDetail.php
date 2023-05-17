<?php
  session_start();
  if (!isset($_SESSION["email"]))
  { 
    echo "<script>alert('You have to log in first !!!');window.location='signin.html';</script>"; 
    }
  else
  { 
    include("connection.php");
    $CourseId = $_REQUEST["CourseId"];
    $email = $_SESSION["email"];
      
    $sql = "SELECT * FROM Users WHERE email='$email'";
    $result = $conn->query($sql);
    while($row = $result->fetch_assoc()){
        $uid = $row["uid"];
    }
    
    $enDate = date("Y-m-d");
    $status = "Start";

    $sql = "INSERT INTO Enroll (uid, courseId, enDate, status)
    VALUES ('$uid','$CourseId','$enDate','$status')";
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Enroll successfully');</script>" ;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();

    
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>iterative Learning - Course Detail</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

        <!-- Include the icon fonts stylesheet — in the website <head> -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">  

    </head>
    <body>
        <div class="container">
            <nav class="navbar navbar-expand-md navbar-dark bg-dark bg-gradient"> 
                <div class="container-fluid">
                <a class="navbar-brand" href="courses.php"><i class="bi bi-info-square"></i>   iterative Learning</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                aria-expanded="false" aria-label="Toggle navigation"> 
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="courses.php">Courses</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pricing.html">Pricing</a> 
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="signin.html">Sign-in</a> 
                    </li>
                    </ul>
                </div>
                </div>
            </nav>
        </div>
        <?php
                    include("connection.php");
                    $CourseId = $_REQUEST["CourseId"];

                    $sql = "SELECT title FROM Courses WHERE courseId=$CourseId";
                    $result = $conn->query($sql);
                    while($row = $result->fetch_assoc()) {
                        echo "<div class='container'>";
                        echo "<div class='row my-5 p-5 text-center title-style bg-success bg-gradient'>";
                        echo "<h1>".$row["title"]."</h1>";
                        echo "</div></div>";
                        echo "<div class='container'>";
                        echo "<div class='row m-5 p-5 col-lg-12'>";
                        echo "<nav>";
                        echo "<div class='nav nav-tabs' id='nav-tab' role='tablist'>";
                        echo "<button class='nav-link active' id='nav-home-tab' data-bs-toggle='tab' data-bs-target='#nav-home' type='button' role='tab' aria-controls='nav-home' aria-selected='true'>Overview</button>";
                    }

                    $sql = "SELECT * FROM Courses INNER JOIN Chapter ON Courses.courseId = Chapter.courseId WHERE Courses.courseId=$CourseId"; 
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                        
                        echo "<button class='nav-link' id='nav-profile-tab' data-bs-toggle='tab' data-bs-target='#nav-" .$row["chTitle"]. "' type='button' role='tab' aria-controls='nav-profile' aria-selected='false'>" .$row["chTitle"]."</button>";

                    }
                    } else {
                        echo "0 results";
                    }

                    echo "</div>";
                    echo "</nav>";
                    echo "<div class='tab-content' id='nav-tabContent'>";
                    
                    $sql = "SELECT description FROM Courses WHERE courseId=$CourseId";
                    $result = $conn->query($sql);
                    while($row = $result->fetch_assoc()) {
                        echo "<div class='tab-pane fade show active p-4' id='nav-home' role='tabpanel' aria-labelledby='nav-home-tab'>" .$row["description"]. "</div>";
                    }

                    $sql = "SELECT * FROM Courses INNER JOIN Chapter ON Courses.courseId = Chapter.courseId WHERE Courses.courseId=$CourseId"; 
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                        echo "<div class='tab-pane fade p-4' id='nav-" .$row["chTitle"]. "' role='tabpanel' aria-labelledby='nav-profile-tab'>" .$row["chDesc"]. "</div>";
                    }
                    } else {
                        echo "0 results";
                    }

                    echo "</div>";
                    echo "</div></div>";

                    $conn->close();
        ?>
            
    
    </body>
    <div class="container">
        <footer class="text-end bg-dark bg-gradient">
            &copy; Copyright of iterative Learning
        </footer>
    </div>
</html>
<?php
  }
?>