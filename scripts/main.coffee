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
) jQuery