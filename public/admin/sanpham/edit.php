<?php
session_start();
require_once '../../../db/conf.php';
if (isset($_GET['id'])) {
    $product_id = $_GET['id'];
    $query = "SELECT * FROM product WHERE id=:pro_id LIMIT 1";
    $stmt = $conn->prepare($query);
    $data = [
        ':pro_id' => $product_id
    ];
    $stmt->execute($data);
    $pro =  $stmt->fetch(PDO::FETCH_ASSOC);
}
$query = "SELECT * FROM category_product";
$stmt = $conn->prepare($query);
$stmt->execute();
$result = $stmt->fetchAll();


if (isset($_POST['updatesp'])) {
    $id = $_POST['id'];
    $name_product = $_POST['name_product'];
    $description_product = $_POST['description_product'];
    $id_category = $_POST['id_category'];
    $price_product = $_POST['price_product'];
    $hot = $_POST['hot'];
    if (empty($_FILES['image']['name'])) {
        $image = $pro['image'];
    } else {
        $img = $_FILES['image']['name'];
        //tao bien tam
        $tmp_image = $_FILES['image']['tmp_name'];
        $div = explode('.', $img);
        $file_ext = strtolower(end($div));
        $unique_image = $div[0] . time() . '.' . $file_ext;
        //luu vao thu muc uploads
        $path_upload = "../uploads/" . $unique_image;
        move_uploaded_file($tmp_image, $path_upload);
        $image = $unique_image;
    }
    try {
        $query = "UPDATE product SET name_product=:name_product, description_product=:description_product, image=:image, id_category=:id_category, price_product=:price_product, hot=:hot WHERE id=:pro_id LIMIT 1";
        $stmt = $conn->prepare($query);
        $data = [
            ':name_product' => $name_product,
            ':description_product' => $description_product,
            ':image' => $image,
            ':id_category' => $id_category,
            ':price_product' => $price_product,
            ':hot' => $hot,
            ':pro_id' => $id
        ];

        $kq = $stmt->execute($data);
        if ($kq) {

            echo "<script>alert('Cập nhập sản phẩm thành công')</script>
			<script>window.location = 'view.php'</script>";
        } else {
            echo "<script>alert('Cập nhập sản phẩm thất bại')</script>
			<script>window.location = 'edit.php'</script>";
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin</title>
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
    <nav class="navbar navbar-expand-lg navbar-light bg-light" style="padding-left: 10%;">
        <a class="navbar-brand" href="../index.php">Admin</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="../dashboard.php">Home<span class="sr-only"></span></a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Danh mục
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="./category/add.php">Thêm</a>
                        <a class="dropdown-item" href="../category/view.php">Liệt kê</a>

                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Sản phẩm
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="../sanpham/add.php">Thêm</a>
                        <a class="dropdown-item" href="../sanpham/view.php">Liệt kê</a>

                </li>

            </ul>
            <!-- <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form> -->
        </div>
    </nav>
    <h1 class="text-center" style="font-weight:bold ; margin-top: 50px;">Update sản phẩm</h1>
    <div class="container">
        <div class="row">
            <div class="col-sm-8 offset-sm-2">
                <div class="">
                    <div class="card-header">

                    </div>
                    <div class="card-body">

                        <form autocomplete="off" method="post" class="form-horizontal" action="" enctype="multipart/form-data">

                            <input type="hidden" name="id" value="<?= $pro['id'] ?> ">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label" for="name">Tên sản phẩm</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="name_product" value="<?= $pro['name_product'] ?>" />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Mô tả</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="description_product" value="<?= $pro['description_product'] ?>" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Giá</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="price_product" value="<?= $pro['price_product'] ?>" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label" for="password">Img</label>
                                <div class="col-sm-5">
                                    <input type="file" name="image">
                                    <p><img src="../uploads/<?= $pro['image'] ?>" width="200" height="200"></p>
                                </div>
                            </div>
                            <select id="" name="id_category">
                                <option>--Lựa chọn danh mục--</option>
                                <?php foreach ($result as $cate) { ?>
                                    <option name="id_category" value="<?php echo $cate['id_category'] ?>" <?php echo ($cate['id_category'] == $pro['id_category'] ? 'selected' : '') ?>>
                                        <?php echo $cate['name_category'] ?></option>
                                <?php } ?>
                            </select>


                            <div class="form-group row" style="padding-left: 2%;">
                                <label class="col-sm-4 col-form-label">Hot</label>
                                <div class="col-sm-5">
                                    <label for="">
                                        <input type="radio" name="hot" value="1" <?php echo ($pro['hot'] == 1) ? 'checked' : '' ?> />Có
                                    </label>

                                    <label for="">
                                        <input type="radio" name="hot" value="0" <?php echo ($pro['hot'] == 0) ? 'checked' : '' ?> />Không
                                    </label>

                                </div>
                                <div class="row">
                                    <div class="col-sm-5 offset-sm-4">
                                        <button type="submit" class="btn btn-primary" name="updatesp">Update sản
                                            phẩm</button>
                                    </div>
                                </div>

                        </form>
                    </div>
                </div>
            </div> <!-- Cột nội dung -->
        </div> <!-- Dòng nội dung -->
    </div>

    <?php include('../../../incadmin/footer.php'); ?>
</body>