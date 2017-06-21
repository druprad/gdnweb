<?php

$facebook_link = $user_profile['field_facebook_link']['#object']->field_facebook_link['und']['0']['value'];
$twitter_link = $user_profile['field_twitter_link']['#object']->field_twitter_link['und']['0']['value'];
$linkedin_link = $user_profile['field_linked_in_link']['#object']->field_linked_in_link['und']['0']['value'];
$gplus_link = $user_profile['field_google_plus_link']['#object']->field_google_plus_link['und']['0']['value'];

?>
<div class="post authorlist">
  <div class="profile" typeof="sioc:UserAccount" about="/user/<?php echo $user_profile['field_display_name']['#object']->uid;  ?>">
    <div class="user-picture">
        <a href="/user/<?php echo $user_profile['field_display_name']['#object']->uid;  ?>" title="View user profile.">
          <?php
            $user_image = $user_profile['field_display_name']['#object']->picture->uri;
            $user_name = $user_profile['field_display_name']['#object']->picture->name;
          ?>
          <?php echo $user_profile['user_picture']['#markup']; ?>
        </a>
    </div>
    <div class="field field-name-field-display-name field-type-text field-label-hidden">
      <div class="field-items">
        <div class="field-item even"><h6 class="post-title"><a href="/user/<?php echo $user_profile['field_display_name']['#object']->uid;  ?>"><?php echo $user_profile['field_display_name']['#object']->field_display_name['und']['0']['value']; ?></a></h6></div>
      </div>
    </div>
    <div class="field field-name-field-designation field-type-text field-label-hidden">
      <div class="field-items">
        <div class="field-item even"><?php echo $user_profile['field_designation']['#object']->field_designation['und']['0']['value']; ?></div>
      </div>
    </div>
    <div class="field field-name-field-introduction field-type-text-long field-label-hidden">
      <div class="field-items">
        <div class="field-item even">
        <?php
        if($user_profile['field_display_name']['#view_mode'] == 'author_list') {
          print truncate_utf8($user_profile['field_introduction']['#object']->field_introduction['und']['0']['value'], 180, FALSE, TRUE);
        }
        else {
          print $user_profile['field_introduction']['#object']->field_introduction['und']['0']['value'];
        }

        //echo $user_profile['field_introduction']['#object']->field_introduction['und']['0']['value']; ?></div>
      </div>
    </div>
  </div>
  <div class="social-icons">
      <div class="field field-name-field-team-social field-type-text-long field-label-hidden">
        <div class="field-items">
          <div class="field-item even">
            <p>
              <?php if($facebook_link != '' && !empty($facebook_link)) { ?>
              <a href="<?php echo $facebook_link; ?>" class="social-icon facebook">
                <span><i class="fa fa-facebook"></i><br><i class="fa fa-facebook"></i></span>
              </a>
              <?php } ?>
              <?php if($twitter_link != '' && !empty($twitter_link)) { ?>
              <a href="<?php echo $twitter_link; ?>" class="social-icon twitter">
                <span><i class="fa fa-twitter"></i><br><i class="fa fa-twitter"></i></span>
              </a>
              <?php } ?>
              <?php if($linkedin_link != '' && !empty($linkedin_link)) { ?>
              <a href="<?php echo $linkedin_link; ?>" class="social-icon linkedin">
                <span><i class="fa fa-linkedin"></i><br><i class="fa fa-linkedin"></i></span>
              </a>
              <?php } ?>
              <?php if($gplus_link != '' && !empty($gplus_link)) { ?>
              <a href="<?php echo $gplus_link; ?>" class="social-icon gplus">
                <span><i class="fa fa-google-plus-square"></i><br><i class="fa fa-google-plus-square"></i></span>
              </a>
              <?php } ?>
            </p>
          </div>
        </div>
      </div>
  </div>
</div>
