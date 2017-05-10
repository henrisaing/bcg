<!-- resources/views/card/bingo.blade.php -->
@extends('layouts.app')
@section('content')
<p class="center-text">
  <a class="ajax-main" func="/group/{{$group->id}}/gen">
    [generate new card]
  </a>
</p>

<div id="main">
@component('card.generate', ['card' => $card])
@endcomponent
</div>

<?php if(App::environment('local')): ?>
  <h3>debug</h3>
  <?php $itemsArray = []; ?>

  <?php foreach ($items as $item): ?>
    <?php for($i = 0; $i < $item->chance; $i++): ?>
      <?php $itemsArray[]= $item->name; ?>
    <?php endfor; ?>
  <?php endforeach ?>
  unshoofled
  <?php print_r($itemsArray) ?>
  <hr>

  SHOOFOOLED
  <?php shuffle($itemsArray) ?>
  <?php print_r($itemsArray) ?>
  <hr>

  UNIQUE
  <?php $unique = array_unique($itemsArray) ?>
  <?php shuffle($unique) ?>
  <?php print_r($unique) ?>
  <hr>

  CARD
  <?php print_r($card) ?>
<?php endif; ?>

@endsection