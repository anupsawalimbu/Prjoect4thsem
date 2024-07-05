const container = document.getElementById('container');
const registerBtn = document.getElementById('register');
const loginBtn = document.getElementById('login');
const bookNowBtn = document.getElementById('bookNowBtn');

registerBtn.addEventListener('click', () => {
    container.classList.add("active");
});

loginBtn.addEventListener('click', () => {
    container.classList.remove("active");
});

bookNowBtn.addEventListener('click', () => {
    container.classList.add("active");
});
