<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login</title>
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Noto+Sans:wght@700&family=Poppins:wght@400;500;600&display=swap');
            *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
            }

            body{
            margin: 0;
            padding: 0;
            background: linear-gradient(120deg,#FF0000, #FFEC00);
            height: 100vh;
            overflow: hidden;
            }

            .centrar{
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 400px;
            background: white;
            border-radius: 10px;
            box-shadow: 10px 10px 15px rgba(0,0,0,0.05);
            }

            .centrar h1{
            text-align: center;
            padding: 20px 0;
            border-bottom: 1px solid silver;
            }

            .centrar form{
            padding: 0 40px;
            box-sizing: border-box;
            }

            form .estilo{
            position: relative;
            border-bottom: 2px solid #adadad;
            margin: 30px 0;
            }

            .estilo input{
            width: 100%;
            padding: 0 5px;
            height: 40px;
            font-size: 16px;
            border: none;
            background: none;
            outline: none;
            }

            .estilo label{
            position: absolute;
            top: 50%;
            left: 5px;
            color: #adadad;
            transform: translateY(-50%);
            font-size: 16px;
            pointer-events: none;
            transition: .5s;
            }

            .estilo span::before{
            content: '';
            position: absolute;
            top: 40px;
            left: 0;
            width: 0%;
            height: 2px;
            background: rgb(175, 114, 1);
            transition: .5s;
            }

            .estilo input:focus ~ label,
            .estilo input:valid ~ label{
            top: -5px;
            color: black;
            }

            .estilo input:focus ~ span::before,
            .estilo input:valid ~ span::before{
            width: 100%;
            }

            input[type="submit"]{
            width: 100%;
            height: 50px;
            border: 1px solid;
            background: rgb(175, 114, 1);
            border-radius: 25px;
            font-size: 18px;
            color: #e9f4fb;
            font-weight: 700;
            cursor: pointer;
            outline: none;
            margin-bottom: 20px;
            }

            input[type="submit"]:hover{
            border-color: #2691d9;
            transition: .5s;
            }
        </style>
    </head>
    <body>
        POR ALGUN MOTIVO QUE DESCONOZCO SOLO PUEDE LOGEARSE CON adminuser / admindwes
        <div class="centrar">
            <h1>Login</h1>
            <form action="?method=credenciales" method="post">
                <div class="estilo">
                    <input type="text" name="user" required>
                    <span></span>
                    <label>Usuario</label>
                </div>
                <div class="estilo">
                    <input type="password" name="psword" required>
                    <span></span>
                    <label>Contraseña</label>
                </div>
                <input type="submit" value="Login">
            </form>
        </div>

    </body>
</html>