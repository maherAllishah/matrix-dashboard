@extends('admin.layout.app')
@section('content')
    <section class="main_content dashboard_part large_header_bg">
        @include('admin.partials._header')

        <div class="main_content_iner overly_inner">
            <div class="container-fluid p-0">
                <div class="row">
                    <div class="col-12">
                        <div class="page_title_box d-flex flex-wrap align-items-center justify-content-between">
                            <div class="page_title_left d-flex align-items-center">
                                <h3 class="f_s_25 f_w_700 dark_text mr_30">Careers Table</h3>
                                <ol class="breadcrumb page_bradcam mb-0">
                                    <li class="breadcrumb-item">
                                        <a href="javascript:void(0);">Home</a>
                                    </li>
                                    @if(checkPermission('hr permission'))
                                        <li class="breadcrumb-item">
                                            <a href="{{route('admin.careers.create')}}">Add Career</a>
                                        </li>
                                    @endif
                                </ol>
                            </div>
                            <div class="page_title_right">
                                <div class="page_date_button d-flex align-items-center">
                                    {{ date('Y-m-d H:i:s') }}
                                </div>
                            </div>
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
                                <th>Related Department</th>
                                <th>Related Admin</th>
                                <th>Situation</th>
                                <th>Actions</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $career)
                                @if($career->department->admin->id ==(Auth::guard('web')->user()->id)||checkPermission('hr permission'))
                                    <tr>
                                        <td>{{ $career->id }}</td>
                                        <td>{{ $career->name }}</td>
                                        <td>{{ $career->department->name }}</td>
                                        <td>{{ $career->department->admin->name }}</td>

                                        <td>

                                            @if($career->situation == 0)
                                                <option value="">Hidden</option>
                                            @elseif($career->situation == 1)
                                                <option value="">Visible</option>
                                            @endif

                                        </td>
                                        <td>
                                            <form method="post"
                                                  action="{{ route('admin.careers.destroy' ,$career->id ) }}">
                                                @csrf
                                                @method('DELETE')
                                                @if(checkPermission('hr permission'))
                                                    <a href="{{route('admin.careers.edit',$career->id)}}"
                                                       class="edit">Edit</a>
                                                @endif
                                                @if(checkPermission('hr permission'))
                                                    <a class="show"
                                                       href="{{route('admin.careers.show',$career->id)}}">Show</a>
                                                @endif
                                                @if($career->department->admin->id ==(Auth::guard('web')->user()->id)||(Auth::guard('web')->user()->id)==1||checkPermission('hr permission'))
                                                    <a class="show"
                                                       href="{{route('admin.showApplication',['dep_id'=>$career->department->id,'career_id'=>$career->id])}}">Applications</a>
                                                @endif
                                                @if(checkPermission('hr permission'))
                                                    <span class="only-this">
                                        <button type="submit" class="btn btn-danger"> Delete</button>
                                   </span>
                                                @endif
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

        @include('admin.partials._footer')
    </section>
@endsection
