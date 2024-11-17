@extends('layout.layout')
@section('content')
<section class="home-section section-hero overlay bg-image" style="background-image: url('/temp/assets/images/hero_1.jpg');" id="home-section">

  <div class="container">
    <div class="row align-items-center justify-content-center">
      <div class="col-md-12">
        <div class="mb-5 text-center">
          <h1 class="text-white font-weight-bold">Cách Dễ Nhất Để Đạt Được Công Việc Mơ Ước</h1>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate est, consequuntur perferendis.</p>
        </div>
        <form method="post" class="search-jobs-form">
          <div class="row mb-5">
            <div class="col-12 col-sm-6 col-md-6 col-lg-3 mb-4 mb-lg-0">
              <input type="text" class="form-control form-control-lg" placeholder="Tiêu đề công việc, Công ty...">
            </div>
            <div class="col-12 col-sm-6 col-md-6 col-lg-3 mb-4 mb-lg-0">
              <select class="selectpicker" data-style="btn-white btn-lg" data-width="100%" data-live-search="true" title="Chọn khu vực">
                <option>Bất kỳ nơi nào</option>
                <option>San Francisco</option>
                <option>Palo Alto</option>
                <option>New York</option>
                <option>Manhattan</option>
                <option>Ontario</option>
                <option>Toronto</option>
                <option>Kansas</option>
                <option>Mountain View</option>
              </select>
            </div>
            <div class="col-12 col-sm-6 col-md-6 col-lg-3 mb-4 mb-lg-0">
              <select class="selectpicker" data-style="btn-white btn-lg" data-width="100%" data-live-search="true" title="Chọn loại hình công việc">
                <option>Bán thời gian</option>
                <option>Toàn thời gian</option>
              </select>
            </div>
            <div class="col-12 col-sm-6 col-md-6 col-lg-3 mb-4 mb-lg-0">
              <button type="submit" class="btn btn-primary btn-lg btn-block text-white btn-search">
                <span class="icon-search icon mr-2"></span>Tìm công việc
              </button>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 popular-keywords">
              <h3>Từ Khóa Nổi Bật:</h3>
              <ul class="keywords list-unstyled m-0 p-0">
                <li><a href="#" class="">UI Designer</a></li>
                <li><a href="#" class="">Python</a></li>
                <li><a href="#" class="">Developer</a></li>
              </ul>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  

    <a href="#next" class="scroll-button smoothscroll">
      <span class=" icon-keyboard_arrow_down"></span>
    </a>

  </section>
  
  <section class="py-5 bg-image overlay-primary fixed overlay" id="next" style="background-image: url('/temp/assets/images/hero_1.jpg');">
    <div class="container">
      <div class="row mb-5 justify-content-center">
        <div class="col-md-7 text-center">
          <h2 class="section-title mb-2 text-white">Thống kê JobBoard</h2>
          <p class="lead text-white">Nơi tập trung hàng nghìn cơ hội việc làm, tạo sự kết nối giữa nhà tuyển dụng và ứng viên.</p>
        </div>
      </div>
      <div class="row pb-0 block__19738 section-counter">

        <div class="col-6 col-md-6 col-lg-3 mb-5 mb-lg-0">
          <div class="d-flex align-items-center justify-content-center mb-2">
            <strong class="number" data-number="{{$count_employee}}">0</strong>
          </div>
          <span class="caption">Người tìm việc</span>
        </div>

        <div class="col-6 col-md-6 col-lg-3 mb-5 mb-lg-0">
          <div class="d-flex align-items-center justify-content-center mb-2">
            <strong class="number" data-number="{{$count_job}}">0</strong>
          </div>
          <span class="caption">Công việc đã đăng</span>
        </div>

        <div class="col-6 col-md-6 col-lg-3 mb-5 mb-lg-0">
          <div class="d-flex align-items-center justify-content-center mb-2">
            <strong class="number" data-number="{{$applied}}">0</strong>
          </div>
          <span class="caption">Công việc đã nạp đơn</span>
        </div>

        <div class="col-6 col-md-6 col-lg-3 mb-5 mb-lg-0">
          <div class="d-flex align-items-center justify-content-center mb-2">
            <strong class="number" data-number="{{$company}}">0</strong>
          </div>
          <span class="caption">Công ty</span>
        </div>

          
      </div>
    </div>
  </section>

  

  <section class="site-section">
    <div class="container">

      <div class="row mb-5 justify-content-center">
        <div class="col-md-7 text-center">
          <h2 class="section-title mb-2">Công việc mới nhất</h2>
        </div>
      </div>
      
      <ul class="job-listings mb-5">
        @foreach($Jobs as $job)
       <li class="job-listing d-block d-sm-flex pb-3 pb-sm-0 align-items-center">
        <a href="{{ route('jobDetail', $job->slug) }}"></a>
        <div class="job-listing-logo">
            <img src="{{ asset("temp/images/company/" . $job->Company->thumb) }}" alt="Image" class="img-fluid">
        </div>

        <div class="job-listing-about d-sm-flex custom-width w-100 justify-content-between mx-4">
          <div class="job-listing-position custom-width w-50 mb-3 mb-sm-0">
            <h2>{{$job->title}}</h2>
            <strong>{{$job->Company->name}}</strong>
          </div>
          <div class="job-listing-location mb-3 mb-sm-0 custom-width w-25">
            <span class="icon-room"></span> {{$job->location}}
          </div>
          <div class="job-listing-meta">
            @if($job->type =='Full Time')
                <span class="badge badge-success">{{$job->type}}</span>
            @else
                <span class="badge badge-danger">{{$job->type}}</span>
            @endif
          </div>
        </div>
        
      </li>
       @endforeach
      </ul>
    </div>
  </section>

  <section class="py-5 bg-image overlay-primary fixed overlay" style="background-image: url('/temp/assets/images/hero_1.jpg');">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-8">
          <h2 class="text-white">Bạn đang tìm kiếm việc làm?</h2>
          <p class="mb-0 text-white lead">Hãy bắt đầu hành trình tìm kiếm công việc mơ ước của bạn ngay hôm nay!</p>
        </div>
        <div class="col-md-3 ml-auto">
          <a href="{{route('showRegister')}}" class="btn btn-warning btn-block btn-lg">Đăng ký ngay</a>
        </div>
      </div>
    </div>
