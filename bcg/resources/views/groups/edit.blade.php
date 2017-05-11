<form action="/group/{{$group->id}}/update" method="post">
{{csrf_field()}}
  <input type="text" name="name" placeholder="name" value="{{$group->name}}"> <br>
  <textarea name="info" placeholder="info">{{$group->info}}</textarea> <br>

  <select name="type">
    <option value="global" 
      <?php if($group->type == 'private'): ?>
        global
      <?php endif; ?>
    >global</option>

    <option value="public" 
      <?php if($group->type == 'public'): ?>
        selected
      <?php endif; ?>
    >public</option>

    <option value="private"
      <?php if($group->type == 'private'): ?>
        selected
      <?php endif; ?>
    >private</option>
  </select>

  <button type="submit" class="lb-close">update item</button>
  <button type="reset"> reset </button>
  
</form>