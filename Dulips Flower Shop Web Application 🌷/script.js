
function showLogin() {
    document.getElementById('signupForm').classList.add('hidden');
    document.getElementById('loginForm').classList.remove('hidden');
}

function showSignup() {
    document.getElementById('loginForm').classList.add('hidden');
    document.getElementById('signupForm').classList.remove('hidden');
}

// Add to your CSS
const style = document.createElement('style');
style.textContent = '.hidden { display: none; }';
document.head.appendChild(style);

// Check URL parameters for messages
window.addEventListener('DOMContentLoaded', function() {
    const urlParams = new URLSearchParams(window.location.search);
    
    if (urlParams.has('signup') && urlParams.get('signup') === 'success') {
        alert('Registration successful! Please login.');
        showLogin();
    }
    
    if (urlParams.has('login') && urlParams.get('login') === 'success') {
        alert('Login successful!');
        // You can update the UI here to show user is logged in
    }
});
