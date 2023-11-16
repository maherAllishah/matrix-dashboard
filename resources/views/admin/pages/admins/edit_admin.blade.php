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
                                    <li class="breadcrumb-item active"><a href="{{route('admin.admins.index')}}">admin
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
                                        <h3 class="m-0">Add New Admin </h3>
                                    </div>
                                </div>
                            </div>
                            <div class="white_card_body">

                                <form action="{{route('admin.admins.update', $admin->id)}}" method="POST"
                                      enctype="multipart/form-data">
                                    @method('PUT')
                                    @csrf
                                    <div class="row">

                                        <div class="col-lg-6">
                                            <div class="common_input mb_15">
                                                <input value="{{ old('name', $admin->name) }}" type="text"
                                                       placeholder="Full Name" name="name">
                                                @error('name')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror                                      </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="common_input mb_15">
                                                <input value="{{ old('position', $admin->position) }}" type="text"
                                                       placeholder="position" name="position">
                                                @error('position')
                                                <div class="text-danger">{{$message}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="common_input mb_15">
                                                <input value="{{ old('email', $admin->email) }}" type="email"
                                                       placeholder="Email" name="email">
                                                @error('email')
                                                <div class="text-danger">{{$message}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="common_input mb_15">
                                                <input value="{{ old('password', $admin->password) }}" type="password"
                                                       placeholder="Enter Password" name="password">
                                                @error('password')
                                                <div class="text-danger">{{$message}}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <select class="nice_Select2 nice_Select_line wide" style="display: none;"
                                                    name="role">
                                                <option value="1">Select Role</option>
                                                @foreach ($roles as $role )
                                                    @if($role->id !=1)
                                                        <option value="{{ $role->name }}">{{ $role->name }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                            @error('role')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-12 he-col-style">

                                            <button type="submit" class="btn_1 radius_btn d-block text-center">Update
                                                Admin
                                            </button>

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
