<?php

namespace App\Http\Controllers;

use App\Models\Specialzation;
use App\Http\Requests\StoreSpecialzationRequest;
use App\Http\Requests\UpdateSpecialzationRequest;
use App\Models\Medicine_field;
use Illuminate\Database\QueryException;
use File;
class SpecialzationController extends Controller
{
    protected $object;
    protected $viewName;
    protected $routeName ;

    /**
     * UserController Constructor.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(Specialzation $object)
    {
        $this->middleware('auth');

        $this->object = $object;
        $this->viewName = 'admin.specializations.';
    $this->routeName = 'specializations.';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rows=Specialzation::orderBy("created_at", "Desc")->get();

$medicalFields=Medicine_field::all();
        return view($this->viewName.'index', compact('rows','medicalFields'));
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
     * @param  \App\Http\Requests\StoreSpecialzationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSpecialzationRequest $request)
    {
        $input = $request->except(['_token']);



        Specialzation::create($input);
    return redirect()->route($this->routeName.'index')->with('flash_success', 'تم الحفظ بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Specialzation  $specialzation
     * @return \Illuminate\Http\Response
     */
    public function show(Specialzation $specialzation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Specialzation  $specialzation
     * @return \Illuminate\Http\Response
     */
    public function edit(Specialzation $specialzation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSpecialzationRequest  $request
     * @param  \App\Models\Specialzation  $specialzation
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSpecialzationRequest $request, Specialzation $specialzation)
    {

        $input = $request->except(['_token','specialize_id']);


        Specialzation::findOrFail($request->get('specialize_id'))->update($input);
        // $specialzation->update($input);

    return redirect()->route($this->routeName.'index')->with('flash_success', 'تم الحفظ بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Specialzation  $specialzation
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $specialzation=Specialzation::where('id',$id)->first();
        try {

            $specialzation->delete();
            return redirect()->back()->with('flash_success', 'تم الحذف بنجاح !');

        } catch (QueryException $q) {
            return redirect()->back()->withInput()->with('flash_danger', $q->getMessage());

        }
    }
}
