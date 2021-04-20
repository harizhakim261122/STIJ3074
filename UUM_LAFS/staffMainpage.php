<!DOCTYPE html>
<html lang="en">

<head>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <title>Staff Mainpage</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- bootstrap css -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- style css -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Responsive-->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- fevicon -->
    <link rel="icon" href="images/fevicon.png" type="image/gif" />
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
    <!-- Tweaks for older IEs-->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->

<style>

body {
      background-color: #F5F5F5;
      }

.copyright {
      background-color: #00CC33;
      }

  /* Create three unequal columns that floats next to each other */
.column {
  float: left;
  padding: 80px;
}

/* Left and right column */
.column.side {
  width: 30%;
}

/* Middle column */
.column.middle {
  width: 50%;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive layout - makes the three columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
  .column.side, .column.middle {
    width: 100%;
  }
}
</style>

</head>
<!-- body -->

<body class="main-layout">
    <!-- loader  -->
    <div class="loader_bg">
        <div class="loader"><img src="images/loading.gif" alt="#" /></div>
    </div>
    <!-- end loader -->
    <!-- header -->
    <header>
        <!-- header inner -->
        <div class="header">
            <div class="container">
                <div class="row">
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
                        <div class="full">
                            <div class="center-desk">
                                <div class="logo"> <a href="staffMainpage.html"><img src="images/logo.png" alt="#"></a> </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
                        <div class="menu-area">
                            <div class="limit-box">
                                <nav class="main-menu">
                                    <ul class="menu-area-main">
                                        <li class="active"> <a href="staffMainpage.php">Home</a> </li>
                                        <li> <a href="register.html">Register</a> </li>
                                        <li> <a href="login.html">Login</a> </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end header inner -->
    </header>
    <!-- end header -->
    
    <section class="slider_section">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="images/uum.png" class="d-block w-100" alt="...">
              </div>
              <div class="carousel-item">
                <img src="images/security.png" class="d-block w-100" alt="...">
              </div>
              <div class="carousel-item">
                <img src="images/uumit.png" class="d-block w-100" alt="...">
              </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
    </section>

<?php
include_once("dbconnect.php");

//delete operation
if (isset($_COOKIE["timer"])){
    if (isset($_GET['operation'])) {
      $IDnumber = $_GET['IDnumber'];
      try {
        $sql = "DELETE FROM missing_items WHERE title='$title' AND category='$category'";
        $conn->exec($sql);
        echo "<script> alert('Record deleted successfully')</script>";
      } catch(PDOException $e) {
        echo "<script> alert('Error deleting record')</script>";
      }
    }
}

try {
    $sql = "SELECT * FROM missing_items";
    $stmt = $conn->prepare($sql );
    $stmt->execute();
    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $missing_items = $stmt->fetchAll();

    echo "<p><h1 align='center'>LOST AND FOUND ITEM</h1></p>";
        echo "<table border='1' align='center'>
        <tr>
        <th>Picture</th>
        <th>ID Number</th>
        <th>Title</th>
        <th>Category</th>
        <th>Description</th>
        <th>Storage Place</th>
        <th>Date Reported</th>
        <th>Location Found</th>
        </tr>";

        foreach($missing_items as $missing_items) {
            echo "<tr>";
            echo "<tr><td> <img src='laptop.jpg'".$missing_items['picture'].".jpg' width='150' height='100' class = 'center'> </td>";
            echo "<td>".$missing_items['IDnumber']."</td>";
            echo "<td>".$missing_items['title']."</td>";
            echo "<td>".$missing_items['category']."</td>";
            echo "<td>".$missing_items['description']."</td>";
            echo "<td>".$missing_items['storagePlace']."</td>";
            echo "<td>".$missing_items['dateFound']."</td>";
            echo "<td>".$missing_items['locationFound']."</td>";
            echo "<tr>";
        }
        echo "</table>";

        echo "<p><h1 align='center'>   </h1></p>";
        echo "<p><h1 align='center'>   </h1></p>";

    } catch(PDOException $e) {
      echo "Error: " . $e->getMessage();
    }
    $conn = null;

?>

    <!-- footer -->
    <footer>
        <div class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    </div>
                </div>
                <div class="row pdn-top-30">
                    <div class="col-xl-4 col-lg-3 col-md-3 col-sm-12">
                        <ul class="location_icon">
                            <li> <img src="icon/location.png"> <span>UUM Security Department<br>Universiti Utara Malaysia</span></li>
                        </ul>
                    </div>
                    <div class="col-xl-4 col-lg-3 col-md-3 col-sm-12">
                        <ul class="location_icon">
                            <li> <img src="icon/tellephone.png"><span>+604-928 3333<br>+604-928 2424</span></li>
                        </ul>
                    </div>
                    <div class="col-xl-4 col-lg-3 col-md-3 col-sm-12">
                        <ul class="location_icon">
                            <li> <img src="icon/email.png"><span>security@uum.edu.my<br>servicedesk@uum.edu.my</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright">
            <div class="container">
                <p>UUM INFORMATION TECHNOLOGY (UUMIT)</p>
            </div>
        </div>
    </footer>
    <!-- end footer -->
    <!-- Javascript files-->
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery-3.0.0.min.js"></script>
    <script src="js/plugin.js"></script>

    <!-- sidebar -->
    <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="js/custom.js"></script>
</body>

</html>