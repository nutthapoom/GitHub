<?php
  include_once('connect.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Management Slides | Volunteer</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">


    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head>
<!--/head-->

<body>
    <header id="header">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 overflow">
                    <div class="social-icons pull-right">
                        <ul class="nav nav-pills">
                            <li><a href=""><i class="fa fa-facebook"></i></a></li>
                            <li><a href=""><i class="fa fa-twitter"></i></a></li>
                            <li><a href=""><i class="fa fa-google-plus"></i></a></li>
                            <li><a href=""><i class="fa fa-dribbble"></i></a></li>
                            <li><a href=""><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="navbar navbar-inverse" role="banner">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.php">
                        <h1><img src="images/brand2.png" alt="logo"></h1>
                    </a>

                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="index.php">HOME</a></li>
                        <li class="dropdown"><a href="#">ABOUT <i class="fa fa-angle-down"></i></a>
                        <ul role="menu" class="sub-menu">
                            <li><a href="aboutus.html">About</a></li>
                            <li><a href="aboutus2.html">About 2</a></li>
                            <li><a href="service.html">Services</a></li>
                        </ul>
                        </li>
                        <li class="dropdown"><a href="blog.html">GALLERRY <i class="fa fa-angle-down"></i></a>
                            <ul role="menu" class="sub-menu">
                                <li><a href="blog.html">Blog Default</a></li>
                                <li><a href="blogtwo.html">Timeline Blog</a></li>
                                <li><a href="blogone.html">2 Columns + Right Sidebar</a></li>
                                <li><a href="blogthree.html">1 Column + Left Sidebar</a></li>
                                <li><a href="blogfour.html">Blog Masonary</a></li>
                                <li><a href="blogdetails.html">Blog Details</a></li>
                            </ul>
                        </li>
                        <li class="dropdown"><a href="portfolio.html">REPORT <i class="fa fa-angle-down"></i></a>
                            <ul role="menu" class="sub-menu">
                                <li><a href="portfolio.html">Portfolio Default</a></li>
                                <li><a href="portfoliofour.html">Isotope 3 Columns + Right Sidebar</a></li>
                                <li><a href="portfolioone.html">3 Columns + Right Sidebar</a></li>
                                <li><a href="portfoliotwo.html">3 Columns + Left Sidebar</a></li>
                                <li><a href="portfoliothree.html">2 Columns</a></li>
                                <li><a href="portfolio-details.html">Portfolio Details</a></li>
                            </ul>
                        </li>
                        <li><a href="shortcodes.html ">CONTACT US</a></li>
                    </ul>
                </div>
                <div class="search">
                    <form role="form">
                        <i class="fa fa-search"></i>
                        <div class="field-toggle">
                            <input type="text" class="search-form" autocomplete="off" placeholder="Search">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </header>
		<div class="container">
      <div class="b-blue">
        <h2>Table</h2>
        <p>The .table-responsive class creates a responsive table which will scroll horizontally on small devices (under 768px). When viewing on anything larger than 768px wide, there is no difference:</p>
      </div>

      <?php
        $query  = "select * from tbl_imgslide order by id asc";
        $res    = mysqli_query($connection,$query); ?>
          <div class="table-responsive">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>#</th>
                  <th class="cen">Image</th>
                  <th class="cen">Status</th>
                  <th class="cen">Date Up</th>
                  <th class="cen">Management</th>
                </tr>
              </thead>
              <tbody>
                <?php while($row=mysqli_fetch_array($res))
                {
                ?>
                <tr>
                  <td class="align-right"><?php echo $row["id"]; ?></td>
                  <td class="cen"><img class="mngIm" src="Slider/<?php echo $row["image"]; ?> "></td>
                  <td class="cen">
                    <select name="status">
                      <option value="0" <?php if ($row['status'] == 0) { ?>selected="selected"<?php } ?>>
                      Hidden
                      </option>
                      <option value="1" <?php if ($row['status'] == 1) { ?>selected="selected"<?php } ?>>
                      Show
                      </option>
                    </select>
                  </td>
                  <td class="cen"><?php echo $row["dateup"]; ?></td>
                  <td class="cen"><button type="button" class="btn btn-danger">Delete</button></td>
                </tr>
                      <?php
                    }
                ?>
              </tbody>
            </table>
          </div>
        </div>
        <footer id="footer">
            <div class="container">
                    <div class="col-sm-12">
                        <div class="copyright-text text-center">
                            <p>&copy; Rmuti Surin 2016. All Rights Reserved.</p>
                            <p>Designed by <a target="_blank" href="https://www.facebook.com/projectsurin"> Cs3 BaseBand</a></p>
                        </div>
                    </div>
                </div>
        </footer>
        <!--/#footer-->

    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>

</html>
