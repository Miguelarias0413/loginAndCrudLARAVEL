
function main(){
    const editModal = document.querySelector('.modal--edit')
    const createModal  = document.querySelector('.modal--create')
    closeCreateModal(createModal)
    openCreateModal(createModal)
    
    openEditModal(editModal)
    closeEditModal(editModal)
}

function openEditModal(modal){
    const openEditButtons = document.querySelectorAll('.products__button--edit')
    const ventanaModal = modal.children[0];
    const inputs = ventanaModal.querySelectorAll("input")

   
    openEditButtons.forEach(button=>{
        button.addEventListener('click',()=>{

            ventanaModal.classList.add('modalAnimation') //añade clase de animacion
            modal.classList.toggle('hidden')

            //llenar inputs con la informacion del producto
            const editButtonDataSets = button.dataset;
            const editButtonInformationInArray = Object.values(editButtonDataSets);
            console.log(editButtonInformationInArray);
            // Establecer los datos del array en los inputs
            // en orden de aparicion tanto en el array como en los inputs
            let contador = 0;
            inputs.forEach((input,index)=>{
                contador++;
                if( contador > 2 ){
                    input.value = editButtonInformationInArray[index-2]
                }
                
            })
           
            
            

        })
    })
    
  
}
function closeEditModal(modal){
    const closeEditButton = document.querySelector('.--edit')
    const ventanaModal = modal.children[0];

    closeEditButton.addEventListener('click',()=>{
        modal.classList.toggle('hidden')
        ventanaModal.classList.remove('modalAnimation') //remueve clase de animacion
    })

}

function closeCreateModal(modal){
    const closeButton = document.querySelector('.modal__closeButton')
    const ventanaModal = modal.children[0];

    closeButton.addEventListener('click',()=>{
        modal.classList.toggle('hidden')
        ventanaModal.classList.remove('modalAnimation') //remueve clase de animacion 

    })
}

function openCreateModal(modal){
    const openButton = document.querySelector('.products__button--create')
    const ventanaModal = modal.children[0];

    openButton.addEventListener('click',()=>{
        modal.classList.toggle('hidden')

        ventanaModal.classList.add('modalAnimation') //añade clase de animacion 
    })

}
addEventListener('DOMContentLoaded',main)