<?php
    session_start();
   $ech="";
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      if($_POST['user']!=null && $_POST['password']!=null)
      {
        $user = $_POST['user'];
        $password = $_POST['password']; 
        $db=mysqli_connect('localhost','root','');
        $sql = "select * from `login`.`logintable` where `userid` = '$user' and `password` = '$password'";
        $result = mysqli_query($db,$sql);
         if(mysqli_num_rows($result)==1)
         {  
            while( $row = mysqli_fetch_assoc($result))
            {
               $_SESSION['user']=$row["userId"];
                header("location: home.php");
            }
         }
         else 
         {
            $ech = "invalid user id or password";
         }
      }
      else
      {
         $ech = "both fields are mandatory ";
      }
   }
?>
<html>
   
   <head>
      <title>Login Page</title>
      
      <link rel="stylesheet" href="custom.css">
      
   </head>
   <script>
      function a()
      {
         document.getElementById("err").innerHTML=null;
      }
      </script>
   <body>
	
      <div style="padding-top:10%;padding-left:30%; height:80%; background-color:blue;" >
         <div style = "width:500px; border: solid 1px #333333; background-color:yellow;  ">
            <div style = "background-color:cyan; height: 20px ; width: max; color:#FFFFFF; padding:25%px; text-align:center; font-size:20px;"><b>Login</b></div>
				
            <div style = "margin:30px;">
               <form action = "" method = "post">
                  <table>
                     <tbody>
                        <tr>
                  <td><label>UserName  :</label></td><td><input type = "text" onclick="a();" class="tb" name = "user" class = "box"/><br /><br /></td>
                        </tr>
                        <tr>
                 <td> <label>Password  :</label></td><td><input type = "password" class="tb" onclick="a();" name = "password" class = "box" /><br/><br /></td>
                        </tr>
                        <tr>
                           <td></td>
                  <td><input type = "submit" class="btn" value = " Submit "/><br /></td>
                        </tr>
                  </tbody>
                  </table>
               </form>
               
               <div style = "font-size:11px; color:#cc0000; margin-top:10px"><h1 id="err" ><?php echo $ech; ?></h1></div>
					
            </div>
				
         </div>
			
      </div>

   </body>
</html>