<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArticleController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($limit)
    {
        $this->middleware('auth');

        $tags = DB::table('article_tags')->get();
        $article_tags = DB::table('article_tags')->get();

        $categories = DB::table('categories')->get();
        $article_categories = DB::table('article_categories')->get();

        $articles = false;
        
        if ( $limit == 'false' || $limit == false ) {
            $articles = DB::table('articles')->get();
        }else{
            $articles = DB::table('articles')->limit($limit)->get();
        }


        for ($i=0; $i < count($articles); $i++) { 
            unset($articles[$i]->content);
            $cts = [];
            for ($a=0; $a < count($article_categories); $a++) { 
                if (  $articles[$i]->id == $article_categories[$a]->article_id ) {
                    if ( !isset( $articles[$i]->article_categories ) ) {
                        
                        $cat = Category::findOrFail($article_categories[$a]->category_id);
                        unset($cat->created_at);
                        unset($cat->updated_at);
                        array_push($cts, $cat);
                    }else{
                        $cat = Category::findOrFail($article_categories[$a]->category_id);
                        unset($cat->created_at);
                        unset($cat->updated_at);
                        array_push($cts, $cat);
                    }
                }
            }
            $articles[$i]->categories = $cts;

            $tgss = [];
            for ($a=0; $a < count($article_tags); $a++) { 
                if (  $articles[$i]->id == $article_tags[$a]->article_id ) {
                    if ( !isset( $articles[$i]->article_tags ) ) {
                        $ta = Tag::findOrFail($article_tags[$a]->tag_id);
                        unset($ta->created_at);
                        unset($ta->updated_at);
                        array_push($tgss, $ta);
                    }else{
                        $ta = Tag::findOrFail($article_tags[$a]->tag_id);
                        unset($ta->created_at);
                        unset($ta->updated_at);
                        array_push($tgss, $ta);
                    }
                }
            }
            $articles[$i]->tags = $tgss;
        }

        
        return $articles;

    }

    public function view(){

 
        $tags = DB::table('tags')->get();
        $categories = DB::table('categories')->get();
        $articles = DB::table('articles')->get();

        $article_categories = DB::table('article_categories')->get();
        $article_tags = DB::table('article_tags')->get();

        return view('admin.blog.index')->with('article_tags', $article_tags)->with('article_categories', $article_categories)->with('tags', $tags)->with('categories', $categories)->with('articles', $articles);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.blog.article.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Article::create([
            'title' => request('title'),
            'img' => request('img'),
            'description' => request('description'),
            'content' => request('content')
        ]);

        return redirect()->route('article.view');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $article_tags = DB::table('article_tags')->get();

        $article_categories = DB::table('article_categories')->get();
        
        $article = Article::findOrFail($id);


        $cats = [];

        for ($a=0; $a < count($article_categories); $a++) { 
            if (  $article->id == $article_categories[$a]->article_id ) {
                if ( !isset( $article->article_categories ) ) {
                    $cat = Category::findOrFail($article_categories[$a]->category_id);
                    unset($cat->created_at);
                    unset($cat->updated_at);
                    array_push($cats, $cat);
                }else{
                    $cat = Category::findOrFail($article_categories[$a]->category_id);
                    unset($cat->created_at);
                    unset($cat->updated_at);
                    array_push($cats, $cat);
                }
            }
        }
        $article->categories = $cats;

        $tgs = [];
        for ($a=0; $a < count($article_tags); $a++) { 
            if (  $article->id == $article_tags[$a]->article_id ) {
                if ( !isset( $article->article_tags ) ) {
                    $ta = Tag::findOrFail($article_tags[$a]->tag_id);
                    unset($ta->created_at);
                    unset($ta->updated_at);
                    array_push($tgs, $ta);
                }else{
                    $ta = Tag::findOrFail($article_tags[$a]->tag_id);
                    unset($ta->created_at);
                    unset($ta->updated_at);
                    array_push($tgs, $ta);
                }
            }
        }
        $article->tags = $tgs;


        return $article;


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = Article::findOrFail($id);
        
        return view('admin.blog.article.edit')->with('article', $article);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $article = Article::findOrFail($id);

        $article->update([
            'title' => request('title'),
            'img' => request('img'),
            'description' => request('description'),
            'content' => request('content')
        ]);

        return redirect()->route('article.view');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::delete('delete from articles where id = ?',[$id]);
        return redirect()->route('article.view');
    }
}
