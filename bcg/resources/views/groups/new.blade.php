<!-- resources/views/groups/new.blade.php -->
<form action="/group/create" method="post">
  {{csrf_field()}}
  <input type="text" name="name" placeholder="name"> <br>
  <textarea name="info" placeholder="info"></textarea> <br>

  <select name="type">
    <option value="global">global</option>
    <option value="public">public</option>
    <option value="private">private</option>
  </select>

  <button type="submit" class="lb-close">create group</button>
</form>