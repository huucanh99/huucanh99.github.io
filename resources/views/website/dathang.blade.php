@extends("website.layout")
@section("content")
<div class="inner-header">
    <div class="container">
        <div class="pull-left">
            <h6 class="inner-title">Đặt hàng</h6>
        </div>
        <div class="pull-right">
            <div class="beta-breadcrumb font-large">
                <a href="{{route('TrangChu')}}">Trang chủ</a> / <span>Đặt hàng</span>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>

<div class="container">
    <div id="content">
        <form action="{{route('dathang')}}" method="post" class="beta-form-checkout">
            {{csrf_field()}}
            <div class="row">
                <div class="col-sm-6">
                    <h4>Thông Tin Khách Hàng</h4>
                    <div class="space20">&nbsp;</div>
                    <div class="form-block">
                        <label for="name">Họ Tên</label>
                        <input type="text" id="name" name="name" placeholder="Nhập họ tên" required>
                    </div>
                    <div class="form-block">
                        <label>Giới tính</label>
                        <input id="gender" type="radio" class="input-radio" name="gender" value="nam" checked="checked" style="width: 10%"><span style="margin-right: 10% ">Nam </span>
                        <input id="gender" type="radio" class="input-radio" name="gender" value="nữ" style="width: 10%"><span>Nữ</span>
                    </div>
                    <div class="form-block">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" required placeholder="expample@gmail.comcom">
                    </div>
                    <div class="form-block">
                        <label for="address">Địa chỉ</label>
                        <input type="text" id="address" name="address"  placeholder="Nhập địa chỉ" required>
                    </div>
                    <div class="form-block">
                        <label for="phone">Điện thoại</label>
                        <input type="text" id="phone" name="phone_number"  placeholder="Nhập ssố điện thoại" required>
                    </div>
                    <div class="form-block">
                        <label for="notes">Ghi chú</label>
                        <textarea id="notes" name="notes"></textarea>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="your-order">
                        <div class="your-order-head"><h5>Đơn hàng của bạn</h5></div>
                        <div class="your-order-body" style="padding: 0px 10px ">
                            <div class="your-order-item">
                                @if(Session::has('cart'))
                                    @foreach ($product_cart as $cart)
                                        <div class="media"> 
                                            <img width="25%" src="source/image/product/{{$cart['item']['image']}}" alt="" class="pull-left">
                                            <div class="media-body">
                                                <p class="font-large">&nbsp; {{$cart['item']['name']}}</p>
                                                <div class="space10">&nbsp;</div>
                                                <span class="color-gray your-order-info">&nbsp; Số lượng: {{$cart['qty']}}</span>
                                                <div class="space10">&nbsp;</div>
                                                <span class="color-gray your-order-info">&nbsp; Trị giá: {{$cart['price']}} vnđ</span>
                                            </div>
                                        </div>
                                        <div class="space20">&nbsp;</div>
                                    @endforeach
                                    <div class="clearfix"></div>
                                    <div class="your-order-item"> 
                                        <div class="pull-left"><p class="your-order-f18">Tổng tiền:</p></div>
                                        <div class="pull-right"><h5 class="color-back">{{number_format(Session('cart')->totalPrice)}}vnđ</h5></div>
                                        <div class="clearfix"></div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="your-order-head"><h5>Hình thức thanh toán</h5></div>
                    <div class="your-order-body">
                        <ul class="payment_methods methods">
                            <li class="payment_method_bacs">
                                <input id="payment_method_bacs" type="radio" class="input-radio" name="payment_method" value="COD" checked="checked" data-order_button_text="">
                                <label for="payment_method_bacs">Thanh Toán khi nhận hàng</label>
                                <div class="payment_box payment_method_bacs" style="display: block;">Cửa hàng sẽ gửi hàng đến địa chỉ của bạn, bạn có thể kiểm tra hàng rồi thanh toán cho nhân viên giao hàng </div>
                            </li>
                            <li class="payment_method_cheque">
                                <input id="payment_method_cheque" type="radio" class="input-radio" name="payment_method" value="ATM" data-order_button_text="">
                                <label for="payment_method_cheque">Chuyển khoản</label>
                                <div class="payment_box payment_method_cheque" style="display: none;">
                                    Chuyển tiền tới tài khoản sau:
                                    <br>- Số tài khoản: 0135 246 789
                                    <br>- Tên tài khoản: Nguyễn Minh Đức
                                    <br>- Ngân hàng ACB, chi nhánh Nam Sài Gòn
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="text-center">
                        <button style="submit" class="beta-btn primary">Đặt hàng<i class="fa fa-chevron-right"></i></button>
                    </div>
                </div>
            </div>
            
        </form>
    </div> <!-- #content -->
</div> <!-- .container -->
@endsection