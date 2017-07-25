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
  <form action="test_select_member_filter.php" method="GET">  
  <?php $i=0; while($i!=$count_line_mas){ ?>
  <select class="ui fluid search dropdown" multiple="">
    <option value="">Choes line@</option>
    <option value="<?php echo $de_line_mas->id; ?>" ><?php echo $de_line_mas[i]->line_name ?></option>
  </select>
  <?php $i++; ?>
  <?}?>
    <button type="submit" name="submit">
  </form>

<html>
