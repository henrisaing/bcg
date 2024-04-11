<form action="/card/new" method="post">
{{csrf_field()}}
<p class="center-text">
  <button type="submit" class="link blue-text">[save card to account]</button>
</p>
<table class="bingo-table">
  <thead>
    <th>B</th>
    <th>I</th>
    <th>N</th>
    <th>G</th>
    <th>O</th>
  </thead>
  <tbody>
    <?php $counter = 0; ?>
    <?php foreach ($card as $row): ?>
      <tr>
        <?php foreach ($row as $thing): ?>
          <td position={{$counter}} title={{$thing}}>{{$thing}}</td>
          <input type="hidden" name="slot[]" value="{{$thing}}">
          <input type="hidden" id="{{$counter}}" name="style[]" value="none">
          <?php $counter++; ?>
        <?php endforeach ?>
      </tr>
    <?php endforeach ?>
  </tbody>
</table>

</form>