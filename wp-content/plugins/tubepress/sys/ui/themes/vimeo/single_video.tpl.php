<?php 
/**
 * Copyright 2006 - 2011 Eric D. Hough (http://ehough.com)
 * 
 * This file is part of TubePress (http://tubepress.org)
 * 
 * TubePress is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 * 
 * TubePress is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 * 
 * You should have received a copy of the GNU General Public License
 * along with TubePress.  If not, see <http://www.gnu.org/licenses/>.
 *
 * 
 * Uber simple/fast template for TubePress. Idea from here: http://seanhess.net/posts/simple_templating_system_in_php
 * Sure, maybe your templating system of choice looks prettier but I'll bet it's not faster :)
 */
?>

<div class="tubepress_single_video">
    
    <?php if (${org_tubepress_api_const_template_Variable::META_SHOULD_SHOW}[org_tubepress_api_const_options_names_Meta::TITLE]): ?>     
        <div class="tubepress_embedded_title"><?php echo htmlspecialchars($video->getTitle(), ENT_QUOTES, "UTF-8"); ?></div>
    <?php endif; ?>
    
    <?php echo ${org_tubepress_api_const_template_Variable::EMBEDDED_SOURCE}; ?>

    <dl class="tubepress_meta_group" style="width: <?php echo ${org_tubepress_api_const_template_Variable::EMBEDDED_WIDTH}; ?>px">
      
    <?php if (${org_tubepress_api_const_template_Variable::META_SHOULD_SHOW}[org_tubepress_api_const_options_names_Meta::LENGTH]): ?>
    
    <dt class="tubepress_meta tubepress_meta_runtime"><?php echo ${org_tubepress_api_const_template_Variable::META_LABELS}[org_tubepress_api_const_options_names_Meta::LENGTH]; ?></dt><dd class="tubepress_meta tubepress_meta_runtime"><?php echo $video->getDuration(); ?></dd>
    <?php endif; ?>
        
    <?php if (${org_tubepress_api_const_template_Variable::META_SHOULD_SHOW}[org_tubepress_api_const_options_names_Meta::AUTHOR]): ?>
    
    <dt class="tubepress_meta tubepress_meta_author"><?php echo ${org_tubepress_api_const_template_Variable::META_LABELS}[org_tubepress_api_const_options_names_Meta::AUTHOR]; ?></dt><dd class="tubepress_meta tubepress_meta_author"><a rel="external nofollow" href="http://www.vimeo.com/<?php echo $video->getAuthorUid(); ?>"><?php echo $video->getAuthorDisplayName(); ?></a></dd>
    <?php endif; ?>
    
    <?php if (${org_tubepress_api_const_template_Variable::META_SHOULD_SHOW}[org_tubepress_api_const_options_names_Meta::TAGS]): ?>
    
    <dt class="tubepress_meta tubepress_meta_keywords"><?php echo ${org_tubepress_api_const_template_Variable::META_LABELS}[org_tubepress_api_const_options_names_Meta::TAGS]; ?></dt><dd class="tubepress_meta tubepress_meta_keywords"><?php echo $raw = htmlspecialchars(implode(" ", $video->getKeywords()), ENT_QUOTES, "UTF-8"); ?></a></dd>
    <?php endif; ?>
    
    <?php if (${org_tubepress_api_const_template_Variable::META_SHOULD_SHOW}[org_tubepress_api_const_options_names_Meta::URL]): ?>
    
    <dt class="tubepress_meta tubepress_meta_url"><?php echo ${org_tubepress_api_const_template_Variable::META_LABELS}[org_tubepress_api_const_options_names_Meta::URL]; ?></dt><dd class="tubepress_meta tubepress_meta_url"><a rel="external nofollow" href="<?php echo $video->getHomeUrl(); ?>"><?php echo ${org_tubepress_api_const_template_Variable::META_LABELS}[org_tubepress_api_const_options_names_Meta::URL]; ?></a></dd>
    <?php endif; ?>
    
    <?php if (${org_tubepress_api_const_template_Variable::META_SHOULD_SHOW}[org_tubepress_api_const_options_names_Meta::CATEGORY] &&
        $video->getCategory() != ""):
    ?>
    
    <dt class="tubepress_meta tubepress_meta_category"><?php echo ${org_tubepress_api_const_template_Variable::META_LABELS}[org_tubepress_api_const_options_names_Meta::CATEGORY]; ?></dt><dd class="tubepress_meta tubepress_meta_category"><?php echo htmlspecialchars($video->getCategory(), ENT_QUOTES, "UTF-8"); ?></dd>
    <?php endif; ?>
        
    <?php if (${org_tubepress_api_const_template_Variable::META_SHOULD_SHOW}[org_tubepress_api_const_options_names_Meta::RATINGS] &&
        $video->getRatingCount() != ""):
    ?>
     
    <dt class="tubepress_meta tubepress_meta_ratings"><?php echo ${org_tubepress_api_const_template_Variable::META_LABELS}[org_tubepress_api_const_options_names_Meta::RATINGS]; ?></dt><dd class="tubepress_meta tubepress_meta_ratings"><?php echo $video->getRatingCount(); ?></dd>
    <?php endif; ?>
    
    <?php if (${org_tubepress_api_const_template_Variable::META_SHOULD_SHOW}[org_tubepress_api_const_options_names_Meta::LIKES] &&
              $video->getLikesCount() != ""):
          ?>
           
          <dt class="tubepress_meta tubepress_meta_likes"><?php echo ${org_tubepress_api_const_template_Variable::META_LABELS}[org_tubepress_api_const_options_names_Meta::LIKES]; ?></dt><dd class="tubepress_meta tubepress_meta_likes"><?php echo $video->getLikesCount(); ?></dd>
          <?php endif; ?>
        
    <?php if (${org_tubepress_api_const_template_Variable::META_SHOULD_SHOW}[org_tubepress_api_const_options_names_Meta::RATING] &&
         $video->getRatingAverage() != ""):
     ?>
    
    <dt class="tubepress_meta tubepress_meta_rating"><?php echo ${org_tubepress_api_const_template_Variable::META_LABELS}[org_tubepress_api_const_options_names_Meta::RATING]; ?></dt><dd class="tubepress_meta tubepress_meta_rating"><?php echo $video->getRatingAverage(); ?></dd>
    <?php endif; ?>
        
    <?php if (${org_tubepress_api_const_template_Variable::META_SHOULD_SHOW}[org_tubepress_api_const_options_names_Meta::ID]): ?>
    
    <dt class="tubepress_meta tubepress_meta_id"><?php echo ${org_tubepress_api_const_template_Variable::META_LABELS}[org_tubepress_api_const_options_names_Meta::ID]; ?></dt><dd class="tubepress_meta tubepress_meta_id"><?php echo $video->getId(); ?></dd>
    <?php endif; ?>
        
    <?php if (${org_tubepress_api_const_template_Variable::META_SHOULD_SHOW}[org_tubepress_api_const_options_names_Meta::VIEWS]): ?>
    
    <dt class="tubepress_meta tubepress_meta_views"><?php echo ${org_tubepress_api_const_template_Variable::META_LABELS}[org_tubepress_api_const_options_names_Meta::VIEWS]; ?></dt><dd class="tubepress_meta tubepress_meta_views"><?php echo $video->getViewCount(); ?></dd>
    <?php endif; ?>
        
    <?php if (${org_tubepress_api_const_template_Variable::META_SHOULD_SHOW}[org_tubepress_api_const_options_names_Meta::UPLOADED]): ?>
    
    <dt class="tubepress_meta tubepress_meta_uploaddate"><?php echo ${org_tubepress_api_const_template_Variable::META_LABELS}[org_tubepress_api_const_options_names_Meta::UPLOADED]; ?></dt><dd class="tubepress_meta tubepress_meta_uploaddate"><?php echo $video->getTimePublished(); ?></dd>
    <?php endif; ?>
    
    <?php if (${org_tubepress_api_const_template_Variable::META_SHOULD_SHOW}[org_tubepress_api_const_options_names_Meta::DESCRIPTION]): ?>
    
    <dt class="tubepress_meta tubepress_meta_description"><?php echo ${org_tubepress_api_const_template_Variable::META_LABELS}[org_tubepress_api_const_options_names_Meta::DESCRIPTION]; ?></dt><dd class="tubepress_meta tubepress_meta_description"><?php echo htmlspecialchars($video->getDescription(), ENT_QUOTES, "UTF-8"); ?></dd>
    <?php endif; ?>
    
</dl>

</div>
