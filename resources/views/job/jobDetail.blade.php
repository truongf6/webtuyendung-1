@extends('layout.layout')
@section('content')

<style>
  .modal-backdrop{
    z-index: inherit;
  }
  .modal-dialog{
    max-width: 1110px;
  }
</style>
<section class="section-hero overlay inner-page bg-image" style="background-image: url('/temp/assets/images/hero_1.jpg');" id="home-section">
  <div class="container">
    <div class="row">
      <div class="col-md-7">
        <h1 class="text-white font-weight-bold">{{$job->title}}</h1>
        <div class="custom-breadcrumbs">
          <a href="/">Trang chủ</a> <span class="mx-2 slash">/</span>
          <a href="#">Công việc</a> <span class="mx-2 slash">/</span>
          <span class="text-white"><strong>{{$job->title}}</strong></span>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="site-section pb-0">
  <div class="container border-bottom">
    <div class="row align-items-center mb-5">
      <div class="col-lg-8 mb-4 mb-lg-0">
        <div class="d-flex align-items-center">
          <div class="border p-2 d-inline-block mr-3 rounded">
            <img src="/temp/images/company/{{$company->thumb}}" width="150" height="150" alt="Image">
          </div>
          <div>
            <h2>{{$company->name}}</h2>
            <div>
              <span class="ml-0 mr-2 mb-2"><span class="icon-briefcase mr-2"></span>{{$job->Category->title}}</span>
              <span class="m-2"><span class="icon-room mr-2"></span>{{$company->location}}</span>
              <span class="m-2"><span class="icon-clock-o mr-2"></span><span class="text-primary">{{ $job->type }}</span></span>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4">

        <div class="row">
          @if( Auth::check() && Auth::user()->role_id == 3 )
            @if($hasApplyJob)
                @if($hasApplyJob->status === null)
                <h4 class="text-danger font-weight-bold d-flex align-items-center">ĐÃ NẠP ĐƠN!<span class="badge bg-warning ml-3 text-dark">Chưa duyệt</span></h4>
            @else
                @if ($hasApplyJob->status === 0)
                <h4 class="text-danger font-weight-bold d-flex align-items-center">ĐÃ NẠP ĐƠN!<span class="badge bg-danger ml-3 text-white">Đã từ chối</span></h4>
                @elseif ($hasApplyJob->status === 1)
                <h4 class="text-danger font-weight-bold d-flex align-items-center">ĐÃ NẠP ĐƠN!<span class="badge bg-success ml-3 text-dark">Đã duyệt</span></h4>
                @endif
            @endif
            @else
              <div class="row mb-5">
                <div class="col-6">
                  @if($favourite)
                      <a href="#" class="btn btn-light btn-md text-nowrap remove-job-btn" data-job-id="{{ $job->id }}">
                          <span class="icon-heart mr-2 text-danger"></span>Bỏ lưu
                      </a>
                  @else
                      <a href="#" class="btn btn-light btn-md text-nowrap save-job-btn" data-job-id="{{ $job->id }}">
                          <span class="icon-heart-o mr-2 text-danger"></span>Lưu công việc
                      </a>
                  @endif
              </div>
                <div class="col-6">
                  <button type="button" class="btn text-nowrap btn-primary btn-md" data-toggle="modal" data-target="#exampleModalCenter">
                    Nạp đơn ngay
                  </button>
                </div>
              </div>

              <!-- Modal -->
              <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <div class="d-block">
                        <h5 class="modal-title font-weight-bold" id="exampleModalLongTitle">BẠN ĐANG NỘP ĐƠN CHO VỊ TRÍ</h5>
                        <h4 class="font-weight-bold">
                          <span class="text-danger">{{$job->position}}</span>
                          <span>tại {{$job->Company->name}}</span>
                        </h4>
                      </div>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <div class="error">
                        @include('admin.error')
                      </div>
                      <form action="{{route('applyJob',$job->slug)}}" method="post" enctype="multipart/form-data" id="form_applyJob">
                        @csrf
                        <div class="body-content row">
                          <h5 class="col-3 font-weight-bold text-black">Thông tin cơ bản</h5>
                          <div class="col-9 row bg-light">
                            <div class="form-group d-block col-4">
                              <label for="inputFullname" class="col-form-label">Tên đầy đủ</label>
                              <div class="">
                                <input type="text" data-require="Vui lòng nhập tên đầy đủ!" value="{{$job->User->name}}" class="form-control input-field" name="name" id="inputFullname" placeholder="Fullname">
                              </div>
                            </div>
                            <div class="form-group d-block col-4">
                              <label for="inputPhoneNumber" class="col-form-label">Số điện thoại</label>
                              <div class="">
                                <input type="text" data-require="Vui lòng nhập số điện thoại!" value="{{$job->User->phone_number}}" class="form-control input-field" name="phone_number" id="inputPhoneNumber" placeholder="PhoneNumber">
                              </div>
                            </div>
                            <div class="form-group d-block col-4">
                              <label for="inputEmail" class="col-form-label">Email</label>
                              <div class="">
                                <input type="email" disabled value="{{$job->User->email}}" class="form-control input-field" name="email" id="inputEmail" placeholder="Email">
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="body-content row mt-3">
                          <h5 class="col-3 font-weight-bold text-black">CV của bạn</h5>
                          <div class="col-9 row bg-light">
                            <div class="form-group d-block col-4">
                              <label for="inputFullname" class="col-form-label">Tải lên CV ( PDF  )</label>
                              <div class="">
                                <input data-require="Vui lòng tải lên CV!" class="input-field" type="file" name="cv">
                              </div>
                            </div>
                          </div>
                        </div>
                          
                        <div class="modal-footer mt-3">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                          <button type="submit" class="btn btn-primary">Nạp đơn</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            @endif
          @else
            <div class="col-6">
              <a href="{{ route('viewJobPageEdit', $job->slug) }}" class="btn btn-block btn-light btn-md">Sửa</a>
            </div>
          @endif
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-8">
        <div class="mb-5">
          <figure class="mb-5"><img src="/temp/images/job/{{$job->thumb}}" alt="Image" class="img-fluid rounded"></figure>
          <h3 class="h5 d-flex align-items-center mb-4 text-primary"><span class="icon-align-left mr-3"></span>Mô tả công việc</h3>
          {!! $job->description !!}
        </div>
        <div class="mb-5">
          <h3 class="h5 d-flex align-items-center mb-4 text-primary"><span class="icon-rocket mr-3"></span>Yêu cầu tuyển dụng</h3>
          {!! $job->requirements !!}
          
        </div>

      </div>
      <div class="col-lg-4">
        <div class="bg-light p-3 border rounded mb-4">
          <h3 class="text-primary  mt-3 h5 pl-3 mb-3 ">Tổng hợp công việc</h3>
          <ul class="list-unstyled pl-3 mb-0">
            <li class="mb-2"><strong class="text-black">Ngày đăng</strong> {{$job->created_at}}</li>
            <li class="mb-2"><strong class="text-black">Vị trí tuyển:</strong> {{$job->position}}</li>
            <li class="mb-2"><strong class="text-black">Thời gian làm việc:</strong> {{$job->type}}</li>
            <li class="mb-2"><strong class="text-black">Kinh nghiệm:</strong> {{$job->Experience}}</li>
            <li class="mb-2"><strong class="text-black">vị trí làm việc:</strong> {{$job->location}}</li>
            <li class="mb-2"><strong class="text-black">Lương:</strong> {{$job->salary}}</li>
            <li class="mb-2"><strong class="text-black">Giới tính:</strong> {{$job->gender}}</li>
            <li class="mb-2"><strong class="text-black">Hạn tuyển dụng:</strong> {{ date('d/m/Y', strtotime($job->expires_at)) }}</li>
          </ul>
        </div>

        <div class="bg-light p-3 border rounded">
          <h3 class="text-primary  mt-3 h5 pl-3 mb-3 ">Share</h3>
          <div class="px-3">
            <a href="#" class="pt-3 pb-3 pr-3 pl-0"><span class="icon-facebook"></span></a>
            <a href="#" class="pt-3 pb-3 pr-3 pl-0"><span class="icon-twitter"></span></a>
            <a href="#" class="pt-3 pb-3 pr-3 pl-0"><span class="icon-linkedin"></span></a>
            <a href="#" class="pt-3 pb-3 pr-3 pl-0"><span class="icon-pinterest"></span></a>
          </div>
        </div>

      </div>
    </div>
  </div>
