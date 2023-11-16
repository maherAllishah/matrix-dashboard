@extends('admin.layout.app')

@section('content')
    <section class="main_content dashboard_part large_header_bg">

        @include('admin.partials._header')

        @include('admin/partials/_head_pages', ['pageTitle' => 'Update Setting '])

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

                        @if(isset($data) && !empty($data))
                            <form action="{{route('admin.settings.update', $data->id)}}" method="post"
                                  enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                @else
                                    <form action="{{route('admin.settings.store')}}" method="POST"
                                          enctype="multipart/form-data">
                                        @csrf
                                        @endif
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="common_input mb_15">
                                                    <label class="text">country</label>
                                                    <input @if(isset($data) && !empty($data)) value="{{$data->country}}"
                                                           @endif type="text"
                                                           name="country">
                                                    @error('country')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="common_input mb_15">
                                                    <label class="text">city</label>
                                                    <input @if(isset($data) && !empty($data))value="{{$data->city}}"
                                                           @endif type="text"  name="city">
                                                    @error('city')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror      </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="common_input mb_15">
                                                    <label class="text">phone</label>
                                                    <input @if(isset($data) && !empty($data))value="{{$data->phone}}"
                                                           @endif type="text"
                                                           name="phone">
                                                    @error('phone')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="common_input mb_15">
                                                    <label class="text">email</label>
                                                    <input @if(isset($data) && !empty($data))value="{{$data->email}}"
                                                           @endif type="text"
                                                           name="email">
                                                    @error('email')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="common_input mb_15">
                                                    <label class="text">hours work</label>
                                                    <input @if(isset($data) && !empty($data))value="{{$data->hours}}"
                                                           @endif type="text"
                                                           name="hours">
                                                    @error('hours')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="common_input mb_15">
                                                    <label class="text">facebook</label>
                                                    <input @if(isset($data) && !empty($data))value="{{$data->facebook}}"
                                                           @endif type="text"
                                                           name="facebook">
                                                    @error('facebook')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="common_input mb_15">
                                                    <label class="text">whatsapp</label>
                                                    <input @if(isset($data) && !empty($data))value="{{$data->whatsapp}}"
                                                           @endif type="text"
                                                           name="whatsapp">
                                                    @error('whatsapp')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="common_input mb_15">
                                                    <label class="text">instagram</label>
                                                    <input @if(isset($data) && !empty($data))value="{{$data->instagram}}"
                                                           @endif type="text"
                                                           name="instagram">
                                                    @error('instagram')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="common_input mb_15">
                                                    <label class="text">linkedin</label>
                                                    <input @if(isset($data) && !empty($data))value="{{$data->linkedin}}"
                                                           @endif type="text"
                                                           name="linkedin">
                                                    @error('linkedin')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>


                                            <div class="col-12">
                                                <div class="create_report_btn mt_30">
                                                    <button type="submit" class="btn_1 radius_btn d-block text-center">
                                                        @if(isset($data) && !empty($data))
                                                            Update Setting
                                                        @else
                                                            Add Setting
                                                        @endif

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
