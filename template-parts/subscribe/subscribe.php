<div class="subscribe">
	<div class="subscribe__left">
		<div class="subscribe__title">
			<?php _e( 'Subscribe to our newsletter', 'theme' ); ?>
		</div>
		<div class="subscribe__text">
			<?php _e( 'Subscribe today for thr latest Deals and More!', 'theme' ); ?>
		</div>
	</div>
	<div class="subscribe__right">
		<form class="subscribe__form form js-subscribe-form" novalidate>
			<label for="email" class="label"><?php _e( 'Email address', 'theme' ); ?></label>
			<input type="email" id="email" class="form__input" name="email" placeholder="Email address" required>
			<div id="emailError" class="error-message"></div>

			<label for="agree" class="custom-checkbox">
				<input type="checkbox" id="agree" class="form__input" name="agree" required>
				<span class="checkmark" id="checkmark"></span>
				<?php _e( 'I agree to Angry Sales storing my data and contacting me', 'theme' ); ?>
			</label>
			<div id="checkboxError" class="error-message"></div>

			<input type="submit" value="Subscribe">
		</form>

		<div class="subscribe__response js-response-message">
			<p class="subscribe__response-title"><?php _e( 'Thank you!', 'theme' ); ?></p>
			<p class="subscribe__response-text"><?php _e( 'The best deals on the way to you!', 'theme' ); ?></p>
			<img src="<?php echo get_theme_file_uri() . '/assets/img/frame.svg'; ?>"
			     class="subscribe__response-img"
			     alt="frame">
		</div>
	</div>
</div>

