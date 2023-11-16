
<div class="main_content_iner overly_inner ">
    <div class="container-fluid p-0 ">

<div class="row">
    <div class="col-12">
        <div class="page_title_box d-flex flex-wrap align-items-center justify-content-between">
            <div class="page_title_left d-flex align-items-center">
                <h3 class="f_s_25 f_w_700 dark_text mr_30">{{ $pageTitle }}</h3></h3>
                <ol class="breadcrumb page_bradcam mb-0">
                </ol>
            </div>
            <div class="page_title_right">
                <div class="page_date_button d-flex align-items-center">
                    <img src="{{asset('img/icon/calender_icon.svg')}}" alt="">
                    {{ date('Y-m-d H:i:s') }}
                </div>
            </div>
        </div>
    </div>
    @if(session()->has('success'))
        <dev class="alert alert-success">
            {{session('success')}}
        </dev>
    @endif
    @if(session()->has('edit'))
        <dev class="alert alert-success">
            {{session('edit')}}
        </dev>
    @endif
    @if(session()->has('delete'))
        <dev class="alert alert-dark">
            {{session('delete')}}
        </dev>
    @endif
</div>

