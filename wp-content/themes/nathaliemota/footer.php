<?php wp_footer(); ?>
</body>
</html>

<footer>
    <div class="footer-links">
        <?php
            wp_nav_menu(array(
                'theme_location' => 'footer-menu',
                'container'      => false,
                'menu_class'     => 'footer-menu',
        ));
        ?>
    </div>
</footer>