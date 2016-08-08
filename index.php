<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
    </head>
    
    <body>
        <?php $code=$_GET['code']; ?>
        <script>
            getems(<?php echo $code;?>);
        </script>
        
        
        <div>
<!--            <form method="get" action="https://www.emsgo.net/publicapi">
                <input type="hidden" name="action" value="tracking">
                <input type="text" name="code" placeholder="ใส่เลขไปรษณีย์">
                <input type="submit">
            </form>-->
            <form method="get" action="index.php">
                <input type="hidden" name="action" value="tracking">
                <input type="text" name="code" placeholder="ใส่เลขไปรษณีย์">
                <input type="submit">
            </form>
            <table id="result" border="1" width="400">

            </table>
        </div>
        
    </body>
</html>
<script src="http://code.jquery.com/jquery-latest.js"></script>
<script type="text/javascript">

	$(document).ready(function(){
            var result=$.getJSON('https://www.emsgo.net/publicapi?action=tracking&code=<?php echo $code; ?>',function(result){
                var success = result.success;
                var code = result.code;
                var count = result.count;
                var data = result.data;
                var here = result.data[0].institution;
                var des =result.data[0].description;
                var status= result.data[0].status;
                var time = result.data[0].time;
                var error= result.msg;
    //            $("#result").append( error);
    //            $("#result").append( count);
    //            $("#result").append( 'เลข คือ '+code);


                var numcount=count-1;
    //            for(i=0;i>=0;i++){
    //                var here = result.data[i].institution;
    //                var des =result.data[i].description;
    //                var status= result.data[i].status;
    //                var time = result.data[i].time;
    //                $("#result").append( '<br> เวลา ' + time + "<br> หน่วยงาน " +here+"<br> คำอธิบาย " +des+ "<br> ผลการนำจ่าย " +status+"<br><br>");
    //            }
    //            $("#result").append( '<div>');
                $("#result").append( '<tr> <td>เวลา</td> <td>หน่วยงาน</td> <td>คำอธิบาย</td> <td>ผลการนำจ่าย</td> </tr>');
                for(var i=numcount; i>=0; i--){
                    var here = result.data[i].institution;
                    var des =result.data[i].description;
                    var status= result.data[i].status;
                    var time = result.data[i].time;
                    if(status===undefined){
                        status="";
                        $("#result").append( ' <tr><td> ' + time + " </td><td> " +here+" </td><td> " +des+ " </td><td> " +status+"</td></tr>");
                    }else
                    $("#result").append( ' <tr><td> ' + time + " </td><td> " +here+" </td><td> " +des+ " </td><td> " +status+"</td></tr>");
                }
                 
            });
	});
</script>


