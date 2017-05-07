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