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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $index = [];
        $industryCount = DB::select('select industries.name, COUNT(*) as count from `offers` INNER JOIN industries ON offers.industry=industries.id GROUP BY industries.name ORDER BY COUNT(*) DESC;');
        $industryCount['tablename'] = "Branża";
        $ablilitesCount = Ability::orderBy('id', 'ASC')->get()->toarray();
        $ablilitesCount['tablename'] = "Umiejętności";
        $levelsCount = Level::orderBy('id', 'ASC')->get()->toarray();
        $levelsCount['tablename'] = "Poziomy";
        $salaryCount = Salary::orderBy('id', 'ASC')->get()->toarray();
        $salaryCount['tablename'] = "Kwoty Wynagrodzenia";
        $countriesCount = Country::orderBy('id', 'ASC')->get()->toarray();
        $countriesCount['tablename'] = "Lokacja";
        $typesCount = Type::orderBy('id', 'ASC')->get()->toarray();
        $typesCount['tablename'] = "Typy";
        array_push($index, $industryCount, $ablilitesCount, $levelsCount, $salaryCount, $countriesCount, $typesCount);
        //dd(Offer::orderBy('created_at', 'DESC')->get()->toarray());
        //$index = json_encode($index);
        //$index="zxcv";
        //dd(gettype($index));
        $offersCountlist = DB::select('select industries.name, COUNT(*) as count from `offers` INNER JOIN industries ON offers.industry=industries.id GROUP BY industries.name ORDER BY COUNT(*) DESC;');
        //$ablilitesCountList = DB::select('select abilities.name, COUNT(*) as count from `offers` INNER JOIN industries ON offers.industry=industries.id GROUP BY industries.name ORDER BY COUNT(*) DESC;');
        
        // TESTY
        //$test = Level::find(2)->levels;
        $test = Offer::orderBy('created_at', 'DESC')->get();
        dd(Offer::find(2));


        // KONIEC TESTÓW

        return view("offers.index")
            ->with('offers', Offer::orderBy('created_at', 'DESC')->get()->toarray())
            ->with('offersRightPanel', Offer::orderBy('created_at', 'DESC')->get())
            ->with('employers', User::whereNotNull('company_name')->orderBy('created_at', 'DESC')->limit(5)->get())
            ->with('employersCount', User::whereNotNull('company_name')->count())
            ->with('countOffer', Offer::whereNotNull('id')->count())
            ->with('leftBarData', $index);
    }

    public function zxc(){
        return view('employee');
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
        //dd($request);
        $request->validate([
            'title' => ['required', 'max:255'],
            'content' => 'required',
            'industry' => 'required',
            'deadline' => 'required|date',
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
