
          <section class="row grid section-welcome">

            <div class="col-md-6 col-caption">
              <div>
                <h1><?php echo $pnm['cta1']; ?></h1>
                <p><?php echo $pnm['cta1_content']; ?></p>
                <a href="about.php#impactcenter" title="Impact Centers"><button class="btn btn-olive" type="button"><?php echo $pnm['cta1_btn']; ?> <i class="fa fa-angle-double-right"></i></button></a>
              </div>
            </div>
            <div class="col-md-6 col-image"></div>

          </section>

          <section class="row grid section-impact">

            <div class="col-md-12 col-row">
              <h1><?php echo $pnm['cta2']; ?></h1>
            </div>

          </section>

          <section class="row grid section-learn">

            <div class="col-md-6 col-image"></div>
            <div class="col-md-6 col-caption">
              <div>
                <h2><?php echo $pnm['cta3']; ?></h2>
                <p><?php echo $pnm['cta3_content']; ?></p>
              </div>
            </div>

          </section>

          <section class="row grid section-offer">

            <div class="col-md-6 col-md-push-6 col-image"></div>
            <div class="col-md-6 col-md-pull-6 col-caption">
              <div>
                <h2><?php echo $pnm['cta4']; ?></h2>
                <p><?php echo $pnm['cta4_content']; ?></p>
              </div>
            </div>

          </section>

          <section class="row grid section-places">

            <div class="col-md-6 col-image"></div>
            <div class="col-md-6 col-caption">
              <div>
                <h2>
                  <?php echo $pnm['cta5']; ?>
                </h2>
                <p><?php echo $pnm['cta5_content']; ?></p>
                <a href="about.php#contact" title="Contact Us"><button class="btn btn-olive" type="button"><?php echo $pnm['cta5_btn']; ?> <i class="fa fa-angle-double-right"></i></button></a>
              </div>
            </div>

          </section>

          <section class="row grid section-thrive">

            <div class="col-md-12 col-row">
              <h1 class="center"><?php echo $pnm['cta6']; ?></h1>
            </div>

          </section>

          <section class="row grid section-features">

                <div class="col-md-6 feature">
                    <div class="feature-icon">
                      <img class="directory" src="assets/img/center-directory.svg" alt="">
                    </div>
                    <h2 class="center">Add your center to the directory</h2>
                    <div class="feature-text">
                      <p>Enable more people to find your center, stay, volunteer, and take a workshop. We’ll share your impact center with travelers from around the globe.</p>
                      <p>Find out more below about our criteria for listing.</p>
                    </div>
                    <div class="feature-btn">
                      <a href="about.php#impactcenter" title="Contact Us"><button class="btn btn-olive">Learn more <i class="fa fa-angle-double-right"></i></button></a>
                    </div>
                </div>

                <div class="col-md-6 feature">
                    <div class="feature-icon">
                      <img class="booking" src="assets/img/booking-tools.svg" alt="">
                    </div>
                    <h2 class="center">Coming soon: management &amp; booking tools</h2>
                    <div class="feature-text">
                      <p>Our team is currently participating in <a href="http://www.startupchile.org/blog/ladies-and-gentleman-these-are-the-100-startups-chosen-to-be-part-of-generation-12/" target="_blank">Startup Chile 2015</a> and focusing on creating organizational and booking tools specifically designed for centers like yours.</p>
                      <p>Contact us if you would like to offer your input.</p>
                    </div>
                    <div class="feature-btn">
                      <a href="about.php#contact" title="Contact Us"><button class="btn btn-olive" type="button">Contact us <i class="fa fa-angle-double-right"></i></button></a>
                    </div>
                </div>

          </section>

          <section class="row grid section-subscribe">

            <div class="cold-md-12 col-row">

              <h1 class="center">Become a part of the movement.</h1>
              <p>Get involved by signing up for our newsletter or sharing Project Nuevo Mundo on Facebook and Twitter.</p>

              <form class="form-inline" id="newsletter-submit" action="" method="post" accept-charset="utf-8">
                <div class="form-group">
                  <label class="sr-only" for="firstname"></label>
                  <input class="form-control" name="firstname" placeholder="First name" type="text" required>
                </div>
                <div class="form-group">
                  <label class="sr-only" for="lastname"></label>
                  <input class="form-control"  name="lastname" placeholder="Last name" type="text" required>
                </div>
                <div class="form-group">
                  <label class="sr-only" for="email"></label>
                  <input class="form-control" name="email" placeholder="Email" type="text" required>
                </div>
                <div class="form-group">
                  <button class="btn submit-btn" type="submit">Submit</button>
                </div>
              </form>


              <div class="share-project">
                <a href="#" onclick="javascript:window.open('https://www.facebook.com/sharer/sharer.php?u=http://projectnuevomundo.com', '_blank', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=400,width=600');return false;" title="Share on Facebook"><button class="btn btn-red" type="button"><i class="fa fa-facebook"></i> Facebook</button></a>
                <a href="#" onclick="javascript:window.open('https://twitter.com/share?text=Support%20Project%20Nuevo%20Mundo%20-%20&url=http%3A%2F%2Fprojectnuevomundo.com', '_blank', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=250,width=600');return false;" title="Share on Twitter" target="_blank"><button class="btn btn-red" type="button"><i class="fa fa-twitter"></i> Twitter</button></a>
              </div>

            </div>

          </section>

          <section class="row grid section-blog">

            <div class="cold-md-12 col-row">

              <h1 class="center">Learn more about transformational travel on our blog.</h1>

                <?php
                  define('WP_USE_THEMES', false);
                  require('../pnm-blog/wp-blog-header.php');
                  query_posts('showposts=2');
                ?>

                <?php while (have_posts()): the_post(); ?>

                <article class="post row">
                    <div class="col-md-4">
                      <div class="post-thumbnail-container">
                        <?php if ( has_post_thumbnail() ) {
                          the_post_thumbnail( 'thumbnail', array( 'class' => 'post-thumbnail img-responsive' ));
                        } ?>
                      </div>
                    </div>
                    <div class="col-md-8">
                      <header>
                        <h2 class="post-title"><a target="_blank" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                        <div class="post-meta">
                          by <span class="author"><a target="_blank" href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php the_author(); ?></a></span> | <time class="post-date" datetime="<?php echo get_the_time('c'); ?>"><?php echo get_the_date('F j, Y'); ?></time>
                        </div>
                      </header><!-- /header -->
                      <div class="post-excerpt">
                        <?php the_excerpt(); ?>
                      </div>
                      <div class="post-more">
                        <a target="_blank" href="<?php the_permalink(); ?>" title="Link to <?php the_title(); ?>"><button class="btn btn-olive" type="button">Read more <i class="fa fa-angle-double-right"></i></button></a>
                      </div>
                    </div>
                </article>

                <?php endwhile; ?>
            </div>

          </section>

          <section class="row grid section-press">

            <div class="cold-md-12 col-row">

              <h1 class="center">Press &amp; Participation.</h1>
              <ul class="logo-list">
                <li><img src="assets/img/logo-shareable.png" alt="Shareable Logo"></li>
                <li><img src="assets/img/logo-utne.png" alt="UTNE Logo"></li>
                <li><img src="assets/img/logo-reality-sandwich.png" alt="Reality Sandwich Logo"></li>
                <li><img src="assets/img/logo-huffington-post.png" alt="Huffington Post Logo"></li>
                <li><img src="assets/img/logo-startup-chile.png" alt="Startup Chile Logo"></li>
                <li><img src="assets/img/logo-hack-summit.jpg" alt="Hack Summit Logo"></li>
                <li><img src="assets/img/logo-3-day-startup.png" alt="3 Day Startup Logo"></li>
              </ul>

            </div>

          </section>