<html>
  5
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

<form>
    <select name="line_id">
        <option value="">line@</option>
        <?php $i=0;
            while($i!=$count_line_mas){?>
            <option value="<?php $lineId=$de_line_mas[$i]->id; echo $lineId; ?>"><?php echo $lineId;echo " "; echo $de_line_mas[$i]->line_name; ?></option>
            <?
            $i++;
            }?>
            <?php echo $de_line_mas[$lineId]->access_token; ?>
    </select>
</form>

</html>
