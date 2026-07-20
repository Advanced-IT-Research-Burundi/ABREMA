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
            margin-bottom: -15px;
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

        /* ---- ICONES POUR VOIR LES CHAMPS ---- */
        .input-wrapper {
            position: relative;
            width: 100%;
        }

        .toggle-visibility {
            position: absolute;
            right: 12px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            font-size: 18px;
            opacity: 0.6;
            user-select: none;
            transition: 0.2s;
        }

        .toggle-visibility:hover {
            opacity: 1;
        }

        /* ---- BOUTONS ---- */
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

        .btn-create {
            width: 100%;
            background: #006400;
            border: none;
            padding: 12px;
            border-radius: 8px;
            color: #fff;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            margin-top: 10px;
            transition: 0.3s;
            display: block;
            text-decoration: none;
        }

        .btn-create:hover {
            background: #004f00;
        }
    </style>
</head>

<body>
    <div class="login-wrapper">
        <div class="login-card">

            <img src="/images/ABREMA_LOGO.png" class="logo" alt="Logo ABREMA">
            <h2>Espace Administrateur</h2>

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- EMAIL -->
                <div class="form-group">
                    <label>Email administrateur</label>
                    <div class="input-wrapper">
                        <input type="email" id="email" name="email" placeholder="admin@abrema.bi" required>
                    </div>
                </div>

                <!-- MOT DE PASSE -->
                <div class="form-group">
                    <label>Mot de passe</label>
                    <div class="input-wrapper">
                        <input type="password" id="password" name="password" placeholder="Mot de passe admin" required>
                        <span class="toggle-visibility" onclick="toggleField('password')">👁️</span>
                    </div>
                </div>

                <button type="submit" class="btn-admin">Se connecter</button>
            </form>
        </div>
    </div>


    <script>
        function toggleField(id) {
            const field = document.getElementById(id);
            field.type = field.type === "password" || field.type === "email" ? "text" : 
                         (id === "email" ? "email" : "password");
        }
    </script>

</body>

</html>
