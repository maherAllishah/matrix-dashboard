@extends('admin.layout.app')

@section('content')
    <section class="main_content dashboard_part large_header_bg">

        @include('admin.partials._header')
        @include('admin/partials/_head_pages', ['pageTitle' => 'Edit and Update Department'])
        <div class="row">
            <div class="col-12">
                <div class="white_card card_height_100 mb_30">
                    <div class="white_card_header">
                        <div class="box_header m-0">
                            <div class="main-title">
                            </div>
                        </div>
                    </div>
                    <div class="white_card_body">

                        <form action="{{route('admin.departments.update', $data->id)}}" method="post"
                              enctype="multipart/form-data">
                            @method('PUT')
                            @csrf

                            <div class="row">

                                <div class="col-lg-6">
                                    <div class="common_input mb_15">
                                        <input value="{{$data->name}}" type="text" placeholder="Full Name"
                                               name="name">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <select id="admin_id" name="admin_id" class="nice_Select2 nice_Select_line wide"
                                            style="display: none;">

                                        @foreach($admins as  $value)
                                            <option value="{{ $value->id }}">
                                                {{ $value->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-12">
                                    <div class="create_report_btn mt_30">
                                        <button type="submit" class="btn_1 radius_btn d-block text-center">Update
                                            Department
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        @include('admin.partials._footer')
    </section>
@endsection
