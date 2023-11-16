@extends('admin.layout.app')

@section('content')
    <section class="main_content dashboard_part large_header_bg">

        @include('admin.partials._header')


        @include('admin/partials/_head_pages', ['pageTitle' => 'Admin List'])

        <div class="row">
            <div class="col-lg-12">
                <div class="white_card card_height_100 mb_30 pt-4">
                    <div class="white_card_body">
                        <div class="QA_section">
                            <div class="white_box_tittle list_header">
                                @if(Auth()->guard('web')->user()->id==1)
                                    <a href="{{route('admin.admins.create')}}" class="btn_1">Add admin</a>
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
                                        <th scope="col">Full Name</th>
                                        <th scope="col">Email Address</th>
                                        <th scope="col">Password</th>
                                        <th scope="col">Role</th>
                                        {{--                                            <th scope="col">Status</th>--}}
                                        <th scope="col">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($admins as $admin)
                                        @if($admin->id !=1)
                                            <tr>
                                                <th scope="row"><a href="#"
                                                                   class="question_content"> {{$admin->id}} </a></th>
                                                <td>{{$admin->name}}</td>
                                                <td>{{$admin->email}}</td>
                                                <td>{{$admin->password}}</td>
                                                <td>
                                                    @if (count($admin->getRoleNames()) > 0)
                                                        <span class="badge bg-warning text-white p-2">
                                                {{ $admin->getRoleNames()[0] ?? '' }}
                                            </span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <form method="post"
                                                          action="{{route('admin.admins.destroy',$admin->id)}}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <div class="action_btns d-flex">
                                                            @if(Auth()->guard('web')->user()->id==1)
                                                                <a href="{{route('admin.admins.edit', $admin->id)}}"
                                                                   class="action_btn mr_10"> <i class="far fa-edit"></i>
                                                                </a>
                                                            @endif
                                                            @if(Auth()->guard('web')->user()->id==1)
                                                                <button type="submit" class="action_btn"><i
                                                                        class="fas fa-trash"></i></button>
                                                            @endif
                                                        </div>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('admin.partials._footer')
    </section>
@endsection
