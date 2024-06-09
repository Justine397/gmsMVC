//not working
document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.remove-user').forEach(function(button) {
        button.addEventListener('click', function(event) {
            event.preventDefault();
            const userId = this.dataset.id;
            if (confirm('Are you sure you want to remove this user?')) {
                fetch('../controllers/AdminController.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: new URLSearchParams({
                        userId: userId
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert('User removed successfully.');
                        location.reload();
                    } else {
                        alert('Failed to remove user: ' + (data.error || 'Unknown error'));
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('An error occurred while removing the user.');
                });
            }
        });
    });
});