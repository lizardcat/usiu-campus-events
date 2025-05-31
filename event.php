<?php include 'templates/header.php'; ?>
<?php include 'templates/navbar.php'; ?>
<?php include 'templates/auth_modal.php'; ?>

<main class="container mt-4">
    <h1 class="mb-4">Event Details</h1>
    <div id="event-detail" class="mb-5"></div>

    <section class="mb-5">
        <h2>Register for Event</h2>
        <form id="registerForm" class="mb-3">
            <input type="number" name="user_id" class="form-control mb-2" placeholder="User ID" required>
            <input type="number" name="event_id" class="form-control mb-2" placeholder="Event ID" required>
            <button type="submit" class="btn btn-primary">Register</button>
        </form>
        <div id="feedback-register" class="mb-4"></div>
    </section>

    <section>
        <h2>Comments</h2>
        <form id="commentForm" class="mb-3">
            <input type="number" name="user_id" class="form-control mb-2" placeholder="User ID" required>
            <input type="number" name="event_id" class="form-control mb-2" placeholder="Event ID" required>
            <textarea name="message" class="form-control mb-2" placeholder="Leave a comment" minlength="2" required></textarea>
            <button type="submit" class="btn btn-secondary">Post Comment</button>
        </form>
        <div id="feedback-comment" class="mb-4"></div>
    </section>
</main>

<?php include 'templates/footer.php'; ?>
<script src="js/event.js"></script>
