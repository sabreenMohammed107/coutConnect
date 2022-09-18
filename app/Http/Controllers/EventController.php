<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateEventRequest;
use App\Models\Category;
use App\Models\City;
use App\Models\Event;
use App\Models\Events_specialzations_fees;
use App\Models\Event_days;
use App\Models\Medicine_field;
use App\Models\Organizer;
use App\Models\Specialzation;
use App\Models\Tag;
use File;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;

class EventController extends Controller
{
    protected $object;
    protected $viewName;
    protected $routeName;

    /**
     * UserController Constructor.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(Event $object)
    {
        $this->middleware('auth');

        $this->object = $object;
        $this->viewName = 'admin.events.';
        $this->routeName = 'events.';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rows = Event::orderBy("created_at", "Desc")->get();

        return view($this->viewName . 'index', compact('rows'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cities = City::all();
        $organizers = Organizer::all();
        $medicines = Medicine_field::all();
        $categories = Category::all();
        $tags = Tag::all();
        return view($this->viewName . 'add', compact(['cities', 'organizers', 'medicines', 'categories', 'tags']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreEventRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEventRequest $request)
    {
        DB::beginTransaction();
        try {
            // Disable foreign key checks!
            DB::statement('SET FOREIGN_KEY_CHECKS=0;');

            $input = $request->except(['_token', 'img']);
            if ($request->hasFile('img')) {
                $attach_image = $request->file('img');

                $input['img'] = $this->UplaodImage($attach_image);
            }
            if ($request->has('featured')) {

                $input['featured'] = '1';
            } else {
                $input['featured'] = '0';
            }

            if ($request->has('premium')) {

                $input['premium'] = '1';
            } else {
                $input['premium'] = '0';
            }

            $event = Event::create($input);

            if (!empty($request->get('medicines'))) {

                $event->medicines()->attach($request->medicines);

            }

            if (!empty($request->get('categories'))) {

                $event->categories()->attach($request->categories);

            }
            if (!empty($request->get('tags'))) {

                $event->tags()->attach($request->categories);

            }

            DB::commit();
            // Enable foreign key checks!
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');

            return redirect()->route($this->routeName . 'index')->with('flash_success', 'تم الحفظ بنجاح');

        } catch (\Throwable$e) {
            // throw $th;
            DB::rollback();
            return redirect()->back()->withInput()->withErrors($e->getMessage());

        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        $cities = City::all();
        $organizers = Organizer::all();

        $eventMedicines = $event->medicines->all();
        $eventcategories = $event->categories->all();
        $eventTags = $event->tags->all();
        $eventSpecialzation = Events_specialzations_fees::all();
        $medicines = Medicine_field::all();
        $categories = Category::all();
        $specialzations = Specialzation::all();
        $tags = Tag::all();
        $eventDays = Event_days::all();
        return view($this->viewName . 'edit', compact(['event', 'cities', 'organizers', 'eventMedicines', 'eventcategories', 'eventSpecialzation', 'eventTags', 'medicines', 'categories', 'tags', 'specialzations', 'eventDays']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEventRequest  $request
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEventRequest $request, Event $event)
    {
        DB::beginTransaction();
        try {
            // Disable foreign key checks!
            DB::statement('SET FOREIGN_KEY_CHECKS=0;');

            $input = $request->except(['_token', 'img']);
            if ($request->hasFile('img')) {
                $attach_image = $request->file('img');

                $input['img'] = $this->UplaodImage($attach_image);
            }
            if ($request->has('featured')) {

                $input['featured'] = '1';
            } else {
                $input['featured'] = '0';
            }

            if ($request->has('premium')) {

                $input['premium'] = '1';
            } else {
                $input['premium'] = '0';
            }

            $event->update($input);

            $event->medicines()->sync($request->medicines);

            $event->categories()->sync($request->categories);

            $event->tags()->sync($request->tags);
            //kt_ecommerce_add_product_options

            $specialzationsList = $request->kt_ecommerce_add_product_options;
            $spicialIds = [];
            foreach ($specialzationsList as $index => $opt) {

                $specialize_id = (int) $specialzationsList[$index]['specialize_id'];
                array_push($spicialIds, $specialize_id);

            }
            \Log::info($spicialIds);
            //update special-fees

            $event->specialzations()->sync($spicialIds);

// then
            $updatedList = $event->specialzations()->pluck('specialize_id')->toArray(); // [1,2,3]
            \Log::info($updatedList);
            \Log::info($specialzationsList);
            foreach ($specialzationsList as $index => $opt) {
                // if(count($updatedList)>0){
                    foreach ($updatedList as $updatedId) {

                        $specialFees = Events_specialzations_fees::where('specialize_id', '=', $updatedId)->first();
                        if ($updatedId == (int) $specialzationsList[$index]['specialize_id']) {
                            $specialFees->fees = $specialzationsList[$index]['fees'];

                            $specialFees->update();
                        }

                    }



            }

            //update days

            $daysList = $request->kt_docs_repeater_basic;
             $updatedDaysList = Event_days::where('event_id', $event->id)->get();
            \Log::info(["message",$daysList]);

            foreach ($updatedDaysList as $index => $update) {

                foreach ($daysList as $index => $opt) {
                if(( $update->event_date_from != $daysList[$index]['event_date_from']) && ( $update->event_date_to !=$daysList[$index]['event_date_to']  ) ){
                    $update->delete();

                }
        }

    }
            if($daysList){
                foreach ($daysList as $index => $opt) {

                    $evDay = Event_days::firstOrNew([
                        'event_date_from' => $daysList[$index]['event_date_from'],
                        'event_date_to' => $daysList[$index]['event_date_to'],
                        'event_id' => $event->id,

                    ]);


                        $evDay->event_date_from = $daysList[$index]['event_date_from'];
                        $evDay->event_date_to = $daysList[$index]['event_date_to'];
                        $evDay->event_id = $event->id;

                        $evDay->save();





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
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        // Delete File ..
        $file = $event->img;
        $file_name = public_path('uploads/events/' . $file);
        try {
            File::delete($file_name);
            $event->delete();
            return redirect()->back()->with('flash_success', 'تم الحذف بنجاح !');

        } catch (QueryException $q) {
            dd($q->getMessage());
            // return redirect()->back()->withInput()->with('flash_danger', $q->getMessage());

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
        $uploadPath = public_path('uploads/events');

        // Move The image..
        $file->move($uploadPath, $imageName);

        return $imageName;
    }
}
