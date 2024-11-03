@extends('layout.layout')
@section('content')
<section class="section-hero home-section overlay inner-page bg-image" style="background-image: url('images/hero_1.jpg');" id="home-section">

    <div class="container">
      <div class="row align-items-center justify-content-center">
        <div class="col-md-12">
          <div class="mb-5 text-center">
            <h1 class="text-white font-weight-bold">Cách dễ nhất để có được công việc mơ ước</h1>
            <p>Chọn một công việc bạn yêu thích, và bạn sẽ không phải làm việc một ngày nào trong cuộc đời.</p>
          </div>
          <form method="post" class="search-jobs-form">
            <div class="row mb-5">
              <div class="col-12 col-sm-6 col-md-6 col-lg-3 mb-4 mb-lg-0">
                <input type="text" class="form-control form-control-lg" placeholder="Job title, Company...">
              </div>
              <div class="col-12 col-sm-6 col-md-6 col-lg-3 mb-4 mb-lg-0">
                <button type="submit" class="btn btn-primary btn-lg btn-block text-white btn-search"><span class="icon-search icon mr-2"></span>Search Job</button>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12 popular-keywords">
                <h3>Trending Keywords:</h3>
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
  <section class="site-section" id="next">
    <div class="container">

      <div class="row mb-5 justify-content-center">
        <div class="col-md-7 text-center">
          <h2 class="section-title mb-2">{{$count_job}} Công việc</h2>
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

      <div class="row pagination-wrap">
        <div class="col-md-6 text-center text-md-right">
          <div class="custom-pagination ml-auto">
            <a href="#" class="prev">Prev</a>
            <div class="d-inline-block">
                {{ $Jobs->links() }}
            </div>
            <a href="#" class="next">Next</a>
          </div>
        </div>
      </div>

    </div>
  </section>
  <section class="py-5 bg-image overlay-primary fixed overlay" style="background-image: url('images/hero_1.jpg');">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-8">
          <h2 class="text-white">Tìm kiếm 1 công việc ?</h2>
          <p class="mb-0 text-white lead">Chọn một công việc bạn yêu thích, và bạn sẽ không phải làm việc một ngày nào trong cuộc đời.</p>
        </div>
        <div class="col-md-3 ml-auto">
          <a href="{{route('showRegister')}}" class="btn btn-warning btn-block btn-lg">Đăng ký</a>
        </div>
      </div>
    </div>
  </section>
  @endsection
