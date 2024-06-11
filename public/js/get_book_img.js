inputBusca = document.getElementById('url_img');

inputBusca.addEventListener('keyup', function() {
    if (inputBusca.value != '')
        search();
});

function search() {
    
    var c = 1;
    let pesquisa = document.getElementById('url_img').value;
    var url = `https://www.googleapis.com/books/v1/volumes?q=${pesquisa}`
    fetch(url)
    .then((Response) => {
        return Response.json();
    })

    .then(function (livro) {
        
        result = livro['items'];
        var container = document.getElementById('container_list');
        container.innerText = '';

        var parentElement = document.createElement('div');
        container.appendChild(parentElement);
        parentElement.id = 'parentElement';

        result.forEach(element => {


            const data = element['volumeInfo'];
            
            // list group
            var listItem = document.createElement('li');
            listItem.className = "list-group-item d-flex justify-content-between align-items-start";
            
            var div = document.createElement('div');
            div.className = "ms-2 me-auto";
            
            var imgLivro = document.createElement("img");
            imgLivro.className = "imgLivro";
            imgLivro.src = data['imageLinks']['thumbnail'];
            
            var div2 = document.createElement('div');
            div2.className = "fw-bold";
            div2.textContent = data['title'];

            
            var span = document.createElement('span');
            span.className = "badge text-bg-primary rounded-pill";
            span.textContent = c;
            
            div.appendChild(imgLivro);
            div.appendChild(div2);
            
            listItem.appendChild(div);
            listItem.appendChild(span);

            listItem.addEventListener('click', function() {
                inputBusca.value = data['imageLinks']['thumbnail'];
                parentElement.remove();
            });
            parentElement.appendChild(listItem);
            
            c++;
        });

    })
}
