@extends('layout.main')

@section('breadcrumb')
    <div class="toolbar" id="kt_toolbar">
        <div class="container-fluid d-flex flex-stack flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex flex-column align-items-start justify-content-center flex-wrap me-2">
                <!--begin::Title-->
                <h1 class="text-dark fw-bolder my-1 fs-2">Business Page</h1>
                <!--end::Title-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb fw-bold fs-base my-1">
                    <li class="breadcrumb-item text-muted">
                        <a href="../dist/index.html" class="text-muted text-hover-primary">Home</a>
                    </li>
                    <li class="breadcrumb-item text-muted">Business Page</li>

                    <li class="breadcrumb-item text-dark">All</li>
                </ul>
                <!--end::Breadcrumb-->
            </div>
            <!--end::Info-->

        </div>
    </div>
@endsection

@section('content')
    <!--begin::Post-->
    <div class="post fs-6 d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div class="container-xxl">
            <form id="kt_ecommerce_add_category_form" class="form d-flex flex-column flex-lg-row "
                action="{{ route('organizers.update', $organizer->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <!--begin::Aside column-->
                <div class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px mb-7 me-lg-10">
                    <!--begin::Thumbnail settings-->
                    <div class="card card-flush py-4">
                        <!--begin::Card header-->
                        <div class="card-header">
                            <!--begin::Card title-->
                            <div class="card-title">
                                <h2> Edit Thumbnail</h2>
                            </div>
                            <!--end::Card title-->
                        </div>
                        <!--end::Card header-->
                        <!--begin::Image input wrapper-->
                        <div class="card-body text-center pt-0">
                            <!--begin::Image input-->
                            <div class="image-input image-input-empty image-input-outline mb-3" data-kt-image-input="true"
                                style="background-image: url('{{ asset('uploads/organizers') }}/{{ $organizer->img }}')">
                                <div class="image-input-wrapper w-150px h-150px"
                                    style="background-image: url(' {{ asset('uploads/organizers') }}/{{ $organizer->img }}')">

                                </div>
                                <!--end::Preview existing avatar-->
                                <!--begin::Edit-->
                                <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                    data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
                                    <i class="bi bi-pencil-fill fs-7"></i>
                                    <!--begin::Inputs-->
                                    <input type="file" name="img" accept=".png, .jpg, .jpeg" />
                                    <input type="hidden" name="avatar_remove" />
                                    <!--end::Inputs-->
                                </label>
                                <!--end::Edit-->

                            </div>
                            <!--end::Image input-->
                        </div>
                        <!--end::Image input wrapper-->
                    </div>
                    <!--end::Thumbnail settings-->
                    <!--start::Owner settings-->
                    <!--begin::Category & tags-->
                    <div class="card card-flush py-4">
                        <!--begin::Card header-->
                        <div class="card-header">
                            <!--begin::Card title-->
                            <div class="card-title">
                                <h2>Doctor Details</h2>
                            </div>
                            <!--end::Card title-->
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body pt-0">
                            <!--begin::Input group-->
                            <!--begin::Label-->
                            <label class="required form-label">Doctors</label>
                            <!--end::Label-->
                            <!--begin::Select2-->
                            <select required class=" form-select mb-2 @error('doctor_id') is-invalid @enderror"
                                id="doctor_id" name="doctor_id" data-control="select2" data-placeholder="Select an option">
                                <option></option>
                                @foreach ($doctors as $doctor)
                                    <option value="{{ $doctor->id }}"
                                        {{ $organizer->doctor_id == $doctor->id ? 'selected' : '' }}>{{ $doctor->name }} -
                                        {{ $doctor->email }}</option>
                                @endforeach

                            </select>
                            <!--end::Select2-->

                            <!--end::Input group-->

                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Category & tags-->


                    <!--begin::Category & tags-->
                    <div class="card card-flush py-4">
                        <!--begin::Card header-->
                        <div class="card-header">
                            <!--begin::Card title-->
                            <div class="required card-title">
                                <h2>Phones</h2>
                            </div>
                            <!--end::Card title-->
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body pt-0">
                            <!--begin::Repeater-->
                            <div id="kt_docs_repeater_basic1">
                                <!--begin::Form group-->
                                <div class="form-group">
                                    <div data-repeater-list="kt_docs_repeater_basic1">

                                        @if ($organizer->organizers->count() > 0)
                                            @foreach ($organizer->organizers as $index => $organizerPhone)
                                                <div data-repeater-item>
                                                    <div class="form-group row">

                                                        <div class="col-md-10">
                                                            {{-- <label class="form-label">Phone:</label> --}}
                                                            <input type="tel" name="phones"
                                                                value="{{ $organizerPhone->phone }}" class="form-control "
                                                                placeholder="Enter phone number" />
                                                        </div>

                                                        <div class="col-md-2 ">
                                                            <a href="javascript:;" data-repeater-delete
                                                                class="btn btn-sm btn-light-danger ">
                                                                <i class="la la-trash-o"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @else
                                            <div data-repeater-item>
                                                <div class="form-group row">

                                                    <div class="col-md-10">
                                                        {{-- <label class="form-label">Phone:</label> --}}
                                                        <input type="tel" name="phones"
                                                            class="form-control @error('phones') is-invalid @enderror"
                                                            placeholder="Enter phone number" />
                                                    </div>

                                                    <div class="col-md-2 ">
                                                        <a href="javascript:;" data-repeater-delete
                                                            class="btn btn-sm btn-light-danger ">
                                                            <i class="la la-trash-o"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <!--end::Form group-->

                                <!--begin::Form group-->
                                <div class="form-group mt-5">
                                    <a href="javascript:;" data-repeater-create class="btn btn-light-primary">
                                        <i class="la la-plus"></i>Add
                                    </a>
                                </div>
                                <!--end::Form group-->
                            </div>
                            <!--end::Repeater-->



                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Category & tags-->
                    <!--end::Owner settings-->



                </div>
                <!--end::Aside column-->
                <!--begin::Main column-->
                <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                    <!--begin::General options-->
                    <div class="card card-flush py-4">
                        <!--begin::Card header-->
                        <div class="card-header">
                            <div class="card-title">
                                <h2>General</h2>
                            </div>
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body pt-0">
                            <!--begin::Input group-->
                            <div class="mb-10 fv-row">
                                <!--begin::Label-->
                                <label class="required form-label">Organize Name</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" name="name"
                                    class="form-control mb-2 @error('name') is-invalid @enderror" name="name"
                                    value="{{$organizer->name}}" autocomplete="name" autofocus>
                                <!--end::Input-->
                                {{-- @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror --}}
                            </div>
                            <!--begin::Tax-->
                            <div class="d-flex flex-wrap gap-5">

                                <!--begin::Input group-->
                                <div class="fv-row w-100 flex-md-root">
                                    <!--begin::Label-->
                                    <label class="required form-label">Email</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="email" id="email" name="email"
                                        class="form-control mb-2 @error('email') is-invalid @enderror" name="name"
                                        value="{{$organizer->email}}" autocomplete="email" autofocus>
                                    <!--end::Input-->
                                    {{-- @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror --}}
                                    <!--end::Input-->
                                </div>
                                <!--end::Input group-->
                            </div>
                            <!--end:Tax-->


                            <!--begin::Input group-->
                            {{-- <div> --}}
                            <!--begin::Label-->
                            {{-- <label class="form-label">Overview</label> --}}
                            <!--end::Label-->
                            <!--begin::Editor-->
                            {{-- <textarea id="kt_docs_tinymce_basic"  class="tox-target" name="overview" --}}
                            {{-- placeholder="Type Organizer Overview"></textarea> --}}
                            <!--end::Editor-->

                            {{-- </div> --}}
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div>
                                <!--begin::Label-->
                                <label class="required form-label">Bussiness Field</label>
                                <!--end::Label-->
                                <!--begin::Editor-->


                                <textarea class="form-control form-control-solid  @error('bussiness_field') is-invalid @enderror" rows="3"
                                    name="bussiness_field" placeholder="Type Bussiness Field">{{$organizer->bussiness_field}}</textarea>
                                <!--end::Editor-->
                                {{-- @error('bussiness_field')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror --}}
                            </div>
                            <!--end::Input group-->
                        </div>
                        <!--end::Card header-->
                    </div>
                    <!--end::General options-->
                    <!--begin::Social options-->
                    <div class="card card-flush py-4">
                        <!--begin::Card header-->
                        <div class="card-header">
                            <div class="card-title">
                                <h2>Social links</h2>
                            </div>
                            <!--begin::Row-->

                            <div class="row row-cols-1 row-cols-md-3 row-cols-lg-1 row-cols-xl-3 g-9"
                                data-kt-buttons="true" data-kt-buttons-target="[data-kt-button='true']">
                                <!--begin::Col-->
                                <div class="col">
                                    <!--begin::Option-->
                                    <!--begin::Label-->
                                    <label class="form-label ">Linkedin Account</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="text" class="form-control mb-2" value="{{$organizer->linkedin_account}}" name="linkedin_account"
                                        placeholder="Linkedin Account" />
                                    <!--end::Input-->
                                    <!--end::Option-->
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col">
                                    <!--begin::Option-->
                                    <!--begin::Label-->
                                    <label class="form-label">Twitter Account</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="text" class="form-control mb-2" value="{{$organizer->linkedin_account}}" name="twitter_account"
                                        placeholder="Twitter Account" />
                                    <!--end::Input-->
                                    <!--end::Option-->
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col">
                                    <!--begin::Option-->
                                    <!--begin::Label-->
                                    <label class="form-label">Youtube Account</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="text" class="form-control mb-2" value="{{$organizer->youtube_account}}" name="youtube_account"
                                        placeholder="Youtube Account" />
                                    <!--end::Input-->
                                    <!--end::Option-->
                                </div>

                                <!--begin::Tax-->
                                <div class="col">
                                    <!--begin::Input group-->
                                    <div class="fv-row w-100 flex-md-root">
                                        <label class=" form-label">Website</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="text" name="website" class="form-control mb-2"
                                            placeholder="website" value="{{$organizer->website}}" />
                                        <!--end::Input-->
                                    </div>
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="col">
                                    <div class="fv-row w-100 flex-md-root">
                                        <!--begin::Label-->
                                        <label class=" form-label">Fb Account</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="text" name="fb_account" class="form-control mb-2"
                                            placeholder="fb account" value="{{$organizer->fb_account}}" />
                                        <!--end::Input-->
                                    </div>
                                    <!--end::Input group-->
                                </div>
                                <!--end:Tax-->
                            </div>
                            <!--end::Row-->

                        </div>
                        <!--end::Card header-->


                        <!--end::Card header-->
                    </div>
                    <!--end::Social options-->

                    <div class="d-flex justify-content-end">
                        <!--begin::Button-->
                        <a href="{{ route('organizers.index') }}" id="kt_ecommerce_add_product_cancel"
                            class="btn btn-light me-5">Cancel</a>
                        <!--end::Button-->
                        <!--begin::Button-->
                        <button type="submit" id="kt_ecommerce_add_category_submit" class="btn btn-primary">
                            <span class="indicator-label">Save Changes</span>
                            <span class="indicator-progress">Please wait...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                        <!--end::Button-->
                    </div>
                </div>
                <!--end::Main column-->
            </form>
        </div>
        <!--end::Container-->
    </div>
    <!--end::Post-->
@endsection
@section('scripts')
    {{-- <script src="{{asset('dist/assets/js/custom/apps/ecommerce/catalog/save-product.js')}}"></script> --}}
                                <script>
                                    $('#kt_docs_repeater_basic1').repeater({
                                        initEmpty: false,

                                        defaultValues: {
                                            'text-input': 'foo'
                                        },

                                        show: function() {
                                            $(this).slideDown();
                                        },

                                        hide: function(deleteElement) {
                                            $(this).slideUp(deleteElement);
                                        }
                                    });


                                    $(document).ready(function() {
                                        $('#doctor_id').on('change', function() {

                                            var select_value = $('#doctor_id option:selected').val();


                                            $.ajax({
                                                type: 'GET',
                                                data: {

                                                    select_value: select_value,


                                                },
                                                url: "{{ route('selectDoctorMail.fetch') }}",

                                                success: function(data) {
                                                    var result = $.parseJSON(data);

                                                    $("#email").val(result[0]);



                                                },
                                                error: function(request, status, error) {
                                                    $("#email").val(' ');



                                                }
                                            });


                                        });

                                    });
                                </script>
                            @endsection
