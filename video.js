			var player, YTdeferred = $.Deferred();
			window.onYouTubeIframeAPIReady = function() {
				YTdeferred.resolve(window.YT);
			};
			$(function(){
				if (Cookies.get('autoplay')) $('.autoplay').find('i').attr('class', 'fa fa-toggle-off');
				if (Cookies.get('continuous')) $('.continuous').find('i').attr('class', 'fa fa-toggle-off');
				var id = $('.video').attr('id');
				YTdeferred.done(function(YT) {
					player = new YT.Player('player', {
						host: 'https://www.youtube-nocookie.com',
						videoId: id,
						playerVars: {
							'hl': 'en',
							'iv_load_policy': 3,
							'modestbranding': 1,
							'rel': 0
						},
						events: {
							'onReady': function () {
								if (!Cookies.get('autoplay')) player.playVideo();
							},
							'onStateChange': function (event) {
								if (event.data == 0) {
									if (!Cookies.get('continuous')) $(location).attr('href', '?random&related=' + id);
								}
							}
						}
					});
				});
				$(document).on('click', '.autoplay', function() {
					if (Cookies.get('autoplay')) {
						Cookies.remove('autoplay');
						$(this).find('i').attr('class', 'fa fa-toggle-on');
					} else {
						Cookies.set('autoplay', '1', { expires: 30 });
						$(this).find('i').attr('class', 'fa fa-toggle-off');
					}
				});
				$(document).on('click', '.continuous', function() {
					if (Cookies.get('continuous')) {
						Cookies.remove('continuous');
						$(this).find('i').attr('class', 'fa fa-toggle-on');
					} else {
						Cookies.set('continuous', '1', { expires: 30 });
						$(this).find('i').attr('class', 'fa fa-toggle-off');
					}
				});
				$(document).on('click', '.share a', function(event) {
					event.preventDefault();
					var url = $(this).attr('href'),
					popwidth = $(this).attr('width'),
					popheight = $(this).attr('height'),
					popup = window.open (url, '_blank', 'width=' + popwidth + ', height=' + popheight);
					popup.moveTo((screen.width / 2) - (popwidth / 2), (screen.height / 2) - (popheight / 2)).focus();
				});
				var clamp = 74;
				if ($(window).width() > 767) clamp = 92;
				if ($('.tags').height() > clamp) {
					$('.tags').addClass('collapse').prepend('<li class="tag"><a class="expand"><i class="fa fa-chevron-down"></i> More Tags</a></li>');
				}
				var link = '<a class="expand"><i class="fa fa-chevron-down"></i> Read More</a>';
				if ($('.description p').height() > 130) {
					$('.description p').addClass('collapse').after(link);
				}
				$(document).on('click', '.expand', function() {
					text = $(this).parent().find('p');
					if ($(this).parent().parent().hasClass('tags')) text = $(this).parent().parent();
					collapse = '<i class="fa fa-chevron-up"></i> ';
					if ($(this).parent().parent().hasClass('tags')) collapse += 'Less Tags';
					else collapse += 'Read Less';
					expand = '<i class="fa fa-chevron-down"></i> ';
					if ($(this).parent().parent().hasClass('tags')) expand += 'More Tags';
					else expand += 'Read More';
					if (text.hasClass('collapse')) {
						text.removeClass('collapse');
						$(this).html(collapse);
					} else {
						text.addClass('collapse');
						$(this).html(expand);
					}
				});
				function elementScrolled(elem) {
					var docViewTop = $(window).scrollTop(),
					docViewBottom = docViewTop + $(window).height(),
					elemTop = $(elem).offset().top;
					return ((elemTop <= docViewBottom) && (elemTop >= docViewTop));
				}
				$(window).on('scroll', function() {
					if (elementScrolled('.scrolload')) {
						$(window).off('scroll');
						$.ajax({
							url: 'related.php',
							data: 'v=' + id,
							beforeSend: function() {
								$('.fa-puzzle-piece').addClass('fa-spin');
							},
							success: function(response) {
								$('.fa-puzzle-piece').removeClass('fa-spin');
								$('.related-videos').html(response);
							}
						})
					}
				});
				$(document).on('click', '.more-videos', function() {
					var diz = $(this), more = $(this).attr('value');
					$.ajax({
						url: 'related.php',
						data: more,
						beforeSend: function() {
							diz.css('pointer-events', 'none').find('i').addClass('fa-spin');
						},
						success: function(response) {
							diz.parent().remove();
							$('.related-videos').append(response);
						}
					});
				});
			});
