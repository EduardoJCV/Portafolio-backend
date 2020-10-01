<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\ArticleCategories;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = DB::table('categories')->get();

        return $categories;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.blog.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Category::create([
            'name' => request('name')
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



        $article_categories = ArticleCategories::whereIn('category_id', [$id])->get();

        $articles = Category::findOrFail( $id );

        $list = [];

        for ($i=0; $i < count($article_categories); $i++) { 
            $art = Article::findOrFail( $article_categories[$i]->article_id );
            array_push($list, $art);
        }

        for ($i=0; $i < count($list); $i++) { 
            unset($list[$i]->content);


            $arr = [];

            for ($a=0; $a < count($article_categories); $a++) { 
                
                
                
                if (  $list[$i]->id == $article_categories[$a]->article_id ) {
                    if ( !isset( $list[$i]->article_categories ) ) {
                        
                        
                        $cat = Category::findOrFail($article_categories[$a]->category_id);
                        unset($cat->created_at);
                        unset($cat->updated_at);
                        array_push($arr, $cat);

                    }else{
                        // return $list;
                        $cat = Category::findOrFail($article_categories[$a]->category_id);
                        unset($cat->created_at);
                        unset($cat->updated_at);
                        array_push($arr, $cat);
                    }
                }

                
            }

            $list[$i]->categories = $arr;

            $arr2 = [];

            for ($a=0; $a < count($article_tags); $a++) { 

                
                if (  $list[$i]->id == $article_tags[$a]->article_id ) {
                    if ( !isset( $list[$i]->article_tags ) ) {
                        $list[$i]->tags = [];
                        $ta = Tag::findOrFail($article_tags[$a]->tag_id);
                        unset($ta->created_at);
                        unset($ta->updated_at);
                        array_push($arr2, $ta);
                    }else{
                        $ta = Tag::findOrFail($article_tags[$a]->tag_id);
                        unset($ta->created_at);
                        unset($ta->updated_at);
                        array_push($arr2, $ta);
                    }
                }

            }

            $list[$i]->tags = $arr2;
        }

        $articles->list = $list;

        return $articles;
    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        
        return view('admin.blog.category.edit')->with('category', $category);
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
        $category = Category::findOrFail($id);

        $category->update([
            'name' => request('name')
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
        DB::delete('delete from categories where id = ?',[$id]);
        return redirect()->route('article.view');
    }
}
