<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateEventRequest;
use App\Models\City;
use App\Models\Coupons_discount;
use App\Models\Currency;
use App\Models\Event;
use App\Models\Events_specialzations;
use App\Models\Event_days;
use App\Models\Event_instractor;
use App\Models\Event_status;
use App\Models\Event_type;
use App\Models\Faq;
use App\Models\Language;
use App\Models\Medicine_field;
use App\Models\Organizer;
use App\Models\Specialzation;
use App\Models\Tag;
use App\Models\Ticket;
use App\Models\ticket_coupon_discount;
use App\Models\Topics_lecture;
use Carbon\Carbon;
use File;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
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
        $status = Event_status::all();
        $types = Event_type::all();
        $medicines = Medicine_field::all();
        return view($this->viewName . 'newIndex', compact(['rows', 'status', 'types', 'medicines']));
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
        $eventTypes = Event_type::all();
        $status = Event_status::all();
        $tags = Tag::all();
        $languages = Language::all();
        return view($this->viewName . 'newAdd', compact(['cities', 'organizers', 'medicines', 'eventTypes', 'tags', 'status', 'languages']));
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

            $input = $request->except(['_token', 'cover_photo']);
            if ($request->hasFile('cover_photo')) {
                $attach_image = $request->file('cover_photo');

                $input['cover_photo'] = $this->UplaodImage($attach_image);
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

            if (!empty($request->get('tags'))) {

                $event->tags()->attach($request->tags);

            }
            if (!empty($request->get('spicial'))) {

                $event->specialzations()->attach($request->spicial);

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

        $eventTags = $event->tags->all();
        $eventSpecialzation = Events_specialzations::where('event_id', $event->id)->get();
        $medicines = Medicine_field::all();

        $specialzations = Specialzation::whereIN('medicine_field_id', $event->medicines->pluck('id'))->get();
        $tags = Tag::all();
        $eventDays = Event_days::where('event_id', $event->id)->get();
        $languages = Language::all();
        $eventTypes = Event_type::all();
        $status = Event_status::all();
        $faqs = Faq::where('event_id', $event->id)->get();
        $eventInstructors = Event_instractor::where('event_id', $event->id)->get();
        //viewAudiance
        $event_id = $event->id;
        $topics = Topics_lecture::where('event_id', $event->id)->whereNull('topic_id')->get();
//ticket
        $tickets = Ticket::where('event_id', $event->id)->get();

        $currencies = Currency::all();
        //copoun ===> flag =1
        $coupons = Coupons_discount::where('coupons_discount_flag', '0')->get();
        $discounts = Coupons_discount::where('coupons_discount_flag', '0')->get();
        return view($this->viewName . 'newEdit', compact(['event', 'cities', 'languages', 'eventTypes', 'status', 'organizers', 'eventMedicines', 'eventSpecialzation', 'eventTags', 'medicines', 'tags', 'specialzations', 'eventDays', 'eventInstructors', 'faqs'
            , 'event_id', 'topics', 'currencies', 'tickets', 'coupons','discounts']));
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

            $input = $request->except(['_token', 'cover_photo']);
            if ($request->hasFile('cover_photo')) {
                $attach_image = $request->file('cover_photo');

                $input['cover_photo'] = $this->UplaodImage($attach_image);
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
            if ($request->medicines) {
                $event->medicines()->sync($request->medicines);
            }

            if ($request->tags) {
                $event->tags()->sync($request->tags);
            }

            if ($request->spicial) {
                $event->specialzations()->sync($request->spicial);
            }

            //kt_ecommerce_add_product_options

            $specialzationsList = $request->kt_ecommerce_add_product_options;
            $spicialIds = [];
            if ($specialzationsList) {
                foreach ($specialzationsList as $index => $opt) {

                    $specialize_id = (int) $specialzationsList[$index]['specialize_id'];
                    if ($specialize_id != 0) {
                        array_push($spicialIds, $specialize_id);
                    }

                }
            }

            //update special-fees

            // $event->specialzations()->sync($spicialIds);

            //update days

            $daysList = $request->kt_docs_repeater_basic;
            $updatedDaysList = Event_days::where('event_id', $event->id)->get();

            if ($updatedDaysList) {
                foreach ($updatedDaysList as $index => $update) {

                    if ($daysList) {
                        foreach ($daysList as $index => $opt) {
                            if (($update->event_date_from != $daysList[$index]['event_date_from']) && ($update->event_date_to != $daysList[$index]['event_date_to'])
                                && ($update->event_time_from != $daysList[$index]['event_time_from']) && ($update->event_time_to != $daysList[$index]['event_time_to'])) {
                                $update->delete();

                            }
                        }
                    }

                }
            }

            if ($daysList) {
                foreach ($daysList as $index => $opt) {

                    $evDay = Event_days::firstOrNew([
                        'event_date_from' => $daysList[$index]['event_date_from'],
                        'event_date_to' => $daysList[$index]['event_date_to'],
                        'event_time_from' => $daysList[$index]['event_time_from'],
                        'event_time_to' => $daysList[$index]['event_time_to'],
                        'event_id' => $event->id,

                    ]);

                    $evDay->event_date_from = $daysList[$index]['event_date_from'];
                    $evDay->event_date_to = $daysList[$index]['event_date_to'];
                    $evDay->event_time_from = $daysList[$index]['event_time_from'];
                    $evDay->event_time_to = $daysList[$index]['event_time_to'];
                    $evDay->event_id = $event->id;

                    $evDay->save();

                }
            }
            //end days
            //update instructors
            $instructorsList = $request->kt_docs_repeater_basic_instructor;
            $updatedinstructorsList = Event_instractor::where('event_id', $event->id)->get();

            if ($updatedinstructorsList) {
                foreach ($updatedinstructorsList as $index => $update) {
                    if ($instructorsList) {
                        foreach ($instructorsList as $index => $opt) {
                            if (($update->name != $instructorsList[$index]['name']) && ($update->bio != $instructorsList[$index]['bio'])) {
                                $update->delete();

                            }
                        }
                    }
                }
            }

            if ($instructorsList) {
                foreach ($instructorsList as $index => $opt) {

                    $evInstractor = Event_instractor::firstOrNew([
                        'name' => $instructorsList[$index]['name'],

                        // 'img' =>  array_key_exists( 'img', $instructorsList) ?? $instructorsList[$index]['img'] ,
                        'bio' => $instructorsList[$index]['bio'],
                        'event_id' => $event->id,

                    ]);

                    $evInstractor->name = $instructorsList[$index]['name'];

                    //$evInstractor->image = $daysList[$index]['image'];
                    $evInstractor->bio = $instructorsList[$index]['bio'];
                    $evInstractor->event_id = $event->id;
                    $bool = isset($instructorsList[$index]['img']);
                    if ($bool) {
                        $attach_Instractorimage = $instructorsList[$index]['img'];

                        $evInstractor->img = $this->UplaodInstuctorImage($attach_Instractorimage);
                    }
                    $evInstractor->save();

                }
            }
            //end instructors
            //start faq
            if ($request->has('activeFaq')) {
                $row = Faq::where('event_id', $request->get('event_id'))->first();

                $row->update(['active' => '1']);
            }
            if ($request->has('deActiveFaq')) {
                $row = Faq::where('event_id', $request->get('event_id'))->first();

                $row->update(['active' => '0']);
            }
            //end faq

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
            // dd($q->getMessage());
            return redirect()->back()->withInput()->with('flash_danger', "Can’t Delete This Row Becouse It Related With Another");

            // return redirect()->back()->withInput()->with('flash_danger', $q->getMessage());

        }
    }

    /* uplaud image
     */
    public function UplaodInstuctorImage($file_request)
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
        $uploadPath = public_path('uploads/event_instructors');

        // Move The image..
        $file->move($uploadPath, $imageName);

        return $imageName;
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

    public function activefaq(Request $request)
    {
        dd($request->all());
        // activeDoctor
        $row = Faq::where('event_id', $request->get('event_id'))->first();

        $row->update(['active' => '1']);
        return redirect()->route($this->routeName . 'index')->with('flash_success', 'تم الحفظ بنجاح');
    }

    public function deActivefaq(Request $request)
    {
        // activeDoctor
        dd($request->all());
        $row = Faq::where('event_id', $request->get('event_id'))->first();

        $row->update(['active' => '0']);
        return redirect()->route($this->routeName . 'index')->with('flash_success', 'تم الحفظ بنجاح');
    }

    public function eventAudiance(Request $request)
    {

        $event_id = $request->get('event_id');
        $topics = Topics_lecture::where('event_id', $request->get('event_id'))->whereNull('topic_id')->get();

        return view($this->viewName . 'viewAudiance', compact(['event_id', 'topics']));

    }

    public function addTopic(Request $request)
    {
        $event_id = $request->get('event_id');
        $evObj = Event::where('id', $request->get('event_id'))->first();
        return view($this->viewName . 'addTopic', compact(['event_id', 'evObj']));
    }

    public function editTopic(Request $request)
    {
        $topic_id = $request->get('topic_id');
        $topic = Topics_lecture::where('id', $request->get('topic_id'))->first();
        $topicLectures = Topics_lecture::where('topic_id', $request->get('topic_id'))->get();
        return view($this->viewName . 'editTopic', compact(['topic_id', 'topic', 'topicLectures']));
    }

    public function savingContent(Request $request)
    {
        DB::beginTransaction();
        try {
            // Disable foreign key checks!
            DB::statement('SET FOREIGN_KEY_CHECKS=0;');
            //save parent
            $parent = [
                'name' => $request->get('name'),
                'link' => $request->get('link'),
                'event_id' => $request->get('event_id'),

            ];
            $topic = Topics_lecture::create($parent);
            //lectures

            $lectureList = $request->kt_docs_repeater_basic;

            foreach ($lectureList as $index => $opt) {
                if (!empty($lectureList[$index]['lecture_title'] && $lectureList[$index]['lecture_link'] && $lectureList[$index]['lecture_duration'])) {
                    $lecture = new Topics_lecture();

                    $lecture->name = $request->get('name');
                    $lecture->link = $request->get('link');

                    $lecture->lecture_title = $lectureList[$index]['lecture_title'];
                    $lecture->lecture_link = $lectureList[$index]['lecture_link'];
                    $lecture->lecture_duration = $lectureList[$index]['lecture_duration'];
                    $lecture->event_id = $request->get('event_id');
                    $lecture->topic_id = $topic->id;

                    $lecture->save();
                }

            }

            DB::commit();
            //Enable foreign key checks!
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');

            return redirect()->route('events.edit', $topic->event_id)->with('flash_success', 'تم الحفظ بنجاح');

            //  return redirect()->route($this->routeName . 'index')->with('flash_success', 'تم الحفظ بنجاح');

        } catch (\Throwable$e) {
            // throw $th;
            DB::rollback();
            dd($e->getMessage());
            // return redirect()->back()->withInput()->withErrors($e->getMessage());

        }
    }

    public function updateContent(Request $request)
    {
        DB::beginTransaction();
        try {
            // Disable foreign key checks!
            DB::statement('SET FOREIGN_KEY_CHECKS=0;');
            //save parent
            $parent = [
                'name' => $request->get('name'),
                'link' => $request->get('link'),
                // 'event_id'=>$request->get('event_id'),

            ];
            $topic = Topics_lecture::where('id', $request->get('topic_id'))->first();
            //  $topic = Topics_lecture::create($parent);
            $topic->update($parent);
            //lectures
//update lecture

            $lectureList = $request->kt_docs_repeater_basic;
            $updatedlectureList = Topics_lecture::where('topic_id', $topic->id)->get();

            if ($updatedlectureList) {
                foreach ($updatedlectureList as $index => $update) {
                    \Log::info(["up", $update]);

                    foreach ($lectureList as $index => $opt) {
                        if (($update->lecture_title != $lectureList[$index]['lecture_title'])
                            // && ($update->lecture_duration != $lectureList[$index]['lecture_duration'])
                            // && ($update->lecture_link != $lectureList[$index]['lecture_link'])
                        ) {
                            \Log::info(["in if del", $update]);
                            $update->delete();

                        } else {
                            //  \Log::info(["in if del out"]);
                            \Log::info(["in << del", $lectureList[$index]['lecture_title']]);
                        }
                    }

                }
            }

            if ($lectureList) {
                foreach ($lectureList as $index => $opt) {

                    $evlecture = Topics_lecture::firstOrNew([
                        'lecture_title' => $lectureList[$index]['lecture_title'],

                        'lecture_link' => $lectureList[$index]['lecture_link'],
                        'lecture_duration' => $lectureList[$index]['lecture_duration'],
                        'topic_id' => $topic->id,

                    ]);
                    $evlecture->name = $topic->name;
                    $evlecture->link = $topic->link;
                    $evlecture->lecture_title = $lectureList[$index]['lecture_title'];
                    $evlecture->lecture_duration = $lectureList[$index]['lecture_duration'];
                    $evlecture->lecture_link = $lectureList[$index]['lecture_link'];
                    $evlecture->event_id = $topic->event_id;
                    $evlecture->topic_id = $topic->id;

                    $evlecture->save();

                }
            }

//end update lecture

            DB::commit();
            //Enable foreign key checks!
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');
            // {{ route('events.edit', $topic->event_id) }}
            return redirect()->route('events.edit', $topic->event_id)->with('flash_success', 'تم الحفظ بنجاح');

        } catch (\Throwable$e) {
            // throw $th;
            DB::rollback();
            dd($e->getMessage());
            // return redirect()->back()->withInput()->withErrors($e->getMessage());

        }
    }

    /****
     * ticket cruds
     */

    public function eventTicket(Request $request)
    {
        $event_id = $request->get('event_id');
        $tickets = Ticket::where('event_id', $request->get('event_id'))->get();
        $evObj = Event::where('id', $request->get('event_id'))->first();
        return view($this->viewName . 'viewTicket', compact(['event_id', 'tickets', 'evObj']));
    }

    public function addTicket(Request $request)
    {
        $event_id = $request->get('event_id');
        $currencies = Currency::all();
        $evObj = Event::where('id', $request->get('event_id'))->first();
        return view($this->viewName . 'addTicket', compact(['event_id', 'currencies', 'evObj']));
    }

    public function savingTicket(Request $request)
    {
        DB::beginTransaction();
        try {
            // Disable foreign key checks!
            DB::statement('SET FOREIGN_KEY_CHECKS=0;');
            //save parent
            $parent = [
                'name' => $request->get('name'),
                'price' => $request->get('price'),
                'description' => $request->get('description'),
                'currency_id' => $request->get('currency_id'),
                'quantity' => $request->get('quantity'),
                'event_id' => $request->get('event_id'),
                'start_date' => $request->get('start_date'),
                'end_date' => $request->get('end_date'),

            ];
            $ticket = Ticket::create($parent);

            DB::commit();

            //Enable foreign key checks!
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');

            return redirect()->route('events.edit', $ticket->event_id)->with('flash_success', 'تم الحفظ بنجاح');

            //  return redirect()->route($this->routeName . 'index')->with('flash_success', 'تم الحفظ بنجاح');

        } catch (\Throwable$e) {
            // throw $th;
            DB::rollback();
            dd($e->getMessage());
            // return redirect()->back()->withInput()->withErrors($e->getMessage());

        }
    }

    public function editTicket(Request $request)
    {
        $ticket_id = $request->get('ticket_id');
        $ticket = Ticket::where('id', $request->get('ticket_id'))->first();
        $currencies = Currency::all();
        return view($this->viewName . 'editTicket', compact(['ticket_id', 'ticket', 'currencies']));
    }

    public function updateTicket(Request $request)
    {
        DB::beginTransaction();
        try {
            // Disable foreign key checks!
            DB::statement('SET FOREIGN_KEY_CHECKS=0;');
            //save parent
            $parent = [
                'name' => $request->get('name'),
                'price' => $request->get('price'),
                'description' => $request->get('description'),
                'currency_id' => $request->get('currency_id'),
                'quantity' => $request->get('quantity'),
                'event_id' => $request->get('event_id'),
                'start_date' => $request->get('start_date'),
                'end_date' => $request->get('end_date'),

            ];
            $ticket = Ticket::where('id', $request->get('ticket_id'))->first();
            $ticket->update($parent);
            // $ticket = Ticket::create($parent);

            DB::commit();

            //Enable foreign key checks!
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');

            // return redirect()->route('events.edit',$request->get('event_id'))->with('flash_success', 'تم الحفظ بنجاح');
            return redirect()->route('events.edit', $ticket->event_id)->with('flash_success', 'تم الحفظ بنجاح');

            //  return redirect()->route($this->routeName . 'index')->with('flash_success', 'تم الحفظ بنجاح');

        } catch (\Throwable$e) {
            // throw $th;
            DB::rollback();
            dd($e->getMessage());
            // return redirect()->back()->withInput()->withErrors($e->getMessage());

        }
    }

    public function selectOrganizerMail(Request $request)
    {
        if ($request->ajax()) {

            $select_value = $request->select_value;
            $out = [];

            $organizer = Organizer::where('id', $select_value)->first();

            echo json_encode(array($organizer->email ?? ''));
        }
    }

    public function selectMedicineSpicial(Request $request)
    {
        \Log::info($request->all());
        if ($request->ajax()) {

            $spicialzations = Specialzation::whereIN('medicine_field_id', $request->get('opts'))->get();

            $output = '<option value=""  > Spicialztion</option>';
            foreach ($spicialzations as $row) {

                $output .= '<option value="' . $row->id . '">' . $row->specialize_name . '</option>';
            }

            echo json_encode(array($output));

        }

    }

    public function filter(Request $request)
    {
        \Log::info($request->all());

        $name = $request->get('name');
        //search func
        $opo = Event::select('*');
        if ($request->get("name") && !empty($request->get("name"))) {
            $opo->where('name', 'like', '%' . $name . '%')
            ;
        }

        if ($request->get("id") && !empty($request->get("id"))) {
            $opo->where('id', '=', $request->get("id"));

        }
        if ($request->get("status_id") && !empty($request->get("status_id"))) {
            $opo->where('status_id', '=', $request->get("status_id"));

        }
        if ($request->get("event_type_id") && !empty($request->get("event_type_id"))) {
            $opo->where('event_type_id', '=', $request->get("event_type_id"));

        }
        if ($request->get("event_type_id") && !empty($request->get("event_type_id"))) {
            $opo->where('event_type_id', '=', $request->get("event_type_id"));

        }

        if ($request->get("medicines") && !empty($request->get("medicines"))) {
            $medicines = $request->get("medicines");
            $opo->whereHas('medicines', function ($q) use ($medicines) {
                $q->whereIn('medicine_field_id', $medicines);
            });

        }
        if ($request->get("specialzations") && !empty($request->get("spicial"))) {
            $spicial = $request->get("spicial");
            $opo->whereHas('medicines', function ($q) use ($spicial) {
                $q->whereIn('specialize_id', $spicial);
            });

        }

        if ($request->get("created_start") && !empty($request->get("created_start"))) {
            $opo->where('created_at', '>=', Carbon::parse($request->get("created_start")));
        }
        if ($request->get("created_end") && !empty($request->get("created_end"))) {
            $opo->where('created_at', '<=', Carbon::parse($request->get("created_end")));
        }

        $rows = $opo->get();
        return view($this->viewName . 'preIndex', compact('rows'))->render();
    }

    /****coupons */
    public function addCopoun(Request $request)
    {
        $event_id = $request->get('event_id');
        $evObj = Event::where('id', $request->get('event_id'))->first();
        $tickets = Ticket::where('event_id', $request->get('event_id'))->get();
        return view($this->viewName . 'addCopoun', compact(['event_id', 'evObj', 'tickets']));
    }

    public function savingCopoun(Request $request)
    {
        DB::beginTransaction();
        try {
            // Disable foreign key checks!
            DB::statement('SET FOREIGN_KEY_CHECKS=0;');
            //save parent
            $parent = [
                'name' => $request->get('name'),

                'coupons_quantity' => $request->get('coupons_quantity'),
                'event_id' => $request->get('event_id'),
                'valid_from' => $request->get('valid_from'),
                'valid_to' => $request->get('valid_to'),

            ];

            if ($request->has('radio_input')) {
                if ($request->get('radio_input') == 1) {
                    $parent['partner_amount_value'] = $request->get('nValue');
                } else {
                    $parent['partner_pct_amount'] = $request->get('nValue');
                }
            }

            if ($request->has('coat_input')) {
                if ($request->get('coat_input') == 1) {
                    $parent['coat_amount_value'] = $request->get('CValue');
                } else {
                    $parent['coat_pct_amount'] = $request->get('CValue');
                }
            }

            $copoun = Coupons_discount::create($parent);
            //tickets Copouns

            if (!empty($request->get('tickets'))) {

                $copoun->tickets()->attach($request->tickets);

            }

            DB::commit();

            //Enable foreign key checks!
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');

            return redirect()->route('events.edit', $copoun->event_id)->with('flash_success', 'تم الحفظ بنجاح');

            //  return redirect()->route($this->routeName . 'index')->with('flash_success', 'تم الحفظ بنجاح');

        } catch (\Throwable$e) {
            // throw $th;
            DB::rollback();
            dd($e->getMessage());
            // return redirect()->back()->withInput()->withErrors($e->getMessage());

        }
    }

    public function editCopoun(Request $request)
    {
        $copoun_id = $request->get('copoun_id');
        $copoun = Coupons_discount::where('id', $request->get('copoun_id'))->first();
        $event_id = $copoun->event_id;
        $evObj = Event::where('id', $copoun->event_id)->first();
        $tickets = Ticket::where('event_id', $copoun->event_id)->get();
        $copounTickets = ticket_coupon_discount::where('coupon_discount_id', $copoun_id)->get();
        return view($this->viewName . 'editCopoun', compact(['copoun_id', 'copoun', 'event_id', 'evObj', 'tickets', 'copounTickets']));}

    public function updateCopoun(Request $request)
    {
        DB::beginTransaction();
        try {
            // Disable foreign key checks!
            DB::statement('SET FOREIGN_KEY_CHECKS=0;');
            //save parent
            $parent = [
                'name' => $request->get('name'),

                'coupons_quantity' => $request->get('coupons_quantity'),
                'event_id' => $request->get('event_id'),
                'valid_from' => $request->get('valid_from'),
                'valid_to' => $request->get('valid_to'),

            ];

            if ($request->has('radio_input')) {
                if ($request->get('radio_input') == 1) {
                    $parent['partner_amount_value'] = $request->get('nValue');
                } else {
                    $parent['partner_pct_amount'] = $request->get('nValue');
                }
            }

            if ($request->has('coat_input')) {
                if ($request->get('coat_input') == 1) {
                    $parent['coat_amount_value'] = $request->get('CValue');
                } else {
                    $parent['coat_pct_amount'] = $request->get('CValue');
                }
            }
            $copoun = Coupons_discount::where('id', $request->get('copoun_id'))->first();
            // $copoun = Coupons_discount::create($parent);
            $copoun->update($parent);
              //tickets Copouns

            if (!empty($request->get('tickets'))) {

                $copoun->tickets()->sync($request->tickets);

            }

            DB::commit();

            //Enable foreign key checks!
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');

            return redirect()->route('events.edit', $copoun->event_id)->with('flash_success', 'تم الحفظ بنجاح');

            //  return redirect()->route($this->routeName . 'index')->with('flash_success', 'تم الحفظ بنجاح');

        } catch (\Throwable$e) {
            // throw $th;
            DB::rollback();
            dd($e->getMessage());
            // return redirect()->back()->withInput()->withErrors($e->getMessage());

        }
    }


    /****Discount */
    public function addDiscount(Request $request)
    {
        $event_id = $request->get('event_id');
        $evObj = Event::where('id', $request->get('event_id'))->first();
        $tickets = Ticket::where('event_id', $request->get('event_id'))->get();
        return view($this->viewName . 'addDiscount', compact(['event_id', 'evObj', 'tickets']));
    }

    public function savingDiscount(Request $request)
    {
        DB::beginTransaction();
        try {
            // Disable foreign key checks!
            DB::statement('SET FOREIGN_KEY_CHECKS=0;');
            //save parent
            $parent = [
                'name' => $request->get('name'),

                'coupons_discount_flag'=>'1',
                'event_id' => $request->get('event_id'),
                'valid_from' => $request->get('valid_from'),
                'valid_to' => $request->get('valid_to'),

            ];

            if ($request->has('radio_input')) {
                if ($request->get('radio_input') == 1) {
                    $parent['partner_amount_value'] = $request->get('nValue');
                } else {
                    $parent['partner_pct_amount'] = $request->get('nValue');
                }
            }

            if ($request->has('coat_input')) {
                if ($request->get('coat_input') == 1) {
                    $parent['coat_amount_value'] = $request->get('CValue');
                } else {
                    $parent['coat_pct_amount'] = $request->get('CValue');
                }
            }

            $copoun = Coupons_discount::create($parent);
            //tickets Copouns

            if (!empty($request->get('tickets'))) {

                $copoun->tickets()->attach($request->tickets);

            }

            DB::commit();

            //Enable foreign key checks!
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');

            return redirect()->route('events.edit', $copoun->event_id)->with('flash_success', 'تم الحفظ بنجاح');

            //  return redirect()->route($this->routeName . 'index')->with('flash_success', 'تم الحفظ بنجاح');

        } catch (\Throwable$e) {
            // throw $th;
            DB::rollback();
            dd($e->getMessage());
            // return redirect()->back()->withInput()->withErrors($e->getMessage());

        }
    }

    public function editDiscount(Request $request)
    {
        $discount_id = $request->get('discount_id');
        $discount = Coupons_discount::where('id', $request->get('discount_id'))->first();
        $event_id = $discount->event_id;
        $evObj = Event::where('id', $discount->event_id)->first();
        $tickets = Ticket::where('event_id', $discount->event_id)->get();
        $discountTickets = ticket_coupon_discount::where('coupon_discount_id', $discount_id)->get();
        return view($this->viewName . 'editDiscount', compact(['discount_id', 'discount',
        'event_id', 'evObj', 'tickets', 'discountTickets']));}

    public function updateDiscount(Request $request)
    {
        DB::beginTransaction();
        try {
            // Disable foreign key checks!
            DB::statement('SET FOREIGN_KEY_CHECKS=0;');
            //save parent
            $parent = [
                'name' => $request->get('name'),

                'coupons_discount_flag'=>'1',
                'event_id' => $request->get('event_id'),
                'valid_from' => $request->get('valid_from'),
                'valid_to' => $request->get('valid_to'),

            ];

            if ($request->has('radio_input')) {
                if ($request->get('radio_input') == 1) {
                    $parent['partner_amount_value'] = $request->get('nValue');
                } else {
                    $parent['partner_pct_amount'] = $request->get('nValue');
                }
            }

            if ($request->has('coat_input')) {
                if ($request->get('coat_input') == 1) {
                    $parent['coat_amount_value'] = $request->get('CValue');
                } else {
                    $parent['coat_pct_amount'] = $request->get('CValue');
                }
            }
            $copoun = Coupons_discount::where('id', $request->get('copoun_id'))->first();
            // $copoun = Coupons_discount::create($parent);
            $copoun->update($parent);
              //tickets Copouns

            if (!empty($request->get('tickets'))) {

                $copoun->tickets()->sync($request->tickets);

            }

            DB::commit();

            //Enable foreign key checks!
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');

            return redirect()->route('events.edit', $copoun->event_id)->with('flash_success', 'تم الحفظ بنجاح');

            //  return redirect()->route($this->routeName . 'index')->with('flash_success', 'تم الحفظ بنجاح');

        } catch (\Throwable$e) {
            // throw $th;
            DB::rollback();
            dd($e->getMessage());
            // return redirect()->back()->withInput()->withErrors($e->getMessage());

        }
    }
}
