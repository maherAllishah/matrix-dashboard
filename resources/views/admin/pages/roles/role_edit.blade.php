@extends('admin.layout.app')

@section('content')
    <section class="main_content dashboard_part large_header_bg">
        @include('admin.partials._header')
        @include('admin/partials/_head_pages', ['pageTitle' => 'Edit Role'])
        <div class="row">
            <div class="col-12">
                <div class="white_card card_height_100 mb_30">
                    <div class="white_card_header">
                        <div class="box_header m-0">
                            <div class="main-title">
                                <h3 class="m-0">Edit Role</h3>
                            </div>
                        </div>
                    </div>
                    <div class="white_card_body">

                        <form action="{{ route('admin.roles.update', ['role' => $role]) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row">

                                <div class="col-lg-12">
                                    <div class="common_input mb_15">
                                        <input type="text" placeholder="Role Name" name="name"
                                               value="{{ old('name', $role->name) }}">
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
                                        @foreach ($groups as $permission)
                                            <div class="item">
                                                <input type="checkbox" name="permissionArray[]"
                                                       value="{{ $permission->id }}"
                                                    {{ in_array($permission->id, $rolePermissions) ? 'checked' : '' }}>
                                                <label>{{ $permission->name }}</label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                                <div class="col-12 he-col-style">
                                    <button type="submit" class="btn_1 radius_btn d-block text-center">Update
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
