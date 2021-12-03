<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LOGIN = SMK TARUNA BANGSA</title>
    <style>
    html,body{
        width: 100%;
    }
    .login-container{
        width: 350px;
        margin: auto;
        border: solid 1pc;
        padding: 25px;
        background-color:#C8E3D4;

    }
    .title{
        text-align: center;
    }
    .input-label{
        width: 200px;
        display: black;
        
    }
    .input{
        padding:5px 0px;
        
    }
    input{
        width:100%;
        background-color:#87AAAA;

    }
    button{
        background-color:#334756;
        color:white;
        border-color:black;
        border-radius:5px;
        padding: 2px 15px;
    }
    h1{
        text-shadow: 10px 5px 10px rgba(0,0,0,0,9);
    }
    button:hover{
        background-color:#1efa8c;
        text-decoration:bold;
        transition-delay:0.1s;
        box-shadow:10px 5px 10px rgba(0,0,0,0,9);

    }
    </style>
    </head>
<body>
 <div class ="login-container">
 <div class="title">
 <h1> LOGIN USER </h1>
 </div>
 <form action=""method="post">
 <div class="input">
   <label for="username"class="input-label">Nama Pengguna</label>
   <input type="text"id="username" name="username" placeholder="Masukan Nama Pengguna">
       </div>
       <div class="input">
       <label for="password" class="input-label">Kata Sandi</label>
       <input type="password" id="password" name="password" placeholder="Masukan Password">
       </div>
       <div class="input">
         <center><button type="submit"class="btn btn-outline-dark" name="login">LOGIN</button>

    </div>
    </form>
    </div>

<?php

include('koneksi.php');

//$user = "joko";
//$katasandi= "1234";



if(isset($_POST['login'])) {
    $username =$_POST['username'];
    $password =$_POST['password'];
    $query = mysqli_query($koneksi,"SELECT * FROM user WHERE username ='$username'&& password = '$password'");
    //if(($user == $_POST['username'])&& ($katasandi == $_POST['password'])){
        if (mysqli_num_rows($query)>0) {
        header('location:sukses.php');
    }else{
        ?>
           <script>
                    alert("Username/Password Salah");
                    </script>
                <?php
    }

}
?>
</body>
</html>
