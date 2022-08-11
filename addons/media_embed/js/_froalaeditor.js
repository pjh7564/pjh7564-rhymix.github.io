jQuery(document).ready(function($) {

	var editor = $('[data-editor-primary-key-name$="_srl"]');
	if ( editor.length < 1 ) {
		return;
	}
	var paste, paste_html;
	var matches = [], queries = {}, params = {};
	var id, type, name, list, start, hash, style, url, html;
	var iframe_wrapper = 'media_embed';
	var current_domain = request_uri.replace(/^http(?:s)?:/, '').replace(/\//g, '');

	var afreecaRegExp = /^https?:\/\/(?:(vod|play).)?afreecatv.com\/((.+?)(?:\/STATION)?\/(\d+))/;
	var audioclipRegExp = /^https?:\/\/audioclip.naver.com\/(channels|audiobooks)\/([\_\-0-9a-zA-Z]+)(?:\/(clips)\/([\_\-0-9a-zA-Z]+))?/;
	var codepenRegExp = /^https?:\/\/(?:www\.|m\.)?codepen.io\/([a-z]+)\/pen\/((?:[a-z]+[A-Z]+|[A-Z]+[a-z]+)(?:[a-zA-Z]+))+$/;
	var dailymotionRegExp = /^https?:\/\/(www\.|)(?:dailymotion\.com(?:\/video|\/hub)|dai\.ly)\/([-_0-9a-zA-Z]+)(?:\?playlist=([a-z0-9]+)|)(?:#video=([a-z0-9]+)|)?/;
	var fbPostsRegExp = /^https:\/\/(?:www|m)\.facebook\.com\/(?:.+\/)?(?:photo(?:\.php|s)|permalink\.php|media|questions|notes|[^\/]+\/(?:activity|posts))[\/?](.*)$/;
	var fbVideosRegExp = /^https:\/\/(?:www|m)\.facebook\.com\/(?:[^\/?].+\/)?(?:videos|watch|video\.php)(?:\/|(?:\/)?\?[a-z]+=)?([0-9]+)?(?:\/)?$/;
	var instagramRegExp = /^https?:\/\/(?:www\.)?(?:instagram|instagr)?\.(?:com|am)?(?:\/([a-zA-Z0-9]+))?(?:\/(p|tv|tags))?\/([^/?#&\s]+)((?:(?:\/|\?)[^\s]+))?/;
	var imdbRegExp = /^https?:\/\/(?:www\.|m\.)?imdb.com\/video\/(?:imdb\/)?((vi)(\d+))/;
	var jsfiddleRegExp = /^https?:\/\/(?:www\.|m\.)?jsfiddle.net\/([A-Za-z0-9_-]+)\/([A-Za-z0-9_-]+)(?:\/([A-Za-z0-9_-]+))?/;
	var kakaoRegExp = /^https?:\/\/(?:www|play-tv|tv\.)?kakao.com\/(?:channel\/(?:[^\/]*)\/)?(?:(v|cliplink|l|livelink))\/(\d+)(?:|\/\?)/;
	var naverRegExp = /^https?:\/\/(?:m\.)?tv(?:cast)?\.naver.com\/(v|l)\/(\d+)(?:|\/\?)/;
	var preziRegExp = /^https?:\/\/(?:[a-z0-9]+\.)?prezi.com\/((?:v|p))?\/?(.+)\/(.+)/;
	var redditRegExp = /^https?:\/\/(?:(?:www|np|www\.np)\.)?reddit.com\/r\/([^/]+)\/comments\/(\w+)\/(\w+)(?:\/(\w+))?(?:(?:\/|\?)(?:.*)?)?$/;
	var slidedhareRegExp = /^https?:\/\/(?:[a-z0-9]+\.)?slideshare.net\/(.+)\/(.+)/;
	var soundcloudRegExp = /^https?:\/\/((?:w\.|www.|)soundcloud\.com|snd\.sc)\/([\w\-\.]+[^#\s]+)(.*)?(#[\w\-]+)?$/;
	var spotifyRegExp = /^(spotify|http(?:s)?:\/\/(?:[a-z]+\.)?(?:spotify|spoti)\.(?:com|fi))[\/|:](?:user[\/|:]([a-zA-Z0-9]+)[\/|:])?(track|album|artist|playlist)[\/|:]([0-9a-zA-Z]+)((?:\?.+|))/;
	var tedRegExp = /^https?:\/\/((?:www.|)ted\.com)\/talks\/([\_\-0-9a-zA-Z]+)/;
	var tiktokRegExp = /^https?:\/\/(?:(?:www|m)\.(?:tiktok.com)\/(?:@[a-z0-9_]+\/)?(?:video|v|embed)(?:\/)?)([\da-z]+)/;
	var tvcfRegExp = /^https?:\/\/play.tvcf.co.kr\/([0-9]+)?$/;
	var twitchRegExp = /^https?:\/\/?(?:([a-z0-9]+)\.)?twitch.tv(?:\/(\w+))?\/(?:([-_0-9a-zA-Z]+))?(?:[/?&]+(?:(?:(t|channel))=([-_0-9a-zA-Z]+)|.+))?$/;
	var twitterRegExp = /^https?:\/\/(?:www\.)?twitter\.com\/(?!explore|login|settings|tos|privacy|search|i\/flow|i\/events|i\/moments)(\w+){1,15}(?:\/(?:(status|lists))?)?(?:\/([0-9a-zA-Z-_]+)(?:\?.+)?)?$/;
	var vimeoRegExp = /^https?:\/\/(www\.)?vimeo.com\/(?:channels\/(?:\w+\/)?|groups\/([^\/]*)\/videos\/|)(\d+)((?:\#t=.+|))(?:|\/\?)/;
	var vliveRegExp = /^https?:\/\/(?:www|m)\.(?:vlive\.tv(?:\/(video|post)))\/([-_0-9a-zA-Z]+)?/;
	var youtubeRegExp = /^https?:\/\/(?:www\.|m\.)?(?:youtube\.com|youtu.be)\/(?:[\w\-]+\?((?:v|list))=|embed\/|v\/)?([\w\-]+)(\S+)?$/;

	var findSrc = /<?.* src="(.+?)" ?.*>/;
	var findScript = /<script.*?>.*?<\/script>/;
	var soundcloudRegExpIframe = /<iframe ?.* src="([^"]+(playlists|tracks)(?:\/|%2F)(\d+)[^"]+)" ?.*>/;
	var vliveRegExpVideoID = /\"videoSeq\"\:(\d+)\,/;

	editor.on('froalaEditor.paste.before', function (e, editor, original_event) {
		if ( !original_event.clipboardData ) {
			return;
		}
		paste = original_event.clipboardData.getData('text');
		paste_html = original_event.clipboardData.getData('text/html');

		// AFREECA TV
		matches = paste.match(afreecaRegExp);
		if ( matches && matches[4] ) {
			id = matches[4];
			type = matches[1];
			hash = (type === 'play') ? matches[3] : ''; // username

			if ( type === 'play' ) {
				url = 'https://m.afreecatv.com/#/player/'+ hash +'/embed?link=true';
			} else if ( type === 'vod' ) {
				url = 'https://m.afreecatv.com/embed/index.html?title_no=' + id;
			}
			html = 
				'<p>' +
					'<span class="fr-video fr-fvc fr-dvb fr-draggable" contenteditable="false" draggable="true">' +
						'<iframe width="640" height="360" src="'+ url +'" frameborder="0" allowfullscreen="" class="fr-draggable"></iframe>' +
					'</span>' +
				'</p>' +
				'<p><br></p>';
			editor.html.insert(html);
			return false;

		}

		// AUDIO CLIP
		matches = paste.match(audioclipRegExp);
		if ( matches && matches[2] ) {
			type = matches[1];
			id = matches[2];
			url = 'https://player.audiop.naver.com/player?cpId=audioclip&cpMetaId=';
			if ( type === 'channels' ) {
				url += 'CH_' + id + '_EP_';
				url += matches[3] ? matches[4] : '1';
			} else {
				url += id;
			}
			style = 'height: 160px; padding-bottom: 0;';

			html = 
				'<p>' +
					'<span class="fr-video fr-fvc fr-dvb fr-draggable" contenteditable="false" draggable="true">' +
						'<iframe width="640" height="360" style="'+ style +'" src="'+ url +'" frameborder="0" allowfullscreen="" class="fr-draggable"></iframe>' +
					'</span>' +
				'</p>' +
				'<p><br></p>';
			editor.html.insert(html);
			return false;
		}

		// CODEPEN
		matches = paste.match(codepenRegExp);
		if ( matches && matches[2] ) {
			type = matches[1];
			id = matches[2];
			style = 'height: 300px; padding-bottom: 0;';

			html = 
				'<p>' +
					'<span class="fr-video fr-fvc fr-dvb fr-draggable" contenteditable="false" draggable="true">' +
						'<iframe width="640" height="360" src="https://codepen.io/'+ type +'/embed/'+ id +'?theme-id=dark&default-tab=html,result" frameborder="0" allowfullscreen="" class="fr-draggable"></iframe>' +
					'</span>' +
				'</p>' +
				'<p><br></p>';
			editor.html.insert(html);
			return false;
		}

		// DAILYMOTION
		matches = paste.match(dailymotionRegExp);
		if ( matches && matches[2] ) {
			id = matches[2];
			list = matches[3] ? '?playlist=' + matches[3] : '';
			hash = matches[4] ? '#video=' + matches[4] : '';

			html = 
				'<p>' +
					'<span class="fr-video fr-fvc fr-dvb fr-draggable" contenteditable="false" draggable="true">' +
						'<iframe width="640" height="360" src="https://www.dailymotion.com/embed/video/'+ id + list + hash +'" frameborder="0" allowfullscreen="" class="fr-draggable"></iframe>' +
					'</span>' +
				'</p>' +
				'<p><br></p>';
			editor.html.insert(html);
			return false;
		}

		// FACEBOOK : POSTS
		matches = paste.match(fbPostsRegExp);
		if ( matches ) {
			url = 'https://www.facebook.com/plugins/post.php?href='+ encodeURIComponent(matches[0]) +'&show_text=true&appId';

			html = 
				'<div class="'+ iframe_wrapper +' fb-post fb_iframe_widget_fluid_desktop" data-href="'+ decodeURIComponent(matches[0]) +'" data-width="552" data-show-text="true">' +
					'<iframe class="fb-xfbml-parse-ignore" src="'+ url +'" style="width: 552px; height: 400px; border: none; overflow: hidden;" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>' +
				'</div>' +
				'<p>&nbsp;</p>';
			editor.html.insert(html);
			return false;
		}

		// FACEBOOK : VIDEOS
		matches = paste.match(fbVideosRegExp);
		if ( matches ) {
			url = 'https://www.facebook.com/plugins/video.php?href='+ encodeURIComponent(matches[0]) +'&show_text=true&appId';

			html = 
				'<p>' +
					'<span class="fr-video fr-fvc fr-dvb fr-draggable fb-video" contenteditable="false" draggable="true" data-href="'+ decodeURIComponent(matches[0]) +'" data-width="auto" data-show-text="true">' +
						'<iframe width="640" height="360" src="'+ url +'" frameborder="0" allowfullscreen="" class="fr-draggable fb-xfbml-parse-ignore"></iframe>' +
					'</span>' +
				'</p>' +
				'<p><br></p>';
			editor.html.insert(html);
			return false;
		}

		// IMDB
		matches = paste.match(imdbRegExp);
		if ( matches && matches[1] && matches[2] === 'vi' && $.isNumeric(matches[3]) ) {
			id = matches[1];
			url = 'https://www.imdb.com/video/imdb/'+ id +'/imdb/embed?&amp;format=1080p&amp;width=640';

			html = 
				'<p>' +
					'<span class="fr-video fr-fvc fr-dvb fr-draggable" contenteditable="false" draggable="true">' +
						'<iframe width="640" height="360" src="'+ url +'" frameborder="0" allowfullscreen="" class="fr-draggable"></iframe>' +
					'</span>' +
				'</p>' +
				'<p><br></p>';
			editor.html.insert(html);
			return false;
		}

		// INSTAGRAM
		matches = paste.match(instagramRegExp);
		if ( matches && matches[3] ) {
			id = matches[3];
			if ( !matches[1] ) {
				type = 'username';
			} else if ( matches[1] === 'p' || matches[2] === 'p' ) {
				type = 'p';
			} else if ( matches[1] === 'tv' ) {
				type = 'tv';
			} else if ( matches[1] === 'explore' || matches[2] === 'tags' ) {
				type = 'tag';
			}

			if ( type === 'p' || type === 'tv' ) {
				html = 
					'<p>' +
						'<span class="fr-video fr-fvc fr-dvb fr-draggable" contenteditable="false" draggable="true">' +
							'<iframe class="instagram-media instagram-media-rendered" frameborder="0" height="835" scrolling="no" src="https://www.instagram.com/'+ type +'/'+ id +'/embed/captioned/" style="background: white; max-width: 540px; width: calc(100% - 2px); border-radius: 3px; border: 1px solid rgb(219, 219, 219); box-shadow: none; display: block; margin: 0px auto; min-width: 326px; padding: 0px;"></iframe>' +
						'</span>' +
					'</p>' +
					'<p><br></p>';
				editor.html.insert(html);
				return false;
			}
		}

		// JSFIDDLE
		matches = paste.match(jsfiddleRegExp);
		if ( matches && matches[1] && matches[1] !== 'user'  && matches[1] !== 'boilerplate' && matches[2] ) {
			name = matches[1];
			id = matches[2];
			hash = matches[3] ? '/' + matches[3] : '';
			url = '//jsfiddle.net/'+ name +'/'+ id + hash + '/embedded/result,html,css,js/dark/';

			html = 
				'<p>' +
					'<span class="fr-video fr-fvc fr-dvb fr-draggable" contenteditable="false" draggable="true">' +
						'<iframe width="640" height="360" src="'+ url +'" frameborder="0" allowfullscreen="" class="fr-draggable"></iframe>' +
					'</span>' +
				'</p>' +
				'<p><br></p>';
			editor.html.insert(html);
			return false;
		}

		// KAKAO TV
		matches = paste.match(kakaoRegExp);
		if ( matches && $.isNumeric(matches[2]) ) {
			id = matches[2];
			type = (matches[1] === 'l' || matches[1] === 'livelink') ? 'livelink' : 'cliplink';

			html = 
				'<p>' +
					'<span class="fr-video fr-fvc fr-dvb fr-draggable" contenteditable="false" draggable="true">' +
						'<iframe width="640" height="360" src="https://tv.kakao.com/embed/player/'+ type +'/'+ id +'?service=kakao_tv&amp;section=channel&amp;profile=HIGH&amp;wmode=transparent" frameborder="0" allowfullscreen="" class="fr-draggable"></iframe>' +
					'</span>' +
				'</p>' +
				'<p><br></p>';
			editor.html.insert(html);
			return false;
		}

		// NAVER TV
		matches = paste.match(naverRegExp);
		if ( matches && $.isNumeric(matches[2]) ) {
			id = matches[2];
			url = (matches[1] === 'l') ? 'https://tv.naver.com/l/'+ id +'/sharePlayer' : 'https://tv.naver.com/embed/'+ id +'';

			html = 
				'<p>' +
					'<span class="fr-video fr-fvc fr-dvb fr-draggable" contenteditable="false" draggable="true">' +
						'<iframe width="640" height="360" src="'+ url +'" frameborder="0" allowfullscreen="" class="fr-draggable"></iframe>' +
					'</span>' +
				'</p>' +
				'<p><br></p>';
			editor.html.insert(html);
			return false;
		}

		// PREZI TV
		matches = paste.match(preziRegExp);
		if ( matches && matches[2] ) {
			id = matches[2];
			type = (matches[1] === 'v') ? 'v/' : '';

			html = 
				'<p>' +
					'<span class="fr-video fr-fvc fr-dvb fr-draggable" contenteditable="false" draggable="true">' +
						'<iframe width="640" height="360" src="https://prezi.com/'+ type +'embed/'+ id +'/" frameborder="0" allowfullscreen="" class="fr-draggable"></iframe>' +
					'</span>' +
				'</p>' +
				'<p><br></p>';
			editor.html.insert(html);
			return false;
		}

		// REDDIT
		matches = paste.match(redditRegExp);
		if ( matches && matches[1] && matches[2] && matches[3] ) {
			name = matches[1];
			type = matches[2];
			id = matches[3];
			hash = matches[4];
			url = 'https://www.redditmedia.com/r/'+ name +'/comments/'+ type +'/'+ id +'/';
			if ( hash ) {
				url += hash + '?depth=2&amp;showmore=false&amp;embed=true&amp;showtitle=true&amp;context=1&amp;showedits=false';
			} else {
				url += '?ref_source=embed&amp;ref=share&amp;embed=true&amp;showedits=false';
			}

			html = 
				'<p>' +
					'<span class="fr-video fr-fvc fr-dvb fr-draggable" contenteditable="false" draggable="true">' +
						'<iframe width="640" height="360" src="'+ url +'" frameborder="0" allowfullscreen="" class="fr-draggable"></iframe>' +
					'</span>' +
				'</p>' +
				'<p><br></p>';
			editor.html.insert(html);
			return false;
		}

		// SLIDESHARE
		matches = paste.match(slidedhareRegExp);
		if ( matches && matches[2] ) {
			params = {
				url: matches[0]
			};

			$.getJSON('https://www.slideshare.net/api/oembed/2?callback=?', params, function(data) {
				matches = data.html.match(findSrc);
				html = 
					'<p>' +
						'<span class="fr-video fr-fvc fr-dvb fr-draggable" contenteditable="false" draggable="true">' +
							'<iframe width="640" height="360" src="'+ matches[1] +'" frameborder="0" allowfullscreen="" class="fr-draggable"></iframe>' +
						'</span>' +
					'</p>' +
					'<p><br></p>';
				editor.html.insert(html);
			}).fail(function() {
				editor.html.insert(paste_html);
			});
			return false;
		}

		// SOUNDCLOUD
		matches = paste.match(soundcloudRegExp);
		if ( matches && matches[2] ) {
			params = {
				url: matches[0].replace(matches[3], ''),
				format: 'json',
				maxheight: 166,
				show_comments: true
			};

			$.getJSON('https://soundcloud.com/oembed', params, function(data) {
				matches = data.html.match(soundcloudRegExpIframe);
				if ( matches[2] === 'tracks' ) {
					style = 'height: '+ data.height +'px; padding-bottom: 0;';
				} else {
					style = 'height: 374px; padding-bottom: 0;';
				}
				html = 
					'<p>' +
						'<span class="fr-video fr-fvc fr-dvb fr-draggable" contenteditable="false" draggable="true" style="'+ style +'">' +
							data.html.replace('visual=true&', '').replace('">', '" style="height: 100%;">') +
						'</span>' +
					'</p>' +
					'<p><br></p>';
				editor.html.insert(html);
			}).fail(function() {
				editor.html.insert(paste_html);
			});
			return false;
		}

		// SPOTIFY
		matches = paste.match(spotifyRegExp);
		if ( matches && matches[4] ) {
			id = matches[4];
			list = matches[3] ? matches[3] : '';
			if ( list === 'track' ) {
				style = 'height: 80px; padding-bottom: 0;';
			} else {
				style = 'height: 240px; padding-bottom: 0;';
			}

			html = 
				'<p>' +
					'<span class="fr-video fr-fvc fr-dvb fr-draggable" contenteditable="false" draggable="true" style="'+ style +'">' +
						'<iframe src="https://open.spotify.com/embed/'+ list + '/' + id +'" style="width: 640px; '+ style +'" frameborder="0" allowtransparency="true" allow="encrypted-media" class="fr-draggable"></iframe>' +
					'</span>' +
				'</p>' +
				'<p><br></p>';
			editor.html.insert(html);
			return false;
		}

		// TED
		matches = paste.match(tedRegExp);
		if ( matches && matches[2] ) {
			id = matches[2];
			params = {
				url: 'https://www.ted.com/talks/' + id
			};

			$.getJSON('https://www.ted.com/services/v1/oembed.json', params, function(data) {
				html = 
					'<p>' +
						'<span class="fr-video fr-fvc fr-dvb fr-draggable" contenteditable="false" draggable="true">' +
							'<iframe width="640" height="360" src="https://embed.ted.com/talks/'+ id +'?language=ko" frameborder="0" allowfullscreen="" class="fr-draggable"></iframe>' +
						'</span>' +
					'</p>' +
					'<p><br></p>';
				editor.html.insert(html);
			}).fail(function() {
				editor.html.insert(paste_html);
			});
			return false;
		}

		// TIKTOK
		matches = paste.match(tiktokRegExp);
		if ( matches && matches[1] ) {
			id = matches[1];
			style = 'height: auto; padding-bottom: 0;';
			params = {
				url: 'https://www.tiktok.com/video/' + id
			};

			$.getJSON('https://www.tiktok.com/oembed', params, function(data) {
				html = 
					'<p>' +
						'<span class="fr-video fr-fvc fr-dvb fr-draggable" contenteditable="false" draggable="true">' +
							'<blockquote class="tiktok-embed" cite="https://www.tiktok.com/@'+ data.author_name.toLowerCase().replace(/\s/gi, '_') +'video/' + id +'" data-video-id="'+ id +'" style="max-width: 605px; min-width: 325px; border-left: none; padding: 0; padding-left: 0;" id="v'+ id +'">' +
								'<iframe name="__tt_embed__v'+ id +'" src="https://www.tiktok.com/embed/v2/'+ id +'?lang=ko-KR" frameborder="0" allowfullscreen="" class="fr-draggable" style="width: 100%; height: 565px; display: block; visibility: unset;"></iframe>' +
							'</blockquote>' +
						'</span>' +
					'</p>' +
					'<p><br></p>';
				editor.html.insert(html);
			}).fail(function() {
				editor.html.insert(paste_html);
			});
			return false;
		}

		// TVCF
		matches = paste.match(tvcfRegExp);
		if ( matches && $.isNumeric(matches[1]) ) {
			id = matches[1];
			params = {
				url: matches[0],
				format: 'json'
			};

			$.getJSON('https://play.tvcf.co.kr/rest/oembed', params, function(data) {
				html = 
					'<p>' +
						'<span class="fr-video fr-fvc fr-dvb fr-draggable" contenteditable="false" draggable="true">' +
							'<iframe width="640" height="360" src="https://play.tvcf.co.kr/embed/'+ id +'" frameborder="0" allowfullscreen="" class="fr-draggable"></iframe>' +
						'</span>' +
					'</p>' +
					'<p><br></p>';
				editor.html.insert(html);
			}).fail(function() {
				editor.html.insert(paste_html);
			});
			return false;
		}

		// TWITCH
		matches = paste.match(twitchRegExp);
		if ( matches ) {
			if ( matches[1] === 'clips' ) {
				type = 'clip';
			} else if ( !matches[2] ) {
				type = 'channel';
			} else if ( $.inArray(matches[2], ['video', 'videos', 'channel', 'collection', 'clip', 'clips']) !== -1 ) {
				type = matches[2].replace('s', '');
			}

			if ( type === 'channel' ) {
				id = matches[2] ? matches[2] : matches[3];
				if ( !id ) {
					if ( matches[4] === type ) {
						id = matches[5];
					}
				}
			} else {
				id = matches[3];
			}

			start = ( matches[4] === 't' ) ? '&time=' + matches[5] : '';

			if ( type === 'clip' ) {
				url = 'https://clips.twitch.tv/embed?'+ type +'='+ id +'&parent=' + current_domain +'&autoplay=false';
			} else {
				url = 'https://player.twitch.tv/?'+ type +'='+ id + start +'&parent=' + current_domain +'&autoplay=false';
			}

			html = 
				'<p>' +
					'<span class="fr-video fr-fvc fr-dvb fr-draggable" contenteditable="false" draggable="true">' +
						'<iframe width="640" height="360" src="'+ url +'" frameborder="0" allowfullscreen="" class="fr-draggable"></iframe>' +
					'</span>' +
				'</p>' +
				'<p><br></p>';
			editor.html.insert(html);
			return false;
		}

		// TWITTER
		matches = paste.match(twitterRegExp);
		if ( matches ) {
			type = matches[2];
			name = matches[1];
			id = matches[3];
			params = {
				url: matches[0],
				omit_script: 1,
				maxwidth: 550,
				limit: 3
			};

			if ( type === 'status' ) {
				html =
					'<div class="'+ iframe_wrapper +' twitter-status" style="height: auto; padding: 0;">' +
						'<iframe allowfullscreen="true" allowtransparency="true" data-tweet-id="'+ id +'" frameborder="0" scrolling="no" src="https://platform.twitter.com/embed/Tweet.html?id='+ id +'" style="position: relative; display: flex; margin: 0 auto; width: 550px; height: 330px; border-bottom: 1px solid #c4cfd6; border-radius: 12px;"></iframe>' +
					'</div>' +
					'<p>&nbsp;</p>';
				editor.html.insert(html);
			} else if ( type === 'lists' ) {
				if ( name === 'i' ) {
					$.getJSON('https://publish.twitter.com/oembed?callback=?', params, function(data) {
						matches = data.url.match(twitterRegExp);
						name = matches[1];
						html =
							'<p style="text-align: center">' +
								'<a class="twitter-timeline" data-width="'+ data.width +'" data-tweet-limit="'+ params.limit +'" href="'+ data.url +'" style="display: inline-block; width: '+ data.width +'px; line-height: 16px; text-align: left; text-decoration: none; border-bottom: 1px solid #c4cfd6; padding: 10px;">' +
									'<span style="display: inline-block; margin-bottom: 5px; line-height: 36px; font-size: 27px; letter-spacing: -1px; color: #292F33;">'+ data.title +'</span>' +
									'<br>' +
									'<span style="font-size: 12px; color: #2b7bb9;">@'+ name +'</span><span style="font-size: 12px; color: #657786;">님의 트위터 리스트</span>' +
								'</a>' +
							'</p>'+
							'<p>&nbsp;</p>';
						editor.html.insert(html);
					}).fail(function() {
						editor.html.insert(paste_html);
					});
				} else {
					html =
						'<p style="text-align: center">' +
							'<a class="twitter-timeline" data-width="'+ params.maxwidth +'" data-tweet-limit="'+ params.limit +'" href="'+ matches[0] +'" style="display: inline-block; width: '+ params.maxwidth +'px; line-height: 16px; text-align: left; text-decoration: none; border-bottom: 1px solid #c4cfd6; padding: 10px;">' +
								'<span style="display: inline-block; margin-bottom: 5px; line-height: 36px; font-size: 27px; letter-spacing: -1px; color: #292F33;">'+ id.charAt(0).toUpperCase() + id.slice(1) +'</span>' +
								'<br>' +
								'<span style="font-size: 12px; color: #2b7bb9;">@'+ name +'</span><span style="font-size: 12px; color: #657786;">님의 트위터 리스트</span>' +
							'</a>' +
						'</p>'+
						'<p>&nbsp;</p>';
					editor.html.insert(html);
				}
			} else if ( !type && name !== 'i' ) {
				html =
					'<p style="text-align: center">' +
						'<a class="twitter-timeline" data-width="'+ params.maxwidth +'" data-tweet-limit="'+ params.limit +'" href="'+ matches[0] +'" style="display: inline-block; width: '+ params.maxwidth +'px; line-height: 16px; text-align: left; text-decoration: none; border-bottom: 1px solid #c4cfd6; padding: 10px;">' +
							'<span style="font-size: 12px; font-weight: 400; color: #2b7bb9;">@'+ name +'</span>' +
							'<span style="font-size: 12px; font-weight: 400; color: #657786;">님의&nbsp;&nbsp;</span>' +
							'<span style="font-size: 27px; font-weight: 300; line-height: 36px; color: #292F33;">트윗</span>' +
						'</a>' +
					'</p>'+
					'<p>&nbsp;</p>';
				editor.html.insert(html);
			}
			return false;
		}

		// VIMEO
		matches = paste.match(vimeoRegExp);
		if ( matches && $.isNumeric(matches[3]) ) {
			id = matches[3];
			start = matches[4] ? matches[4] : '';
			$.getJSON('https://vimeo.com/api/oembed.json?url=' + matches[0], function(data) {
				html = 
					'<p>' +
						'<span class="fr-video fr-fvc fr-dvb fr-draggable" contenteditable="false" draggable="true">' +
							'<iframe width="640" height="360" src="https://player.vimeo.com/video/'+ id + start +'" frameborder="0" allowfullscreen="" class="fr-draggable"></iframe>' +
						'</span>' +
					'</p>' +
					'<p><br></p>';
				editor.html.insert(html);
			}).fail(function() {
				editor.html.insert(paste_html);
			});
			return false;
		}

		// VLIVE TV
		matches = paste.match(vliveRegExp);
		if ( matches && matches[2] ) {
			id = matches[2];
			type = matches[1];

			$.get('https://api.allorigins.win/raw?url=' + matches[0]).done(function(data) {
				if ( type === 'post' ) {
					matches = data.match(vliveRegExpVideoID);
					if ( !matches || !matches[1] ) {
						editor.html.insert(paste_html);
						return false;
					} else {
						id = matches[1];
					}
				}

				html = 
					'<p>' +
						'<span class="fr-video fr-fvc fr-dvb fr-draggable" contenteditable="false" draggable="true">' +
							'<iframe width="640" height="360" src="https://vlive.tv/embed/'+ id +'?autoPlay=false" frameborder="0" allowfullscreen="" class="fr-draggable"></iframe>' +
						'</span>' +
					'</p>' +
					'<p><br></p>';
				editor.html.insert(html);
			}).fail(function() {
				editor.html.insert(paste_html);
			});
			return false;
		}

		// YOUTUBE
		matches = paste.match(youtubeRegExp);
		if ( matches && matches[1] !== 'list' && matches[2] !== 'channel' && matches[2] !== 'videoseries' && matches[2].length === 11 ) {
			id = matches[2];
			if ( matches[3] ) {
				queries = window.XE.URI(matches[0].replace(/amp\;/g, '')).search(true);
			}
			list = queries.list ? '?list=' + queries.list : '';
			start = queries.t ? '?start=' + queries.t : '';

			html = 
				'<p>' +
					'<span class="fr-video fr-fvc fr-dvb fr-draggable" contenteditable="false" draggable="true">' +
						'<iframe width="640" height="360" src="https://www.youtube.com/embed/'+ id + list + start +'" frameborder="0" allowfullscreen="" class="fr-draggable"></iframe>' +
					'</span>' +
				'</p>' +
				'<p><br></p>';
			editor.html.insert(html);
			return false;
		}

	});

});