<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Frequência Retro</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap');

        body {
            background: linear-gradient(to right, rgb(8, 7, 80), #92a8d1);
            font-family: 'Press Start 2P', cursive;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            overflow: hidden;
        }

        .container {
            text-align: center;
            background: rgba(255, 255, 255, 0.9);
            padding: 50px;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
            animation: fadeIn 2s ease-in-out;
        }

        h1 {
            font-size: 36px;
            color: #333;
            margin-bottom: 30px;
            text-shadow: 2px 2px #ffa07a;
            animation: textGlow 1.5s infinite;
        }

        .buttons {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 30px;
        }

        .button {
            text-decoration: none;
            color: #fff;
            background: #ff6347;
            padding: 15px 30px;
            border-radius: 5px;
            font-size: 16px;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
            transition: background 0.3s, transform 0.3s;
            animation: bounce 2s infinite;
        }

        .button:hover {
            background: #ff4500;
            transform: translateY(-5px);
        }

        .icon {
            margin-right: 8px;
            vertical-align: middle;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-50px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes textGlow {

            0%,
            100% {
                text-shadow: 2px 2px #ffa07a;
            }

            50% {
                text-shadow: 2px 2px #ff4500;
            }
        }

        @keyframes bounce {

            0%,
            20%,
            50%,
            80%,
            100% {
                transform: translateY(0);
            }

            40% {
                transform: translateY(-15px);
            }

            60% {
                transform: translateY(-10px);
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>SISTEMA DE FREQUÊNCIA RETRO</h1>
        <div class="buttons">
            <a href="./pag_professor.php" class="button">
                <img src="https://img.icons8.com/ios-filled/24/ffffff/teacher.png" class="icon" alt="Professor Icon">
                Login Professor
            </a>
            <a href="./pag_aluno.php" class="button">
                <img src="https://img.icons8.com/ios-filled/24/ffffff/student-male.png" class="icon" alt="Aluno Icon">
                Login Aluno
            </a>
        </div>
    </div>
</body>

</html>