@extends('admin.layout.app')

@section('content')
    <section class="main_content dashboard_part large_header_bg">

        @include('admin.partials._header')

        <div class="main_content_iner overly_inner ">
            <div class="container-fluid p-0 ">

                @include('admin/partials/_head_pages', ['pageTitle' => 'Product list '])

                <div class="row">
                    <div class="col-12">
                        <div class="white_card card_height_100 mb_30">
                            <div class="white_card_header">
                                <div class="box_header m-0">
                                    <div class="main-title">
                                        <h3 class="m-0">Add New Product </h3>
                                    </div>
                                </div>
                            </div>
                            <div class="white_card_body">

                                <form action="{{route('admin.products.store')}}" method="POST"
                                      enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">

                                        <div class="col-lg-6">
                                            <div class="common_input mb_15">
                                                <input type="text"
                                                       class="form-control @error('name') is-invalid @enderror"
                                                       placeholder="Product Name" name="name">
                                            </div>
                                        </div>
                                        @error('name')
                                        <span class="invalid" style="color: red" role="alert">
                                                {{ $message }}<br><br>
                                            </span>
                                        @enderror

                                        <div class="col-lg-6">
                                            <div class="common_input mb_15">
                                                <input type="text"
                                                       class="form-control @error('link') is-invalid @enderror"
                                                       placeholder="ink" name="link">
                                            </div>
                                        </div>
                                        @error('link')
                                        <span class="invalid" style="color: red" role="alert">
                                                {{ $message }}<br><br>
                                            </span>
                                        @enderror

                                        <div class="col-lg-6">
                                            <select id="business_id" name="business_id"
                                                    class="nice_Select2 nice_Select_line wide " style="display: none;">
                                                <option
                                                    class="form-control @error('business_id') is-invalid @enderror"></option>
                                                @foreach($data as  $value)
                                                    <option value="{{ $value->id }}">
                                                        {{ $value->title }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @error('business_id')
                                        <span class="invalid" style="color: red" role="alert">
                                                {{ $message }}<br><br>
                                            </span>
                                        @enderror

                                        <div class="col-lg-6">
                                            <div class="common_input mb_15">
                                                <input type="file"
                                                       class="form-control @error('image') is-invalid @enderror"
                                                       placeholder="Full Name" name="image">
                                            </div>
                                        </div>
                                        @error('image')
                                        <span class="invalid" style="color: red" role="alert">
                                                {{ $message }}<br><br>
                                            </span>
                                        @enderror


                                        <div class="col-12">
                                            <div class="create_report_btn mt_30">
                                                <button type="submit" class="btn_1 radius_btn d-block text-center">Add
                                                    Product
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
