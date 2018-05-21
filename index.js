var pContainerHeight = $('.bg').height();

$(window).scroll(function(){

	var wScroll = $(this).scrollTop();

		var row=Math.floor(wScroll/10);
	if(row>5 && row<20)
	{
		$('.1 img:nth-child('+Math.floor(row/1.5-6)+')').css('opacity', '0.4');
		$('.1 img:nth-child('+Math.floor(row/1.5-5)+')').css('opacity', '1');
	}
	else if(row>20 && row<40)
	{	
		$('.2 img:nth-child('+Math.floor(row/1.5-18)+')').css('opacity', '0.4');
		$('.2 img:nth-child('+Math.floor(row/1.5-17)+')').css('opacity', '1');
	} else
	{	
		$('.3 img:nth-child('+Math.floor(row/1.5-28)+')').css('opacity', '0.4');
		$('.3 img:nth-child('+Math.floor(row/1.5-27)+')').css('opacity', '1');
	} 

	if (wScroll <= pContainerHeight) {

		$('.logo').css({
			'transform' : 'translate(0px, '+ wScroll /2 +'%)'
		});
	}

	  if(wScroll > $('.blog-posts').offset().top - $(window).height()){

    var offset = (Math.min(0, wScroll - $('.blog-posts').offset().top +$(window).height() - 250)).toFixed();

    $('.post-1').css({'transform': 'translate('+ offset +'px, '+ Math.abs(offset * 0.2) +'px)'});

    $('.post-3').css({'transform': 'translate('+ Math.abs(offset) +'px, '+ Math.abs(offset * 0.2) +'px)'});

  }

})



$('.form').find('input, textarea').on('keyup blur focus', function (e) {

	var $this = $(this),
	label = $this.prev('label');

	if (e.type === 'keyup') {
		if ($this.val() === '') {
			label.removeClass('active highlight');
		} else {
			label.addClass('active highlight');
		}
	} else if (e.type === 'blur') {
		if( $this.val() === '' ) {
			label.removeClass('active highlight'); 
		} else {
			label.removeClass('highlight');   
		}   
	} else if (e.type === 'focus') {

		if( $this.val() === '' ) {
			label.removeClass('highlight'); 
		} 
		else if( $this.val() !== '' ) {
			label.addClass('highlight');
		}
	}

});

$('.tab a').on('click', function (e) {

	e.preventDefault();

	$(this).parent().addClass('active');
	$(this).parent().siblings().removeClass('active');

	target = $(this).attr('href');

	$('.tab-content > div').not(target).hide();

	$(target).fadeIn(600);

});

var $search = $('input[name="search"]');
	var $sButton = $('#searchButton');
	$sButton.click(function(){
	 event.preventDefault();

	});
	$($search).on('keyup blur focusout focusin hover', function(){
		var search = $search.val();
		
		if(search.length > 0)
		{	$sButton.unbind('click')
			$sButton.removeClass('disabled');
		}
		else
		{
			$sButton.on('click',function(){
				event.preventDefault();})

			$sButton.addClass('disabled');

		}
	})