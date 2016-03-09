<?php
/**
 * $Desc
 *
 * @version    $Id$
 * @package    wpbase
 * @author     WPOpal  Team <wpopal@gmail.com, support@wpopal.com>
 * @copyright  Copyright (C) 2015 wpopal.com. All Rights Reserved.
 * @license    GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
 *
 * @website  http://www.wpopal.com
 * @support  http://www.wpopal.com/support/forum.html
 */
$postformat = get_post_format();
$icon = notiz_wpo_get_format_icon_class($postformat);
global $post;
if(is_single()){
  $class = ' post-single';
}
else{
  $class = ' not-post-single blog-v1';
}

  $post_category = "";
  $categories = get_the_category();
  $separator = ' | ';
  $output = '';
  if($categories){
    foreach($categories as $category) {
      $output .= '<a href="'.get_category_link( $category->term_id ).'" title="' . esc_attr( sprintf( esc_html__( "View all posts in %s", 'notiz' ), $category->name ) ) . '">'.$category->cat_name.'</a>'.$separator;
    }
  $post_category = trim($output, $separator);
  }
?>
<article id="post-<?php the_ID(); ?>" <?php post_class($class); ?>>
        <?php if ( is_sticky() && is_home() && ! is_paged() ) : ?>

        <?php endif; ?>
        <div class="post-container clearfix">
            <div class="blog-post-detail">
                <figure class="entry-thumb">
                    <?php
                        if( !$postformat || has_post_format($postformat)){
                            get_template_part( 'templates/preview/content', $postformat );
                        }
                    ?>

                </figure>
                <div class="entry-data">
                    <div class="entry-meta-2">
          						<span class="category">
          							<?php echo trim($post_category); ?>
          						</span>
          						 <?php if(!empty($icon)){ ?>
                        <span class="post-icon">
                            <i class="<?php echo esc_attr($icon); ?>"></i>
                        </span>
                        <?php } ?>
          						<!-- post-icon -->
					         </div>
					           <h3 class="entry-title">
                        <a href="<?php the_permalink(); ?>">
                            <?php the_title(); ?>
                        </a>
                    </h3>

                    <p class="entry-content">
                        <?php echo notiz_wpo_excerpt(40); ?>
                    </p>

					<div class="entry-meta">
                         <?php notiz_wpo_posted_on(); ?>
						 <span class="comment-count">
                            <?php comments_popup_link(esc_html__(' 0 comment', 'notiz'), esc_html__(' 1 comment', 'notiz'), esc_html__(' % comments', 'notiz')); ?>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </article>
