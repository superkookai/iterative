<!DOCTYPE html>
<html lang="en">
    <head>
        <title>iterative Learning - Courses</title>
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
        <div class="container">
            <div class="row my-5 p-5 text-center title-style bg-success bg-gradient">
                <h1>Courses</h1>
            </div>
        </div>
        <div class="container">
            <div class="row">
            <?php
                include("connection.php");
                $sql = "SELECT * FROM Courses"; 
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    echo "<div class='col-lg-4 my-3'>";
                    echo "<div class='card style=\"width: 18rem;\"'>";
                    echo "<img src='images/".$row["coverImage"]."' class=\"card-img-top coverImage\" alt='...'>";
                    echo "<div class='card-body'>";
                    echo "<h5 class='card-title'>" .$row["title"]. "</h5>";
                    echo "<p class='card-text'>".$row["description"]. "</p>";
                    echo "<a href='courseDetail.php?CourseId=" .$row["courseId"]. "' class=\"btn btn-success bg-gradient\">Enroll</a>";
                    echo "</div></div></div>";
                }
                } else {
                    echo "0 results";
                }
                $conn->close();
            ?>                
            </div>
                
        </div>
        
    </body>
    <div class="container">
        <footer class="text-end bg-dark bg-gradient">
            &copy; Copyright of iterative Learning
        </footer>
    </div>
</html>