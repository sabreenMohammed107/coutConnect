<?php

namespace App\Http\Controllers;

use App\Models\Organizer;
use App\Http\Requests\StoreOrganizerRequest;
use App\Http\Requests\UpdateOrganizerRequest;
use Illuminate\Database\QueryException;
use File;
class OrganizerController extends Controller
{
    protected $object;
    protected $viewName;
    protected $routeName ;

    /**
     * UserController Constructor.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(Organizer $object)
    {
        $this->middleware('auth');

        $this->object = $object;
        $this->viewName = 'admin.organizers.';
    $this->routeName = 'organizers.';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rows=Organizer::orderBy("created_at", "Desc")->get();


        return view($this->viewName.'index', compact('rows'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view($this->viewName . 'add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreOrganizerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOrganizerRequest $request)
    {
        $input = $request->except(['_token','img']);
        if ($request->hasFile('img')) {
            $attach_image = $request->file('img');

            $input['img'] = $this->UplaodImage($attach_image);
        }



        Organizer::create($input);
    return redirect()->route($this->routeName.'index')->with('flash_success', 'تم الحفظ بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Organizer  $organizer
     * @return \Illuminate\Http\Response
     */
    public function show(Organizer $organizer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Organizer  $organizer
     * @return \Illuminate\Http\Response
     */
    public function edit(Organizer $organizer)
    {
        // $row=Slider_image::where('id',$id)->first();

        return view($this->viewName.'edit',compact('organizer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOrganizerRequest  $request
     * @param  \App\Models\Organizer  $organizer
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOrganizerRequest $request, Organizer $organizer)
    {
        $input = $request->except(['_token','img']);
        if ($request->hasFile('img')) {
            $attach_image = $request->file('img');

            $input['img'] = $this->UplaodImage($attach_image);
        }



        $organizer->update($input);
    return redirect()->route($this->routeName.'index')->with('flash_success', 'تم الحفظ بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Organizer  $organizer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Organizer $organizer)
    {
        // Delete File ..
        $file = $organizer->img;
        $file_name = public_path('uploads/organizers/' . $file);
        try {
            File::delete($file_name);
            $organizer->delete();
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
          $uploadPath = public_path('uploads/organizers');

          // Move The image..
          $file->move($uploadPath, $imageName);

          return $imageName;
      }
}
