@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">Edit Menu</div>

               <div class="card-body">
                <form method="POST" action="{{route('menu.update',[$menu])}}">
                    <div class="form-group">
                        <label>Title: </label>
                        <input type="text" class="form-control" name="menu_title" value="{{old('menu_title', $menu->title)}}">
                        <small class="form-text text-muted">Menu title.</small>
                    </div>
                    
                    <div class="form-group">
                        <label>Price: </label>
                        <input type="text" class="form-control" name="menu_price" value="{{old('menu_price', $menu->price)}}">
                        <small class="form-text text-muted">Menu price.</small>
                    </div>
                    
                    <div class="form-group">
                        <label>Weight: </label>
                        <input type="text" class="form-control" name="menu_weight" value="{{old('menu_weight', $menu->weight)}}">
                        <small class="form-text text-muted">Menu weight.</small>
                    </div>

                    <div class="form-group">
                        <label>Meat: </label>
                        <input type="text" class="form-control" name="menu_meat" value="{{old('menu_meat', $menu->meat)}}">
                        <small class="form-text text-muted">Menu meat.</small>
                    </div>

                    <div class="form-group">
                        <label>About: </label>
                        <textarea name="menu_about" class="form-control"></textarea>
                        <small class="form-text text-muted">Menu about.</small>
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
