<?php

namespace App\Http\Controllers;

use App\Models\Industry;
use App\Models\Offer;
use App\Models\User;
use App\Models\Ability;
use App\Models\Salary;
use App\Models\SalaryTier;
use App\Models\Country;
use App\Models\Type;
use App\Models\Level;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\DB;
use Purifier;

class OffersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
        $this->middleware('role:Employer', ['except' => ['index', 'show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $searchedAbility = Request()->get('ability');
        $searchedIndustry= Request()->get('industry');
        $searchedLocation = Request()->get('location');

        $index = [];

        $industryCount = Industry::orderBy('id', 'ASC')->get()->toarray();
        for($i=0; $i<count($industryCount);$i++){
            $industryCount[$i]['count'] = offer::where('industry', $i+1)->count();
        }
        $industryCount['tablename'] = "Branża";
        if($searchedIndustry){
            $industryCount[$searchedIndustry-1]['checked'] = true;
        }

        $ablilitesCount = Ability::orderBy('id', 'ASC')->get()->toarray();
        for($i=0; $i<count($ablilitesCount);$i++){
            $ablilitesCount[$i]['count'] = Ability::find($i+1)->offers()->count();
        }
        $ablilitesCount['tablename'] = "Umiejętności";
        if($searchedAbility){
            $ablilitesCount[$searchedAbility-1]['checked'] = true;
        }

        $levelsCount = Level::orderBy('id', 'ASC')->get()->toarray();
        for($i=0; $i<count($levelsCount);$i++){
            $levelsCount[$i]['count'] = Level::find($i+1)->offers()->count();
        }
        $levelsCount['tablename'] = "Poziomy";

        $salaryCount = Salary::orderBy('id', 'ASC')->get()->toarray();
        $salaryCount[0]['count'] = Offer::where('salary','>','2000')->count();
        $salaryCount[1]['count'] = Offer::where('salary','>','4000')->count();
        $salaryCount['tablename'] = "Kwoty Wynagrodzenia";

        $countriesCount = Country::orderBy('id', 'ASC')->get()->toarray();
        $countriesCount['tablename'] = "Lokacja";
        if($searchedLocation){
            $countriesCount[$searchedLocation-1]['checked'] = true;
        }

        $typesCount = Type::orderBy('id', 'ASC')->get()->toarray();
        for($i=0; $i<count($typesCount);$i++){
            $typesCount[$i]['count'] = Type::find($i+1)->offers()->count();
        }
        $typesCount['tablename'] = "Typy";

        array_push($index, $industryCount, $ablilitesCount, $levelsCount, $salaryCount, $countriesCount, $typesCount);

        return view("offers.index")
            ->with('offers', Offer::orderBy('created_at', 'DESC')->get()->toarray())
            ->with('offersRightPanel', Offer::orderBy('created_at', 'DESC')->get())
            ->with('employers', User::where('role', 'employer')->orderBy('created_at', 'DESC')->limit(5)->get())
            ->with('employersCount', User::where('role', 'employer')->count())
            ->with('countOffer', Offer::all()->count())
            ->with('leftBarData', $index);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {  
        return view('offers.create')
            ->with('abilities', Ability::All())
            ->with('levels', Level::All())
            ->with('types', Type::All())
            ->with('industries', Industry::All());
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
            'title' => ['required', 'max:255'],
            'salary' => 'required|numeric',
            'content' => 'required',
            'industry' => 'required',
            'deadline' => 'required|date',
            'abilities' => 'required|array',
            'levels' => 'required|array',
            'types' => 'required|array'

        ]);
        $offer = new Offer();
        $offer->title = $request->input('title');
        $offer->content = Purifier::clean($request->input('content'));
        $offer->slug = SlugService::createSlug(Offer::class, 'slug', $request->title);
        $offer->salary = $request->input('salary');
        $offer->industry = $request->input('industry');
        $offer->deadline = $request->input('deadline');
        $offer->user_id = auth()->user()->id;
        $offer->save();
        foreach($request->abilities as $ability){
            $offer->abilites()->attach($ability);
        }
        foreach($request->levels as $level){
            $offer->levels()->attach($level);
        }
        foreach($request->types as $type){
            $offer->types()->attach($type);
        }
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
        //dd($response->languages);
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
        $offers = Offer::where('slug', $slug)->first();
        $abilities = Ability::All()->toArray();
        $levels = Level::All()->toArray();
        $types = Type::All()->toArray();
        $checkedAbilities = $offers->abilites()->get()->toarray();
        $checkedLevels = $offers->levels()->get()->toarray();
        $checkedTypes = $offers->types()->get()->toarray();
        foreach($checkedAbilities as $checkedAbility){
            $abilities[$checkedAbility['id']-1]['checked'] = true;
        }
        foreach($checkedLevels as $checkedLevel){
            $levels[$checkedLevel['id']-1]['checked'] = true;
        }
        foreach($checkedTypes as $checkedType){
            $types[$checkedType['id']-1]['checked'] = true;
        }
        return view('offers.edit')
            ->with('industries', Industry::All())
            ->with('offer', $offers)
            ->with('abilities', $abilities)
            ->with('levels', $levels)
            ->with('types', $types);
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
        $request->validate([
            'title' => ['required', 'max:255'],
            'salary' => 'required|numeric',
            'content' => 'required',
            'industry' => 'required',
            'deadline' => 'required|date',
            'abilities' => 'required|array',
            'levels' => 'required|array',
            'types' => 'required|array'

        ]);

        $offer = Offer::where('slug', $slug)->first();
        $offer->title = $request->input('title');
        $offer->content = Purifier::clean($request->input('content'));
        $offer->salary = $request->input('salary');
        $offer->industry = $request->input('industry');
        $offer->deadline = $request->input('deadline');
        $offer->user_id = auth()->user()->id;
        $offer->save();
        $offer->abilites()->detach();
        $offer->levels()->detach();
        $offer->types()->detach();
        foreach($request->abilities as $ability){
            $offer->abilites()->attach($ability);
        }
        foreach($request->levels as $level){
            $offer->levels()->attach($level);
        }
        foreach($request->types as $type){
            $offer->types()->attach($type);
        }

        return redirect('/oferty/'.$slug)
            ->with('message', 'Zaktualizowano ofertę');
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
