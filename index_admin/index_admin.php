<!DOCTYPE html>
<html lang="en">

<head>
   <!-- basic -->
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
   <!-- mobile metas -->
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta name="viewport" content="initial-scale=1, maximum-scale=1">
   <!-- site metas -->
   <title>Pluto - Responsive Bootstrap Admin Panel Templates</title>
   <meta name="keywords" content="">
   <meta name="description" content="">
   <meta name="author" content="">
   <!-- site icon -->
   <link rel="icon" href="images/fevicon.png" type="image/png" />
   <!-- bootstrap css -->
   <link rel="stylesheet" href="css/bootstrap.min.css" />
   <!-- site css -->
   <link rel="stylesheet" href="style.css" />
   <!-- responsive css -->
   <link rel="stylesheet" href="css/responsive.css" />
   <!-- color css -->
   <link rel="stylesheet" href="css/colors.css" />
   <!-- select bootstrap -->
   <link rel="stylesheet" href="css/bootstrap-select.css" />
   <!-- scrollbar css -->
   <link rel="stylesheet" href="css/perfect-scrollbar.css" />
   <!-- custom css -->
   <link rel="stylesheet" href="css/custom.css" />
   <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->

   <style>
   </style>
</head>

<?php
include "../database.php";
include "../uploadImage.php";
$kq = ketnoi("SELECT id, name, img, price, quantity, hot, sale FROM shoes");
if (isset($_GET['edit'])) $index = $_GET['edit'];
if (isset($_GET['del'])) {
   $delId = $_GET['del'];
   deleteDB($delId);
   header("Location: index_admin.php");
}
if (isset($_POST["editProduct"]) && ($_POST["editProduct"])) {
   $id = $_POST['id'];
   $image = $_POST['image'];
   $name = $_POST["name"];
   $price = $_POST["price"];
   $hot = $_POST["hot"];
   ///////
   updateDB("UPDATE shoes SET name='$name', img='$image', price='$price' WHERE id='$id'");
   // $sql = "INSERT INTO dienthoai (id,tensanpham,gia,imageurl) VALUES ('$id','$name','$price','$img')";
   // $conn->exec($sql);  
   header("Location: index_admin.php");
}

if (isset($_POST["addProduct"]) && ($_POST["addProduct"])) {
   $id = $_POST['id'];
   //$image = $_POST['img'];
   $image = uploadImage();
   $name = $_POST["name"];
   $price = $_POST["price"];
   $quantity = 1;
   $hot = $_POST["hot"];
   $sale = $_POST["sale"];
   ketnoi("INSERT INTO shoes (id,name,price,img,quantity,hot,sale) VALUES ('$id','$name','$price','$image','$quantity','$hot','$sale')");
   header("Location: index_admin.php");
}
?>

