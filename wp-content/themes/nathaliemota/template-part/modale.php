<div id="myModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <img class="img_contact" src="<?php echo get_stylesheet_directory_uri() . '/assets/contact_header.png'; ?>" alt="image contact">
        <div class="form_div">
        <?php
		echo do_shortcode('[contact-form-7 id="12659d6" title="Formulaire de contact 1"]');
		?>
        </div>
    </div>
</div>