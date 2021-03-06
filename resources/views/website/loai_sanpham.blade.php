@extends("website.layout")
@section("content")
<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Sản phẩm theo loại </h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="{{route('TrangChu')}}">Trang Chủ</a> / <span>Sản phẩm {{$tenloai[0]->name }}</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<div class="container">
		<div id="content" class="space-top-none">
			<div class="main-content">
				<div class="space60">&nbsp;</div>
				<div class="row">
					<div class="col-sm-3">
						<ul class="aside-menu">
							@foreach($loai_sp as $lsp)
							<li><a href="{{route('loaisanpham', $lsp->id)}}">{{$lsp->name}}</a></li>
							@endforeach
						</ul>
					</div>
					<div class="col-sm-9">
						<div class="beta-products-list">
							<h4>{{$tenloai[0] -> name}}</h4>
							<div class="beta-products-details">
								<p class="pull-left">Tìm thấy {{count($sp_theoloai)}} sản phẩm</p>
								<div class="clearfix"></div>
							</div>

							<div class="row">
								@foreach($sp_theoloai as $sptl)
								<div class="col-sm-4">
									<div class="single-item">
										@if($sptl -> promotion_price!=0)
											<div class = "ribbon-wrapper">
												<div class = "ribbon sale">Sale</div>
											</div>
										@endif
										<div class="single-item-header">
											<a href="product.html"><img src="source/image/product/{{$sptl -> image}}"  width="100%" height="250px" alt="{{$sptl -> name}}"></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">{{$sptl -> name}}</p>
											<div class="space10">&nbsp;</div>
											<p class="single-item-price" style="font-size:17px">
												@if ($sptl->promotion_price==0)
														<span class="flash-sale">{{number_format($sptl->unit_price)}} đồng</span>
													@else
													<span class="flash-del">{{number_format($sptl->unit_price)}} đồng</span>
													<span class="flash-sale">{{number_format($sptl->promotion_price)}} đồng</span>
												@endif
											</p>
										</div>
										<div class="space10">&nbsp;</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="shopping_cart.html"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="{{route('chitietsanpham', $sptl->id)}}">Chi tiết <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
											<div class="space20">&nbsp;</div>
										</div>
									</div>
								</div>
								@endforeach
							</div>
							<div class="space20">&nbsp;</div>
						</div> <!-- .beta-products-list -->

						<div class="space50">&nbsp;</div>

						<div class="beta-products-list">
							<h4>Các sản phẩm khuyến mãi</h4>
							<div class="beta-products-details">
								<p class="pull-left">Tìm thấy {{count($sp_theoloai)}} sản phẩm</p>
								<div class="clearfix"></div>
							</div>
							<div class="row">
								@foreach($sp_khac as $spk)
								<div class="col-sm-4">
									<div class="single-item">
										@if($spk -> promotion_price!=0)
											<div class = "ribbon-wrapper">
												<div class = "ribbon sale">Sale</div>
											</div>
										@endif
										<div class="single-item-header">
											<a href="product.html"><img src="source/image/product/{{$spk -> image}}"  width="100%" height="250px" alt="{{$spk->name}}"></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">{{$spk->name}}</p>
											<div class="space10">&nbsp;</div>
											<p class="single-item-price" style="font-size:17px">
												@if ($spk->promotion_price==0)
														<span class="flash-sale">{{number_format($spk->unit_price)}} đồng</span>
													@else
													<span class="flash-del">{{number_format($spk->unit_price)}} đồng</span>
													<span class="flash-sale">{{number_format($spk->promotion_price)}} đồng</span>
												@endif
											</p>
										</div>
										<div class="space10">&nbsp;</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="shopping_cart.html"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="{{route('chitietsanpham', $spk->id)}}">Chi tiết <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
											<div class="space20">&nbsp;</div>
										</div>
									</div>
								</div>
								@endforeach
							</div>
							<div class="space20">&nbsp;</div>
							<div class="row">{{$sp_khac->links()}} </div>
							
						</div> <!-- .beta-products-list -->
					</div>
				</div> <!-- end section with sidebar and main content -->


			</div> <!-- .main-content -->
		</div> <!-- #content -->
    </div> <!-- .container -->
@endsection