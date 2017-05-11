<!-- resources/views/groups/index.blade.php -->
@extends('layouts.app')
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
      <tr>
        <td class="green">{{$group->name}}</td>
        <td>
          <a href="/group/{{$group->id}}/items">
            <div class="full center-div">items</div>
          </a>
        </td>
        <td class="orange">
          <a func="/group/{{$group->id}}/edit" class="lightbox-open">
            <div class="full center-div">edit</div>
          </a>
        </td>
        <td></td>
        <td class="red">
          <form id="delete-{{$group->id}}" action="/group/{{$group->id}}/delete" method="post">
            {{csrf_field()}}
            {{method_field('delete')}}
            <a href="#" onclick="document.getElementById('delete-{{$group->id}}').submit();">
              <div class="full center-div">delete</div>
            </a>
          </form>
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