<html>
  4
<?php 
  $chAdd = curl_init();
  curl_setopt($chAdd, CURLOPT_URL, 'http://uat.dxplace.com/dxtms/get_line_master');
  curl_setopt($chAdd, CURLOPT_CUSTOMREQUEST, 'GET');
  curl_setopt($chAdd, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($chAdd, CURLOPT_HTTPHEADER, araray(
  "Content-Type: application/json"
));
  $result = curl_exec($chAdd);
  $err    = curl_error($chAdd);
  curl_close($chAdd);

  $de_line_mas = json_decode($result);
  $count_line_mas = count($de_line_mas);

?>
    <form action="Atest_select_member_filter.php" method="GET">  
    <select name="id_line_master">
      <option value="">Choose line@</option>
      <option value="">Choose line@</option>
      <option value="">Choose line@</option>
    </select>
    <button type="submit" name="submit">submit</button>
  </form>

<html>
