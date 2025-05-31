<?php include 'templates/header.php'; ?>
<?php include 'templates/navbar.php'; ?>
<?php include 'templates/auth_modal.php'; ?>

<main class="container mt-4">
    <h1 class="mb-4">Register</h1>
    <form id="registerUserForm" class="border p-4 rounded shadow-sm bg-light">
        <div class="mb-3">
            <label class="form-label">Name</label>
            <input name="name" type="text" class="form-control" placeholder="Name" required minlength="2" maxlength="100">
        </div>
        <div class="mb-3">
            <label class="form-label">Email</label>
            <input name="email" type="email" class="form-control" placeholder="Email" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Password</label>
            <input name="password" type="password" class="form-control" placeholder="Password" required minlength="6">
        </div>
        <button type="submit" class="btn btn-primary">Register</button>
    </form>
    <div id="feedback" class="mt-3"></div>
</main>

<?php include 'templates/footer.php'; ?>
