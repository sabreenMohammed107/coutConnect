<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Country;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class CityController extends Controller
{
    protected $object;
    protected $viewName;
    protected $routeName;

    /**
     * UserController Constructor.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(City $object)
    {
        $this->middleware('auth');

        $this->object = $object;
        $this->viewName = 'admin.cities.';
        $this->routeName = 'cities.';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rows = City::orderBy("created_at", "Desc")->get();
        $countries = Country::all();

        return view($this->viewName . 'index', compact(['rows', 'countries']));
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
    public function store(Request $request)
    {
        $input = $request->except(['_token']);

        City::create($input);
        return redirect()->route($this->routeName . 'index')->with('flash_success', 'تم الحفظ بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Specialzation  $specialzation
     * @return \Illuminate\Http\Response
     */
    public function show(City $city)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Specialzation  $specialzation
     * @return \Illuminate\Http\Response
     */
    public function edit(City $city)
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
    public function update(Request $request, City $city)
    {

        $input = $request->except(['_token', 'city_id']);

        City::findOrFail($request->get('city_id'))->update($input);
        // $specialzation->update($input);

        return redirect()->route($this->routeName . 'index')->with('flash_success', 'تم الحفظ بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Specialzation  $specialzation
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $city = City::where('id', $id)->first();
        try {

            $city->delete();
            return redirect()->back()->with('flash_success', 'تم الحذف بنجاح !');

        } catch (QueryException $q) {
            return redirect()->back()->withInput()->with('flash_danger', $q->getMessage());

        }
    }
}
