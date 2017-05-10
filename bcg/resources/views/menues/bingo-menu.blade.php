<!-- view requires 
chunks[id]=>name 
$title (string)
$url1 (start of url before id)
$url1 (end of url after id)
-->
<table class="menu-table">
  <thead>
    <?php for($i = 0; $i < strlen($title); $i++): ?>
      <th>{{$title[$i]}}</th>
    <?php endfor; ?>
  </thead>
  <tbody>
    <?php foreach ($chunks as $chunk): ?>
      <tr>
        <?php foreach ($chunk as $key => $value): ?>
          <td>
          <?php if ($value != '' && $url1 != 'nolink'): ?>
            <a href="{{$url1}}{{$key}}{{$url2}}">
            <div class="full center-div">
              {{$value}}
            </div>
            </a>
          </td>
          <?php else: ?>
            <div class="full center-div">
              {{$value}}
            </div>
          </td>
          <?php endif ?>
        <?php endforeach ?>
      </tr>
    <?php endforeach ?>
  </tbody>
</table>