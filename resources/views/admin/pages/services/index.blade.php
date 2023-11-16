@extends('admin.layout.app')

@section('content')
    <section class="main_content dashboard_part large_header_bg">

        @include('admin.partials._header')
        @include('admin/partials/_head_pages', ['pageTitle' => 'Service Table'])

        <div class="row">
            <div class="col-lg-12">
                <div class="white_card card_height_100 mb_30 pt-4">
                    <div class="white_card_body">
                        <div class="QA_section">
                            <div class="white_box_tittle list_header">
                                <a class="btn_1" href="{{route('admin.services.create')}}">Add Service</a>
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
                                <table class="table lms_table_active hel-table ">
                                    <thead>
                                    <tr>
                                        <th scope="col">id</th>
                                        <th scope="col">Service Title</th>
                                        <th scope="col">Service Description</th>
                                        <th scope="col">Service Image</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($data as $service)
                                        <tr>
                                            <th scope="row"><a href="#" class="question_content"> {{$service->id}} </a>
                                            </th>
                                            <td><a href="">{{$service->title}}</a></td>
                                            <td><a href="">{{$service->description}}</a></td>
                                            <td>
                                                <img src="{{asset($service->image)}}" style="width: 20%" alt="">
                                            </td>

                                            <td>
                                                <form method="post"
                                                      action="{{route('admin.services.destroy', $service->id)}}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <div class="action_btns d-flex">
                                                        <a href="{{ route('admin.services.edit', $service->id) }}"
                                                           class="action_btn mr_10"> <i class="far fa-edit"></i> </a>
                                                        <button type="submit" class="action_btn"><i
                                                                class="fas fa-trash"></i></button>
                                                    </div>
                                                </form>
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
        </div>
        </div>

        @include('admin.partials._footer')
    </section>
@endsection
