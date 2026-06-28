<?php get_header(); ?>


    <main>
      <!-- FV -->
      <div class="p-child-fv">
        <div class="p-child-fv__img">
          <picture>
            <source media="(min-width: 768px)" srcset="<?php echo get_template_directory_uri(); ?>/images/blog_list/blog_fv.jpg">
            <img src="<?php echo get_template_directory_uri(); ?>/images/blog_list/blog_fv-sp.jpg" alt="ブログ">
          </picture>
          <h1 class="p-child-fv__title">ブログ</h1>
        </div>
      </div>

      <!-- パンくずリスト -->
      <?php get_template_part('template-parts/breadcrumbs'); ?>


      <!-- ブログ一覧 -->
      <section id="blog-list" class="p-blog-list">
        <div class="l-inner">
          <h2 class="c-section-title">ブログ一覧</h2>
          <?php if (have_posts()): ?>
          <div class="p-blog-list__items">
            <?php while (have_posts()):
              the_post();
            ?>
            <a href="<?php echo esc_url(get_permalink()); ?>" class="p-blog-list__item p-blog-list-item u-opacity">
              <div class="p-blog-list-item__img ">
                <?php
                  $terms = get_the_terms(get_the_ID(), 'blog_cate');
                  if (!empty($terms) && !is_wp_error($terms)) :
                ?>
                  <span class="c-label">
                    <?php echo esc_html($terms[0]->name); ?>
                  </span>
                <?php endif; ?>
                <?php if (has_post_thumbnail()) : ?>
                  <?php the_post_thumbnail(); ?>
                <?php else : ?>
                  <img src="<?php echo esc_url(get_template_directory_uri() . '/images/common/no-image.png'); ?>" alt="No image">
                <?php endif; ?>
              </div>
              <div class="p-blog-list-item__body">
                <h3 class="p-blog-list-item__heading">
                   <?php echo esc_html(get_the_title()); ?>
                </h3>
                <time class="p-blog-list-item__date" datetime="<?php the_time('Y-m-d'); ?>"><?php the_time('Y.m.d'); ?></time>
                <p class="p-blog-list-item__text c-text">
                  <?php echo esc_html(get_the_excerpt()); ?>
                </p>
              </div>
            </a>
            <?php endwhile; ?>
          </div>

          <!-- ページャー -->
          <div class="p-blog-list__pagination c-pager">
            <?php wp_pagenavi(); ?>
          </div>
          <?php else : ?>
          <p class="c-text__empty">投稿がありません</p>
          <?php endif; ?>

        </div>
      </section>

      <!-- TOPに戻るボタンのjsの修正をAIに依頼 -->
      <div class="p-top-btn">
        <div class="p-top-btn__bg">
          <a href="#" class="p-top-btn__arrow u-opacity " aria-label="ページ上部へ">
            <div class="p-top-btn__arrow-img">
              <img src="<?php echo get_template_directory_uri(); ?>/images/icon/goto-top.svg" alt="トップへ戻る">
            </div>
          </a>
          <a href="./contact_form.html" class="c-btn p-top-btn__contact">お問い合わせ</a>
        </div>
      </div>
    
    <?php get_template_part('template-parts/fix-area'); ?>
    </main>

<?php get_footer(); ?>

