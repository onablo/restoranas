<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use App\Models\Menu;
use Illuminate\Http\Request;
use Validator;


class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $restaurants = Restaurant::all();
       return view('restaurant.index', ['restaurants' => $restaurants]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $menus = Menu::all();
       return view('restaurant.create', ['menus' => $menus]);
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
            'restaurant_title' => ['required', 'min:3', 'max:100'],
            'restaurant_customers' => ['required', 'integer', 'min:1', 'max:100'],
            'restaurant_employees' => ['required', 'integer', 'min:1', 'max:100'],
            'menu_id' => ['required', 'integer', 'min:1'],
        ],
        );
        
        if ($validator->fails()) {
            $request->flash();
            return redirect()->back()->withErrors($validator);
        }
 

       $restaurant = new Restaurant;

       $restaurant->title = $request->restaurant_title;
       $restaurant->customers = $request->restaurant_customers;
       $restaurant->employees = $request->restaurant_employees;       
       $restaurant->menu_id = $request->menu_id;
       $restaurant->save();
       return redirect()->route('restaurant.index')->with('success_message', 'Adding is succesfully.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function show(Restaurant $restaurant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function edit(Restaurant $restaurant)
    {
        $menus = Menu::all();
       return view('restaurant.edit', ['menus' => $menus, 'restaurant' => $restaurant]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Restaurant $restaurant)
    {
        $validator = Validator::make($request->all(),
            [
                'restaurant_title' => ['required', 'min:3', 'max:100'],
                'restaurant_customers' => ['required', 'integer', 'min:1', 'max:100'],
                'restaurant_employees' => ['required', 'integer', 'min:1', 'max:100'],
                'menu_id' => ['required', 'integer', 'min:1'],
            ],
        );
        
        if ($validator->fails()) {
            $request->flash();
            return redirect()->back()->withErrors($validator);
        }

        $restaurant->title = $request->restaurant_title;
        $restaurant->customers = $request->restaurant_customers;
        $restaurant->employees = $request->restaurant_employees;       
        $restaurant->menu_id = $request->menu_id;
        $restaurant->save();
        return redirect()->route('restaurant.index')->with('success_message', 'Edit is succesfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Restaurant $restaurant)
    {
        $restaurant->delete();
       return redirect()->route('restaurant.index')->with('success_message', 'Delete is succesfully.');

    }
}
