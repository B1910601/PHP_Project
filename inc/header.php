<?php
$db_username = 'root';
$db_password = '';
$conn = new PDO('mysql:host=localhost;dbname=ct275_project', $db_username, $db_password);
if (!$conn) {
    die("Fatal Error: Connection Failed!");
} ?>
<header style="  position: -webkit-sticky;
    position: sticky;
    top: 0; z-index: 999999; ">
    <div id="cantainer-background">
        <nav class="navbar navbar-expand-md" id="navbar-color">
            <!-- Brand -->
            <a class="navbar-brand" href="#" id="logo">Shop</a>
            <div class="menu_top navbar navbar-expand-md" style="margin-left: 20%;">
                <form class="search_form" method="post" action="../page/timkiem.php?timkiem=timkiem">
                    <input class="searchTerm" name="tukhoa" placeholder="Nhập từ cần tìm..." />
                    <input class="searchButton" type="submit" name="timkiem" value="search">

                </form>
            </div>
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="../page/giohang.php" style="margin-right: 8px;"> <i class="fa-solid fa-cart-shopping"></i></a>
                    </li>
                    <?php if (!isset($_SESSION['user'])) : ?>
                        <li class="nav-item">
                            <a class="nav-link" href="../page/resgister.php">Đăng ký</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="../page/login.php">Đăng nhập</a>
                        </li>
                    <?php endif ?>
                    <?php if (isset($_SESSION['user'])) : ?>
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?php echo $_SESSION['user']['name'] ?>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="nav-link" href="../page/logout.php">Thoát</a>

                            </div>
                        </div>

                    <?php endif ?>






            </div>
        </nav>

        <div class="btn_menu_search">
            <div class="bg_in">
                <div class="table_row_search">
                    <div class="menu_top_cate">
                        <div class="">
                            <div class="menu" id="menu_cate">
                                <div class="menu_left">
                                    <i class="fa fa-bars" aria-hidden="true"></i> Danh mục sản phẩm
                                </div>
                                <div class="cate_pro">
                                    <div id='cssmenu_flyout' class="display_destop_menu">
                                        <ul>
                                            <?php
                                            $query = "SELECT * FROM category_product ORDER BY id_category DESC";
                                            $stmt = $conn->prepare($query);
                                            $stmt->execute();
                                            $result =  $stmt->fetchAll();
                                            foreach ($result as $row) {
                                            ?>
                                                <li class='active has-sub'>
                                                    <a href='../page/danhmuc.php?id=<?= $row['id_category']; ?>'><span><?= $row['name_category'] ?></span></a>



                                                </li>

                                            <?php
                                            }

                                            ?>








                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php include('menu.php') ?>
                    <div class="clear"></div>
                </div>
            </div>
            <div class="clear"></div>
        </div>
    </div>
</header>