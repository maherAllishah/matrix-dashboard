@extends('admin.layout.app')

@section('content')

    <section class="main_content dashboard_part large_header_bg">

        <div class="container-fluid g-0">
            <div class="row">
                <div class="col-lg-12 p-0 ">
                    <div class="header_iner d-flex justify-content-between align-items-center">
                        <div class="sidebar_icon d-lg-none">
                            <i class="ti-menu"></i>
                        </div>
                        <div class="line_icon open_miniSide d-none d-lg-block">
                            <img src="img/line_img.png" alt>
                        </div>
                        <div class="serach_field-area d-flex align-items-center">
                            <div class="search_inner">
                                <form action="#">
                                    <div class="search_field">
                                        <input type="text" placeholder="Search">
                                    </div>
                                    <button type="submit"> <img src="img/icon/icon_search.svg" alt> </button>
                                </form>
                            </div>
                        </div>
                        <div class="header_right d-flex justify-content-between align-items-center">

                            <div class="profile_info">
                                <img src="{{asset('img/client_img.png')}}" alt="#">
                                <div class="profile_info_iner">
                                    <div class="profile_author_name">
                                        <h5> {{ Auth::user()->name }}</h5>
                                    </div>
                                    <div class="profile_info_details">
                                        <a href="{{Route('profile.edit')}}">My Profile </a>
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <a href="{{ route('logout') }}"
                                               onclick="event.preventDefault(); this.closest('form').submit();"
                                            >
                                                Logout
                                            </a>
                                        </form>
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
