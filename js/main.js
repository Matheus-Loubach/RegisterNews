// Função para abrir o menuMobile
function openMenuMobile() {
    var menuMobile = document.querySelector('.main-menu');
    var checkButton = document.querySelector('.check-button');
    var logo = document.querySelector('.logoMobile');
    menuMobile.classList.add('active');
    menuMobile.style.display = 'block';
    logo.style.display = 'block';
    checkButton.style = 'opacity: 0';
}

// Função para fechar o menuMobile
function closeMenuMobile() {
    var menuMobile = document.querySelector('.main-menu');
    var checkButton = document.querySelector('.check-button');
    menuMobile.classList.remove('active');
    menuMobile.style.display = 'none';
    checkButton.style = 'opacity: 1';
}


//Modal e Barra de Pesquisa
document.addEventListener('DOMContentLoaded', () => {
    const openModalButtons = document.querySelectorAll('.more-info-btn');
    const closeModalButtons = document.querySelectorAll('.close-btn');
    const modal = document.querySelector('.modal');
    const searchInput = document.querySelector('#search-input'); // Referência ao campo de input

    openModalButtons.forEach(button => {
        button.addEventListener('click', () => {
            const title = button.dataset.title;
            const content = button.dataset.content;
            const author = button.parentNode.querySelector('.sub-title span:first-child').textContent;


            const modalTitle = modal.querySelector('.modal-title');
            const modalBody = modal.querySelector('.modal-body');
            const modalAuthor = modal.querySelector('.modal-author');

            modalTitle.textContent = title;
            modalBody.innerHTML = content;
            modalAuthor.textContent = author;

            modal.style.display = 'block';
        });
    });

    closeModalButtons.forEach(button => {
        button.addEventListener('click', () => {
            modal.style.display = 'none';
        });
    });

    searchInput.addEventListener('input', () => {
        const searchTerm = searchInput.value.toLowerCase(); // Obtém o valor do campo de input e converte para letras minúsculas
        const articles = document.querySelectorAll('article'); // Seleciona todos os elementos article

        articles.forEach(article => {
            const title = article.querySelector('h2').textContent.toLowerCase(); // Obtém o título do artigo e converte para minúsculas

            title.includes(searchTerm) ? article.style.display = 'block' : article.style.display = 'none'


        });
    });


});