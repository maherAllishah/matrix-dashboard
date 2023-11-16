@extends('admin.layout.app')

@section('content')

    <section class="main_content dashboard_part large_header_bg">

        @include('admin.partials._header')
        @include('admin/partials/_head_pages', ['pageTitle' => 'Application Details'])

        <div class="row gap-md-5 justify-content-center">
            <div class="row gap-md-2 justify-content-center  bg-white">
                <div class="col-md-12 h-frame d-flex " style="padding: 10px 50px;gap: 20px">

                    <div class="cole ">
                        <section>
                            <h5>First Name:</h5>
                            <p>{{$employee->first_name}}</p>
                        </section>
                        <section>
                            <h5>Last Name:</h5>
                            <p>{{$employee->last_name}}</p>
                        </section>
                        <section>
                            <h5>Email:</h5>
                            <p>{{$employee->email}}</p>
                        </section>
                        <section>
                            <h5>Phone Number:</h5>
                            <p>{{$employee->phone}}</p>
                        </section>
                        <section>
                            <h5>CV:</h5>
                            <p class="h-pdf">
                                <img src="./img/pdf.png" alt="">
                                <a class="pdf"
                                   href="{{ asset($employee->file_one_path) }}">{{ basename($employee->file_one_path) }}</a>

                            </p>
                        </section>
                        <section class="others">
                            <h5>Others:</h5>
                            <p class="h-pdf">

                                <a class="pdf"
                                   href="{{ asset( $employee->file_two_path) }}">{{ asset( $employee->file_two_path) }}</a>
                            <p class="h-pdf">
                            </p>
                            </p>
                        </section>

                    </div>

                    <div class="cole">
                        <form method="post"
                              action="{{route('admin.updateApp',['dep_id'=>$dep_id,'employee'=>$employee->id , 'career_id'=>$career_id]) }}"
                              enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <section>
                                <h5>HR Validate:</h5>
                                <input name="hr_evaluate" value="{{ old('hr_evaluate', $employee->hr_evaluate) }}"
                                       type="number"
                                       @if(!checkPermission('hr permission') && Auth::guard('web')->user()->id != 1) readonly
                                       @endif placeholder="Validate">
                            </section>
                            <section>
                                <h5>HR Comment:</h5>
                                <textarea name="hr_comment" rows="5"
                                          @if(!checkPermission('hr permission') && Auth::guard('web')->user()->id != 1) disabled
                                          @endif placeholder="Comment">{{ old('hr_comment', $employee->hr_comment) }}</textarea>
                            </section>
                            <section>
                                <h5>Manager Validate:</h5>
                                <input name="manager_evaluate"
                                       value="{{ old('manager_evaluate', $employee->manager_evaluate) }}" type="number"
                                       @if(!checkPermission('manager permission') && Auth::user()->id != 1) readonly
                                       @endif placeholder="Validate">
                            </section>
                            <section>
                                <h5>Manager Comment:</h5>
                                <textarea name="manager_comment" rows="5"
                                          @if(!checkPermission('manager permission') && Auth::user()->id != 1)isabled
                                          @endif placeholder="Comment">{{ old('manager_comment', $employee->manager_comment) }}</textarea>
                            </section>
                            <section>
                                <button class="go-back" type="submit">Go Back</button>
                            </section>
                        </form>

                    </div>


                </div>
            </div>
        </div>

    </section>
    @include('admin.partials._footer')
@endsection




