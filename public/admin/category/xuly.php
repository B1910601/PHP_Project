<?php
session_start();
include('../../../db/conf.php');

//them danh muc
if (isset($_POST['insert'])){
    $name = $_POST['name_category'];
    $des = $_POST['description'];

    $query = "INSERT INTO category_product (name_category, description) VALUES (:name_category,:description)";
    $stmt = $conn->prepare($query);
    $data = [
        'name_category' => $name,
        'description' => $des
    ];
    $stmt->execute($data);
    if($stmt) {
      echo"<script>alert('Thêm thành công')</script>
      <script>window.location = 'view.php'</script>";
    }else{
        echo"<script>alert('Thêm thất bại')</script>
      <script>window.location = 'add.php'</script>";
    }
}
//update and edit
if(isset($_POST['update'])){
    $cate_id = $_POST['id_category'];
    $name_category = $_POST['name_category'];
    $description = $_POST['description'];

    try {
        $query = "UPDATE category_product SET name_category=:name_category, description=:description WHERE id_category=:cate_id LIMIT 1";
        $stmt = $conn->prepare($query);
        $data = [
            ':name_category' => $name_category,
            ':description' => $description,
            ':cate_id' => $cate_id
        ];
       $query_exe = $stmt->execute($data);
       if($query_exe){
        echo"<script>alert('Update thành công')</script>
        <script>window.location = 'view.php'</script>";
       }else{
        echo"<script>alert('Update thất bại')</script>
        <script>window.location = 'edit.php'</script>";
       }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
//delete
if(isset($_POST['delete'])){
    $id = $_POST['delete'];
    try {
        $query = "DELETE FROM category_product WHERE id_category=:cate_id";
        $stmt= $conn->prepare($query);
        $data = [':cate_id' => $id];
       $result =  $stmt->execute($data);
       if($result){
        echo"<script>alert('Xoá thành công')</script>
        <script>window.location = 'view.php'</script>";
       }else{
        echo"<script>alert('Xoá không thành công')</script>
        <script>window.location = 'view.php'</script>";
       }

    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}



?>