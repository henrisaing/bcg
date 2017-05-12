<!-- resources/views/groups/new.blade.php -->
<form action="/group/{{$group->id}}/items/create" method="post">
  {{csrf_field()}}
  <input type="text" name="name" placeholder="name" required> <br>
  <textarea name="info" placeholder="info"></textarea> <br>
  chance <input type="number" name="chance" value="5" min="1" max="10">

  <button type="submit" class="lb-close">add item</button>
</form>