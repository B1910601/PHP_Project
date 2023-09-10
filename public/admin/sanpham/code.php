<?php
require_once '../../../db/conf.php';

if (isset($_POST['insertsp'])) {
    $iddm = $_POST['iddm'];
    $name = $_POST['name_product'];
    $price = $_POST['price_product'];
    $img = $_FILES['image']['name'];
    //tao bien tam
    $tmp_image = $_FILES['image']['tmp_name'];
    //tach dui mo rong voi ten cua hinh anh
    $div = explode('.', $img);
    //doi tat ca thanh chu thuong ham` end lay duoi mo rong
    $file_ext = strtolower(end($div));
    $unique_image = $div[0] . time() . '.' . $file_ext;
    //luu vao thu muc uploads
    $path_upload = "../uploads/" . $unique_image;
    $des = $_POST['description_product'];
    $hot = $_POST['hot'];
    $query = "INSERT INTO product (name_product, description_product, image, id_category, price_product, hot) 
    VALUES (:name_product, :description_product, :image, :id_category, :price_product, :hot )";
    $stmt = $conn->prepare($query);
    $data = [
        'name_product' => $name,
        'description_product' => $des,
        'image' => $unique_image,
        'id_category' => $iddm,
        'price_product' => $price,
        'hot' => $hot,
    ];
    $result = $stmt->execute($data);
    if ($result == 1) {
        move_uploaded_file($tmp_image, $path_upload);
        echo "<script>alert('Thêm thành công')</script>
      <script>window.location = 'view.php'</script>";
    } else {
        echo "<script>alert('Thêm thất bại')</script>
      <script>window.location = 'add.php'</script>";
    }
}

//update and edit
if (isset($_POST['updatesp'])) {
    $id = $_POST['id'];
    $name = $_POST['name_product'];
    $des = $_POST['description_product'];
    $iddm = $_POST['iddm'];
    $price = $_POST['price_product'];
    if (isset($_POST['hot']) && ($_POST['hot'])) {
        $hot = 1;
    } else {
        $hot = 0;
    }


    if (empty($_FILES['image']['name'])) {
        $img = $_POST['image'];
    } else {
        echo 'chon anh';
    }

    $img = $_FILES['image']['name'];
    //tao bien tam
    $tmp_image = $_FILES['image']['tmp_name'];
    $div = explode('.', $img);
    $file_ext = strtolower(end($div));
    $unique_image = $div[0] . '.' . $file_ext;
    //luu vao thu muc uploads
    $path_upload = "../uploads/" . $unique_image;
    $query = "UPDATE product SET name_product= :name, description_product= :des, image= :img, category_id= :iddm, price_product= :price,hot= :hot WHERE id=:pro_id LIMIT 1";
    $stmt = $conn->prepare($query);
    $data = [
        'name_product' => $name,
        'description_product' => $des,
        'image' => $img,
        'category_id' => $iddm,
        'price_product' => $price,
        'hot' => $hot,
        'pro_id' => $id
    ];
    $kq = $stmt->execute($data);
    if ($kq) {
        echo "<script>alert('Cập nhập sản phẩm thành công')</script>
			<script>window.location = 'view.php'</script>";
    } else {
        echo "<script>alert('Cập nhập sản phẩm thất bại')</script>
			<script>window.location = 'edit.php'</script>";
    }
}



//delete
if (isset($_POST['delete'])) {
    $id = $_POST['delete'];
    try {
        $query = "DELETE FROM product WHERE id=:pro_id";
        $stmt = $conn->prepare($query);
        $data = [':pro_id' => $id];
        $result =  $stmt->execute($data);
        if ($result) {
            header('location:view.php');
        } else {
            echo "<script>alert('Xoá không thành công')</script>
        <script>window.location = 'view.php'</script>";
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
