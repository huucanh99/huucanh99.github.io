@extends("website.layout")
@section("content")

<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Chi Tiết Sản Phẩm </h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="{{route('TrangChu')}}">Trang Chủ</a> / <span>Chi tiết sản phẩm </span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>

	<div class="container">
		<div id="content">
			<div class="row">
				<div class="col-sm-9">

					<div class="row">
						<div class="col-sm-4">
							<a href="product.html"><img src="source/image/product/{{$chitietsp -> image}}"  width="100%" height="250px" alt="{{$chitietsp->name}}"></a>
						</div>
						<div class="col-sm-8">
							<div class="single-item-body">
								<p class="single-item-title">{{$chitietsp->name}}</p>
								<div class="space10">&nbsp;</div>
								<p class="single-item-price" style="font-size:17px">
									@if ($chitietsp->promotion_price==0)
											<span class="flash-sale">{{number_format($chitietsp->unit_price)}} đồng</span>
										@else
										<span class="flash-del">{{number_format($chitietsp->unit_price)}} đồng</span>
										<span class="flash-sale">{{number_format($chitietsp->promotion_price)}} đồng</span>
									@endif
								</p>
							</div>

							<div class="clearfix"></div>
							<div class="space20">&nbsp;</div>

							<div class="single-item-desc">
								<p>{{$chitietsp->description}}</p>
							</div>
							<div class="space20">&nbsp;</div>

							<p>Tùy Chọn</p>
							<div class="single-item-options">
								<select class="wc-select" name="color">
									<option>Số Lượng</option>
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
								</select>
								<a class="add-to-cart" href="{{route('themgiohang',$chitietsp->id)}}"><i class="fa fa-shopping-cart"></i></a>
								<div class="clearfix"></div>
							</div>
						</div>
					</div>

					<div class="space40">&nbsp;</div>
					<div class="woocommerce-tabs">
						<ul class="tabs">
							<li><a href="#tab-description">Mô tả sản phẩm </a></li>
							<li><a href="#tab-reviews">Đánh giá (0)</a></li>
						</ul>

						<div class="panel" id="tab-description">
							<p>{{$motasp->mota}}</p>
							
						</div>
						<div class="panel" id="tab-reviews">
							<p>Chưa có đánh giá nào </p>
						</div>
					</div>
					<div class="space50">&nbsp;</div>
					<div class="beta-products-list">
						<h4>Sản Phẩm Tương Tự </h4>
						<div class="space20">&nbsp;</div>
						<div class="row">
							@foreach ($sp_tuongtu as $sptt)
							<div class="col-sm-4">
								<div class="single-item">
									@if($sptt -> promotion_price!=0)
											<div class = "ribbon-wrapper">
												<div class = "ribbon sale">Sale</div>
											</div>
									@endif
									<div class="single-item-header">
										<a href="product.html"><img src="source/image/product/{{$sptt -> image}}"  width="100%" height="250px" alt="{{$sptt->name}}"></a>
									</div>
									<div class="single-item-body">
										<p class="single-item-title">{{$sptt->name}}</p>
										<p class="single-item-price" style="font-size:17px">
											@if ($sptt->promotion_price==0)
													<span class="flash-sale">{{number_format($sptt->unit_price)}} đồng</span>
												@else
												<span class="flash-del">{{number_format($sptt->unit_price)}} đồng</span>
												<span class="flash-sale">{{number_format($sptt->promotion_price)}} đồng</span>
											@endif
										</p>
									</div>
									<div class="single-item-caption">
										<a class="add-to-cart pull-left" href="{{route('themgiohang',$sptt->id)}}"><i class="fa fa-shopping-cart"></i></a>
										<a class="beta-btn primary" href="{{route('chitietsanpham', $sptt->id)}}">Chi tiết <i class="fa fa-chevron-right"></i></a>
										<div class="clearfix"></div>
										<div class="space20">&nbsp;</div>
									</div>
								</div>
							</div>
							@endforeach
						</div>
					</div> <!-- .beta-products-list -->
				</div>
				
			</div>
		</div> <!-- #content -->
    </div> <!-- .container -->
@endsection