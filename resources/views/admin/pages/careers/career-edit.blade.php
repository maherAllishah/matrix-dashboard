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
                                <h3 class="f_s_25 f_w_700 dark_text mr_30">Career</h3>
                                <ol class="breadcrumb page_bradcam mb-0">
                                    <li class="breadcrumb-item">
                                        <a href="javascript:void(0);">Home</a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        <a href="{{route('admin.careers.index')}}">Career Table</a>
                                    </li>
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
                    <div class=" last white_card">
                        <form action="{{route('admin.careers.update' , $data->id)}}" method="post"
                              class="p-2 pt-4 pb-4 h-form" accept-charset="UTF-8" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="h-styling">
                                <div class="h-one">

                                    <label for="career-name">Career Name</label>
                                    <input value="{{$data->name}}" type="text" name="name" id="career-name"
                                           placeholder="Career Name"/>
                                    @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <label for="">Department</label>
                                    <select name="department_id" id="">
                                        <option value="{{$data->department->id}}">{{$data->department->name}}</option>
                                        @foreach($departments as $department)
                                            <option value="{{$department->id}}">{{$department->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('department_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <label for="salary">Salary</label>
                                    <input value="{{$data->salary}}" type="text" name="salary" id="salary"
                                           placeholder="Salary"/>
                                    @error('salary')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <label for="experince">Experience</label>
                                    <input value="{{$data->experience}}" type="text" name="experience" id="experince"
                                           placeholder="Experience"/>
                                    @error('experience')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <label for="details">Work Type</label>
                                    <input value="{{$data->work_type}}" type="text" name="work_type" id="details"
                                           placeholder="Work Type"/>
                                    @error('work_type')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <div class="content content2">
                                        <P class="skills"
                                           style="color: black;font-size:16px;margin-bottom: 10px;font-weight: 600;">
                                            Skills</P>

                                        <select name="skills[]" class="selectpicker" multiple data-live-search="true">
                                            @foreach($tags as $tag)
                                                <option
                                                    value="{{ $tag->tag_name }}" {{ in_array($tag->tag_name, $data->skills) ? 'selected' : '' }}>
                                                    {{ $tag->tag_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('skills')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        <script>
                                            $('select').selectpicker();
                                        </script>

                                    </div>

                                </div>
                                <div class="h-two">
                                    <div class="white_box">
                                        <div class="box_header">
                                            <div class="main-title">
                                                <h3 class="mb-0 f_16">Description</h3>
                                            </div>
                                        </div>
                                        <textarea name="description" id="editor"> {!! $data->description !!} </textarea>
                                        @error('description')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        <div class="box_header">
                                            <div class="main-title">
                                                <h3 class="mb-0 f_16" style="margin-top: 20px;">What is your tasks</h3>
                                            </div>
                                        </div>

                                        <textarea name="your_tasks"
                                                  id="editor">    {!! $data->your_tasks !!} </textarea>
                                        @error('your_tasks')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        <div class="box_header">
                                            <div class="main-title">
                                                <h3 class="mb-0 f_16" style="margin-top: 20px;">What is the Work
                                                    requirements</h3>
                                            </div>
                                        </div>


                                        <textarea name="Work_requirements"
                                                  id="editor">  {!! $data->Work_requirements !!} </textarea>
                                        @error('Work_requirements')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        <div class="box_header">
                                            <div class="main-title">
                                                <h3 class="mb-0 f_16" style="margin-top: 20px;">What we offer</h3>
                                            </div>
                                        </div>
                                        <textarea name="we_offer" id="editor">  {!! $data->we_offer !!} </textarea>
                                        @error('we_offer')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror

                                        <select name="situation" id="">
                                            @foreach(getCareerStatusVariables() as $key => $values)
                                                <option value="{{ $values->value }}">{{ $values->name }}</option>
                                            @endforeach

                                        </select>
                                        @error('situation')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>


                                </div>
                            </div>
                            <button type="submit" class="h-input" tabindex="-1">Update Career</button>
                        </form>
                    </div>

                </div>
            </div>

        @include('admin.partials._footer')
    </section>
@endsection



