<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return view('category.index');

        // $categories = Category::latest()->get();  //追記
        return view('dashboard.categories.index');  //追記
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return dd($request->all());

        request()->validate(
            ['name' => 'required|unique:categories'],
            [
                'name.required' => 'カテゴリーを入力してください。',
                'name.unique' => 'そのカテゴリーは既に追加されています。'
            ]
        );

        Category::create([
            'name' => request('name')
        ]);

        return redirect()->back()->with('message', 'カテゴリーが追加されました。');  //追記
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        return view('dashboard.categories.edit');
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
        request()->validate(
            ['name' => 'required|unique:categories'],
            [
                'name.required' => 'カテゴリーを入力してください。',
                'name.unique' => 'そのカテゴリーは既に追加されています。'
            ]
        );

        $category = Category::find($id);
        $category->name = request('name');
        $category->save();
        return redirect('/category')->with('message', 'カテゴリーが編集されました。');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect('/category')->with('message', 'カテゴリーが削除されました。');
    }
}
