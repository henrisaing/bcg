<!-- resources/views/items/index.blade.php -->
@extends('layouts.app')
@section('content')

<a func="/group/{{$group->id}}/items/new" class="lightbox-open">[add item]</a>
<?php foreach ($items as $item): ?>
  <br>
  <a href="/group/{{$group->id}}/items">
    {{$item->name}} |
    {{$item->info}} |
    {{$item->chance}} |
    </a>
<?php endforeach ?>

@endsection