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
            {{-- <form id="kt_ecommerce_add_category_form" class="form d-flex flex-column flex-lg-row"
                action="{{ route('events.update', $event->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT') --}}
            <!--begin::Aside column-->
            <div class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px mb-7 me-lg-10">
                <!--begin::Thumbnail settings-->
                <form id="kt_ecommerce_add_category_form" action="{{ route('events.update', $event->id) }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card card-flush py-4">
                        <!--begin::Card header-->
                        <div class="card-header">
                            <!--begin::Card title-->
                            <div class="card-title">
                                <h2> Edit Cover Photo</h2>
                            </div>
                            <!--end::Card title-->
                        </div>
                        <!--end::Card header-->
                        <!--begin::Image input wrapper-->
                        <div class="card-body text-center pt-0">
                            <!--begin::Image input-->
                            <div class="image-input image-input-empty image-input-outline mb-3" data-kt-image-input="true"
                                style="background-image: url('{{ asset('uploads/events') }}/{{ $event->cover_photo }}')">
                                <div class="image-input-wrapper w-150px h-150px"
                                    style="background-image: url(' {{ asset('uploads/events') }}/{{ $event->cover_photo }}')">

                                </div>
                                <!--end::Preview existing avatar-->
                                <!--begin::Edit-->
                                <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                    data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
                                    <i class="bi bi-pencil-fill fs-7"></i>
                                    <!--begin::Inputs-->
                                    <input type="file" name="cover_photo" accept=".png, .jpg, .jpeg" />
                                    <input type="hidden"  />
                                    <!--end::Inputs-->
                                </label>
                                <!--end::Edit-->

                            </div>
                            <!--end::Image input-->
                        </div>
                        <!--end::Image input wrapper-->
                    </div>
                    <!--end::Thumbnail settings-->
                    <!--end::Tab content-->
                    <div class="d-flex justify-content-end">
                        <!--begin::Button-->
                        <a href="{{ route('events.index') }}" id="kt_ecommerce_add_product_cancel"
                            class="btn btn-light me-5">Cancel</a>
                        <!--end::Button-->
                        <!--begin::Button-->
                        <button type="submit" id="kt_ecommerce_add_product_submit" class="btn btn-primary">
                            <span class="indicator-label">Save Changes</span>
                            <span class="indicator-progress">Please wait...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                        <!--end::Button-->
                    </div>
                </form>

            </div>
            <!--end::Aside column-->
            <!--begin::Main column-->
            <!--begin::Main column-->
            <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                <!--begin:::Tabs-->
                <ul class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-bold mb-n2">
                    <!--begin:::Tab item-->
                    <li class="nav-item">
                        <a class="nav-link text-active-primary pb-4 active" data-bs-toggle="tab"
                            href="#kt_ecommerce_add_product_general">General</a>
                    </li>
                    <!--end:::Tab item-->
                    <!--begin:::Tab item-->
                    {{-- <li class="nav-item">
                            <a class="nav-link text-active-primary pb-4" data-bs-toggle="tab"
                                href="#kt_ecommerce_add_product_advanced">Specialization</a>
                        </li> --}}
                    <!--end:::Tab item-->

                    <!--begin:::Tab item-->
                    <li class="nav-item">
                        <a class="nav-link text-active-primary pb-4" data-bs-toggle="tab"
                            href="#kt_ecommerce_add_days_advanced">Days</a>
                    </li>
                    <!--end:::Tab item-->
                    <!--begin:::Tab item-->
                    <li class="nav-item">
                        <a class="nav-link text-active-primary pb-4" data-bs-toggle="tab"
                            href="#kt_ecommerce_add_instructor_advanced">Instractors</a>
                    </li>
                    <!--end:::Tab item-->
                    <!--begin:::Tab item-->
                    <li class="nav-item">
                        <a class="nav-link text-active-primary pb-4" data-bs-toggle="tab"
                            href="#kt_ecommerce_add_faq_advanced">FAQS</a>
                    </li>
                    <!--end:::Tab item-->
                    <!--begin:::Tab item-->
                    <li class="nav-item">
                        <a class="nav-link text-active-primary pb-4" data-bs-toggle="tab"
                            href="#kt_ecommerce_add_content_advanced">Contents</a>
                    </li>
                    <!--end:::Tab item-->
                    <!--begin:::Tab item-->
                    <li class="nav-item">
                        <a class="nav-link text-active-primary pb-4" data-bs-toggle="tab"
                            href="#kt_ecommerce_add_ticket_advanced">Tickets</a>
                    </li>
                    <!--end:::Tab item-->
                     <!--begin:::Tab item-->
                     <li class="nav-item">
                        <a class="nav-link text-active-primary pb-4" data-bs-toggle="tab"
                            href="#kt_ecommerce_add_copoun_advanced">Copouns</a>
                    </li>
                    <!--end:::Tab item-->
                     <!--begin:::Tab item-->
                     <li class="nav-item">
                        <a class="nav-link text-active-primary pb-4" data-bs-toggle="tab"
                            href="#kt_ecommerce_add_discount_advanced">Discounts</a>
                    </li>
                    <!--end:::Tab item-->

                </ul>
                <!--end:::Tabs-->
                <!--begin::Tab content-->
                <div class="tab-content">
                    <!--begin::Tab pane-->
                    <div class="tab-pane fade show active" id="kt_ecommerce_add_product_general" role="tab-panel">

                        <div class="d-flex flex-column gap-7 gap-lg-10">
                            <!--begin::General options-->
                            <form id="kt_ecommerce_add_category_form" action="{{ route('events.update', $event->id) }}"
                                method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <!--begin::Card body-->
                                <div class="card card-flush py-4">
                                    <div class="card-body pt-0">
                                        <!--begin::Input group-->
                                        <div class="mb-10 fv-row">
                                            <!--begin::Label-->
                                            <label class="required form-label">Event Name</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input type="text" name="name" value="{{ $event->name }}"
                                                class="form-control mb-2" placeholder="Event name" />


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
                                                <select class="form-select form-select-solid" id="organizer_id"
                                                    name="organizer_id" data-control="select2"
                                                    data-placeholder="Select an option">
                                                    <option value=""></option>
                                                    @foreach ($organizers as $organizer)
                                                        <option value="{{ $organizer->id }}"
                                                            {{ $event->organizer_id == $organizer->id ? 'selected' : '' }}>
                                                            {{ $organizer->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <!--end::Input group-->

                                            <!--begin::Input group-->
                                            <div class="fv-row w-100 flex-md-root ">
                                                <!--begin::Label-->
                                                <label class=" form-label mb-6">Email</label>
                                                <!--end::Label-->
                                                <input type="text" class="form-control " value="{{ $event->email }}"
                                                    name="email" id="email">
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
                                                <select class="form-select form-select-solid" name="language_id"
                                                    data-control="select2" data-placeholder="Select an option">
                                                    <option value=""></option>
                                                    @foreach ($languages as $language)
                                                        <option value="{{ $language->id }}"
                                                            {{ $event->language_id == $language->id ? 'selected' : '' }}>
                                                            {{ $language->language }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="fv-row w-100 flex-md-root ">
                                                <!--begin::Label-->
                                                <label class=" form-label mb-6">Rank</label>
                                                <!--end::Label-->
                                                <input type="text" class="form-control "
                                                    value="{{ $event->ranking }}" name="ranking" id="">
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
                                                <select class="form-select form-select-solid" id="medicines"
                                                    name="medicines[]" data-control="select2"
                                                    data-placeholder="Select an option" data-allow-clear="true"
                                                    multiple="multiple">
                                                    <option></option>
                                                    @foreach ($medicines as $field)
                                                        <option value="{{ $field->id }}"
                                                            @foreach ($eventMedicines as $sublist) {{ $sublist->pivot->medicine_field_id == $field->id ? 'selected' : '' }} @endforeach>
                                                            {{ $field->field_enname }}
                                                        </option>
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
                                                <select class="form-select form-select-solid" id="selectSpicial"
                                                    name="spicial[]" data-control="select2"
                                                    data-placeholder="Select an option" data-allow-clear="true"
                                                    multiple="multiple">
                                                    <option></option>
                                                    @foreach ($specialzations as $field)
                                                        <option value="{{ $field->id }}"
                                                            @foreach ($eventSpecialzation as $sublist) {{ $sublist->specialize_id == $field->id ? 'selected' : '' }} @endforeach>
                                                            {{ $field->specialize_name }}
                                                        </option>
                                                    @endforeach


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
                                            <select class="form-select form-select-solid" name="event_type_id"
                                                data-control="select2" data-placeholder="Select an option"
                                                data-allow-clear="true">
                                                <option></option>
                                                @foreach ($eventTypes as $eventType)
                                                    <option value="{{ $eventType->id }}"
                                                        {{ $event->event_type_id == $eventType->id ? 'selected' : '' }}>
                                                        {{ $eventType->event_enname }}
                                                    </option>
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
                                                placeholder="Type Event Overview">{{ $event->event_overview }}</textarea>
                                            <!--end::Editor-->

                                        </div>
                                        <!--end::Input group-->





                                        <!--begin::checkbox-->

                                        <div class="d-flex flex-wrap gap-5 mt-4">
                                            <!--begin::Input group-->
                                            <div class="fv-row w-100 flex-md-root">
                                                <div class="form-check form-switch form-check-custom form-check-solid">
                                                    <input class="form-check-input" type="checkbox" name="featured[]"
                                                        value="" {{ $event->featured == 1 ? ' checked' : '' }}
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
                                                    <input class="form-check-input" type="checkbox" name="premium[]"
                                                        value="" {{ $event->premium == 1 ? ' checked' : '' }}
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
                                                                <option value="{{ $city->id }}"
                                                                    {{ $event->city_id == $city->id ? 'selected' : '' }}>
                                                                    {{ $city->name }}</option>
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
                                                            placeholder="Event Area" value="{{ $event->area }}" />

                                                        <!--end::Input group-->
                                                    </div>



                                                    <!--end::Editor-->


                                                    <!--end::Input group-->
                                                </div>
                                                <!--end::Card header-->
                                                <!--end::Row-->

                                                <!--end::Card header-->


                                                <!--end::Card header-->
                                                <!--begin::Input group-->
                                                <div class="mb-10 fv-row">
                                                    <!--begin::Label-->
                                                    <label class="required form-label">Address Details</label>
                                                    <!--end::Label-->
                                                    <!--begin::Input-->
                                                    <input type="text" name="details_address"
                                                        class="form-control mb-2" placeholder="Event Address"
                                                        value="{{ $event->details_address }}" />


                                                </div>
                                                <!--end::Input-->

                                                <!--end::Social options-->
                                                <!--end::Input group-->
                                                <div class="d-flex flex-wrap gap-5">

                                                    <!--begin::Input group-->
                                                    <div class="fv-row w-100 flex-md-root">
                                                        <!--begin::Label-->
                                                        <label class="fs-6 fw-bold form-label mt-3">
                                                            <span class="required">Add Tags</span>
                                                            <i class="fas fa-exclamation-circle ms-1 fs-7"
                                                                data-bs-toggle="tooltip"
                                                                title="Interviewer who conducts the meeting with the interviewee"></i>
                                                        </label>
                                                        <!--end::Label-->
                                                        <select class="form-select form-select-solid" name="tags[]"
                                                            data-control="select2" data-placeholder="Select an option"
                                                            data-allow-clear="true" multiple="multiple">
                                                            <option></option>
                                                            @foreach ($tags as $tag)
                                                                <option value="{{ $tag->id }}"
                                                                    @foreach ($eventTags as $sublist) {{ $sublist->pivot->tag_id == $tag->id ? 'selected' : '' }} @endforeach>
                                                                    {{ $tag->tag }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <!--end::Input group-->
                                            </div>
                                            <!--end::General options-->


                                        </div>
                                    </div>
                                </div>
                                <!--end::Tab content-->
                                <!--end::Tab content-->
                                <div class="d-flex justify-content-end">
                                    <!--begin::Button-->
                                    <a href="{{ route('events.index') }}" id="kt_ecommerce_add_product_cancel"
                                        class="btn btn-light me-5">Cancel</a>
                                    <!--end::Button-->
                                    <!--begin::Button-->
                                    <button type="submit" id="kt_ecommerce_add_product_submit" class="btn btn-primary">
                                        <span class="indicator-label">Save Changes</span>
                                        <span class="indicator-progress">Please wait...
                                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                    </button>
                                    <!--end::Button-->
                                </div>
                        </div>

                    </div>

                    <!--end::Tab pane-->
                    <!--begin::Tab pane-->
                    <div class="tab-pane fade" id="kt_ecommerce_add_product_advanced" role="tab-panel">
                        <div class="d-flex flex-column gap-7 gap-lg-10">
                            <form id="kt_ecommerce_add_category_form" action="{{ route('events.update', $event->id) }}"
                                method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <!--begin::Variations-->
                                <div class="card card-flush py-4">
                                    <!--begin::Card header-->
                                    <div class="card-header">
                                        <div class="card-title">
                                            <h2>Specialization</h2>
                                        </div>
                                    </div>
                                    <!--end::Card header-->
                                    <!--begin::Card body-->
                                    <div class="card-body pt-0">
                                        <!--begin::Input group-->
                                        <div class="" data-kt-ecommerce-catalog-add-product="auto-options">
                                            <!--begin::Label-->
                                            <label class="form-label">Add Specialization</label>
                                            <!--end::Label-->


                                            <!--begin::Repeater-->
                                            <div id="kt_ecommerce_add_product_options">


                                                <!--begin::Form group-->
                                                <div class="form-group">
                                                    <div data-repeater-list="kt_ecommerce_add_product_options"
                                                        class="d-flex flex-column gap-3">
                                                        @if ($eventSpecialzation->count() > 0)
                                                            @foreach ($eventSpecialzation as $index => $specialList)
                                                                <div data-repeater-item=""
                                                                    class="form-group d-flex flex-wrap gap-5">
                                                                    <!--begin::Select2-->
                                                                    <div class="w-100 w-md-200px">
                                                                        <select class="form-select" name="specialize_id"
                                                                            data-placeholder="Select a variation"
                                                                            data-kt-ecommerce-catalog-add-product="product_option">
                                                                            <option></option>
                                                                            @foreach ($specialzations as $specialzation)
                                                                                <option value="{{ $specialzation->id }}"
                                                                                    {{ $specialList->specialize_id == $specialzation->id ? 'selected' : '' }}>
                                                                                    {{ $specialzation->specialize_name }}
                                                                                </option>
                                                                            @endforeach

                                                                        </select>
                                                                    </div>
                                                                    <!--end::Select2-->

                                                                    <button type="button" data-repeater-delete=""
                                                                        class="btn btn-sm btn-icon btn-light-danger">
                                                                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr088.svg-->
                                                                        <span class="svg-icon svg-icon-2">
                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                width="24" height="24"
                                                                                viewBox="0 0 24 24" fill="none">
                                                                                <rect opacity="0.5" x="7.05025"
                                                                                    y="15.5356" width="12"
                                                                                    height="2" rx="1"
                                                                                    transform="rotate(-45 7.05025 15.5356)"
                                                                                    fill="black" />
                                                                                <rect x="8.46447" y="7.05029"
                                                                                    width="12" height="2"
                                                                                    rx="1"
                                                                                    transform="rotate(45 8.46447 7.05029)"
                                                                                    fill="black" />
                                                                            </svg>
                                                                        </span>
                                                                        <!--end::Svg Icon-->
                                                                    </button>
                                                                </div>
                                                            @endforeach
                                                        @else
                                                            <div data-repeater-item=""
                                                                class="form-group d-flex flex-wrap gap-5">
                                                                <!--begin::Select2-->
                                                                <div class="w-100 w-md-200px">
                                                                    <select class="form-select" name="specialize_id"
                                                                        data-placeholder="Select a variation"
                                                                        data-kt-ecommerce-catalog-add-product="product_option">
                                                                        <option></option>
                                                                        @foreach ($specialzations as $specialzation)
                                                                            <option value="{{ $specialzation->id }}">
                                                                                {{ $specialzation->specialize_name }}
                                                                            </option>
                                                                        @endforeach

                                                                    </select>
                                                                </div>
                                                                <!--end::Select2-->

                                                                <button type="button" data-repeater-delete=""
                                                                    class="btn btn-sm btn-icon btn-light-danger">
                                                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr088.svg-->
                                                                    <span class="svg-icon svg-icon-2">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            width="24" height="24"
                                                                            viewBox="0 0 24 24" fill="none">
                                                                            <rect opacity="0.5" x="7.05025"
                                                                                y="15.5356" width="12"
                                                                                height="2" rx="1"
                                                                                transform="rotate(-45 7.05025 15.5356)"
                                                                                fill="black" />
                                                                            <rect x="8.46447" y="7.05029"
                                                                                width="12" height="2"
                                                                                rx="1"
                                                                                transform="rotate(45 8.46447 7.05029)"
                                                                                fill="black" />
                                                                        </svg>
                                                                    </span>
                                                                    <!--end::Svg Icon-->
                                                                </button>
                                                            </div>
                                                        @endif

                                                    </div>
                                                </div>

                                                <!--end::Form group-->
                                                <!--begin::Form group-->
                                                <div class="form-group mt-5">
                                                    <button type="button" data-repeater-create=""
                                                        class="btn btn-sm btn-light-primary">
                                                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr087.svg-->
                                                        <span class="svg-icon svg-icon-2">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24" fill="none">
                                                                <rect opacity="0.5" x="11" y="18"
                                                                    width="12" height="2" rx="1"
                                                                    transform="rotate(-90 11 18)" fill="black" />
                                                                <rect x="6" y="11" width="12"
                                                                    height="2" rx="1" fill="black" />
                                                            </svg>
                                                        </span>
                                                        <!--end::Svg Icon-->Add another Specialzation
                                                    </button>
                                                </div>
                                                <!--end::Form group-->
                                            </div>
                                            <!--end::Repeater-->
                                        </div>
                                        <!--end::Input group-->
                                    </div>
                                    <!--end::Card header-->
                                </div>
                                <!--end::Variations-->
                                <!--end::Tab content-->
                                <div class="d-flex justify-content-end">
                                    <!--begin::Button-->
                                    <a href="{{ route('events.index') }}" id="kt_ecommerce_add_product_cancel"
                                        class="btn btn-light me-5">Cancel</a>
                                    <!--end::Button-->
                                    <!--begin::Button-->
                                    <button type="submit" id="kt_ecommerce_add_product_submit" class="btn btn-primary">
                                        <span class="indicator-label">Save Changes</span>
                                        <span class="indicator-progress">Please wait...
                                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                    </button>
                                    <!--end::Button-->
                                </div>
                            </form>
                        </div>
                    </div>
                    <!--end::Tab pane-->





                    <!--begin::Tab pane-->
                    <div class="tab-pane fade" id="kt_ecommerce_add_days_advanced" role="tab-panel">
                        <div class="d-flex flex-column gap-7 gap-lg-10">
                            <form id="kt_ecommerce_add_category_form" action="{{ route('events.update', $event->id) }}"
                                method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <!--begin::Variations-->
                                <div class="card card-flush py-4">
                                    <!--begin::Card header-->
                                    <div class="card-header">
                                        <div class="card-title">
                                            <h2>Days</h2>
                                        </div>
                                    </div>
                                    <!--end::Card header-->
                                    <!--begin::Card body-->
                                    <div class="card-body pt-0">
                                        <!--begin::Input group-->
                                        <div class="">
                                            <!--begin::Label-->
                                            <label class="form-label">Add Day</label>
                                            <!--end::Label-->


                                            <!--begin::Repeater-->
                                            <div id="kt_docs_repeater_basic">


                                                <!--begin::Form group-->
                                                <div class="form-group">
                                                    <div data-repeater-list="kt_docs_repeater_basic"
                                                        class="d-flex flex-column gap-3">
                                                        @if ($eventDays->count() > 0)
                                                            @foreach ($eventDays as $index => $eventDay)
                                                                <div data-repeater-item>
                                                                    <div class="form-group row">
                                                                        <div class="col-md-3">
                                                                            <label class="form-label">Date
                                                                                From:</label>
                                                                            <input
                                                                                class="form-control  form-control-solid dPick"
                                                                                name="event_date_from"
                                                                                value="{{ $eventDay->event_date_from }}"
                                                                                placeholder="Pick date"
                                                                                id="kt_datepicker_3" />
                                                                        </div>
                                                                        <div class="col-md-3">
                                                                            <label class="form-label">Time
                                                                                From:</label>
                                                                            <input
                                                                                class="form-control  form-control-solid tPick"
                                                                                name="event_time_from"
                                                                                value="{{ $eventDay->event_time_from }}"
                                                                                placeholder="Pick date"
                                                                                id="kt_datepicker_3" />
                                                                        </div>
                                                                        <div class="col-md-3">
                                                                            <label class="form-label">Date To:</label>
                                                                            <input
                                                                                class="form-control form-control-solid dPick"
                                                                                name="event_date_to"
                                                                                value="{{ $eventDay->event_date_to }}"
                                                                                placeholder="Pick date"
                                                                                id="kt_datepicker_4" />
                                                                        </div>
                                                                        <div class="col-md-3">
                                                                            <label class="form-label">Time To:</label>
                                                                            <input
                                                                                class="form-control  form-control-solid tPick"
                                                                                name="event_time_to"
                                                                                value="{{ $eventDay->event_time_to }}"
                                                                                placeholder="Pick date"
                                                                                id="kt_datepicker_3" />
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            <a href="javascript:;" data-repeater-delete
                                                                                class="btn btn-sm btn-light-danger mt-3 mt-md-8">
                                                                                <i class="la la-trash-o"></i>Delete
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        @else
                                                            <div data-repeater-item>
                                                                <div class="form-group row">
                                                                    <div class="col-md-3">
                                                                        <label class="form-label">Date From:</label>
                                                                        <input
                                                                            class="form-control  form-control-solid dPick"
                                                                            name="event_date_from" placeholder="Pick date"
                                                                            id="kt_datepicker_3" />
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <label class="form-label">Time From:</label>
                                                                        <input
                                                                            class="form-control  form-control-solid tPick"
                                                                            name="event_time_from" placeholder="Pick date"
                                                                            id="kt_datepicker_3" />
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <label class="form-label">Date To:</label>
                                                                        <input
                                                                            class="form-control form-control-solid dPick"
                                                                            name="event_date_to" placeholder="Pick date"
                                                                            id="kt_datepicker_4" />
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <label class="form-label">Time To:</label>
                                                                        <input
                                                                            class="form-control  form-control-solid tPick"
                                                                            name="event_time_to" placeholder="Pick date"
                                                                            id="kt_datepicker_3" />
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <a href="javascript:;" data-repeater-delete
                                                                            class="btn btn-sm btn-light-danger mt-3 mt-md-8">
                                                                            <i class="la la-trash-o"></i>Delete
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endif

                                                    </div>
                                                </div>

                                                <!--end::Form group-->
                                                <!--begin::Form group-->
                                                <div class="form-group mt-5">
                                                    <button type="button" data-repeater-create=""
                                                        class="btn btn-sm btn-light-primary">
                                                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr087.svg-->
                                                        <span class="svg-icon svg-icon-2">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24" fill="none">
                                                                <rect opacity="0.5" x="11" y="18"
                                                                    width="12" height="2" rx="1"
                                                                    transform="rotate(-90 11 18)" fill="black" />
                                                                <rect x="6" y="11" width="12"
                                                                    height="2" rx="1" fill="black" />
                                                            </svg>
                                                        </span>
                                                        <!--end::Svg Icon-->Add another Day
                                                    </button>
                                                </div>
                                                <!--end::Form group-->
                                            </div>
                                            <!--end::Repeater-->
                                        </div>
                                        <!--end::Input group-->
                                    </div>
                                    <!--end::Card header-->
                                </div>
                                <!--end::Variations-->
                                <!--end::Tab content-->
                                <div class="d-flex justify-content-end">
                                    <!--begin::Button-->
                                    <a href="{{ route('events.index') }}" id="kt_ecommerce_add_product_cancel"
                                        class="btn btn-light me-5">Cancel</a>
                                    <!--end::Button-->
                                    <!--begin::Button-->
                                    <button type="submit" id="kt_ecommerce_add_product_submit" class="btn btn-primary">
                                        <span class="indicator-label">Save Changes</span>
                                        <span class="indicator-progress">Please wait...
                                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                    </button>
                                    <!--end::Button-->
                                </div>
                            </form>
                        </div>
                    </div>
                    <!--end::Tab pane-->


                    <!--begin::Tab pane-->
                    <div class="tab-pane fade" id="kt_ecommerce_add_instructor_advanced" role="tab-panel">
                        <div class="d-flex flex-column gap-7 gap-lg-10">
                            <form id="kt_ecommerce_add_category_form" action="{{ route('events.update', $event->id) }}"
                                method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <!--begin::Variations-->
                                <div class="card card-flush py-4">
                                    <!--begin::Card header-->
                                    <div class="card-header">
                                        <div class="card-title">
                                            <h2>Instructors</h2>
                                        </div>
                                    </div>
                                    <!--end::Card header-->
                                    <!--begin::Card body-->
                                    <div class="card-body pt-0">
                                        <!--begin::Input group-->
                                        <div class="">
                                            <!--begin::Label-->
                                            <label class="form-label">Add Instructor</label>
                                            <!--end::Label-->


                                            <!--begin::Repeater-->
                                            <div id="kt_docs_repeater_basic_instructor">


                                                <!--begin::Form group-->
                                                <div class="form-group">
                                                    <div data-repeater-list="kt_docs_repeater_basic_instructor"
                                                        class="d-flex flex-column gap-3">
                                                        @if ($eventInstructors->count() > 0)
                                                            @foreach ($eventInstructors as $index => $eventInstructor)
                                                                <div data-repeater-item>
                                                                    <!--begin::Accordion-->
                                                                    <div class="accordion" id="kt_accordion_1">
                                                                        <div class="accordion-item">
                                                                            <h2 class="accordion-header"
                                                                                id="kt_accordion_1_header_1">
                                                                                <button
                                                                                    class="accordion-button fs-4 fw-bold"
                                                                                    type="button"
                                                                                    data-bs-toggle="collapse"
                                                                                    data-bs-target="#kt_accordion_1_body_1"
                                                                                    aria-expanded="true"
                                                                                    aria-controls="kt_accordion_1_body_1">
                                                                                    Instructor
                                                                                    {{ $eventInstructor->name }}
                                                                                </button>
                                                                            </h2>
                                                                            <div id="kt_accordion_1_body_1"
                                                                                class="accordion-collapse collapse show"
                                                                                aria-labelledby="kt_accordion_1_header_1"
                                                                                data-bs-parent="#kt_accordion_1">
                                                                                <div class="accordion-body">
                                                                                    <div class="form-group row">
                                                                                        {{-- new --}}
                                                                                        <div class="col-md-6">
                                                                                            <!--begin::Thumbnail settings-->
                                                                                            <div
                                                                                                class="card card-flush py-4">
                                                                                                <!--begin::Card header-->
                                                                                                <div class="card-header">
                                                                                                    <!--begin::Card title-->
                                                                                                    <div
                                                                                                        class="card-title">
                                                                                                        <h2> Edit Image
                                                                                                        </h2>
                                                                                                    </div>
                                                                                                    <!--end::Card title-->
                                                                                                </div>
                                                                                                <!--end::Card header-->
                                                                                                <!--begin::Image input wrapper-->
                                                                                                <div
                                                                                                    class="card-body text-center pt-0">
                                                                                                    <!--begin::Image input-->
                                                                                                    <div class="image-input image-input-empty image-input-outline mb-3"
                                                                                                        data-kt-image-input="true"
                                                                                                        style="background-image: url('{{ asset('uploads/event_instructors') }}/{{ $eventInstructor->img }}')">
                                                                                                        <div class="image-input-wrapper w-150px h-150px"
                                                                                                            style="background-image: url('{{ asset('uploads/event_instructors') }}/{{ $eventInstructor->img }}')">

                                                                                                        </div>
                                                                                                        <!--end::Preview existing avatar-->
                                                                                                        <!--begin::Edit-->
                                                                                                        <label
                                                                                                            class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                                                                            data-kt-image-input-action="change"
                                                                                                            data-bs-toggle="tooltip"
                                                                                                            title="Change avatar">
                                                                                                            <i
                                                                                                                class="bi bi-pencil-fill fs-7"></i>
                                                                                                            <!--begin::Inputs-->
                                                                                                            <input
                                                                                                                type="file"
                                                                                                                name="img"
                                                                                                                value=" "
                                                                                                                accept=".png, .jpg, .jpeg" />
                                                                                                            <input
                                                                                                                type="hidden"
                                                                                                                name="avatar_remove" />
                                                                                                            <!--end::Inputs-->
                                                                                                        </label>
                                                                                                        <!--end::Edit-->

                                                                                                    </div>
                                                                                                    <!--end::Image input-->
                                                                                                </div>
                                                                                                <!--end::Image input wrapper-->
                                                                                            </div>
                                                                                            <!--end::Thumbnail settings-->
                                                                                        </div>
                                                                                        {{-- end new --}}
                                                                                        <div class="col-md-6">

                                                                                        </div>
                                                                                        <div class="col-md-6">
                                                                                            <label class="form-label">
                                                                                                Name:</label>
                                                                                            <input type="text"
                                                                                                class="form-control  form-control-solid "
                                                                                                name="name"
                                                                                                value="{{ $eventInstructor->name }}"
                                                                                                placeholder="name" />
                                                                                        </div>

                                                                                        <div class="col-md-12">
                                                                                            <label
                                                                                                class="form-label">bio:</label>
                                                                                            <textarea name="bio" class="form-control  form-control-solid" id="" cols="30" rows="10">{{ $eventInstructor->bio }}</textarea>
                                                                                        </div>
                                                                                        {{-- <div class="col-md-6">
                                                                                        <div class="fv-row w-100 flex-md-root">
                                                                                            <div
                                                                                                class="form-check form-switch form-check-custom form-check-solid">
                                                                                                <input class="form-check-input"
                                                                                                    type="checkbox" name="active"
                                                                                                    value="1" {{ $eventInstructor->active == 1 ? ' checked' : '' }}
                                                                                                    id="flexSwitchDefault" />
                                                                                                <label class="form-check-label"
                                                                                                    for="flexSwitchDefault">
                                                                                                    Active
                                                                                                </label>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div> --}}
                                                                                        <div class="col-md-4">
                                                                                            <a href="javascript:;"
                                                                                                data-repeater-delete
                                                                                                class="btn btn-sm btn-light-danger mt-3 mt-md-8">
                                                                                                <i
                                                                                                    class="la la-trash-o"></i>Delete
                                                                                            </a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            @endforeach
                                                        @else
                                                            <div data-repeater-item>
                                                                <!--begin::Accordion-->
                                                                <div class="accordion" id="kt_accordion_1">
                                                                    <div class="accordion-item">
                                                                        <h2 class="accordion-header"
                                                                            id="kt_accordion_1_header_1">
                                                                            <button class="accordion-button fs-4 fw-bold"
                                                                                type="button" data-bs-toggle="collapse"
                                                                                data-bs-target="#kt_accordion_1_body_1"
                                                                                aria-expanded="true"
                                                                                aria-controls="kt_accordion_1_body_1">
                                                                                New Instructor
                                                                            </button>
                                                                        </h2>
                                                                        <div id="kt_accordion_1_body_1"
                                                                            class="accordion-collapse collapse show"
                                                                            aria-labelledby="kt_accordion_1_header_1"
                                                                            data-bs-parent="#kt_accordion_1">
                                                                            <div class="accordion-body">
                                                                                <div class="form-group row">
                                                                                    {{-- new --}}
                                                                                    <div class="col-md-6">
                                                                                        <!--begin::Thumbnail settings-->
                                                                                        <div class="card card-flush py-4">
                                                                                            <!--begin::Card header-->
                                                                                            <div class="card-header">
                                                                                                <!--begin::Card title-->
                                                                                                <div class="card-title">
                                                                                                    <h2> Edit Image</h2>
                                                                                                </div>
                                                                                                <!--end::Card title-->
                                                                                            </div>
                                                                                            <!--end::Card header-->
                                                                                            <!--begin::Image input wrapper-->
                                                                                            <div
                                                                                                class="card-body text-center pt-0">
                                                                                                <!--begin::Image input-->
                                                                                                <div class="image-input image-input-empty image-input-outline mb-3"
                                                                                                    data-kt-image-input="true">
                                                                                                    <div
                                                                                                        class="image-input-wrapper w-150px h-150px">

                                                                                                    </div>
                                                                                                    <!--end::Preview existing avatar-->
                                                                                                    <!--begin::Edit-->
                                                                                                    <label
                                                                                                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                                                                        data-kt-image-input-action="change"
                                                                                                        data-bs-toggle="tooltip"
                                                                                                        title="Change avatar">
                                                                                                        <i
                                                                                                            class="bi bi-pencil-fill fs-7"></i>
                                                                                                        <!--begin::Inputs-->
                                                                                                        <input
                                                                                                            type="file"
                                                                                                            name="img"
                                                                                                            accept=".png, .jpg, .jpeg" />
                                                                                                        <input
                                                                                                            type="hidden"
                                                                                                            name="avatar_remove" />
                                                                                                        <!--end::Inputs-->
                                                                                                    </label>
                                                                                                    <!--end::Edit-->

                                                                                                </div>
                                                                                                <!--end::Image input-->
                                                                                            </div>
                                                                                            <!--end::Image input wrapper-->
                                                                                        </div>
                                                                                        <!--end::Thumbnail settings-->
                                                                                    </div>
                                                                                    {{-- end new --}}
                                                                                    <div class="col-md-6">

                                                                                    </div>
                                                                                    <div class="col-md-6">
                                                                                        <label class="form-label">
                                                                                            Name:</label>
                                                                                        <input type="text"
                                                                                            class="form-control  form-control-solid "
                                                                                            name="name" value=""
                                                                                            placeholder="name" />
                                                                                    </div>
                                                                                    <div class="col-md-6">
                                                                                        <label class="form-label">
                                                                                            image:</label>
                                                                                        <input type="file"
                                                                                            class="form-control  form-control-solid "
                                                                                            name="img" value=""
                                                                                            placeholder="Pick date" />
                                                                                    </div>
                                                                                    <div class="col-md-12">
                                                                                        <label
                                                                                            class="form-label">bio:</label>
                                                                                        <textarea name="bio" class="form-control  form-control-solid" id="" cols="30" rows="10"></textarea>
                                                                                    </div>
                                                                                    {{-- <div class="col-md-6">
                                                                                        <div class="fv-row w-100 flex-md-root">
                                                                                            <div
                                                                                                class="form-check form-switch form-check-custom form-check-solid">
                                                                                                <input class="form-check-input"
                                                                                                    type="checkbox" name="active[]"
                                                                                                    value=""
                                                                                                    id="flexSwitchDefault" />
                                                                                                <label class="form-check-label"
                                                                                                    for="flexSwitchDefault">
                                                                                                    Active
                                                                                                </label>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div> --}}
                                                                                    <div class="col-md-4">
                                                                                        <a href="javascript:;"
                                                                                            data-repeater-delete
                                                                                            class="btn btn-sm btn-light-danger mt-3 mt-md-8">
                                                                                            <i
                                                                                                class="la la-trash-o"></i>Delete
                                                                                        </a>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        @endif

                                                    </div>
                                                </div>

                                                <!--end::Form group-->
                                                <!--begin::Form group-->
                                                <div class="form-group mt-5">
                                                    <button type="button" data-repeater-create=""
                                                        class="btn btn-sm btn-light-primary">
                                                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr087.svg-->
                                                        <span class="svg-icon svg-icon-2">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24" fill="none">
                                                                <rect opacity="0.5" x="11" y="18"
                                                                    width="12" height="2" rx="1"
                                                                    transform="rotate(-90 11 18)" fill="black" />
                                                                <rect x="6" y="11" width="12"
                                                                    height="2" rx="1" fill="black" />
                                                            </svg>
                                                        </span>
                                                        <!--end::Svg Icon-->Add another Instructor
                                                    </button>
                                                </div>
                                                <!--end::Form group-->
                                            </div>
                                            <!--end::Repeater-->
                                        </div>
                                        <!--end::Input group-->
                                    </div>
                                    <!--end::Card header-->
                                </div>
                                <!--end::Variations-->
                                <!--end::Tab content-->
                                <div class="d-flex justify-content-end">
                                    <!--begin::Button-->
                                    <a href="{{ route('events.index') }}" id="kt_ecommerce_add_product_cancel"
                                        class="btn btn-light me-5">Cancel</a>
                                    <!--end::Button-->
                                    <!--begin::Button-->
                                    <button type="submit" id="kt_ecommerce_add_product_submit" class="btn btn-primary">
                                        <span class="indicator-label">Save Changes</span>
                                        <span class="indicator-progress">Please wait...
                                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                    </button>
                                    <!--end::Button-->
                                </div>
                            </form>
                        </div>
                    </div>
                    <!--end::Tab pane-->

                    <!--begin::Tab pane-->
                    <div class="tab-pane fade" id="kt_ecommerce_add_faq_advanced" role="tab-panel">
                        <div class="d-flex flex-column gap-7 gap-lg-10">

                            <!--begin::Variations-->
                            <div class="card card-flush py-4">
                                <!--begin::Card header-->
                                <div class="card-header">
                                    <div class="card-title">
                                        <h2>FAQS</h2>
                                    </div>
                                </div>
                                <!--end::Card header-->
                                <!--begin::Card body-->
                                <div class="card-body pt-0">
                                    <table id="kt_datatable_example_1" class="table table-row-bordered gy-5">
                                        <thead>
                                            <tr class="fw-bold fs-6 text-muted">
                                                <th>question</th>
                                                <th>answer</th>
                                                <th>doctor</th>
                                                <th>active</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($faqs as $faq)
                                                <tr>
                                                    <td>{{ $faq->question }}</td>
                                                    <td>{{ $faq->answer }}</td>
                                                    <td>{{ $faq->doctor->name ?? '' }}</td>
                                                    <td>
                                                        @if ($faq->active != 1)
                                                            <input type="hidden" name="event_id" id=""
                                                                value="{{ $faq->event_id }}">
                                                            <input type="hidden" value="{{ $faq->event_id }}"
                                                                name="activeFaq">

                                                            <a onclick="$(this).closest('form').submit()">
                                                                <span class="svg-icon svg-icon-3">
                                                                    <i class="fas fa-check-circle text-success"></i>

                                                                </span></a>
                                                        @endif
                                                        @if ($faq->active == 1)
                                                            <input type="hidden" name="event_id" id=""
                                                                value="{{ $faq->event_id }}">
                                                            <input type="hidden" value="{{ $faq->event_id }}"
                                                                name="deActiveFaq">
                                                            <a onclick="$(this).closest('form').submit()">
                                                                <span class="svg-icon svg-icon-3">
                                                                    <i class="fa fa-ban text-danger"></i>

                                                                </span></a>
                                                        @endif
                                                    </td>

                                                </tr>
                                            @endforeach


                                        </tbody>

                                    </table>
                                </div>
                                <!--end::Card header-->
                            </div>
                            <!--end::Variations-->

                        </div>
                    </div>
                    <!--end::Tab pane-->
                    <!--begin::Tab pane-->
                    <div class="tab-pane fade" id="kt_ecommerce_add_content_advanced" role="tab-panel">
                        <div class="d-flex flex-column gap-7 gap-lg-10">

                            <!--begin::Variations-->

                            <div class="card card-flush py-4">

                            @include('admin.events.viewAudianceTable')
                            </div>

                            <!--begin::Card body-->

                            <!--end::Card header-->

                            <!--end::Variations-->

                        </div>
                    </div>
                    <!--end::Tab pane-->

                    <!--begin::Tab pane-->
                    <div class="tab-pane fade" id="kt_ecommerce_add_ticket_advanced" role="tab-panel">
                        <div class="d-flex flex-column gap-7 gap-lg-10">

                            <div class="card card-flush py-4">

                                @include('admin.events.viewTicketTable')
                                </div>

                        </div>
                    </div>
                    <!--end::Tab pane-->

                     <!--begin::Tab pane-->
                     <div class="tab-pane fade" id="kt_ecommerce_add_copoun_advanced" role="tab-panel">
                        <div class="d-flex flex-column gap-7 gap-lg-10">

                            <div class="card card-flush py-4">

                                @include('admin.events.viewCopounTable')
                                </div>

                        </div>
                    </div>
                    <!--end::Tab pane-->
                     <!--begin::Tab pane-->
                     <div class="tab-pane fade" id="kt_ecommerce_add_discount_advanced" role="tab-panel">
                        <div class="d-flex flex-column gap-7 gap-lg-10">

                            <div class="card card-flush py-4">

                                @include('admin.events.viewDiscountTable')
                                </div>

                        </div>
                    </div>
                    <!--end::Tab pane-->

            </div>
            <!--end::Main column-->
            {{-- / </form> --}}
        </div>
        <!--end::Container-->
    </div>
    <!--end::Post-->
@endsection
@section('scripts')
    <script>
        $(".dPick").flatpickr();
        $(".tPick").flatpickr({
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
                $("#selectSpicial").html('');
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
