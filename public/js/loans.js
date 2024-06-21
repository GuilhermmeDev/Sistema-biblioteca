const select = document.querySelector('#views');
const inputs = document.getElementsByName('view');
const form = document.querySelector('#form');

select.addEventListener('change', function(event) {
    var option = select.options[select.selectedIndex]
    submitForm(option);
});

function submitForm(option) {
    inputs.forEach(element => {

    if (option.value === element.value) {
        console.log('rapazz');
        console.log(element)
        console.log(option)
        var submitButton = document.createElement('input');
        submitButton.type = 'text';
        submitButton.name = 'view';
        submitButton.value = option.value;
        form.appendChild(submitButton);
        form.submit();
    }
    })
}