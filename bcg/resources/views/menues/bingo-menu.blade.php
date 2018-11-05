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
          <?php if (isset($ajax) && $value != '' && $url1 != 'nolink'): ?>
            <a class="lightbox-open" func="{{$url1}}{{$key}}{{$url2}}">
              <div class="full center-div">
              {{$value}}
              </div>
            </a>
          <?php elseif ($value != '' && $url1 != 'nolink'): ?>
            <a href="{{$url1}}{{$key}}{{$url2}}">
            <div class="full center-div">
              {{$value}}
            </div>
            </a>
          </td>
          <?php else: ?>
            <a func="/group/{{$group->id}}/items/new" class="lightbox-open">
              <div class="full center-div">
                {{$value}}
              </div>
            </a>
          </td>
          <?php endif ?>
        <?php endforeach ?>
      </tr>
    <?php endforeach ?>
  </tbody>
</table>