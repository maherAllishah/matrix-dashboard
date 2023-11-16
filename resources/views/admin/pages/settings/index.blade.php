@extends('admin.layout.app')

@section('content')
    <section class="main_content dashboard_part large_header_bg">

        @include('admin.partials._header')

        @include('admin/partials/_head_pages', ['pageTitle' => 'Setting Table'])
        <div class="row">
            <div class="col-lg-12">
                <div class="white_card card_height_100 mb_30 pt-4">
                    <div class="white_card_body">
                        <div class="QA_section">
                            <div class="white_box_tittle list_header">
                                <div class="box_right d-flex lms_block">
                                    <div class="serach_field_2">
                                        <div class="search_inner">

                                            <div class="search_field">
                                            </div>

                                        </div>
                                    </div>
                                    <div class="add_button ms-2">
                                    </div>
                                </div>
                            </div>
                            <div class="QA_table mb_30">

                                <table class="table lms_table_active ">
                                    <thead>
                                    <tr>
                                        <th scope="col">id</th>
                                        <th scope="col">Country</th>
                                        <th scope="col">City</th>
                                        <th scope="col">Phone</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Hours</th>
                                        <th scope="col">FaceBook</th>
                                        <th scope="col">WhatsApp</th>
                                        <th scope="col">Instagram</th>
                                        <th scope="col">LinkedIn</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($data as $setting)
                                        <tr>
                                            <th scope="row"><a href="#" class="question_content"> {{$setting->id}} </a>
                                            </th>
                                            <td><a href="">{{$setting->country}}</a></td>
                                            <td><a href="">{{$setting->city}}</a></td>
                                            <td><a href="">{{$setting->phone}}</a></td>
                                            <td><a href="">{{$setting->email}}</a></td>
                                            <td><a href="">{{$setting->hours}}</a></td>
                                            <td><a href="">{{$setting->facebook}}</a></td>
                                            <td><a href="">{{$setting->whatsapp}}</a></td>
                                            <td><a href="">{{$setting->instagram}}</a></td>
                                            <td><a href="">{{$setting->linkedin}}</a></td>
                                            <td>

                                                <div class="action_btns d-flex">
                                                    <a href="{{ route('admin.settings.edit', $setting->id) }}"
                                                       class="action_btn mr_10"> <i class="far fa-edit"></i> </a>
                                                </div>

                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </section>
    @include('admin.partials._footer')
@endsection
