@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">Restaurants</div>

               <div class="card-body">
                <ul class="list-group">  
                 
                @foreach ($restaurants as $restaurant)
                    <li class="list-group-item">
                        <div class="list-container">
                            <div class="list-container__content">

                                <span class="list-container__content__restaurant">{{$restaurant->title}} customers: {{$restaurant->customers}}</span>
                                <span class="list-container__content__menu">{{$restaurant->restaurantMenu->title}} price: {{$restaurant->restaurantMenu->price}} about: {{$restaurant->restaurantMenu->about}}</span>
                                
                            </div>

                            <div class="list-container__buttons">
                                <a href="{{route('restaurant.edit',[$restaurant])}}" style="padding: 3px 16px; margin: 3px 15px; border-radius: 12px; color: dark-gray; background-color: #ffed4a;">Edit</a>
                                <form method="POST" action="{{route('restaurant.destroy', [$restaurant])}}">
                                    @csrf
                                    <button style="padding: 0px 7px; margin: 0px 10px; border-radius: 12px; color: red; background-color: #f6993f;" type="submit">Delete</button>
                                </form>
                            </div>
                        </div>
                    </li>                      
                @endforeach
                </ul>

               </div>
           </div>
       </div>
   </div>
</div>
@endsection


