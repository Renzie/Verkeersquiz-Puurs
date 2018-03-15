 <!DOCTYPE html>
 <html>
     <head>
         <meta charset="utf-8">
         <title>Register</title>
     </head>
     <body>
         <form method="get" target="register.php">


             <input type="text" name="pass" id="pass" />
             <button type="submit">Get Hash</button>
        </form>
          <p id="hash">
               <?php if ($_GET["pass"] != "") {
                   echo password_hash($_GET["pass"], PASSWORD_DEFAULT);
               }
                ?>
          </p>


     </body>
 </html>
