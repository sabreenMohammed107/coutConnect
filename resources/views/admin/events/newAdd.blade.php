@extends('layout.main')

@section('breadcrumb')
    <div class="toolbar" id="kt_toolbar">
        <div class="container-fluid d-flex flex-stack flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex flex-column align-items-start justify-content-center flex-wrap me-2">
                <!--begin::Title-->
                <h1 class="text-dark fw-bolder my-1 fs-2">Events</h1>
                <!--end::Title-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb fw-bold fs-base my-1">
                    <li class="breadcrumb-item text-muted">
                        <a href="../dist/index.html" class="text-muted text-hover-primary">Home</a>
                    </li>
                    <li class="breadcrumb-item text-muted">Events</li>

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
            <form id="kt_ecommerce_add_category_form" class="form d-flex flex-column flex-lg-row"
                action="{{ route('events.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <!--begin::Aside column-->
                <div class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px mb-7 me-lg-10">
                    <!--begin::Thumbnail settings-->
                    <div class="card card-flush py-4">
                        <!--begin::Card header-->
                        <div class="card-header">
                            <!--begin::Card title-->
                            <div class="card-title">
                                <h2>Cover Photo</h2>
                            </div>
                            <!--end::Card title-->
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body text-center pt-0">
                            <!--begin::Image input-->
                            <div class="image-input image-input-empty image-input-outline mb-3" data-kt-image-input="true"
                                style="background-image: url(assets/media/svg/files/blank-image.svg)">
                                <!--begin::Preview existing avatar-->
                                <div class="image-input-wrapper w-150px h-150px"></div>
                                <!--end::Preview existing avatar-->
                                <!--begin::Label-->
                                <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                    data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
                                    <!--begin::Icon-->
                                    <i class="bi bi-pencil-fill fs-7"></i>
                                    <!--end::Icon-->
                                    <!--begin::Inputs-->
                                    <input type="file" name="cover_photo" accept=".png, .jpg, .jpeg" />
                                    <input type="hidden" name="avatar_remove" />
                                    <!--end::Inputs-->
                                </label>
                                <!--end::Label-->
                                <!--begin::Cancel-->
                                <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                    data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">
                                    <i class="bi bi-x fs-2"></i>
                                </span>
                                <!--end::Cancel-->
                                <!--begin::Remove-->
                                <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                    data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove avatar">
                                    <i class="bi bi-x fs-2"></i>
                                </span>
                                <!--end::Remove-->
                            </div>
                            <!--end::Image input-->

                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Thumbnail settings-->


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
                                <label class="required form-label">Event Name</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" name="name" class="form-control mb-2" placeholder="Event name"
                                    value="" />


                            </div>
                            <!--end::Input-->


                            <div class="d-flex flex-wrap gap-5">

                                <!--begin::Input group-->
                                <div class="fv-row w-100 flex-md-root">
                                    <!--begin::Label-->
                                    <label class="fs-6 fw-bold form-label mt-3">
                                        <option value="">Select Organizer..</option>
                                        {{-- <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Interviewer who conducts the meeting with the interviewee"></i> --}}
                                    </label>
                                    <!--end::Label-->
                                    <select class="form-select form-select-solid" id="organizer_id" name="organizer_id"
                                        data-control="select2" data-placeholder="Select an option">
                                        <option value=""></option>
                                        @foreach ($organizers as $organizer)
                                            <option value="{{ $organizer->id }}">{{ $organizer->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <!--end::Input group-->

                                <!--begin::Input group-->
                                <div class="fv-row w-100 flex-md-root ">
                                    <!--begin::Label-->
                                    <label class=" form-label mb-6">Email</label>
                                    <!--end::Label-->
                                    <input type="text" class="form-control " name="email" id="email">
                                </div>
                            </div>
                            <!--end::Input group-->
                            <div class="d-flex flex-wrap gap-5">

                                <div class="fv-row w-100 flex-md-root">
                                    <!--begin::Label-->
                                    <label class="fs-6 fw-bold form-label mt-3">
                                        <option value="">Select Language..</option>
                                        {{-- <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Interviewer who conducts the meeting with the interviewee"></i> --}}
                                    </label>
                                    <!--end::Label-->
                                    <select class="form-select form-select-solid" name="language_id" data-control="select2"
                                        data-placeholder="Select an option">
                                        <option value=""></option>
                                        @foreach ($languages as $language)
                                            <option value="{{ $language->id }}">{{ $language->language }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="fv-row w-100 flex-md-root ">
                                    <!--begin::Label-->
                                    <label class=" form-label mb-6">Rank</label>
                                    <!--end::Label-->
                                    <input type="text" class="form-control " name="rank" id="">
                                </div>
                            </div>

                            <!--end::Input group-->

                            <!--end::Input group-->





                            <div class="d-flex flex-wrap gap-5">
                                <!--begin::Input group-->
                                <div class="fv-row w-100 flex-md-root">
                                    <!--begin::Input group-->

                                    <!--begin::Label-->
                                    <label class="fs-6 fw-bold form-label mt-3">
                                        <span class="required">Add Medicine Fields</span>

                                    </label>
                                    <!--end::Label-->
                                    <select class="form-select form-select-solid" id="medicines" name="medicines[]"
                                        data-control="select2" data-placeholder="Select an option"
                                        data-allow-clear="true" multiple="multiple">
                                        <option></option>
                                        @foreach ($medicines as $field)
                                            <option value="{{ $field->id }}">{{ $field->field_enname }}</option>
                                        @endforeach

                                    </select>
                                </div>
                                <!--end::Input group-->
                                <div class="fv-row w-100 flex-md-root">
                                    <!--begin::Input group-->

                                    <!--begin::Label-->
                                    <label class="fs-6 fw-bold form-label mt-3">
                                        <span class="required">Add Spicialize</span>

                                    </label>
                                    <!--end::Label-->
                                    <select class="form-select form-select-solid" id="selectSpicial" name="spicial[]"
                                        data-control="select2" data-placeholder="Select an option"
                                        data-allow-clear="true" multiple="multiple">
                                        <option></option>
                                        {{-- @foreach ($medicines as $field)
                                    <option value="{{ $field->id }}">{{ $field->field_enname }}</option>
                                @endforeach --}}

                                    </select>
                                </div>
                            </div>
                            <!--begin::Input group-->
                            <div class="fv-row w-100 flex-md-root">
                                <!--begin::Label-->
                                <label class="fs-6 fw-bold form-label mt-3">
                                    <span class="required">Add Event Type</span>
                                    <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                                        title="Interviewer who conducts the meeting with the interviewee"></i>
                                </label>
                                <!--end::Label-->
                                <select class="form-select form-select-solid" name="event_type_id" data-control="select2"
                                    data-placeholder="Select an option" data-allow-clear="true">
                                    <option></option>
                                    @foreach ($eventTypes as $eventType)
                                        <option value="{{ $eventType->id }}">{{ $eventType->event_enname }}</option>
                                    @endforeach

                                </select>
                            </div>


                            <!--begin::Input group-->
                            <div>
                                <!--begin::Label-->
                                <label class="form-label">Overview</label>
                                <!--end::Label-->
                                <!--begin::Editor-->
                                <textarea class="form-control form-control-solid" rows="3" name="event_overview"
                                    placeholder="Type Event Overview"></textarea>
                                <!--end::Editor-->

                            </div>
                            <!--end::Input group-->





                            <!--begin::checkbox-->

                            <div class="d-flex flex-wrap gap-5 mt-4">
                                <!--begin::Input group-->
                                <div class="fv-row w-100 flex-md-root">
                                    <div class="form-check form-switch form-check-custom form-check-solid">
                                        <input class="form-check-input" type="checkbox" name="featured[]" value="1"
                                            id="flexSwitchDefault" />
                                        <label class="form-check-label" for="flexSwitchDefault">
                                            Featured
                                        </label>
                                    </div>
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="fv-row w-100 flex-md-root">
                                    <div class="form-check form-switch form-check-custom form-check-solid">
                                        <input class="form-check-input" type="checkbox" name="premium[]" value="1"
                                            id="flexSwitchDefault2" />
                                        <label class="form-check-label" for="flexSwitchDefault2">
                                            Premium
                                        </label>
                                    </div>
                                </div>
                                <!--end::Input group-->
                            </div>
                            <!--end:checkbox-->


                            <!--end::Card header-->
                            <!--begin::others options-->
                            <div class="card card-flush py-4">
                                <!--begin::Card header-->
                                <div class="card-header">
                                    <div class="card-title">
                                        <h2>Address Data </h2>
                                    </div>
                                </div>
                                <!--begin::Row-->
                                <!--begin::Card body-->
                                <div class="card-body pt-0">


                                    <div class="d-flex flex-wrap gap-5">

                                        <!--begin::Input group-->
                                        <div class="fv-row w-100 flex-md-root">
                                            <label class="fs-6 fw-bold form-label mt-3">
                                                <option value="">Select City..</option>
                                            </label>
                                            <select class="form-select form-select-solid" name="city_id"
                                                data-control="select2" data-placeholder="Select an option">
                                                <option value=""></option>
                                                @foreach ($cities as $city)
                                                    <option value="{{ $city->id }}">{{ $city->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <!--begin::Input group-->

                                        <!--begin::Input group-->
                                        <div class="fv-row w-100 flex-md-root">
                                            <!--begin::Label-->
                                            <label class="form-label mb-6">Area</label>
                                            <!--end::Label-->
                                            <input type="text" name="area" class="form-control mb-2"
                                                placeholder="Event name" value="" />

                                            <!--end::Input group-->
                                        </div>

                                        <!--begin::Input group-->
                                        {{-- <div class="fv-row w-100 flex-md-root">
                                    <!--begin::Label-->
                                    <label class="form-label">Rank</label>
                                    <!--end::Label-->
                                    <!--begin::Editor-->
                                    <input type="text" name="ranking" class="form-control mb-2"
                                    placeholder="Event name" value="" />

                                    <!--end::Editor-->

                                </div> --}}
                                        <!--end::Input group-->
                                    </div>
                                    <!--end::Card header-->
                                    <!--end::Row-->
                                    {{-- /  </div> --}}
                                    <!--end::Card header-->


                                    <!--end::Card header-->
                                    <!--begin::Input group-->
                                    <div class="mb-10 fv-row">
                                        <!--begin::Label-->
                                        <label class="required form-label">Address Details</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="text" name="details_address" class="form-control mb-2"
                                            placeholder="Event name" value="" />


                                    </div>
                                    <!--end::Input-->
                                </div>
                                <!--end::Social options-->
                                <!--end::Input group-->
                                <div class="d-flex flex-wrap gap-5">

                                    <!--begin::Input group-->
                                    <div class="fv-row w-100 flex-md-root">
                                        <!--begin::Label-->
                                        <label class="fs-6 fw-bold form-label mt-3">
                                            <span class="required">Add Tags</span>
                                            <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                                                title="Interviewer who conducts the meeting with the interviewee"></i>
                                        </label>
                                        <!--end::Label-->
                                        <select class="form-select form-select-solid" name="tags[]"
                                            data-control="select2" data-placeholder="Select an option"
                                            data-allow-clear="true" multiple="multiple">
                                            <option></option>
                                            @foreach ($tags as $tag)
                                                <option value="{{ $tag->id }}">{{ $tag->tag }}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>
                                <!--end::Input group-->
                            </div>
                            <!--end::General options-->

                        </div>
                        <div class="d-flex justify-content-end">
                            <!--begin::Button-->
                            <a href="{{ route('events.index') }}" id="kt_ecommerce_add_product_cancel"
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
    <script>
        $("#kt_datepicker_1").flatpickr();
        $("#kt_datepicker_2").flatpickr();
        $("#kt_datepicker_8").flatpickr({
            enableTime: true,
            noCalendar: true,
            dateFormat: "H:i",
        });

        $("#kt_datepicker_7").flatpickr({
            enableTime: true,
            noCalendar: true,
            dateFormat: "H:i",
        });


        $(document).ready(function() {
            $('#organizer_id').on('change', function() {

                var select_value = $('#organizer_id option:selected').val();


                $.ajax({
                    type: 'GET',
                    data: {

                        select_value: select_value,


                    },
                    url: "{{ route('selectOrganizerMail.fetch') }}",

                    success: function(data) {
                        var result = $.parseJSON(data);

                        $("#email").val(result[0]);



                    },
                    error: function(request, status, error) {
                        $("#email").val(' ');



                    }
                });


            });

            $('#medicines').on('change', function() {
                var opts = []
                $("#medicines :selected").each(function() {

                    opts.push(this.value);
                });
                $.ajax({
                    type: 'GET',
                    data: {

                        opts: opts,


                    },
                    url: "{{ route('selectMedicineSpicial.fetch') }}",

                    success: function(data) {
                        var result = $.parseJSON(data);

                        // $("#email").val(result[0]);
                        $("#selectSpicial").html(result[0]);


                    },
                    error: function(request, status, error) {
                        // $("#email").val(' ');



                    }
                });
            });

        });
    </script>
@endsection
