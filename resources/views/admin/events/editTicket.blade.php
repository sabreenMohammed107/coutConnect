@extends('layout.main')

@section('breadcrumb')
    <div class="toolbar" id="kt_toolbar">
        <div class="container-fluid d-flex flex-stack flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex flex-column align-items-start justify-content-center flex-wrap me-2">
                <!--begin::Title-->
                <h1 class="text-dark fw-bolder my-1 fs-2">Edit Ticket</h1>
                <!--end::Title-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb fw-bold fs-base my-1">
                    <li class="breadcrumb-item text-muted">
                        <a href="../dist/index.html" class="text-muted text-hover-primary">Home</a>
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
                action="{{ route('updateTicket') }}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="ticket_id" value="{{ $ticket_id }}">
                <input type="hidden" name="event_id" value="{{ $ticket->event_id }}">
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
                                         value="{{$ticket->name}}" autocomplete="name" autofocus>
                                    <!--end::Input-->
                                    {{-- @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror --}}
                                </div>
                                <!--begin::Tax-->


                                <!--begin::Input group-->
                                <div class="fv-row w-100 flex-md-root">
                                    <!--begin::Label-->
                                    <label class="required form-label">Price</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="website" id="email" value="{{$ticket->price}}" name="price"
                                        class="form-control mb-2 @error('price') is-invalid @enderror"
                                        autocomplete="price" autofocus>
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

                            <div class="d-flex flex-wrap gap-5">
                                <div class="fv-row w-100 flex-md-root">
                                    <!--begin::Label-->
                                    <label class="required form-label"> Currency</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <select class="form-select form-select-solid" name="currency_id" data-control="select2"
                                        data-placeholder="Select an option">
                                        <option></option>
                                        @foreach ($currencies as $currency)
                                            <option value="{{ $currency->id }}" {{ $ticket->currency_id == $currency->id ? 'selected' : '' }} 00000000000000000000000>{{ $currency->currency }}</option>
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


                                <!--begin::Input group-->
                                <div class="fv-row w-100 flex-md-root">
                                    <!--begin::Label-->
                                    <label class="required form-label">Quantity</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="number" value="{{$ticket->quantity}}" id="email" name="quantity"
                                        class="form-control mb-2 @error('quantity') is-invalid @enderror"
                                        autocomplete="quantity" autofocus>
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

                            <div class="d-flex flex-wrap gap-5">
                                <div class="fv-row w-100 flex-md-root">
                                    <!--begin::Label-->
                                    <label class="required form-label">description</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <textarea name="description" class="form-control mb-2 @error('description') is-invalid @enderror" id="" cols="30" rows="10">{{$ticket->description}}</textarea>


                            <!--end::Card header-->

                            <!--end::Social options-->
                        </div>
                            </div>


                        <div class="d-flex flex-wrap gap-5">
                            <div class="fv-row w-100 flex-md-root">
                        <label class="form-label">Date
                            From:</label>
                        <input
                            class="form-control  form-control-solid dPick"
                            name="start_date"
                            value="{{$ticket->start_date}}"
                            placeholder="Pick date"
                            id="kt_datepicker_3" />
                            </div>
                            <div class="fv-row w-100 flex-md-root">
                                <label class="form-label">Date
                                    To:</label>
                                <input
                                class="form-control  form-control-solid dPick"
                                name="end_date"
                                value="{{$ticket->end_date}}"
                                placeholder="Pick date"
                                id="kt_datepicker_4" />
                            </div>
                        </div>
                    </div>
                        <div class="d-flex justify-content-end">
                            <!--begin::Button-->
                            <a href="{{ route('events.edit', $ticket->event_id) }}"
                                id="kt_ecommerce_add_product_cancel" class="btn btn-light me-5">Cancel</a>
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

