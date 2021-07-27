<form method="POST" action="{{route('menu.store')}}">
    Title: <input type="text" name="menu_title">
    Price: <input type="text" name="menu_price">
    Weight: <input type="text" name="menu_weight">
    Meat: <input type="text" name="menu_meat">
    About: <textarea name="menu_about"></textarea>
    @csrf
    <button type="submit">Add</button>
 </form>
 