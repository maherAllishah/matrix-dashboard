@extends('admin.layout.app')

@section('content')

    <section class="main_content dashboard_part large_header_bg">
        @include('admin.partials._header')

        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Settings of Business Partners</h3>
                        </div>
                        <div class="card-body">


                            <form action="{{ route('admin.business_partners_settings.update',$data->id) }}"
                                  method="post" accept-charset="UTF-8" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="brief">Brief</label>
                                    <textarea name="brief" id="brief" cols="30" rows="10"
                                              class="form-control">{{old('brief') }}</textarea>
                                </div>
                                @error('brief')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <div style="border-bottom: 5px solid gray;"></div>
                                <div class="form-group">
                                    <label for="first_photo_in_title">First Photo in Title</label>
                                    <input type="file" name="first_photo_in_title" id="first_photo_in_title"
                                           value="{{old('first_photo_in_title')}}" class="form-control">
                                    <br><br>
                                    <div class="common_input mb_15">
                                        <img src="{{ asset($data->first_photo_in_title) }}"

                                             style="width: 20%" alt="">
                                    </div>
                                    @error('first_photo_in_title')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="second_photo_in_title">Second Photo in Title</label>
                                    <input type="file" name="second_photo_in_title" id="second_photo_in_title"
                                           value="{{$data->second_photo_in_title}}" class="form-control">
                                    <br><br>
                                    <div class="common_input mb_15">
                                        <img src="{{ asset($data->second_photo_in_title) }}"

                                             style="width: 20%" alt="">
                                    </div>
                                    @error('second_photo_in_title')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div style="border-bottom: 5px solid gray;"></div>
                                <div class="form-group">
                                    <label for="first_icon_features">First Icon Features</label>
                                    <input type="file" name="first_icon_features" id="first_icon_features"
                                           class="form-control" value="{{ $data->first_icon_features }}">
                                    <br><br>
                                    <div class="common_input mb_15">
                                        <img src="{{ asset($data->first_icon_features) }}"

                                             style="width: 20%" alt="">
                                    </div>
                                    @error('first_icon_features')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="first_title_features">First Title Features</label>
                                    <input type="text" name="first_title_features" id="first_title_features"
                                           class="form-control" value="{{$data->first_title_features }}">
                                    @error('first_title_features')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div style="border-bottom: 5px solid gray;"></div>
                                <div class="form-group">
                                    <label for="second_icon_features">Second Icon Features</label>
                                    <input type="file" name="second_icon_features" id="second_icon_features"
                                           class="form-control" value="{{ $data->second_icon_features }}">
                                    <br><br>
                                    <div class="common_input mb_15">
                                        <img src="{{ asset($data->second_icon_features) }}"

                                             style="width: 20%" alt="">
                                    </div>
                                    @error('second_icon_features')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="second_title_features">Second Title Features</label>
                                    <input type="text" name="second_title_features" id="second_title_features"
                                           class="form-control" value="{{$data->second_title_features }}">
                                    @error('second_title_features')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div style="border-bottom: 5px solid gray;"></div>
                                <div class="form-group">
                                    <label for="third_icon_features">Third Icon Features</label>
                                    <input type="file" name="third_icon_features" id="third_icon_features"
                                           class="form-control" value="{{ $data->third_icon_features}}">
                                    <br><br>
                                    <div class="common_input mb_15">
                                        <img src="{{ asset($data->third_icon_features) }}"
                                             style="width: 20%" alt="">
                                    </div>
                                    @error('third_icon_features')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="third_title_features">Third Title Features</label>
                                    <input type="text" name="third_title_features" id="third_title_features"
                                           class="form-control" value="{{ $data->third_title_features }}">
                                    @error('third_title_features')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div style="border-bottom: 5px solid gray;"></div>
                                <div class="form-group">
                                    <label for="fourth_icon_features">Fourth Icon Features</label>
                                    <input type="file" name="fourth_icon_features" id="fourth_icon_features"
                                           class="form-control" value="{{$data->fourth_icon_features }}">
                                    <br><br>
                                    <div class="common_input mb_15">
                                        <img src="{{ asset($data->fourth_icon_features) }}"
                                             style="width: 20%" alt="">
                                    </div>
                                    @error('fourth_icon_features')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="fourth_title_features">Fourth Title Features</label>
                                    <input type="text" name="fourth_title_features" id="fourth_title_features"
                                           class="form-control" value="{{ $data->fourth_title_features }}">
                                    @error('fourth_title_features')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div style="border-bottom: 5px solid gray;"></div>
                                <div class="form-group">
                                    <label for="first_video">First Video</label>
                                    <input type="file" name="first_video" value="{{$data->first_video}}"
                                           id="first_video" class="form-control">
                                    <br><br>
                                    <div class="common_input mb_15">
                                        <img src="{{ asset($data->first_video) }}"
                                             style="width: 20%" alt="">
                                    </div>
                                    @error('first_video')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="first_image_video">First Image Video</label>
                                    <input type="file" name="first_image_video" id="first_image_video"
                                           value="{{$data->first_image_video}}" class="form-control">
                                    <br><br>
                                    <div class="common_input mb_15">
                                        <img src="{{ asset($data->first_image_video) }}"
                                             style="width: 20%" alt="">
                                    </div>
                                    @error('first_image_video')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="first_title_video">First Title Video</label>
                                    <input type="text" name="first_title_video" id="first_title_video"
                                           class="form-control" value="{{ $data->first_title_video }}">
                                    @error('first_title_video')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div style="border-bottom: 5px solid gray;"></div>
                                <div class="form-group">
                                    <label for="second_video">Second Video</label>
                                    <input type="file" name="second_video" value="{{$data->second_video}}"
                                           id="second_video" class="form-control">
                                    <br><br>
                                    <div class="common_input mb_15">
                                        <img src="{{ asset($data->second_video) }}"
                                             style="width: 20%" alt="">
                                    </div>
                                    @error('second_video')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="second_image_video">Second Image Video</label>
                                    <input type="file" value="{{$data->second_image_video}}" name="second_image_video"
                                           id="second_image_video"
                                           class="form-control">
                                    <br><br>
                                    <div class="common_input mb_15">
                                        <img src="{{ asset($data->second_image_video) }}"
                                             style="width: 20%" alt="">
                                    </div>
                                    @error('second_image_video')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="second_title_video">Second Title Video</label>
                                    <input type="text" name="second_title_video" id="second_title_video"
                                           class="form-control" value="{{ $data->second_title_video }}">
                                    @error('second_title_video')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div style="border-bottom: 5px solid gray;"></div>
                                <div class="form-group">
                                    <label for="third_video">Third Video</label>
                                    <input type="file" value="{{ $data->third_video }}" name="third_video"
                                           id="third_video" class="form-control">
                                    <br><br>
                                    <div class="common_input mb_15">
                                        <img src="{{ asset($data->third_video) }}"
                                             style="width: 20%" alt="">
                                    </div>

                                </div>

                                <div class="form-group">
                                    <label for="third_image_video">Third Image Video</label>
                                    <input type="file" value="{{ $data->third_image_video }}" name="third_image_video"
                                           id="third_image_video"
                                           class="form-control">
                                    <br><br>
                                    <div class="common_input mb_15">
                                        <img src="{{ asset($data->third_image_video) }}"
                                             style="width: 20%" alt="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="third_title_video">Third Title Video</label>
                                    <input type="text" name="third_title_video" id="third_title_video"
                                           class="form-control" value="{{ $data->third_title_video }}">
                                </div>
                                <div style="border-bottom: 5px solid gray;"></div>
                                <div class="form-group">

                                    <label for="privacy_policy">Privacy Policy</label>
                                    <textarea name="privacy_policy" id="privacy_policy" cols="30" rows="10"
                                              class="form-control">{{ $data->privacy_policy}}</textarea>
                                    @error('privacy_policy')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div style="border-bottom: 5px solid gray;"></div>
                                <div class="form-group">

                                    <label for="successful_deals">Successful Deals</label>
                                    <input type="number" name="successful_deals" id="successful_deals"
                                           class="form-control" value="{{ $data->successful_deals}}">
                                    @error('successful_deals')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div style="border-bottom: 5px solid gray;"></div>
                                <div class="form-group">
                                    <label for="Paid_ratios">Paid Ratios</label>
                                    <input type="number" name="Paid_ratios" id="Paid_ratios" class="form-control"
                                           value="{{ $data->Paid_ratios }}">
                                    @error('Paid_ratios')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('admin.partials._footer')

    </section>
@endsection
