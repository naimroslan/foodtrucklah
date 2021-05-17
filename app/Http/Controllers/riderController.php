<?php

namespace App\Http\Controllers;

use App\Rider;
use Illuminate\Http\Request;

class riderController extends Controller
{
    public function index() {

        return view('backend.rider.addRider');
    }

    public function save_rider(Request $request) {

        $rider = new Rider();

        $rider->rider_name = $request->rider_name;
        $rider->rider_phone_number = $request->rider_phone_number;
        $rider->rider_password = $request->rider_password;
        $rider->rider_status = $request->rider_status;
        $rider->added_on = $request->added_on;

        $rider->save();

        return back()->with('sms','Rider added!');
    }

    public function manage_rider() {

        $riders = Rider::all();

        return view('backend.rider.manageRider', compact('riders'));
    }

    public function delete_rider($rider_id) {

        $rider = Rider::find($rider_id);

        $rider->delete();

        return back()->with('sms','Rider deleted!');
    }

    public function inactive_rider($rider_id) {

        $rider = Rider::find($rider_id);

        $rider->rider_status = 0;
        $rider->save();

        return back();
    }

    public function active_rider($rider_id) {

        $rider = Rider::find($rider_id);

        $rider->rider_status = 1;
        $rider->save();

        return back();
    }

    public function update_rider(Request $request) {

       $rider = Rider::find($request->rider_id);

       $rider->rider_name = $request->rider_name;
       $rider->rider_phone_number = $request->rider_phone_number;
       $rider->save();

       return back()->with('sms', 'Rider updated!');

    }
}
