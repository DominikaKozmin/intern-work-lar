<?php

namespace App\Http\Controllers;
use App\Models\Article;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Purifier;

class ArticlesController extends Controller
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
        return view('articles.index')
            ->with('articles', Article::orderBy('created_at', 'DESC')->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('articles.create');
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
            'image' => 'required|mimes:jpg,png,jpeg|max:5048',
        ]);
        $newImageName = uniqid().'-'.$request->title.'.'.$request->image->extension();

        $request->image->move(public_path('storage\articles_images'),$newImageName);
        
        Article::create([
            'title' => $request->input('title'),
            'content' => Purifier::clean($request->input('content')),
            'slug' => SlugService::createSlug(Article::class, 'slug', $request->title),
            'image' => $newImageName,
            'user_id' => auth()->user()->id
        ]);

        return redirect('artykuly')->with('message', 'Dodano artykuł');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $response = Article::where('slug', $slug)->first();
        if(empty($response)){
            abort(404);
        }

        return view('articles.show')
            ->with('article', $response)
            ->with('articles', Article::orderBy('created_at', 'DESC')->get());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        return view('articles.edit')
            ->with('article', Article::where('slug', $slug)->first());
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
            'title' => 'required',
            'content' => 'required',
        ]);
        if($request->image==NULL){
            Article::where('slug', $slug)
            ->update([
                'title' => $request->input('title'),
                'content' => Purifier::clean($request->input('content')),
                'slug' => SlugService::createSlug(Article::class, 'slug', $request->title),
                'user_id' => auth()->user()->id
            ]);
        }
        else{
            $newImageName = uniqid().'-'.$request->title.'.'.$request->image->extension();
            $request->image->move(public_path('storage\articles_images'),$newImageName);
            Article::where('slug', $slug)
            ->update([
                'title' => $request->input('title'),
                'content' => Purifier::clean($request->input('content')),
                'slug' => SlugService::createSlug(Article::class, 'slug', $request->title),
                'image' => $newImageName,
                'user_id' => auth()->user()->id
            ]);
        }
            return redirect('/artykuly')
                ->with('message', 'Zaktualizowano artykuł');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $article = Article::where('slug', $slug);
        $article->delete();

        return redirect('/artykuly')
                ->with('message', 'Usunięto artykuł');
    }
}
