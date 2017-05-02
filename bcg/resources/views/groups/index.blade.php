<!-- resources/views/groups/index.blade.php -->
@extends('layouts.app')
@section('content')

<a func="/group/new" class="lightbox-open">[create group]</a>
<?php foreach ($groups as $group): ?>
  <br>
  <a href="/group/{{$group->id}}/items">
    {{$group->name}} |
    {{$group->info}} |
    {{$group->type}} |
    </a>
<?php endforeach ?>

@endsection