@extends('admin.layout.app')

@section('content')
    <section class="main_content dashboard_part large_header_bg">
        @include('admin.partials._header')
        @include('admin/partials/_head_pages', ['pageTitle' => 'Add New Role '])
        <div class="row">
            <div class="col-12">
                <div class="white_card card_height_100 mb_30">
                    <div class="white_card_header">
                        <div class="box_header m-0">
                            <div class="main-title">
                            </div>
                        </div>
                    </div>
                    <div class="white_card_body">

                        <form action="{{route('admin.roles.store')}}" method="POST"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="row">

                                <div class="col-lg-12">
                                    <div class="common_input mb_15">
                                        <input type="text" placeholder="Role Name" name="name">
                                        @error('name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        @error('permissionArray')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>


                                <div class="col-lg-12">

                                    <div class="he-boxes">
                                        <div class="he-boxes">
                                            {{--                                            @if (count($groups) > 0)--}}
                                            {{--                                                @foreach ($groups as $permission)--}}
                                            {{--                                                    <div class="col-md-6">--}}
                                            {{--                                                        <div class="form-check form-check-primary mt-1">--}}
                                            {{--                                                            <input class="form-check-input" type="checkbox"--}}
                                            {{--                                                                   name="permissionArray[{{ $permission->name }}]"--}}
                                            {{--                                                                   id="formCheckcolor{{ $permission->id }}">--}}
                                            {{--                                                            <label class="form-check-label"--}}
                                            {{--                                                                   for="formCheckcolor{{ $permission->id }}">{{ $permission->name }}</label>--}}
                                            {{--                                                        </div>--}}
                                            {{--                                                    </div>--}}
                                            {{--                                                @endforeach--}}
                                            {{--                                            @endif--}}
                                            @if (count($groups) > 0)
                                                <div class="row">
                                                    @foreach ($groups as $permission)
                                                        <div class="col-md-6">
                                                            <div class="form-check form-check-primary mt-1">
                                                                <input class="form-check-input" type="checkbox"
                                                                       name="permissionArray[{{ $permission->name }}]"
                                                                       id="formCheckcolor{{ $permission->id }}">
                                                                <label class="form-check-label"
                                                                       for="formCheckcolor{{ $permission->id }}">{{ $permission->name }}</label>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            @endif

                                        </div>
                                    </div>

                                </div>
                                <div class="col-12 he-col-style">

                                    <button type="submit" class="btn_1 radius_btn d-block text-center">Add
                                        Role
                                    </button>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </div>
        </div>

        @include('admin.partials._footer')
    </section>
@endsection
