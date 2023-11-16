@extends('admin.layout.app')

@section('content')
    <section class="main_content dashboard_part large_header_bg">

        @include('admin.partials._header')

        <div class="main_content_iner overly_inner ">
            <div class="container-fluid p-0 ">

                @include('admin/partials/_head_pages', ['pageTitle' => 'feature list'])
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
                                    <form action="{{route('admin.features.update', $data->id)}}" method="post"
                                          enctype="multipart/form-data">
                                        @method('PUT')
                                        @csrf
                                        @else
                                            <form action="{{route('admin.features.store')}}" method="POST"
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
                                                            <input type="file"
                                                                   class="form-control @error('image') is-invalid @enderror"
                                                                   placeholder="Choose New Image" name="image">
                                                            <br><br>
                                                            <div class="common_input mb_15">

                                                                <img
                                                                    @if(isset($data) && !empty($data))src="{{asset($data->image)  }} "
                                                                    @endif
                                                                    style="width: 20%" alt="">
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
                                                                Update Service
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
