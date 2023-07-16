<!DOCTYPE html> 
<html>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <head> 
        <meta http-equiv='content-type' content='text/html; charset=utf-8'/>
        <meta id="meta" name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css" />
        <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
        <script src="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
        <title> 帳號 </title>
    </head>     
    <body>                 
    <div data-role="header">
        <a href='/bms/index.php' data-icon='home' data-iconpos='notext' class='ui-btn-left'></a>
        <h2>帳號</h2>
        <a href="#" data-icon="back" data-iconpos="notext" data-rel="back" class="ui-btn-right"></a>
    </div>
    <div data-role="content">
        <table id='tblScore'>    
            <tr><td>學號：</td><td><input type='text' name='student_id' id='student_id'/></td> </tr>
            <tr><td>姓名：</td><td><input type='text' name='name' id='name'/></td>  </tr>
            <tr><td>班級：</td><td><input type='text' name='class' id='class'/></td>  </tr>
            <tr><td>座號：</td><td><input type='text' name='seat' id='seat'/></td>  </tr>
            <tr><td>手機：</td><td><input type='text' name='phone' id='phone'/></td>  </tr>
            <tr><td colspan='2'><button type="button">新增學生</button></td>  </tr>
        </table>
    </div>
    </body>
<style>
#tblScore tr:nth-child(even){background-color: #f2f2f2;}
#tblScore tr:hover {background-color: #ddd;}
</style>
<script> 
    $("button").click(function(){
        console.log("The paragraph was clicked.");
    });
    $("input").change(function(){
        console.log($(this).attr("name")+" was changed:"+$(this).val());
    });  
    $("#name").change(function(){
        console.log("HaHaHa:"+$(this).val());
    });
</script>
</html>
