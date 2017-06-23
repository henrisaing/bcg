@extends('layouts.bingo')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <table class="bingo-table">
        <thead>
          <th>H</th>
          <th>O</th>
          <th>M</th>
          <th>E</th>
        </thead>
        <tbody>
          <tr>
            <td>
              <a href="/groups">
                  <div class="full center-div">
                      Groups
                  </div>
              </a>            
            </td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>
              <a href="/mycards">
                  <div class="full center-div">
                      My Cards
                  </div>
              </a> 
            </td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>
<?php if(App::environment('local')): ?>
  <h3>debug</h3>
  <?php foreach ($groups as $group): ?>
      {{$group->name}} <br>
  <?php endforeach ?>
<?php endif; ?>
@endsection
