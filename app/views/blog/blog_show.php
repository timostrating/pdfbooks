<?php if(empty($result) == false) {  $blog = $result[0] ?>

    <style>
        .blog.content {
            font-size: 18px;
        }
    </style>

    <article>
        <div class="row">
            <div class="col-md-2">  </div>
            <div class="col-md-8"> 

                <div class="tc">
                    <img src="<?= $blog->imgurl; ?>" alt="" style="height: 300px; width: auto;">
                </div> 
                <h1> Lorem ipsum dolor sit amet consectetur adipisicing elit. </h1>
                <div class="blog content">
                    <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                    Reprehenderit voluptates, dolore voluptatibus maxime perspiciatis, 
                    exercitationem a distinctio ea modi esse quis labore veritatis 
                    quo odio perferendis non consequatur, laborum at. </p>

                    <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                    Reprehenderit voluptates, dolore voluptatibus maxime perspiciatis, 
                    exercitationem a distinctio ea modi esse quis labore veritatis 
                    quo odio perferendis non consequatur, laborum at. </p>

                    <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                    Reprehenderit voluptates, dolore voluptatibus maxime perspiciatis, 
                    exercitationem a distinctio ea modi esse quis labore veritatis 
                    quo odio perferendis non consequatur, laborum at. </p>

                    <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                    Reprehenderit voluptates, dolore voluptatibus maxime perspiciatis, 
                    exercitationem a distinctio ea modi esse quis labore veritatis 
                    quo odio perferendis non consequatur, laborum at. </p>

                    <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                    Reprehenderit voluptates, dolore voluptatibus maxime perspiciatis, 
                    exercitationem a distinctio ea modi esse quis labore veritatis 
                    quo odio perferendis non consequatur, laborum at. </p>

                    <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                    Reprehenderit voluptates, dolore voluptatibus maxime perspiciatis, 
                    exercitationem a distinctio ea modi esse quis labore veritatis 
                    quo odio perferendis non consequatur, laborum at. </p>
                </div>
            
            </div>
            <div class="col-md-2"> </div>
        </div>
    </article>  

<?php } else { die("Blog niet gevonden"); }