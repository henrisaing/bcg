<!-- resources/views/groups/index.blade.php -->
@extends('layouts.app')
@section('content')

<p class="center-text">
  
<a func="/group/new" class="lightbox-open">[create group]</a>
</p>

@component('menues.bingo-menu', [
  'chunks' => $chunks,
  'title' => 'GROUP',
  'url1' => '/group/',
  'url2' => '/items',
])

@endcomponent
<?php if(App::environment('local')): ?>
  <h3>Debug</h3>
<?php endif; ?>
@endsection