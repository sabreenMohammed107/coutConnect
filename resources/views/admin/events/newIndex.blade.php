@extends('layout.main')

@section('breadcrumb')
    <div class="toolbar" id="kt_toolbar">
        <div class="container-fluid d-flex flex-stack flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex flex-column align-items-start justify-content-center flex-wrap me-2">
                <!--begin::Title-->
                <h1 class="text-dark fw-bolder my-1 fs-2">Event</h1>
                <!--end::Title-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb fw-bold fs-base my-1">
                    <li class="breadcrumb-item text-muted">
                        <a href="#" class="text-muted text-hover-primary">Home</a>
                    </li>
                    <li class="breadcrumb-item text-muted">Event</li>

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
                                <label class="fs-6 fw-bold form-label mt-3"> Name </label>
                                <!--end::Label-->

                                <input type="text" id="name" name="name" class="form-control "
                                    placeholder="name " value="" />
                            </div>
                            <div class="fv-row w-100 flex-md-root">
                                <!--begin::Label-->
                                <label class="fs-6 fw-bold form-label mt-3">ID </label>
                                <!--end::Label-->

                                <input type="text" id="id" name="id" class="form-control "
                                    placeholder="ID " value="" />
                            </div>
                            <div class="fv-row w-100 flex-md-root">
                                <!--begin::Label-->
                                <label class="fs-6 fw-bold form-label mt-3">Type</label>
                                <!--end::Label-->

                                <select class="form-select form-select-solid" id="event_type_id" name="event_type_id"
                                data-control="select2" data-placeholder="Select an option">
                                <option value=""></option>
                                @foreach ($types as $type)
                                    <option value="{{ $type->id }}">{{ $type->event_enname }}</option>
                                @endforeach
                            </select>
                            </div>
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="d-flex flex-wrap gap-5">
                            <!--begin::Input group-->
                            <div class="fv-row w-100 flex-md-root">
                                <!--begin::Label-->
                                <label class="fs-6 fw-bold form-label mt-3">
                                    <option value=""> Status </option>
                                    {{-- <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Interviewer who conducts the meeting with the interviewee"></i> --}}
                                </label>
                                <!--end::Label-->
                                <select class="form-select form-select-solid" id="status_id" name="status_id"
                                    data-control="select2" data-placeholder="Select an option">
                                    <option value=""></option>
                                    @foreach ($status as $obj)
                                        <option value="{{ $obj->id }}">{{ $obj->status }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <!--end::Input group-->
                            <div class="fv-row w-100 flex-md-root">
                                <!--begin::Label-->
                                <label class="fs-6 fw-bold form-label mt-3">
                                    <option value=""> Medical fields</option>
                                    {{-- <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Interviewer who conducts the meeting with the interviewee"></i> --}}
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


                             <!--end::Input group-->
                             <div class="fv-row w-100 flex-md-root">
                                <!--begin::Label-->
                                <label class="fs-6 fw-bold form-label mt-3">
                                    <option value=""> spicialty </option>
                                    {{-- <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Interviewer who conducts the meeting with the interviewee"></i> --}}
                                </label>
                                <!--end::Label-->
                                <select class="form-select form-select-solid" id="selectSpicial" name="spicial[]"
                                        data-control="select2" data-placeholder="Select an option"
                                        data-allow-clear="true" multiple="multiple">
                                        <option></option>
                                </select>
                            </div>
                            <!--end::Input group-->







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
                @include('admin.events.preIndex')



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
            var opts = []
                $("#medicines :selected").each(function() {

                    opts.push(this.value);
                });
                var opts2 = []
                $("#selectSpicial :selected").each(function() {

                    opts2.push(this.value);
                });
            $.ajax({
                type: 'GET',
                data: {

                    name: $('#name').val(),
                    id: $('#id').val(),
                    status_id: $('#status_id option:selected').val(),
                    event_type_id: $('#event_type_id option:selected').val(),
                    spicial:opts,
                    medicines:opts2,
                    created_start: $('#created_start').val(),
                    created_end: $('#created_end').val(),


                },
                url: "{{ route('event-filter') }}",

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
