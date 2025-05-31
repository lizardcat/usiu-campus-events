<?php include 'templates/header.php'; ?>
<?php include 'templates/navbar.php'; ?>
<?php include 'templates/auth_modal.php'; ?>

<main class="container mt-4">
    <h1 class="mb-4">Create a New Event</h1>
    <form id="eventForm" class="border p-4 rounded shadow-sm bg-light">
        <div class="mb-3">
            <label class="form-label">Title</label>
            <input name="title" type="text" class="form-control" placeholder="Title" required minlength="3" maxlength="100">
        </div>
        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control" placeholder="Description"></textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Event Date</label>
            <input name="event_date" type="date" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Club ID</label>
            <input name="club_id" type="number" class="form-control" placeholder="Club ID" min="1" required>
        </div>
        <button type="submit" class="btn btn-primary">Create Event</button>
    </form>
    <div id="feedback" class="mt-3"></div>
</main>

<?php include 'templates/footer.php'; ?>
