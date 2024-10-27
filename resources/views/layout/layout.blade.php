<!DOCTYPE html>
<html lang="en">
<head>
    @include('layout.head')
</head>
<body>
<div class="site-wrape">
    <!-- header -->
    <div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
          <div class="site-mobile-menu-close mt-3">
            <span class="icon-close2 js-menu-toggle"></span>
          </div>
        </div>
        <div class="site-mobile-menu-body"><ul class="site-nav-wrap">
                <li><a href="/" class="nav-link active">Home</a></li>
                <li><a href="about.html">About</a></li>
                <li class="has-children"><span class="arrow-collapse collapsed" data-toggle="collapse" data-target="#collapseItem0"></span>
                  <a href="job-listings.html">Job Listings</a>
                  <ul class="collapse" id="collapseItem0">
                    <li><a href="job-single.html">Job Single</a></li>
                    <li><a href="{{route('postJobPage')}}">Post a Job</a></li>
                  </ul>
                </li>
                <li class="has-children"><span class="arrow-collapse collapsed" data-toggle="collapse" data-target="#collapseItem1"></span>
                  <a href="services.html">Pages</a>
                  <ul class="collapse" id="collapseItem1">
                    <li><a href="services.html">Services</a></li>
                    <li><a href="service-single.html">Service Single</a></li>
                    <li><a href="blog-single.html">Blog Single</a></li>
                    <li><a href="portfolio.html">Portfolio</a></li>
                    <li><a href="portfolio-single.html">Portfolio Single</a></li>
                    <li><a href="testimonials.html">Testimonials</a></li>
                    <li><a href="faq.html">Frequently Ask Questions</a></li>
                    <li><a href="gallery.html">Gallery</a></li>
                  </ul>
                </li>
                <li><a href="blog.html">Blog</a></li>
                <li><a href="contact.html">Contact</a></li>
                <li class="d-lg-none"><a href="{{route('postJobPage')}}"><span class="mr-2">+</span> Post a Job</a></li>
                <li class="d-lg-none"><a href="login.html">Log In</a></li>
              </ul></div>
      </div>
    @include('layout.header')
    <!-- main -->
    @yield('content')
    <!-- footer -->
    @include('layout.footer')
</div>
@include('layout.foot')
</body>
</html>
