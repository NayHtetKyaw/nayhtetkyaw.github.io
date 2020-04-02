const openModelButton = document.querySelectorAll('[data-model-target')
const closeModelButton = document.querySelectorAll('[data-close-button')
const overlay = document.getElementById('overlay')

openModelButton.forEach(button => {
    button.addEventListener('click', () => {
        const model = document.querySelector(button.dataset.modelTarget)
        openModel(model)
    })
})
closeModelButton.forEach(button => {
    button.addEventListener('click', () => {
        const model = button.closest('.model')
        closeModel(model)
    })
})

function openModel(model) {
    if (model == null) return
    model.classList.add('active')
    overlay.classList.add('active')

}

function closeModel(model) {
    if (model == null) return
    model.classList.remove('active')
    overlay.classList.remove('active')

}