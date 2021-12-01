<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Festival;


class FestivalController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $festivals = Festival::all();
        return view('admin.festivals.index', [
            // the view can see the festivals (the green one)
            'festivals' => $festivals
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.festivals.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // when user clicks submit on the create view above
        // the festival will be stored in the DB
        $request->validate([
            'title' => 'required',
            'description' =>'required|max:500',
            'start_date' => 'required|date|after:tomorrow',
            'end_date' => 'required|date|after:tomorrow'
        ]);

        // if validation passes create the new book
        $festival = new Festival();
        $festival->title = $request->input('title');
        $festival->description = $request->input('description');
        $festival->location = $request->input('location');
        $festival->start_date = $request->input('start_date');
        $festival->end_date = $request->input('end_date');
        $festival->contact_name = $request->input('contact_name');
        $festival->contact_email = $request->input('contact_email');
        $festival->contact_phone = $request->input('contact_phone');
        $festival->save();

        return redirect()->route('admin.festivals.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $festival = Festival::findOrFail($id);

        return view('admin.festivals.show', [
            'festival' => $festival
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $festival = Festival::findOrFail($id);

        // get the festival above, and then the edit view
        // will display the festival, and allow the admin
        // to edit the festival.
        return view('admin.festivals.edit', [
            'festival' => $festival
        ]);
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

        //When user clicks on submit on the Edit View
        // this function will be called.

        // first get the existing festival that the user is update
        $festival = Festival::findOrFail($id);
        $request->validate([
            'title' => 'required',
            'description' =>'required|max:500',
            'start_date' => 'required|date|after:tomorrow',
            'end_date' => 'required|date|after:tomorrow'
        ]);

        // if validation passes then update existing festival
        $festival->title = $request->input('title');
        $festival->description = $request->input('description');
        $festival->location = $request->input('location');
        $festival->start_date = $request->input('start_date');
        $festival->end_date = $request->input('end_date');
        $festival->contact_name = $request->input('contact_name');
        $festival->contact_email = $request->input('contact_email');
        $festival->contact_phone = $request->input('contact_phone');
        $festival->save();

        return redirect()->route('admin.festivals.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $festival = Festival::findOrFail($id);
        $festival->delete();

        return redirect()->route('admin.festivals.index');
    }
}
