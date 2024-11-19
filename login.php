<?php
// session_start();
require_once 'lib/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];

    // cari pengguna dari email
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    // Jika pengguna ditemukan, simpan ke session dan arahkan ke halaman utama
    if ($user) {
        $_SESSION['iduser'] = $user['id'];
        header("Location: index.php");
        exit();
    } else {
        $error = "apakah kamu belum daftar akun?";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
    .login {
        min-height: 100vh;
    }

    .login-heading {
        font-weight: 300;
    }

    .btn-login {
        font-size: 0.9rem;
        letter-spacing: 0.05rem;
        padding: 0.75rem 1rem;
    }
    </style>
</head>
<body>
<div class="container ps-md-0 mt-5 mb-5">
        <div class="row g-0">
             <div class="col-md-9 col-lg-8 mx-auto">
                <h3 class="login-heading mb-4">Login Disini</h3>
                     <?php if (isset($error)) echo "<p>$error</p>"; ?>
						<form method="POST">
                        <div class="mb-3">
                        <label for="email" class="form-label">Email :</label>
                        	<input type="email" class="form-control" id="email" placeholder="Masukan Email disini"
                                name="email" style="border-color: white;">
                                </div>
                                    <button type="submit" name="btn" class="btn btn-dark text-light" style="background-color: #FF0000;">Submit</button>
                                    <p class="mt-3">Apakah Kamu tidak punya akun? <a href="register.php" class="text-dark">Buat akun di sini!!</a></p>
                     	</form>
        	</div>
    </div>
</body>
</html>