<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>
    <div class="content"<?php print $content_attributes; ?>>
        <?php print render($title_prefix); ?>
        <?php print render($title_suffix); ?>
        <?php
// We hide the comments and links now so that we can render them later.
        hide($content['comments']);
        hide($content['links']);
        ?>                
        <div class="team-box">
            <div class="inner">
                <div class="front">
                    <?php print render($content['field_team_image']); ?>
                    <h3><?php print $title; ?></h3>
                    <span><?php print render($content['field_team_position']); ?></span>
                </div>

                <div class="back">
                    <h3><?php print $title; ?></h3>
                    <span><?php print render($content['field_team_position']); ?></span>
                    <p><?php print render($content['body']); ?></p>
                    <div class="social-icons">
                        <?php print render($content['field_team_social']); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> 
