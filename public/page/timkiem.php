<?php
include('../../db/conf.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop</title>
    <link rel="stylesheet" href="../css/main.css">
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
    <?php include('../../inc/header.php'); ?>
    <?php include('../../inc/sileder.php'); ?>
    <div class="card-content" style="padding-top: 20px;">
        <div class="box-title">
            <div class="title-bar">
                <h3>Sản phẩm</h3>
            </div>
        </div>
        <div class="row">
            <?php
            if (isset($_POST['tukhoa'])) {
                $tukhoa = $_POST['tukhoa'];
            } else {
                $tukhoa = '';
            }
            $query = "SELECT * FROM product WHERE product.name_product LIKE '%" . $tukhoa . "%'";
            $stmt = $conn->prepare($query);
            $stmt->execute();
            $result =  $stmt->fetchAll();
            foreach ($result as $row) {
            ?>
                <div class="col-md-3" style="padding-top: 20px;">

                    <a href="../page/chitietsanpham.php?id=<?= $row['id'] ?>" style="text-decoration: none;">
                        <div class="card">
                            <div class="card-body">
                                <img class="card-image-top" style="padding-left: 25px;" src="../admin/uploads/<?= $row['image'] ?>" alt="">
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


                </div>
                <button type="button" class="add btn btn-succsess">Add <i><img src="../icon/cart-add.png" alt=""></i></button>
        </div>
    </div>
<?php
            }

?>
<!-- Footer -->
<?php include '../../inc/footer.php' ?>
</div>
</div>



</body>

</html>