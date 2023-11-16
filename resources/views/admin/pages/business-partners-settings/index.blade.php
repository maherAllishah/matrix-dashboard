@extends('admin.layout.app')
<link rel="stylesheet" href="{{ asset('css/settingsStyle.css') }}">

@section('content')
    <section class="main_content dashboard_part large_header_bg" style="background-color: #031723;">
        @include('admin.partials._header')


        <div class="content_section">
            <div class="image_section">
                <a href="{{ asset($data->first_photo_in_title) }}" target="_blank">
                    <img src="{{ asset($data->first_photo_in_title) }}" alt="first_photo_in_title" style="width: 400px; height: 300px; box-shadow: 0px 0px 10px #888888;">
                </a>
                <div style="width: 20px;"></div> <!-- This adds a space between the images -->
                <a href="{{ asset($data->second_photo_in_title) }}" target="_blank">
                    <img src="{{ asset($data->second_photo_in_title) }}" alt="second_photo_in_title" style="width: 250px; height:200px; box-shadow: 0px 0px 10px #888888;">
                </a>
            </div>
            <div class="brief_section" style="width: 50%; margin-left: 50px; text-align: right">
                <h3>نبذة عن شركاء الأعمال</h3>
                <h5>نظام شركاء الأعمال</h5>
                <p>{{$data['brief']}}</p>
            </div>
        </div>

        <div class="álignThat">
            <h3 class="title" style="margin-top: 20px;color: white">ميزات شركاء الأعمال</h3>
            <div class="card_container" style="display: flex; flex-direction: row; justify-content: space-between; margin-top: 20px">
                <div style="border: 1px solid white ; border-radius: 14px;width: 200px; height: 200px; display: flex; flex-direction: column; align-items: center; justify-content: center;">
                    <img src="{{ asset($data->fourth_icon_features) }}" alt="fourth_icon_features" style="width: 120px; height: 120px;">
                    <h4 style="color: white">{{ $data->fourth_title_features}}</h4>
                </div>
                <div style="border: 1px solid white ; border-radius: 14px;width: 200px; height: 200px; display: flex; flex-direction: column; align-items: center; justify-content: center;">
                    <img src="{{ asset($data->third_icon_features) }}" alt="fourth_icon_features" style="width: 120px; height: 120px;">
                    <h4 style="color: white">{{ $data->third_title_features}}</h4>
                </div>
                <div style="border: 1px solid white ; border-radius: 14px;width: 200px; height: 200px; display: flex; flex-direction: column; align-items: center; justify-content: center;">
                    <img src="{{ asset($data->second_icon_features) }}" alt="fourth_icon_features" style="width: 120px; height: 120px;">
                    <h4 style="color: white">{{ $data->second_title_features}}</h4>
                </div>
                <div style="border: 1px solid white ; border-radius: 14px;width: 200px; height: 200px; display: flex; flex-direction: column; align-items: center; justify-content: center;">
                    <img src="{{ asset($data->first_icon_features) }}" alt="fourth_icon_features" style="width: 120px; height: 120px;">
                    <h4 style="color: white">{{ $data->first_title_features}}</h4>
                </div>
            </div>
        </div>

        <div class="image_section">
            <a href="{{ asset($data->first_video) }}" target="_blank">
                <img src="{{ asset($data->first_image_video) }}" alt="first_photo_in_title" style="width: 100%; height: 500px; box-shadow: 0px 0px 10px #888888; margin: 44">
            </a>
            <div class="data_first_title_video" style="color: white">{{ $data->first_title_video }}</div>
        </div>


        <div class="data_second_title_video" style="color: black; display: inline-block; width: 100%;">
            <a href="{{ asset($data->second_video) }}" target="_blank">
                <img src="{{ asset($data->second_image_video) }}" alt="second_photo_in_title" style="width:30%; height: 250px; box-shadow: 0px 0px 10px #888888; display: inline-block;    margin-left: 100px;">
            </a>

                    <a href="{{ asset($data->third_video) }}" target="_blank">
                        <img src="{{ asset($data->third_image_video) }}" alt="third_photo_in_title" style="width: 30%; height: 250px; box-shadow: 0px 0px 10px #888888; display: inline-block;    margin-left: 333px;}">
                    </a>
            <div style="display: flex; justify-content: space-between; align-items: center;">
                <h2 style="color: white; margin-right: auto;">{{ $data->second_title_video }}</h2>
                <h2 style="color: white; margin-left: auto;">{{ $data->third_title_video }}</h2>
            </div>

                </div>



        <div class="container " style="margin: 100px">
            <div class="circle">
                <span class="number">{{$data->Paid_ratios}}</span>
                <span class="title">مجمل النسب المدفوعه</span>
            </div>

            <div class="circle" style="   ">
                <span class="number">{{$data->successful_deals}}</span>
                <span class="title">عدد الصفقات الناجحه</span>
            </div>

            <div class="circle" style=" ">
                <span class="number">{{$count_of_partner}}</span>
                <span class="title" >عدد شركاء الأعمال</span>
            </div>
        </div>

_s


        <div class="álignThat">
            <a href="{{ route('admin.business_partners_settings.edit', $data->id) }}" class="edit_button"> تعديل البيانات</a>

        </div>
        @include('admin.partials._footer')
    </section>
@endsection

