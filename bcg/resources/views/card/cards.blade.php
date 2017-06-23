<!-- resources/views/card/cards.blade.php -->
@extends('layouts.bingo')
@section('content')
<h2>My Cards</h2>

<table class="menu-table">
  <thead>
    <th>C</th>
    <th>A</th>
    <th>R</th>
    <th>D</th>
    <th>S</th>
  </thead>
  <tbody>
    <?php foreach ($cards as $card): ?>
      <tr>
        <?php foreach ($card as $spot): ?>
          <td>
          <?php if ($spot != ''): ?>
            <a href="/card/{{$spot}}">
            <div class="full center-div">
              {{$spot}}
            </div>
            </a>
          </td>
          <?php else: ?>
            <div class="full center-div">
              {{$spot}}
            </div>
          </td>
          <?php endif ?>
        <?php endforeach ?>
      </tr>
    <?php endforeach ?>
  </tbody>
</table>

<?php if(App::environment('local')): ?>
  <h3>debug</h3>

  <?php print_r($cards) ?> 
<?php endif; ?>

@endsection