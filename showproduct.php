<?php
/* $products = array(
	array('quantity' => 1, 'id' => '0', "hot" => '0', 'sale' => '50', 'name' => 'BELLA TOES', 'price' => '675.00', 'img' => './images/s1.jpg'),
	array('quantity' => 1, 'id' => '1', "hot" => '1', 'sale' => '24', 'name' => 'CHIKKU LOAFERS', 'price' => '800.00', 'img' => 'images/s2.jpg'),
	array('quantity' => 1, 'id' => '2', "hot" => '1', 'sale' => '50', 'name' => '(SRV) SNEAKERS', 'price' => '655.00', 'img' => 'images/s3.jpg'),
	array('quantity' => 1, 'id' => '3', "hot" => '0', 'sale' => '30', 'name' => 'SHUPPERRY', 'price' => '982.00', 'img' => 'images/s4.jpg'),
	array('quantity' => 1, 'id' => '4', "hot" => '1', 'sale' => '50', 'name' => 'RED BAELUF', 'price' => '730.00', 'img' => 'images/s5.jpg'),
	array('quantity' => 1, 'id' => '5', "hot" => '1', 'sale' => '60', 'name' => 'HUGGUER HARIC', 'price' => '625.00', 'img' => 'images/s6.jpg'),
	array('quantity' => 1, 'id' => '6', "hot" => '0', 'sale' => '50', 'name' => 'BANACAT COLE', 'price' => '382.00', 'img' => 'images/s7.jpg'),
	array('quantity' => 1, 'id' => '7', "hot" => '1', 'sale' => '10', 'name' => 'OLCRAC CALAVEL', 'price' => '530.00', 'img' => 'images/s8.jpg'),
	array('quantity' => 1, 'id' => '8', "hot" => '0', 'sale' => '25', 'name' => 'TUNNY FACHAR', 'price' => '625.00', 'img' => 'images/s9.jpg')
); */
include'database.php';
$products = ketnoi("SELECT id, name, img, price, quantity, hot, sale FROM shoes");

//danh sách sản phẩm
foreach ($products as $key => $product) {
	echo '
			<div style="cursor: pointer;" class="col-md-4 product-men">
				<div class="product-shoe-info shoe">
				<a style="color: black; font-size: 13px; font-weight: bold; height: 400px" href="detailProduct.php?c=' . $product['id'] . '">More
					<div class="men-pro-item">
						<div class="men-thumb-item">
							<img src="' . $product['img'] . '" alt="">
							<div class="men-cart-pro">
								<div class="inner-men-cart-pro">
									<a href="single.html" class="link-product-add-cart">Quick View</a>
								</div>
							</div>
							<span class="product-new-top">New</span>
						</div>
						<div class="item-info-product">
							<h4>
								<a href="single.html">' . $product['name'] . ' </a>
							</h4>
							<div class="info-product-price">
								<div class="grid_meta">
									<div class="product_price">
										<div class="grid-price ">
											<span class="money ">' . $product['price'] . '</span>
										</div>
									</div>
									<ul class="stars">
										<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
										<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
										<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
										<li><a href="#"><i class="fa fa-star-half-o" aria-hidden="true"></i></a></li>
										<li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
									</ul>
								</div>
								<div class="shoe single-item hvr-outline-out">
								<form action="#" method="post">
									<input type="hidden" name="cmd" value="_cart">
									<input type="hidden" name="shoe_item" value="Bella Toes">
									<input type="hidden" name="quantity" value="675.00">
									<input type="hidden" name="id" value="' . $product['id'] . '">
									<input type="hidden" name="index" value="' . $key . '">
									<button name="add" class="shoe-cart pshoe-cart"><i class="fa fa-cart-plus" aria-hidden="true"></i></button>					
								</form>
								<a href="#" data-toggle="modal" data-target="#myModal1"></a>
								</div>
							</div>
							<div class="clearfix"></div>
						</div>
					</div>
				</a>
				</div>
			</div>';
}

/* 
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add'])) {
	$_SESSION['cart'][] = $products[$_POST['index']];
} */



// thêm sản phẩm vào giỏ hàng.
if (isset($_POST['add'])) {
	$check = true;
	$id = $_POST['id'];
	$index = $_POST['index'];
	if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
		foreach ($_SESSION['cart'] as $key => $item) {
			if ($item['id'] == $id) {
				$_SESSION['cart'][$key]['quantity'] += 1;
				$check = false;
			}
		}
	}
	if ($check == true) {
		$_SESSION['cart'][] = $products[$index];
	}
}

