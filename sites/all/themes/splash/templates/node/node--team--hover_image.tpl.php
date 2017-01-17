<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>
    <div class="content"<?php print $content_attributes; ?>>
        <?php print render($title_prefix); ?>
        <?php print render($title_suffix); ?>
        <?php
// We hide the comments and links now so that we can render them later.
        hide($content['comments']);
        hide($content['links']);
        $language = $node->language;
        $image_path = file_create_url($node->field_team_image[$language][0]['uri']);
        ?>                

        <div class="team-box hover-box">
            <figure><a data-rel="portfolio" class="fancybox" href="<?php print $image_path; ?>" rel="portfolio">
                    <div class="text-overlay"> 
                        <div class="info">
                            <span><i class="icon-picons-search-2"></i></span>
                        </div>
                    </div>
                    <?php print render($content['field_team_image']); ?> 
                </a>
            </figure>
            <div class="image-caption">
                <h4 class="upper"><?php print $title; ?></h4>
                <span class="position"><?php print render($content['field_team_position']); ?></span>
                <p><?php print substr($node->body[$language][0]['value'], 0, 150); ?></p>
                <div class="social-icons">
                    <?php print render($content['field_team_social']); ?>
                </div>
            </div>
        </div>
    </div>
</div>