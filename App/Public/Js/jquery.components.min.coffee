# jquery.components.coffee
# author: benjytrys@gmail.com

'use strict'


# In case $ was overrided
$ = jQuery

ie6 = !!window.ActiveXObject&&!window.XMLHttpRequest

$.extend
	setRepeater: (fn, interval) ->
		setTimeout (->
			fn()
			$.setRepeater fn, interval
			return
			), interval
		return

	setTimer: (fn, interval) ->
		#Javascript do not support "Call by reference"
		ref = {}
		ref.continue = true

		do recurse = ->
			if ref.continue
				ref.timeout = setTimeout (->
					fn()
					recurse()
					return
					), interval
			return

		ref

	clearTimer: (ref) ->
		ref.continue = false
		clearTimeout ref.timeout
		return

$.extend 
	effect:
		smog: ($now, $next, speed=200) ->
			$now.fadeOut speed, ->
				$next.fadeIn speed
				return
			return

$.fn.extend
	promo: (exchange=$.effect.smog, interval=5000) ->
		###
			<div id="selector">
  				<ul class="items">
  					<li><a href=""><img src="" alt=""></a></li>
  					<li><a href=""><img src="" alt=""></a></li>
  					<li><a href=""><img src="" alt=""></a></li>
  				</ul>
  				<ol class="nums">
  					<li class="cur">1</li>
  					<li>2</li>
  					<li>3</li>
  				</ol>
  				<input type="button" class="pre">
  				<input type="button" class="next">
  			</div>
  		###

		$this = $ this
		$items = $this.find '.items>li'
		$nums = $this.find '.nums>li'
		l = $nums.length
		num = 1 + l

		$nums.click ->
			if not ie6
				$nums.filter('[class*="cur"]').removeClass 'cur'
				$(this).addClass 'cur'
				
			num = +$(this).text()

			exchange $items.filter(':visible'), $items.eq(num - 1)
			return
		
		$this.find('.pre').click ->
			$nums.eq(num % l - 2).click()
			return

		$this.find('.next').click ->
			$nums.eq(num % l).click()
			return

		# When hovered, stop animation
		timer = null
		$this.hover((->
			$.clearTimer timer
			return
			), (->
				timer = $.setTimer((->
					$nums.eq(num % l).click()
					return
					), interval)
				return
				))

		# To start the animation
		$this.mouseout()

		$items.hide().eq(0).show()

		@


	picasa: ->
		unless $('#picasaBox').length
			# Creating #picasaBox in order to show picture in 
			$('<div id="picasaBox"></div>')
				.css({
					 'width': 0,
					 'height': 0,
					 'background-image': 'url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAA+gAAAABCAYAAABNAIQzAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyJpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuMy1jMDExIDY2LjE0NTY2MSwgMjAxMi8wMi8wNi0xNDo1NjoyNyAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENTNiAoV2luZG93cykiIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6NzUyQTFGNTc5REMxMTFFMjgxNjVFRTJGNzg4RkI5MjUiIHhtcE1NOkRvY3VtZW50SUQ9InhtcC5kaWQ6NzUyQTFGNTg5REMxMTFFMjgxNjVFRTJGNzg4RkI5MjUiPiA8eG1wTU06RGVyaXZlZEZyb20gc3RSZWY6aW5zdGFuY2VJRD0ieG1wLmlpZDo3NTJBMUY1NTlEQzExMUUyODE2NUVFMkY3ODhGQjkyNSIgc3RSZWY6ZG9jdW1lbnRJRD0ieG1wLmRpZDo3NTJBMUY1NjlEQzExMUUyODE2NUVFMkY3ODhGQjkyNSIvPiA8L3JkZjpEZXNjcmlwdGlvbj4gPC9yZGY6UkRGPiA8L3g6eG1wbWV0YT4gPD94cGFja2V0IGVuZD0iciI/PhMHfVAAAAAfSURBVHja7MExAQAACMCg2dzoxvABptoAAACAVyfAAO4rAIKTWh7AAAAAAElFTkSuQmCC)',
					 'position': 'absolute',
					 'left': '50%',
					 'display': 'none',
					 'z-index': 9999
					})
				.append($('<img src="" alt="">')
							.css({
								'position': 'absolute',
								'top': '50%',
								'left': '50%'
								}))
				.appendTo 'body'

			# Creating a lab to check the original height and width of picture
			$('<img id="picasaLab" src="" alt="">').hide().appendTo 'body'

		$box = $('#picasaBox')
		$img = $('#picasaBox>img')
		$lab = $('#picasaLab')
		$doc = $(document)

		$(window).scroll ->
			$box.css {'top': $doc.scrollTop()}
			return

		$box.click ->
			bmt = $box.height() / 2
			$box.animate({'height': 0, 'width': 0, 'left': '50%', 'margin-top': bmt}, 400, $box.hide )
			$img.animate({'height': 0, 'width': 0, 'margin': 0}, 400, $img.hide)
			return

		$(this).filter('img').click ->
			$img.attr('src', $(this).attr 'src')
			$lab.attr('src', $(this).attr 'src')

			ih = $lab.height()
			imt = ih / -2
			iw = $lab.width()
			iml = iw / -2

			$box.show().css({'top': $doc.scrollTop(), 'margin-top': $(window).height() / 2})
				.animate({'height': '100%', 'width': '100%', 'left': 0, 'margin-top': 0})

			$img.css({'height': 0, 'width': 0}).show()
				.animate({'height': ih, 'width': iw, 'margin-top': imt, 'margin-left': iml})

			return

		@
	

	showpic: (target, easing, auto=false, speed=5000) ->
		$list = $ this
		$tar = $ target
		$imgs = $list.find('img')
		l = $imgs.length
		row = Math.floor($list.height() / $list.parent().height())

		autoShow = ->
			$img = $imgs.eq(++autoShow.num % l)
			$img.click()
			if autoShow.num % row is 0 and $img.is(':visible')
				$list.parent().siblings().find('.next').click()
			if autoShow.num % l is 0 then $list.css {'margin-top': 0}
			return

		autoShow.num = 0

		$imgs.click ->
			$that = $(this)
			autoShow.num = $that.parent().index()
			$list.find('li').filter('.cur').removeClass 'cur'
			$that.parent().addClass('cur')

			$tar.fadeOut easing, ->
				$(this).attr('src', $that.attr 'src').fadeIn(easing)
				return
			return

		if auto then $.setRepeater autoShow, speed

		@