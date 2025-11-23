
<?php
session_start();
require 'includes/db.php';

$message = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = trim($_POST["email"]);
    $mdp   = $_POST["mdp"];
    $nom   = trim($_POST["nom"]);

    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        $message = "Email already registered.";
    } else {
        $hash = password_hash($mdp, PASSWORD_DEFAULT);
        $stmt = $pdo->prepare("INSERT INTO users (nom, email, mdp) VALUES (?, ?, ?)");
        if ($stmt->execute([$nom, $email, $hash])) {
            header("Location: login.php?success=1"); // <-- must come before any output
            exit;
        } else {
            $message = "Something went wrong. Please try again.";
        }
    }
}

// Only include navbar AFTER all headers
require 'includes/navbar.php';
?>

<style>
* {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
}

/* Center wrapper */
.container-center {
    width: 100%;
    display: flex;
    justify-content: center;
    padding: 20px;
}

/* Register Card */
.register-wrapper {
    background: #fff;
    width: 100%;
    max-width: 500px;
    padding: 35px 32px;
    border-radius: 18px;
    border: 1px solid #e4e4e7;
    box-shadow: 0 10px 25px rgba(0,0,0,0.08);
}

.logo-placeholder {
    text-align: center;
    margin-bottom: 15px;
}

.logo-icon {
    font-size: 2.4rem;
    color: #3b82f6;
}

.title {
    font-size: 1.7rem;
    font-weight: 700;
    text-align: center;
    margin-bottom: 5px;
    color: #1f2937;
}

.subtitle {
    text-align: center;
    color: #6b7280;
    margin-bottom: 25px;
    font-size: .9rem;
}

.alert {
    padding: 12px;
    border-radius: 8px;
    font-size: 0.9rem;
    margin-bottom: 15px;
}

.alert.error {
    background: #fee2e2;
    color: tomato;
    border: 1px solid #fca5a5;
}

.alert.success {
    background: #ecfdf5;
    color: #065f46;
    border: 1px solid #6ee7b7;
}

form label {
    display: block;
    margin-bottom: 6px;
    margin-top: 15px;
    font-weight: 600;
    color: #374151;
    font-size: .9rem;
}

form input {
    width: 100%;
    padding: 12px;
    border-radius: 8px;
    border: 1px solid #d1d5db;
    font-size: 1rem;
    background: #fff;
    transition: .2s ease;
}

form input:focus {
    border-color: #3b82f6;
    box-shadow: 0 0 0 3px rgba(59,130,246,.2);
    outline: none;
}

.butt {
    width: 100%;
    background: tomato;
    padding: 14px;
    border: none;
    color: white;
    border-radius: 8px;
    margin-top: 25px;
    font-size: 1rem;
    font-weight: 600;
    cursor: pointer;
    transition: .2s;
}

.butt:hover {
    background: rgb(0, 70, 190);
}

.footer-text {
    text-align: center;
    font-size: .9rem;
    margin-top: 18px;
    color: #6b7280;
}

.footer-text a {
    color: rgb(0, 70, 190);
    font-weight: 600;
    text-decoration: none;
}

.footer-text a:hover {
    text-decoration: underline;
}

</style>

<div class="container-center">
    <div class="register-wrapper">

        <div class="logo-placeholder">
            <span class="logo-icon">🔐</span>
        </div>

        <h2 class="title">Create Account</h2>
        <p class="subtitle">Sign up to get started</p>

        <?php if ($message) { ?>
            <div class="alert error"><?= htmlspecialchars($message) ?></div>
        <?php } ?>

        <form method="POST">
            <label>Name</label>
            <input type="text" name="nom" placeholder="Your Name" required>

            <label>Email Address</label>
            <input type="email" name="email" placeholder="you@example.com" required>

            <label>Password</label>
            <input type="password" name="mdp" placeholder="••••••••" required>

            <button class="butt" type="submit">Register</button>
        </form>

        <p class="footer-text">
            Already have an account?
            <a href="login.php" style="color:tomato">Login</a>
        </p>

    </div>
</div>



<?php include 'includes/footer.php'; ?>
<link rel="stylesheet" href="/assets/css/styles.css">
