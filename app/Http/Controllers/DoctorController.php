<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDoctorRequest;
use App\Http\Requests\UpdateDoctorRequest;
use App\Models\Country;
use App\Models\Doctor;
use App\Models\Doctor_medical_field;
use App\Models\Medicine_field;
use App\Models\Register_type;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Carbon\Carbon;
class DoctorController extends Controller
{
    protected $object;
    protected $viewName;
    protected $routeName;

    /**
     * UserController Constructor.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(Doctor $object)
    {
        $this->middleware('auth');

        $this->object = $object;
        $this->viewName = 'admin.doctors.';
        $this->routeName = 'doctors.';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rows = Doctor::orderBy("created_at", "Desc")->get();
        $medicines = Medicine_field::all();
        $registerations = Register_type::all();
        $countries = Country::all();
        return view($this->viewName . 'index', compact('rows', 'medicines', 'registerations', 'countries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDoctorRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDoctorRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function show(Doctor $doctor)
    {
        return view($this->viewName . 'show', compact('doctor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function edit(Doctor $doctor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDoctorRequest  $request
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDoctorRequest $request, Doctor $doctor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Doctor $doctor)
    {
        try {

            $doctor->delete();
            return redirect()->back()->with('flash_success', 'تم الحذف بنجاح !');

        } catch (QueryException $q) {
            return redirect()->back()->withInput()->with('flash_danger', "Can’t Delete This Row Becouse It Related With Another");

        }
    }
    /**
     *
     *
     *
     *
     */
    public function activeDoctor(Request $request)
    {
        // activeDoctor
        $row = Doctor::where('id', $request->get('doctor_id'))->first();

        $row->update(['verified' => '1']);
        return redirect()->route($this->routeName . 'index')->with('flash_success', 'تم الحفظ بنجاح');
    }
    /**
     *
     *
     *
     */
    public function selectDoctorMail(Request $request)
    {
        if ($request->ajax()) {

            $select_value = $request->select_value;
            $out = [];

            $doctor = Doctor::where('id', $select_value)->first();

            echo json_encode(array($doctor->email ?? ''));
        }
    }

    public function filter(Request $request)
    {
        \Log::info($request->all());
        $medicines = Medicine_field::all();
        $name= $request->get('name');
        //search func
        $opo=Doctor::select('*');
        if ($request->get("name") && !empty($request->get("name"))) {
            $opo->where('name', 'like', '%' . $name . '%')
            ->orWhere('email', 'like', '%' . $name . '%');
        }
        if ($request->get("verified") && !empty($request->get("verified"))) {
            $opo->where('verified', '=',$request->get("verified") );

        }
        if ($request->get("country_id") && !empty($request->get("country_id"))) {
            $opo->where('country_id', '=',$request->get("country_id") );

        }

        if ($request->get("medicines") && !empty($request->get("medicines"))) {

            $docMed = Doctor_medical_field::whereIN('medicine_field_id',$request->get("medicines"))->pluck('doctor_id');
            $opo->whereIN('id', '=',$docMed);

        }
        if ($request->get("register_type_id") && !empty($request->get("register_type_id"))) {

            $opo->where('register_type_id', '=',$request->get("register_type_id") );

        }
        if ($request->get("created_start") && !empty($request->get("created_start"))) {
            $opo->where('created_at', '>=', Carbon::parse($request->get("created_start")));
        }
        if ($request->get("created_end") && !empty($request->get("created_end"))) {
            $opo->where('created_at', '<=', Carbon::parse($request->get("created_end")));
        }

        $rows =  $opo->get();
        return view($this->viewName . 'preIndex', compact('rows'))->render();
    }
}
