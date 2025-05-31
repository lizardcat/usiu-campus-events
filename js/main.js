document.addEventListener('DOMContentLoaded', () => {
    // Check session first
    fetch('http://localhost/usiu-campus-events/auth/check_session.php')
        .then(res => res.json())
        .then(sessionData => {
            const loginStatus = document.getElementById('login-status');
            if (sessionData.authenticated) {
                loginStatus.textContent = `Logged in as ${sessionData.user_name}`;
            } else {
                loginStatus.textContent = 'Not logged in';
            }
        });

    // Load events
    fetch('http://localhost/usiu-campus-events/api/get_events.php')
        .then(res => res.json())
        .then(data => {
            const container = document.getElementById('event-list');
            if (data.success) {
                data.events.forEach(event => {
                    const div = document.createElement('div');
                    div.innerHTML = `
                        <h3>${event.title}</h3>
                        <p>${event.description}</p>
                        <p>Club: ${event.club_name}</p>
                        <p>Date: ${event.event_date}</p>
                    `;
                    container.appendChild(div);
                });
            }
        })
        .catch(err => console.error('Fetch error:', err));
});
