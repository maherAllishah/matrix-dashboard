@extends('admin.layout.app')
@section('content')
    <section class="main_content dashboard_part large_header_bg">
        @include('admin.partials._header')

        @include('admin/partials/_head_pages', ['pageTitle' => 'direct Employee'])
        <div class="row gap-md-5 justify-content-center">
            <div class="col-md-12 bg-white">
                <table style="width: 100%;text-align: center;" class="line-height-4 he-table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>File</th>
                        <th>Other</th>
                        <th>Actions</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $directEmploye)
                        <tr>
                            <td>{{ $directEmploye->id }}</td>
                            <td>{{ $directEmploye->first_name }} {{ $directEmploye->last_name }}</td>
                            <td>{{ $directEmploye->email }}</td>
                            <td>{{ $directEmploye->phone }}</td>
                            <td>
                                <h5>first file</h5>
                                <a class="pdf"
                                   href="{{ asset($directEmploye->file_one_path) }}">{{ substr(basename($directEmploye->file_one_path), -10) }}</a>
                            </td>
                            <td>
                                <h5>second file</h5>
                                <a class="pdf"
                                   href="{{ asset( $directEmploye->file_two_path) }}">{{ substr(basename($directEmploye->file_two_path), -10) }}</a>
                                <p class="h-pdf">
                            </td>
                            <td>
                                <form method="post"
                                      action="{{ route('admin.direct_employee.destroy' ,$directEmploye->id ) }}">
                                    @csrf
                                    @method('DELETE')
                                    <span class="only-this">
                                        <button type="submit" class="btn btn-danger"> Delete</button>
                                   </span>
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

        @include('admin.partials._footer')
    </section>
@endsection
