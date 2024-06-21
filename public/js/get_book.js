const inputTitulo = document.getElementById('titulo');

inputTitulo.addEventListener('keyup', function() {
    if (inputTitulo.value != '' && inputTitulo.value.length > 3)
        query();
});



function query() {
    
    let pesquisa = document.getElementById('titulo').value;
    var url = `https://www.googleapis.com/books/v1/volumes?q=${pesquisa}`
    fetch(url)
    .then((Response) => {
        return Response.json();
    })

    .then(function (livro) {
        SuggestBook(livro);
    })
}
inputs = document.getElementsByClassName('input');

function SuggestBook(livro, item=0){
    let result = livro['items'][item]['volumeInfo'];
    titulo = result['title'];
    sinopse = result['description'];
    sinopse = sinopse.substr(0,1500);
    if (result['authors'] != undefined) {
        if (result['authors'].length > 1) {
            autor = result['authors'].join(',');
        }
        else {
            autor = result['authors'][0];
        }
    }
    else {
        autor = '';
    }
    num_pag = result['pageCount'];
    lancamento = result['publishedDate'];
    if (lancamento != undefined) {
        ano = lancamento.substr(0,4)
    }
    else {
        lancamento = '';
    }
    if (result['authors'] != undefined) {
        if (result['authors'].length > 1){
            genero = result['categories'].join(',');
        }
        else {
            genero = result['categories'];
        }
    }
    else {
        genero = '';
    }
    aval = result['averageRating'] || '';

    var suggestion = {'titulo':titulo, 'sinopse':sinopse, 'autor': autor, 'num_paginas':num_pag, 'ano_lancamento':ano, 'genero':genero, 'avaliacao':aval}

    for (const input in inputs) {
        for (const obj in suggestion) {
            if (inputs[input].id == obj) {
                inputs[input].placeholder = suggestion[obj];
            }
        }
    }
    

    inputTitulo.addEventListener("keydown", function(event) {
        if (event.key === "Tab") {
            event.preventDefault();
            FillForm(suggestion, inputs);
        }

    });
}

function FillForm(suggestion, inputs) {
    for (const input in inputs) {
        for (const obj in suggestion) {
            if (inputs[input].id == obj) {
                inputs[input].value = suggestion[obj];
            }
        }
    }

    const inputImg = document.getElementById('url_img');
    inputImg.value = suggestion['titulo'];
}


