<?php include('../../db/conf.php');

session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Shop</title>
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="../css/style1.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
  </script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>
  <?php include '../../inc/header.php'  ?>
  <style>
    p {

      color: black;
    }
  </style>
  <div class="card-content">
    <h2 style="padding-top: 8px;">Sản phẩm</h2>
    <div class="row">
      <?php
      if (isset($_GET['id'])) {
        $pro_id = $_GET['id'];
        $query = "SELECT * FROM product WHERE id=:pro_id";
        $stmt = $conn->prepare($query);
        $data = [':pro_id' => $pro_id];
        $stmt->execute($data);
        $result =  $stmt->fetchAll();
      }
      if ($result) {
        foreach ($result as $row) {
      ?>
          <div class="col-md-3">
            <a href="#" style="text-decoration: none;">
              <div class="card">
                <img class="card-image-top" style="padding-left: 25px;" src="../admin/uploads/<?= $row['image'] ?>" alt="">
                <div class="card-body">
                  <h2 style="font-size: 16px; color:black;" class="card-titel text-center">
                    <?= $row['name_product'] ?></h2>

                  <h5 class="text-center"><?= $row['price_product'] ?></h5>
            </a>
            <div class="star text-center">
              <i class="fa fa-star checked"></i>
              <i class="fa fa-star checked"></i>
              <i class="fa fa-star checked"></i>
              <i class="fa fa-star checked"></i>
              <i class="fa fa-star checked"></i>
            </div>
            <div class="btn1">
              <button type="button">Add <i><img src="../icon/cart-add.png" alt=""></i></button>
            </div>
          </div>
    </div>
  </div>

  <div class="col-md-9">
    <div class="tab_content content_text_product content-module">
      <div class="box-title">
        <div class="title-bar">
          <h3>Thông số kỹ thuật</h3>
        </div>
      </div>
      <p>
        <?= $row['description_product'] ?>
      </p>
    </div>
  </div>
  </div>
<?php
        }
      }
?>
<div class="banner">
  <div class="banner-content">
    <div class="box-title">
      <div class="title-bar">
        <h3>Sản phẩm bán chạy</h3>
      </div>
      <div class="card-content">
        <div class="row">
          <?php
          $query = "SELECT * FROM product WHERE hot=1 ORDER BY id DESC";
          $stmt = $conn->prepare($query);
          $stmt->execute();
          $result =  $stmt->fetchAll();
          if ($result) {
            foreach ($result as $data) {
          ?>
              <div class="col-md-3">
                <a href="../page/chitietsanpham.php?id=<?= $data['id'] ?>
                   " style="text-decoration: none;">
                  <div class="card">
                    <div class="card-body">
                      <img class="card-image-top" style="    padding-left: 25px;" src="../admin/uploads/<?= $data['image'] ?>" alt="">
                      <h2 style="font-size: 16px; color:black;" class="card-titel text-center">
                        <?= $data['name_product'] ?></h2>

                      <h5 class="text-center"><?= $data['price_product'] ?></h5>
                </a>
                <div class="star text-center">
                  <i class="fa fa-star checked"></i>
                  <i class="fa fa-star checked"></i>
                  <i class="fa fa-star checked"></i>
                  <i class="fa fa-star checked"></i>
                  <i class="fa fa-star checked"></i>
                </div>

              </div>
              <button type="button" class="add btn btn-succsess">Add <i><img src="./icon/cart-add.png" alt=""></i></button>
        </div>
      </div>
  <?php
            }
          }
  ?>
  <?php include '../../inc/footer.php'  ?>
  <!-- Footer -->


</body>

</html>