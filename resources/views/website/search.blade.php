@extends("website.layout")
@section("content")


    <section class="section-padding">
        <h2 class="sr-only">Home Tab Slider Section</h2>
        <div class="container">
            <div class="sb-custom-tab">

                <div class="promo-section-heading">
                    <h2>Kết Quả Tìm Kiếm</h2>

                    <p>Tìm thấy {{count($product)}} sản phẩm</p>

                </div>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane show active" id="shop" role="tabpanel" aria-labelledby="shop-tab">
                        <div class="product-slider multiple-row  slider-border-multiple-row  sb-slick-slider" data-slick-setting='{
                            "autoplay": true,
                            "autoplaySpeed": 8000,
                            "slidesToShow": 5,
                            "rows":2,
                            "dots":true
                        }' data-slick-responsive='[
                            {"breakpoint":1200, "settings": {"slidesToShow": 3} },
                            {"breakpoint":768, "settings": {"slidesToShow": 2} },
                            {"breakpoint":480, "settings": {"slidesToShow": 1} },
                            {"breakpoint":320, "settings": {"slidesToShow": 1} }
                        ]'>



                            @foreach($product as $sp)
                                <div class="single-slide">
                                    <div class="product-card">
                                        <div class="product-header">
                                            <a href="" class="author">

                                            </a>
                                            <h3><a href="{{route('detail_product',$sp->id)}}">{{$sp->name}}</a></h3>
                                        </div>
                                        <div class="product-card--body">
                                            <div class="card-image">
                                                @if($sp->promotion_price != 0)
                                                    <div class="ribbon-wrapper">
                                                        <div class="ribbon-sale">Sale</div>
                                                    </div>
                                                @endif
                                                <img src="images\products\{{$sp->image}}" alt="" height="180px" width="122px">
                                                <div class="hover-contents">
                                                    @if($sp->promotion_price != 0)
                                                        <div class="ribbon-wrapper">
                                                            <div class="ribbon-sale">Sale</div>
                                                        </div>
                                                    @endif
                                                    <a href="{{route('detail_product',$sp->id)}}" class="hover-image">
                                                        <img src="images\products\{{$sp->images}}" alt="">
                                                    </a>
                                                    <div class="hover-btns">
                                                        <a href="{{route('themgiohang',$sp->id)}}" class="single-btn">
                                                            <i class="fas fa-shopping-basket"></i>
                                                        </a>
                                                        <a href="wishlist.html" class="single-btn">
                                                            <i class="fas fa-heart"></i>
                                                        </a>
                                                        <a href="compare.html" class="single-btn">
                                                            <i class="fas fa-random"></i>
                                                        </a>
                                                        <a href="#" data-toggle="modal" data-target="#quickModal" class="single-btn">
                                                            <i class="fas fa-eye"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="price-block">
                                                @if($sp->promotion_price==0)
                                                    <span class="price">{{number_format($sp->unit_price)}}ngàn</span>
                                                @else
                                                    <span class="price-old">{{number_format($sp->unit_price)}}ngàn</span>
                                                    <span class="price">{{number_format($sp->promotion_price)}}ngàn</span>
                                                @endif




                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach




                        </div>
                    </div>

                </div>




            </div>
        </div>
    </section>
    <div class="row pt--30">

        <div class="col-md-12">
            <div class="pagination-block">
                <ul class="pagination-btns flex-center">
                    <li><a href="" class="single-btn prev-btn ">|<i class="zmdi zmdi-chevron-left"></i> </a></li>
                    <li><a href="" class="single-btn prev-btn "><i class="zmdi zmdi-chevron-left"></i> </a></li>

                    {{$product->links()}}
                    <li><a href="" class="single-btn next-btn"><i class="zmdi zmdi-chevron-right"></i></a></li>
                    <li><a href="" class="single-btn next-btn"><i class="zmdi zmdi-chevron-right"></i>|</a></li>
                </ul>
            </div>
        </div>
    </div>




@endsection
