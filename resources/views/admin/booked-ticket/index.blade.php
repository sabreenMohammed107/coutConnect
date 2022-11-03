@extends('layout.main')

@section('breadcrumb')
    <div class="toolbar" id="kt_toolbar">
        <div class="container-fluid d-flex flex-stack flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex flex-column align-items-start justify-content-center flex-wrap me-2">
                <!--begin::Title-->
                <h1 class="text-dark fw-bolder my-1 fs-2">booked-ticket</h1>
                <!--end::Title-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb fw-bold fs-base my-1">
                    <li class="breadcrumb-item text-muted">
                        <a href="../dist/index.html" class="text-muted text-hover-primary">Home</a>
                    </li>
                    <li class="breadcrumb-item text-muted">booked-ticket</li>

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
            <div class="card card-flush">

                <form id="search-form" class="form d-flex flex-column flex-lg-row">

                    <div class="card-body pt-0">
                        <div class="d-flex flex-wrap gap-5">
                            <!--begin::Input group-->
                            <div class="fv-row w-100 flex-md-root">
                                <!--begin::Label-->
                                <label class="fs-6 fw-bold form-label mt-3"> Name Or Phone</label>
                                <!--end::Label-->

                                <input type="text" id="name" name="name" class="form-control "
                                    placeholder="name or phone" value="" />
                            </div>
                            <div class="fv-row w-100 flex-md-root">
                                <!--begin::Label-->
                                <label class="fs-6 fw-bold form-label mt-3">
                                    <option value=""> Payment </option>
                                    {{-- <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Interviewer who conducts the meeting with the interviewee"></i> --}}
                                </label>
                                <!--end::Label-->
                                <select class="form-select form-select-solid" id="payment_id" name="payment_id"
                                    data-control="select2" data-placeholder="Select an option">
                                    <option value=""></option>
                                    @foreach ($payments as $obj)
                                        <option value="{{ $obj->id }}">{{ $obj->payment_method }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="fv-row w-100 flex-md-root">
                                <!--begin::Label-->
                                <label class="fs-6 fw-bold form-label mt-3">
                                    <option value=""> Bussiness pages </option>
                                    {{-- <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Interviewer who conducts the meeting with the interviewee"></i> --}}
                                </label>
                                <!--end::Label-->
                                <select class="form-select form-select-solid" id="doctor_id" name="doctor_id"
                                    data-control="select2" data-placeholder="Select an option">
                                    <option value=""></option>
                                    @foreach ($pages as $obj)
                                        <option value="{{ $obj->id }}">{{ $obj->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="d-flex flex-wrap gap-5">
                            <!--begin::Input group-->
                            {{-- <div class="fv-row w-100 flex-md-root">
                                <label class="fs-6 fw-bold form-label mt-3">
                                    <option value=""> Status </option>
                                </label>
                                <select class="form-select form-select-solid" id="status_id" name="status_id"
                                    data-control="select2" data-placeholder="Select an option">
                                    <option value=""></option>
                                    @foreach ($status as $obj)
                                        <option value="{{ $obj->id }}">{{ $obj->order_status }}</option>
                                    @endforeach
                                </select>
                            </div> --}}

                            {{-- <div class="fv-row w-100 flex-md-root">
                                <label class="fs-6 fw-bold form-label mt-3">
                                    <option value=""> Currency </option>
                                </label>
                                <select class="form-select form-select-solid" id="currency_id" name="status_id"
                                    data-control="select2" data-placeholder="Select an option">
                                    <option value=""></option>
                                    @foreach ($currencies as $obj)
                                        <option value="{{ $obj->id }}">{{ $obj->currency }}</option>
                                    @endforeach
                                </select>
                            </div> --}}


                            <div class="fv-row w-100 flex-md-root">
                                <!--begin::Label-->
                                <label class="fs-6 fw-bold form-label mt-3">
                                    <option value=""> Events </option>
                                    {{-- <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Interviewer who conducts the meeting with the interviewee"></i> --}}
                                </label>
                                <!--end::Label-->
                                <select class="form-select form-select-solid" id="currency_id" name="status_id"
                                    data-control="select2" data-placeholder="Select an option">
                                    <option value=""></option>
                                    @foreach ($events as $obj)
                                        <option value="{{ $obj->id }}">{{ $obj->name }}</option>
                                    @endforeach
                                </select>
                            </div>






                        </div>
                        <!--second row -->
                        <div class="d-flex flex-wrap gap-5">

                            <!--begin::Input group-->
                            <div class="fv-row w-100 flex-md-root">
                                <!--begin::Label-->
                                <label class="fs-6 fw-bold form-label mt-3">
                                    <option value="">Start Date</option>
                                    {{-- <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Interviewer who conducts the meeting with the interviewee"></i> --}}
                                </label>
                                <!--end::Label-->
                                <input type="date" id="created_start" name="created_start" class="form-control dpick"
                                    placeholder="start date" />
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="fv-row w-100 flex-md-root">
                                <!--begin::Label-->
                                <label class="fs-6 fw-bold form-label mt-3">
                                    <option value="">End Date</option>
                                    {{-- <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Interviewer who conducts the meeting with the interviewee"></i> --}}
                                </label>
                                <!--end::Label-->
                                <input type="date" id="created_end" name="created_end" class="form-control dpick"
                                    placeholder="End date" />
                            </div>
                            <!--end::Input group-->
                            <div class="fv-row w-100 flex-md-root">
                                <div class="fs-6 fw-bold form-label mt-5">
                                    <!--begin::Button-->
                                    <button type="reset" id="kt_ecommerce_add_product_cancel"
                                        class="btn btn-light mt-5">Reset</button>
                                    <!--end::Button-->
                                    <!--begin::Button-->
                                    <button onclick="$('#search-form').submit()" class="btn btn-primary mt-5">
                                        <span class="indicator-label">Filter</span>
                                        <span class="indicator-progress">Please wait...
                                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                    </button>
                                    <!--end::Button-->
                                </div>
                            </div>
                        </div>
                        <!--end second row -->
                    </div>
                </form>
            </div>

            <!--begin::Category-->
            <div id="preIndex" class="card card-flush">
                <!--begin::Card header-->
                @include('admin.orders.preIndex')



            </div>
            <!--end::Category-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Post-->
@endsection
@section('scripts')
<script>
     $('#search-form').on('submit', function(e) {
            name = $('#name').val();
            e.preventDefault();
            $.ajax({
                type: 'GET',
                data: {



                    name: $('#name').val(),
                    status_id: $('#status_id option:selected').val(),
                    doctor_id: $('#doctor_id option:selected').val(),
                    payment_id: $('#payment_id option:selected').val(),
                    created_start: $('#created_start').val(),
                    created_end: $('#created_end').val(),


                },
                url: "{{ route('order-filter') }}",

                success: function(result) {
                    console.log(result)

                    $('#preIndex').html(result);

                    $('#name').val(name);

                    $('#kt_ecommerce_category_table').DataTable({

                        "paging": true,

                    });






                },
                error: function(request, status, error) {
                    console.log("error")



                }
            });
        });
</script>
@endsection
