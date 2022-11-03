    <!--begin::Card header-->
    <div class="card-header align-items-center py-5 gap-2 gap-md-5">
        <!--begin::Card title-->
        <div class="card-title">
            <!--begin::Search-->
            <div class="d-flex align-items-center position-relative my-1">
                <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                <span class="svg-icon svg-icon-1 position-absolute ms-4">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none">
                        <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2"
                            rx="1" transform="rotate(45 17.0365 15.1223)" fill="black" />
                        <path
                            d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                            fill="black" />
                    </svg>
                </span>
                <!--end::Svg Icon-->
                <input type="text" data-kt-ecommerce-category-filter="search"
                    class="form-control form-control-solid w-250px ps-14" placeholder="Search Field" />
            </div>
            <!--end::Search-->
        </div>
        <!--end::Card title-->
        <!--begin::Card toolbar-->
        <div class="card-toolbar">
            <!--begin::Add customer-->
            <!--begin::Add product-->
            <a href="{{ route('events.create') }}" class="btn btn-primary">Add Event</a>
            <!--end::Add product-->

            <!--end::Add customer-->
        </div>
        <!--end::Card toolbar-->
    </div>
    <!--end::Card header-->
    <!--begin::Card body-->
    <div class="card-body pt-0">

        <!--begin::Table-->
        <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_ecommerce_category_table">
            <!--begin::Table head-->
            <thead>
                <!--begin::Table row-->
                <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                    <th class="w-10px pe-2">
                        <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                            <input class="form-check-input" type="checkbox" data-kt-check="true"
                                data-kt-check-target="#kt_ecommerce_category_table .form-check-input"
                                value="1" />
                        </div>
                    </th>
                    <th class="min-w-200px">Title</th>
                    {{-- <th class="text-end min-w-100px">Date</th> --}}
                    {{-- <th class="text-end min-w-100px">Time</th> --}}
                    <th class="text-end min-w-70px">Status</th>
                    <th class="text-end min-w-100px">Email</th>

                    <th class="text-end min-w-100px">Creation Date</th>
                    <th class="text-end min-w-100px">Last Update</th>
                    <th class="text-end min-w-100px">Ranking</th>
                    <th class="text-end min-w-100px">Organized By</th>
                    {{-- <th class="text-end min-w-100px">Views</th> --}}
                    {{-- <th class="text-end min-w-70px">Content</th> --}}
                    <th class="text-end min-w-70px">Actions</th>

                </tr>
                <!--end::Table row-->
            </thead>
            <!--end::Table head-->
            <!--begin::Table body-->
            <tbody class="fw-bold text-gray-600">
                @foreach ($rows as $index => $row)
                    <!--begin::Table row-->
                    <tr>
                        <!--begin::Checkbox-->
                        <td>
                            <div class="form-check form-check-sm form-check-custom form-check-solid">
                                <input class="form-check-input" type="checkbox" value="1" />
                            </div>
                        </td>
                        <!--end::Checkbox-->
                        <!--begin::Category=-->
                        <td>
                            <div class="d-flex align-items-center">
                                <!--begin::Thumbnail-->
                                <a href="#" class="symbol symbol-50px">
                                    <span class="symbol-label"
                                        style="background-image:url({{ asset('uploads/events') }}/{{ $row->img }});"></span>
                                </a>
                                <!--end::Thumbnail-->
                                <div class="ms-5">
                                    <!--begin::Title-->
                                    <a href="#"
                                        class="text-gray-800 text-hover-primary fs-5 fw-bolder mb-1"
                                        data-kt-ecommerce-category-filter="category_name">{{ $row->name }}</a>
                                    <!--end::Title-->
                                </div>
                            </div>
                        </td>

                        <td class="text-end pe-0" data-order="15">
                            <span class="fw-bolder ms-3">{{ $row->status->status ?? '' }}</span>
                        </td>
                        <!--end::Qty=-->
                        <!--begin::Price=-->
                        <td class="text-end pe-0">
                            <input type="hidden" name="" id=""
                                data-kt-ecommerce-category-filter="category_id" value="{{ $row->id }}">
                            <span class="fw-bolder text-dark">{{ $row->email ?? '' }}</span>
                        </td>
                        <!--end::Price=-->
                        <!--begin::Price=-->
                        <td class="text-end pe-0">
                            <span
                                class="fw-bolder text-dark">{{ date('d-m-Y', strtotime($row->created_at)) }}</span>
                        </td>
                        <!--end::Price=-->

                        <!--begin::Price=-->
                        <td class="text-end pe-0">
                            <span
                                class="fw-bolder text-dark">{{ date('d-m-Y', strtotime($row->updated_at)) }}</span>
                        </td>
                        <!--begin::Price=-->
                        <td class="text-end pe-0">
                            <span class="fw-bolder text-dark">{{ $row->ranking ?? '' }}</span>
                        </td>
                        <!--end::Price=-->
                        <!--end::Price=-->
                        <td class="text-end pe-0" data-order="15">
                            <span class="fw-bolder ms-3">{{ $row->organizer->name ?? '' }}</span>


                        </td>
                        <td class="text-end">
                            {{-- <div class="d-flex flex-row"> --}}

                                {{-- <form  class="p-2"
                                    action="{{route('eventAudiance')}}" method="get"
                                    >

                                 <input type="hidden" name="event_id" value="{{$row->id}}" >

                                 <a  onclick="$(this).closest('form').submit()" title="content" ><span class="svg-icon svg-icon-3">
                                    <i class="fa fa-folder text-danger"></i>

                                </span></a>

                                </form> --}}


                            {{-- <form  class="p-2"
                                action="{{route('eventTicket')}}" method="get"
                                >

                             <input type="hidden" name="event_id" value="{{$row->id}}" >

                             <a  onclick="$(this).closest('form').submit()" title="Ticket" ><span class="svg-icon svg-icon-3">
                                <i class="fa fa-calendar text-danger"></i>

                            </span></a>

                            </form> --}}
                    {{-- </div> --}}



                            <a href="#" class="btn btn-sm btn-light btn-active-light-primary"
                                data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                                <span class="svg-icon svg-icon-5 m-0">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none">
                                        <path
                                            d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z"
                                            fill="black" />
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                            </a>
                            <!--begin::Menu-->
                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4"
                                data-kt-menu="true">
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="{{ route('events.edit', $row->id) }}"
                                        class="menu-link px-3">Edit</a>
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3"
                                        data-kt-ecommerce-category-filter="delete_row">Delete</a>


                                    <form id="delete_{{ $row->id }}"
                                        action="{{ route('events.destroy', $row->id) }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" value=""></button>
                                    </form>
                                </div>
                                <!--end::Menu item-->
                            </div>
                            <!--end::Menu-->
                        </td>
                        <!--end::Action=-->
                         <!--begin::Modal - New Target-->
         <div class="modal fade" id="kt_modal_new_AudianceEdit{{ $row->id }}" tabindex="-1"
            aria-hidden="true">
            <!--begin::Modal dialog-->
            <div class="modal-dialog modal-dialog-centered mw-650px">
                <!--begin::Modal content-->
                <div class="modal-content rounded">
                    <!--begin::Modal header-->
                    <div class="modal-header pb-0 border-0 justify-content-end">
                        <!--begin::Close-->
                        <div class="btn btn-sm btn-icon btn-active-color-primary"
                            data-bs-dismiss="modal">
                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                            <span class="svg-icon svg-icon-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none">
                                    <rect opacity="0.5" x="6" y="17.3137"
                                        width="16" height="2" rx="1"
                                        transform="rotate(-45 6 17.3137)" fill="black" />
                                    <rect x="7.41422" y="6" width="16"
                                        height="2" rx="1"
                                        transform="rotate(45 7.41422 6)" fill="black" />
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                        </div>
                        <!--end::Close-->
                    </div>
                    <!--end::Modal header-->
                    <!--begin::Modal body-->
                    <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                        <!--begin::Notice-->
                        <!--end::Icon-->
                        <div class="mb-13 text-center">
                            <!--begin::Title-->
                            <h1 class="mb-3">Update User</h1>
                            <!--end::Title-->

                        </div>
                        <!--begin::Notice-->
                        <div
                            class="notice d-flex bg-light-warning rounded border-warning border border-dashed mb-9 p-6">
                            <!--begin::Icon-->
                            <!--begin::Svg Icon | path: icons/duotune/general/gen044.svg-->
                            <span class="svg-icon svg-icon-2tx svg-icon-warning me-4">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none">
                                    <rect opacity="0.3" x="2" y="2"
                                        width="20" height="20" rx="10"
                                        fill="black" />
                                    <rect x="11" y="14" width="7"
                                        height="2" rx="1" transform="rotate(-90 11 14)"
                                        fill="black" />
                                    <rect x="11" y="17" width="2"
                                        height="2" rx="1" transform="rotate(-90 11 17)"
                                        fill="black" />
                                </svg>
                            </span>
                            <!--end::Svg Icon-->

                            <!--begin::Wrapper-->
                            <div class="d-flex flex-stack flex-grow-1">
                                <!--begin::Content-->
                                <div class="fw-bold">
                                    <div class="fs-6 text-gray-700">
                                        <strong class="me-1">Warning!</strong>By Activate
                                        {{ $row->name }}, you will give him permission to
                                        make business page . Please ensure you're absolutely
                                        certain before proceeding.
                                    </div>
                                </div>
                                <!--end::Content-->
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Notice-->
                        <!--end::Notice-->
                        <!--begin::Form-->
                        <form id="kt_modal_update_audiance_form" method="post" class="form"
                            action="{{ route('activeDoctor') }}">
                            @csrf
                            <!--begin::Input group-->
                            <div class="fv-row mb-7">
                                <input type="hidden" name="doctor_id" value="{{ $row->id }}">

                            </div>
                            <!--end::Input group-->
                            <!--begin::Actions-->
                            <!--begin::Actions-->
                            <div class="text-center">
                                <div class="btn btn-sm btn-icon btn-active-color-primary"
                                    style="margin-right: 25px" data-bs-dismiss="modal">
                                    <button type="reset" id="kt_modal_update_target_cancel"
                                        class="btn btn-light me-3"
                                        data-dismiss="modal">Cancel</button>
                                </div>
                                <button type="submit" id="kt_modal_update_target_submit"
                                    class="btn btn-primary">
                                    <span class="indicator-label">Submit</span>
                                    <span class="indicator-progress">Please wait...
                                        <span
                                            class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                </button>
                            </div>
                            <!--end::Actions-->
                            <!--end::Actions-->
                        </form>
                        <!--end::Form-->
                    </div>
                    <!--end::Modal body-->
                </div>
                <!--end::Modal content-->
            </div>
            <!--end::Modal dialog-->
        </div>
        <!--end::Modal - Update permissions-->

    </tr>
    <!--end::Table row-->
@endforeach


</tbody>
<!--end::Table body-->
</table>
<!--end::Table-->
</div>
