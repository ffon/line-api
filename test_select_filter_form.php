<html>
<?php 
  $chAdd = curl_init();
  curl_setopt($chAdd, CURLOPT_URL, 'http://uat.dxplace.com/dxtms/get_line_master');
  curl_setopt($chAdd, CURLOPT_CUSTOMREQUEST, 'GET');
  curl_setopt($chAdd, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($chAdd, CURLOPT_HTTPHEADER, array(
  "Content-Type: application/json",
                          )
  );
  $result = curl_exec($chAdd);
  $err    = curl_error($chAdd);
  curl_close($chAdd);

  $de_line_mas = json_decode($result);
  $count_line_mas = count($de_line_mas);
  
  
?>
  
  <select id='keep-order' multiple='multiple'>
    <option value='elem_1'>elem 1</option>
    <option value='elem_2'>elem 2</option>
    <option value='elem_3'>elem 3</option>
    <option value='elem_4'>elem 4</option>
    <option value='elem_100'>elem 100</option>
  </select>
  
  <script>
    $('#keep-order').multiSelect({ keepOrder: true });
  </script>
<html>
