
const addForm = document.querySelector('#add-form');
const updateForm = document.querySelector('#update-form');


addForm.addEventListener('submit', (e) => {
    const inputs = addForm.querySelectorAll('input');
    let error = '';
    inputs.forEach(input =>{
        if(input.value === '' ){
            error = 'Fill all the fileds before submitting';
        }
    });
    if(error !== ''){
        e.preventDefault();
        let errorContainer = addForm.querySelector('span');
        errorContainer.innerText = error;
        // error = '';
    }
});

updateForm.addEventListener('submit', (e) => {
    const inputs = updateForm.querySelectorAll('input');
    let error = '';
    inputs.forEach(input =>{
        if(input.value === '' && input.type !== 'file' && input.type !== 'hidden'){
            error = 'Fill all the fileds before submitting';
        }
    });
    if(error !== ''){
        e.preventDefault();
        let errorContainer = updateForm.querySelector('span');
        errorContainer.innerText = error;
        // error = '';
    }
});