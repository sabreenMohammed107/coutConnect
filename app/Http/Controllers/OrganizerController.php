<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrganizerRequest;
use App\Http\Requests\UpdateOrganizerRequest;
use App\Models\Doctor;
use App\Models\Organizer;
use App\Models\Organizer_phone;
use App\Models\Organizer_status;
use File;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;

class OrganizerController extends Controller
{
    protected $object;
    protected $viewName;
    protected $routeName;

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
        $rows = Organizer::orderBy("created_at", "Desc")->get();

        return view($this->viewName . 'index', compact('rows'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $doctors = Doctor::all();
        $status = Organizer_status::all();
        return view($this->viewName . 'add', compact('doctors', 'status'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreOrganizerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOrganizerRequest $request)
    {
        DB::beginTransaction();
        try {
            // Disable foreign key checks!
            DB::statement('SET FOREIGN_KEY_CHECKS=0;');
            $input = $request->except(['_token', 'img', 'kt_docs_repeater_basic1']);
            if ($request->hasFile('img')) {
                $attach_image = $request->file('img');

                $input['img'] = $this->UplaodImage($attach_image);
            }

            $organizer = Organizer::create($input);

            $organizerList = $request->kt_docs_repeater_basic1;

            foreach ($organizerList as $index => $opt) {

                $phone = $organizerList[$index]['phones'];
                //  array_push($organizerIds, $phone);
                $phoneOrganizer = new Organizer_phone();
                $phoneOrganizer->organizer_id = $organizer->id;
                $phoneOrganizer->phone = $phone;
                $phoneOrganizer->save();

            }

            DB::commit();
            //Enable foreign key checks!
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');

            return redirect()->route($this->routeName . 'index')->with('flash_success', 'تم الحفظ بنجاح');

        } catch (\Throwable$e) {
            // throw $th;
            DB::rollback();
            dd($e->getMessage());
            // return redirect()->back()->withInput()->withErrors($e->getMessage());

        }

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
        $doctors = Doctor::all();
        $status = Organizer_status::all();

        return view($this->viewName . 'edit', compact('organizer', 'doctors', 'status'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOrganizerRequest  $request
     * @param  \App\Models\Organizer  $organizer
     * @return \Illuminate\Http\Response
     */
    function getResult($first, $second)
{
    return $first > $second ? 'Available' : 'Not Available';
}
    public function update(UpdateOrganizerRequest $request, Organizer $organizer)
    {
        DB::beginTransaction();
        try {
            // Disable foreign key checks!
            DB::statement('SET FOREIGN_KEY_CHECKS=0;');
            $input = $request->except(['_token', 'img', 'kt_docs_repeater_basic1']);
            $input = $request->except(['_token', 'img']);
            if ($request->hasFile('img')) {
                $attach_image = $request->file('img');

                $input['img'] = $this->UplaodImage($attach_image);
            }

            $organizer->update($input);

            $organizerList = $request->kt_docs_repeater_basic1;
            $updatedListdel = Organizer_phone::where('organizer_id', $organizer->id)->pluck('phone')->toArray();

            //del
            $diff=[];
            foreach ($organizerList as $index => $opt) {
                $phone = $organizerList[$index]['phones'];
                array_push($diff, $phone);


            }
            //get all differance numbers
            $new_array = array();
            foreach($diff as $value) {
                if(!in_array($value, $updatedListdel)) {
                    array_push($new_array, $value);
                }
            }
            foreach($updatedListdel as $value) {
                if(!in_array($value, $diff)) {
                    array_push($new_array, $value);
                }
            }

            foreach ($new_array as $delPhone) {

                $delOrganizerPhone = Organizer_phone::where('organizer_id', $organizer->id)->where('phone', $delPhone)->first();
                if ($delOrganizerPhone) {
                    $delOrganizerPhone->delete();
                }

    }
            //end del
            //add phone
            $updatedList = Organizer_phone::where('organizer_id', $organizer->id)->pluck('phone')->toArray();

            foreach ($organizerList as $index => $opt) {
                $phone = $organizerList[$index]['phones'];

                foreach ($updatedList as $upd) {

                    if ($upd != $phone) {
                        $phoneOrganizer = new Organizer_phone();
                        $phoneOrganizer->organizer_id = $organizer->id;
                        $phoneOrganizer->phone = $phone;
                        $phoneOrganizer->save();
                    }

                }

            }
            DB::commit();
            //Enable foreign key checks!
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');

            return redirect()->route($this->routeName . 'index')->with('flash_success', 'تم الحفظ بنجاح');

        } catch (\Throwable$e) {
            // throw $th;
            DB::rollback();
            dd($e->getMessage());
            // return redirect()->back()->withInput()->withErrors($e->getMessage());

        }
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
            //delete phones
            foreach($organizer->organizers as $org){
                $org->delete();
            }
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
