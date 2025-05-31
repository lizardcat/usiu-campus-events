document.getElementById('registerUserForm')?.addEventListener('submit', function (e) {
    e.preventDefault();

    const payload = {
        name: this.name.value,
        email: this.email.value,
        password: this.password.value
    };

    fetch('http://localhost/usiu-campus-events/api/register_user.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify(payload)
    })
    .then(res => res.json())
    .then(data => {
        const feedback = document.getElementById('feedback');
        if (data.success) {
            feedback.textContent = "Registration successful.";
            feedback.style.color = "green";
        } else {
            feedback.textContent = "Error: " + data.error;
            feedback.style.color = "red";
        }
    });
});

document.getElementById('loginForm')?.addEventListener('submit', function (e) {
    e.preventDefault();

    const payload = {
        email: this.email.value,
        password: this.password.value
    };

    fetch('http://localhost/usiu-campus-events/api/login_user.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify(payload)
    })
    .then(res => res.json())
    .then(data => {
        const feedback = document.getElementById('feedback');
        if (data.success) {
            feedback.textContent = "Login successful.";
            feedback.style.color = "green";
        } else {
            feedback.textContent = "Error: " + data.error;
            feedback.style.color = "red";
        }
    });
});
