<?php
include 'lib/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];

    // Masukin data pengguna baru ke database
    $stmt = $conn->prepare("INSERT INTO users (username, email) VALUES (?, ?)");
    $stmt->execute([$username, $email]);

    // ke halaman login
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Signup</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
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
            <h3 class="login-heading mb-4">Sign Up here</h3>
                <form method="POST">
                    <div class="mb-3 mt-3">
                        <label for="Username" class="form-label">Username :</label>
                            <input type="text" class="form-control" placeholder="Masukan Username disini"
                                        name="username" required style="border-color: black;">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email :</label>
                                    <input type="email" class="form-control" id="email" placeholder="Masukan Email disini"
                                            name="email" style="border-color: black;">
                                    </div>
                                    <button type="submit" name="btn" class="btn btn-dark text-dark" style="background-color: #FF0000;">Submit</button>
                </form>
        </div>
    </div>
</body>

</html>