<?php use App\Product; ?>

@extends("layouts.master")

@section('content')

	<section id="cart_items">

		<div class="container">
		<div class="breadcrumbs">
			<ol class="breadcrumb">
			  <li><a href="home">Home</a></li>
			  <li class="active">Shopping Cart</li>
			</ol>
		</div>
		<div class = "row text-center">
			<h3 class="text text-center bold">Shopping Cart</h3>
			<br>
		</div>
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="text-center image">Item</td>
							<td class="text-center description">Description</td>
							<td class="text-center price">Price</td>
							<td class="text-center quantity">Quantity</td>
							<td class="text-center total">Size</td>
							<td class="text-center total">Total</td>
							<td></td><td ></td>
						</tr>
					</thead>
					<tbody>
					
						<style>
							img.cartimg{
							    width:100%;
							    max-width:70px;
							    margin-left:0px;
							}
						</style>
						@foreach ($isiCart as $pesanan)
							<?php 
								$product = Product::find($pesanan->id_product);
							 ?>

							<tr>
								<td class=" cart_product">
									<a href=""><img class="cartimg"  src="{{"images/home/".$product->nama_gambar}}" alt=""></a>
								</td>
								<td class="text-center cart_description">
									<h4><a href="">{{$product->model}}</a></h4>
									<p>Web ID: 1089772</p>
								</td>
								<td class="text-center cart_price">
									<p>{{"Rp  ".$product->harga.",-"}}</p>
								</td>
								<td class="text-center cart_price"><p>{{$pesanan->jumlah}}</p>
								</td>
								<td class="text-center cart_price"><p>{{$pesanan->ukuran}}</p>
								</td>
								<td class="text-center cart_total">
									<p class="cart_total_price">{{"Rp  ".$product->harga*$pesanan->jumlah.",-"}}</p>
								</td>
								<td class="text-center cart_price">
									<p class ="cart_delete">
										<a class="cart_quantity_delete" href={{"delete/".$product->id}} ><i class="fa fa-times"></i></a>
									</p>
								</td>
								<td ></td>
							</tr>
						@endforeach
						
					</tbody>
				</table>
					<?php 
						if($isiCart==null){
							echo "<h3 class = \"text-center text-info\">Keranjang Anda Kosong</h3>";
						}else{
							echo "<div class=\" text-center \">" ;
							echo "<a class=\"btn btn-default check_out\" href=\"checkout\">Checkout</a>";
							echo "</div>";
						}
					 ?>

			</div>
		</div>
	</section> <!--/#cart_items-->

	<section id="do_action">
		<div class="container">
			<div class="heading">
				<h3>What would you like to do next?</h3>
				<p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
			</div>
			<div class="row">
				<div class="col-sm-6">
					<div class="chose_area">
						<ul class="user_option">
							<li>
								<input type="checkbox">
								<label>Use Coupon Code</label>
							</li>
							<li>
								<input type="checkbox">
								<label>Use Gift Voucher</label>
							</li>
							<li>
								<input type="checkbox">
								<label>Estimate Shipping & Taxes</label>
							</li>
						</ul>
						<ul class="user_info">
							<li class="single_field">
								<label>Country:</label>
								<select>
									<option>United States</option>
									<option>Bangladesh</option>
									<option>UK</option>
									<option>India</option>
									<option>Pakistan</option>
									<option>Ucrane</option>
									<option>Canada</option>
									<option>Dubai</option>
								</select>
								
							</li>
							<li class="single_field">
								<label>Region / State:</label>
								<select>
									<option>Select</option>
									<option>Dhaka</option>
									<option>London</option>
									<option>Dillih</option>
									<option>Lahore</option>
									<option>Alaska</option>
									<option>Canada</option>
									<option>Dubai</option>
								</select>
							
							</li>
							<li class="single_field zip-field">
								<label>Zip Code:</label>
								<input type="text">
							</li>
						</ul>
						<a class="btn btn-default update" href="">Get Quotes</a>
						<a class="btn btn-default check_out" href="">Continue</a>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="total_area">
						<ul>
							<li>Cart Sub Total <span>$59</span></li>
							<li>Eco Tax <span>$2</span></li>
							<li>Shipping Cost <span>Free</span></li>
							<li>Total <span>$61</span></li>
						</ul>
							<a class="btn btn-default update" href="">Update</a>
							<a class="btn btn-default check_out" href="">Check Out</a>
					</div>
				</div>
			</div>
		</div>
	</section><!--/#do_action-->

	
@stop