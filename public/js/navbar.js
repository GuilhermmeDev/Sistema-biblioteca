const buttons = document.querySelectorAll('.container_button'); 

buttons.forEach(button => {
    button.addEventListener('click', function(event) {
        const link = this.querySelector('a');
        if (link) {
            window.location.href = link.href;
        }
    });
});