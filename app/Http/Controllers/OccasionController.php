<?php

namespace App\Http\Controllers;

use App\Occasion;
use App\OccasionRegistration;
use App\OccasionRegistrationView;
use App\Deduction;
use App\Lookup;
use Illuminate\Http\Request;

class OccasionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($param=0)
    {
        $occasions = Occasion::when($param, function($query) use ($param){
            return $query->where('occasion_date', '>', date('Y-m-d'));
        })->get();
        return view('tables.occasions', ['occasions' => $occasions]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('forms.occasions');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $occasion = Occasion::create($request->except(['_token']));
        session(['toast_message' => 'The event has been created.']);
        return redirect('/occasion');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Occasion  $occasion
     * @return \Illuminate\Http\Response
     */
    public function show(Occasion $occasion)
    {
        $occasion->load(['occasion_registration_view']);
        return view('displays.occasion', ['occasion' => $occasion]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Occasion  $occasion
     * @return \Illuminate\Http\Response
     */
    public function edit(Occasion $occasion)
    {
        return view('forms.occasions', ['occasion' => $occasion]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Occasion  $occasion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Occasion $occasion)
    {
        $occasion->fill($request->except(['_token', '_method']));
        $occasion->save();
        session(['toast_message' => 'The event has been updated.']);
        return redirect('/occasion');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Occasion  $occasion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Occasion $occasion)
    {
        $occasion->delete();
        session(['toast_message' => 'The event has been deleted.']);
        return redirect('/occasion');
    }

    public function register(Occasion $occasion)
    {
        $user = auth()->user();
        $u = OccasionRegistrationView::where(['occasion_id' => $occasion->id, 'user_id' => $user->id])->first();
        if($u){
            session(['toast_message' => 'You had already registered for this event.']);
            return back();
        }
        $deduction = new Deduction;
        $deduction->user_id = $user->id;
        $deduction->deduction_amount = $occasion->nonmember_price;
        if($user->is_member) $deduction->deduction_amount = $occasion->member_price;
        $save = $deduction->pre_save();



        if($save){
            $oc = OccasionRegistration::create([
                'deduction_id' => $deduction->id,
                'occasion_id' => $occasion->id,
            ]);
            session(['toast_message' => 'You have registered for ' . $occasion->occasion]);
        }
        return back();
    }

    public function deregister(Occasion $occasion)
    {
        $user = auth()->user();
        $u = OccasionRegistrationView::where(['occasion_id' => $occasion->id, 'user_id' => $user->id])->first();
        if(!$u){
            session(['toast_message' => 'You were not registered for this event.']);
            return back();
        }

        $deduction = Deduction::find($u->deduction_id);
        $deduction->delete();

        $oc = OccasionRegistration::find($u->id);
        $oc->delete();

        session(['toast_message' => 'You have de-registered for ' . $occasion->occasion]);
        return back();
    }


}
