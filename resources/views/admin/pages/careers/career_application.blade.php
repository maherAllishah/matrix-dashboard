@extends('admin.layout.app')

@section('content')

    <section class="main_content dashboard_part large_header_bg">

        @include('admin.partials._header')

        @include('admin/partials/_head_pages', ['pageTitle' => 'Career Application'])

        <div class="row gap-md-5 justify-content-center">
            <div class="col-md-12 bg-white">
                <table style="width: 100%;text-align: center;" class="line-height-4 he-table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Phone Number</th>
                        <th>HR Validate</th>
                        <th>Manager Validate</th>
                        <th>Condition</th>
                        <th>show</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($employees as $employee)
                        <tr>
                            <td>{{$employee->id}}</td>
                            <td>{{$employee->first_name}}</td>
                            <td>{{$employee->last_name}}</td>
                            <td>{{$employee->phone}}</td>
                            <td>{{$employee->hr_evaluate ?? '---'}}</td>
                            <td>{{$employee->manager_evaluate ?? '---'}}</td>
                            <td>

                                <form method="post"
                                      action="{{ route('admin.approve' , ['employee'=>$employee->id]) }}">
                                    @csrf
                                    <input value="{{$employee->id}}" type="hidden" name="application_id">
                                    <select name="status" onchange="this.form.submit()" id="">
                                        <option value="received">Received</option>
                                        @if(((Auth::guard('web')->user()->id==1)||checkPermission('hr permission'))&&($employee->hr_evaluate)&&($employee->manager_evaluate))
                                            <option value="approved">Approved</option>
                                            <option value="rejected">Rejected</option>
                                        @endif
                                    </select>
                                </form>

                            </td>
                            <td>
                                @if((checkPermission('hr permission')||checkPermission('manager permission'))||(Auth::guard('web')->user()->id)==1)
                                    <a href="{{ route('admin.showApplicationDetails',['dep_id'=>$dep_id,'career_id'=>$employee->career_id,'employee_id'=>$employee->id ] ) }}"
                                       class="show">Show More</a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        </div>
        </div>

    </section>
    @include('admin.partials._footer')
@endsection
