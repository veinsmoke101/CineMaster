let commentForms = document.querySelectorAll('.comment-form');

commentForms.forEach(form => {
    form.addEventListener('submit', (e) => {
        e.preventDefault();
        let formData = new FormData(form);
        let myRequest = new XMLHttpRequest();
        myRequest.onload = function () {
            let comments = JSON.parse(this.responseText.substr(1).slice(0, -1));


            let user_comment = document.createElement('div');
            user_comment.classList.add('user-comment');
            let comment_info = document.createElement('div');
            comment_info.classList.add('comment-info');
            let comment_author = document.createElement('h4');
            comment_author.classList.add('comment-author');
            comment_author.innerText = comments.firstname + " " + comments.lastname;
            let description = document.createElement('p');
            description.innerText = comments.description;
            let img = document.createElement('img');
            img.setAttribute("src", "/images/MaxPixel.net-Male-Man-Person-Handsome-Guy-Face-Portrait-Beard-6309454.jpg");

            comment_info.append(comment_author, description);
            user_comment.append(img, comment_info);
            let comments_container = form.parentElement.querySelector('.comments-container');
            form.querySelector('input[name="comment"]').value = "";
            console.log(comments_container);
            comments_container.appendChild(user_comment);



        }
        myRequest.open("POST", "comment");
        myRequest.setRequestHeader("Content-typ", "application/x-www-form-urlencoded");
        myRequest.send(formData);
    });
});


