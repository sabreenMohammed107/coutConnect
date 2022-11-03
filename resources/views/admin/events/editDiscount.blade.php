@extends('layout.main')

@section('breadcrumb')
    <div class="toolbar" id="kt_toolbar">
        <div class="container-fluid d-flex flex-stack flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex flex-column align-items-start justify-content-center flex-wrap me-2">
                <!--begin::Title-->
                <h1 class="text-dark fw-bolder my-1 fs-2">Add Discount</h1>
                <!--end::Title-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb fw-bold fs-base my-1">
                    <li class="breadcrumb-item text-muted">
                        <a href="" class="text-muted text-hover-primary">{{ $evObj->name }}</a>
                    </li>

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
            action="{{ route('updateDiscount') }}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="discount_id" value="{{ $discount->id }}">
                <input type="hidden" name="event_id" value="{{ $event_id }}">
                <!--begin::Aside column-->
                <div class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px mb-7 me-lg-10">
                    <!--begin::Thumbnail settings-->
                    <div class="card card-flush py-4">
                        <!--begin::Card header-->
                        <div class="card-header">
                            <!--begin::Card title-->
                            <div class="card-title">
                                <h2> {{ $evObj->name }}</h2>
                            </div>
                            <!--end::Card title-->
                        </div>
                        <!--end::Card header-->
                        <!--begin::Image input wrapper-->
                        <div class="card-body text-center pt-0">
                            <!--begin::Image input-->
                            <div class="image-input image-input-empty image-input-outline mb-3" data-kt-image-input="true"
                                style="background-image: url('{{ asset('uploads/events') }}/{{ $evObj->cover_photo }}')">
                                <div class="image-input-wrapper w-150px h-150px"
                                    style="background-image: url(' {{ asset('uploads/events') }}/{{ $evObj->cover_photo }}')">

                                </div>
                                <!--end::Preview existing avatar-->
                                <!--begin::Edit-->
                                <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                    data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
                                    <i class="bi bi-pencil-fill fs-7"></i>
                                    <!--begin::Inputs-->
                                    <input type="file" name="cover_photo" accept=".png, .jpg, .jpeg" />
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
                            <div class="d-flex flex-wrap gap-5">
                                <div class="fv-row w-100 flex-md-root">
                                    <!--begin::Label-->
                                    <label class="required form-label"> Name</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="text" name="name"
                                        class="form-control mb-2 @error('name') is-invalid @enderror" name="name"
                                        value="{{$discount->name}}" autocomplete="name" autofocus>
                                    <!--end::Input-->
                                    {{-- @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror --}}
                                </div>
                                <!--begin::Tax-->
                            </div>
                            <div class="d-flex flex-wrap gap-5">
                                <div class="fv-row w-100 flex-md-root mt-10">
                                    <!--begin::Radio-->

                                    <!--begin::Input-->
                                    <input class="form-check-input me-3" @if($discount->partner_amount_value) checked @endif name="radio_input" type="radio" value="1"
                                        id="kt_docs_formvalidation_radio_option_1" />
                                    <!--end::Input-->

                                    <!--begin::Label-->
                                    <label class="form-check-label mb-2" for="kt_docs_formvalidation_radio_option_1">
                                        <div class="fw-bolder text-gray-800 mb-2">Amount</div>
                                    </label>
                                    <!--end::Label-->

                                    <!--begin::Input-->
                                    <input class="form-check-input me-3" @if($discount->partner_pct_amount) checked @endif name="radio_input" type="radio" value="2"
                                        id="kt_docs_formvalidation_radio_option_2" />
                                    <!--end::Input-->

                                    <!--begin::Label-->
                                    <label class="form-check-label" for="kt_docs_formvalidation_radio_option_2">
                                        <div class="fw-bolder text-gray-800">Percentage</div>
                                    </label>
                                    <!--end::Label-->

                                    <!--end::Radio-->
                                </div>
                                <!--begin::Input group-->


                                <div class="fv-row w-100 flex-md-root mt-10">
                                    <!--begin::Label-->
                                    {{-- <label class="required form-label">Price</label> --}}
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="number" id="email" name="nValue" @if($discount->partner_pct_amount) value="{{$discount->partner_pct_amount}}"  @else value="{{$discount->partner_amount_value}}" @endif
                                        class="form-control mb-2 @error('nValue') is-invalid @enderror"
                                        autocomplete="nValue" autofocus>
                                    <!--end::Input-->
                                    {{-- @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror --}}
                                    <!--end::Input-->
                                </div>
                            </div>
                            <div class="d-flex flex-wrap gap-5">
                                <div class="fv-row w-100 flex-md-root mt-10">
                                    <!--begin::Radio-->

                                    <!--begin::Input-->
                                    <input class="form-check-input me-3" name="coat_input" @if($discount->coat_amount_value) checked @endif  type="radio" value="1"
                                        id="kt_docs_formvalidation_radio_option_1" />
                                    <!--end::Input-->

                                    <!--begin::Label-->
                                    <label class="form-check-label mb-2" for="kt_docs_formvalidation_radio_option_1">
                                        <div class="fw-bolder text-gray-800 mb-2">Coat Amount</div>
                                    </label>
                                    <!--end::Label-->

                                    <!--begin::Input-->
                                    <input class="form-check-input me-3" @if($discount->coat_pct_amount) checked @endif name="coat_input" type="radio" value="2"
                                        id="kt_docs_formvalidation_radio_option_2" />
                                    <!--end::Input-->

                                    <!--begin::Label-->
                                    <label class="form-check-label" for="kt_docs_formvalidation_radio_option_2">
                                        <div class="fw-bolder text-gray-800">Coat Per</div>
                                    </label>
                                    <!--end::Label-->

                                    <!--end::Radio-->
                                </div>
                                <!--begin::Input group-->


                                <div class="fv-row w-100 flex-md-root mt-10">
                                    <!--begin::Label-->
                                    {{-- <label class="required form-label">Price</label> --}}
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="number" id="email" name="CValue"
                                        class="form-control mb-2 @error('CValue') is-invalid @enderror" @if($discount->coat_pct_amount) value="{{$discount->coat_pct_amount}}"  @else value="{{$discount->coat_amount_value}}" @endif
                                        autocomplete="CValue" autofocus>
                                    <!--end::Input-->
                                    {{-- @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror --}}
                                    <!--end::Input-->
                                </div>
                            </div>
                            <div class="fv-row w-100 flex-md-root">
                                <!--begin::Label-->
                                <label class="required form-label"> Tickets</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <select class="form-select form-select-solid" name="tickets[]" multiple
                                    data-control="select2" data-placeholder="Select an option">
                                    <option></option>
                                    @foreach ($tickets as $ticket)
                                        <option value="{{ $ticket->id }}">{{ $ticket->name }}</option>
                                    @endforeach
                                    @foreach ($tickets as $ticket)
                                    <option value="{{ $ticket->id }}"
                                        @foreach ($discountTickets as $sublist) {{ $sublist->ticket_id == $ticket->id ? 'selected' : '' }} @endforeach>
                                        {{ $ticket->name }}
                                    </option>
                                @endforeach
                                </select>
                                <!--end::Input-->
                                {{-- @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror --}}
                            </div>
                            <!--begin::Tax-->


                         +




                        <div class="d-flex flex-wrap gap-5">
                            <div class="fv-row w-100 flex-md-root">
                                <label class="form-label">Valid
                                    From:</label>
                                <input class="form-control   form-control-solid dPick" name="valid_from"
                                    placeholder="Pick date" value="{{$discount->valid_from}}" id="kt_datepicker_3" />
                            </div>
                            <div class="fv-row w-100 flex-md-root">
                                <label class="form-label">Valid
                                    To:</label>
                                <input class="form-control   form-control-solid dPick" name="valid_to"
                                    placeholder="Pick date" value="{{$discount->valid_to}}" id="kt_datepicker_4" />
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end">
                        <!--begin::Button-->
                        <a href="{{ route('events.edit', $event_id) }}" id="kt_ecommerce_add_product_cancel"
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
        $(".dPick").flatpickr();
    </script>
@endsection
