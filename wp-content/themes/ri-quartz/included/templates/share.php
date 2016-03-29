<div class="post-share">
    <div class="row">
        <div class="col-sm-6 col-md-6">
            <span class="post-comment"><a href="<?php echo esc_url(the_permalink()); ?>#comments"><i
                        class="fa-comment-o fa"></i><?php comments_number('0 Comment', '1 Comment', '% Comments'); ?>
                </a></span>
        </div>
        <div class="col-sm-6 col-md-6">
            <div class="share-links pull-right">
                <ul class="social-icons">
                    <li class="facebook"><a
                            href="http://www.facebook.com/sharer.php?u=<?php esc_url(the_permalink()); ?>"
                            class="post_share_facebook" onclick="javascript:window.open(this.href,
                          '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=220,width=600');return false;"><i
                                class="fa fa-facebook"></i></a></li>
                    <li class="twitter"><a href="https://twitter.com/share?url=<?php esc_url(the_permalink()); ?>"
                                           onclick="javascript:window.open(this.href,
                          '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=260,width=600');return false;"
                                           class="product_share_twitter"><i class="fa fa-twitter"></i></a></li>
                    <li class="googleplus"><a
                            href="https://plus.google.com/share?url=<?php esc_url(the_permalink()); ?>" onclick="javascript:window.open(this.href,
                          '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"><i
                                class="fa fa-google-plus"></i></a></li>
                    <li class="pinterest"><a
                            href="http://pinterest.com/pin/create/button/?url=<?php esc_url(the_permalink()); ?>&media=<?php if (function_exists('the_post_thumbnail')) echo esc_url(wp_get_attachment_url(get_post_thumbnail_id())); ?>&description=<?php echo esc_url(get_the_title()); ?>"><i
                                class="fa fa-pinterest"></i></a></li>
                    <li class="mail"><a
                            href="mailto:?subject=<?php the_title(); ?>&body=<?php echo strip_tags(get_the_excerpt()); ?> <?php esc_url(the_permalink()); ?>"
                            class="product_share_email"><i class="fa fa-envelope"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
