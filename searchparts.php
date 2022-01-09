<?php include "connect.php";
include "fxs.php";
function get_spare_parts($category)
{
  include "connect.php";
  $sql = "SELECT DISTINCT name,image FROM spare_parts WHERE spare_part_category='$category'";
  $statement = $conn->query($sql);
  if ($statement->rowCount() > 0) {
?>
    <?php
    while (($row = $statement->fetch(PDO::FETCH_ASSOC)) !== false) {
      $name = $row['name'];
      $img = $row['image'];
    ?>
      <div class="col-md-2 mb-3">
        <div class="spare-part-container">
          <a href="./spare_part_from_category.php?category=<?php echo "$category"; ?>&item=<?php echo "$name"; ?>">
            <img src="./images/uploads/<?php echo "$img"; ?>" alt="<?php echo $name ?>">
          </a>
          <span><?php echo $name; ?></span>
        </div>
      </div>
<?php
    }
  }
}
?>
<!DOCTYPE html>
<html class="no-js">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="x-ua-compatible" content="ie=edge" />
  <title>eCommerce Project</title>
  <meta name="description" content="" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <link rel="stylesheet" href="css/material-design-iconic-font.min.css" />
  <link rel="stylesheet" href="css/font-awesome.min.css" />
  <link rel="stylesheet" href="css/fontawesome-stars.css" />
  <link rel="stylesheet" href="css/meanmenu.css" />
  <link rel="stylesheet" href="css/owl.carousel.min.css" />
  <link rel="stylesheet" href="css/slick.css" />
  <link rel="stylesheet" href="css/animate.css" />
  <link rel="stylesheet" href="css/jquery-ui.min.css" />
  <link rel="stylesheet" href="css/venobox.css" />
  <link rel="stylesheet" href="css/nice-select.css" />
  <link rel="stylesheet" href="css/magnific-popup.css" />
  <link rel="stylesheet" href="css/bootstrap.min.css" />
  <link rel="stylesheet" href="css/helper.css" />
  <link rel="stylesheet" href="css/style.css" />
  <link rel="stylesheet" href="css/responsive.css" />
  <script src="js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
  <div class="body-wrapper">
    <?php include "./header.php"; ?>
    <!-- body -->
    <?php if (
      isset($_GET['vehicle']) &&
      isset($_GET['mark']) &&
      isset($_GET['model']) &&
      isset($_GET['fuel']) &&
      isset($_GET['engine']) &&
      isset($_GET['category'])
    ) {
      $vehicle = $_GET['vehicle'];
      $mark = $_GET['mark'];
      $model = $_GET['model'];
      $fuel = $_GET['fuel'];
      $engine = $_GET['engine'];
      $category = $_GET['category'];
    ?>
      <div class="container py-60">
        <div class="row">
          <div class="col-lg-3 order-lg-1 order-2">
            <div class="li-blog-sidebar-wrapper pr-2" style="border-right: 1px solid #e1e1e1;">
              <div class="p-2 w-100" style="background-color: #e1e1e1;">
                <h4 class="li-blog-sidebar-title m-0">PART CATEGORIES</h4>
              </div>
              <?php
              get_side_bar_car_categories();
              get_side_bar_truck_categories();
              get_side_bar_motocycles_categories(); ?>
            </div>
          </div>
          <div class="col-lg-9 order-lg-2 order-1">
            <div class="indicators-container">
              <button class="indicator start"><?php echo $vehicle; ?></button>
              <button class="indicator middle"><?php echo $mark; ?></button>
              <button class="indicator middle"><?php echo $model; ?></button>
              <button class="indicator middle"><?php echo $fuel; ?></button>
              <button class="indicator middle">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $engine; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>
              <button class="indicator end"><?php echo $category; ?></button>
            </div>
            <?php get_start_here_spare_parts($vehicle, $mark, $model, $fuel, $engine, $category); ?>
          </div>
        </div>
      </div>
    <?php } ?>

    <!-- body -->
    <?php include "footer.php"; ?>
  </div>
  </div>
  <script src="js/vendor/jquery-1.12.4.min.js"></script>
  <script src="js/vendor/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/ajax-mail.js"></script>
  <script src="js/jquery.meanmenu.min.js"></script>
  <script src="js/wow.min.js"></script>
  <script src="js/slick.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/isotope.pkgd.min.js"></script>
  <script src="js/imagesloaded.pkgd.min.js"></script>
  <script src="js/jquery.mixitup.min.js"></script>
  <script src="js/jquery.countdown.min.js"></script>
  <script src="js/jquery.counterup.min.js"></script>
  <script src="js/waypoints.min.js"></script>
  <script src="js/jquery.barrating.min.js"></script>
  <script src="js/jquery-ui.min.js"></script>
  <script src="js/venobox.min.js"></script>
  <script src="js/jquery.nice-select.min.js"></script>
  <script src="js/scrollUp.min.js"></script>
  <script src="js/main.js"></script>
</body>

</html>