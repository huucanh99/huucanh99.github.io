@extends("website.layout")
@section("content")

<div class="inner-header">
    <div class="container">
        <div class="pull-left">
            <h6 class="inner-title">Đăng nhập</h6>
        </div>
        <div class="pull-right">
            <div class="beta-breadcrumb">
                <a href="{{route('TrangChu')}}">Trang Chủ</a> / <span>Đăng nhập</span>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>

<div class="container">
    <div id="content">
        @if (session('messege'))
        <div class="alert alert-warning">
            <p>{{ session('messege') }}</p>
        </div>
        @endif
        <form action="{{route('dangnhap')}}" method="post" class="beta-form-checkout">
            {{csrf_field()}}
            
            <div class="row">

                <div class="col-sm-3"></div>
                <div class="col-sm-6">
                    <h4>Đăng nhập</h4>
                    <div class="space20">&nbsp;</div>        
                    <div class="form-block">
                        <label>Tên đăng nhập </label>
                        <input class="au-input au-input--full" type="text" name="name" placeholder="Nhập tài khoản">  
                    </div>
                    <div class="form-block">
                        <label>Mật Khẩu</label>
                        <input class="au-input au-input--full" type="password" name="password" placeholder="Nhập Password">
                    </div>
                    <div class="form-block">
                        <button type="submit" class="btn btn-primary">Đăng Nhập</button>
                        <div class="register-link">
                            <p>
                                Bạn chưa có tài khoản?
                                <a href="{{route('dangky')}}">Đăng Ký</a>
                               
                            </p>
                        </div>
                    </div>
                    
                </div>
                <div class="col-sm-3"></div>
                
            </div>
        </form>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
         @endif
    </div> <!-- #content -->
</div> <!-- .container -->
@endsection