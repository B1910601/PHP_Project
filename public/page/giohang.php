<?php

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
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>
    <style>
        p{
            color: black;
        }
    </style>

    <?php include '../../inc/header.php' ?>
          <div class="box-title" style="padding-top: 20px;">
                  <div class="title-bar">
                     <h1>Giỏ hàng của bạn</h1>
                  </div>
               </div>
               <div class="content_text">
                  <div class="container_table">
                     <table class="table table-hover table-condensed">
                        <thead>
                           <tr class="tr tr_first">
                              <th >Hình ảnh</th>
                              <th>Tên sản phẩm</th>
                              <th>Mã sản phẩm</th>
                              <th >Giá</th>
                              <th style="width:100px;">Số lượng</th>
                              <th>Thành tiền</th>
                              <th style="width:50px; text-align:center;"></th>
                           </tr>
                        </thead>
                        <tbody>
                           <form action='' method="post">
                              <tr class="tr">
                                 <td data-th="Hình ảnh">
                                    <div class="col_table_image col_table_hidden-xs"><img src="../image/iphone1.jpg" alt="Máy in laser Canon LBP251DW" class="img-responsive"/></div>
                                 </td>
                                 <td data-th="Sản phẩm">
                                    <div class="col_table_name">
                                       <h4 class="nomargin">Iphone 1</h4>
                                    </div>
                                 </td>
                                 <td data-th="Mã sản phẩm">
                                    <div class="col_table_name">
                                       <h4 class="nomargin">Iphone 1</h4>
                                    </div>
                                 </td>
                                 <td data-th="Giá"><span class="color_red font_money">0</span></td>
                                 <td data-th="Số lượng">
                                    <div class="clear margintop5">
                                       <div class="floatleft"><input type="number" class="inputsoluong" name="qty[576]"  value="1"></div>
                                       <input type="hidden" name="check" value="999">
                                       <div class="floatleft width50">
                                          <button class="btn_df btn_table_td_rf_del btn-sm">
                                          <i class="fa fa-refresh"></i></button>
                                       </div>
                                    </div>
                                    <div class="clear"></div>
                                 </td>
                                 <td data-th="Thành tiền" class="text_center"><span class="color_red font_money">0 đ</span></td>
                                 <td class="actions aligncenter" data-th="">
                                    <a onclick="return del(576,'Máy in laser Canon LBP251DW');" class="btn_df btn_table_td_rf_del btn-sm"><i class="fa fa-trash-o"></i> <span class="display_mobile">Xóa sản phẩm</span></a>                          
                                 </td>
                              </tr>
                           </form>
                           <tr>
                              <td colspan="7" class="textright_text">
                                 <div class="sum_price_all">
                                    <span class="text_price">Tổng tiền thành toán</span>: 
                                    <span class="text_price color_red">0 đ</span>
                                 </div>
                              </td>
                           </tr>
                        </tbody>
                        <tfoot>
                           <tr class="tr_last">
                              <td colspan="7">
                                 <a href="." class="btn_df btn_table floatleft"><i class="fa fa-long-arrow-left"></i> Tiếp tục mua hàng</a>
                                 <div class="clear"></div>
                              </td>
                           </tr>
                        </tfoot>
                     </table>
                  </div>
                  <div class="contact_form">
                     <div class="contact_left">
                        <div class="ch-contacts-details">
                           <ul class="contact-list">
                              <li class="addr">
                                 <strong class="title">Địa chỉ của chúng tôi</strong>
                                 <p><em><strong>3tmobile</strong></em><br />
                                 <p>Trung Tâm Bán Hàng:</p>
                                 <p>CN1: 333B Minh Phụng, Phường 2, Quận 11, HCM</p>
                                 <p>CN2: 548 Lý Thái Tổ, Phường 10, Quận 10, HCM</p>
                                 <p>N3: 297 Quang Trung, Phường 10, Q. Gò Vấp, HCM</p>
                                 <p> CN4: 72 Đinh Tiên Hoàng, Phường 01, Q. Bình Thạnh, HCM</p>
                                 <p> Hotline: 0888 70 8284 - 0936 11 7080 (zalo)</p>
                                 </p>
                              </li>
                           </ul>
                           <div class="hiring-box">
                              <strong class="title">Chào bạn!</strong>
                              <p>Mọi thắc mắc bạn hãy gửi về mail của chúng tôi <strong>3tmobile@webextrasite.com</strong> chúng tôi sẽ giải đáp cho bạn.</p>
                              <p><a href="." class="arrow-link"><i class="fa fa-long-arrow-left" aria-hidden="true"></i> Về trang chủ</a></p>
                           </div>
                        </div>
                     </div>
                     <div class="contact_right">
                        <div class="form_contact_in">
                           <div class="box_contact">
                              <form name="FormDatHang" method="post" action="gio-hang/" >
                                 <div class="content-box_contact">
                                    <div class="row">
                                       <div class="input">
                                          <label>Họ và tên: <span style="color:red;">*</span></label>
                                          <input type="text" name="txtHoTen" required class="clsip">
                                       </div>
                                       <div class="clear"></div>
                                    </div>
                                    <!---row---->
                                    <div class="row">
                                       <div class="input">
                                          <label>Số điện thoại: <span style="color:red;">*</span></label>
                                          <input type="text" name="txtDienThoai" required onkeydown="return checkIt(event)" class="clsip">
                                       </div>
                                       <div class="clear"></div>
                                    </div>
                                    <!---row---->
                                    <div class="row">
                                       <div class="input">
                                          <label>Địa chỉ: <span style="color:red;">*</span></label>
                                          <input type="text" name="txtDiaChi" required class="clsip" >
                                       </div>
                                       <div class="clear"></div>
                                    </div>
                                    <!---row---->
                                    <div class="row">
                                       <div class="input">
                                          <label>Email: <span style="color:red;">*</span></label>
                                          <input type="text" name="txtEmail" onchange="return KiemTraEmail(this);" required class="clsip">
                                       </div>
                                       <div class="clear"></div>
                                    </div>
                                    <!---row---->
                                    <div class="row">
                                       <div class="input">
                                          <label>Nội dung: <span style="color:red;">*</span></label>
                                          <textarea type="text" name="txtNoiDung" class="clsipa"></textarea>
                                       </div>
                                       <div class="clear"></div>
                                    </div>
                                    <!---row---->
                                    <div class="row btnclass">
                                       <div class="input ipmaxn ">
                                          <input type="submit" class="btn-gui" name="frmSubmit" id="frmSubmit" value="Gửi đơn hàng">
                                          <input type="reset" class="btn-gui" value="Nhập lại">
                                       </div>
                                       <div class="clear"></div>
                                    </div>
                                    <!---row---->
                           
                                 </div>
                              </form>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
   






       
       <!-- Footer -->
       <div class="footer" style="padding-top: 50%;">
        <footer class="site-footer">
         <div class="container">
           <div class="row">
             <div class="col-sm-12 col-md-6">
               <h6>About</h6>
               <p class="text-justify">Cửa hàng chúng tôi cung cấp các dịch vụ digital marketing a-z, giúp các doanh nghiệp tiếp cận lượng khách hàng tiềm năng nhất để bán hàng tốt và sinh lợi nhuận</p>
             </div>
   
             <div class="col-xs-6 col-md-3">
               <h6>Categories</h6>
               <ul class="footer-links">
                 <li><a href="">ASUS</a></li>
                 <li><a href="">DELL</a></li>
                 <li><a href="">HP</a></li>
                 <li><a href="">Macbook</a></li>
                 <li><a href="">MSI</a></li>
                 <li><a href="">Thinkspad</a></li>
               </ul>
             </div>
   
             <div class="col-xs-6 col-md-3">
               <h6>Quick Links</h6>
               <ul class="footer-links">
                 <li><a href="./about.php">About Us</a></li>
                 <li><a href="./contactus.php">Contact Us</a></li>
                
               </ul>
             </div>
           </div>
           <hr>
         </div>
         <div class="container">
           <div class="row">
             <div class="col-md-8 col-sm-6 col-xs-12">
               <p class="copyright-text">Copyright &copy; 2017 All Rights Reserved by 
            <a href="#">Scanfcode</a>.
               </p>
             </div>
   
             <div class="col-md-4 col-sm-6 col-xs-12">
               <ul class="social-icons">
                 <li><a class="facebook" href="#"><i class="fab fa-facebook"></i></a></li>
                 <li><a class="twitter" href="#"><i class="fab fa-twitter"></i></a></li>
                 <li><a class="dribbble" href="#"><i class="fab fa-dribbble"></i></a></li>
                 <li><a class="linkedin" href="#"><i class="fab fa-linkedin"></i></a></li>   
               </ul>
             </div>
           </div>
         </div>
   </footer>
 </div>
     <!-- Footer Links -->
   
     <!-- Copyright -->
     <div class="footer-copyright text-center py-3 copy">© 2020 Copyright:
       <a href="/"> MDBootstrap.com</a>
     </div>
     <!-- Copyright -->
   
   </footer>
   <!-- Footer -->
</div>
</div>

<script src="./js/main.js"></script>
</body>
</html>