<!-- resources/views/groups/index.blade.php -->
@extends('layouts.app')
@section('content')

<a func="/group/new" class="lightbox-open">[create group]</a>

@component('menues.bingo-menu', [
  'chunks' => $chunks,
  'title' => 'GROUP',
  'url1' => '/group/',
  'url2' => '/items',
])

@endcomponent

<h3>Debug</h3>
@endsection