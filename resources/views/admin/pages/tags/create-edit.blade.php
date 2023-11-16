@extends('admin.layout.app')

@section('content')
    <section class="main_content dashboard_part large_header_bg">

        @include('admin.partials._header')

        <div class="main_content_iner overly_inner ">
            <div class="container-fluid p-0 ">
                @include('admin/partials/_head_pages', ['pageTitle' => 'Add Tags'])

                <div class="row">
                    <div class="col-12">
                        <div class="white_card card_height_100 mb_30">
                            <div class="white_card_header">
                                <div class="box_header m-0">
                                    <div class="main-title">
                                        @if(isset($data) && !empty($data))
                                            <h3 class="m-0">EditTag </h3>
                                        @else
                                            <h3 class="m-0">Add New Tag </h3>
                                        @endif

                                    </div>
                                </div>
                            </div>
                            <div class="white_card_body">

                                @if(isset($data) && !empty($data))
                                    <form action="{{route('admin.tags.update', $data->id)}}" method="post"
                                          enctype="multipart/form-data">
                                        @method('PUT')
                                        @csrf
                                        @else
                                            <form action="{{route('admin.tags.store')}}" method="POST"
                                                  enctype="multipart/form-data">
                                                @csrf
                                                @endif
                                                <div class="row">

                                                    <div class="col-lg-6">
                                                        <div class="common_input mb_15">
                                                            <input
                                                                @if(isset($data) && !empty($data))value="{{$data->tag_name}}"
                                                                @endif type="text" placeholder="Enter Tag"
                                                                name="tag_name">
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="create_report_btn mt_30">
                                                            <button type="submit"
                                                                    class="btn_1 radius_btn d-block text-center">
                                                                @if(isset($data) && !empty($data))
                                                                    Edit Tag
                                                                @else
                                                                    Add Tag
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
            </div>
        </div>

        @include('admin.partials._footer')
    </section>
@endsection
