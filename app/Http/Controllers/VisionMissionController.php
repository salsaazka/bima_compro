<?php

namespace App\Http\Controllers;

use App\Models\VisionMission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User;

class VisionMissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $visionMission = VisionMission::all();
       return view('dashboard.vision_mission', compact('visionMission'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      
        // return view('dashboard.vision_mission');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'desc'=> 'required',
            
        ]);
        VisionMission::create([
            'title'=> $request->title,
            'desc' => $request->desc,
    
        ]);
       return redirect()->back()->with('success', 'Anda berhasil menambahkan data!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\VisionMission  $visionMission
     * @return \Illuminate\Http\Response
     */
    public function show(VisionMission $visionMission)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\VisionMission  $visionMission
     * @return \Illuminate\Http\Response
     */
    public function edit(VisionMission $visionMission)
    {
        $visionMission= VisionMission::where('id', $id)->first();
        return view('/dashboard/portfolio', compact('visionMission'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\VisionMission  $visionMission
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title'=>'required',
            'desc'=> 'required',
            
        ]);
        VisionMission::where('id', $id)->update([
            'title'=> $request->title,
            'desc' => $request->desc,
    
        ]);
       return redirect()->back()->with('success', 'Anda berhasil mengedit data!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\VisionMission  $visionMission
     * @return \Illuminate\Http\Response
     */
    public function destroy(VisionMission $visionMission)
    {
        //
    }
}
