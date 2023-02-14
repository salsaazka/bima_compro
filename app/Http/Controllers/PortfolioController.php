<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $portfolio = Portfolio::all();
        return view('dashboard.portfolio', compact('portfolio'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        // return view('dashboard.porfolio');
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
            'image'=> 'required',
            'desc'=> 'required',
            'title'=> 'required',
            'client'=> 'required',

        ]);
        $image = $request->file('image');
        $imgName = time().rand().'.'.$image->extension();

        if(!file_exists(public_path('/assets/img/data/'.$image->getClientOriginalName()))){
            $dPath = public_path('/assets/img/data/');
            $image->move($dPath, $imgName);
            $uploaded = $imgName;
        }else{
            $uploaded = $image->getClientOriginalName();
        }

        $client = $request->file('client');
        $clientName = time().rand().'.'.$client->extension();

        if(!file_exists(public_path('/assets/img/data/'.$client->getClientOriginalName()))){
            $dPathh = public_path('/assets/img/data/');
            $client->move($dPathh, $clientName);
            $uploadedd = $clientName;
        }else{
            $uploadedd = $client->getClientOriginalName();
        }

        Portfolio::create([
            'title' => $request->title,
            'desc' => $request->desc,
            'image' => $uploaded,
            'client' => $uploadedd,
        ]);
        return redirect()->back()->with('success', 'Anda berhasil menambahkan data!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function show(Portfolio $portfolio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function edit(Portfolio $portfolio)
    {
        // $portfolio= Portfolio::where('id', $id)->first();
        // return view('/dashboard/portfolio', compact('portfolio'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Models\Portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $request->validate([
        //     'image'=>'required',
        //     'desc'=> 'required',

        // ]);

        // $image = $request->file('image');
        // $imgName = time().rand().'.'.$image->extension();

        // if(!file_exists(public_path('/assets/img/data/'.$image->getClientOriginalName()))){
        //     $dPath = public_path('/assets/img/data/');
        //     $image->move($dPath, $imgName);
        //     $uploaded = $imgName;
        // }else{
        //     $uploaded = $image->getClientOriginalName();
        // }

        // Portfolio::where('id', $id)->update([
        //     'image'=> $uploaded,
        //     'desc' => $request->desc,

        // ]);

        if ($request->hasFile('image')) {

            $file = $request->file('image');
            $thumbname = time() . '-' . $file->getClientOriginalName();
            $file->move(public_path() . '/assets/img/data' . '/', $thumbname);

            DB::table('portfolios')->where('id', $id)->update([
                'desc' => $request->desc,
                'image' => $thumbname
            ]);
        } else {
            DB::table('portfolios')->where('id', $id)->update([
                'desc' => $request->desc,
            ]);
        }
        return redirect()->back()->with('successUp', 'Anda berhasil mengupdate data');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Portfolio::where('id', $request->id)->delete();
        return redirect()->back()->with('delete', 'Berhasil menghapus data!');
    }
}
