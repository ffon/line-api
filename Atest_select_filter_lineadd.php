<html>
  0
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
  <form action="Atest_select_member_filter.php" method="GET">  
  
    <select  name="id_line_master">
      <option value="">Choose line@</option>
      <?php $i=0; while($i!=$count_line_mas){ ?>
        <option type="text"  value="<?php echo $de_line_mas[$i]->id; ?>"> <?php echo $de_line_mas[$i]->line_name ?></option> 
        <input type="hidden" value="<?php echo $de_line_mas[$i]->access_token ?>" name="access_token"/>
      <?php $i++; ?>
      <?}?>
    </select>
    <button type="submit" name="submit">submit</button>
  </form>


<html>
