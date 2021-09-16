<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Offer;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Purifier;

class OffersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("offers.index")
            ->with('offers', Offer::orderBy('created_at', 'DESC')->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('offers.create');
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
            'title' => 'required',
            'content' => 'required',
            'industry' => 'required',
            'deadline' => 'required',
        ]);

        Offer::create([
            'title' => $request->input('title'),
            'content' => Purifier::clean($request->input('content')),
            'slug' => SlugService::createSlug(Offer::class, 'slug', $request->title),
            'salary' => $request->input('salary'),
            'industry' => $request->input('industry'),
            'deadline' => $request->input('deadline'),
            'user_id' => auth()->user()->id
        ]);

        return redirect('/oferty')->with('message', 'Dodano ofertę');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        
        $response = Offer::where('slug', $slug)->first();
        if(empty($response)){
            abort(404);
        }
        
        return view('offers.show')
            ->with('offer', $response);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        return view('offers.edit')
            ->with('offer', Offer::where('slug', $slug)->first());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $offer = Offer::where('slug', $slug);
        $offer->delete();

        return redirect('/oferty')
                ->with('message', 'Usunięto ofertę');
    }
}
