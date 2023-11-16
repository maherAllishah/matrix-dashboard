@extends('admin.layout.app')

@section('content')
    <section class="main_content dashboard_part large_header_bg">

        @include('admin.partials._header')
        @include('admin/partials/_head_pages', ['pageTitle' => 'Add Role'])
        <div class="row">
            <div class="col-lg-12">
                <div class="white_card card_height_100 mb_30 pt-4">
                    <div class="white_card_body">
                        <div class="QA_section">
                            <div class="white_box_tittle list_header">
                                <a class="btn_1" href="{{route('admin.roles.create')}}">Add Role</a>
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
                                        <th scope="col">Role Name</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($roles as $key => $role)
                                        <tr>
                                            <th scope="row"><a href="" class="question_content"> {{$role->id}} </a></th>
                                            <td>
                                                <a href="{{ route('admin.roles.show', ['role' => $role]) }}">{{$role->name}}</a>
                                            </td>
                                            <td>
                                                <form method="post"
                                                      action="{{route('admin.roles.destroy', $role->id)}}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <div class="action_btns d-flex">
                                                        <a href="{{ route('admin.roles.edit', $role->id) }}"
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

        <div class="footer_part">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="footer_iner text-center">
                            <p>2020 © Influence - Designed by <a href="#"> <i class="ti-heart"></i> </a><a href="#">
                                    Dashboard</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
