<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::all();
        return response()->json(['success' => $events]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $response = false;
        $data = json_decode($request->getContent(), true);
        $attributes['name'] = $data['name'];
        $event = Event::firstOrCreate($attributes, $data);
        if ($event) {
            $response = $event;
        }
        return response()->json(['success' => $response]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $event = Event::find($id);
        return response()->json(['success' => $event]);
    }

    public function findByDate($date)
    {
        $events = Event::where('date', $date)->get();
        return response()->json(['success' => $events]);
    }

    public function findByName($name)
    {
        $param = $name . '%';
        $events = Event::where('name', 'like' ,$param)->get();
        return response()->json(['success' => $events]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
