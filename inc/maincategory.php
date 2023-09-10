<?php include('../../db/conf.php'); ?>
<div class="card-content" style="padding-top: 20px;">
    <div class="box-title">
        <?php
  if(isset($_GET['id'])){
    $cate_id = $_GET['id'];
    $query = "SELECT * FROM category_product WHERE id_category=:cate_id";
    $stmt = $conn->prepare($query);
    $data = [':cate_id' => $cate_id];
    $stmt->execute($data);
    $result =  $stmt->fetchAll();
  }
    if ($result) {
      foreach ($result as $row) {
    ?>
        <div class="title-bar">
            <h3><?= $row['name_category'] ?></h3>
        </div>

        <?php
      }
    }
    ?>

    </div>

    <div class="row">
        <?php
  $query = "SELECT * FROM product WHERE {$_GET['id']}=id_category";
  $stmt = $conn->prepare($query);
  $stmt->execute();
  $result =  $stmt->fetchAll();
  if ($result) {
    foreach ($result as $row) {
  ?>
        <div class="col-md-3">
            <a href="../page/chitietsanpham.php?id=<?= $row['id']?>" style="text-decoration: none;">
                <div class="card">
                    <div class="card-body">
                        <img class="card-image-top" style="padding-left: 25px;"
                            src="../admin/uploads/<?= $row['image'] ?>" alt="">
                        <h2 style="font-size: 16px; color:black;" class="card-titel text-center">
                            <?=  $row['name_product'] ?></h2>

                        <h5 class="text-center"><?=  $row['price_product'] ?></h5>
            </a>
            <div class="star text-center">
                <i class="fa fa-star checked"></i>
                <i class="fa fa-star checked"></i>
                <i class="fa fa-star checked"></i>
                <i class="fa fa-star checked"></i>
                <i class="fa fa-star checked"></i>
            </div>


        </div>
        <button type="button" class="add btn btn-succsess">Add <i><img src="../icon/cart-add.png" alt=""></i></button>
    </div>
</div>


<?php
      }
    }
    ?>

</div>
</div>


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
                                    <img class="card-image-top" style="    padding-left: 25px;"
                                        src="../admin/uploads/<?= $data['image'] ?>" alt="">
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
                    <button type="button" class="add btn btn-succsess">Add <i><img src="./icon/cart-add.png"
                                alt=""></i></button>
                </div>
            </div>
            <?php
            }
          }
  ?>