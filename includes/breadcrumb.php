<section class="wrapper breadcrumbs">
    <ul class="widget-breadcrumb" itemprop="breadcrumb">
        <li class="breadcrumb-label">Você está em:</li>
        <li class="breadcrumb-home"><a href="<?php echo $_route['home']; ?>">Página inicial</a></li>
        <?php
            foreach ($breadcrumb as $key => $value) :
                if ( is_string($key) ){
                    $text = sprintf('<a href="%s">%s</a>', $value, $key);
                } else {
                    $text = sprintf('<span>%s</span>', $value);
                }

                printf('<li class="breadcrumb-item">%s</li>', $text);

            endforeach;
        ?>
    </ul>
</section>