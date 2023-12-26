document.addEventListener('DOMContentLoaded', function() {
    var profileIcon = document.querySelector('.profile-icon');
    var dropdownContent = document.querySelector('.dropdown-content');

    profileIcon.addEventListener('click', function() {
        dropdownContent.style.display = (dropdownContent.style.display === 'block') ? 'none' : 'block';
    });

    window.addEventListener('click', function(event) {
        if (!event.target.matches('.profile-icon')) {
            dropdownContent.style.display = 'none';
        }
    });
});