</section>

<section class="site-section" id="next">
  <div class="container">

    <div class="row mb-5 justify-content-center">
      <div class="col-md-7 text-center">
        <h2 class="section-title mb-2">Các công việc liên quan</h2>
      </div>
    </div>
    
    <ul class="job-listings mb-5">
      <li class="job-listing d-block d-sm-flex pb-3 pb-sm-0 align-items-center">
        <a href="job-single.html"></a>
        <div class="job-listing-logo">
          <img src="/temp/assets/images/job_logo_1.jpg" alt="Image" class="img-fluid">
        </div>

        <div class="job-listing-about d-sm-flex custom-width w-100 justify-content-between mx-4">
          <div class="job-listing-position custom-width w-50 mb-3 mb-sm-0">
            <h2>Product Designer</h2>
            <strong>Adidas</strong>
          </div>
          <div class="job-listing-location mb-3 mb-sm-0 custom-width w-25">
            <span class="icon-room"></span> New York, New York
          </div>
          <div class="job-listing-meta">
            <span class="badge badge-danger">Part Time</span>
          </div>
        </div>
        
      </li>
      <li class="job-listing d-block d-sm-flex pb-3 pb-sm-0 align-items-center">
        <a href="job-single.html"></a>
        <div class="job-listing-logo">
          <img src="/temp/assets/images/job_logo_2.jpg" alt="Image" class="img-fluid">
        </div>

        <div class="job-listing-about d-sm-flex custom-width w-100 justify-content-between mx-4">
          <div class="job-listing-position custom-width w-50 mb-3 mb-sm-0">
            <h2>Digital Marketing Director</h2>
            <strong>Sprint</strong>
          </div>
          <div class="job-listing-location mb-3 mb-sm-0 custom-width w-25">
            <span class="icon-room"></span> Overland Park, Kansas 
          </div>
          <div class="job-listing-meta">
            <span class="badge badge-success">Full Time</span>
          </div>
        </div>
      </li>

      <li class="job-listing d-block d-sm-flex pb-3 pb-sm-0 align-items-center">
        <a href="job-single.html"></a>
        <div class="job-listing-logo">
          <img src="/temp/assets/images/job_logo_3.jpg" alt="Image" class="img-fluid">
        </div>

        <div class="job-listing-about d-sm-flex custom-width w-100 justify-content-between mx-4">
          <div class="job-listing-position custom-width w-50 mb-3 mb-sm-0">
            <h2>Back-end Engineer (Python)</h2>
            <strong>Amazon</strong>
          </div>
          <div class="job-listing-location mb-3 mb-sm-0 custom-width w-25">
            <span class="icon-room"></span> Overland Park, Kansas 
          </div>
          <div class="job-listing-meta">
            <span class="badge badge-success">Full Time</span>
          </div>
        </div>
      </li>

      <li class="job-listing d-block d-sm-flex pb-3 pb-sm-0 align-items-center">
        <a href="job-single.html"></a>
        <div class="job-listing-logo">
          <img src="/temp/assets/images/job_logo_4.jpg" alt="Image" class="img-fluid">
        </div>

        <div class="job-listing-about d-sm-flex custom-width w-100 justify-content-between mx-4">
          <div class="job-listing-position custom-width w-50 mb-3 mb-sm-0">
            <h2>Senior Art Director</h2>
            <strong>Microsoft</strong>
          </div>
          <div class="job-listing-location mb-3 mb-sm-0 custom-width w-25">
            <span class="icon-room"></span> Anywhere 
          </div>
          <div class="job-listing-meta">
            <span class="badge badge-success">Full Time</span>
          </div>
        </div>
      </li>

      <li class="job-listing d-block d-sm-flex pb-3 pb-sm-0 align-items-center">
        <a href="job-single.html"></a>
        <div class="job-listing-logo">
          <img src="/temp/assets/images/job_logo_5.jpg" alt="Image" class="img-fluid">
        </div>

        <div class="job-listing-about d-sm-flex custom-width w-100 justify-content-between mx-4">
          <div class="job-listing-position custom-width w-50 mb-3 mb-sm-0">
            <h2>Product Designer</h2>
            <strong>Puma</strong>
          </div>
          <div class="job-listing-location mb-3 mb-sm-0 custom-width w-25">
            <span class="icon-room"></span> San Mateo, CA 
          </div>
          <div class="job-listing-meta">
            <span class="badge badge-success">Full Time</span>
          </div>
        </div>
      </li>
      <li class="job-listing d-block d-sm-flex pb-3 pb-sm-0 align-items-center">
        <a href="job-single.html"></a>
        <div class="job-listing-logo">
          <img src="/temp/assets/images/job_logo_1.jpg" alt="Image" class="img-fluid">
        </div>

        <div class="job-listing-about d-sm-flex custom-width w-100 justify-content-between mx-4">
          <div class="job-listing-position custom-width w-50 mb-3 mb-sm-0">
            <h2>Product Designer</h2>
            <strong>Adidas</strong>
          </div>
          <div class="job-listing-location mb-3 mb-sm-0 custom-width w-25">
            <span class="icon-room"></span> New York, New York
          </div>
          <div class="job-listing-meta">
            <span class="badge badge-danger">Part Time</span>
          </div>
        </div>
        
      </li>
      <li class="job-listing d-block d-sm-flex pb-3 pb-sm-0 align-items-center">
        <a href="job-single.html"></a>
        <div class="job-listing-logo">
          <img src="/temp/assets/images/job_logo_2.jpg" alt="Image" class="img-fluid">
        </div>

        <div class="job-listing-about d-sm-flex custom-width w-100 justify-content-between mx-4">
          <div class="job-listing-position custom-width w-50 mb-3 mb-sm-0">
            <h2>Digital Marketing Director</h2>
            <strong>Sprint</strong>
          </div>
          <div class="job-listing-location mb-3 mb-sm-0 custom-width w-25">
            <span class="icon-room"></span> Overland Park, Kansas 
          </div>
          <div class="job-listing-meta">
            <span class="badge badge-success">Full Time</span>
          </div>
        </div>
      </li>

      

      
    </ul>

    <div class="row pagination-wrap">
      <div class="col-md-6 text-center text-md-left mb-4 mb-md-0">
        <span>Showing 1-7 Of 22,392 Jobs</span>
      </div>
      <div class="col-md-6 text-center text-md-right">
        <div class="custom-pagination ml-auto">
          <a href="#" class="prev">Prev</a>
          <div class="d-inline-block">
          <a href="#" class="active">1</a>
          <a href="#">2</a>
          <a href="#">3</a>
          <a href="#">4</a>
          </div>
          <a href="#" class="next">Next</a>
        </div>
      </div>
    </div>

  </div>
