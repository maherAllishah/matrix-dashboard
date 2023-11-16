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
                                <li class="breadcrumb-item active"><a href="{{route('admin.admins.index')}}">admin list</a></li>
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

                          <form  enctype="multipart/form-data">

                              @csrf
                              <div class="row">

                                  <div class="col-lg-6">
                                      <div class="common_input mb_15">
                                          <input value="{{ $admin->name }}" type="text" placeholder="Full Name" name="name">
                                      </div>
                                  </div>
                                  <div class="col-lg-6">
                                      <div class="common_input mb_15">
                                          <input value="{{ $admin->position }}" type="text" placeholder="position" name="position">
                                      </div>
                                  </div>
                                  <div class="col-lg-6">
                                      <div class="common_input mb_15">
                                          <input value="{{ $admin->email }}" type="email" placeholder="Email" name="email">
                                      </div>
                                  </div>
                                  <div class="col-lg-6">
                                      <div class="common_input mb_15">
                                          <input value="{{ $admin->password }}" type="password" placeholder="Enter Password" name="password">
                                      </div>
                                  </div>
                                  <div class="col-lg-6">
                                      <div class="common_input mb_15">
{{--                                          <div class="file-input">--}}
{{--                                              <input type="file" name="avatar" id="file-input" class="file-input__input"/>--}}
{{--                                              <img src="{{storageImage($admin->avatar)}}" style="width: 80%" alt="">--}}
{{--                                              <label class="file-input__label" for="file-input">--}}
{{--                                                  <svg--}}
{{--                                                      aria-hidden="true" focusable="false" data-prefix="fas"--}}
{{--                                                      data-icon="upload" class="svg-inline--fa fa-upload fa-w-16"--}}
{{--                                                      role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">--}}

{{--                                                      <path fill="currentColor" d="M296 384h-80c-13.3 0-24-10.7-24-24V192h-87.7c-17.8 0-26.7-21.5-14.1-34.1L242.3 5.7c7.5-7.5 19.8-7.5 27.3 0l152.2 152.2c12.6 12.6 3.7 34.1-14.1 34.1H320v168c0 13.3-10.7 24-24 24zm216-8v112c0 13.3-10.7 24-24 24H24c-13.3 0-24-10.7-24-24V376c0-13.3 10.7-24 24-24h136v8c0 30.9 25.1 56 56 56h80c30.9 0 56-25.1 56-56v-8h136c13.3 0 24 10.7 24 24zm-124 88c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20zm64 0c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20z"></path>--}}
{{--                                                  </svg>--}}
{{--                                                  <span>Upload file</span></label>--}}
{{--                                          </div>--}}
                                      </div>
                                  </div>


{{--                                  <div class="col-lg-6">--}}
{{--                                      <select class="nice_Select2 nice_Select_line wide" style="display: none;">--}}
{{--                                          <option value="1">Select Role</option>--}}
{{--                                          <option value="1">Role 1</option>--}}
{{--                                          <option value="1">Role2</option>--}}
{{--                                      </select>--}}
{{--                                  </div>--}}
                                  <div class="col-12">
                                      <div class="create_report_btn mt_30">
                                          <a href="{{route('admin.admins.index')}}" class="btn_1 radius_btn d-block text-center">Go Back</a>
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
