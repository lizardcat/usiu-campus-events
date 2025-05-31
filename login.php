<?php include 'templates/header.php'; ?>
<?php include 'templates/navbar.php'; ?>
<?php include 'templates/auth_modal.php'; ?>

<main class="container mt-4">
    <h1 class="mb-4">Login</h1>
    <form id="loginForm" class="border p-4 rounded shadow-sm bg-light">
        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control" placeholder="Email" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" name="password" class="form-control" placeholder="Password" required>
        </div>
        <button type="submit" class="btn btn-success">Login</button>
    </form>
    <div id="feedback" class="mt-3"></div>
</main>

<?php include 'templates/footer.php'; ?>
