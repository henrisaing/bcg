<!-- resources/views/groups/index.blade.php -->
@extends('layouts.bingo')
@section('content')

<p class="center-text">
  
<a func="/group/new" class="lightbox-open">[create group]</a>
</p>

<table class="menu-table">
  <thead>
    <th>G</th>
    <th>R</th>
    <th>O</th>
    <th>U</th>
    <th>P</th>
  </thead>
  <tbody>
    <?php foreach ($groups as $group): ?>
      <?php $rights = App\AuthCheck::groupRights($group); ?>
      <tr>
        <td class="green">{{$group->name}}</td>
        <td>
          <a href="/group/{{$group->id}}/items">
            <div class="full center-div">items</div>
          </a>
        </td>
        <td>
          <a href="/group/{{$group->id}}/generate">
            <div class="full center-div">generate card</div>
          </a>
        </td>

        <td class="orange">
        <?php if($rights): ?>
          <a func="/group/{{$group->id}}/edit" class="lightbox-open">
            <div class="full center-div">edit</div>
          </a>
        <?php endif; ?>
        </td>

        <td class="red">
          <?php if($rights): ?>
          <form id="delete-{{$group->id}}" action="/group/{{$group->id}}/delete" method="post">
            {{csrf_field()}}
            {{method_field('delete')}}
            <!-- <a href="#" onclick="document.getElementById('delete-{{$group->id}}').submit();"> -->
              <!-- <div class="full center-div">delete</div> -->
            <!-- </a> -->
            <button type="submit">destroy</button>
          </form>
        <?php endif; ?>
        </td>

      </tr>
    <?php endforeach ?>
  </tbody>
</table>

<?php if(App::environment('local')): ?>
  <h3>Debug</h3>
  <?php print_r($chunks) ?>
<?php endif; ?>
@endsection