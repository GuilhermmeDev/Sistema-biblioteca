const buttons = document.querySelectorAll('.container_button'); 

buttons.forEach(button => {
    button.addEventListener('click', function(event) {
        const link = this.querySelector('a');
        if (link) {
            window.location.href = link.href;
        }
    });
});

const user = document.querySelector('.container_user');

user.addEventListener('click', function(event) {
  var container = document.querySelector('.container_cred');
  if (container.classList.contains('show_cred')) {
    container.classList.remove('show_cred');
  }
  else {
    container.classList.add('show_cred');
  }
})

const drop_content = document.querySelector(".drop_content")
const container_drop = document.querySelector('.container_drop');

container_drop.addEventListener('click', function() {
  if (drop_content.classList.contains('show')) {
    drop_content.classList.remove('show');
  }
  else {
    drop_content.classList.add('show');
  }
})

