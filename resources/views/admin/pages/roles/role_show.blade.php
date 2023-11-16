@extends('admin.layout.app')

@section('content')
    <section class="main_content dashboard_part large_header_bg">
        @include('admin.partials._header')
        @include('admin/partials/_head_pages', ['pageTitle' => 'Role List'])
        <div class="row">
            <div class="col-12">
                <div class="white_card card_height_100 mb_30">
                    <div class="white_card_header">
                        <div class="box_header m-0">
                            <div class="main-title">
                                <h3 class="m-0">Role Details</h3>
                            </div>
                        </div>
                    </div>
                    <div class="white_card_body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="common_input mb_15">
                                    <input type="text" placeholder="Role Name" name="name" value="{{ $role->name }}"
                                           readonly>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="he-boxes">
                                    @foreach ($groups as $permission)
                                        <div class="item">
                                            <input type="checkbox" name="permissions[]"
                                                   value="{{ $permission->id }}"
                                                   {{ in_array($permission->id, $rolePermissions) ? 'checked' : '' }} disabled>
                                            <label>{{ $permission->name }}</label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        </div>

        @include('admin.partials._footer')
    </section>
@endsection
