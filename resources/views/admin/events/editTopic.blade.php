@extends('layout.main')

@section('breadcrumb')
    <div class="toolbar" id="kt_toolbar">
        <div class="container-fluid d-flex flex-stack flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex flex-column align-items-start justify-content-center flex-wrap me-2">
                <!--begin::Title-->
                <h1 class="text-dark fw-bolder my-1 fs-2">Edit Content</h1>
                <!--end::Title-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb fw-bold fs-base my-1">
                    <li class="breadcrumb-item text-muted">
                        <a href="#" class="text-muted text-hover-primary">{{$topic->event->name ?? ''}}</a>
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
                action="{{ route('updateContent') }}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="topic_id" value="{{ $topic_id }}">

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
                                    <input type="text" name="name" value="{{$topic->name}}"
                                        class="form-control mb-2 @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}" autocomplete="name" autofocus>
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
                                    <label class="required form-label">link</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="website" id="email" value="{{$topic->link}}" name="link"
                                        class="form-control mb-2 @error('link') is-invalid @enderror"=value="{{ old('link') }}"
                                        autocomplete="link" autofocus>
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





                            <!--end::Card header-->

                            <!--end::Social options-->
                        </div>
                        <!--begin::Card body-->
                        <div class="card-body pt-0">
                            <!--begin::Repeater-->
                            <div id="kt_docs_repeater_basic">
                                <!--begin::Form group-->
                                <div class="form-group">
                                    <div data-repeater-list="kt_docs_repeater_basic">
                                        @if ($topicLectures->count() > 0)
                                        @foreach ($topicLectures as $index => $lec)
                                        <div data-repeater-item>
                                            <div class="form-group row">

                                                <div class="col-md-3">
                                                    {{-- <label class="form-label">Phone:</label> --}}
                                                    <input type="text" name="lecture_title" value="{{$lec->lecture_title}}"
                                                        class="form-control @error('lecture_title') is-invalid @enderror "
                                                        placeholder=" lecture_title " />
                                                </div>
                                                <div class="col-md-3">
                                                    {{-- <label class="form-label">Phone:</label> --}}
                                                    <input type="text" name="lecture_link" value="{{$lec->lecture_link}}"
                                                        class="form-control @error('lecture_link') is-invalid @enderror "
                                                        placeholder=" lecture_link " />
                                                </div>
                                                <div class="col-md-3">
                                                    {{-- <label class="form-label">Phone:</label> --}}
                                                    <input type="number" name="lecture_duration" value="{{$lec->lecture_duration}}"
                                                        class="form-control @error('lecture_duration') is-invalid @enderror "
                                                        placeholder=" lecture_duration " />
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

                                                <div class="col-md-3">
                                                    {{-- <label class="form-label">Phone:</label> --}}
                                                    <input type="text" name="lecture_title"
                                                        class="form-control @error('lecture_title') is-invalid @enderror "
                                                        placeholder=" lecture_title " />
                                                </div>
                                                <div class="col-md-3">
                                                    {{-- <label class="form-label">Phone:</label> --}}
                                                    <input type="text" name="lecture_link"
                                                        class="form-control @error('lecture_link') is-invalid @enderror "
                                                        placeholder=" lecture_link " />
                                                </div>
                                                <div class="col-md-3">
                                                    {{-- <label class="form-label">Phone:</label> --}}
                                                    <input type="number" name="lecture_duration"
                                                        class="form-control @error('lecture_duration') is-invalid @enderror "
                                                        placeholder=" lecture_duration " />
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
                        <div class="d-flex justify-content-end">
                            <!--begin::Button-->

                            <a href=" {{ route('events.edit', $topic->event_id) }}" id="kt_ecommerce_add_product_cancel"
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
