@foreach ($restaurants as $restaurant)
<a href="{{route('restaurant.edit',[$restaurant])}}">{{$restaurant->title}} {{$restaurant->restaurantMenu->price}} {{$restaurant->restaurantMenu->weight}} {{$restaurant->restaurantMenu->meat}} {{$restaurant->restaurantMenu->about}}</a>
<form method="POST" action="{{route('restaurant.destroy', [$restaurant])}}">
 @csrf
 <button type="submit">Delete</button>
</form>
<br>
@endforeach