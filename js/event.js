document.getElementById('registerForm').addEventListener('submit', function (e) {
    e.preventDefault();

    const payload = {
        user_id: parseInt(this.user_id.value),
        event_id: parseInt(this.event_id.value)
    };

    fetch('http://localhost/usiu-campus-events/api/register_event.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify(payload)
    })
    .then(res => res.json())
    .then(data => {
        const regFeedback = document.getElementById('feedback-register');
        if (data.success) {
            regFeedback.textContent = "Registered successfully.";
            regFeedback.style.color = "green";
        } else {
            regFeedback.textContent = "Error: " + data.error;
            regFeedback.style.color = "red";
        }
    });
});

document.getElementById('commentForm').addEventListener('submit', function (e) {
    e.preventDefault();

    const payload = {
        user_id: parseInt(this.user_id.value),
        event_id: parseInt(this.event_id.value),
        message: this.message.value
    };

    fetch('http://localhost/usiu-campus-events/api/post_comment.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify(payload)
    })
    .then(res => res.json())
    .then(data => {
        const commentFeedback = document.getElementById('feedback-comment');
        if (data.success) {
            commentFeedback.textContent = "Comment posted successfully.";
            commentFeedback.style.color = "green";
        } else {
            commentFeedback.textContent = "Error: " + data.error;
            commentFeedback.style.color = "red";
        }
    });
});
