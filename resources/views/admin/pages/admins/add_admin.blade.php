@extends('admin.layout.app')

@section('content')
<section class="main_content dashboard_part large_header_bg">

    @include('admin.partials._header')

    <div class="main_content_iner overly_inner ">
        <div class="container-fluid p-0 ">

            @include('admin/partials/_head_pages', ['pageTitle' => 'Add New Admin'])

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

                          <form action="{{route('admin.admins.store')}}" method="POST" enctype="multipart/form-data">
                              @csrf
                              <div class="row">

                                  <div class="col-lg-6">
                                      <div class="common_input mb_15">
                                          <input type="text" placeholder="Full Name" name="name">
                                          @error('name')
                                          <div class="text-danger">{{ $message }}</div>
                                          @enderror                                      </div>
                                  </div>
                                  <div class="col-lg-6">
                                      <div class="common_input mb_15">
                                          <input type="text" placeholder="position" name="position">
                                          @error('position')
                                          <div class="text-danger">{{$message}}</div>
                                          @enderror
                                      </div>
                                  </div>
                                  <div class="col-lg-6">
                                      <div class="common_input mb_15">
                                          <input type="email" placeholder="Email" name="email">
                                          @error('email')
                                          <div class="text-danger">{{$message}}</div>
                                          @enderror
                                      </div>
                                  </div>
                                  <div class="col-lg-6">
                                      <div class="common_input mb_15">
                                          <input type="password" placeholder="Enter Password" name="password">
                                          @error('password')
                                          <div class="text-danger">{{$message}}</div>
                                          @enderror
                                      </div>
                                  </div>

                                  <div class="col-lg-6">
                                      <select class="nice_Select2 nice_Select_line wide" style="display: none;" name="role">
                                          <option value="1">Select Role</option>
                                          @foreach ($roles as $role )
                                              @if($role->id !=1)
                                              <option value="{{ $role->name }}">{{ $role->name }}</option>
                                              @endif
                                          @endforeach
                                      </select>
                                      @error('role')
                                      <div class="text-danger">{{ $message }}</div>
                                      @enderror
                                  </div>
                                  <div class="col-12 he-col-style">

                                      <button type="submit" class="btn_1 radius_btn d-block text-center">Add Admin</button>

                                  </div>

                              </div>
                          </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>

@include('admin.partials._footer')
@endsection
