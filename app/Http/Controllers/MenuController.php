<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use Validator;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = Menu::all();
        return view('menu.index', ['menus' => $menus]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('menu.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),
            [
                'menu_title' => ['required', 'min:5', 'max:200'],
                'menu_price' => ['required', 'min:1', 'max:1000'],
                'menu_weight' => ['required', 'integer', 'min:1', 'max:1000'],
                'menu_meat' => ['required', 'min:1', 'max:1000'],
                'menu_about' => ['required'],
            ],
        );
        if ($validator->fails()) {
            $request->flash();
            return redirect()->back()->withErrors($validator);
        } 
        
        $menu = new Menu;
        $menu->title = $request->menu_title;
        $menu->price = $request->menu_price;
        $menu->weight = $request->menu_weight;
        $menu->meat = $request->menu_meat;
        $menu->about = $request->menu_about;        
        $menu->save();
        return redirect()->route('menu.index')->with('success_message', 'Adding is succesfully.');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        return view('menu.edit', ['menu' => $menu]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu $menu)
    {
        $validator = Validator::make($request->all(),
            [
                'menu_title' => ['required', 'min:3', 'max:200'],
                'menu_price' => ['required', 'min:1', 'max:1000'],
                'menu_weight' => ['required', 'integer', 'min:1', 'max:1000'],
                'menu_meat' => ['required', 'min:1', 'max:1000'],
                'menu_about' => ['required'],
            ],
        );
        if ($validator->fails()) {
            $request->flash();
            return redirect()->back()->withErrors($validator);
        }

        $menu->title = $request->menu_title;
        $menu->price = $request->menu_price;
        $menu->weight = $request->menu_weight;
        $menu->meat = $request->menu_meat;
        $menu->about = $request->menu_about;
        $menu->save();       
        
        return redirect()->route('menu.index')->with('success_message', 'Edit is succesfully.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {        
       
        if($menu->menuRestaurants->count()){
        return redirect()->back()->with('success_message', 'Cannot be deleted! Must be approved by the manager!');
    }
    
    $menu->delete();
    return redirect()->route('menu.index')->with('success_message', 'Delete is succesfully.');
    

    }
}
