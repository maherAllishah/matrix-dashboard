@extends('admin.layout.app')
@section('content')
    <section class="main_content dashboard_part large_header_bg">
        @include('admin.partials._header')
        @include('admin/partials/_head_pages', ['pageTitle' => 'Provinces List'])
        <div class="main_content_iner overly_inner">
            <div class="container-fluid p-0">
                <div class="row">
                    <div class="col-12">
                        <div class="page_title_box d-flex flex-wrap align-items-center justify-content-between">

                        </div>
                    </div>
                </div>

                <div class="row gap-md-5 justify-content-center">
                    <div class="col-md-12 bg-white">
                        <table style="width: 100%;text-align: center;" class="line-height-4 he-table">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $province)
                                <tr>
                                    <td>{{ $province->id }}</td>
                                    <td>{{ $province->name }}</td>
                                    <td>{{ $province->status }}</td>
                                    <td>

                                        <a class="show"
                                           href="{{ route('admin.provinces.show', $province->id) }}">Show</a>
                                        <a class="btn btn-danger" style="background-color: crimson" ;
                                           href="{{ route('admin.provinces.edit', $province->id) }}">Change Status</a>

                                        <form method="post" class="d-inline-block"
                                              action="{{route('admin.provinces.destroy', $province->id)}}">
                                            @csrf
                                            @method('DELETE')
                                            <div class="action_btns d-flex d-inline-block">
                                                <button type="submit" class="action_btn d-inline-block"><i
                                                        class="fas fa-trash"></i></button>
                                            </div>
                                        </form>
                                    </td>


                                </tr>
                            @endforeach

                            </tbody>
                            <li class="breadcrumb-item">
                                <a class="btn_1" href="{{ route('admin.provinces.create')}}">Add</a>
                            </li>
                        </table>
                    </div>
                </div>

            </div>
        </div>

        @include('admin.partials._footer')
    </section>
@endsection
