document.getElementById('eventForm').addEventListener('submit', function (e) {
    e.preventDefault();

    const payload = {
        title: this.title.value,
        description: this.description.value,
        event_date: this.event_date.value,
        club_id: parseInt(this.club_id.value)
    };

    fetch('http://localhost/usiu-campus-events/api/create_event.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify(payload)
    })
    .then(res => res.json())
    .then(data => {
        const feedback = document.getElementById('feedback');
            if (data.success) {
                feedback.textContent = "Event created successfully.";
                feedback.style.color = "green";
            } else {
                feedback.textContent = "Error: " + data.error;
                feedback.style.color = "red";
            }
    });
});
