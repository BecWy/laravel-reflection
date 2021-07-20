//const editModal = document.querySelector(".edit-modal");
const createModal = document.querySelector(".create-modal");
const deleteModal = document.querySelector(".delete-modal");
const bodyVar = document.querySelector("body");


//Show modals
// const showEditModal = () => {
//     editModal.style.display = "block";
//     disableScroll();
// }

const showCreateModal = () => {
    createModal.style.display = "block";
    disableScroll();
}

const showDeleteModal = () => {
    deleteModal.style.display = "block";
    disableScroll();
}


//Hide modals
// const hideEditModal = () => {
//     editModal.style.display = "none";
//     enableScroll();
// }

const hideCreateModal = () => {
    createModal.style.display = "none";
    enableScroll();
}

const hideDeleteModal = () => {
    deleteModal.style.display = "none";
    enableScroll();
}


const disableScroll = () => {
    bodyVar.style.position = "fixed";
    bodyVar.style.overflowY = "scroll";
    bodyVar.style.width = "100%";
}

const enableScroll = () => {
    bodyVar.style.position = "relative";
    bodyVar.style.overflowY = "scroll";
    bodyVar.style.width = "100vw";
}