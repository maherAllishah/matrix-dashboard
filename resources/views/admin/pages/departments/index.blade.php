@extends('admin.layout.app')

@section('content')
    <section class="main_content dashboard_part large_header_bg">

        @include('admin.partials._header')

        @include('admin/partials/_head_pages', ['pageTitle' => 'Department List'])

        <div class="row">
            <div class="col-lg-12">
                <div class="white_card card_height_100 mb_30 pt-4">
                    <div class="white_card_body">
                        <div class="QA_section">
                            <div class="white_box_tittle list_header">
                                @if(checkPermission('hr permission'))
                                    <a class="btn_1" href="{{route('admin.departments.create')}}">Add Department</a>
                                @endif
                                <div class="box_right d-flex lms_block">
                                    <div class="serach_field_2">
                                        <div class="search_inner">
                                            <div class="search_field">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="QA_table mb_30">

                                <table class="table lms_table_active ">
                                    <thead>
                                    <tr>
                                        <th scope="col">id</th>
                                        <th scope="col">Department Name</th>
                                        <th scope="col">Department Admin</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($data as $department)
                                        <tr>
                                            <th scope="row"><a href="#"
                                                               class="question_content"> {{$department->id}} </a></th>
                                            <td><a href="">{{$department->name}}</a></td>
                                            <td><a href="#">{{$department->admin->name}}</a></td>
                                            <td>
                                                <form method="post"
                                                      action="{{route('admin.departments.destroy', $department->id)}}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <div class="action_btns d-flex">
                                                        @if(checkPermission('hr permission'))
                                                            <a href="{{ route('admin.departments.edit', $department->id) }}"
                                                               class="action_btn mr_10"> <i class="far fa-edit"></i>
                                                            </a>
                                                        @endif
                                                        @if(checkPermission('hr permission'))
                                                            <button type="submit" class="action_btn"><i
                                                                    class="fas fa-trash"></i></button>
                                                        @endif
                                                    </div>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="11">
                                                            No Department Found
                                            </td>
                                        </tr>

                                    @endforelse
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
