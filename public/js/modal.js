const modal = document.querySelector('#modal');
const modalButton = document.querySelector('#modal-button');

modal.style.display = "none";

modalButton.addEventListener('click', () => {
    modal.style.display = "block";
});