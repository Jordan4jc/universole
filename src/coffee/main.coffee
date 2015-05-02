(($) ->
	# cart script
	$('.fa-shopping-cart').click (e) ->
		e.preventDefault()
		$('#page').addClass 'open'

	$('#overlay').click ->
		$('#page').removeClass 'open'

	$('.menu-trigger').click (e) ->
		e.preventDefault()
		$('.menu-main-navigation-container').slideToggle()

	$(window).resize ->
		if $(window).outerWidth() >= 1140
			$('.menu-main-navigation-container').removeAttr 'style'
) jQuery