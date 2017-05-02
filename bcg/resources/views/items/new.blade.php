<!-- resources/views/groups/new.blade.php -->
<form action="/group/{{$group->id}}/create" method="post">
  {{csrf_field()}}
  <input type="text" name="name" placeholder="name"> <br>
  <textarea name="info" placeholder="info"></textarea> <br>
  chance <input type="number" name="chance" min="1" max="10">

  <button type="submit" class="lb-close">create group</button>
</form>