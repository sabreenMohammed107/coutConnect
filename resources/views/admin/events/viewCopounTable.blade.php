  <!--begin::Card toolbar-->
  <div class="card-toolbar">
    <!--begin::Add customer-->
    <!--begin::Add product  -->
    <form id="Audiance"
    action="{{route('addCopoun')}}" method="get"
    >

 <input type="hidden" name="event_id" value="{{$event_id}}" >

    <button type="submit" class="btn btn-primary" value=""> Add Copoun To {{$event->name}}</button>
</form>
    {{-- <a href="{{url('addTopic/'.$event_id) }}" class="btn btn-primary">Add Contact</a> --}}
    <!--end::Add product-->

    <!--end::Add customer-->
</div>
<!--end::Card toolbar-->

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
            <th class="min-w-200px">Name</th>

            <th class="text-end min-w-70px">validate From</th>

            <th class="text-end min-w-70px">Validate To</th>
            <th class="text-end min-w-70px">Status</th>
            <th class="text-end min-w-70px">Actions</th>

        </tr>
        <!--end::Table row-->
    </thead>
    <!--end::Table head-->
    <!--begin::Table body-->
    <tbody class="fw-bold text-gray-600">
        @if($coupons)
        @foreach ($coupons as $index => $coupon)
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

                        <div class="ms-5">
                            <!--begin::Title-->
                            <a href="#"
                                class="text-gray-800 text-hover-primary fs-5 fw-bolder mb-1"
                                data-kt-ecommerce-category-filter="category_name">{{$coupon->name}}</a>
                            <!--end::Title-->
                        </div>
                    </div>
                </td>


                <!--begin::Price=-->
                <td class="text-end pe-0">
                    <input type="hidden" name="" id=""
                        data-kt-ecommerce-category-filter="category_id" value="{{ $coupon->id }}">
                    <span class="fw-bolder text-dark">{{$coupon->valid_from}}</span>
                </td>
                <!--end::Price=-->

                 <!--begin::Price=-->
                 <td class="text-end pe-0">

                    <span class="fw-bolder text-dark">{{$coupon->valid_to}}</span>
                </td>
                <!--end::Price=-->

                 <!--begin::Price=-->
                 <td class="text-end pe-0">

                    <span class="fw-bolder text-dark">{{$coupon->status->status ?? ''}}</span>
                </td>
                <!--end::Price=-->





                <td class="text-end">
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

                                <form id="Audiance"
                                action="{{route('editCopoun')}}" method="get"
                                >

                             <input type="hidden" name="copoun_id" value="{{$coupon->id}}" >

                                <button type="submit" class="menu-link px-3" value="">Edit</button>
                            </form>
                        </div>
                        <!--end::Menu item-->
                        <!--begin::Menu item-->
                        <div class="menu-item px-3">
                            <a href="#" class="menu-link px-3"
                                data-kt-ecommerce-category-filter="delete_row">Delete</a>


                            <form id="delete_{{$coupon->id }}"
                                action="#" method="POST"
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

<!--end::Modal - Update permissions-->
            </tr>
            <!--end::Table row-->
        @endforeach
@endif

    </tbody>
    <!--end::Table body-->
</table>
<!--end::Table-->
</div>
<!--end::Card body-->
