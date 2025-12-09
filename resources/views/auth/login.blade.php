<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Connexion ABREMA</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: "Poppins", sans-serif;
            background: #f1f4f8;
        }

        .login-wrapper {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-card {
            width: 420px;
            background: #fff;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .logo {
            width: 110px;
            margin-bottom: 10px;
        }

        h2 {
            margin: 10px 0 20px 0;
            color: #006400;
            font-size: 24px;
            font-weight: 700;
        }

        .form-group {
            text-align: left;
            margin-bottom: 18px;
        }

        label {
            font-weight: 600;
            color: #333;
        }

        input {
            width: 100%;
            padding: 12px;
            border-radius: 6px;
            border: 1px solid #ccc;
            margin-top: 6px;
            font-size: 15px;
        }

        input:focus {
            border-color: #006400;
            outline: none;
        }

        .btn-admin {
            width: 100%;
            background: #900;
            border: none;
            padding: 12px;
            border-radius: 8px;
            color: #fff;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            margin-top: 10px;
            transition: 0.3s;
        }

        .btn-admin:hover {
            background: #7a0000;
        }

        .admin-links {
            margin-top: 15px;
            font-size: 14px;
        }

        .admin-links a {
            color: #006400;
            font-weight: 600;
            text-decoration: none;
        }

        .admin-links a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="login-wrapper">
        <div class="login-card"> <img src="/images/ABREMA_LOGO.png" class="logo" alt="Logo ABREMA">
            <h2>Espace Administrateur</h2>
            <form method="POST" action="{{ route('login') }}"> @csrf <div class="form-group"> <label>Email
                        administrateur</label> <input type="email" name="email" placeholder="admin@abrema.bi"
                        required> 
                    </div>
                <div class="form-group"> <label>Mot de passe</label> <input type="password" name="password"
                        placeholder="Mot de passe admin" required>
                </div> <button type="submit" class="btn-admin">Se
                    connecter</button>
            </form>
            {{-- <div class="admin-links"> <a href="{{ route('password.request') }}">Mot de passe oublié ?</a> </div> --}}
        </div>
    </div>
</body>

</html>
