@extends("website.layout")
@section("content")
<body class="animsition">

    <div class="page-wrapper">
        <div class="page-content--bge5">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">

                        <div class="login-form">
                            <div class="col-md-6">
                                @if (session('success'))
                                <div class="alert alert-success">
                                    <p>{{ session('success') }}</p>
                                </div>
                                @endif
                            <form action="{{route('dangky')}}" method="post">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <label>Tên Đăng Nhập</label>
                                    <input class="au-input au-input--full" type="text" name="name" placeholder="Nhập Tên Đăng Nhập">
                                </div>
                                <div class="form-group">
                                    <label>Mật Khẩu</label>
                                    <input class="form-control" type="password" name="password" placeholder="Nhập Mật Khẩu">

                                </div>
                                <div class="form-group">
                                    <label>Nhập Lại Mật Khẩu</label>
                                    <input class="form-control" type="password" name="password_confirmation" placeholder="Nhập Lại Mật Khẩu">
                                </div>
                                
                                <div class="social-login-content">
                                    <div class="social-button">
                                        <button class="btn btn-primary" type="submit">Đăng Ký</button>
                                    </div>
                                    <div class="register-link">
                                        <p>
                                            Already have account?
                                            <a class="btn btn-success" href="{{route('dangnhap')}}">Đăng Nhập</a>
                                        </p>
                                    </div>
                                </div>
                            </form>
                        </div>
                            <div class="col-md-6">
                                @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                 @endif
                            </div>
                            

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    </body>
@endsection