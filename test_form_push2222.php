<!DOCTYPE html>
<html lang="th">
   4
<head>
    <title>Push Messages</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
        .head-form h1 {
            padding-top: 30px;
            padding-bottom: 50px;
        }
        #myModal {
            margin-top: 100px;
        }
        .button-sc .button {
            margin-bottom: 30px;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-xs-12 head-form">
                <h1 align = "center">Push Massages</h1>
            </div>
            
            <div class="col-md-8 col-md-offset-2">
                <form action="push_msg_selcet_no_fix_token.php.php" method="GET">
                    <div class="form-group">
                          <?php
                            $chAdd = curl_init();
                            curl_setopt($chAdd, CURLOPT_URL, 'url');
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
                        <label>Line@</label><br>
                            
                           <select id="token" name="token_line_mas">
                               <?php for($j=0;$j<$count_line_mas;$j++){ ?>
                                    <option  value="<?php echo $de_line_mas[$j]->id  ?>" > <?php echo $de_line_mas[$j]->id; echo $de_line_mas[$j]->line_name;  ?></option>
                                <? } ?> 
                           </select>
                        
                            <br> 
                
                        <label>Text</label>
                        <textarea class="form-control" rows="8" id="textArea" name="textArea"></textarea>
                    </div>
                    
                    <!--buttonMember-->
                    <div class="form-group" align="center">
                        <button type="button" onclick="member_bt()" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal" style="margin-top:30px;margin-bottom:20px;">
                        MEMBER
                        </button>
                    </div>
                    <!--Modal-->
                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <form method="GET">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="myModalLabel">Member</h4>
                                       
                                       
                                       
                                    </div>
                                    <div class="container">
                                       
                                        <div class="checkbox">
                                            <?php
                                                    
                                                $chAdd = curl_init();
                                                curl_setopt($chAdd, CURLOPT_URL, 'url');
                                                curl_setopt($chAdd, CURLOPT_CUSTOMREQUEST, 'GET');
                                                curl_setopt($chAdd, CURLOPT_RETURNTRANSFER, true);
                                                curl_setopt($chAdd, CURLOPT_HTTPHEADER, array(
                                                "Content-Type: application/json",
                                                                        )
                                                );
                                                $result = curl_exec($chAdd);
                                                $err    = curl_error($chAdd);
                                                curl_close($chAdd);
                                            
                                                $de = json_decode($result);
                                                $count = count($de);
                                               
                                                
                                                ?>
                                            
                                            <input type="text" name"idMaster" id="id-master">
                                            <?php
                                            
                                           $idmaster = $_GET['idMaster'];
                                           var_dump($idmaster);
                                           echo "2";
                                            for($i=0;$i<$count;$i++){ ?>
                                            <div class="checkbox">
                                                
                                                <label><input type="checkbox" value="<?php echo $de[$i]->user_id; ?>" name="mid[]"> <?php echo $de[$i]->member_name; echo "  "; echo $de[$i]->line_master_id; echo $de_line_mas[$i]->id; ?></label>
                                            </div>
                                           <?php }?>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary" name="submit">Summit</button>
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                     
                        
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        $('#myModal').on('shown.bs.modal', function () {
            $('#myInput').focus()
        });
         function member_bt() {
             
             console.log(document.getElementById("token").value);
             var id_master = document.getElementById("token").value; 
            $('#id-master').val(id_master);
//              $.get("https://glacial-sea-38867.herokuapp.com/test_form_push2222.php",
//                 {
//                     id_mas:id_master
//                 }
//              );
        }
    </script>


</body>

</html>
