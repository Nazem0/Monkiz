<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Offer;
use App\Models\Task;

class OfferController extends Controller
{
    public function my_offers(){
        if(auth()->user()->role=='Admin'){
            $offers=Offer::all();
        }else{
        $offers=Offer::all()->where('maintenance_center_id', auth()->id());
        }
        $tasks=Task::all();
        return view('my_offers', compact('offers','tasks'));
    }
    public function store(Request $request)
    {
        Offer::create([
            'maintenance_center_id'=>auth()->user()->id,
            'task_id'=>$request['task_id'],
            'description'=>$request['description']
        ]);
        return redirect()->route('tasks')->with('success', 'Offer created successfully.');

    }
    public function update(Request $request,$id)
    {
        $offer = offer::findOrFail($id);
        $offer->update([
            'description' => $request->description
        ]);
        return redirect()->back()->with('success', 'Offer modified successfully.');
    }
    public function destroy(Request $request)
    {
        Offer::destroy($request->offer_id);
        return redirect()->back()->with('success', 'Offer deleted successfully.');


    }
}
