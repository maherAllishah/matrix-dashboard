@extends('admin.layout.app')
@section('content')
    <section class="main_content dashboard_part large_header_bg">
        @include('admin.partials._header')

        @include('admin/partials/_head_pages', ['pageTitle' => 'Business Partner Request'])
        <div class="row gap-md-5 justify-content-center">
            <div class="col-md-12 bg-white">

                <form method="get" action="{{ route('admin.business_requests.filter') }}">
                    <div class="form-group">
                        <label for="status">Status:</label>
                        <select id="status" name="status" class="form-control">
                            <option value="">All</option>
                            <option value="pending"{{ request('status') == 'pending' ? ' selected' : '' }}>Pending
                            </option>
                            <option value="accepted"{{ request('status') == 'accepted' ? ' selected' : '' }}>Accepted
                            </option>
                            <option value="rejected"{{ request('status') == 'rejected' ? ' selected' : '' }}>Rejected
                            </option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary" style="background-color: #007bff">Filter</button>
                </form>

                <table style="width: 100%;text-align: center;" class="line-height-4 he-table">
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
                        <th>Action 1</th>
                        <th>Action 2</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($businessPartners as $businessPartner)
                        @if ($businessPartner->status == 'accepted' || $businessPartner->status == 'pending' || $businessPartner->status == 'rejected' )
                            <tr>
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
                                @if ($businessPartner->status == 'pending')
                                    <td class="accept">
                                        <form method="post"
                                              action="{{ route('admin.business_requests.accept', $businessPartner->id) }}">
                                            @method('PATCH')
                                            @csrf
                                            <button type="submit" class="btn btn-success acceptBtn"
                                                    style="background-color: #218838">Accept
                                            </button>
                                        </form>
                                    </td>
                                    <td class="reject">
                                        <form method="post"
                                              action="{{ route('admin.business_requests.reject', $businessPartner->id) }}">
                                            @method('PATCH')
                                            @csrf
                                            <button type="submit" class="btn btn-danger rejectBtn"
                                                    style="background-color: #c82333">Reject
                                            </button>
                                        </form>
                                    </td>
                                @elseif ($businessPartner->status == 'rejected')
                                    <td>
                                        <form method="post"
                                              action="{{ route('admin.business_requests.reject', $businessPartner->id) }}">
                                            @method('PATCH')
                                            @csrf
                                            <button type="submit" class="btn btn-danger rejectBtn"
                                                    style="background-color: #c82333" disabled>Rejected
                                            </button>
                                        </form>
                                    </td>
                                    <td></td>
                                @elseif ($businessPartner->status == 'accepted')
                                    <td>
                                        <form method="post"
                                              action="{{ route('admin.business_requests.approved', $businessPartner->id) }}">
                                            @method('PATCH')
                                            @csrf
                                            <button type="submit" class="btn btn-success addListBtn"
                                                    style="background-color: gold">Add To List
                                            </button>
                                        </form>
                                    </td>
                                    <td></td>
                                @endif
                            </tr>
                            <tr>
                                <td colspan="10">
                                    <hr style="border-style: solid;margin: 10px 0;">
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
