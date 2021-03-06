<?php use App\Product;
	$isiCart = DB::table('cart')
	                    ->where('id_pesanan', $pesanan->id)
	                    ->get();
	function writeHarga($harga){
		$result = "";
		$n = strlen($harga);
		for ($i=$n; $i>3; $i -= 3){
			$result = "." . substr($harga, $i-3, 3) . $result;
		}
		$result = substr($harga, 0, $i) . $result;
		return $result;
	}
 ?>

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
			<div class=" text-center ">
				<br>
				<h4>Status : {{$pesanan->status}}</h4>
			</div>
			<div class=" text-center ">
				<a class="btn btn-info " href="{{"detailpemesanancart/".$pesanan->id_detail_pemesanan}}">Detail Pemesanan</a>
			</div>
			<p></p>
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
							<td></td>
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
						@foreach ($isiCart as $itemcart)
							<?php 
								$product = Product::find($itemcart->id_product);
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
									<p>{{"Rp  ".writeHarga($product->harga).",-"}}</p>
								</td>
								<td class="text-center cart_price"><p>{{$itemcart->jumlah}}</p>
								</td>
								<td class="text-center cart_price"><p>{{$itemcart->ukuran}}</p>
								</td>
								<td class="text-center cart_total">
									<p class="cart_total_price">{{"Rp  ".writeHarga($product->harga*$itemcart->jumlah).",-"}}</p>
								</td>
								<td ></td>
							</tr>
						@endforeach
						
					</tbody>
				</table>
					<?php 
						if($isiCart==null){
							echo "<h3 class = \"text-center text-info\">Keranjang Kosong</h3>";
						}else{
							echo "<div class=\" text-center \">" ;
							echo "<a class=\"btn btn-default check_out\" href=\"listpesanan\">Back</a>";
							echo "</div>";
						}
					 ?>
				<br>
			</div>
		</div>
	</section> <!--/#cart_items-->
	
@stop