@extends('admin.layout.app')
@section('content')
    <section class="main_content dashboard_part large_header_bg">
        @include('admin.partials._header')
        @include('admin/partials/_head_pages', ['pageTitle' => 'Province Details'])
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
                                <th> Count Of Partners approved</th>
                                <th>Count Of Partners former</th>
                            </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $provinces->id }}</td>
                                    <td>{{ $provinces->name }}</td>
                                    <td>{{ $provinces->status }}</td>
                                    <td>{{ $count_of_partners->where('status', 'approved')->count()}}</td>
                                    <td>{{ $count_of_partners->where('status', 'former')->count()}}</td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>


    </section>
    @include('admin.partials._footer')
@endsection
