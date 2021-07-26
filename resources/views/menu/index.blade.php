@foreach ($menus as $menu)
<a href="{{route('menu.edit',$menu)}}">{{$menu->title}} {{$menu->price}} {{$menu->weight}} {{$menu->meat}} {{$menu->about}}</a>
  <form method="POST" action="{{route('menu.destroy', $menu)}}">
   @csrf
   <button type="submit">Delete</button>
  </form>
  <br>
@endforeach

    
       