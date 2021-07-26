<form method="POST" action="{{route('restaurant.update',[$restaurant])}}">
    Title: <input type="text" name="restaurant_title" value="{{$restaurant->title}}">
    Customers: <input type="text" name="restaurant_customers" value="{{$restaurant->customers}}">
    Employees: <input type="text" name="restaurant_employees" value="{{$restaurant->employees}}">
    <select name="menu_id">
        @foreach ($menus as $menu)
            <option value="{{$menu->id}}" @if($menu->id == $restaurant->menu_id) selected @endif>
                {{$menu->title}} {{$menu->price}} {{$menu->weight}} {{$menu->meat}} {{$menu->about}}
            </option>
        @endforeach
    </select>
    @csrf
    <button type="submit">Edit</button>
</form>