</section>


<section class="bg-light pt-5 testimony-full">
    
    <div class="owl-carousel single-carousel">

    
      <div class="container">
        <div class="row">
          <div class="col-lg-6 align-self-center text-center text-lg-left">
            <blockquote>
              <p>&ldquo;Soluta quasi cum delectus eum facilis recusandae nesciunt molestias accusantium libero dolores repellat id in dolorem laborum ad modi qui at quas dolorum voluptatem voluptatum repudiandae.&rdquo;</p>
              <p><cite> &mdash; Corey Woods, @Dribbble</cite></p>
            </blockquote>
          </div>
          <div class="col-lg-6 align-self-end text-center text-lg-right">
            <img src="/temp/assets/images/person_transparent_2.png" alt="Image" class="img-fluid mb-0">
          </div>
        </div>
      </div>

      <div class="container">
        <div class="row">
          <div class="col-lg-6 align-self-center text-center text-lg-left">
            <blockquote>
              <p>&ldquo;Soluta quasi cum delectus eum facilis recusandae nesciunt molestias accusantium libero dolores repellat id in dolorem laborum ad modi qui at quas dolorum voluptatem voluptatum repudiandae.&rdquo;</p>
              <p><cite> &mdash; Chris Peters, @Google</cite></p>
            </blockquote>
          </div>
          <div class="col-lg-6 align-self-end text-center text-lg-right">
            <img src="/temp/assets/images/person_transparent.png" alt="Image" class="img-fluid mb-0">
          </div>
        </div>
      </div>

  </div>

