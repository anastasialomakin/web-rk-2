document.addEventListener('DOMContentLoaded', function() {
    const loginModal = document.getElementById('login-form');
    const registrationModal = document.getElementById('registration-form');
    const loginNav = document.querySelector('header nav .nav-links li:last-child a');
    const closeButtons = document.querySelectorAll('.close-btn');
     const signupButton = document.querySelector('.login-content a');
    
    loginNav.addEventListener('click', function(event) {
        event.preventDefault();
        loginModal.style.display = 'block';
    });
     signupButton.addEventListener('click', function(event) {
        event.preventDefault();
        loginModal.style.display = 'none';
        registrationModal.style.display = 'block';
    });
    closeButtons.forEach(function(button) {
        button.addEventListener('click', function() {
            loginModal.style.display = 'none';
            registrationModal.style.display = 'none';
        });
    });
    
    window.addEventListener('click', function(event){
      if (event.target == loginModal){
      loginModal.style.display = 'none';
      }
      if (event.target == registrationModal){
      registrationModal.style.display = 'none';
      }
      });
    
});