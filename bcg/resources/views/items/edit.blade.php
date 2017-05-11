<form action="/item/{{$item->id}}/update" method="post">
{{csrf_field()}}
  <input type="text" name="name" placeholder="name" value="{{$item->name}}"> <br>
  <textarea name="info" placeholder="info">{{$item->info}}</textarea> <br>
  chance <input type="number" name="chance" value="{{$item->chance}}" min="1" max="10">

  <button type="submit" class="lb-close">update item</button>
  <button type="reset"> reset </button>
  
</form>