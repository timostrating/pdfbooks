<h1>Blogs</h1>


<?php foreach($result as $blog) { ?> 
    <div class="row">
        <div class="col-md-4">
            <img src="<?= $blog->imgurl; ?>" alt="" style="height: auto; width: 100%;">
        </div> 
        <div class="col-md-8">
            <h1> <a href="<?= URL( BLOG_SHOW_PATH, $blog->ID); ?>"><?= $blog->title; ?></a></h1>
            <div class="blog content">
                <?= $blog->description; ?>
            </div>
        </div>
    </div>

    <hr/>

<?php } ?>