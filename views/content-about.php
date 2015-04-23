
          <section class="row grid section-about">

            <div class="col-md-12 col-row col-image">
            	<div class="radial-bg">
              		<h1><?php echo $pnm['about']['intro_title']; ?></h1>
              		<?php echo $pnm['about']['intro_text']; ?>
            	</div>
            </div>

          </section>

          <section class="row grid section-story">

            <div class="col-md-12 col-row">
            	<div>
              		<h1><?php echo $pnm['about']['story_title']; ?></h1>
              		<p><?php echo $pnm['about']['story_text']; ?></p>
            	</div>
            </div>

          </section>

          <section class="row grid section-team">

            <div class="col-md-12 col-row">
            	<div>
              		<h1><?php echo $pnm['about']['team_title']; ?></h1>
                  <p><?php echo $pnm['about']['team_text']; ?></p>
              </div>
            </div>

              <?php // team.json defined in config.php
              foreach($team['team_member'] as $key => $member) { ?>

               <div class="col-md-6 team">
                    <div class="team-icon">
                      <img src="<?php echo $member['image']; ?>" class="img-circle" alt="<?php echo $member['name']; ?>'s Team Pic">
                    </div>
                    <h2 class="center"><?php echo $member['name']; ?></h2>
                    <div class="team-subtitle"><?php echo $member['role']; ?></div>
                    <div class="team-text">
                      <p><?php echo $member['bio']; ?></p>
                    </div>
                    <div class="team-social">
                      <ul>
                        <?php if ( $member['social']['linkedin'] ) : ?><li><a target="_blank" href="<?php echo $member['social']['linkedin']; ?>" title="<?php echo $member['name']; ?>'s LinkedIn"><img src="assets/img/icon-linkedin.svg" alt=""></a></li><?php endif; ?>
                        <?php if ( $member['social']['twitter'] ) : ?><li><a target="_blank" href="<?php echo $member['social']['twitter']; ?>" title="Twitter"><img src="assets/img/icon-twitter.svg" alt=""></a></li><?php endif; ?>
                        <?php if ( $member['social']['instagram'] ) : ?><li><a target="_blank" href="<?php echo $member['social']['instagram']; ?>" title="Instagram"><img src="assets/img/icon-instagram.svg" alt=""></a></li><?php endif; ?>
                        <?php if ( $member['social']['website'] ) : ?><li><a target="_blank" href="<?php echo $member['social']['website']; ?>" title="Personal Website"><img src="assets/img/icon-website.svg" alt=""></a></li><?php endif; ?>
                      </ul>
                    </div>
                </div>

                <?php } ?>

          </section>

          <section id="impactcenter" class="row grid section-center">

            <div class="col-md-12 col-row">
            	<div>
              		<h1><?php echo $pnm['about']['impact_title']; ?></h1>
              		<p><?php echo $pnm['about']['impact_intro']; ?></p>
            	</div>
            </div>

          </section>

          <section class="row grid section-criteria">

            <div class="col-md-12 col-row">
            	<div>
              		<h1><?php echo $pnm['about']['criteria_title']; ?></h1>
            	</div>
            </div>

            <?php // center-criteria.json defined in config.php
            foreach ($criteria['criteria_list'] as $key => $feature) { ?>

              <div class="col-md-4 feature">
               <div class="feature-icon <?php echo $feature['class']; ?>">
                  <img class="booking" src="<?php echo $feature['image']; ?>" alt="">
                </div>
                <h2 class="center"><?php echo $feature['title']; ?></h2>
                <div class="feature-text">
                  <p><?php echo $feature['text']; ?></p>
                </div>
            </div>

            <?php } ?>

          </section>

          <section id="contact" class="row grid section-contact">

            <div class="col-md-12 col-row">
            	<div>
              		<h1><?php echo $pnm['about']['contact_title']; ?></h1>
              		<p><?php echo $pnm['about']['contact_intro']; ?></p>

		              <form class="form-horizontal" id="contact-form" action="" method="post" accept-charset="utf-8">
		              <div class="form-line">
		                <div class="form-group">
		                  <label class="sr-only" for="firstname"><?php echo $forms['fields']['firstname'] ?></label>
		                  <input class="form-control" name="firstname" placeholder="<?php echo $forms['fields']['firstname'] ?>" type="text" required>
		                </div>
		                <div class="form-group">
		                  <label class="sr-only" for="lastname"><?php echo $forms['fields']['lastname'] ?></label>
		                  <input class="form-control"  name="lastname" placeholder="<?php echo $forms['fields']['lastname'] ?>" type="text" required>
		                </div>
		                <div class="form-group">
		                  <label class="sr-only" for="email"><?php echo $forms['fields']['email'] ?></label>
		                  <input class="form-control" name="email" placeholder="<?php echo $forms['fields']['email'] ?>" type="email" required>
		                </div>
		                <div class="form-group">
		                 	<label class="selectlbl" for="reason_interested">
        							<select class="form-control" name="reason_interested" required>
                        <option value="" disabled selected><?php echo $forms['fields']['interest_selected'] ?></option>
                        <?php foreach ($forms['fields']['interest'] as $key => $option) { ?>
                          <option value="<?php echo $option['option'] ?>"><?php echo $option['option'] ?></option>
                        <?php } ?>
        							</select>
							</label>
						 </div>
		              </div>
		                <div class="form-group">
		                  <textarea class="form-control" name="message" placeholder="<?php echo $forms['fields']['message'] ?>" required></textarea>
		                </div>
		                <div class="form-group text-right">
		                  <button class="btn submit-btn" type="submit"><?php echo $forms['fields']['submit'] ?></button>
		                </div>

		              </form>

            	</div>
            </div>

          </section>

         <section class="row grid section-partners">

            <div class="col-md-12 col-row">
            	<div>
              		<h1><?php echo $pnm['about']['partner_title']; ?></h1>
              		 <ul class="logo-list">
		                <li><img src="assets/img/logo-tribal-convergence-network.jpg" alt="Tribal Convergence Network Logo"></li>
		                <li><img src="assets/img/logo-seeds-game.jpg" alt="Seeds Game Logo"></li>
		              </ul>
            	</div>
            </div>

          </section>