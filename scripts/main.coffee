(($) ->
	# cart script
	$('.fa-shopping-cart, .wc-forward:not(.checkout)').click (e) ->
		e.preventDefault()
		$('#page').addClass 'open'

	$('#overlay').click ->
		$('#page').removeClass 'open'
) jQuery