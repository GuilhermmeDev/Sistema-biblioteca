const buttons = document.querySelectorAll('.container_button'); 

buttons.forEach(button => {
    button.addEventListener('click', function(event) {
        const link = this.querySelector('a');
        if (link) {
            window.location.href = link.href;
        }
    });
});

function showDrop(){
    document.querySelector(".drop_content").classList.toggle("show");
}

window.onclick = function(e) {
    if (!e.target.matches('.on_drop')) {
    var myDropdown = document.getElementById("drop_content");
      if (myDropdown.classList.contains('show')) {
        myDropdown.classList.remove('show');
      }
    }
  }