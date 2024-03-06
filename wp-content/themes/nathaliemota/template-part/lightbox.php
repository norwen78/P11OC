<div id="custom-lightbox-<?php the_ID(); ?>" class="lightbox">
    <div class="lightbox-content">
        <span class="close-light">&times;</span>
        <?php the_post_thumbnail(); ?>
            <p class="reference-lightbox" id="reference-lightbox"><?php $reference = get_field('reference');if ($reference) {echo '' . $reference;}?></p>
            <p class="categorie-ligthbox" id="taxonomy-lightbox"><?php $terms = get_the_terms(get_the_ID(), 'categorie');if ($terms && !is_wp_error($terms)) {echo '';foreach ($terms as $term) {echo $term->name . ' ';}}?></p>
                <?php
                $prev_post = get_previous_post();
                $next_post = get_next_post();
                ?>
                    <a id="arrow-lightbox" class="left-arrow-lightbox lightbox-trigger" data-id="<?php echo ($prev_post->ID); ?>" href="#" >
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/lightbox-left.png" class="arrow-lightbox" data-direction="previous" alt="flèche article précedent">
                    </a>
                    <a id="arrow-lightbox" class="right-arrow-lightbox lightbox-trigger" data-id="<?php echo ($next_post->ID); ?>" href="#" >
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/lightbox-right.png" class="arrow-lightbox" data-direction="next" alt="flèche article suivant"> 
                    </a>    
    </div>
</div>