</section>

  
  <section class="site-section py-4">
    <div class="container">

      <div class="row align-items-center">
        <div class="col-12 text-center mt-4 mb-5">
          <div class="row justify-content-center">
            <div class="col-md-7">
              <h2 class="section-title mb-2">Các công ty mà chúng tôi đã hỗ trợ</h2>
              <p class="lead">Mang đến giải pháp hiệu quả, hỗ trợ doanh nghiệp phát triển bền vững và đạt được mục tiêu tuyển dụng dễ dàng.</p>
            </div>
          </div>
          
        </div>
        @foreach($company_hads as $company_had)
          <div class="col-6 col-lg-3 col-md-6 text-center mb-3">
            <img src="/temp/images/company/{{$company_had->thumb}}" alt="Image" class="img-fluid logo-1">
          </div>
        @endforeach
        
      </div>
    </div>
  </section>


  <section class="bg-light py-5 testimony-full">
      
    <h1 class="text-center font-weight-bold my-4">Các bài viết nỏi bật</h1>
    <div class="owl-carousel single-carousel">
        @foreach($listPosts as $item)
            <div class="p-4">
                <a href="{{ route('detailPost', $item->slug) }}"><img src="{{ asset("temp/images/post/" . $item->thumb) }}" alt="Hình ảnh bài viết" class="img-fluid rounded mb-4"></a>
                <h3><a href="{{ route('detailPost', $item->slug) }}" class="text-black">{{$item->Title}}</a></h3>
                <div>{{$item->created_at}} <span class="mx-2">|</span> <a href="#">2 Bình luận</a></div>
            </div>
        @endforeach
    </div>

</section>

  <section class="pt-5 bg-image overlay-primary fixed overlay" style="background-image: url('/temp/assets/images/hero_1.jpg');">
    <div class="container">
      <div class="row">
        <div class="col-md-6 align-self-center text-center text-md-left mb-5 mb-md-0">
          <h2 class="text-white">Tải Ứng Dụng Di Động</h2>
          <p class="mb-5 lead text-white">Dễ dàng kết nối và tìm kiếm công việc mọi lúc, mọi nơi với ứng dụng của chúng tôi.</p>
          <p class="mb-0">
            <a href="#" class="btn btn-dark btn-md px-4 border-width-2"><span class="icon-apple mr-3"></span>App Store</a>
            <a href="#" class="btn btn-dark btn-md px-4 border-width-2"><span class="icon-android mr-3"></span>Play Store</a>
          </p>
        </div>
        <div class="col-md-6 ml-auto align-self-end">
          <img src="/temp/assets/images/apps.png" alt="Ứng dụng di động" class="img-fluid">
        </div>
      </div>
    </div>
  </section>
  
@endsection