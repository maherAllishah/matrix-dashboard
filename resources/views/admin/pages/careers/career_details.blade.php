@extends('admin.layout.app')
@section('content')
    <section class="main_content dashboard_part large_header_bg">
        @include('admin.partials._header')

        @include('admin/partials/_head_pages', ['pageTitle' => 'Career Details'])
        <div class="row gap-md-2 justify-content-center  bg-white">
            <div class="col-md-12 h-frame d-flex " style="padding: 10px 50px;">

                <div class="cole ">
                    <section>
                        <h5>Career Name:</h5>
                        <p>{{$data->name}}</p>
                    </section>
                    <section>
                        <h5>Profession:</h5>
                        <p>{{$data->department->name}}</p>
                    </section>
                    <section>
                        <h5>Salary:</h5>
                        <p>{{$data->salary}}</p>
                    </section>
                    <section>
                        <h5>Experince:</h5>
                        <p>{{$data->experience}}</p>
                    </section>
                    <section>
                        <h5>Work Type:</h5>
                        <p>{{$data->work_type}}</p>
                    </section>
                    <section>
                        <h5>Skills:</h5>
                        <ol style="padding-left: 30px;">
                            <select name="skills[]" class="selectpicker" multiple data-live-search="true">

                                @foreach($tags as  $tag)
                                    <option
                                        {{ (in_array($tag->tag_name,$data->skills)) ? 'selected' : '' }}
                                        value="{{$tag->tag_name}}">{{$tag->tag_name}}
                                    </option>
                                @endforeach
                            </select>
                        </ol>
                    </section>
                </div>
                <div class="cole">
                    <section>
                        <h5>Description:</h5>
                        {!! $data->description !!}
                    </section>
                    <section>
                        <section>
                            <h5>Whats your tasks:</h5>
                            {!! $data->your_tasks !!}
                        </section>
                        <section>
                            <section>
                                <h5>Work requirements:</h5>
                                {!! $data->Work_requirements !!}
                            </section>
                            <section>
                                <section>
                                    <h5>what we offer:</h5>
                                    {!! $data->we_offer !!}
                                </section>
                                <section>
                                    <h5>Career Situation:</h5>
                                    <p style="font-size: 16px;">Visible</p>
                                </section>
                                <a class="go-back" href={{route('admin.careers.index')}}>Go Back</a>
                </div>
            </div>
        </div>
        </div>
        </div>

        @include('admin.partials._footer')
    </section>
@endsection
