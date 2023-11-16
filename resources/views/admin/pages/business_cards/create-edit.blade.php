@extends('admin.layout.app')

@section('content')
    <section class="main_content dashboard_part large_header_bg">

        @include('admin.partials._header')

        <div class="main_content_iner overly_inner ">
            <div class="container-fluid p-0 ">

                <div class="row">
                    <div class="col-12">
                        <div class="page_title_box d-flex flex-wrap align-items-center justify-content-between">
                            <div class="page_title_left d-flex align-items-center">
                                <h3 class="f_s_25 f_w_700 dark_text mr_30">Dashboard</h3>
                                <ol class="breadcrumb page_bradcam mb-0">
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
                                    <li class="breadcrumb-item active"><a href="{{route('admin.businesses.index')}}">business
                                            list</a></li>
                                </ol>
                            </div>
                            <div class="page_title_right">
                                <div class="page_date_button d-flex align-items-center">
                                    <img src="{{asset('img/icon/calender_icon.svg')}}" alt>
                                    August 1, 2020 - August 31, 2020
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="white_card card_height_100 mb_30">
                            <div class="white_card_header">
                                <div class="box_header m-0">
                                    <div class="main-title">
                                        <h3 class="m-0">Edit and Update Service </h3>
                                    </div>
                                </div>
                            </div>
                            <div class="white_card_body">
                                @if(isset($data) && !empty($data))
                                    <form action="{{route('admin.businesses.update', $data->id)}}" method="post"
                                          enctype="multipart/form-data">
                                        @method('PUT')
                                        @csrf
                                        @else
                                            <form action="{{route('admin.businesses.store')}}" method="POST"
                                                  enctype="multipart/form-data">
                                                @csrf
                                                @endif

                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="common_input mb_15">
                                                            <input
                                                                @if(isset($data) && !empty($data))value="{{$data->title}}"
                                                                @endif type="text"
                                                                class="form-control @error('title') is-invalid @enderror"
                                                                placeholder="Full Name" name="title">
                                                        </div>
                                                    </div>
                                                    @error('title')
                                                    <span class="invalid" style="color: red" role="alert">
                                                {{ $message }}<br><br>
                                            </span>
                                                    @enderror

                                                    <div class="col-lg-6">
                                                        <div class="common_input mb_15">
                                                            <input
                                                                @if(isset($data) && !empty($data))value="{{$data->description}}"
                                                                @endif type="text"
                                                                class="form-control @error('description') is-invalid @enderror"
                                                                placeholder="Full Name" name="description">
                                                        </div>
                                                    </div>
                                                    @error('description')
                                                    <span class="invalid" style="color: red" role="alert">
                                                {{ $message }}<br><br>
                                            </span>
                                                    @enderror

                                                    <div class="col-lg-6">
                                                        <div class="common_input mb_15">
                                                            <input type="file" placeholder="Choose New Image"
                                                                   name="image">
                                                            <br><br>
                                                            <div class="common_input mb_15">
                                                                <img
                                                                    @if(isset($data) && !empty($data))src="{{ asset($data->image) }}"
                                                                    @endif style="width: 20%" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @error('image')
                                                    <span class="invalid" style="color: red" role="alert">
                                                {{ $message }}<br><br>
                                            </span>
                                                    @enderror

                                                    <div class="col-12">
                                                        <div class="create_report_btn mt_30">
                                                            <button type="submit"
                                                                    class="btn_1 radius_btn d-block text-center">
                                                                Update Business
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('admin.partials._footer')
    </section>
@endsection
