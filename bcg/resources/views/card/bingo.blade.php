<!-- resources/views/card/bingo.blade.php -->
@extends('layouts.app')
@section('content')

<table class="bingo-table">
  <thead>
    <th>B</th>
    <th>I</th>
    <th>N</th>
    <th>G</th>
    <th>O</th>
  </thead>
  <tbody>
    <?php foreach ($card as $row): ?>
      <tr>
        <?php foreach ($row as $thing): ?>
          <td>{{$thing}}</td>
        <?php endforeach ?>
      </tr>
    <?php endforeach ?>
  </tbody>
</table>

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
@endsection