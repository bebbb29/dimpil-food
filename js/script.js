// toggle class active
const navbarNav = document.querySelector('.navbar-nav');
// ketika hamburger diklik
document.querySelector('#burger-menu').onclick = () => {
    navbarNav.classList.toggle('active');
};

//toggle active search
const searchForm = document.querySelector('.search-form');
const searchBox = document.querySelector('#search-box');

document.querySelector('#search-button').onclick = (e) => {
    searchForm.classList.toggle('active');
    searchBox.focus();
    e.preventDefault();
};


// klik diluar sidebar untuk hinlangkan nav
const burger = document.querySelector('#burger-menu');
const searchBtn = document.querySelector('#burger-menu');


document.addEventListener('click', function(e){
    if (!burger.contains(e.target) && !navbarNav.contains(e.target)){
        navbarNav.classList.remove('active');
    }
    if (!searchBtn.contains(e.target) && !searchForm.contains(e.target)){
        searchForm.classList.remove('active');
    }
});

//untuk header admin
let menu = document.querySelector('#menu-btn');
let navbar = document.querySelector('.header .navbar');

menu.onclick = () =>{
    menu.classList.toggle('fa-times');
    navbar.classList.toggle('active');
};

document.querySelector('#close-edit').onclick = () =>{
    document.querySelector('.edit-form-container').style.display = 'none';
    window.location.href = "../admin/admin.php"
}