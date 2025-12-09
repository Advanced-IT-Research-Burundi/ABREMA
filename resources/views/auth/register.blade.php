<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer un compte - ABREMA</title>

    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: "Poppins", sans-serif;
            background: #f4f6f9;
        }

        .register-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
            padding: 50px 0;
        }

        .register-box {
            background: white;
            width: 480px;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            text-align: center;
        }

        .logo {
            width: 110px;
            margin-bottom: 15px;
        }

        h2 {
            color: #006400;
            margin-bottom: 20px;
        }

        .form-group {
            text-align: left;
            margin-bottom: 15px;
        }

        label {
            font-weight: 600;
            color: #333;
        }

        input, select {
            width: 100%;
            padding: 12px;
            border-radius: 6px;
            border: 1px solid #ccc;
            outline: none;
            margin-top: 5px;
            font-size: 15px;
        }

        input:focus {
            border-color: #006400;
        }

        .btn-register {
            width: 100%;
            background: #900;
            color: white;
            padding: 12px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 16px;
            font-weight: 600;
            margin-top: 10px;
            transition: 0.3s;
        }

        .btn-register:hover {
            background: #7a0000;
        }

        .links {
            margin-top: 15px;
            font-size: 14px;
        }

        .links a {
            color: #006400;
            text-decoration: none;
            font-weight: 600;
        }

        .links a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>

<div class="register-container">
    <div class="register-box">

        <img src="/images/logo.png" alt="Logo ABREMA" class="logo">

        <h2>Créer un compte</h2>

        <form action="/register" method="POST">
            @csrf

            <div class="form-group">
                <label>Nom complet</label>
                <input type="text" name="name" required placeholder="Votre nom complet">
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" required placeholder="ex: user@abrema.bi">
            </div>

            <div class="form-group">
                <label>Numéro de téléphone</label>
                <input type="text" name="phone" placeholder="+257 ..." required>
            </div>

            <div class="form-group">
                <label>Mot de passe</label>
                <input type="password" name="password" required placeholder="Choisissez un mot de passe">
            </div>

            <div class="form-group">
                <label>Confirmer le mot de passe</label>
                <input type="password" name="password_confirmation" required placeholder="Confirmez le mot de passe">
            </div>

            <button type="submit" class="btn-register">Créer mon compte</button>
        </form>

        <div class="links">
            <a href="/login">Déjà un compte ? Se connecter</a>
        </div>
    </div>
</div>

</body>
</html>
