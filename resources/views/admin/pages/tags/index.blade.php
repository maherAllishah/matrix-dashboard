@extends('admin.layout.app')

@section('content')
    <section class="main_content dashboard_part large_header_bg">

        @include('admin.partials._header')

        @include('admin/partials/_head_pages', ['pageTitle' => 'Tags list'])
        <div class="row">
            <div class="col-lg-12">
                <div class="white_card card_height_100 mb_30 pt-4">
                    <div class="white_card_body">
                        <div class="QA_section">
                            <div class="white_box_tittle list_header">
                                <a class="btn_1" href="{{route('admin.tags.create')}}">Add Tag</a>
                                <div class="box_right d-flex lms_block">
                                    <div class="serach_field_2">
                                        <div class="search_inner">


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
                                        <th scope="col">Tag Name</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($data as $tag)
                                        <tr>
                                            <th scope="row"><a href="#" class="question_content"> {{$tag->id}} </a></th>
                                            <td><a href="">{{$tag->tag_name}}</a></td>
                                            <td>
                                                <form method="post" action="{{route('admin.tags.destroy', $tag->id)}}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <div class="action_btns d-flex">
                                                        <a href="{{ route('admin.tags.edit', $tag->id) }}"
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

    </section>
    @include('admin.partials._footer')
@endsection
