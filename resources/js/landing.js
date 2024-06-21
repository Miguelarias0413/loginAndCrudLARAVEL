
function main(){
    const modal  = document.querySelector('.modal')
    closeModal(modal)
    openModal(modal)

}

function closeModal(modal){
    const closeButton = document.querySelector('.modal__closeButton')
    
    closeButton.addEventListener('click',()=>{
        modal.classList.toggle('hidden')
        modal.children[0].classList.remove('modalAnimation') //remueve clase de animacion 

    })
}

function openModal(modal){
    const openButton = document.querySelector('.products__button--create')
    
    openButton.addEventListener('click',()=>{
        modal.classList.toggle('hidden')

        modal.children[0].classList.add('modalAnimation') //añade clase de animacion 
    })

}
addEventListener('DOMContentLoaded',main)