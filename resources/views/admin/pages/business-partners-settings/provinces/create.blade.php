@extends('admin.layout.app')
@section('content')

    <section class="main_content dashboard_part large_header_bg">
        @include('admin.partials._header')

        <div class="main_content_iner overly_inner">
            <div class="container-fluid p-0">
                <div class="row">
                    <div class="col-12">
                        <div class="page_title_box d-flex flex-wrap align-items-center justify-content-between">


                        </div>
                    </div>
                </div>

                <div class="row gap-md-5 justify-content-center">
                    <div class=" last white_card">
                        <form action="{{route('admin.provinces.store')}}" method="post" class="p-2 pt-4 pb-4 h-form" accept-charset="UTF-8" enctype="multipart/form-data">
                            @csrf
                            <div class="h-styling">
                                <div class="h-one">

                                    <label for="name">provinces Name</label>
                                    <input type="text" name="name" id="provinces-name" placeholder="provinces Name"/>


                                    <label for="status">Status</label>
                                    <select name="status" id="provinces_status" required>
                                        <option value="">Select status</option>
                                        <option value="0">0</option>
                                        <option value="1">1</option>
                                    </select>

                                    </div>

                                </div>
                            <button type="submit"  class="h-input" tabindex="-1">Save</button>
                        </form>
                    </div>

                </div>
            </div>

        @include('admin.partials._footer')
    </section>
@endsection



