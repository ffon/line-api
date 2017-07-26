<html>
<?php 
    $line_id = $_GET['id_line_master'];
    $access_token = $_GET['access_token'];

    var_dump($line_id);
   // var_dump($access_token);


  $chAdd = curl_init();
  curl_setopt($chAdd, CURLOPT_URL, 'http://uat.dxplace.com/dxtms/get_line_member');
  curl_setopt($chAdd, CURLOPT_CUSTOMREQUEST, 'GET');
  curl_setopt($chAdd, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($chAdd, CURLOPT_HTTPHEADER, array(
  "Content-Type: application/json",
                          )
  );
  $result = curl_exec($chAdd);
  $err    = curl_error($chAdd);
  curl_close($chAdd);
  $de_line_member= json_decode($result);
  $count_line_member = count($de_line_mas);


?>
    <form action="A_push_msg.php" method="GET">
        <?php echo $line_id; ?>
    <select name="mid">
      <option value="">Choose line member</option>
      <?php $i=0; 
        while($i!=$count_line_member){
        if($line_id == $de_line_mas[$i]->id){ ?>
        <option type="text"  value="<?php echo $de_line_member[$i]->user_id; ?>"> <?php echo $de_line_mas[$i]->member_name ?></option> 
        <input type="hidden" value="<?php echo $access_token ?>" name="access_token"/>
      <?php $i++; ?>
      <?}else{
          break;
        }
      }?>
    </select>
    <button type="submit" name="submit">submit</button>
  </form>

</html>
