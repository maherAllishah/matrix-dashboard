@extends('admin.layout.app')

@section('content')
    <section class="main_content dashboard_part large_header_bg">

        @include('admin.partials._header')

        @include('admin/partials/_head_pages', ['pageTitle' => 'Contact Table'])

        <div class="row">
            <div class="col-lg-12">
                <div class="white_card card_height_100 mb_30 pt-4">
                    <div class="white_card_body">
                        <div class="QA_section">
                            <div class="white_box_tittle list_header">
                                <h4></h4>
                                {{--                                    search form --}}
                                <div class="box_right d-flex lms_block">
                                    <div class="serach_field_2">
                                        <div class="search_inner">
                                            <div class="search_field">
                                            </div>

                                        </div>
                                    </div>
                                    <div class="add_button ms-2">
                                    </div>
                                </div>


                            </div>
                            <div class="QA_table mb_30">

                                <table class="table lms_table_active ">
                                    <thead>
                                    <tr>
                                        <th scope="col">id</th>
                                        <th scope="col">Full Name</th>
                                        <th scope="col">Phone Number</th>
                                        <th scope="col">Email Address</th>
                                        <th scope="col">Message</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($data as $contact)

                                        <tr>
                                            <th scope="row"><a href="#"
                                                               class="question_content"> {{ $contact->id }} </a></th>
                                            <td>{{ $contact->full_name }}</td>
                                            <td>{{ $contact->phone_number }}</td>
                                            {{--                                            <td><a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="">[email&#160;protected]</a></td>--}}
                                            <td>{{ $contact->email }}</td>
                                            <td>{{ $contact->message }}</td>
                                            <td>{{ $contact->created_at }}</td>
                                            <td>
                                                <form method="post"
                                                      action="{{route('admin.contacts.destroy',$contact->id)}}">
                                                    <div class="action_btns d-flex">

                                                        @csrf
                                                        @method('DELETE')

                                                        <button type="submit" class="action_btn"><i
                                                                class="fas fa-trash"></i></button>

                                                    </div>
                                                </form>
                                            </td>
                                        </tr>

                                    @endforeach
                                    </tbody>
                                </table>

                            </div>
                        </div>

                    </div>

                </div>

            </div>

        </div>
        

        @include('admin.partials._footer')
    </section>
@endsection