<body style='background-color: #15283c' class="dashboard dashboard_1">
   <div class="full_container">
      <div class="inner_container">
         <!-- Sidebar  -->
         <nav id="sidebar">
            <div class="sidebar_blog_1">
               <div class="sidebar-header">
                  <div class="logo_section">
                     <a href="index.html"><img class="logo_icon img-responsive" src="images/logo/logo_icon.png" alt="#" /></a>
                  </div>
               </div>
               <div class="sidebar_user_info">
                  <div class="icon_setting"></div>
                  <div class="user_profle_side">
                     <div class="user_img"><img class="img-responsive" src="images/layout_img/user_img.jpg" alt="#" /></div>
                     <div class="user_info">
                        <h6>John David</h6>
                        <p><span class="online_animation"></span> Online</p>
                     </div>
                  </div>
               </div>
            </div>
            <div class="sidebar_blog_2">
               <h4>General</h4>
               <ul class="list-unstyled components">
                  <li class="active">
                     <a href="#dashboard" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-dashboard yellow_color"></i> <span>Dashboard</span></a>
                     <ul class="collapse list-unstyled" id="dashboard">
                        <li>
                           <a href="dashboard.html">> <span>Default Dashboard</span></a>
                        </li>
                        <li>
                           <a href="dashboard_2.html">> <span>Dashboard style 2</span></a>
                        </li>
                     </ul>
                  </li>
                  <li><a href="widgets.html"><i class="fa fa-clock-o orange_color"></i> <span>Widgets</span></a></li>
                  <li>
                     <a href="#element" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-diamond purple_color"></i> <span>Elements</span></a>
                     <ul class="collapse list-unstyled" id="element">
                        <li><a href="general_elements.html">> <span>General Elements</span></a></li>
                        <li><a href="media_gallery.html">> <span>Media Gallery</span></a></li>
                        <li><a href="icons.html">> <span>Icons</span></a></li>
                        <li><a href="invoice.html">> <span>Invoice</span></a></li>
                     </ul>
                  </li>
                  <li><a href="tables.html"><i class="fa fa-table purple_color2"></i> <span>Tables</span></a></li>
                  <li>
                     <a href="#apps" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-object-group blue2_color"></i> <span>Apps</span></a>
                     <ul class="collapse list-unstyled" id="apps">
                        <li><a href="email.html">> <span>Email</span></a></li>
                        <li><a href="calendar.html">> <span>Calendar</span></a></li>
                        <li><a href="media_gallery.html">> <span>Media Gallery</span></a></li>
                     </ul>
                  </li>
                  <li><a href="price.html"><i class="fa fa-briefcase blue1_color"></i> <span>Pricing Tables</span></a></li>
                  <li>
                     <a href="contact.html">
                        <i class="fa fa-paper-plane red_color"></i> <span>Contact</span></a>
                  </li>
                  <li class="active">
                     <a href="#additional_page" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-clone yellow_color"></i> <span>Additional Pages</span></a>
                     <ul class="collapse list-unstyled" id="additional_page">
                        <li>
                           <a href="profile.html">> <span>Profile</span></a>
                        </li>
                        <li>
                           <a href="project.html">> <span>Projects</span></a>
                        </li>
                        <li>
                           <a href="login.html">> <span>Login</span></a>
                        </li>
                        <li>
                           <a href="404_error.html">> <span>404 Error</span></a>
                        </li>
                     </ul>
                  </li>
                  <li><a href="map.html"><i class="fa fa-map purple_color2"></i> <span>Map</span></a></li>
                  <li><a href="charts.html"><i class="fa fa-bar-chart-o green_color"></i> <span>Charts</span></a></li>
                  <li><a href="settings.html"><i class="fa fa-cog yellow_color"></i> <span>Settings</span></a></li>
               </ul>
            </div>
         </nav>
         <!-- end sidebar -->
         <!-- right content -->
         <div style='background-color: #15283c' id="content">
            <!-- topbar -->
            <div class="topbar">
               <nav class="navbar navbar-expand-lg navbar-light">
                  <div class="full">
                     <button type="button" id="sidebarCollapse" class="sidebar_toggle"><i class="fa fa-bars"></i></button>
                     <div class="logo_section">
                        <a href="index.html"><img class="img-responsive" src="images/logo/logo.png" alt="#" /></a>
                     </div>
                     <div class="right_topbar">
                        <div class="icon_info">
                           <ul>
                              <li><a href="#"><i class="fa fa-bell-o"></i><span class="badge">2</span></a></li>
                              <li><a href="#"><i class="fa fa-question-circle"></i></a></li>
                              <li><a href="#"><i class="fa fa-envelope-o"></i><span class="badge">3</span></a></li>
                           </ul>
                           <ul class="user_profile_dd">
                              <li>
                                 <a class="dropdown-toggle" data-toggle="dropdown"><img class="img-responsive rounded-circle" src="images/layout_img/user_img.jpg" alt="#" /><span class="name_user">John David</span></a>
                                 <div class="dropdown-menu">
                                    <a class="dropdown-item" href="profile.html">My Profile</a>
                                    <a class="dropdown-item" href="settings.html">Settings</a>
                                    <a class="dropdown-item" href="help.html">Help</a>
                                    <a class="dropdown-item" href="#"><span>Log Out</span> <i class="fa fa-sign-out"></i></a>
                                 </div>
                              </li>
                           </ul>
                        </div>
                     </div>
                  </div>
               </nav>
            </div>
            <!-- end topbar -->
            <!-- dashboard inner -->













            <!-- bắt đầu admin -->
            <form action="" method="post" class="m-4" enctype="multipart/form-data">
               <div class="row">
                  <div class="col-6">
                     <label class="form-label">Nhập ID sản phẩm</label>
                     <input style="background-color: #0d1c2c; color: white;" class="form-control" type="text" name="id" value="<?php if (isset($index)) echo $kq[$index]['id'] ?>">
                     <label class="form-label">Tên sản phẩm</label>
                     <input style="background-color: #0d1c2c; color: white;" class="form-control" type="text" name="name" value="<?php if (isset($index)) echo $kq[$index]['name'] ?>">
                     <label class="form-label">Số lượng mua</label>
                     <input style="background-color: #0d1c2c; color: white;" class="form-control" type="text" name="quantity" disabled value="1">
                     <label class="form-label">Đánh giá sản phẩm hot</label>
                     <input style="background-color: #0d1c2c; color: white;" class="form-control" type="text" name="hot" value="<?php if (isset($index)) echo $kq[$index]['hot'] ?>">
                     <br>
                     <input type="submit" class="btn btn-primary" name="addProduct" value="Thêm sản phẩm">
                     <input type="submit" class="btn btn-warning" name="editProduct" value="Cập nhật sản phẩm">
                  </div>
                  <div class="col-6">
                     <label class="form-label">Nhập URL hình ảnh</label>
                     <input style="background-color: #0d1c2c; color: white;" disabled class="form-control" type="text" name="image" value="<?php if (isset($index)) echo $kq[$index]['img'] ?>">
                     <label for="form-label">Tải hình ảnh sản phẩm</label>
                     <input style="background-color: #0d1c2c; color: white;" type="file" name="fileToUpLoad" class="form-control">
                     <label class="form-label">Giá sản phẩm</label>
                     <input style="background-color: #0d1c2c; color: white;" class="form-control" type="text" name="price" value="<?php if (isset($index)) echo $kq[$index]['price'] ?>">
                     <label class="form-label">Số lượng đã bán</label>
                     <input style="background-color: #0d1c2c; color: white;" class="form-control" type="text" name="sale" value="<?php if (isset($index)) echo $kq[$index]['sale'] ?>">
                  </div>
               </div>

            </form>
            <div style='background-color: #15283c' class="card m-4 shadow">
               <div class="card-header">Quản lý sản phẩm</div>
               <div class="card-body">
                  <table class="table table-sm">
                     <tr style='color: white'>
                        <th>STT</th>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Poster</th>
                        <th>Price</th>
                        <th>Hot</th>
                        <th>Sold</th>
                        <th>Change</th>
                     </tr>
                     <?php
                     $stt = 1;
                     foreach ($kq as $index => $item) {
                        echo "   
                               <tr>
                                   <td>$stt</td>
                                   <td style='color: white'>" . $item["id"] . "</td>
                                   <td style='color: white'>" . $item["name"] . "</td>
                                   <td> <img  src='" . "../" . $item["img"] . "' style='width:100px; height:110px;'> </td>
                                   <td style='color: white'>" . $item["price"] . "</td>
                                   <td style='color: white'>" . $item["hot"] . "</td>
                                   <td style='color: white'>" . $item["sale"] . "</td>
                                   <td><a style='color: white' href='index_admin.php?edit=" . $index . "'>Sửa</a> / 
                                       <a style='color: white' href='index_admin.php?del=" . $item["id"] . "'>Xóa</a></td>
                                   </tr>
                                   ";
                        $stt++;
                     }
                     ?>
                  </table>
               </div>
            </div>
            <!-- end dashboard inner -->
         </div>
      </div>
   </div>
   <!-- jQuery -->
   <script src="js/jquery.min.js"></script>
   <script src="js/popper.min.js"></script>
   <script src="js/bootstrap.min.js"></script>
   <!-- wow animation -->
   <script src="js/animate.js"></script>
   <!-- select country -->
   <script src="js/bootstrap-select.js"></script>
   <!-- owl carousel -->
   <script src="js/owl.carousel.js"></script>
   <!-- chart js -->
   <script src="js/Chart.min.js"></script>
   <script src="js/Chart.bundle.min.js"></script>
   <script src="js/utils.js"></script>
   <script src="js/analyser.js"></script>
   <!-- nice scrollbar -->
   <script src="js/perfect-scrollbar.min.js"></script>
   <script>
      var ps = new PerfectScrollbar('#sidebar');
   </script>
   <!-- custom js -->
   <script src="js/custom.js"></script>
   <script src="js/chart_custom_style1.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
   </script>
   <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
   </script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
   </script>
</body>

</html>