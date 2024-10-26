@extends('admin.main')
@section('contents')
    <div class="container-fluid flex-grow-1 container-p-y">
        <h3 class="fw-bold text-primary py-3 mb-4">{{ $title }}</h3>
        <div>
            <form class="form-search" method="GET" action="{{ route('job_categories.index') }}">
                @csrf
                <div class="d-flex align-items-center mb-4">
                    <h4 class="ten-game me-3 mb-0">Tìm kiếm</h4>
                </div>
                <div class="mb-3">
                    <div class="row">
                        <div class="col-lg-4 col-sm-6 col-12 mb-3">
                            <input class="form-control shadow-none" type="text" id="searchInputNv" name="search_id"
                                placeholder="Tìm theo mã số..." value="{{ request()->search_id }}">
                        </div>
                        <div class="col-lg-4 col-sm-6 col-12 mb-3">
                            <input class="form-control shadow-none" type="text" id="searchInputVk" name="search_name"
                                placeholder="Tìm theo tên danh mục..." value="{{ request()->search_name }}">
                        </div>
                        <div class="col-lg-4 col-sm-6 col-12 mb-3">
                            <div class="text-center text-nowrap">
                                <button type="submit" class="btn btn-danger rounded-pill">
                                    <i class="fas fa-search me-2"></i>Tìm kiếm
                                </button>
                                <a href="{{ route('job_categories.index') }}" class="btn btn-secondary rounded-pill ms-2">
                                    <i class="fas fa-times me-2"></i>Xóa lọc
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <div class="card">
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tiêu đề công việc</th>
                            <th>Hình ảnh</th>
                            <th>Vị trí</th>
                            <th>Địa chỉ</th>
                            <th>Yêu cầu làm việc</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($Jobs as $category)
                            <tr data-id="{{ $category->id }}">
                                <td> {{ $loop->iteration }}</td>
                                <td>{{ $category->title }}</td>
                                <td><img src="{{ asset("temp/images/job/$category->thumb") }}" alt="{{ $category->title }}"
                                        srcset="{{ $category->title }}" width="90px" height="90px"></td>
                                <td>{{ $category->position }}</td>
                                <td>{{ $category->location ?? '' }}</td>
                                <td>{{ $category->type }}</td>
                                <td class="">
                                    <button type="button" class="btn btn-danger btnDeleteAsk px-2 me-2 py-1 fw-bolder"
                                        data-bs-toggle="modal" data-bs-target="#modalDetail{{ $category->id }}">Chi
                                        tiết</button>
                                </td>

                                <!-- Modal Delete with Details -->
                                <div class="modal fade" id="modalDetail{{ $category->id }}" tabindex="-1"
                                    aria-labelledby="modalDetail{{ $category->id }}Label" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modalDetail{{ $category->id }}Label">
                                                    Chi Tiết Công Việc: {{ $category->title }}
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="d-flex align-items-start">
                                                    <div class="job-details" style="margin-right:200px">
                                                        <p><strong>Vị trí:</strong> {{ $category->position }}</p>
                                                        <p><strong>Địa điểm:</strong> {{ $category->location ?? 'N/A' }}
                                                        </p>
                                                        <p><strong>Loại công việc:</strong> {{ $category->type }}</p>
                                                        <p><strong>Lương:</strong> {{ $category->salary }}</p>
                                                        <p><strong>Kinh nghiệm:</strong> {{ $category->Experience }}</p>
                                                        <p><strong>giới tính:</strong> {{ $category->gender }}</p>
                                                        <p><strong>thời hạn:</strong> {{ $category->expires_at }}</p>
                                                    </div>
                                                    <div class="ms-4">
                                                        <img src="{{ asset("temp/images/job/$category->thumb") }}"
                                                            alt="{{ $category->title }}" width="300px" height="300px">
                                                    </div>
                                                </div>
                                                <div class="mt-4 w-100">
                                                    <p><strong>{!! $category->requirements !!}</p>

                                                    <p><strong>Mô tả công việc:</strong> {!! $category->description ?? 'Không có mô tả' !!}</p>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                             
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Đóng</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </tr>
                        @endforeach
                    </tbody>

                </table>
                <div class="pagination mt-4 pb-4">
                    {{ $Jobs->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
