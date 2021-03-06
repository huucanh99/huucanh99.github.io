@extends("website.layout")
@section("content")
<div class="rev-slider">
	<div class="fullwidthbanner-container">
					<div class="fullwidthbanner">
						<div class="bannercontainer" >
					    <div class="banner" style="width: 100%">
								<ul>
									<!-- THE FIRST SLIDE -->
									@foreach($sl as $s)
										
						
									<li data-transition="boxfade" data-slotamount="20" class="active-revslide" style="width: 100%; height: 100%; overflow: hidden; z-index: 18; visibility: hidden; opacity: 0;">
										<div class="slotholder" style="width:100%;height:100%;" data-duration="undefined" data-zoomstart="undefined" 
										data-zoomend="undefined" data-rotationstart="undefined" 
										data-rotationend="undefined" data-ease="undefined" data-bgpositionend="undefined" 
										data-bgposition="undefined" data-kenburns="undefined" data-easeme="undefined" 
										data-bgfit="undefined" data-bgfitend="undefined" data-owidth="undefined" data-oheight="undefined">
											<div class="tp-bgimg defaultimg" data-lazyload="undefined" data-bgfit="cover" 
											data-bgposition="center center" data-bgrepeat="no-repeat" data-lazydone="undefined" 
											src="source/image/slide/{{$s->images}}" data-src="source/image/slide/{{$s->images}}" 
											style="background-color: rgba(0, 0, 0, 0); background-repeat: no-repeat; background-image: url('source/image/slide/{{$s->images}}'); background-size: cover; background-position: center center; width: 100%; height: 100%; opacity: 1; visibility: inherit;">
											</div>
										</div>

									</li>
									@endforeach
								
								</ul>
							</div>
						</div>
						<div class="tp-bannertimer"></div>
					</div>
				</div>
				<!--slider-->
	</div>
<div class="container">
	<div id="content" class="space-top-none">
		<div class="main-content">
			<div class="space60">&nbsp;</div>
			<div class="row">
				<div class="col-sm-12">
					<div class="beta-products-list">
						<h4>Sản Phẩm Mới</h4>
						<div class="beta-products-details">
							<p class="pull-left">Tìm thấy{{count ($new_products)}} sản phẩm</p>
							<div class="clearfix"></div>
						</div>

						<div class="row">
						@foreach ($new_products as $np)
							<div class="col-sm-3">
								<div class="single-item">
								@if($np -> promotion_price != 0)
									<div class = "ribbon-wrapper">
										<div class = "ribbon sale">Sale</div>
									</div>
								@endif
									<div class="single-item-header">
										<a href="product.html"><img src="source/image/product/{{$np->image}}" width="100%" height="250px" alt="{{$np->name}}"></a>
									</div>
									<div class="single-item-body">
										<p class="single-item-title">{{$np->name}}</p>
										<div class="space10">&nbsp;</div>
										<p class="single-item-price" style = "font-size:17px">
											@if ($np->promotion_price==0)
												<span class="flash-sale">{{number_format($np->unit_price)}} đồng</span>
											@else
											<span class="flash-del">{{number_format($np->unit_price)}} đồng</span>
											<span class="flash-sale">{{number_format($np->promotion_price)}} đồng</span>
											@endif
										</p>
									</div>
									<div class="space10">&nbsp;</div>
									<div class="single-item-caption">
										<a class="add-to-cart pull-left" href="{{route('themgiohang',$np->id)}}"><i class="fa fa-shopping-cart"></i></a>
										<a class="beta-btn primary" href="{{route('chitietsanpham', $np->id)}}">Chi tiết <i class="fa fa-chevron-right"></i></a>
										<div class="clearfix"></div>
									</div>
								</div>
							</div>
						@endforeach
							
					</div>
					<div class="space20">&nbsp;</div>
					<div class="row">{{$new_products->links()}}</div>
					</div> <!-- .beta-products-list -->

					<div class="space50">&nbsp;</div>

					<div class="beta-products-list">
						<h4>Sản Phẩm Khuyến Mại</h4>
						<div class="beta-products-details">
							<p class="pull-left">Tìm thấy {{count($pro_products)}} sản phẩm</p>
							<div class="clearfix"></div>
						</div>
						<div class="row">
							@foreach($pro_products as $pp)
							<div class="col-sm-3">
								<div class="single-item">
									@if($pp -> promotion_price != 0)
									<div class = "ribbon-wrapper">
										<div class = "ribbon sale">Sale</div>
									</div>
									@endif
									<div class="single-item-header">
										<a href="product.html"><img src="source/image/product/{{$pp->image}}" width="100%" height="250px" alt="{{$pp->name}}"></a>
									</div>
									<div class="single-item-body">
										<p class="single-item-title">{{$pp->name}}</p>
										<div class="space10">&nbsp;</div>
										<p class="single-item-price" style="font-size:17px">
											@if ($pp->promotion_price==0)
													<span class="flash-sale">{{number_format($pp->unit_price)}} đồng</span>
												@else
												<span class="flash-del">{{number_format($pp->unit_price)}} đồng</span>
												<span class="flash-sale">{{number_format($pp->promotion_price)}} đồng</span>
											@endif
										</p>
									</div>
									<div class="space10">&nbsp;</div>
									<div class="single-item-caption">
										<a class="add-to-cart pull-left" href="{{route('themgiohang',$pp->id)}}"><i class="fa fa-shopping-cart"></i></a>
										<a class="beta-btn primary" href="{{route('chitietsanpham', $pp->id)}}">Chi tiết <i class="fa fa-chevron-right"></i></a>
										<div class="clearfix"></div>
										<div class="space20">&nbsp;</div>
									</div>
								</div>
							</div>
							@endforeach
						</div>
						<div class="space40">&nbsp;</div>
						<div class="row">{{$pro_products->links()}}</div>
					</div> <!-- .beta-products-list -->
					
				</div>
			</div> <!-- end section with sidebar and main content -->


		</div> <!-- .main-content -->
	</div> <!-- #content -->
</div> <!-- .container -->
@endsection