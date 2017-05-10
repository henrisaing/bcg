@extends('layouts.app')
@section('content')
<form action="/card/{{$card->id}}/update" method="post">
{{csrf_field()}}
<button type="submit">update card</button>
<table class="bingo-table">
  <thead>
    <th>B</th>
    <th>I</th>
    <th>N</th>
    <th>G</th>
    <th>O</th>
  </thead>
  <tbody>
    <?php $counter = 0; ?>
    <?php foreach ($slots as $key => $row): ?>
      <tr>
        <?php foreach ($row as $index => $slot): ?>
          <td position={{$counter}} class="{{$styles[$key][$index]}}">{{$slot}}</td>
          <input type="hidden" name="slot[]" value="{{$slot}}">
          <input type="hidden" id="{{$counter}}" name="style[]" value="{{$styles[$key][$index]}}">
          <?php $counter++; ?>
        <?php endforeach ?>
      </tr>
    <?php endforeach ?>
  </tbody>
</table>

</form>
<?php if(App::environment('local')): ?>
  <h3>debug</h3>
  <?php print_r($styles) ?>
<?php endif; ?>
@endsection