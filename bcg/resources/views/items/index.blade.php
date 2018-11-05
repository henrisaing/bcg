<!-- resources/views/items/index.blade.php -->
@extends('layouts.bingo')
@section('content')
<p class="center-text">

  <?php if($rights): ?>
  <a func="/group/{{$group->id}}/items/new" class="lightbox-open">[add item]</a>
  <?php endif; ?>

  <a href="/group/{{$group->id}}/generate">[generate bingo card]</a>
</p>

@component('menues.bingo-menu', [
  'chunks' => $chunks,
  'title' => $title,
  'url1' => $url1,
  'url2' => $url2,
  'group' => $group,
  'ajax' => 'true',
])

@endcomponent


@endsection