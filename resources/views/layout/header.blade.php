<header class="site-navbar mt-3">
    <div class="container-fluid">
      <div class="row align-items-center">
        <div class="site-logo col-6"><a href="index.html">Web tuyển dụng</a></div>

        <nav class="mx-auto site-navigation">
          <ul class="site-menu js-clone-nav d-none d-xl-block ml-0 pl-0">
            <li><a href="index.html" class="nav-link active">Trang chủ</a></li>
            <li><a href="about.html">Giới thiệu</a></li>
            <li class="has-children">
              <a href="job-listings.html">Danh sách công việc</a>
              <ul class="dropdown">
                <li><a href="job-single.html">Job Single</a></li>
                <li><a href="{{route('postJobPage')}}">Đăng công việc</a></li>
              </ul>
            </li>
            <li class="has-children">
              <a href="services.html">Trang đơn</a>
              <ul class="dropdown">
                <li><a href="services.html">Dịch vụ</a></li>
                <li><a href="service-single.html">Service Single</a></li>
                <li><a href="blog-single.html">Blog Single</a></li>
                <li><a href="portfolio.html">Portfolio</a></li>
                <li><a href="portfolio-single.html">Portfolio Single</a></li>
                <li><a href="testimonials.html">Testimonials</a></li>
                <li><a href="faq.html">Frequently Ask Questions</a></li>
                <li><a href="gallery.html">Gallery</a></li>
              </ul>
            </li>
            <li><a href="blog.html">Bài viết</a></li>
            <li><a href="contact.html">Liên hệ</a></li>
            @if(Auth::check())
            <li class="d-lg-none"><a href="{{route('postJobPage')}}"><span class="mr-2">+</span> Đăng công việc</a></li>
            @endif
            <li class="d-lg-none"><a href="{{route('showLogin')}}">Đăng nhập</a></li>
          </ul>
        </nav>
        
        <div class="right-cta-menu text-right d-flex aligin-items-center col-6">
          <div class="ml-auto d-flex align-items-center">
            @if(Auth::check())
            <a href="{{route('postJobPage')}}" class="btn btn-outline-white border-width-2 d-none d-lg-inline-block mr-3"><span class="mr-2 icon-add"></span>Đăng công việc</a>
              <a href="" class="btn btn-primary border-width-2 d-none d-lg-inline-block mr-3"><span class="icon-lock_outline"></span>Trang cá nhân</a>
              <form action="{{route('logout')}}" method="post">
                @csrf
                <button type="submit" class="btn btn-danger border-width-2 d-none d-lg-inline-block">Đăng xuất</button>
              </form>
            @else
              <a href="{{route('showLogin')}}" class="btn btn-primary border-width-2 d-none d-lg-inline-block "><span class="mr-2 icon-lock_outline"></span>Đăng nhập/ Đăng ký</a>
            @endif
          </div>
          <a href="#" class="site-menu-toggle js-menu-toggle d-inline-block d-xl-none mt-lg-2 ml-3"><span class="icon-menu h3 m-0 p-0 mt-2"></span></a>
        </div>

      </div>
    </div>
  </header>