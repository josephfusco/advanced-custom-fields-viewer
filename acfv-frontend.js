$j=jQuery.noConflict();
$j(document).ready(function(){

	$j('#acfv-options-viewer').hide();


	// open viewer
	$j('#acfv-toggle').on("click", function(){
		$j('#acfv-wrap, #acfv-click-layer').addClass('acfv-open');
		$j('html').addClass('acfv-active');
		$j(this).hide();
	});

	// close viewer
	$j('#acfv-btn-close').on("click", function(){
		$j('#acfv-wrap, #acfv-click-layer').removeClass('acfv-open');
		$j('html').removeClass('acfv-active');
		$j('#acfv-toggle').show();
	});
	$j('#acfv-click-layer').click(function() {
		$j('#acfv-wrap, #acfv-click-layer').removeClass('acfv-open');
		$j('html').removeClass('acfv-active');
		$j('#acfv-toggle').show();
	});


	$j('#acfv-btn-current').on("click", function(){
		$j('.acfv-btn').removeClass('acfv-active');
		$j(this).addClass('acfv-active');
		$j('#acfv-options-viewer').hide();
		$j('#acfv-current-viewer').show();
	});

	$j('#acfv-btn-options').on("click", function(){
		$j('.acfv-btn').removeClass('acfv-active');
		$j(this).addClass('acfv-active');
		$j('#acfv-current-viewer').hide();
		$j('#acfv-options-viewer').show();
	});
});