@extends('admin.layout.app')
@section('content')

    <section class="main_content dashboard_part large_header_bg">
        @include('admin.partials._header')

        @include('admin/partials/_head_pages', ['pageTitle' => 'Create Career'])
        <div class="row gap-md-5 justify-content-center">
            <div class=" last white_card">
                <form action="{{route('admin.careers.store')}}" method="post" class="p-2 pt-4 pb-4 h-form"
                      accept-charset="UTF-8" enctype="multipart/form-data">
                    @csrf
                    <div class="h-styling">
                        <div class="h-one">

                            <label for="career-name">Career Name</label>
                            <input type="text" name="name" id="career-name" value="{{ old('name') }}"
                                   placeholder="Career Name"/>
                            @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                            <label for="">Related Department</label>
                            <select name="department_id" id="">
                                @foreach($departments as $department)
                                    <option value="{{$department->id}}">{{$department->name}}</option>
                                @endforeach
                            </select>
                            @error('department_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                            <label for="salary">Salary</label>
                            <input type="text" name="salary" id="salary" value="{{ old('salary')}}"
                                   placeholder="Salary"/>
                            @error('salary')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                            <label for="experience">Experience</label>
                            <input type="text" name="experience" value="{{ old('experience') }}" id="experience"
                                   placeholder="Experience"/>
                            @error('experience')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                            <label for="details">Work Type</label>
                            <input type="text" name="work_type" id="details" value="{{ old('work_type') }}"
                                   placeholder="Work Type"/>
                            @error('work_type')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                            <div class="content content2">
                                <P class="skills"
                                   style="color: black;font-size:16px;margin-bottom: 10px;font-weight: 600;">Skills</P>
                                <select name="skills[]" class="selectpicker" multiple data-live-search="true">
                                    @foreach($tags as  $tag)
                                        <option value="{{$tag->tag_name}}">{{$tag->tag_name}}</option>
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

                                        <h3 class="mb-0 f_16" style="margin-top: 20px;">Description</h3>
                                    </div>
                                </div>
                                <textarea name="description" id="editor"> {{ old('description')}}</textarea>
                                @error('description')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                                <div class="box_header">
                                    <div class="main-title">
                                        <h3 class="mb-0 f_16" style="margin-top: 20px;">your tasks</h3>
                                    </div>
                                </div>
                                <textarea name="your_tasks" id="editor"
                                          style="margin-top: 20px;">{{ old('your_tasks')}}</textarea>
                                @error('your_tasks')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                                <div class="box_header">
                                    <div class="main-title">
                                        <h3 class="mb-0 f_16" style="margin-top: 20px;">Work requirements</h3>
                                    </div>
                                </div>
                                <textarea name="Work_requirements" id="editor">{{ old('Work_requirements')}}</textarea>
                                @error('Work_requirements')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                                <div class="box_header">
                                    <div class="main-title">
                                        <h3 class="mb-0 f_16" style="margin-top: 20px;">we offer</h3>
                                    </div>
                                </div>
                                <textarea name="we_offer" id="editor">{{ old('we_offer')}}</textarea>
                                @error('we_offer')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                                <select name="situation" id="">
                                    @foreach(getCareerStatusVariables() as $key => $values)
                                        <option value="{{ $values->value }}">{{ $values->name }}</option>
                                    @endforeach
                                </select>
                            </div>


                        </div>
                    </div>
                    <button type="submit" class="h-input" tabindex="-1">Save</button>
                </form>
            </div>

        </div>
        </div>

        @include('admin.partials._footer')
    </section>
@endsection



