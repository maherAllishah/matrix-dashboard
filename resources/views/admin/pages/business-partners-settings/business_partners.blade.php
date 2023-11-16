@extends('admin.layout.app')
@section('content')
    <section class="main_content dashboard_part large_header_bg">
        @include('admin.partials._header')

        @include('admin/partials/_head_pages', ['pageTitle' => 'Business Partner List'])
        <div class="row gap-md-5 justify-content-center">
            <div class="col-md-12 bg-white">
                <table style="width: 100%; text-align: center;" class="line-height-4 he-table tbone">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>City</th>
                        <th>Photo</th>
                        <th>File</th>
                        <th>Approved Date</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php $count = 0 @endphp
                    @foreach($businessPartners as $businessPartner)
                        @if ($businessPartner->status == 'approved' )
                            <tr @if (++$count > 2) style="display: none" @endif>
                                <td>{{ $businessPartner->id }}</td>
                                <td>{{ $businessPartner->full_name }}</td>
                                <td>{{ $businessPartner->email }}</td>
                                <td>{{ $businessPartner->phone }}</td>
                                <td>{{ $businessPartner->full_address }}</td>
                                <td>{{ $businessPartner->province->name}}</td>
                                <td style="width: 80px; height: 80px;">
                                    @if ($businessPartner->photo)
                                        <a href="{{ asset($businessPartner->photo) }}" target="_blank">
                                            <img src="{{ asset($businessPartner->photo) }}"
                                                 alt="Business Partner Photo">
                                        </a>
                                    @else
                                        No photo
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ asset($businessPartner->file_cv) }}" target="_blank">Show CV</a>
                                </td>
                                <td>
                                    {{ $businessPartner->approved }}
                                </td>
                                <td>
                                    <form method="post"
                                          action="{{ route('admin.business_requests.former', $businessPartner->id) }}">
                                        @method('PATCH')
                                        @csrf
                                        <button type="submit" class="btn btn-danger rejectBtn"
                                                style="background-color: #c82333">End Partnership
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            <tr @if ($count > 2) style="display: none" @endif>
                                <td colspan="10">
                                    <hr style="border-style: solid;margin: 10px 0;">
                                </td>
                            </tr>
                        @endif
                    @endforeach
                    </tbody>
                </table>

                @if ($count > 2)
                    <div class="d-flex justify-content-center mt-3">
                        <button type="button" class="btn btn-primary" id="showMoreBtn">Show More</button>
                    </div>
                @endif
            </div>
        </div>
        </div>
        </div>
        <div class="main_content_iner overly_inner">
            <div class="container-fluid p-0">
                <div class="row">
                    <div class="col-12">
                        <div class="page_title_box d-flex flex-wrap align-items-center justify-content-between">
                            <div class="page_title_left d-flex align-items-center">
                                <h3 class="f_s_25 f_w_700 dark_text mr_30">Business Partner Former</h3>
                            </div>
                            <div class="page_title_right">

                            </div>
                        </div>
                    </div>
                </div>

                <div class="row gap-md-5 justify-content-center">
                    <div class="col-md-12 bg-white">
                        <table style="width: 100%; text-align: center;" class="line-height-4 he-table tbtwo">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>City</th>
                                <th>Photo</th>
                                <th>File</th>
                                <th>Approved Date</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php $count = 0 @endphp
                            @foreach($businessPartners as $businessPartner)
                                @if ($businessPartner->status == 'former' )
                                    <tr @if (++$count > 2) style="display: none" @endif>
                                        <td>{{ $businessPartner->id }}</td>
                                        <td>{{ $businessPartner->full_name }}</td>
                                        <td>{{ $businessPartner->email }}</td>
                                        <td>{{ $businessPartner->phone }}</td>
                                        <td>{{ $businessPartner->full_address }}</td>
                                        <td>{{ $businessPartner->province->name}}</td>
                                        <td style="width: 80px; height: 80px;">
                                            @if ($businessPartner->photo)
                                                <a href="{{ asset($businessPartner->photo) }}" target="_blank">
                                                    <img src="{{ asset($businessPartner->photo) }}"
                                                         alt="Business Partner Photo">
                                                </a>
                                            @else
                                                No photo
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ asset($businessPartner->file_cv) }}" target="_blank">Show CV</a>
                                        </td>
                                        <td>
                                            {{ $businessPartner->approved }}
                                        </td>
                                        <td>
                                            <form method="post"
                                                  action="{{ route('admin.business_requests.former', $businessPartner->id) }}">
                                                @method('PATCH')
                                                @csrf
                                                <button type="submit" class="btn btn-danger rejectBtn"
                                                        style="background-color: #c82333">End Partnership
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    <tr @if ($count > 2) style="display: none" @endif>
                                        <td colspan="10">
                                            <hr style="border-style: solid;margin: 10px 0;">
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                            </tbody>
                        </table>

                        @if ($count > 2)
                            <div class="d-flex justify-content-center mt-3">
                                <button type="button" class="btn btn-primary" id="showMoreBtn2">Show More</button>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        @include('admin.partials._footer')
    </section>

    <script>
        document.getElementById('showMoreBtn').addEventListener('click', function () {
            var rows = document.querySelectorAll('.tbone tbody tr');
            for (var i = 2; i < rows.length; i++) {
                rows[i].style.display = 'table-row';
            }
            this.style.display = 'none';
        });
        document.getElementById('showMoreBtn2').addEventListener('click', function () {
            var rows = document.querySelectorAll('.tbtwo tbody tr');
            for (var i = 2; i < rows.length; i++) {
                rows[i].style.display = 'table-row';
            }
            this.style.display = 'none';
        });
    </script>
@endsection
