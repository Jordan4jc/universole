(($) ->
	# cart script
	$('.fa-shopping-cart').click (e) ->
		e.preventDefault()
		$('#page').addClass 'open'

	$('#overlay').click ->
		$('#page').removeClass 'open'
) jQuery