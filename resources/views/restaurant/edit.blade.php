@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">Edit restaurant</div>

               <div class="card-body">                 
                <form method="POST" action="{{route('restaurant.update',[$restaurant])}}">

                    <div class="form-group">
                        <label>Title: </label>
                        <input type="text" class="form-control" name="restaurant_title" value="{{old('restaurant->title', $restaurant->title)}}">
                        <small class="form-text text-muted">Restaurant title.</small>
                    </div>
                    
                    <div class="form-group">
                        <label>Customers: </label>
                        <input type="text" class="form-control" name="restaurant_customers" value="{{old('restaurant->customers', $restaurant->customers)}}">
                        <small class="form-text text-muted">Restaurant Customers.</small>
                    </div>
                    
                    <div class="form-group">
                        <label>Employees: </label>
                        <input type="text" class="form-control" name="restaurant_employees" value="{{old('restaurant->employees', $restaurant->employees)}}">
                        <small class="form-text text-muted">Restaurant Employees.</small>
                    </div>

                    <div class="form-group">
                        <select name="menu_id" class="form-control">
                            @foreach ($menus as $menu)
                                <option value="{{$menu->id}}" @if($menu->id == $restaurant->menu_id) selected @endif>
                                    {{$menu->title}} {{$menu->price}} {{$menu->weight}} {{$menu->meat}} {{$menu->about}}
                                </option>
                            @endforeach
                        </select>
                        <small class="form-text text-muted">Select restaurant menu from the list .</small>
                    </div>                        
                    @csrf
                    <button style="padding: 3px 16px; margin: 3px 15px; border-radius: 12px; color: dark-gray; background-color: #ffed4a;" type="submit">Edit</button>
                </form>
               </div>
           </div>
       </div>
   </div>
</div>
@endsection



