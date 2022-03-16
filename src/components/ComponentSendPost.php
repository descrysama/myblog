<div id="post-form" class="posts">
    <div class="posts-body">
    <div class="posts-header">
        <span><?php echo $_SESSION['username']; ?></span>
    </div>    
    <form class="d-flex flex-column" action="" method="POST">
        <input type="text" name="title" id="title" placeholder="titre">
        <textarea name="post-content" id="post-content" name ="post-content" rows="5" placeholder="Il etait une fois..."></textarea>
        <!-- <input type="file" name="image" id="image"> -->
        <input class="btn btn-success m-2" type="submit" value="Poster">
    </form>
    </div>
</div>