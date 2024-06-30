<?php
$property_type = houzez_taxonomy_simple('property_type');
$property_price = get_post_meta(get_the_ID(), 'fave_property_price', true);
$property_features = get_the_terms(get_the_ID(), 'property_feature');
$property_status = houzez_taxonomy_simple('property_status');
$property_size = houzez_get_listing_data('property_size');
$area_size = houzez_get_listing_data('property_land');
$bathrooms = houzez_get_listing_data('property_bathrooms');
$bedrooms = houzez_get_listing_data('property_bedrooms');
$year_built = houzez_get_listing_data('property_year');


?>
<div class="property-top-wrap">
	<section class="top-banner-v2 bg-dark  w-100 position-relative">
		<div class="banner-wrap-v2">
			<?php if (has_post_thumbnail()): ?>
				<img class="img-banner-v2 w-100" src="<?php echo get_the_post_thumbnail_url(); ?>" alt="">
			<?php endif; ?>
			<div class="poperty-media-wrapv2">
				<h2><?php echo get_the_title() ?></h2>
			</div>
		</div>
	</section>

	<section class="property-details-v2">
		<div class="property-info-v2">
			<div class="property_details">
				<ul class="listing_grid">
					<li class="price-v2">
						<h2>PRICE</h2>
						<h3>AED <?php echo number_format($property_price, 0) ?></h3>
					</li>
					<li class="propertyID">
						<h2>PROTERTY ID</h2>
						<h3><?php echo get_post_meta(get_the_ID(), 'fave_property_id', true); ?></h3>
					</li>
					<li class="property-type-v2">
						<h2>TYPE OF PROPERTY</h2>
						<h3 class="property-overview-item"><?php echo esc_attr($property_type) ?></h3>
					</li>
					<li class="property-ownership-v2">
						<h2>OWNERSHIP</h2>
						<h3 class="property-overview-item"><?php echo esc_attr($property_status) ?></h3>
					</li>
				</ul>
				<div class="property-description">
					<h2>About this property</h2>
					<div class="content-dscription">
						<?php
						$content = get_the_content();
						$trimmed_content = wp_trim_words($content, 89, ''); // Trimmed content without "Read More"
						?>
						<div class="short-content">
							<?php echo $trimmed_content; ?>... <a href="#" class="read-more">Read More</a>
						</div>
						<div class="full-content" style="display:none;">
							<?php echo $content; ?> <a href="#" class="read-less">Read Less</a>
						</div>
					</div>
				</div>
			</div>

			<div class="list-features-v2">
				<div class="keyfeatures">
					<div class="info-title_wrapper">
						<div class="info_title">Key features</div>
						<div class="info-divider hidden-mobile"></div>
					</div>
					<div class="list-fearures">
						<ul>
							<?php foreach ($property_features as $feature): ?>
								<li><?php echo esc_html($feature->name); ?></li>
							<?php endforeach; ?>
						</ul>
					</div>
				</div>
				<div class="properties_list">
					<ul>
						<li>
							<img src="https://cdn.prod.website-files.com/63c7fcca818935ad540c3baa/641c37c35badb971da20d22f_black.svg"
								loading="lazy" alt="" class="icon">
							<div class="info-wrapper">
								<div class="info_title">Land size</div>
								<div class="info-row">
									<div class="info-txt"><?php echo $property_size ?></div>
									<div class="info-txt">m<sup>2</sup></div>
								</div>
							</div>
						</li>
						<li>
							<img src="https://cdn.prod.website-files.com/63c7fcca818935ad540c3baa/641c37b2fc58c3b5bc7bb71d_black.svg"
								loading="lazy" alt="" class="icon">
							<div class="info-row">
								<div class="info-txt"><?php echo $area_size ?></div>
								<div class="info-txt">sqft</div>
							</div>
						</li>
						<li>
							<img src="https://cdn.prod.website-files.com/63c7fcca818935ad540c3baa/641c37aab802fb870cb133aa_black.svg"
								loading="lazy" alt="" class="icon">
							<div class="info-wrapper">
								<div class="info_title">Bedrooms</div>
								<div class="info-row">
									<div class="info-txt"><?php echo $bedrooms ?></div>
								</div>
							</div>
						</li>
						<li>
							<img src="https://cdn.prod.website-files.com/63c7fcca818935ad540c3baa/641c37a25fd63047fe6f9848_black.svg"
								loading="lazy" alt="" class="icon">
							<div class="info-wrapper">
								<div class="info_title">Bathrooms</div>
								<div class="info-row">
									<div class="info-txt"><?php echo $bathrooms ?></div>
								</div>
							</div>
						</li>
						<li>
							<img src="https://cdn.prod.website-files.com/63c7fcca818935ad540c3baa/641c37ee80e89662742507e9_black.svg"
								loading="lazy" alt="" class="icon">
							<div class="info-wrapper">
								<div class="info_title">Year built</div>
								<div class="info-row">
									<div class="info-txt"><?php echo $year_built?></div>
								</div>
							</div>
						</li>
					</ul>
				</div>
			</div>

		</div>
	</section>
	<script>
		jQuery(document).ready(function ($) {
			$('.property-description').on('click', '.read-more', function (e) {
				e.preventDefault();
				$(this).closest('.short-content').hide();
				$(this).closest('.property-description').find('.full-content').show();
			});

			$('.property-description').on('click', '.read-less', function (e) {
				e.preventDefault();
				$(this).closest('.full-content').hide();
				$(this).closest('.property-description').find('.short-content').show();
			});
		});

	</script>
</div><!-- property-top-wrap -->