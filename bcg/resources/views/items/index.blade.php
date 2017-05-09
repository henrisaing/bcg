<!-- resources/views/items/index.blade.php -->
@extends('layouts.app')
@section('content')

<a func="/group/{{$group->id}}/items/new" class="lightbox-open">[add item]</a>

<a href="/group/{{$group->id}}/generate">[make card]</a>

@component('menues.bingo-menu', [
  'chunks' => $chunks,
  'title' => $title,
  'url1' => $url1,
  'url2' => $url2,
])

@endcomponent


@endsection