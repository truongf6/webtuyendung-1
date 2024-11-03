@extends('layout.layout')
@section('content')
    <section class="section-hero overlay inner-page bg-image" style="background-image: url('/temp/assets/images/hero_1.jpg');"
        id="home-section">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <h1 class="text-white font-weight-bold">Đơn đã ứng tuyển</h1>
                    <div class="custom-breadcrumbs">
                        <a href="/">Trang chủ</a> <span class="mx-2 slash">/</span>
                        <span class="text-white"><strong>Dơn đã ứng tuyển</strong></span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="site-section">
        <div class="container">

            <div class="row align-items-center mb-5">
                <div class="col-lg-8 mb-4 mb-lg-0">
                    <div class="d-flex align-items-center">
                        <div>
                            <h2>Đơn đã ứng tuyển</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-5">
                <div class="col-lg-12">
                    <table class="table">
                        <thead>
                            <tr class="text-nowrap">
                                <th>STT</th>
                                <th>Hình ảnh</th>
                                <th>Tiêu đề công việc</th>
                                <th>Vị trí</th>
                                <th>Công ty</th>
                                <th>Địa chỉ</th>
                                <th>Thời gian làm việc</th>
                                <th>Trạng thái</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0 text-nowrap">
                            @foreach ($applications as $application)
                                <tr data-id="{{ $application->Job->id }}">
                                    <td> {{ $loop->iteration }}</td>
                                    <td><img src="{{ asset("temp/images/job/" . $application->Job->thumb) }}"
                                        alt="{{ $application->Job->title }}" srcset="{{ $application->Job->title }}" width="90px"
                                        height="90px"></td>
                                        <td>{{ $application->Job->title }}</td>
                                    <td>{{ $application->Job->position }}</td>
                                    <td>{{ $application->Job->Company->name }}</td>
                                    <td>{{ $application->Job->location ?? '' }}</td>
                                    <td>{{ $application->Job->type }}</td>
                                    @if($application->status == null)
                                        <td class="bg-warning font-weight-bold">Đang chờ duyệt</td>
                                    @elseif($application->status == 0)
                                        <td class="bg-danger" font-weight-bold>Không được duyệt</td>
                                    @else
                                        <td class="bg-success font-weight-bold">Đã duyệt</td>
                                    @endif
                                    <td class="">
                                        <a href="{{ route('jobDetail', $application->Job->slug) }}" type="button"
                                            class="btn btn-danger btnDeleteAsk px-2 me-2 py-1 fw-bolder"
                                            data-bs-toggle="modal" data-bs-target="#modalDetail{{ $application->Job->id }}">Chi
                                            tiết
                                        </a>
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                    <div class="pagination mt-4 pb-4">
                        {{ $applications->links() }}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