</section>

<section class="pt-5 bg-image overlay-primary fixed overlay" style="background-image: url('images/hero_1.jpg');">
  <div class="container">
    <div class="row">
      <div class="col-md-6 align-self-center text-center text-md-left mb-5 mb-md-0">
        <h2 class="text-white">Get The Mobile Apps</h2>
        <p class="mb-5 lead text-white">Lorem ipsum dolor sit amet consectetur adipisicing elit tempora adipisci impedit.</p>
        <p class="mb-0">
          <a href="#" class="btn btn-dark btn-md px-4 border-width-2"><span class="icon-apple mr-3"></span>App Store</a>
          <a href="#" class="btn btn-dark btn-md px-4 border-width-2"><span class="icon-android mr-3"></span>Play Store</a>
        </p>
      </div>
      <div class="col-md-6 ml-auto align-self-end">
        <img src="/temp/assets/images/apps.png" alt="Image" class="img-fluid">
      </div>
    </div>
  </div>
</section>
<script>
  $(document).ready(function() {
    $('.save-job-btn').on('click', function(e) {
        e.preventDefault();
        
        let job_id = $(this).data('job-id');

        $.ajax({
            url: "{{ route('favourite.store') }}",
            method: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                job_id: job_id
            },
            success: function(response) {
                if(response.status === 'success') {
                    alert(response.message);
                    window.location.reload();
                } else {
                    alert(response.message);
                }
            },
            error: function(xhr) {
                if(xhr.status === 401) {
                    alert("Bạn cần đăng nhập để lưu công việc");
                } else {
                    alert("Đã xảy ra lỗi, vui lòng thử lại sau");
                }
            }
        });
    });

    $('.remove-job-btn').on('click', function(e) {
        e.preventDefault();
        
        let job_id = $(this).data('job-id');

        $.ajax({
            url: "{{ route('favourite.destroy') }}",
            method: "DELETE",
            data: {
                _token: "{{ csrf_token() }}",
                job_id: job_id
            },
            success: function(response) {
                if(response.status === 'success') {
                    alert(response.message);
                    window.location.reload();
                } else {
                    alert(response.message);
                }
            },
            error: function(xhr) {
                if(xhr.status === 401) {
                    alert("Bạn cần đăng nhập để bỏ lưu công việc");
                } else {
                    alert("Đã xảy ra lỗi, vui lòng thử lại sau");
                }
            }
        });
    });
});
</script>
@endsection