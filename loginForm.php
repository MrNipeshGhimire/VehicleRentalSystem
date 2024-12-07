<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        *{
            margin:0;
            padding:0;
            font-family: sans-serif;
        }
        .btn-login{
            padding:10px 15px;
            background-color: black;
            color:#fff;
            cursor: pointer;
        }
        .overlay{
            width:100%;
            position: fixed;
            top:0%;
            background-color: rgba(0,0,0,0.5);
            height:100vh;
            z-index: -1;
            opacity:0;
            transition: 1s;
        }
        .showoverlay{
            opacity: 1;
            z-index: 1;
        }
        
        .login-form{
            width:350px;
            padding:30px 20px;
            background-color: #fff;
            position:absolute;
            transition:2s;
            left:50%;
            top:-50%;    /* + 50 banauda show hunxa */
            transform: translate(-50%,-50%);
            box-shadow: 0px 0px 10px 3px #ccc;
            z-index: 1;
        }
        .showloginform{
            top:50%;
        }
        .login-form input{
            width:100%;
            margin-bottom: 15px;
            height:35px;
        }
        .login-form button{
            background-color: black;
            color:#fff;
            padding:10px 15px;
        }
        .login-form span{
            position:absolute;
            right:0px;
            width:30px;
            height:30px;
            background-color:green;
            color:#fff;
            text-align: center;
            line-height: 30px;
            top:0px;
            cursor:pointer;
        }
    </style>
</head>
<body>
    <button class="btn-login" onclick="showModal()">Login</button>
    <div class="overlay" onclick="closeModal()"></div>
    <div class="login-form">
        <span onclick="closeModal()">&times;</span>
        <form action="">
           <div>
              <label for="">UserName</label>
              <input type="text">
           </div>
           <div>
            <label for="">Password</label>
            <input type="password">
         </div>
         <button>Login</button>
        </form>
    </div>
</body>
<script>
    function showModal(){
        document.querySelector('.overlay').classList.add('showoverlay');
        document.querySelector('.login-form').classList.add('showloginform');
    }
    function closeModal(){
        document.querySelector('.overlay').classList.remove('showoverlay');
        document.querySelector('.login-form').classList.remove('showloginform');
    }
</script>
</html>