<aside>
    <a class="link" href="#"><img src="/images/fantasy.png" alt="Fantasy"> Fantasy </a>
    <a class="link" href="#"><img src="/images/sci-fi.png" alt="Sci-Fi"> Sci-Fi </a>
    <a class="link" href="#"><img src="/images/drama.png" alt="Drama"> Drama </a>
    <a class="link" href="#"><img src="/images/action.png" alt="Action"> Action </a>
    <a class="link" href="#"><img src="/images/romance.png" alt="Romance"> Romance </a>
    <a class="see-more" href="#"> See More </a>
</aside>


<section class="main">

    <div id="add" class="form-container">
        <form id="add-form" enctype="multipart/form-data" method="post">
            <a id="close-add" class="close" href=""> <img src="/images/close-icon-png-19.jpg" alt="close"></a>
            <legend>Add a post</legend>
            <label for="title">Title :</label>
            <input type="text" name="title" class="title">
            <label for="categorie"> Category :</label>
            <input type="text" name="categorie" class="categorie">
            <label for="description">Description :</label>
            <textarea class="description" name="description" ></textarea>
            <label for="image">Image :</label>
            <input type="file" name="image" class="image">
            <span  style=" 5px; color: red; margin-top: 5px;" >
            </span>
            <input class="submit" type="submit" name="add-submit" value="Create">

        </form>
        <div id="add-overlay" class="modal-overlay"></div>
    </div>

    <div id="update" class="form-container">
        <form id="update-form" enctype="multipart/form-data" method="post">
            <a id="close-update" class="close" href=""> <img src="/images/close-icon-png-19.jpg" alt="close"></a>
            <legend>Update a post</legend>
            <label for="title">Title :</label>
            <input type="text" name="title" class="title">
            <label for="categorie"> Category :</label>
            <input type="text" name="categorie" class="categorie">
            <label for="description">Description :</label>
            <textarea class="description" name="description" cols="30" rows="10"></textarea>
            <label for="image">Image :</label>
            <input type="file" name="image" class="image">
            <input type="hidden" name="poste_id" class="poste_id" >
            <span  style=" 5px; color: red; margin-top: 5px;" >
            </span>
            <input class="submit" type="submit" name="update-submit" value="Update">


        </form>
        <div id="update-overlay" class=" modal-overlay"></div>
    </div>

    <div class="add-post">
        <h3 style="font-weight: bold;">Hello <?php echo $current['firstname'].' '.$current['lastname'] ?> </h3>
        <p>You have a POV about a TV show ? <a id="add-post" style="color: red;" href="">Add a post</a> and share your thoughts</p>
    </div>

    <?php foreach ($posts as $post) : ?>
        <article class="post">
            <?php if($post['poste_author'] === $current['user_id'] ): ?>
                <img  class="view-more" src="/images/viewmorehorizontal_104501.png" alt="view-more">
                <div class="update-delete">
                    <form method="post" class="add-button" action="">
                        <input type="hidden" name="" value="<?= $post['poste_id'] ?>">

                        <button class="update-button-toggler" >
                            update
                        </button>
                    </form>
                    <form method="post" class="update-button" action="">
                        <input type="hidden" name="poste_id" value="<?= $post['poste_id'] ?>">

                        <button name="delete-submit" class="delete-button-toggler">
                            delete
                        </button>
                    </form>
                </div>
            <?php endif; ?>


            <div class="author">
                <img class="author-image" src="/images/MaxPixel.net-Male-Man-Person-Handsome-Guy-Face-Portrait-Beard-6309454.jpg" alt="author">
                <div class="author-info">
                    <p class="author-name"><?php echo $post['firstname'].' '.$post['lastname'] ?></p>
                    <small class="categorie"><?php echo $post['category'] ?></small>
                </div>
            </div>
            <div class="heading">
                <h3 class="post-title"><?php echo $post['title'] ?></h3>
                <p class="description"><?php echo $post['description'] ?></p>
            </div>
            <div class="post-image">
                <img src="/post_images/<?php echo $post['image'] ?>" alt="post-image">
            </div>

            <div class="comments">
                <a href="">23 comments</a>
                <form class="comment-form" action="" method="post">
                    <input type="hidden" name="poste_id" value="<?= $post['poste_id'] ?>">
                    <input placeholder="Add Comment" type="text" name="comment" >
                </form>
                <div class="comments-container">

                    <?php foreach ($comments as $comment): ?>
                        <?php if($comment['poste_id'] === $post['poste_id'] ): ?>
                    <div class="user-comment">
                        <img src="/images/MaxPixel.net-Male-Man-Person-Handsome-Guy-Face-Portrait-Beard-6309454.jpg" alt="profile">
                        <div class="comment-info">
                            <h4 class="comment-author" ><?= $comment['firstname'].' '.$comment['lastname']; ?></h4>
                            <p><?= $comment['description']?></p>
                        </div>
                    </div>
                        <?php endif ?>
                    <?php endforeach; ?>
                </div>
            </div>

        </article>
    <?php endforeach; ?>

</section>

<script src="/script/popup.js"></script>
<script src="/script/post.js"></script>

