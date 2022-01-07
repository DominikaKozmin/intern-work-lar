<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Accommodation;
use App\Models\Photo;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Purifier;

class AccommodationsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $search = (Request()->get('search') != null) ? Request()->get('search') : "";
        $location = (Request()->get('location') != null) ? Request()->get('location') : "";
        if($location==null){
            $accommodations = Accommodation::query()
            ->where('title', 'LIKE', '%'.$search.'%')
            ->orWhere('content', 'LIKE', '%'.$search.'%')
            ->get();
        }
        else{
            $accommodations = Accommodation::query()
            ->where('city_id', $location)
            ->where(function($query){
                return $query
                ->where('title', 'LIKE', '%'.Request()->get('search').'%')
                ->orWhere('content', 'LIKE', '%'.Request()->get('search').'%');
            })->get();
        }
        
        return view('accommodation.index')
            ->with('accommodations', $accommodations)
            ->with('userid', Auth::id());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('accommodation.create');
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
            'title' => 'required|string',
            'price' => 'required|numeric',
            'city_id' => 'required|numeric',
            'rooms' => 'required|numeric',
            'square_meters' => 'required|numeric',
            'content' => 'required|string',
            'image' => 'required|mimes:jpg,png,jpeg|max:5048',
        ]);
        $newImageName = uniqid().'-'.$request->title.'.'.$request->image->extension();

        $request->image->move(public_path('storage\accommodations_images'),$newImageName);

        $accommodation = Accommodation::create([
            'title' => $request->input('title'),
            'slug' => SlugService::createSlug(Accommodation::class, 'slug', $request->title),
            'price' => $request->input('price'),
            'city_id' => $request->input('city_id'),
            'user_id' => auth()->user()->id,
            'rooms' => $request->input('rooms'),
            'square_meters' => $request->input('square_meters'),
            'content' => Purifier::clean($request->input('content')),
        ]);
        Photo::create([
            'accommodation_id' => $accommodation->id,
            'path' => $newImageName
        ]);
        return redirect('zakwaterowanie')
            ->with('message', 'Dodano zakwaterowanie');
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        return view('accommodation.show')
            ->with('accommodation', Accommodation::where('slug', $slug)->first());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        return view('accommodation.edit')
            ->with('accommodation', Accommodation::where('slug', $slug)->first());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $request->validate([
            'title' => 'required|string',
            'price' => 'required|numeric',
            'city_id' => 'required|numeric',
            'rooms' => 'required|numeric',
            'square_meters' => 'required|numeric',
            'content' => 'required|string',
        ]);
        if($request->image==NULL){
            Accommodation::where('slug', $slug)
            ->update([
                'title' => $request->input('title'),
                'price' => $request->input('price'),
                'city_id' => $request->input('city_id'),
                'user_id' => auth()->user()->id,
                'rooms' => $request->input('rooms'),
                'square_meters' => $request->input('square_meters'),
                'content' => Purifier::clean($request->input('content')),
            ]);
        }
        else{
            $newImageName = uniqid().'-'.$request->title.'.'.$request->image->extension();
            $request->image->move(public_path('storage\accommodations_images'),$newImageName);
            Accommodation::where('slug', $slug)
            ->update([
                'title' => $request->input('title'),
                'price' => $request->input('price'),
                'city_id' => $request->input('city_id'),
                'user_id' => auth()->user()->id,
                'rooms' => $request->input('rooms'),
                'square_meters' => $request->input('square_meters'),
                'content' => Purifier::clean($request->input('content')),
            ]);
        }
            return redirect('/zakwaterowanie/'.$slug)
                ->with('message', 'Zaktualizowano zakwaterowanie');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $accommodation = Accommodation::where('slug', $slug);
        $accommodation->delete();

        return redirect('/zakwaterowanie')
                ->with('message', 'Usunięto zakwaterowanie');
    }
}
