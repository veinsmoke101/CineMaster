const add           = document.getElementById('add');
const update        = document.getElementById('update');
const addPost       = document.getElementById('add-post');
const closeUpdate   = document.getElementById('close-update');
const closeAdd      = document.getElementById('close-add');
const addOverlay    = document.getElementById('add-overlay');
const updateOverlay = document.getElementById('update-overlay');
const viewMore      = document.querySelectorAll('.view-more');
const update_button_toggle = document.querySelectorAll('.update-button-toggler');

document.querySelectorAll('.delete-button-toggler');
addPost.addEventListener('click', (event)=>{
    event.preventDefault();
    add.classList.add('active');
    addOverlay.classList.add('active');
});

closeAdd.addEventListener('click', (event)=>{
    event.preventDefault();
    add.classList.remove('active');
    addOverlay.classList.remove('active');
});



viewMore.forEach( button => {
        button.addEventListener('click', (event)=>{
            event.preventDefault();
            button.parentElement.querySelector('.update-delete').classList.toggle('active');
        }
    )
});


update_button_toggle.forEach( button => {
    button.addEventListener('click', (event)=>{
        event.preventDefault();
        update.classList.add('active');
        updateOverlay.classList.add('active');

        let currentPostInfo = {};
        const post = button.parentElement.parentElement.parentElement;

        currentPostInfo.category = post.querySelector('.categorie').innerText;
        currentPostInfo.description = post.querySelector('.description').innerText;
        currentPostInfo.title = post.querySelector('.post-title').innerText;
        currentPostInfo.id = button.parentElement.querySelector('input').value;


        console.log(currentPostInfo);
        const {id, category, title, description} = currentPostInfo;
        update.querySelector('.title').value = title;
        update.querySelector('.categorie').value = category;
        update.querySelector('.description').value = description;
        update.querySelector('.poste_id').value = id;
    }
)
});



closeUpdate.addEventListener('click', (event)=>{
    event.preventDefault();
    update.classList.remove('active');
    updateOverlay.classList.remove('active');
});
