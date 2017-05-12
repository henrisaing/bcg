<?php if($rights): ?>
<form action="/group/{{$group->id}}/update" method="post">
{{csrf_field()}}
  <input type="text" name="name" placeholder="name" value="{{$group->name}}" required> <br>
  <textarea name="info" placeholder="info">{{$group->info}}</textarea> <br>

  <select name="type">
    <?php if ($admin): ?>
    <option value="global" 
      <?php if($group->type == 'global'): ?>
        selected
      <?php endif; ?>
    >global</option>
    <?php endif ?>

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
<?php else: ?>
  <input type="text" name="name" placeholder="name" value="{{$group->name}}" readonly> <br>
  <textarea name="info" placeholder="info" readonly>{{$group->info}}</textarea> <br>

  <input type="text" name="" value="{{$group->type}}" readonly>
<?php endif; ?>