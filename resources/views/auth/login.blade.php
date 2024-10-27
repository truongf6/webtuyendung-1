@extends('layout.layout')
@section('content')
<section class="section-hero overlay inner-page bg-image" style="background-image: url('/temp/assets/images/hero_1.jpg');" id="home-section">
    <div class="container">
      <div class="row">
        <div class="col-md-7">
          <h1 class="text-white font-weight-bold">Đăng nhập</h1>
          <div class="custom-breadcrumbs">
            <a href="/">Trang chủ</a> <span class="mx-2 slash">/</span>
            <span class="text-white"><strong>Đăng nhập</strong></span>
          </div>
        </div>
      </div>
    </div>
  </section>
<section class="site-section">
    <div class="container">
      <div class="row">
        <div class="col-3"></div>
        <div class="col-lg-6">
          <h2 class="mb-4 text-center font-weight-bold">Đăng nhập</h2>
          <div class="error">
            @include('admin.error')
        </div> 
          <form action="{{route('login')}}" class="p-4 border rounded" method="post">
            @csrf
            <div class="row form-group">
              <div class="col-md-12 mb-3 mb-md-0">
                <label class="text-black" for="fname">Email</label>
                <input type="text" id="fname" class="form-control" name="email" placeholder="Email address">
              </div>
            </div>
            <div class="row form-group mb-4">
              <div class="col-md-12 mb-3 mb-md-0">
                <label class="text-black" for="fname">Password</label>
                <input type="password" id="fname" class="form-control" name="password" placeholder="Password">
              </div>
            </div>

            <div class="row form-group ">
              <div class="col-md-12 d-flex justify-content-between align-items-center">
                <input type="submit" value="Đăng nhập" class="btn px-4 btn-primary text-white">
                <div>
                  Chưa có tài khoản?
                  <a href="{{route('showRegister')}}" class="fw-bold text-info"> Đăng ký</a>
                </div>
              </div>
            </div>

          </form>
        </div>
        <div class="col-3"></div>

      </div>
    </div>
  </section>
@endsection