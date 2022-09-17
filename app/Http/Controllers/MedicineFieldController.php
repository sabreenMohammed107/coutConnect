<?php

namespace App\Http\Controllers;

use App\Models\Medicine_field;
use App\Http\Requests\StoreMedicine_fieldRequest;
use App\Http\Requests\UpdateMedicine_fieldRequest;
use Illuminate\Database\QueryException;
use File;
class MedicineFieldController extends Controller
{
    protected $object;
    protected $viewName;
    protected $routeName ;

    /**
     * UserController Constructor.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(Medicine_field $object)
    {
        $this->middleware('auth');

        $this->object = $object;
        $this->viewName = 'admin.medicine-fields.';
    $this->routeName = 'medicine-fields.';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rows=Medicine_field::orderBy("created_at", "Desc")->get();


        return view($this->viewName.'index', compact('rows'));
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
     * @param  \App\Http\Requests\StoreMedicine_fieldRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMedicine_fieldRequest $request)
    {

        $input = $request->except(['_token','field_img']);
        if ($request->hasFile('field_img')) {
            $attach_image = $request->file('field_img');

            $input['field_img'] = $this->UplaodImage($attach_image);
        }



        Medicine_field::create($input);
    return redirect()->route($this->routeName.'index')->with('flash_success', 'تم الحفظ بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Medicine_field  $medicine_field
     * @return \Illuminate\Http\Response
     */
    public function show(Medicine_field $medicine_field)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Medicine_field  $medicine_field
     * @return \Illuminate\Http\Response
     */
    public function edit(Medicine_field $medicine_field)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMedicine_fieldRequest  $request
     * @param  \App\Models\Medicine_field  $medicine_field
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMedicine_fieldRequest $request, Medicine_field $medicine_field)
    {
        $input = $request->except(['_token','field_img']);
        if ($request->hasFile('field_img')) {
            $attach_image = $request->file('field_img');

            $input['field_img'] = $this->UplaodImage($attach_image);
        }


       $medicine_field->update($input);
    return redirect()->route($this->routeName.'index')->with('flash_success', 'تم الحفظ بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Medicine_field  $medicine_field
     * @return \Illuminate\Http\Response
     */
    public function destroy(Medicine_field $medicine_field)
    {

        // Delete File ..
        $file = $medicine_field->field_img;
        $file_name = public_path('uploads/medicine-fields/' . $file);
        try {
            File::delete($file_name);
            $medicine_field->delete();
            return redirect()->back()->with('flash_success', 'تم الحذف بنجاح !');

        } catch (QueryException $q) {
            return redirect()->back()->withInput()->with('flash_danger', $q->getMessage());

        }
    }


     /* uplaud image
       */
      public function UplaodImage($file_request)
      {
          //  This is Image Info..
          $file = $file_request;
          $name = $file->getClientOriginalName();
          $ext = $file->getClientOriginalExtension();
          $size = $file->getSize();
          $path = $file->getRealPath();
          $mime = $file->getMimeType();

          // Rename The Image ..
          $imageName = $name;
          $uploadPath = public_path('uploads/medicine-fields');

          // Move The image..
          $file->move($uploadPath, $imageName);

          return $imageName;
      }
}
