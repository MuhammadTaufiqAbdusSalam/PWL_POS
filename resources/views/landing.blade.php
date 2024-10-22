<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page Taufiq Store</title>
    <!-- Menggunakan font Orbitron dari Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        body {
            font-family: 'Orbitron', sans-serif;
            margin: 0;
            padding: 0;
            background-image: url('{{ asset("login.jpg") }}'); /* Ganti dengan gambar Anda */
            background-size: cover;
            background-position: center;
            height: 100vh;
            color: white;
            overflow: hidden;
        }

        /* Navbar styling */
        nav {
            width: 100%;
            background-color: rgba(0, 0, 0, 0.9);
            position: fixed;
            top: 0;
            left: 0;
            padding: 20px 50px;  /* Mengatur padding lebih besar */
            display: flex;
            justify-content: space-between;
            align-items: center;
            z-index: 10;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.5);
            box-sizing: border-box;
        }

        nav .logo {
            font-size: 1.5em;
            color: #00ffcc;
            text-shadow: 0 0 10px #00ffcc, 0 0 20px #00b3cc;
        }

        nav .login-btn {
            background-color: #ff0066;
            color: white;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 1.1em;
            box-shadow: 0 0 10px #ff0066, 0 0 20px #ff0099;
            transition: all 0.3s ease-in-out;
        }

        nav .login-btn:hover {
            background-color: #ff3399;
            box-shadow: 0 0 20px #ff3399, 0 0 40px #ff66cc;
        }

        /* Mengatur posisi container utama */
        .container {
            width: 100%;
            max-width: 900px;
            margin: 0 auto;
            padding: 40px;
            text-align: center;
            background-color: rgba(0, 0, 0, 0.8);
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.7);
            position: relative;
            top: 50%;
            transform: translateY(-50%);
        }

        h1 {
            font-size: 3em;
            margin-bottom: 20px;
            color: #00ffcc;
            text-shadow: 0 0 10px #00ffcc, 0 0 20px #00b3cc;
            animation: glow 1.5s infinite alternate;
        }

        p {
            font-size: 1.1em;
            color: #f0f0f0;
            margin-bottom: 40px;
            text-shadow: 0 0 5px rgba(0, 0, 0, 0.8);
        }

        .btn {
            display: inline-block;
            padding: 15px 40px;
            background-color: #ff0066;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-size: 1.2em;
            box-shadow: 0 0 10px #ff0066, 0 0 20px #ff0099;
            transition: all 0.3s ease-in-out;
        }

        .btn:hover {
            background-color: #ff3399;
            box-shadow: 0 0 20px #ff3399, 0 0 40px #ff66cc;
            transform: scale(1.05);
        }

        @keyframes glow {
            0% { text-shadow: 0 0 10px #00ffcc, 0 0 20px #00b3cc; }
            100% { text-shadow: 0 0 20px #00ffcc, 0 0 30px #00b3cc; }
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav>
        <div class="logo">Taufiq Store</div>
        <a href="{{ route('login') }}" class="login-btn">Login</a>
    </nav>

    <!-- Container utama -->
    <div class="container">
        <h1>Selamat Datang di Toko Hahahahaha!</h1>
        <p>Bergabunglah dalam perjalanan belanja ke masa depan, temukan promo eksklusif, diskon spesial, dan pengalaman belanja yang penuh inovasi!</p>
        <p>Siap memulai petualangan belanja berteknologi tinggi? Klik tombol di bawah ini dan mulailah perjalanan Anda menuju masa depan!</p>
        <a href="{{ route('login') }}" class="btn">Mulai!</a>
    </div>
</body>
</html>
