jQuery(document).ready(function($) {

	var editor = $('[data-editor-primary-key-name$="_srl"]');
	if ( editor.length < 1 ) {
		return;
	}

	var paste, html;
	var matches = [], queries = {}, params = {}, data = {};
	var id, type, name, list, start, hash, style, url, thumb, ratio;
	var iframe_wrapper = 'media_embed', iframe_contents, iframe_obj;
	var current_domain = request_uri.replace(/^http(?:s)?:/, '').replace(/\//g, '');

	var cors = request_uri +'addons/'+ iframe_wrapper +'/'+ iframe_wrapper +'.cors.php?url=';

	var omit_message = '생략된 부분은 본문이 로드되면 볼 수 있습니다.';
	var wait_message = '콘텐츠를 로딩 중입니다.<br>잠시만 기다려주세요.';

	var afreecaRegExp = /^https?:\/\/(?:(v|vod|play).)?afree(?:catv)?.(?:ca|com)\/((.+?)(?:\/STATION)?\/(\d+))(?:\?change_second=(\d+))?/;
	var airbnbRegExp = /^https?:\/\/(?:www.)?airbnb.(?:[.a-z]+)\/(rooms|experiences)\/(\d+)(?:\?.+)?/;
	var audioclipRegExp = /^https?:\/\/audioclip.naver.com\/(channels|audiobooks)\/([\_\-0-9a-zA-Z]+)(?:\/(clips)\/([\_\-0-9a-zA-Z]+))?/;
	var azquotesRegExp = /^https?:\/\/(?:www.)?azquotes.com\/quote\/(\d+)/;
	var bandcampRegexp = /^https?:\/\/(?:([\w]+)\.)bandcamp\.com(?:\/(album|track))?(?:\/([-a-z0-9]+))?/;
	var bilibiliRegexp = /^https?:\/\/(?:(www|live).)?bilibili.com\/(?:(video|bangumi)\/)?(?:play\/)?(\w+)(?:.+)?$/;
	var codepenRegExp = /^https?:\/\/(?:www\.|m\.)?codepen.io\/([a-zA-Z]+)\/pen\/((?:[a-z]+[A-Z]+|[A-Z]+[a-z]+)(?:[a-zA-Z]+))(?:\/)?$/;
	var codesandboxRegExp = /^https?:\/\/(?:www\.|m\.)?codesandbox.io\/(?:s|embed)\/([^?/\s]+)/;
	var dailymotionRegExp = /^https?:\/\/(www\.|)(?:dailymotion\.com(?:\/video|\/hub)|dai\.ly)\/([-_0-9a-zA-Z]+)(?:\?playlist=([a-z0-9]+)|)(?:#video=([a-z0-9]+)|)?/;
	var discordRegExp = /^https?:\/\/(?:www.)?discord.(?:(com|gg))\/(?:(invite|channels)\/)?(\w+)(?:[?/].+)?$/;
	var ellentubeRegExp = /^https?:\/\/(?:www\.)?ellentube\.com\/(video)\/([-a-z0-9]+)\.html$/;
	var fbPostsRegExp = /^https:\/\/(?:www|m)\.facebook\.com\/(?:.+\/)?(?:photo(?:\.php|s)|permalink\.php|media|questions|notes|[^\/]+\/(?:activity|posts))[\/?](.*)$/;
	var fbVideosRegExp = /^https:\/\/(?:(?:www|m)\.facebook\.com\/(?:[^\/?].+\/)?(?:videos|watch(?:\/live)?|video\.php)\/(?:\?[a-z]+\=)?(\d+)|fb\.watch\/([-_0-9a-zA-Z]+))/;
	var fC2RegExp = /^https?:\/\/(video|live).fc2.com(?:\/content(?:.php\?[a-z_-]+)?)?(?:\/|=)(\w+)(?:(?:[/|&|?])?.+)?$/;
	var flickrRegExp = /^https?:\/\/(?:www\.)?flic(?:kr)?.(?:com|kr)\/(?:(f|go?|ps|s|y)\/)?(.+)/;
	var gettyRegExp = /^https?:\/\/(?:www.)?(?:(gettyimages.com|gty.im))\/(?:detail\/)?(?:([-\w]+)\/)?(?:([-\w]+)\/)?(\d+)(?:\?.+)?$/;
	var gfycatRegExp = /^https?:\/\/(?:(?:www|thumbs)\.)?gfycat.com\/(?:[a-z]{2}\/)?(?:(gifs)\/)?(?:(@[\w]+)\/(?:collections\/)?(?:([\w]+)\/)?)?([\/0-9a-zA-Z]+)(?:([-0-9a-z]+))?/;
	var giphyRegExp = /^https?:\/\/(?:(?:www|m)\.)?giphy.com\/(?:(gifs|clips|stickers)\/)[\w-]+-(\w+)$/;
	var imdbRegExp = /^https?:\/\/(?:www\.|m\.)?imdb.com\/video\/(?:imdb\/)?((vi)(\d+))/;
	var imgurRegExp = /^https?:\/\/(?:(?:(www|i)).)?imgur.com\/(?:(?:(a|gallery|(?:t|r)\/[\w]+))\/)?([\w]{2,})(?:\.[a-zA-Z]{3,4})?/;
	var instagramRegExp = /^https?:\/\/(?:www\.)?(?:instagram|instagr)?\.(?:com|am)?(?:\/([a-zA-Z0-9]+))?(?:\/(p|tv|reel|tags))?\/([^/?#&\s]+)((?:(?:\/|\?)[^\s]+))?/;
	var iqiyiRegExp = /^https?:\/\/(?:(?:www).)?iq.com\/(play)\/(?:(?:.+)?-)?([^?.]+)(?:\?.+)?$/;
	var jjalbotRegExp = /^https?:\/\/(?:www.)?jjalbot.com\/(jjals|embed|media)(?:\/\d{0,4}\/\d{2})?\/([\w]+)(?:\/zzal.gif)?/;
	var jsfiddleRegExp = /^https?:\/\/(?:www\.|m\.)?jsfiddle.net\/([A-Za-z0-9_-]+)\/([A-Za-z0-9_-]+)(?:\/([A-Za-z0-9_-]+))?/;
	var kakaoRegExp = /^https?:\/\/(?:(?:(www|play-tv|tv|sports|entertain|movie|auto|news(?:link|.v)?|v)(?:.(?:media))?)\.)?(?:(?:(kakao.com|daum.net)))\/(?:.+)?(videoId|video|view|cliplink|livelink|l|v)(?:\/|\=)([0-9]+)/;
	var mixcloudRegExp = /^https?:\/\/(?:(?:www|m).)?mixcloud.com\/(.+?)\/(.+?)(?:\/)?$/;
	var mlbRegExp = /^https:\/\/(?:www|m)\.mlb\.com\/video\/([-_a-z0-9.]+)(?:\?.+)?$/;
	var naverRegExp = /^https?:\/\/(?:m\.)?tv(?:cast)?\.naver.com\/(v|l)\/(\d+)(?:|\/\?)/;
	var navermeRegExp = /^https?:\/\/(?:www.)?naver.me\/([\w]+)/;
	var naverVodRegExp = /^https?:\/\/(?:m.)?(sports(?:.news)?|(?:n.)?news|media|movie).naver.com\/(\w+)\/(?:(?:ranking\/)?read.naver.+oid=|bi\/mi\/mediaView.naver\?code=)?(?:(\w+))?(?:(?:\/|\&)(?:(?:.+)?(?:a|m)?id=)?(\w+))?(?:.+)?$/;
	var naverVodShortendRegExp = /^https?:\/\/(?:m.)?sports(?:.news)?.naver.com\/video(?:.(nhn))?\?id=(\d+)(?:.+)?$/;
	var niconicoRegExp = /^https?:\/\/(?:(?:www|sp|(live))\.)?nico(?:video)?\.(?:jp|ms)\/(?:(watch)\/)?(\w{2}\d+)(?:(?:\?from=|\#)([0-9:]+))?/;
	var pinitRegExp = /^https?:\/\/(?:www.)?pin.it\/([\w]+)/;
	var pinterestRegExp = /^https?:\/\/(?:www\.|br\.)?pinterest.(?:[.a-z]+)\/([_a-z]+)(?:\/(?:([^/?]+))?(?:\/)?)?(?:(?:sent\/)?\?.+)?$/;
	var podbbangRegExp = /^https?:\/\/(?:www.)podbbang.com\/(channels)\/(\d+)(?:\/(episodes)\/(\d+))?$/;
	var podbbangShortRegExp = /^https?:\/\/podbbang.page.link\/(\w+){17}$/;
	var preziRegExp = /^https?:\/\/(?:[a-z0-9]+\.)?prezi.com\/((?:v|p))?\/?(.+)\/(.+)/;
	var qqRegExp = /^https?:\/\/(?:www.|v.)?qq.com\/(?:x\/)(cover|page)\/(?:(\w+)(?:.html)?)?(?:\/(\w+).html)?(?:\?(?:.+)?start=(\d+))?/;
	var qqMRegExp = /^https?:\/\/m.v.qq.com\/(?:z\/msite\/play-short\/)?(?:play|index).html\?(?:[^&]+)?cid=(?:([^&]+))?\&(?:[^&]+)?vid=(?:([^&]+))?(?:\&(?:.+)?start=(\d+))?/;
	var redditRegExp = /^https?:\/\/(?:(?:www|np|www\.np)\.)?reddit.com\/((?:r|user)\/[^/]+)\/comments\/(\w+)\/(\w+)(?:\/(\w+))?(?:(?:\/|\?)(?:.*)?)?$/;
	var reliveRegExp = /^^https?:\/\/(?:www\.)?relive.cc\/view\/([a-zA-Z0-9]+)/;
	var slidedhareRegExp = /^https?:\/\/(?:[a-z0-9]+\.)?slideshare.net\/(.+)\/(.+)/;
	var soundcloudRegExp = /^https?:\/\/((?:w\.|www.|)soundcloud\.com|snd\.sc)\/([\w\-\.]+[^#\s]+)(.*)?(#[\w\-]+)?$/;
	var spotifyRegExp = /^(spotify|http(?:s)?:\/\/(?:[a-z]+\.)?(?:spotify|spoti)\.(?:com|fi))[\/|:](?:user[\/|:]([a-zA-Z0-9]+)[\/|:])?(track|album|artist|playlist)[\/|:]([0-9a-zA-Z]+)((?:\?.+|))/;
	var streamableRegExp = /^https?:\/\/(?:[a-z0-9]+\.)?streamable.com\/([a-zA-Z0-9_-]+)/;
	var tedRegExp = /^https?:\/\/((?:www.|)ted\.com)\/talks\/([\_\-0-9a-zA-Z]+)/;
	var tenorRegExp = /^https:\/\/tenor\.com\/(?:view\/[-a-z]+(\d+)$|([\w]+\.gif))/;
	var tiktokRegExp = /^https?:\/\/(?:(?:[a-z.]+)?(?:tiktok.com)\/(?:@[a-z0-9_]+\/)?(?:[a-z0-9]+\/share\/)?(?:video|v|embed)?(?:\/)?)([0-9a-zA-Z]+)/;
	var tudouRegExp = /^https?:\/\/(?:(?:www|play).)?tudou.com\/(v_show)\/id_([^?.]+)/;
	var tumblrRegExp = /^https?:\/\/([-_0-9a-z]+)\.tumblr\.com\/post\/([0-9]+)?/;
	var tvSohuRegExp = /^https?:\/\/(?:www.|(?:(m(?:y)?).)?tv.)?sohu.com\/(?:(v|us)\/)?(?:([\d]+)\/)?(.+?).(?:s)?html/;
	var tvcfRegExp = /^https?:\/\/play.tvcf.co.kr\/([0-9]+)?$/;
	var twitchRegExp = /^https?:\/\/?(?:([a-z0-9]+)\.)?twitch.tv(?:\/(\w+))?\/(?:(clip)\/)?(?:([-_0-9a-zA-Z]+))?(?:[/?&]+(?:(?:(t|channel))=([-_0-9a-zA-Z]+)|.+))?$/;
	var twitterRegExp = /^https?:\/\/(?:www\.)?twitter\.com\/(?!explore|login|settings|tos|privacy|search|i\/flow|i\/events|i\/moments)(\w+){1,15}(?:\/(?:(status|lists))?)?(?:\/([0-9a-zA-Z-_]+)(?:\?.+)?)?$/;
	var vimeoRegExp = /^https?:\/\/(www\.)?vimeo.com\/(?:channels\/(?:\w+\/)?|groups\/([^\/]*)\/videos\/|)(\d+)((?:\#t=.+|))(?:|\/\?)/;
	var vliveRegExp = /^https?:\/\/(?:www|m)\.(?:vlive\.tv(?:\/(video|post)))\/([-_0-9a-zA-Z]+)?/;
	var wikipediaRegExp = /^https?:\/\/(\w{2}).wikipedia.org\/(wiki|w)\/([^\#\/\s]+)?/;
	var youkuRegExp = /^https?:\/\/(?:(?:www|v|m).)?youku.com\/(v_show|video)\/id_([^?.]+)/;
	var youtubeRegExp = /^https?:\/\/(?:(?:www|m).)?(?:(music).)?(?:youtube.com|youtu.be)\/(?:(shorts|watch|v|(?:play)?list|embed)[\/|\?])?(?:([\w\-]{11}))?(?:(?:\?)?(\S+))?$/;

	var findSrc = /<?.* src="(.+?)" ?.*>/;
	var findScript = /<script.*?>.*?<\/script>/;
	var findOGUrl = /<(?:meta|META)[^>]+og:url[^>]+content\=(?:'|")(http.+?)(?:'|")(?:[^>]+)?>/;
	var findOGImage = /<(?:meta|META)[^>]+og:image[^>]+content\=(?:'|")((?:http(?:s)?:)?.+?)(?:'|")(?:[^>]+)?>/s;
	var findOGVideo = /<(?:meta|META)[^>]+og:video[^>]+content\=(?:'|")((?:http(?:s)?:)?.+?)(?:'|")(?:[^>]+)?>/s;

	// Wait One Second until the Content Loading
	setTimeout(function() {
		var ck_editor = CKEDITOR.instances.editor1;
		iframe_contents = editor.find('iframe').contents();

		ck_editor.on('contentDom', function() {
			var editable = ck_editor.editable();
			editable.attachListener(editable, 'input', function(e) {
				paste = e.data.$.data;
				if ( paste === null ) {
					return;
				}
				e = e.sender;
				e.name = 'input';
				setContent(e, paste);
			}, null, null, 10);
		});

		if ( ck_editor ) {
			try {
				ck_editor.editable().on('input', function(e) {
					paste = e.data.$.data;
					if ( paste === null ) {
						return;
					}
					e = e.sender;
					e.name = 'input';
					setContent(e, paste);
				});
			} catch (e) {
			}
		}

		ck_editor.on('paste', function(e) {
			paste = e.data.dataValue;
			setContent(e, paste);
		});
	}, 1200);

	function setPastedContent(e, paste) {
		if ( embed_leave_link ) {
			html = embed_link_style ? embed_link_style.replace(/%text%/g, paste) : '<p>'+ paste +'</p>';
		} else {
			html = '';
		}

		if ( e.name === 'paste' ) {
			e.stop();
		} else if ( e.name === 'input' ) {
			delContentByInput(e.editor, paste);
		} else {
			return;
		}
	}

	function delContentByInput(editor, paste) {
		var bookmark = editor.getSelection().createBookmarks();
		var data = editor.document.getBody().getHtml();
		var _bookmarker = '<span data-cke-bookmark="1" style="display: none;">&nbsp;</span>';
		var bookmarker = '<span id="user_content_bookmark_1" style="display: none;">&nbsp;</span>';
		var replaced_html =  paste.replace(/\&/g, '&amp;') + _bookmarker;
		var replacing_html =  data.replace(replaced_html, bookmarker);

		editor.document.getBody().setHtml(replacing_html);

		var range = editor.createRange();
		var bookmark_element = editor.document.getById('user_content_bookmark_1');

		range.setStart(bookmark_element, 0);
		range.setEnd(bookmark_element.getFirst(), 0);

		editor.getSelection().selectRanges([range]);
		bookmark_element.remove(false);
	}

	function waitMediaEmbed() {
		$('body').append(
			'<div class="media_embed_loading">' +
				'<div class="media_embed_loading_container">' +
					'<p><i class="xi-spinner-5 xi-spin"></i>'+ wait_message +'</p>' +
				'</div>' +
			'</div>'
		);
	}

	function completeMediaEmbed() {
		$('.media_embed_loading').remove();
	}

	function setContent(e, paste) {

		// AFREECA TV
		matches = paste.match(afreecaRegExp);
		if ( matches && matches[4] ) {
			setPastedContent(e, paste);
			waitMediaEmbed();

			id = matches[4];
			type = matches[1];
			url = ( type === 'v' || type === 'vod' ) ? 'https://vod.afreecatv.com/player/' + id : matches[0];
			name = (type === 'play') ? matches[3] : '';
			start = (type === 'vod' & matches[5]) ? '&nStartTm=' + matches[5] : '';

			$.get(cors + url).done(function(data) {
				if ( !data ) {
					e.editor.insertHtml(paste);
					completeMediaEmbed();
					return false;
				}
				matches = data.match(findOGImage);
				if ( !matches ) {
					e.editor.insertHtml(paste);
					completeMediaEmbed();
					return false;
				}
				if ( type === 'v' || type === 'vod' ) {
					thumb = matches[1] ? '<img src="'+ matches[1].replace('http:', 'https:') +'" />' : '';
					matches = data.match(findOGVideo);
					if ( !matches ) {
						e.editor.insertHtml(paste);
						completeMediaEmbed();
						return false;
					}
					url = matches[1];
				} else {
					thumb = matches[1] ? '<img src="'+ matches[1].replace('http:', 'https:').replace(/\?\d+$/, '') +'" />' : '';
					id = matches[1].match(/\/(\d+)/)[1];
					url = 'https://play.afreecatv.com/'+ name +'/'+ id +'/embed';
				}

				html +=
					'<div class="'+ iframe_wrapper +'_wrapper" contenteditable="false">' +
						'<div class="'+ iframe_wrapper +'">' +
							thumb +
							'<iframe src="'+ url + start +'" frameborder="0" scrolling="no" allowtransparency="true" allowfullscreen="true"></iframe>' +
						'</div>' +
					'</div>' +
					'<p>&nbsp;</p>';
				e.editor.insertHtml(html);
				completeMediaEmbed();
			}).fail(function() {
				e.editor.insertHtml(paste);
				completeMediaEmbed();
			});
		}

		// AIRBNB
		matches = paste.match(airbnbRegExp);
		if ( matches && $.isNumeric(matches[2]) ) {
			setPastedContent(e, paste);
			waitMediaEmbed();

			id = matches[2];
			type = (matches[1] === 'rooms') ? 'home' : 'experience';
			if ( type === 'home' ) {
				style = 'width: 450px; height: 480px;';
			} else if ( type === 'experience' ) {
				style = 'width: 400px; height: 572px;';
			} else {
				e.editor.insertHtml(paste);
				completeMediaEmbed();
				return false;
			}
			url = 'https://www.airbnb.co.kr/embeddable/'+ type +'?id=' + id;

			html +=
				'<div class="'+ iframe_wrapper +'_wrapper" contenteditable="false">' +
					'<div class="'+ iframe_wrapper +' airbnb-embed" style="'+ style +'">' +
						'<iframe src="'+ url +'" frameborder="0" scrolling="no" style="'+ style +'"></iframe>' +
					'</div>' +
				'</div>' +
				'<p>&nbsp;</p>';

			e.editor.insertHtml(html);
			completeMediaEmbed();
		}

function setAmazonBook(e, paste, id) {
	url = 'https://read.amazon.com/kp/embed?asin=' + id;
	$.get(cors + url).done(function(data) {
		if ( !data ) {
			e.editor.insertHtml(paste);
			completeMediaEmbed();
		}
		matches = data.match(findOGImage);
		if ( !matches || !matches[1] ) {
			e.editor.insertHtml(paste);
			completeMediaEmbed();
		}
		thumb = '<img src="'+ matches[1] +'" />';
		url = 'https://read.amazon.com/kp/card?asin='+ id +'&preview=inline'

		html +=
			'<div class="'+ iframe_wrapper +'_wrapper" contenteditable="false">' +
				'<div class="'+ iframe_wrapper +' amazon-book-embed">' +
					thumb +
					'<iframe src="'+ url +'" type="text/html" sandbox="allow-scripts allow-same-origin allow-popups" allowfullscreen></iframe>' +
				'</div>' +
			'</div>' +
			'<p>&nbsp;</p>';
		e.editor.insertHtml(html);
		completeMediaEmbed();
	}).fail(function() {
		e.editor.insertHtml(paste);
		completeMediaEmbed();
	});
}
		// AMAZON BOOK SHORTENED
		matches = paste.match(/^https?:\/\/a.co\/[\w]+$/);
		if ( matches ) {
			setPastedContent(e, paste);
			waitMediaEmbed();

			$.get(cors+ matches[0], {format: 'short'}).done(function(data) {
				id = data.getQuery('asin');
				setAmazonBook(e, paste, id);
			}).fail(function() {
				e.editor.insertHtml(paste);
				completeMediaEmbed();
			});
		}

		// AMAZON BOOK PREVIEW
		matches = paste.match(/^https?:\/\/(?:www.|read.)?amazon.com\/(?:[-%a-zA-Z0-9]+\/)?(?:(dp|kp))\/(?:(?:embed|card)\?asin=)?(\w+)(?:.+)?$/);
		if ( matches && matches [2] ) {
			setPastedContent(e, paste);
			waitMediaEmbed();

			type = matches[1];
			id = matches[2];

			if ( type === 'dp' ) {
				$.getJSON(cors + encodeURIComponent('https://read.amazon.com/service/web/content/isReadable?asin=' + id)).done(function(data) {
					console.log(data);
					if ( !data ) {
						e.editor.insertHtml(paste);
						completeMediaEmbed();
					}
					id = data.deliveredAsin;
					setAmazonBook(e, paste, id);
				}).fail(function() {
					e.editor.insertHtml(paste);
					completeMediaEmbed();
				});
			} else {
				setAmazonBook(e, paste, id);
			}
		}

		// AMAZON MUSIC
		matches = paste.match(/^^https?:\/\/music.amazon.com\/(albums|artists|playlists)\/(\w+)(?:[/?].+)?$/);
		if ( matches && matches[2] ) {
			setPastedContent(e, paste);
			waitMediaEmbed();

			id = matches[0].replace(/\&amp\;/g, '&').getQuery('trackAsin');
			type = id ? 'track' : 'album';
			id = id ? id : matches[2];
			name = ' amazon-music-' + type;
			url = 'https://music.amazon.com/embed/' + id;
			style = ( type === 'track' ) ? 'height: 230px; max-width: 420px;' : 'height: 550px;';
			thumb = '';

			$.get(cors + url).done(function(data) {
				if ( !data ) {
					e.editor.insertHtml(paste);
					completeMediaEmbed();
					return false;
				}
				matches = data.match(/class="(?:[^"]+)?refLink[^<]+<img\ssrc="([^"]+)"(?:[^>]+)?>/);
				if ( !matches || !matches[1] ) {
					e.editor.insertHtml(paste);
					completeMediaEmbed();
					return false;
				}
				thumb = '<img src="'+ matches[1] +'" />';

				html +=
					'<div class="'+ iframe_wrapper +'_wrapper" contenteditable="false">' +
						'<div class="'+ iframe_wrapper +' amazon-music-embed'+ name +'" style="'+ style +'">' +
							thumb +
							'<iframe src="'+ url +'" id="AmazonMusicEmbed'+ id +'"></iframe>' +
						'</div>' +
					'</div>' +
					'<p>&nbsp;</p>';
				e.editor.insertHtml(html);
				completeMediaEmbed();
			}).fail(function() {
				e.editor.insertHtml(paste);
				completeMediaEmbed();
			});
		}

		// APPLE MUSIC
		matches = paste.match(/^https?:\/\/(?:embed.)?music.apple.com\/((\w{2})\/(?:(album|playlist|station|post))\/(?:([-%\w]+)\/)?(?:\d+\?)?((?:i=|ra.|pl.)?\w+))$/);
		if ( matches && matches[5] ) {
			setPastedContent(e, paste);
			waitMediaEmbed();

			url = matches[1];
			hash = matches[2];
			type = matches[3];
			name = matches[4];
			id = matches[5];
			if ( type === 'album' && id.indexOf('i=') === 0 ) {
				style = 'padding-bottom: 0; height: 150px;';
			} else if ( type === 'post' ) {
				style = 'padding-bottom: '+ 56.25 +'%';
			} else {
				style = 'padding-bottom: 0; height: 450px;';
			}

			$.get(cors + 'https://music.apple.com/' + url).done(function(data) {
				if ( !data ) {
					e.editor.insertHtml(paste);
					completeMediaEmbed();
					return false;
				}
				matches = data.match(findOGImage);
				if ( !matches ) {
					e.editor.insertHtml(paste);
					completeMediaEmbed();
					return false;
				}
				if ( type === 'post' ) {
					thumb = matches[1] ? '<img src="'+ matches[1] +'" />' : '';
				} else {
					thumb = matches[1] ? '<img src="'+ matches[1].replace(/\d+x\d+[^.]+.(?:(jpg|jpeg|png|gif))/, '600x600.$1') +'" />' : '';
				}

				html +=
					'<div class="'+ iframe_wrapper +'_wrapper" contenteditable="false">' +
						'<div class="'+ iframe_wrapper +' apple-music-embed" style="'+ style +'">' +
							thumb +
							'<iframe src="https://embed.music.apple.com/'+ url +'" sandbox="allow-forms allow-popups allow-same-origin allow-scripts allow-top-navigation-by-user-activation"></iframe>' +
						'</div>' +
					'</div>' +
					'<p>&nbsp;</p>';
				e.editor.insertHtml(html);
				completeMediaEmbed();
			}).fail(function() {
				e.editor.insertHtml(paste);
				completeMediaEmbed();
			});
		}

		// AUDIO CLIP
		matches = paste.match(audioclipRegExp);
		if ( matches && matches[2] ) {
			setPastedContent(e, paste);
			waitMediaEmbed();

			type = matches[1];
			id = matches[2];
			hash = $.isNumeric(matches[4]) ? matches[4]: '';
			url = 'https://audioclip.naver.com/' + type + '/' + id;
			if ( type === 'channels' ) {
				url += (hash) ? '/clips/' + hash : '/clips/1';
			}

			$.getJSON(cors + 'https://audioclip.naver.com/oembed?url=' + url).done(function(data) {
				if ( data.html ) {
					url = 'https://player.audiop.naver.com/player?cpId=audioclip&cpMetaId=';
					if ( type === 'channels' ) {
						url += 'CH_' + id + '_EP_';
						url += hash ? hash : '1';
					} else if ( type === 'audiobooks' ) {
						url += id;
					}
					thumb = data.thumbnail_url ? '<img src="'+ data.thumbnail_url +'" />' : '';

					html +=
						'<div class="'+ iframe_wrapper +'_wrapper" contenteditable="false">' +
							'<div class="'+ iframe_wrapper +' audioclip-embed">' +
								thumb +
								'<iframe src="'+ url +'" frameborder="0" scrolling="no"></iframe>' +
							'</div>' +
						'</div>' +
						'<p>&nbsp;</p>';
					e.editor.insertHtml(html);
					completeMediaEmbed();
				} else {
					e.editor.insertHtml(paste);
					completeMediaEmbed();
				}
			}).fail(function() {
				e.editor.insertHtml(paste);
				completeMediaEmbed();
			});
		}

		// AZQUOTES
		matches = paste.match(azquotesRegExp);
		if ( matches && $.isNumeric(matches[1]) ) {
			setPastedContent(e, paste);
			waitMediaEmbed();

			id = matches[1];
			url = 'https://www.azquotes.com/quote/' + id;

			$.get(cors + url).done(function(data) {
				if ( data ) {
					matches = data.match(findOGImage);
					if ( matches ) {
						html +=
							'<div class="'+ iframe_wrapper +'_wrapper" contenteditable="false">' +
								'<div class="media_embed azquotes-embed">' +
									'<a href="'+ url +'"><img src="'+ matches[1] +'"></a>' +
								'</div>' +
							'</div>' +
							'<p>&nbsp;</p>';
						e.editor.insertHtml(html);
						completeMediaEmbed();
					} else {
						e.editor.insertHtml(paste);
						completeMediaEmbed();
					}
				} else {
					e.editor.insertHtml(paste);
					completeMediaEmbed();
				}
			}).fail(function() {
				e.editor.insertHtml(paste);
				completeMediaEmbed();
			});
		}

		// BANDCAMP
		matches = paste.match(bandcampRegexp);
		if ( matches && matches[1] ) {
			setPastedContent(e, paste);
			waitMediaEmbed();

			name = matches[1];
			type = matches[2];
			id = matches[3];
			if ( (name === 'www' || name === 'daily') || (id && (type !== 'album' && type !== 'track')) ) {
				e.editor.insertHtml(paste);
				completeMediaEmbed();
				return false;
			}

			$.get(cors + matches[0]).done(function(data) {
				matches = data.match(findOGVideo);
				if ( !matches || !matches[1] ) {
					e.editor.insertHtml(paste);
					completeMediaEmbed();
					return false;
				}
				url = matches[1];

				if ( !type ) {
					if ( url.indexOf('album=') !== -1 ) {
						type = 'album';
					} else if ( url.indexOf('track=') !== -1 ) {
						type = 'track';
					}
				}
				hash = new RegExp(type + '=([0-9]+)');
				matches = url.match(hash);
				if ( !matches || !matches[1] ) {
					e.editor.insertHtml(paste);
					completeMediaEmbed();
					return false;
				}
				id = matches[1];

				matches = data.match(/<script\stype=\"application\/ld\+json\">([^<]+)<\/script>/);
				if ( !matches || !matches[1] ) {
					e.editor.insertHtml(paste);
					completeMediaEmbed();
					return false;
				}
				data = JSON.parse($.trim(matches[1]));
				if ( !data || !data.image ) {
					e.editor.insertHtml(paste);
					completeMediaEmbed();
					return false;
				}
				thumb = data.image;

				if ( type === 'album' ) {
					if ( data.numTracks >= 5 ) {
						style = 'height: 310px;';
					} else if ( data.numTracks <= 1 ) {
						style = 'height: 175px;';
					} else {
						style = 'height: '+ (310 - ((5 - data.numTracks) * 33)) +'px;';
					}
				} else if ( type === 'track' ) {
					style = 'height: 175px;';
				}

				url = 'https://bandcamp.com/EmbeddedPlayer/size=large/bgcol=ffffff/linkcol=0687f5/artwork=small/'+ type +'='+ id +'/transparent=true/';
				html +=
					'<div class="'+ iframe_wrapper +'_wrapper" contenteditable="false">' +
						'<div class="'+ iframe_wrapper +' bandcamp-embed" style="'+ style +'">' +
							'<img src="'+ thumb +'" />' +
							'<iframe src="'+ url +'" style="'+ style +'" seamless></iframe>' +
						'</div>' +
					'</div>' +
					'<p>&nbsp;</p>';
				e.editor.insertHtml(html);
				completeMediaEmbed();
			}).fail(function() {
				e.editor.insertHtml(paste);
				completeMediaEmbed();
			});
		}

		// BILIBILI
		matches = paste.match(bilibiliRegexp);
		if ( matches && matches[3] ) {
			setPastedContent(e, paste);
			waitMediaEmbed();

			id = matches[3];
			type = (matches[1] === 'live') ? matches[1] : matches[2];

			if ( type === 'video' ) {
				setBilibili(e, paste, id);
			} else if ( type === 'bangumi' ) {
				list = id.match(/(\w{2})(\d+)/);
				if ( list[1] === 'ss' ) {
					hash = 'season_id=' + list[2];
				} else if ( list[1] === 'ep' ) {
					hash = 'ep_id=' + list[2];
				}

				$.getJSON(cors + 'https://api.bilibili.com/pgc/view/web/season?'+ hash).done(function(data) {
					if ( data.code === 0 ) {
						if ( list[1] === 'ss' ) {
							id = data.result.episodes[0].bvid;
						} else if ( list[1] === 'ep' ) {
							$.each(data.result.episodes, function(i, v) {
								if ( v.id == list[2] ) {
									id = v.bvid;
									return false;
								}
							});
						}

						setBilibili(e, paste, id);
					} else {
						e.editor.insertHtml(paste);
						completeMediaEmbed();
					}
				}).fail(function() {
					e.editor.insertHtml(paste);
					completeMediaEmbed();
				});
			} else {
				e.editor.insertHtml(paste);
				completeMediaEmbed();
			}
		}

		// CODEPEN
		matches = paste.match(codepenRegExp);
		if ( matches && matches[2] ) {
			setPastedContent(e, paste);
			waitMediaEmbed();

			type = matches[1];
			id = matches[2];
			url = 'https://codepen.io/'+ type +'/embed/'+ id +'?theme-id=dark&default-tab=html,result';

			$.getJSON(cors + encodeURIComponent('https://codepen.io/api/oembed?url=' + matches[0] + '&format=json'), {format: 'json'}).done(function(data) {
				if ( data.success ) {
					thumb = data.thumbnail_url.replace(/(.+?.(?:png|jpg|gif))\?.+/g, '$1');
					html +=
						'<div class="'+ iframe_wrapper +'_wrapper" contenteditable="false">' +
							'<div class="'+ iframe_wrapper +' codepen-embed">' +
								'<img src="'+ thumb +'" />' +
								'<iframe src="'+ url +'" scrolling="no" frameborder="no" loading="lazy" allowtransparency="true" allowfullscreen="true"></iframe>' +
							'</div>' +
						'</div>' +
						'<p>&nbsp;</p>';
					e.editor.insertHtml(html);
					completeMediaEmbed();
				} else {
					e.editor.insertHtml(paste);
					completeMediaEmbed();
				}
			}).fail(function() {
				e.editor.insertHtml(paste);
				completeMediaEmbed();
			});
		}

		// CODESANBOX
		matches = paste.match(codesandboxRegExp);
		if ( matches && matches[1] ) {
			setPastedContent(e, paste);
			waitMediaEmbed();

			id = matches[1];
			url = matches[0];

			$.getJSON('https://codesandbox.io/oembed?url=' + url + '&format=json').done(function(data) {
				if ( data ) {
					html +=
						'<div class="'+ iframe_wrapper +'_wrapper" contenteditable="false">' +
							'<div class="'+ iframe_wrapper +' codesandbox-embed">' +
								'<img src="'+ data.thumbnail_url +'" style="display: none;" />' +
								'<iframe src="https://codesandbox.io/embed/'+ id +'?autoresize=1&fontsize=14&hidenavigation=1&theme=dark" ' +
									'title="'+ data.title +'" ' +
									'sandbox="allow-forms allow-modals allow-popups allow-presentation allow-same-origin allow-scripts"' +
								'></iframe>' +
							'</div>' +
						'</div>' +
						'<p>&nbsp;</p>';
					e.editor.insertHtml(html);
					completeMediaEmbed();
				} else {
					e.editor.insertHtml(paste);
					completeMediaEmbed();
				}
			}).fail(function() {
				e.editor.insertHtml(paste);
				completeMediaEmbed();
			});
		}

		// DAILYMOTION
		matches = paste.match(dailymotionRegExp);
		if ( matches && matches[2] ) {
			setPastedContent(e, paste);
			waitMediaEmbed();

			id = matches[2];
			list = matches[3] ? '?playlist=' + matches[3] : '';
			hash = matches[4] ? '#video=' + matches[4] : '';

			html +=
				'<div class="'+ iframe_wrapper +'_wrapper" contenteditable="false">' +
					'<div class="'+ iframe_wrapper +'">' +
						'<img src="https://www.dailymotion.com/thumbnail/video/'+ id +'" />' +
						'<iframe src="https://www.dailymotion.com/embed/video/'+ id + list + hash +'" frameborder="0" type="text/html" allowfullscreen></iframe>' +
					'</div>' +
				'</div>' +
				'<p>&nbsp;</p>';
			e.editor.insertHtml(html);
			completeMediaEmbed();
		}

		// DISCORD WIDGET
		matches = paste.match(discordRegExp);
		if ( matches && matches[3] ) {
			setPastedContent(e, paste);
			waitMediaEmbed();

			type = matches[2];
			id = matches[3];
			url = 'https://discordapp.com/widget?id=';
			if ( type === 'channels' && $.isNumeric(id) ) {
				url += id;
				html +=
					'<div class="'+ iframe_wrapper +'_wrapper" contenteditable="false">' +
						'<div class="'+ iframe_wrapper +' discord-embed">' +
							'<iframe src="'+ url +'"></iframe>' +
						'</div>' +
					'</div>' +
					'<p>&nbsp;</p>';
				e.editor.insertHtml(html);
				completeMediaEmbed();
			} else if ( type === 'invite' || (matches[1] === 'gg' && !type) ) {
				$.getJSON('https://discord.com/api/v9/invites/' + id).done(function(data) {
					if ( data ) {
						url += data.guild.id;
						html +=
							'<div class="'+ iframe_wrapper +'_wrapper" contenteditable="false">' +
								'<div class="'+ iframe_wrapper +' discord-embed">' +
									'<iframe src="'+ url +'"></iframe>' +
								'</div>' +
							'</div>' +
							'<p>&nbsp;</p>';
						e.editor.insertHtml(html);
						completeMediaEmbed();
					} else {
						e.editor.insertHtml(paste);
						completeMediaEmbed();
					}
				}).fail(function() {
					e.editor.insertHtml(paste);
					completeMediaEmbed();
				});
			} else {
				e.editor.insertHtml(paste);
				completeMediaEmbed();
			}
		}

		// ELLENTUBE
		matches = paste.match(ellentubeRegExp);
		if ( matches && matches[1] && matches[2] ) {
			setPastedContent(e, paste);
			waitMediaEmbed();

			url = matches[0];
			type = matches[1];
			id = matches[2];

			$.get(cors +url).done(function(data) {
				if ( !data ) {
					e.editor.insertHtml(paste);
					completeMediaEmbed();
					return false;
				}
				matches = data.match(findOGImage);
				url = 'https://www.ellentube.com/share/'+ type +'/'+ id +'.html';
				thumb = (matches && matches[1]) ? '<img src="'+ matches[1] +'" />' : '' ;

				html +=
					'<div class="'+ iframe_wrapper +'_wrapper" contenteditable="false">' +
						'<div class="'+ iframe_wrapper +'">' +
							thumb +
							'<iframe src="'+ url +'" frameborder="0" scrolling="no" allowfullscreen></iframe>' +
						'</div>' +
					'</div>' +
					'<p>&nbsp;</p>';

				e.editor.insertHtml(html);
				completeMediaEmbed();
			}).fail(function() {
				e.editor.insertHtml(paste);
				completeMediaEmbed();
			});
		}

		// FACEBOOK : POSTS
		matches = paste.match(fbPostsRegExp);
		if ( matches ) {
			setPastedContent(e, paste);
			waitMediaEmbed();

			url = encodeURIComponent(matches[0]);
			html +=
				'<div class="'+ iframe_wrapper +'_wrapper" contenteditable="false">' +
					'<div class="'+ iframe_wrapper +' fb-post fb_iframe_widget_fluid_desktop fb_iframe_widget">' +
						'<iframe frameborder="0" allowtransparency="true" allowfullscreen="true" scrolling="no" loadloading="lazy" ' +
							'src="https://www.facebook.com/plugins/post.php?href='+ url +'&amp;app_id=&amp;channel=https%3A%2F%2Fstaticxx.facebook.com%2Fx%2Fconnect%2Fxd_arbiter%2F%3Fversion%3D46%23cb%3Df278d3fe180800c%26' +
							'domain%3D'+ current_domain +'%26origin%3D'+ encodeURIComponent(request_uri) +'f214a1b105f1a6%26relation%3Dparent.parent&amp;container_width=552' +
							'&amp;href='+ url +'&amp;lazy=true&amp;locale=ko_KR&amp;sdk=joey&amp;show_text=true&amp;width=552">' +
						'</iframe>' +
					'</div>' +
				'</div>' +
				'<p>&nbsp;</p>';

			e.editor.insertHtml(html);
			completeMediaEmbed();
			e.editor.showNotification(omit_message, 'info', 3000);
		}

		// FACEBOOK : VIDEOS
		matches = paste.match(fbVideosRegExp);
		if ( matches ) {
			setPastedContent(e, paste);
			waitMediaEmbed();

			url = encodeURIComponent(matches[0].replace('/live', ''));
			html +=
				'<div class="'+ iframe_wrapper +'_wrapper" contenteditable="false">' +
					'<div class="'+ iframe_wrapper +' fb-video fb_iframe_widget_fluid_desktop fb_iframe_widget">' +
						'<iframe frameborder="0" allowtransparency="true" allowfullscreen="true" scrolling="no" allow="encrypted-media" loading="lazy" ' +
							'src="https://www.facebook.com/plugins/video.php?href='+ url +'&amp;app_id=&amp;channel=https%3A%2F%2Fstaticxx.facebook.com%2Fx%2Fconnect%2Fxd_arbiter%2F%3Fversion%3D46%23cb%3Df3f581051061a8c%26' +
							'domain%3D'+ current_domain +'%26origin%3D'+ encodeURIComponent(request_uri) +'f3c3e32848d7a9c%26relation%3Dparent.parent&amp;container_width=552' +
							'&amp;href='+ url +'&amp;lazy=true&amp;locale=ko_KR&amp;sdk=joey&amp;show_text=true&amp;width=552">' +
						'</iframe>' +
					'</div>' +
				'</div>' +
				'<p>&nbsp;</p>';

			e.editor.insertHtml(html);
			completeMediaEmbed();
			e.editor.showNotification(omit_message, 'info', 3000);
		}

		// FC2 VIDEO/LIVE
		matches = paste.match(fC2RegExp);
		if ( matches && matches[1] && matches[2] ) {
			setPastedContent(e, paste);
			waitMediaEmbed();

			type = matches[1];
			id = matches[2];

			if ( type === 'video' ) {
				url = 'https://video.fc2.com/embed/player/' + id + '/';
				$.getJSON(cors + 'https://video.fc2.com/api/v3/videoplayer/' + id).done(function(data) {
					if ( !data ) {
						e.editor.insertHtml(paste);
						completeMediaEmbed();
						return false;
					}
					thumb = data.poster ? '<img src="'+ data.poster.replace(/\?.+$/, '') +'" />' : '';

					html +=
						'<div class="'+ iframe_wrapper +'_wrapper" contenteditable="false">' +
							'<div class="'+ iframe_wrapper +'">' +
								thumb +
								'<iframe src="'+ url +'" allowfullscreen="1"></iframe>' +
							'</div>' +
						'</div>' +
						'<p>&nbsp;</p>';
					e.editor.insertHtml(html);
					completeMediaEmbed();
				}).fail(function() {
					e.editor.insertHtml(paste);
					completeMediaEmbed();
				});
			} else if ( type === 'live' ) {
				url = 'https://live.fc2.com/embedPlayer/?id='+ id +'&lang=ko&suggest=1&thumbnail=1&adultaccess=1';
				thumb = '<img src="https://live-storage.fc2.com/thumb/'+ id +'/thumb.png" />';

				html +=
					'<div class="'+ iframe_wrapper +'_wrapper" contenteditable="false">' +
						'<div class="'+ iframe_wrapper +'">' +
							thumb +
							'<iframe src="'+ url +'" allowfullscreen="1"></iframe>' +
						'</div>' +
					'</div>' +
					'<p>&nbsp;</p>';
				e.editor.insertHtml(html);
				completeMediaEmbed();
			} else {
				e.editor.insertHtml(paste);
				completeMediaEmbed();
			}
		}

		// FLICKR
		matches = paste.match(flickrRegExp);
		if ( matches ) {
			setPastedContent(e, paste);
			waitMediaEmbed();

			if ( matches[1] ) {
				type = matches[1];
				id = matches[2];
				if ( type === 'f' ) {
					type = 'favorites';
				} else if ( type === 'g' ) {
					type = 'group';
				} else if ( type === 'go' ) {
					type = 'grouppool';
				} else if ( type === 'ps' ) {
					type = 'photostream';
				} else if ( type === 's' ) {
					type = 'photoset';
				} else if ( type === 'y' ) {
					type = 'gallery';
				} else {
					e.editor.insertHtml(paste);
					completeMediaEmbed();
					return false;
				}

				$.get(cors + encodeURIComponent('https://www.flickr.com/short_urls.gne?'+ type +'=' + id), {format: 'short'}).done(function(data) {
					url = $.isArray(data) ? data[0]: data;
					setFlickr(e, url, paste);
				}).fail(function() {
					e.editor.insertHtml(paste);
					completeMediaEmbed();
				});
			} else {
				setFlickr(e, matches[0], paste);
			}
		}

		// GETTY IMAGES
		matches = paste.match(gettyRegExp);
		if ( matches && $.isNumeric(matches[4]) ) {
			setPastedContent(e, paste);
			waitMediaEmbed();

			type = matches[2];
			name = matches[3];
			id = matches[4];

			if ( matches[1] === 'gty.im' || type === undefined || type === 'license' ) {
				url = 'https://www.gettyimages.com/license/' + id;
				$.get(cors + url, {format: 'short'}).done(function(data) {
					if ( !data ) {
						e.editor.insertHtml(paste);
						completeMediaEmbed();
						return false;
					}
					matches = data.match(gettyRegExp);

					setGetty(e, paste, matches[2], id);
				}).fail(function() {
					e.editor.insertHtml(paste);
					completeMediaEmbed();
				});
			} else {
				setGetty(e, paste, type, id);
			}
		}

		// GFYCAT
		matches = paste.match(gfycatRegExp);
		if ( matches && matches[4] ) {
			setPastedContent(e, paste);
			waitMediaEmbed();

			type = matches[1];
			name = matches[2] ? matches[2] + '/' : '';
			start = matches[3] ? matches[3] + '/' : '';
			id = matches[4];
			hash = ( name ) ? matches[5] : '';
			url = 'https://api.gfycat.com/v1/oembed?url=https://gfycat.com/' + name + start + id + hash;

			if ( $.inArray(id, ['popular', 'featured', 'discover', 'stickers', 'sound']) !== -1 ) {
				e.editor.insertHtml(paste);
				completeMediaEmbed();
				return false;
			}

			$.get(cors + 'https://gfycat.com/ifr/'+ name + id + hash + '/' + start.replace('/', '')).done(function(data) {
				matches = data.match(findOGImage);
				if ( matches && matches[1] ) {
					thumb = matches[1];
					$.getJSON(url).done(function(data) {
						if ( type || name ) {
							html +=
								'<div class="'+ iframe_wrapper +'_wrapper" contenteditable="false">' +
									'<div class="'+ iframe_wrapper +' gfycat-embed">' +
										'<div class="gfycat-embed-group">' +
											'<img src="'+ thumb +'" />' +
											'<iframe src="https://gfycat.com/ifr/'+ name + id + hash + '/' + start.replace('/', '') +'?autoplay=0" frameborder="0" scrolling="no" allowfullscreen></iframe>' +
										'</div>' +
									'</div>' +
								'</div>' +
								'<p>&nbsp;</p>';
							e.editor.insertHtml(html);
							completeMediaEmbed();
						} else {
							if ( data ) {
								matches = data.html.match(/padding-bottom:([^']+)'/);
								style = matches[1];
								html +=
									'<div class="'+ iframe_wrapper +'_wrapper" contenteditable="false">' +
										'<div class="'+ iframe_wrapper +' gfycat-embed">' +
											'<div class="gfycat-embed-single" style="padding-bottom:'+ style +';">' +
												'<img src="'+ thumb +'" />' +
												'<iframe src="https://gfycat.com/ifr/'+ name + id + hash + '/' + start.replace('/', '') +'?autoplay=0" frameborder="0" scrolling="no" allowfullscreen></iframe>' +
											'</div>' +
										'</div>' +
									'</div>' +
									'<p>&nbsp;</p>';
								e.editor.insertHtml(html);
								completeMediaEmbed();
							} else {
								e.editor.insertHtml(paste);
								completeMediaEmbed();
							}
						}
					}).fail(function() {
						e.editor.insertHtml(paste);
						completeMediaEmbed();
					});
				} else {
					e.editor.insertHtml(paste);
					completeMediaEmbed();
				}
			}).fail(function() {
				e.editor.insertHtml(paste);
				completeMediaEmbed();
			});
		}

		// GIPHY
		matches = paste.match(giphyRegExp);
		if ( matches && matches[2] ) {
			setPastedContent(e, paste);
			waitMediaEmbed();

			id = matches[2];

			$.getJSON(cors + 'https://giphy.com/services/oembed?url=' + matches[0]).done(function(data) {
				if ( data ) {
					type = data.type;
					if ( type === 'photo' ) {
						style = '';
						url = '<img src="'+ data.url + '" />';
					} else if ( type === 'video' ) {
						style = 'padding-bottom: '+ ((100 * data.height) / data.width).toFixed(2) +'%;';
						url =
							'<img src="'+ data.thumbnail_url + '" />' +
							'<iframe src="https://giphy.com/embed/' + id + '/' + type +'" allowfullscreen="true" frameborder="no" scrolling="no" allowFullScreen></iframe>';
					}

					html +=
						'<div class="'+ iframe_wrapper +'_wrapper" contenteditable="false">' +
							'<div class="'+ iframe_wrapper +' giphy-embed giphy-embed-'+ type +'" style="'+ style +'">' +
								url +
							'</div>' +
						'</div>' +
						'<p>&nbsp;</p>';
					e.editor.insertHtml(html);
					completeMediaEmbed();
				} else {
					e.editor.insertHtml(paste);
					completeMediaEmbed();
				}
			}).fail(function() {
				e.editor.insertHtml(paste);
				completeMediaEmbed();
			});
		}

		// GOOGLE BOOKS
		matches = paste.match(/^https:\/\/books.google.co(?:m|.kr)\/books\?id=([^&]+).+$/);
		if ( matches && matches[1] ) {
			setPastedContent(e, paste);
			waitMediaEmbed();

			id = matches[1];
			hash = matches[0].replace(/&amp;/g, '&').getQuery('pg');
			hash = !hash ? 'PP1' : hash;
			url = 'https://books.google.co.kr/books?id='+ id +'&pg='+ hash +'&output=embed';
			thumb = '<img src="https://books.google.co.kr/books/publisher/content?id='+ id +'&printsec=frontcover&img=1" />';

			html +=
				'<div class="'+ iframe_wrapper +'_wrapper" contenteditable="false">' +
					'<div class="'+ iframe_wrapper +' google-books-embed">' +
						thumb +
						'<iframe src="'+ url +'" scrolling="no" frameborder="no"></iframe>' +
					'</div>' +
				'</div>' +
				'<p>&nbsp;</p>';
			e.editor.insertHtml(html);
			completeMediaEmbed();
		}

function setGoogleForms(e, paste, url) {
	url = url.replace(/\?.+/, '').setQuery('embedded', 'true');
	$.get(cors + url).done(function(data) {
		if ( !data ) {
			e.editor.insertHtml(paste);
			completeMediaEmbed();
			return false;
		}
		matches = data.match(/<(?:meta|META)[^>]+"og:(image|(?:(?:embed:)?(?:height|width)))"[^>]+content\=(?:'|")((?:http(?:s)?:)?.+?)(?:'|")(?:[^>]+)?>/g);
		if ( !matches || !matches[1] ) {
			e.editor.insertHtml(paste);
			completeMediaEmbed();
			return false;
		}
		params = {};
		$.each(matches, function(i, v) {
			params[v.match(/og:(?:embed:)?([^"]+)/)[1]] = v.match(/content="([^"]+)/)[1];
		});
		thumb = '<img src="'+ params.image +'" />';

		html +=
			'<div class="'+ iframe_wrapper +'_wrapper" contenteditable="false">' +
				'<div class="'+ iframe_wrapper +' google-forms-embed">' +
					thumb +
					'<iframe src="'+ url +'" allowfullscreen="true" frameborder="no"></iframe>' +
				'</div>' +
			'</div>' +
			'<p>&nbsp;</p>';
		e.editor.insertHtml(html);
		completeMediaEmbed();
	}).fail(function() {
		e.editor.insertHtml(paste);
		completeMediaEmbed();
	});
}

		// GOOGLE DRIVE/DOCS
		matches = paste.match(/^https?:\/\/(?:((?:docs|drive).google.com|forms.gle))\/(?:(document|drive\/folders|drawings|embeddedfolderview|file|forms|presentation|spreadsheets)[/?](?:(d\/(?:e\/)?|id=))?)?([-_a-zA-Z0-9]+)(?:[/?&#](?:.+)?)?$/);
		if ( matches && matches[4] ) {
			start = matches[1];
			type = matches[2];
			name = matches[3];
			id = matches[4];
			if ( start !== 'forms.gle' && !type ) {
				return true;
			}

			setPastedContent(e, paste);
			waitMediaEmbed();

			hash = '';
			thumb = '';
			if ( type === 'drive/folders' || type === 'embeddedfolderview' ) {
				type = 'drive';
				url = 'https://drive.google.com/embeddedfolderview?id=' + id;

				html +=
					'<div class="'+ iframe_wrapper +'_wrapper" contenteditable="false">' +
						'<div class="'+ iframe_wrapper +' google-'+ type +'-embed">' +
							thumb +
							'<iframe src="'+ url +'" allowfullscreen="true" frameborder="no"></iframe>' +
						'</div>' +
					'</div>' +
					'<p>&nbsp;</p>';
				e.editor.insertHtml(html);
				completeMediaEmbed();
			} else if ( type === 'file' ) {
				hash = 'preview';
				url = 'https://docs.google.com/' + type + '/' + name + id + '/' + hash;

				html +=
					'<div class="'+ iframe_wrapper +'_wrapper" contenteditable="false">' +
						'<div class="'+ iframe_wrapper +' google-'+ type +'-embed">' +
							thumb +
							'<iframe src="'+ url +'" allowfullscreen="true" frameborder="no"></iframe>' +
						'</div>' +
					'</div>' +
					'<p>&nbsp;</p>';
				e.editor.insertHtml(html);
				completeMediaEmbed();
			} else if ( type === 'drawings' ) {
				hash = 'pub?w=640&h=640';
				url = 'https://docs.google.com/' + type + '/' + name + id + '/' + hash;


				html +=
					'<div class="'+ iframe_wrapper +'_wrapper" contenteditable="false">' +
						'<div class="'+ iframe_wrapper +' google-'+ type +'-embed">' +
							'<img src="'+ url +'" />' +
						'</div>' +
					'</div>' +
					'<p>&nbsp;</p>';
				e.editor.insertHtml(html);
				completeMediaEmbed();
			} else if ( type === 'forms' || start === 'forms.gle' ) {
				type = 'forms';
				hash = 'viewform';
				if ( name === 'd/e/' ) {
					setGoogleForms(e, paste, matches[0]);
				} else if ( name === 'd/' ) {
					url = 'https://docs.google.com/' + type + '/' + name + id + '/' + hash;
					$.get(cors + url).done(function(data) {
						if ( !data ) {
							e.editor.insertHtml(paste);
							completeMediaEmbed();
							return false;
						}
						matches = data.match(/https?:\/\/(?:docs.google.com|forms.gle)\/(?:(forms)\/(?:(d\/(?:e\/)?))?)?([-_a-zA-Z0-9]+)(?:[/](?:(edit|view(?:form)?))(?:\?)?(?:[^"]+)?)?/);
						if ( !matches || !matches[0] ) {
							e.editor.insertHtml(paste);
							completeMediaEmbed();
							return false;
						}
						setGoogleForms(e, paste, matches[0]);
					}).fail(function() {
						e.editor.insertHtml(paste);
						completeMediaEmbed();
					});
				} else if ( !name ) {
					$.get(cors + matches[0], {format: 'short'}).done(function(data) {
						if ( !data ) {
							e.editor.insertHtml(paste);
							completeMediaEmbed();
							return false;
						}
						setGoogleForms(e, paste, data);
					}).fail(function() {
						e.editor.insertHtml(paste);
						completeMediaEmbed();
					});
				}
			} else if ( type === 'presentation' ) {
				hash = 'embed';
				url = 'https://docs.google.com/' + type + '/' + name + id + '/' + hash;
				$.get(cors + url).done(function(data) {
					if ( !data ) {
						e.editor.insertHtml(paste);
						completeMediaEmbed();
						return false;
					}
					matches = data.match(findOGImage);
					if ( !matches || !matches[1] ) {
						e.editor.insertHtml(paste);
						completeMediaEmbed();
						return false;
					}
					thumb = '<img src="'+ matches[1] +'" />';

					html +=
						'<div class="'+ iframe_wrapper +'_wrapper" contenteditable="false">' +
							'<div class="'+ iframe_wrapper +' google-'+ type +'-embed">' +
								thumb +
								'<iframe src="'+ url +'" allowfullscreen="true" frameborder="no"></iframe>' +
							'</div>' +
						'</div>' +
						'<p>&nbsp;</p>';
					e.editor.insertHtml(html);
					completeMediaEmbed();
				}).fail(function() {
					e.editor.insertHtml(paste);
					completeMediaEmbed();
				});
			} else if ( type === 'spreadsheets' ) {
				hash = 'pubhtml';
				url = 'https://docs.google.com/' + type + '/' + name + id + '/' + hash;

				html +=
					'<div class="'+ iframe_wrapper +'_wrapper" contenteditable="false">' +
						'<div class="'+ iframe_wrapper +' google-'+ type +'-embed">' +
							thumb +
							'<iframe src="'+ url +'" allowfullscreen="true" frameborder="no"></iframe>' +
						'</div>' +
					'</div>' +
					'<p>&nbsp;</p>';
				e.editor.insertHtml(html);
				completeMediaEmbed();
			} else {
				hash = 'pub?embedded=true';
				url = 'https://docs.google.com/' + type + '/' + name + id + '/' + hash;

				html +=
					'<div class="'+ iframe_wrapper +'_wrapper" contenteditable="false">' +
						'<div class="'+ iframe_wrapper +' google-'+ type +'-embed">' +
							thumb +
							'<iframe src="'+ url +'" allowfullscreen="true" frameborder="no"></iframe>' +
						'</div>' +
					'</div>' +
					'<p>&nbsp;</p>';
				e.editor.insertHtml(html);
				completeMediaEmbed();
			}
		}

		// IMDB
		matches = paste.match(imdbRegExp);
		if ( matches && matches[1] && matches[2] === 'vi' && $.isNumeric(matches[3]) ) {
			setPastedContent(e, paste);
			waitMediaEmbed();

			id = matches[1];
			url = 'https://www.imdb.com/video/imdb/'+ id +'/imdb/embed?&amp;format=1080p&amp;width=&isResponsive=true';

			$.get(cors + url).done(function(data) {
				if ( data ) {
					matches = data.match(/"videoPlayerObject"[^{]+{"video"[^{]+(\{.+"width":[\d]+\})\}/);
					if ( matches ) {
						params = JSON.parse(matches[1]);
						thumb = params.slate ? '<img src="'+ params.slate +'" />': '';
						html +=
							'<div class="'+ iframe_wrapper +'_wrapper" contenteditable="false">' +
								'<div class="'+ iframe_wrapper +'" style="display: inline-block; max-width: '+ params.width +'px;">' +
									thumb +
									'<iframe src="'+ url +'" allowfullscreen="true" frameborder="no" scrolling="no"></iframe>' +
								'</div>' +
							'</div>' +
							'<p>&nbsp;</p>';
						e.editor.insertHtml(html);
						completeMediaEmbed();
					} else {
						e.editor.insertHtml(paste);
						completeMediaEmbed();
					}
				} else {
					e.editor.insertHtml(paste);
					completeMediaEmbed();
				}
			}).fail(function() {
				e.editor.insertHtml(paste);
				completeMediaEmbed();
			});
		}

		// IMGUR
		matches = paste.match(imgurRegExp);
		if ( matches && matches[3] ) {
			setPastedContent(e, paste);
			waitMediaEmbed();

			id = matches[3];
			if ( matches[1] && matches[1] === 'i' ) {
				type = 'file';
			} else {
				type = matches[2];
				if ( !type ) {
					type = 'image';
				} else {
					if ( type === 'a' || type.indexOf('t/') !== -1 ) {
						type = 'album';
					}
					if ( type.indexOf('r/') !== -1 ) {
						type = 'image';
					}
				}
			}

			if ( type === 'file' ) {
				url = 'https://imgur.com/'+ id +'/embed?context=false&ref=' + current_domain;
				thumb = matches[0];
				html +=
					'<div class="'+ iframe_wrapper +'_wrapper" contenteditable="false">' +
						'<div class="'+ iframe_wrapper +' imgur-embed">' +
							'<img src="'+ thumb +'" />' +
							'<iframe src="'+ url +'" class="imgur-embed-iframe-pub" allowfullscreen="true" frameborder="no" scrolling="no"></iframe>' +
						'</div>' +
					'</div>' +
					'<p>&nbsp;</p>';

				e.editor.insertHtml(html);
				completeMediaEmbed();
				e.editor.showNotification(omit_message, 'info', 3000);
			} else {
				url = 'https://api.imgur.com/3/'+ type +'/'+ id +'?client_id=546c25a59c58ad7';

				$.getJSON(url).done(function(data) {
					if ( data && data.data ) {
						if ( type === 'gallery' ) {
							type = ( data.data.is_album ) ? 'album' : 'image';
						}
						if ( type === 'album' ) {
							hash = 'a/';
							style = data.data.images[0];
						} else {
							hash = '';
							style = data.data;
						}
						thumb = ( style.gifv ) ? style.gifv.replace('http://', 'https://').replace('gifv', 'gif') : style.link;
						url = 'https://imgur.com/'+ hash + id +'/embed?pub=true&ref=' + current_domain;

						html +=
							'<div class="'+ iframe_wrapper +'_wrapper" contenteditable="false">' +
								'<div class="'+ iframe_wrapper +' imgur-embed">' +
									'<img src="'+ thumb +'" />' +
									'<iframe src="'+ url +'" class="imgur-embed-iframe-pub" allowfullscreen="true" frameborder="no" scrolling="no"></iframe>' +
								'</div>' +
							'</div>' +
							'<p>&nbsp;</p>';
						e.editor.insertHtml(html);
						completeMediaEmbed();
						e.editor.showNotification(omit_message, 'info', 3000);
					} else {
						e.editor.insertHtml(paste);
						completeMediaEmbed();
					}
				}).fail(function() {
					e.editor.insertHtml(paste);
					completeMediaEmbed();
				});
			}
		}

		// INSTAGRAM
		matches = paste.match(instagramRegExp);
		if ( matches && matches[3] ) {
			setPastedContent(e, paste);
			waitMediaEmbed();

			id = matches[3];
			if ( !matches[1] ) {
				type = 'username';
			} else if ( matches[1] === 'p' || matches[2] === 'p' ) {
				type = 'p';
			} else if ( matches[1] === 'tv' ) {
				type = 'tv';
			} else if ( matches[1] === 'explore' || matches[2] === 'tags' ) {
				type = 'tag';
			} else if ( matches[1] === 'reel' ) {
				type = 'reel';
			} else {
				e.editor.insertHtml(paste);
				completeMediaEmbed();
				return false;
			}

			if ( type === 'p' || type === 'tv' || type === 'reel' ) {
				html +=
					'<div class="'+ iframe_wrapper +'_wrapper" contenteditable="false">' +
						'<div class="'+ iframe_wrapper +' instagram-embed">' +
							'<iframe class="instagram-media instagram-media-rendered" src="https://www.instagram.com/'+ type +'/'+ id +'/embed/captioned/" frameborder="0" height="480" scrolling="no"></iframe>' +
						'</div>' +
					'</div>' +
					'<p>&nbsp;</p>';
				e.editor.insertHtml(html);
				completeMediaEmbed();
				e.editor.showNotification(omit_message, 'info', 3000);
			} else {
				e.editor.insertHtml(paste);
				completeMediaEmbed();
			}
		}

		// IQIYI
		matches = paste.match(iqiyiRegExp);
		if ( matches && matches[2] ) {
			setPastedContent(e, paste);
			waitMediaEmbed();

			id = matches[2];
			type = matches[1];

			$.get(cors + 'https://www.iq.com/play/' + id).done(function(data) {
				thumb = '';
				matches = data.match(findOGImage);
				if ( matches ) {
					thumb = '<img src="'+ matches[1] +'" />';
				}

				url = 'https://em.iq.com/player.html?id='+ id +'&mod=kr&lang=ko&autoplay=0';
				html +=
					'<div class="'+ iframe_wrapper +'_wrapper" contenteditable="false">' +
						'<div class="'+ iframe_wrapper +'">' +
							thumb +
							'<iframe src="'+ url +'" frameborder="0" scrolling="no" allowtransparency="true" allowfullscreen="true"></iframe>' +
						'</div>' +
					'</div>' +
					'<p>&nbsp;</p>';

				e.editor.insertHtml(html);
				completeMediaEmbed();
			}).fail(function() {
				e.editor.insertHtml(paste);
				completeMediaEmbed();
			});
		}

		// JJALBOT
		matches = paste.match(jjalbotRegExp);
		if ( matches && $.inArray(matches[1], ['jjals', 'embed', 'media']) > -1 && matches[2] ) {
			setPastedContent(e, paste);
			waitMediaEmbed();

			id = matches[2];
			url = 'https://jjalbot.com/embed/' + id;
			$.get(url).done(function(data) {
				matches = data.match(findOGImage);
				if ( matches ) {
					thumb = matches[1];
					$('<img />').attr('src', thumb).load(function() {
						style = 'max-width: '+ this.naturalWidth +'px; max-height: '+ this.naturalHeight +'px;';
						html +=
							'<div class="'+ iframe_wrapper +'_wrapper" contenteditable="false">' +
								'<div class="'+ iframe_wrapper +' jjalbot-embed" style="'+ style +'">' +
									'<img src="'+ thumb +'" style="width: '+ this.naturalWidth +'px;" />' +
									'<iframe src="'+ url +'" frameborder="0" scrolling="no"></iframe>' +
								'</div>' +
							'</div>' +
							'<p>&nbsp;</p>';
						e.editor.insertHtml(html);
						completeMediaEmbed();
					});
				} else {
					e.editor.insertHtml(paste);
					completeMediaEmbed();
				}
			}).fail(function() {
				e.editor.insertHtml(paste);
				completeMediaEmbed();
			});
		}

		// JSFIDDLE
		matches = paste.match(jsfiddleRegExp);
		if ( matches && matches[1] && matches[1] !== 'user' && matches[1] !== 'boilerplate' && matches[2] ) {
			setPastedContent(e, paste);
			waitMediaEmbed();

			name = matches[1];
			id = matches[2];
			hash = matches[3] ? '/' + matches[3] : '';
			url = '//jsfiddle.net/'+ name +'/'+ id + hash + '/embedded/result,html,css,js/dark/';

			html +=
				'<div class="'+ iframe_wrapper +'_wrapper" contenteditable="false">' +
					'<div class="'+ iframe_wrapper +' jsfiddle-embed">' +
						'<iframe src="'+ url +'" allowfullscreen="allowfullscreen" allowpaymentrequest frameborder="0"></iframe>' +
					'</div>' +
				'</div>' +
				'<p>&nbsp;</p>';
			e.editor.insertHtml(html);
			completeMediaEmbed();
		}

		// KAKAO TV
		matches = paste.match(kakaoRegExp);
		if ( matches && $.isNumeric(matches[4]) ) {
			setPastedContent(e, paste);
			waitMediaEmbed();

			name = matches[1];
			hash = matches[2];
			type = matches[3];
			id = matches[4];
			type = (type === 'l' || type === 'livelink') ? 'livelink' : 'cliplink';

			if ( name === 'v' ) {
				$.get(cors + matches[0], {format: 'short'}).done(function(data) {
					if ( !data ) {
						e.editor.insertHtml(paste);
						completeMediaEmbed();
						return false;
					}
					setDaumNews(e, paste, data);
				}).fail(function() {
					e.editor.insertHtml(paste);
					completeMediaEmbed();
				});
			} else if ( name === 'news.v' ) {
				setDaumNews(e, paste, matches[0]);
			} else if ( name === 'movie' ) {
				$.getJSON(cors + 'https://movie.daum.net/api/video/' + id).done(function(data) {
					if ( !data ) {
						e.editor.insertHtml(paste);
						completeMediaEmbed();
						return false;
					}
					url = data.videoUrl;
					id = url.match(kakaoRegExp)[4];
					setKakao(e, paste, url, type, id);
				}).fail(function() {
					e.editor.insertHtml(paste);
					completeMediaEmbed();
				});
			} else {
				url = (hash === 'daum.net' ) ? 'https://tv.kakao.com/v/' + id : matches[0];
				setKakao(e, paste, url, type, id);
			}
		}

		// MIXCLOUD
		matches = paste.match(mixcloudRegExp);
		if ( matches && matches[1] && matches[2] ) {
			setPastedContent(e, paste);
			waitMediaEmbed();

			name = matches[1];
			list = matches[2];

			$.getJSON(cors + 'https://www.mixcloud.com/oembed/?url=' + matches[0], {format: 'json'}).done(function(data) {
				if ( data ) {
					thumb = data.image ? '<img src="'+ data.image +'" />' : '';
					html +=
						'<div class="'+ iframe_wrapper +'_wrapper" contenteditable="false">' +
							'<div class="'+ iframe_wrapper +' mixcloud-embed">' +
								thumb +
								'<iframe src="https://www.mixcloud.com/widget/iframe/?hide_cover=1&light=1&feed=%2F'+ name +'%2F'+ list +'%2F"></iframe>' +
							'</div>' +
						'</div>' +
						'<p>&nbsp;</p>';
					e.editor.insertHtml(html);
					completeMediaEmbed();
				} else {
					e.editor.insertHtml(paste);
					completeMediaEmbed();
				}
			}).fail(function() {
				e.editor.insertHtml(paste);
				completeMediaEmbed();
			});
		}

		// MLB.COM
		matches = paste.match(mlbRegExp);
		if ( matches && matches[1] ) {
			setPastedContent(e, paste);
			waitMediaEmbed();

			id = matches[1];
			url = 'https://streamable.com/m/'+ id;

			$.getJSON('https://www.mlb.com/data-service/en/videos/' + id).done(function(data) {
				if ( data ) {
					thumb = ( data.image.cuts && data.image.cuts[1].src ) ? '<img src="'+ data.image.cuts[1].src +'" />' : '';
					html +=
						'<div class="'+ iframe_wrapper +'_wrapper" contenteditable="false">' +
							'<div class="'+ iframe_wrapper +'">' +
								thumb +
								'<iframe src="'+ url +'" allowfullscreen frameborder="0" scrolling="no"></iframe>' +
							'</div>' +
						'</div>' +
						'<p>&nbsp;</p>';
					e.editor.insertHtml(html);
					completeMediaEmbed();
				} else {
					e.editor.insertHtml(paste);
					completeMediaEmbed();
				}
			}).fail(function() {
				e.editor.insertHtml(paste);
				completeMediaEmbed();
			});
		}

		// NAVER.ME
		matches = paste.match(navermeRegExp);
		if ( matches && matches[1] ) {
			setPastedContent(e, paste);
			waitMediaEmbed();

			$.getJSON(cors + matches[0], {format: 'short'}).done(function(data) {
				if ( data ) {
					url = $.isArray(data) ? data[0] : data;
					if ( url ) {
						matchesTV = url.match(naverRegExp);
						matchesVOD = url.match(naverVodRegExp);
						matchesVODShort = url.match(naverVodShortendRegExp);
						if ( matchesTV && $.isNumeric(matchesTV[2]) ) {
							setNaverTV(e, matchesTV, paste);
						} else if ( matchesVOD && (matchesVOD[3] || matchesVOD[4]) ) {
							setNaverVOD(e, matchesVOD, paste);
						} else if ( matchesVODShort && $.isNumeric(matchesVODShort[2]) ) {
							setNaverVODShort(e, matchesVODShort, paste);
						} else {
							e.editor.insertHtml(paste);
							completeMediaEmbed();
						}
					} else {
						e.editor.insertHtml(paste);
						completeMediaEmbed();
					}
				} else {
					e.editor.insertHtml(paste);
					completeMediaEmbed();
				}
			}).fail(function() {
				e.editor.insertHtml(paste);
				completeMediaEmbed();
			});
		}

		// NAVER VOD
		matches = paste.match(naverVodRegExp);
		if ( matches && (matches[3] || matches[4]) ) {
			setPastedContent(e, paste);
			waitMediaEmbed();

			setNaverVOD(e, matches, paste);
		}

		// NAVER VOD - Shortend Url
		matches = paste.match(naverVodShortendRegExp);
		if ( matches && $.isNumeric(matches[2]) ) {
			setPastedContent(e, paste);
			waitMediaEmbed();

			setNaverVODShort(e, matches, paste);
		}

		// NAVER TV
		matches = paste.match(naverRegExp);
		if ( matches && $.isNumeric(matches[2]) ) {
			setPastedContent(e, paste);
			waitMediaEmbed();

			setNaverTV(e, matches, paste);
		}

		// NICOVIDEO
		matches = paste.match(niconicoRegExp);
		if ( matches && matches[3] ) {
			setPastedContent(e, paste);
			waitMediaEmbed();

			id = matches[3];
			start = matches[4] ? matches[4] : 0;

			if ( !matches[1] ) {
				type = 'video';
				url = 'https://embed.nicovideo.jp/watch/'+ id +'?persistence=1&amp;oldScript=1&amp;referer='+ request_uri +'&amp;from='+ start +'&amp;allowProgrammaticFullScreen=1';

				$.get(cors + 'https://ext.nicovideo.jp/api/getthumbinfo/' + id).done(function(data) {
					thumb = '';
					if ( data ) {
						data = $.parseXML(data);
						thumb = '<img src="' + $(data).find('thumbnail_url').text() +'.L" />';
					}
					html +=
						'<div class="'+ iframe_wrapper +'_wrapper" contenteditable="false">' +
							'<div class="'+ iframe_wrapper +' nico-embed-'+ type +'">' +
								thumb +
								'<iframe src="'+ url +'" allowfullscreen frameborder="0" scrolling="no"></iframe>' +
							'</div>' +
						'</div>' +
						'<p>&nbsp;</p>';
					e.editor.insertHtml(html);
					completeMediaEmbed();
				}).fail(function() {
					e.editor.insertHtml(paste);
					completeMediaEmbed();
				});
			} else if ( matches[1] === 'live' ) {
				type = 'live';
				if ( id.indexOf('lv') !== -1 ) {
					url = 'https://live.nicovideo.jp/embed/' + id;
					url += ( start ) ? '#' + start : '';

					$.get(cors + url).done(function(data) {
						if ( data ) {
							matches = data.match(/<img(?:[^>]+)?src="([^"]+)"(?:[^>]+)?>/);
							if ( matches ) {
								thumb = matches[1] ? '<img src="'+ matches[1] +'" />' : '';
								html +=
									'<div class="'+ iframe_wrapper +'_wrapper" contenteditable="false">' +
										'<div class="'+ iframe_wrapper +' nico-embed-'+ type +'">' +
											thumb +
											'<iframe src="'+ url +'" allowfullscreen frameborder="0" scrolling="no"></iframe>' +
										'</div>' +
									'</div>' +
									'<p>&nbsp;</p>';
								e.editor.insertHtml(html);
								completeMediaEmbed();
							} else {
								e.editor.insertHtml(paste);
								completeMediaEmbed();
							}
						} else {
							e.editor.insertHtml(paste);
							completeMediaEmbed();
						}
					}).fail(function() {
						e.editor.insertHtml(paste);
						completeMediaEmbed();
					});
				} else {
					$.get(cors + matches[0]).done(function(data) {
						if ( data ) {
							matches = data.match(findOGUrl);
							if ( matches ) {
								url = matches[1];

								matches = data.match(findOGImage);
								thumb = matches[1] ? '<img src="'+ matches[1] +'" />' : '';

								matches = url.match(niconicoRegExp);
								id = matches[3];

								url = 'https://live.nicovideo.jp/embed/' + id;
								url += ( start ) ? '#' + start : '';

								html +=
									'<div class="'+ iframe_wrapper +'_wrapper" contenteditable="false">' +
										'<div class="'+ iframe_wrapper +' nico-embed-'+ type +'">' +
											thumb +
											'<iframe src="'+ url +'" allowfullscreen frameborder="0" scrolling="no"></iframe>' +
										'</div>' +
									'</div>' +
									'<p>&nbsp;</p>';
								e.editor.insertHtml(html);
								completeMediaEmbed();
							} else {
								e.editor.insertHtml(paste);
								completeMediaEmbed();
							}
						} else {
							e.editor.insertHtml(paste);
							completeMediaEmbed();
						}
					}).fail(function() {
						e.editor.insertHtml(paste);
						completeMediaEmbed();
					});
				}
			} else {
				e.editor.insertHtml(paste);
				completeMediaEmbed();
			}
		}

		// PINTEREST - SHORTENED
		matches = paste.match(pinitRegExp);
		if ( matches && matches[1] ) {
			setPastedContent(e, paste);
			waitMediaEmbed();

			$.get(cors + matches[0], {format: 'short'}).done(function(data) {
				if ( !data ) {
					e.editor.insertHtml(paste);
					completeMediaEmbed();
					return false;
				}
				url = data;
				matches = url.match(pinterestRegExp);
				if ( !matches ) {
					e.editor.insertHtml(paste);
					completeMediaEmbed();
					return false;
				}
				setPinterest(e, matches);
			}).fail(function() {
				e.editor.insertHtml(paste);
				completeMediaEmbed();
			});
		}

		// PINTEREST
		matches = paste.match(pinterestRegExp);
		if ( matches && matches[1] ) {
			setPastedContent(e, paste);
			waitMediaEmbed();

			setPinterest(e, matches);
		}

		// PODBBANG - SHORTENED
		matches = paste.match(podbbangShortRegExp);
		if ( matches && matches[1] ) {
			setPastedContent(e, paste);
			waitMediaEmbed();

			$.get(cors + matches[0], {format: 'short'}).done(function(data) {
				if ( !data ) {
					e.editor.insertHtml(paste);
					completeMediaEmbed();
					return false;
				}
				matches = data.match(podbbangRegExp);
				if ( !matches || !$.isNumeric(matches[2]) ) {
					e.editor.insertHtml(paste);
					completeMediaEmbed();
					return false;
				}
				setPodbbang(e, matches);
			}).fail(function() {
				e.editor.insertHtml(paste);
				completeMediaEmbed();
			});
		}

		// PODBBANG
		matches = paste.match(podbbangRegExp);
		if ( matches && $.isNumeric(matches[2]) ) {
			setPastedContent(e, paste);
			waitMediaEmbed();

			setPodbbang(e, matches);
		}

		// PREZI
		matches = paste.match(preziRegExp);
		if ( matches && matches[2] ) {
			setPastedContent(e, paste);
			waitMediaEmbed();

			id = matches[2];
			type = (matches[1] === 'v') ? 'v/' : '';
			url = 'https://prezi.com/' + type + 'embed/' + id + '/';

			if ( !type ) {
				$.get(cors + matches[0]).done(function(data) {
					if ( !data ) {
						e.editor.insertHtml(paste);
						completeMediaEmbed();
						return false;
					}
					matches = data.match(findOGImage);
					if ( !matches ) {
						e.editor.insertHtml(paste);
						completeMediaEmbed();
						return false;
					}
					thumb = matches[1] ? '<img src="'+ matches[1] +'" />' : '';
					html +=
						'<div class="'+ iframe_wrapper +'_wrapper" contenteditable="false">' +
							'<div class="'+ iframe_wrapper +'">' +
								thumb +
								'<iframe src="'+ url +'" frameborder="no" scrolling="no" allowfullscreen></iframe>' +
							'</div>' +
						'</div>' +
						'<p>&nbsp;</p>';

					e.editor.insertHtml(html);
					completeMediaEmbed();
				}).fail(function() {
					e.editor.insertHtml(paste);
					completeMediaEmbed();
				});
			} else {
				$.getJSON(cors + 'https://prezi.com/v/oembed/?url=' + matches[0], {format: 'json'}).done(function(data) {
					if ( !data ) {
						e.editor.insertHtml(paste);
						completeMediaEmbed();
						return false;
					}
					thumb = data.thumbnail_url ? '<img src="'+ data.thumbnail_url +'" />' : '';
					html +=
						'<div class="'+ iframe_wrapper +'_wrapper" contenteditable="false">' +
							'<div class="'+ iframe_wrapper +'">' +
								thumb +
								'<iframe src="'+ url +'" frameborder="no" scrolling="no" allowfullscreen></iframe>' +
							'</div>' +
						'</div>' +
						'<p>&nbsp;</p>';
					e.editor.insertHtml(html);
					completeMediaEmbed();
				}).fail(function() {
					e.editor.insertHtml(paste);
					completeMediaEmbed();
					return false;
				});
			}
		}

		// QQ
		matches = paste.match(qqRegExp);
		if ( matches ) {
			setPastedContent(e, paste);
			waitMediaEmbed();

			type = matches[1];
			if ( type === 'cover' ) {
				list = matches[2];
				id = matches[3] ? matches[3] : '';
			} else if ( type === 'page' ) {
				id = matches[2];
			}

			setQQ(e, paste, matches[0]);
		}

		// QQ Mobile
		matches = paste.match(qqMRegExp);
		if ( matches && matches[2] ) {
			setPastedContent(e, paste);
			waitMediaEmbed();

			list = matches[1];
			id = matches[2];
			url = 'https://v.qq.com/x/cover/'+ list + '/' + id +'.html';

			setQQ(e, paste, url);
		}

		// REDDIT
		matches = paste.match(redditRegExp);
		if ( matches && matches[1] && matches[2] && matches[3] ) {
			setPastedContent(e, paste);
			waitMediaEmbed();

			name = matches[1];
			id = matches[2];
			type = matches[3];
			hash = matches[4];
			url = 'https://www.redditmedia.com/'+ name +'/comments/'+ id +'/'+ type +'/';

			$.getJSON(cors + url + '.json', {format: 'json'}).done(function(data) {
				if ( !data ) {
					e.editor.insertHtml(paste);
					completeMediaEmbed();
					return false;
				}
				data = data[0].data.children[0].data;

				url = 'https://www.redditmedia.com/'+ name +'/comments/'+ id +'/'+ type +'/';
				if ( hash ) {
					url += hash + '?depth=2&amp;showmore=false&amp;embed=true&amp;showtitle=true&amp;context=1&amp;showedits=false';
				} else {
					url += '?ref_source=embed&amp;ref=share&amp;embed=true&amp;showedits=false';
				}
				if ( data.thumbnail  && data.thumbnail !== 'self' ) {
					if ( data.preview ) {
						thumb = '<img src="'+ data.preview.images[0].source.url +'" />';
					} else {
						thumb = '<img src="'+ data.thumbnail +'" />';
					}
				} else {
					thumb = '';
				}

				html +=
					'<div class="'+ iframe_wrapper +'_wrapper" contenteditable="false">' +
						'<div class="'+ iframe_wrapper +' reddit-embed">' +
							thumb +
							'<iframe src="'+ url +'" sandbox="allow-scripts allow-same-origin allow-popups" scrolling="no"></iframe>' +
						'</div>' +
					'</div>' +
					'<p>&nbsp;</p>';
				e.editor.insertHtml(html);
				completeMediaEmbed();
				e.editor.showNotification(omit_message, 'info', 3000);
			}).fail(function() {
				e.editor.insertHtml(paste);
				completeMediaEmbed();
			});
		}

		// RELIVE
		matches = paste.match(reliveRegExp);
		if ( matches && matches[1] ) {
			setPastedContent(e, paste);
			waitMediaEmbed();

			id = matches[1];
			url = 'https://www.relive.cc/view/'+ id +'/widget?r=oembed';

			$.get(cors + url).done(function(data) {
				if ( !data ) {
					e.editor.insertHtml(paste);
					completeMediaEmbed();
					return false;
				}
				matches = data.match(/poster(?:['|"|:]+)(https?:\/\/.+.png(?:\?[^"]+)?)/);
				if ( !matches ) {
					e.editor.insertHtml(paste);
					completeMediaEmbed();
					return false;
				}
				thumb = matches[1] ? '<img src="'+ matches[1] +'" />' : '';
				html +=
					'<div class="'+ iframe_wrapper +'_wrapper" contenteditable="false">' +
						'<div class="'+ iframe_wrapper +' relive-embed">' +
							thumb +
							'<iframe src="'+ url +'" allowfullscreen="" frameborder="0" scrolling="no"></iframe>' +
						'</div>' +
					'</div>' +
					'<p>&nbsp;</p>';
				e.editor.insertHtml(html);
				completeMediaEmbed();
			}).fail(function() {
				e.editor.insertHtml(paste);
				completeMediaEmbed();
			});
		}

		// SLIDESHARE
		matches = paste.match(slidedhareRegExp);
		if ( matches && matches[2] ) {
			setPastedContent(e, paste);
			waitMediaEmbed();

			params = {
				url: matches[0]
			};
			$.getJSON('https://www.slideshare.net/api/oembed/2?callback=?', params).done(function(data) {
				if ( !data ) {
					e.editor.insertHtml(paste);
					completeMediaEmbed();
					return false;
				}
				matches = data.html.match(findSrc);
				if ( !matches ) {
					e.editor.insertHtml(paste);
					completeMediaEmbed();
					return false;
				}
				url = matches[1];
				thumb = data.thumbnail_url ? '<img src="'+ data.thumbnail_url +'" />' : '';
				html +=
					'<div class="'+ iframe_wrapper +'_wrapper" contenteditable="false">' +
						'<div class="'+ iframe_wrapper +'">' +
							thumb +
							'<iframe src="'+ url +'" frameborder="0" marginwidth="0" marginheight="0" scrolling="no" allowfullscreen></iframe>' +
						'</div>' +
					'</div>' +
					'<p>&nbsp;</p>';
				e.editor.insertHtml(html);
				completeMediaEmbed();
			}).fail(function() {
				e.editor.insertHtml(paste);
				completeMediaEmbed();
			});
		}

		// SOUNDCLOUD
		matches = paste.match(soundcloudRegExp);
		if ( matches && matches[2] ) {
			setPastedContent(e, paste);
			waitMediaEmbed();

			params = {
				url: matches[0].replace(matches[3], ''),
				format: 'json',
				maxheight: 166,
				show_comments: true
			};

			$.getJSON('https://soundcloud.com/oembed', params).done(function(data) {
				if ( !data ) {
					e.editor.insertHtml(paste);
					completeMediaEmbed();
					return false;
				}
				matches = data.html.match(/<iframe ?.* src="([^"]+(playlists|tracks)(?:\/|%2F)(\d+)[^"]+)" ?.*>/);
				if ( !matches ) {
					e.editor.insertHtml(paste);
					completeMediaEmbed();
					return false;
				}
				if ( matches[2] === 'tracks' ) {
					style = 'height: '+ data.height +'px;';
				} else {
					style = 'height: 374px;';
				}
				thumb = data.thumbnail_url ? '<img src="'+ data.thumbnail_url +'" />' : '';
				html +=
					'<div class="'+ iframe_wrapper +'_wrapper" contenteditable="false">' +
						'<div class="'+ iframe_wrapper +' soundcloud-embed" style="'+ style +'">' +
							thumb +
							data.html.replace('visual=true&', '') +
						'</div>' +
					'</div>' +
					'<p>&nbsp;</p>';
				e.editor.insertHtml(html);
				completeMediaEmbed();
			}).fail(function() {
				e.editor.insertHtml(paste);
				completeMediaEmbed();
			});
		}

		// SPOTIFY
		matches = paste.match(spotifyRegExp);
		if ( matches && matches[4] ) {
			setPastedContent(e, paste);
			waitMediaEmbed();

			$.getJSON('https://open.spotify.com/oembed?url=' + matches[0]).done(function(data) {
				if ( !data ) {
					e.editor.insertHtml(paste);
					completeMediaEmbed();
					return false;
				}
				url = data.html.match(findSrc)[1];
				style = 'max-width: ' + data.width + 'px; padding-bottom: '+ data.height +'px;';
				thumb = data.thumbnail_url ? '<img src="'+ data.thumbnail_url +'" />' : '';

				html +=
					'<div class="'+ iframe_wrapper +'_wrapper" contenteditable="false">' +
						'<div class="'+ iframe_wrapper +' spotify-embed" style="'+ style +'">' +
							thumb +
							'<iframe src="'+ url +'" frameborder="0" style="width: 100%; height: '+ data.height +'px;"></iframe>' +
						'</div>' +
					'</div>' +
					'<p>&nbsp;</p>';
				e.editor.insertHtml(html);
				completeMediaEmbed();
			}).fail(function() {
				e.editor.insertHtml(paste);
				completeMediaEmbed();
			});
		}

		// STREAMABLE
		matches = paste.match(streamableRegExp);
		if ( matches && matches[1] ) {
			setPastedContent(e, paste);
			waitMediaEmbed();

			id = matches[1];
			params = {
				url: matches[0]
			};

			$.getJSON('https://api.streamable.com/oembed.json', params).done(function(data) {
				if ( !data ) {
					e.editor.insertHtml(paste);
					completeMediaEmbed();
					return false;
				}
				url = data.html.match(findSrc)[1];
				style = 'padding-bottom: '+ ((data.height / data.width) * 100) +'%;';
				thumb = data.thumbnail_url ? '<img src="'+ data.thumbnail_url.replace(/^\/\//, 'https://') +'" />' : '';

				html +=
					'<div class="'+ iframe_wrapper +'_wrapper" contenteditable="false">' +
						'<div class="'+ iframe_wrapper +'" style="'+ style +'">' +
							thumb +
							'<iframe src="'+ url + '?loop=0" frameborder="0" allowfullscreen></iframe>' +
						'</div>' +
					'</div>' +
					'<p>&nbsp;</p>';
				e.editor.insertHtml(html);
				completeMediaEmbed();
			}).fail(function() {
				e.editor.insertHtml(paste);
				completeMediaEmbed();
			});
		}

		// TED
		matches = paste.match(tedRegExp);
		if ( matches && matches[2] ) {
			setPastedContent(e, paste);
			waitMediaEmbed();

			id = matches[2];
			params = {
				url: 'https://www.ted.com/talks/' + id
			};

			$.getJSON('https://www.ted.com/services/v1/oembed.json', params).done(function(data) {
				if ( !data ) {
					e.editor.insertHtml(paste);
					completeMediaEmbed();
					return false;
				}
				thumb = data.thumbnail_url ? '<img src="'+ data.thumbnail_url +'" />' : '';

				html +=
					'<div class="'+ iframe_wrapper +'_wrapper" contenteditable="false">' +
						'<div class="'+ iframe_wrapper +'">' +
							thumb +
							'<iframe src="https://embed.ted.com/talks/'+ id +'?language=ko" frameborder="0" scrolling="no" marginwidth="0" allowfullscreen></iframe>' +
						'</div>' +
					'</div>' +
					'<p>&nbsp;</p>';
				e.editor.insertHtml(html);
				completeMediaEmbed();
			}).fail(function() {
				e.editor.insertHtml(paste);
				completeMediaEmbed();
			});
		}

		// TENOR
		matches = paste.match(tenorRegExp);
		if ( matches ) {
			setPastedContent(e, paste);
			waitMediaEmbed();

			url = matches[0];
			if ( matches[1] && !matches[2] ) {
				setTenor(e, paste, url);
			} else if ( !matches[1] && matches[2] ) {
				$.get(cors + url, {format: 'short'}).done(function(data) {
					if ( !data ) {
						e.editor.insertHtml(paste);
						completeMediaEmbed();
						return false;
					}
					url = data;
					setTenor(e, paste, url);
				}).fail(function() {
					e.editor.insertHtml(paste);
					completeMediaEmbed();
				});
			} else {
				e.editor.insertHtml(paste);
				completeMediaEmbed();
			}
		}

		// TIKTOK
		matches = paste.match(tiktokRegExp);
		if ( matches && matches[1] ) {
			setPastedContent(e, paste);
			waitMediaEmbed();

			if ( $.isNumeric(matches[1]) ) {
				setTiktok(e, matches, paste);
				e.editor.showNotification(omit_message, 'info', 3000);
			} else {
				$.get(cors + matches[0], {format: 'short'}).done(function(data) {
					if ( !data ) {
						e.editor.insertHtml(paste);
						completeMediaEmbed();
						return false;
					}
					matches = data.match(tiktokRegExp);
					if ( !matches ) {
						e.editor.insertHtml(paste);
						completeMediaEmbed();
						return false;
					}
					if ( matches && $.isNumeric(matches[1]) ) {
						setTiktok(e, matches, paste);
						e.editor.showNotification(omit_message, 'info', 3000);
					} else {
						e.editor.insertHtml(paste);
						completeMediaEmbed();
					}
				}).fail(function() {
					e.editor.insertHtml(paste);
					completeMediaEmbed();
				});
			}
		}

		// TUDOU
		matches = paste.match(tudouRegExp);
		if ( matches && matches[2] ) {
			setPastedContent(e, paste);
			waitMediaEmbed();

			id = matches[2];
			type = matches[1];
			params = {
				client_id: '0edbfd2e4fc91b72',
				video_id: id
			};

			$.getJSON('https://api.youku.com/videos/show.json', params).done(function(data) {
				if ( !data ) {
					e.editor.insertHtml(paste);
					completeMediaEmbed();
					return false;
				}
				url = 'https://player.youku.com/embed/' + id;
				thumb = data.bigThumbnail ? '<img src="'+ data.bigThumbnail +'"/>' : '';

				html +=
					'<div class="'+ iframe_wrapper +'_wrapper" contenteditable="false">' +
						'<div class="'+ iframe_wrapper +'">' +
							thumb +
							'<iframe src="'+ url +'" frameborder="0" scrolling="no" allowtransparency="true" allowfullscreen="true"></iframe>' +
						'</div>' +
					'</div>' +
					'<p>&nbsp;</p>';

				e.editor.insertHtml(html);
				completeMediaEmbed();
			}).fail(function() {
				e.editor.insertHtml(paste);
				completeMediaEmbed();
			});
		}

		// Tumblr
		matches = paste.match(tumblrRegExp);
		if ( matches && $.isNumeric(matches[2]) ) {
			setPastedContent(e, paste);
			waitMediaEmbed();

			url = matches[0];
			name = matches[1];
			id = matches[2];

			$.getJSON(cors + 'https://www.tumblr.com/oembed/1.0?url=' + url).done(function(data) {
				if ( !data ) {
					e.editor.insertHtml(paste);
					completeMediaEmbed();
					return false;
				}
				url = data.html.match(/data-href="([^"]+)"/)[1];
				url += '?language=ko_KR&amp;did=';
				url += data.html.match(/data-did="([^"]+)"/)[1];

				$.get(cors + encodeURIComponent(data.url)).done(function(data) {
					if ( !data ) {
						e.editor.insertHtml(paste);
						completeMediaEmbed();
						return false;
					}
					matches = data.match(findOGImage);
					if ( !matches ) {
						e.editor.insertHtml(paste);
						completeMediaEmbed();
						return false;
					}
					thumb = matches[1] ? '<img src="'+ matches[1] +'"/>' : '';

					html +=
						'<div class="'+ iframe_wrapper +'_wrapper" contenteditable="false">' +
							'<div class="'+ iframe_wrapper +' tumblr-post">' +
								thumb +
								'<iframe src="'+ url +'" class="tumblr-embed tumblr-embed-loaded" frameborder="0" allowfullscreen="true"></iframe>' +
							'</div>' +
						'</div>' +
						'<p>&nbsp;</p>';

					e.editor.insertHtml(html);
					completeMediaEmbed();
					e.editor.showNotification(omit_message, 'info', 3000);
				}).fail(function() {
					e.editor.insertHtml(paste);
					completeMediaEmbed();
					return false;
				});
			}).fail(function() {
				e.editor.insertHtml(paste);
				completeMediaEmbed();
			});
		}

		// TV SOHU
		matches = paste.match(tvSohuRegExp);
		if ( matches && matches[4] ) {
			setPastedContent(e, paste);
			waitMediaEmbed();

			url = matches[0];
			if ( matches[1] ) {
				$.get(cors + url, {format: 'short'}).done(function(data) {
					if ( !data ) {
						e.editor.insertHtml(paste);
						completeMediaEmbed();
						return false;
					}
					url = data;
					setTVSohu(e, paste, url);
				}).fail(function() {
					e.editor.insertHtml(paste);
					completeMediaEmbed();
				});
			} else {
				setTVSohu(e, paste, url);
			}
		}

		// TVCF
		matches = paste.match(tvcfRegExp);
		if ( matches && $.isNumeric(matches[1]) ) {
			setPastedContent(e, paste);
			waitMediaEmbed();

			id = matches[1];
			params = {
				url: matches[0],
				format: 'json'
			};

			$.getJSON('https://play.tvcf.co.kr/rest/oembed', params).done(function(data) {
				if ( !data ) {
					e.editor.insertHtml(paste);
					completeMediaEmbed();
					return false;
				}
				thumb = data.thumbnail_url ? '<img src="'+ data.thumbnail_url +'"/>' : '';

				html +=
					'<div class="'+ iframe_wrapper +'_wrapper" contenteditable="false">' +
						'<div class="'+ iframe_wrapper +'">' +
							thumb +
							'<iframe src="https://play.tvcf.co.kr/embed/'+ id +'" frameborder="0" scrolling="no" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>' +
						'</div>' +
					'</div>' +
					'<p>&nbsp;</p>';
				e.editor.insertHtml(html);
				completeMediaEmbed();
			}).fail(function() {
				e.editor.insertHtml(paste);
				completeMediaEmbed();
				return false;
			});
		}

		// TWITCH
		matches = paste.match(twitchRegExp);
		if ( matches ) {
			setPastedContent(e, paste);
			waitMediaEmbed();

			if ( matches[1] === 'clips' || matches[3] === 'clip' ) {
				type = 'clip';
			} else if ( !matches[2] ) {
				type = 'channel';
			} else if ( $.inArray(matches[2], ['video', 'videos', 'channel', 'collection', 'clip', 'clips']) !== -1 ) {
				type = matches[2].replace('s', '');
			}

			if ( type === 'channel' ) {
				id = matches[2] ? matches[2] : matches[4];
				if ( !id ) {
					if ( matches[5] === type ) {
						id = matches[6];
					}
				}
			} else {
				id = matches[4];
			}

			start = ( matches[5] === 't' ) ? '&time=' + matches[6] : '';

			if ( type === 'clip' ) {
				url = 'https://clips.twitch.tv/embed?'+ type +'='+ id +'&parent=' + current_domain +'&autoplay=false';
			} else {
				url = 'https://player.twitch.tv/?'+ type +'='+ id + start +'&parent=' + current_domain +'&autoplay=false';
			}

			$.get(cors + matches[0]).done(function(data) {
				if ( !data ) {
					e.editor.insertHtml(paste);
					completeMediaEmbed();
					return false;
				}
				matches = data.match(findOGImage);
				thumb = matches[1] ? '<img src="'+ matches[1] +'"/>' : '';

				html +=
					'<div class="'+ iframe_wrapper +'_wrapper" contenteditable="false">' +
						'<div class="'+ iframe_wrapper +'">' +
							thumb +
							'<iframe src="'+ url +'" frameborder="0" scrolling="no" allowfullscreen></iframe>' +
						'</div>' +
					'</div>' +
					'<p>&nbsp;</p>';
				e.editor.insertHtml(html);
				completeMediaEmbed();
			}).fail(function() {
				e.editor.insertHtml(paste);
				completeMediaEmbed();
			});
		}

		// TWITTER
		matches = paste.match(twitterRegExp);
		if ( matches ) {
			setPastedContent(e, paste);
			waitMediaEmbed();

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
				html +=
					'<div class="'+ iframe_wrapper +'_wrapper" contenteditable="false">' +
						'<div class="'+ iframe_wrapper +' twitter-status" id="user_content_tweet_'+ id +'">' +
							'<div class="twitter-tweet">' +
								'<iframe src="https://platform.twitter.com/embed/Tweet.html?dnt=false&amp;frame=false&amp;hideCard=false&amp;hideThread=false&amp;id='+ id +'&amp;lang=ko&amp;theme=light&amp;width=550px" allowfullscreen="true" allowtransparency="true" data-tweet-id="'+ id +'" frameborder="0" scrolling="no"></iframe>' +
							'</div>' +
						'</div>' +
					'</div>' +
					'<p>&nbsp;</p>';
				e.editor.insertHtml(html);
				completeMediaEmbed();
				e.editor.showNotification(omit_message, 'info', 3000);

			} else if ( type === 'lists' ) {
				$.getJSON('https://publish.twitter.com/oembed?callback=?', params).done(function(data) {
					if ( !data ) {
						e.editor.insertHtml(paste);
						completeMediaEmbed();
						return false;
					}
					matches = data.url.match(twitterRegExp);
					if ( !matches ) {
						e.editor.insertHtml(paste);
						completeMediaEmbed();
						return false;
					}
					name = matches[1];

					html +=
						'<div class="'+ iframe_wrapper +'_wrapper" contenteditable="false">' +
							'<div class="'+ iframe_wrapper +' twitter-list">' +
								'<a class="twitter-timeline" data-width="'+ data.width +'" data-tweet-limit="'+ params.limit +'" href="'+ data.url +'" target="_blank">' +
									'<span>'+ data.title +'</span>' +
									'<br><span>@'+ name +'</span><span>님의 트위터 리스트</span>' +
								'</a>' +
							'</div>'+
						'</div>'+
						'<p>&nbsp;</p>';
					e.editor.insertHtml(html);
					completeMediaEmbed();
					e.editor.showNotification(omit_message, 'info', 3000);
				}).fail(function() {
					e.editor.insertHtml(paste);
					completeMediaEmbed();
				});
			} else if ( !type && name !== 'i' ) {
				html +=
					'<div class="'+ iframe_wrapper +'_wrapper" contenteditable="false">' +
						'<div class="'+ iframe_wrapper +' twitter-profile">' +
							'<a class="twitter-timeline" data-width="'+ params.maxwidth +'" data-tweet-limit="'+ params.limit +'" href="'+ matches[0] +'" target="_blank">' +
								'<span>@'+ name +'</span><span>님의&nbsp;&nbsp;</span><span>트윗</span>' +
							'</a>' +
						'</div>'+
					'</div>'+
					'<p>&nbsp;</p>';
				e.editor.insertHtml(html);
				completeMediaEmbed();
				e.editor.showNotification(omit_message, 'info', 3000);
			} else {
				e.editor.insertHtml(paste);
				completeMediaEmbed();
			}
		}

		// VIMEO
		matches = paste.match(vimeoRegExp);
		if ( matches && $.isNumeric(matches[3]) ) {
			setPastedContent(e, paste);
			waitMediaEmbed();

			id = matches[3];
			start = matches[4] ? matches[4] : '';

			$.getJSON('https://vimeo.com/api/oembed.json?url=' + matches[0]).done(function(data) {
				if ( !data ) {
					e.editor.insertHtml(paste);
					completeMediaEmbed();
					return false;
				}
				if ( data.thumbnail_url ) {
					thumb = data.thumbnail_url.replace(/(\d+)x(\d+)/, '960x540');
					thumb = '<img src="'+ thumb +'" />';
				} else {
					thumb = '';
				}

				html +=
					'<div class="'+ iframe_wrapper +'_wrapper" contenteditable="false">' +
						'<div class="'+ iframe_wrapper +'">' +
							thumb +
							'<iframe src="https://player.vimeo.com/video/'+ id + start +'" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe>' +
						'</div>' +
					'</div>' +
					'<p>&nbsp;</p>';
				e.editor.insertHtml(html);
				completeMediaEmbed();
			}).fail(function() {
				e.editor.insertHtml(paste);
				completeMediaEmbed();
			});
		}

		// VLIVE TV
		matches = paste.match(vliveRegExp);
		if ( matches && matches[2] ) {
			setPastedContent(e, paste);
			waitMediaEmbed();

			type = matches[1];
			id = matches[2];

			if ( type === 'video' ) {
				url = 'https://vlive.tv/embed/'+ id +'?autoPlay=false';
				$.getJSON(cors + 'https://www.vlive.tv/oembed?url=' + matches[0]).done(function(data) {
					if ( !data ) {
						e.editor.insertHtml(paste);
						completeMediaEmbed();
						return false;
					}
					thumb = data.thumbnail_url ? '<img src="'+ data.thumbnail_url +'"/>' : '';

					html +=
						'<div class="'+ iframe_wrapper +'_wrapper" contenteditable="false">' +
							'<div class="'+ iframe_wrapper +'">' +
								thumb +
								'<iframe src="'+ url +'" frameborder="no" scrolling="no" marginwidth="0" marginheight="0" allowfullscreen></iframe>' +
							'</div>' +
						'</div>' +
						'<p>&nbsp;</p>';
					e.editor.insertHtml(html);
					completeMediaEmbed();
				}).fail(function() {
					e.editor.insertHtml(paste);
					completeMediaEmbed();
				});
			} else if ( type === 'post' ) {
				$.get(cors + matches[0]).done(function(data) {
					if ( !data ) {
						e.editor.insertHtml(paste);
						completeMediaEmbed();
						return false;
					}
					matches = data.match(/\"videoSeq\"\:(\d+)\,/);
					if ( !matches ) {
						e.editor.insertHtml(paste);
						completeMediaEmbed();
						return false;
					}
					id = matches[1];
					url = 'https://vlive.tv/embed/'+ id +'?autoPlay=false';
					matches = data.match(findOGImage);
					thumb = (matches && matches[1]) ? '<img src="'+ matches[1] +'"/>' : '';

					html +=
						'<div class="'+ iframe_wrapper +'_wrapper" contenteditable="false">' +
							'<div class="'+ iframe_wrapper +'">' +
								thumb +
								'<iframe src="'+ url +'" frameborder="no" scrolling="no" marginwidth="0" marginheight="0" allowfullscreen></iframe>' +
							'</div>' +
						'</div>' +
						'<p>&nbsp;</p>';
					e.editor.insertHtml(html);
					completeMediaEmbed();
				}).fail(function() {
					e.editor.insertHtml(paste);
					completeMediaEmbed();
				});
			}
		}

		// WIKIPEDIA
		matches = paste.match(wikipediaRegExp);
		if ( matches && matches[1].length === 2 && matches[2] && matches[3] ) {
			setPastedContent(e, paste);
			waitMediaEmbed();

			type = matches[1];
			hash = matches[2];

			if ( hash === 'w' ) {
				queries = window.XE.URI(matches[0].replace(/amp\;/g, '')).search(true);
				name = queries.title;
			} else {
				name = matches[3];
			}
			url = 'https://'+ type +'.wikipedia.org/w/api.php?action=parse&format=json&section=0&page='+ name +'&callback=?';

			$.getJSON(url).done(function(data) {
				data = data.parse;
				if ( !data ) {
					e.editor.insertHtml(paste);
					completeMediaEmbed();
					return false;
				}

				var today = new Date();
				var date = today.getFullYear() + '-' + ('0' + (today.getMonth() + 1)).slice(-2)  + '-' + ('0' + today.getDate()).slice(-2);

				start = data.text['*'].replace(/a\shref=\"\/wiki/g, 'a href="https://'+ type +'.wikipedia.org/wiki');
				start = start.replace(/src="\/\//g, 'src="https://');
				hash = '<div class="mw-parser-output">';
				$(start).children().each(function() {
					if ( $(this).text().trim().length > 0 ) {
						hash += this.outerHTML;
					}
				});
				hash += '</div>';

				$('body').append(hash);
				$('body').children('.mw-parser-output').find('.mw-references-wrap').remove();
				$('body').children('.mw-parser-output').find('.reference').remove();
				$('body').children('.mw-parser-output').find('.references').remove();

				thumb = '';
				if ( $('body').children('.mw-parser-output').find('img').length > 0 ) {
					thumb = $('body').children('.mw-parser-output').find('img').parent('a')[0].outerHTML;
				}

				html = decodeURI(html);
				html += 
					'<div class="'+ iframe_wrapper +'_wrapper" contenteditable="false">' +
						'<div class="'+ iframe_wrapper +' wikipedia-embed">' +
							'<div>' +
								thumb +
								$('body').children('.mw-parser-output').find('p')[0].outerHTML +
							'</div>' +
							'<div>' +
								'<a href="https://'+ type +'.wikipedia.org/w/index.php?title='+ data.title +'&oldid='+ data.revid +'">' +
									'<img src="//ko.wikipedia.org/static/images/mobile/copyright/wikipedia.png" alt="" aria-hidden="true">' +
								' '+ data.title +'</a>' +
								'<span>'+ date +'</span>' +
							'</div>' +
						'</div>' +
					'</div>' +
					'<p>&nbsp;</p>';
				$('body').children('.mw-parser-output').remove();

				e.editor.insertHtml(html);
				completeMediaEmbed();
			}).fail(function() {
				e.editor.insertHtml(paste);
				completeMediaEmbed();
			});
		}

		// YOUKU
		matches = paste.match(youkuRegExp);
		if ( matches && matches[2] ) {
			setPastedContent(e, paste);
			waitMediaEmbed();

			id = matches[2];
			type = matches[1];
			params = {
				client_id: '0edbfd2e4fc91b72',
				video_id: id
			};

			$.getJSON('https://api.youku.com/videos/show.json', params).done(function(data) {
				if ( !data ) {
					e.editor.insertHtml(paste);
					completeMediaEmbed();
					return false;
				}
				url = 'https://player.youku.com/embed/' + id;
				thumb = data.bigThumbnail ? '<img src="'+ data.bigThumbnail +'"/>' : '';

				html +=
					'<div class="'+ iframe_wrapper +'_wrapper" contenteditable="false">' +
						'<div class="'+ iframe_wrapper +'">' +
							thumb +
							'<iframe src="'+ url +'" frameborder="0" scrolling="no" allowtransparency="true" allowfullscreen="true"></iframe>' +
						'</div>' +
					'</div>' +
					'<p>&nbsp;</p>';
				e.editor.insertHtml(html);
				completeMediaEmbed();
			}).fail(function() {
				e.editor.insertHtml(paste);
				completeMediaEmbed();
			});
		}

		// YOUTUBE
		matches = paste.match(youtubeRegExp);
		if ( matches && ($.inArray(matches[2], ['shorts', 'embed', 'watch', 'playlist']) !== -1 || (matches[3] && matches[3].length === 11)) )  {
			setPastedContent(e, paste);
			waitMediaEmbed();

			url = type = id = start = list = style = name = hash = ratio = '';
			type = matches[2];
			id = ( matches[3] !== 'videoseries' ) ? matches[3] : '';
			if ( matches[4] ) {
				queries = window.XE.URI(matches[0].replace(/amp\;/g, '')).search(true);
				id = queries.v ? queries.v : id;
				start = queries.t ? '?start=' + queries.t : '';
				start = queries.start ? '?start=' + queries.start : start;
				if ( queries.list ) {
					list = id ? '&list=' + queries.list : '?list=' + queries.list;
				}
			}
			url = 'https://www.youtube.com/';
			url += id ? 'watch?v=' + id : 'playlist';
			url += list ? list : '';

			$.getJSON('https://www.youtube.com/oembed?url=' + url).done(function(data) {
				if ( !data ) {
					e.editor.insertHtml(paste);
					completeMediaEmbed();
					return false;
				}

				url = 'https://www.youtube.com/embed/';
				if ( id && list ) {
					url += id + list.replace('&', '?') + start.replace('?', '&');
				} else if ( id && !list ) {
					url += id + start;
				} else if ( !id && list ) {
					url += 'videoseries' + list;
				} else if ( !id && !list ) {
					e.editor.insertHtml(paste);
					completeMediaEmbed();
					return false;
				}

				hash = 'mqdefault';
				ratio = (data.height / data.width * 100).toFixed(2);
				if ( type === 'shorts' ) {
					name = ' youtube-shorts';
				} else {
					style += ' style="padding-bottom: '+ ratio +'%;"';
					if ( ratio > 66 ) {
						hash = 'hqdefault';
					}
				}

				if ( !matches[1] || matches[1] !== 'music' ) {
					thumb = data.thumbnail_url ? '<img src="'+ data.thumbnail_url.replace('hqdefault', hash) +'" />' : '';
					html +=
						'<div class="'+ iframe_wrapper +'_wrapper" contenteditable="false">' +
							'<div class="'+ iframe_wrapper + name +'"'+ style +'>' +
								thumb +
								'<iframe src="'+ url +'" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>' +
							'</div>' +
						'</div>' +
						'<p>&nbsp;</p>';
				} else {
					if ( !data.author_name || !data.author_url ) {
						data.author_name = data.provider_name;
						data.author_url = data.provider_url;
					}
					name = ' youtube-music';
					style = ( Math.ceil(data.width * 90 / data.height) <= 120 ) ? 90 : Math.ceil(data.width * 90 / data.height);
					hash = ( (id && !list && !start) ? '?' : '&' ) + 'cc_lang_pref&cc_load_policy=0&controls=0&enablejsapi=1&iv_load_policy=3&fs=0&loop=0&modestbranding=1&rel=0&html5=1&showinfo=0';
					html +=
						'<div class="'+ iframe_wrapper +'_wrapper" contenteditable="false">' +
							'<div class="'+ iframe_wrapper + name +'">' +
								'<div class="youtube-music-desc">' +
									'<figure style="width: '+ style +'px; height: 90px;">' +
										'<iframe frameborder="0" allowfullscreen></iframe>' +
										'<img alt="'+ url + hash +'" src="'+ data.thumbnail_url.replace('hqdefault', 'mqdefault') +'" />' +
									'</figure>' +
									'<div>' +
										'<span><a href="https://music.youtube.com/watch?v='+ data.thumbnail_url.match(/vi\/([^/]+)/)[1] +'" target="_blank">' + data.title + '</a></span>' +
										'<span><a href="'+ data.author_url +'" target="_blank">' + data.author_name + '</a></span>' +
									'</div>' +
									'<div>' +
										'<span class="extra"><i class="xi-expand-square"></i>' + (list ? '<i class="xi-bars"></i>' : '') + '</span>' +
										'<span class="extra"><i class="xi-repeat"></i>' + (list ? '<i class="xi-shuffle"></i>' : '') + '</span>' +
									'</div>' +
								'</div>' +
								'<div class="youtube-music-controls">' +
									'<div class="progress"><div class="bar"></div></div>' +
									'<div class="remote">' +
										'<span>' +
											(list ? '<i class="xi-step-backward-o"></i>' : '') +
											'<i class="xi-play"></i><i class="xi-pause-o" style="display: none;"></i><i class="xi-refresh-l" style="display: none;"></i>' +
											(list ? '<i class="xi-step-forward-o"></i>' : '') +
										'</span>' +
										'<span>' +
											'<i class="xi-volume-off" style="display: none;"></i><i class="xi-volume-min" style="display: none;"></i><i class="xi-volume-mid" style="display: none;"></i><i class="xi-volume-max"></i>' +
										'</span>' +
										'<span class="timer">' +
											'<span>0:00</span><span>&nbsp;/&nbsp;</span><span>0:00</span>' +
										'</span>' +
									'</div>'+
								'</div>' +
								(list ? '<div class="youtube-music-table-wrapper"></div>' : '') +
							'</div>' +
						'</div>' +
						'<p>&nbsp;</p>';
				}
				e.editor.insertHtml(html);
				completeMediaEmbed();
			}).fail(function(data) {
				if ( data.status !== 404 ) {
					e.editor.showNotification(data.responseText, 'warning', 2000);
					e.editor.insertHtml(paste);
					completeMediaEmbed();
					return false;
				}
				$.get(cors + url.replace('music', 'www')).done(function(data) {
					if ( !data ) {
						e.editor.insertHtml(paste);
						completeMediaEmbed();
						return false;
					}
					matches = data.match(/var\s?ytInitialData\s?=\s?(.+?);<\/script>/);
					if ( !matches || !matches[1]) {
						e.editor.insertHtml(paste);
						completeMediaEmbed();
						return false;
					}
					data = JSON.parse(matches[1]);
					id = data.contents.twoColumnBrowseResultsRenderer.tabs[0].tabRenderer.content.sectionListRenderer.contents[0].itemSectionRenderer.contents[0].playlistVideoListRenderer.contents[0].playlistVideoRenderer.videoId;
					data = data.microformat.microformatDataRenderer;

					url = 'https://www.youtube.com/embed/';
					if ( id && list ) {
						url += id + list.replace('&', '?') + start.replace('?', '&');
					} else if ( id && !list ) {
						url += id + start;
					} else if ( !id && list ) {
						url += 'videoseries' + list;
					} else if ( !id && !list ) {
						e.editor.insertHtml(paste);
						completeMediaEmbed();
						return false;
					}

					name = ' youtube-music';
					style = ( Math.ceil(data.thumbnail.thumbnails[0].width * 90 / data.thumbnail.thumbnails[0].height) <= 120 ) ? 90 : Math.ceil(data.thumbnail.thumbnails[0].width * 90 / data.thumbnail.thumbnails[0].height);
					hash = ( (id && !list && !start) ? '?' : '&' ) + 'cc_lang_pref&cc_load_policy=0&controls=0&enablejsapi=1&iv_load_policy=3&fs=0&loop=0&modestbranding=1&rel=0&html5=1&showinfo=0&cue_required=1';
					html +=
						'<div class="'+ iframe_wrapper +'_wrapper" contenteditable="false">' +
							'<div class="'+ iframe_wrapper + name +'">' +
								'<div class="youtube-music-desc">' +
									'<figure style="width: '+ style +'px; height: 90px;">' +
										'<iframe frameborder="0" allowfullscreen></iframe>' +
										'<img alt="'+ url + hash +'" src="https://i.ytimg.com/vi/'+ id +'/mqdefault.jpg" />' +
									'</figure>' +
									'<div>' +
										'<span><a href="'+ data.urlApplinksWeb.replace('www', 'music') +'" target="_blank">' + data.title + '</a></span>' +
										'<span><a href="'+ data.urlApplinksWeb +'" target="_blank">' + data.siteName + '</a></span>' +
									'</div>' +
									'<div>' +
										'<span class="extra"><i class="xi-expand-square"></i>' + (list ? '<i class="xi-bars"></i>' : '') + '</span>' +
										'<span class="extra"><i class="xi-repeat"></i>' + (list ? '<i class="xi-shuffle"></i>' : '') + '</span>' +
									'</div>' +
								'</div>' +
								'<div class="youtube-music-controls">' +
									'<div class="progress"><div class="bar"></div></div>' +
									'<div class="remote">' +
										'<span>' +
											(list ? '<i class="xi-step-backward-o"></i>' : '') +
											'<i class="xi-play"></i><i class="xi-pause-o" style="display: none;"></i><i class="xi-refresh-l" style="display: none;"></i>' +
											(list ? '<i class="xi-step-forward-o"></i>' : '') +
										'</span>' +
										'<span>' +
											'<i class="xi-volume-off" style="display: none;"></i><i class="xi-volume-min" style="display: none;"></i><i class="xi-volume-mid" style="display: none;"></i><i class="xi-volume-max"></i>' +
										'</span>' +
										'<span class="timer">' +
											'<span>0:00</span><span>&nbsp;/&nbsp;</span><span>0:00</span>' +
										'</span>' +
									'</div>'+
								'</div>' +
								(list ? '<div class="youtube-music-table-wrapper"></div>' : '') +
							'</div>' +
						'</div>' +
						'<p>&nbsp;</p>';
					e.editor.insertHtml(html);
					completeMediaEmbed();
				}).fail(function() {
					e.editor.showNotification(data.responseText, 'warning', 2000);
					e.editor.insertHtml(paste);
					completeMediaEmbed();
				});
			});
		}

	}

	function setBilibili(e, paste, id) {
		$.getJSON(cors + 'https://api.bilibili.com/x/web-interface/view?bvid=' + id).done(function(data) {
			if ( data.code === 0 ) {
				thumb = data.data.pic.replace('http:', 'https:');
				html +=
					'<div class="'+ iframe_wrapper +'_wrapper" contenteditable="false">' +
						'<div class="'+ iframe_wrapper +'">' +
							'<img src="'+ thumb +'" />' +
							'<iframe src="//player.bilibili.com/player.html?bvid='+ id +'" allowfullscreen="true"></iframe>' +
						'</div>' +
					'</div>' +
					'<p>&nbsp;</p>';

				e.editor.insertHtml(html);
				completeMediaEmbed();
			} else {
				e.editor.insertHtml(paste);
				completeMediaEmbed();
			}
		}).fail(function() {
			e.editor.insertHtml(paste);
			completeMediaEmbed();
		});
	}

	function setDaumNews(e, paste, url) {
		$.get(cors + url).done(function(data) {
			if ( !data ) {
				e.editor.insertHtml(paste);
				completeMediaEmbed();
				return false;
			}
			matches = data.match(/<iframe.+poster="([^"]+)".+src="([^"]+)".+<\/iframe>/);
			if ( !matches ) {
				e.editor.insertHtml(paste);
				completeMediaEmbed();
				return false;
			}
			thumb = matches[1] ? '<img src="'+ matches[1] +'" />' : '';
			url = matches[2];

			html +=
				'<div class="'+ iframe_wrapper +'_wrapper" contenteditable="false">' +
					'<div class="'+ iframe_wrapper +'">' +
						thumb +
						'<iframe src="'+ url +'" allowfullscreen=""></iframe>' +
					'</div>' +
				'</div>' +
				'<p>&nbsp;</p>';
			e.editor.insertHtml(html);
			completeMediaEmbed();
		}).fail(function() {
			e.editor.insertHtml(paste);
			completeMediaEmbed();
		});
	}

	function setFlickr(e, url, paste) {
		$.getJSON(cors + encodeURIComponent('https://www.flickr.com/services/oembed/?format=json&url=' + url), {format: 'json'}).done(function(data) {
			if ( !data || !data.width || !data.html ) {
				e.editor.insertHtml(paste);
				completeMediaEmbed();
				return false;
			}

			thumb = data.thumbnail_url ? '<img src="'+ data.thumbnail_url + '" >' : '';
			if ( data.flickr_type !== 'video' ) {
				style = data.width + 'x' + data.height;
				html +=
					'<div class="'+ iframe_wrapper +'_wrapper" contenteditable="false">' +
						'<div class="'+ iframe_wrapper +' flickr-embed" id="user_content_filckr_'+ style +'">' +
							data.html.match(/(.+)<script.+script>/)[1] +
						'</div>' +
					'</div>' +
					'<p>&nbsp;</p>';
			} else {
				id = data.web_page.match(flickrRegExp)[2].replace(/[^0-9]+/, '');
				html +=
					'<div class="'+ iframe_wrapper +'_wrapper" contenteditable="false">' +
						'<div class="'+ iframe_wrapper +'">' +
							thumb +
							'<iframe src="https://embedr.flickr.com/photos/'+ id +'" frameborder="0" allowfullscreen width="'+ data.thumbnail_width + '" height="' + data.thumbnail_height +'"></iframe>' +
						'</div>' +
					'</div>' +
					'<p>&nbsp;</p>';
			}

			e.editor.insertHtml(html);
			completeMediaEmbed();
		}).fail(function() {
			e.editor.insertHtml(paste);
			completeMediaEmbed();
		});
	}

	function setGetty(e, paste, type, id) {
		if ( type !== 'video' ) {
			$.getJSON(cors + 'https://embed.gettyimages.com/oembed?url=https://www.gettyimages.com/detail/'+ id).done(function(data) {
				if ( !data ) {
					e.editor.insertHtml(paste);
					completeMediaEmbed();
					return false;
				}

				hash = data.html.match(/gie.widgets.load\(\{([^})]+)/)[1];
				queries = {};
				$.map(hash.split(','), function(v, i) {
					list = v.split(':');
					queries[$.trim(list[0])] = $.trim(list[1].replace(/\'/g, ''));
				});
				hash = ((data.height / data.width) * 100).toFixed(2);
				style = ' style="max-width: '+ data.width +'px; height: '+ hash +'%; max-height: '+ data.height +'px;"'
				url = '//embed.gettyimages.com/embed/'+ id +'?et='+ queries.id +'&tld=com&sig='+ queries.sig +'&caption=true';
				thumb = data.thumbnail_url ? '<img src="'+ data.thumbnail_url +'" />' : '';

				html +=
					'<div class="'+ iframe_wrapper +'_wrapper" contenteditable="false">' +
						'<div class="'+ iframe_wrapper +' gettyimage-embed"'+ style +'>' +
							thumb +
							'<iframe src="'+ url +'" allowfullscreen="true" frameborder="no" scrolling="no"></iframe>' +
						'</div>' +
					'</div>' +
					'<p>&nbsp;</p>';
				e.editor.insertHtml(html);
				completeMediaEmbed();
			});
		} else {
			$.get(cors + matches[0]).done(function(data) {
				if ( !data ) {
					e.editor.insertHtml(paste);
					completeMediaEmbed();
					return false;
				}
				matches = data.match(/<figure><video.+src="([^"]+)".+<figcaption>(.+)<\/figcaption><\/figure>/s);
				if ( !matches ) {
					e.editor.insertHtml(paste);
					completeMediaEmbed();
					return false;
				}
				url = matches[1];
				thumb = url ? '<img src="'+ url +'?s=640x640" />' : '';

				html +=
					'<div class="'+ iframe_wrapper +'_wrapper" contenteditable="false">' +
						'<div class="'+ iframe_wrapper +'">' +
							thumb +
							'<video src="'+ url +'" controls="controls" controlsList="nodownload"></video>' +
						'</div>' +
					'</div>' +
					'<p>&nbsp;</p>';
				e.editor.insertHtml(html);
				completeMediaEmbed();
			}).fail(function() {
				e.editor.insertHtml(paste);
				completeMediaEmbed();
			});
		}
	}

	function setKakao(e, paste, url, type, id) {
		$.getJSON(cors + 'https://tv.kakao.com/oembed?url=' + url, {format: 'json'}, function(data) {
			if ( !data ) {
				e.editor.insertHtml(paste);
				completeMediaEmbed();
				return false;
			}
			thumb = data.thumbnail_url ? '<img src="'+ data.thumbnail_url +'" />' : '';
			html +=
				'<div class="'+ iframe_wrapper +'_wrapper" contenteditable="false">' +
					'<div class="'+ iframe_wrapper +'">' +
						thumb +
						'<iframe src="https://tv.kakao.com/embed/player/'+ type +'/'+ id +'?service=kakao_tv&amp;section=channel&amp;profile=HIGH&amp;wmode=transparent" allow="autoplay; fullscreen; encrypted-media"></iframe>' +
					'</div>' +
				'</div>' +
				'<p>&nbsp;</p>';
			e.editor.insertHtml(html);
			completeMediaEmbed();
		}).fail(function() {
			e.editor.insertHtml(paste);
			completeMediaEmbed();
		});
	}

	function setNaverTV(e, matches, paste) {
		id = matches[2];
		type = (matches[1] === 'l') ? 'l' : 'embed';
		url = (matches[1] === 'l') ? 'https://tv.naver.com/'+ type +'/'+ id +'/sharePlayer' : 'https://tv.naver.com/'+ type +'/'+ id +'';

		$.getJSON(cors + 'https://tv.naver.com/oembed?url=' + matches[0], {format: 'json'}, function(data) {
			if ( data ) {
				thumb = data.thumbnail_url ? '<img src="'+ data.thumbnail_url +'" />' : '';
				html +=
					'<div class="'+ iframe_wrapper +'_wrapper" contenteditable="false">' +
						'<div class="'+ iframe_wrapper +'">' +
							thumb +
							'<iframe src="'+ url +'" frameborder="no" scrolling="no" allowfullscreen></iframe>' +
						'</div>' +
					'</div>' +
					'<p>&nbsp;</p>';
				e.editor.insertHtml(html);
				completeMediaEmbed();
			} else {
				e.editor.insertHtml(paste);
				completeMediaEmbed();
			}
		}).fail(function() {
			e.editor.insertHtml(paste);
			completeMediaEmbed();
		});
	}

	function setNaverVOD(e, matches, paste) {
		url = matches[0].replace(/\&amp\;/g, '&');
		type = matches[1];
		list = matches[2];
		name = matches[3];
		id = matches[4];
		if ( type === 'news' ) {
			url = 'https://n.news.naver.com/article/' + name + '/' + id;
		} else if ( type === 'sports' && !name ) {
			url = url.replace('https://m.', 'https://');
		}

		if ( list === 'game' ) {
			url = 'https://m.sports.naver.com/game/popupPlayer/' + name;
			$.getJSON(cors + 'https://api-gw.sports.naver.com/schedule/' + name + '/lives').done(function(data) {
				if ( !data || !data.result ) {
					e.editor.insertHtml(paste);
					completeMediaEmbed();
					return false;
				}
				thumb = data.result.lives ? '<img src="'+ data.result.lives[0].liveThumbnailCloud +'" />' : '';

				html +=
					'<div class="'+ iframe_wrapper +'_wrapper" contenteditable="false">' +
						'<div class="'+ iframe_wrapper +'">' +
							thumb +
							'<iframe src="'+ url +'" frameborder="no" scrolling="no" allowfullscreen></iframe>' +
						'</div>' +
					'</div>' +
					'<p>&nbsp;</p>';
				e.editor.insertHtml(html);
				completeMediaEmbed();
			}).fail(function() {
				e.editor.insertHtml(paste);
				completeMediaEmbed();
			});
		} else if ( list === 'movie' ) {
			queries = window.XE.URI(url.replace(/amp\;/g, '')).search(true);
			url = 'https://movie.naver.com/movie/bi/mi/videoListJson.naver?movieCode=' + queries.code + '&size=8&offset=0';
			$.getJSON(cors + encodeURIComponent(url)).done(function(data) {
				if ( !data ) {
					e.editor.insertHtml(paste);
					completeMediaEmbed();
					return false;
				}
				$.each(data.videoList, function(i, v) {
					if ( v.multimediaId == queries.mid ) {
						thumb = v.image ? '<img src="https://ssl.pstatic.net/imgmovie' + v.image + '" />' : '';
						id = v.tvcastCode;
						url = 'https://tv.naver.com/embed/' + id;

						html +=
							'<div class="'+ iframe_wrapper +'_wrapper" contenteditable="false">' +
								'<div class="'+ iframe_wrapper +'">' +
									thumb +
									'<iframe src="'+ url +'" frameborder="no" scrolling="no" allowfullscreen></iframe>' +
								'</div>' +
							'</div>' +
							'<p>&nbsp;</p>';
						e.editor.insertHtml(html);
						completeMediaEmbed();
						return false;
					}
				});
			}).fail(function() {
				e.editor.insertHtml(paste);
				completeMediaEmbed();
			});
		} else {
			$.get(cors + encodeURIComponent(url)).done(function(data) {
				if ( !data ) {
					e.editor.insertHtml(paste);
					completeMediaEmbed();
					return false;
				}

				if ( type === 'n.news' || type === 'news' ) {
					matches = data.match(/<div\sclass="_VOD_PLAYER_WRAP"([^<]+)<\/div>/);
					if ( !matches ) {
						e.editor.insertHtml(paste);
						completeMediaEmbed();
						return false;
					}
					hash = matches[1];
					queries = {};
					$.map($.trim(hash).split('\n'), function(v, i) {
						list = $.trim(v).split('=');
						queries[list[0].replace('data-', '').replace(/\-/g, '_')] = list[1].replace(/[">]/g, '');
					});
					thumb = queries.cover_image_url ? '<img src="'+ queries.cover_image_url +'" />' : '';

					url = 'https://apis.naver.com/rmcnmv/rmcnmv/vod/play/v2.0/' + queries.video_id + '?key=' + queries.inkey;
					$.getJSON(cors + url).done(function(data) {
						if ( !data || !data.meta ) {
							e.editor.insertHtml(paste);
							completeMediaEmbed();
							return false;
						}
						id = data.meta.contentId;
						url = 'https://tv.naver.com/embed/' + id;

						html +=
							'<div class="'+ iframe_wrapper +'_wrapper" contenteditable="false">' +
								'<div class="'+ iframe_wrapper +'">' +
									thumb +
									'<iframe src="'+ url +'" frameborder="no" scrolling="no" allowfullscreen></iframe>' +
								'</div>' +
							'</div>' +
							'<p>&nbsp;</p>';
						e.editor.insertHtml(html);
						completeMediaEmbed();
					}).fail(function() {
						e.editor.insertHtml(paste);
						completeMediaEmbed();
					});
				} else if ( type === 'media' && id === 'live' ) {
					matches = data.match(/data-cid(?:\s)?=(?:\s)?['"](\d+)['"]/);
					if ( !matches ) {
						e.editor.insertHtml(paste);
						completeMediaEmbed();
						return false;
					}
					id = matches[1];
					url = 'https://tv.naver.com/l/' + id;

					matches = url.match(naverRegExp);
					if ( !matches ) {
						e.editor.insertHtml(paste);
						completeMediaEmbed();
						return false;
					}
					setNaverTV(e, matches);
				} else if ( type === 'sports.news' || type === 'sports' ) {
					matches = data.match(/clipNo(?:\s)?:(?:\s)?['"](\d+)['"]/);
					if ( !matches ) {
						e.editor.insertHtml(paste);
						completeMediaEmbed();
						return false;
					}
					id = matches[1];

					url = 'https://tv.naver.com/v/' + id;
					matches = url.match(naverRegExp);
					if ( !matches ) {
						e.editor.insertHtml(paste);
						completeMediaEmbed();
						return false;
					}
					setNaverTV(e, matches);
				} else {
					e.editor.insertHtml(paste);
					completeMediaEmbed();
				}
			}).fail(function() {
				e.editor.insertHtml(paste);
				completeMediaEmbed();
			});
		}
	}

	function setNaverVODShort(e, matches, paste) {
		url = matches[0];
		if ( matches[2] && matches[1] === 'nhn' ) {
			url = url.replace('.nhn', '');
		}
		url = url.replace('//m.', '//');
		$.get(cors + url, {format: 'short'}).done(function(data) {
			if ( !data ) {
				e.editor.insertHtml(paste);
				completeMediaEmbed();
				return false;
			}
			matches = data.match(naverVodRegExp);
			if ( !matches ) {
				e.editor.insertHtml(paste);
				completeMediaEmbed();
				return false;
			}
			setNaverVOD(e, matches, paste);
		}).fail(function() {
			e.editor.insertHtml(paste);
			completeMediaEmbed();
		});
	}

	function setPinterest(e, matches) {
		if ( matches[1] === 'pin' ) {
			type = 'pin';
			id = matches[2].replace(/[^0-9]/g, '');
			url = 'https://api.pinterest.com/v3/pidgets/pins/info/?pin_ids=' + id;
		} else {
			if ( matches[2] && matches[2] !== '_created' ) {
				type = 'board';
				name = matches[1];
				id = matches[2];
				url = 'https://api.pinterest.com/v3/pidgets/boards/'+ name +'/'+ id +'/pins/';
			} else if ( !matches[2] || matches[2] === '_created' ) {
				type = 'profile';
				name = matches[1];
				url = 'https://api.pinterest.com/v3/pidgets/users/'+ name +'/pins/';
			}
		}

		$.getJSON(url).done(function(data) {
			if ( data ) {
				if ( type === 'pin' ) {
					url = 'https://www.pinterest.com/pin/'+ id +'/';

					html +=
						'<div class="'+ iframe_wrapper +'_wrapper" contenteditable="false">' +
							'<div class="'+ iframe_wrapper +' pinterest-embed pinterest-pin">' +
								'<a data-pin-do="embedPin" data-pin-width="large" href="'+ url +'">' +
									'<img src="'+ data.data[0].images['564x'].url +'">' +
									'<span style="display: none;">&nbsp;</span>' +
								'</a>' +
							'</div>' +
						'</div>' +
						'<p>&nbsp;</p>';
					e.editor.insertHtml(html);
					completeMediaEmbed();
					e.editor.showNotification(omit_message, 'info', 3000);
				} else if ( type === 'board' ) {
					url = 'https://www.pinterest.com/'+ name +'/'+ id +'/';
					list = '';
					for ( var i = 0; i < 3; i++ ) {
						list += '<span><img src="'+ data.data.pins[i].images['237x'].url +'" /></span>';
					}

					html +=
						'<div class="'+ iframe_wrapper +'_wrapper" contenteditable="false">' +
							'<div class="'+ iframe_wrapper +' pinterest-embed pinterest-board">' +
								'<a data-pin-do="embedBoard" data-pin-scale-width="160" data-pin-scale-height="540" data-pin-board-width="580" href="'+ url +'">' +
									'<span>' +
										'<span>'+
											'<img src="'+ data.data.user.image_small_url +'" />' +
										'</span>' +
										'<span>' +
											'<span>'+ data.data.user.full_name +'</span>' +
											'<span>'+ data.data.board.name +'</span>' +
										'</span>' +
									'</span>' +
									'<span>' +
										'<span>' + list + '</span>' +
									'</span>' +
								'</a>' +
							'</div>' +
						'</div>' +
						'<p>&nbsp;</p>';
					e.editor.insertHtml(html);
					completeMediaEmbed();
					e.editor.showNotification(omit_message, 'info', 3000);
				} else if ( type === 'profile' ) {
					url = 'https://www.pinterest.com/'+ name +'/';
					list = '';
					for ( var i = 0; i < 3; i++ ) {
						list += '<span><img src="'+ data.data.pins[i].images['237x'].url +'" /></span>';
					}

					html +=
						'<div class="'+ iframe_wrapper +'_wrapper" contenteditable="false">' +
							'<div class="'+ iframe_wrapper +' pinterest-embed pinterest-profile">' +
								'<a data-pin-do="embedUser" data-pin-scale-width="160" data-pin-scale-height="540" data-pin-board-width="580" href="'+ url +'" style="display: block; margin: 0 auto; width: 600px; min-width: unset; max-width: 100%; overflow: hidden; border: 1px solid rgba(0, 0, 0, 0.1); border-radius: 12px; box-sizing: border-box; line-height: 0;">' +
									'<span>' +
										'<span>'+
											'<img src="'+ data.data.user.image_small_url +'" />' +
										'</span>' +
										'<span>' +
											'<span>'+ data.data.user.full_name +'</span>' +
										'</span>' +
									'</span>' +
									'<span>' +
										'<span>' + list + '</span>' +
									'</span>' +
								'</a>' +
							'</div>' +
						'</div>' +
						'<p>&nbsp;</p>';
					e.editor.insertHtml(html);
					completeMediaEmbed();
					e.editor.showNotification(omit_message, 'info', 3000);
				} else {
					e.editor.insertHtml(paste);
					completeMediaEmbed();
				}
			} else {
				e.editor.insertHtml(paste);
				completeMediaEmbed();
			}
		}).fail(function() {
			e.editor.insertHtml(paste);
			completeMediaEmbed();
		});
	}

	function setPodbbang(e, matches) {
		id = $.isNumeric(matches[4]) ? matches[4]: '0';

		$.getJSON('https://app-api6.podbbang.com/channels/'+ matches[2] +'/episodes?limit=1&episode_id=' + id).done(function(data) {
			if ( data ) {
				thumb = ( data.data[0].image !== null ) ? data.data[0].image : 'https://img.podbbang.com/img/pb_m/thumb/x200/'+ data.data[0].channel.id +'.png';
				url = 'https://share.podbbang.com/embed/audio-widget/id/'+ data.data[0].id;
				html +=
					'<div class="'+ iframe_wrapper +'_wrapper" contenteditable="false">' +
						'<div class="'+ iframe_wrapper +' podbbang-embed">' +
							'<img src="'+ thumb +'" />' +
							'<iframe src="'+ url +'" frameborder="no" scrolling="no" allowfullscreen></iframe>' +
						'</div>' +
					'</div>' +
					'<p>&nbsp;</p>';

				e.editor.insertHtml(html);
				completeMediaEmbed();
			} else {
				e.editor.insertHtml(paste);
				completeMediaEmbed();
			}
		}).fail(function() {
			e.editor.insertHtml(paste);
			completeMediaEmbed();
		});
	}

	function setQQ(e, paste, full_url) {
		$.get(cors + full_url).done(function(data) {
			matches = data.match(/var\sVIDEO_INFO\s=\s(\{.+\})\s/gm);
			thumb = '';
			if ( matches ) {
				data = matches[0].replace('var VIDEO_INFO = ', '');
				queries = JSON.parse(data);
				thumb = queries.pic_640_360 ? '<img src="'+ queries.pic_640_360.replace('http:', 'https:') +'" />' : '';
				id = queries.vid;
				url = 'https://v.qq.com/txp/iframe/player.html?vid=' + id + '&show1080p=1';
			} else {
				e.editor.insertHtml(paste);
				completeMediaEmbed();
				return false;
			}
			html +=
				'<div class="'+ iframe_wrapper +'_wrapper" contenteditable="false">' +
					'<div class="'+ iframe_wrapper +'">' +
						thumb +
						'<iframe src="'+ url +'" frameborder="no" scrolling="no" allowfullscreen="true"></iframe>' +
					'</div>' +
				'</div>' +
				'<p>&nbsp;</p>';
			e.editor.insertHtml(html);
			completeMediaEmbed();
		}).fail(function() {
			e.editor.insertHtml(paste);
			completeMediaEmbed();
		});
	}

	function setTenor(e, paste, url) {
		$.get(cors + url).done(function(data) {
			if ( !data ) {
				e.editor.insertHtml(paste);
				completeMediaEmbed();
				return false;
			}
			matches = data.match(/<script.+type="application\/ld\+json">([^<]+)<\/script>/);
			if ( !matches ) {
				e.editor.insertHtml(paste);
				completeMediaEmbed();
				return false;
			}
			data = JSON.parse($.trim(matches[1]));
			if ( !data ) {
				e.editor.insertHtml(paste);
				completeMediaEmbed();
				return false;
			}
			thumb = data.image.contentUrl ? '<img src="'+ data.image.contentUrl +'"/>' : '';
			url = data.image.embedUrl;

			html +=
				'<div class="'+ iframe_wrapper +'_wrapper" contenteditable="false">' +
					'<div class="'+ iframe_wrapper +' tenor-video-embed">' +
						thumb +
						'<iframe src="'+ url +'" frameborder="0" allowtransparency="true" allowfullscreen="true" scrolling="no"></iframe>' +
					'</div>' +
				'</div>' +
				'<p>&nbsp;</p>';

			e.editor.insertHtml(html);
			completeMediaEmbed();
		}).fail(function() {
			e.editor.insertHtml(paste);
			completeMediaEmbed();
		});
	}

	function setTiktok(e, matches, paste) {
		id = matches[1];
		params = {
			url: 'https://www.tiktok.com/video/' + id
		};

		$.getJSON('https://www.tiktok.com/oembed', params).done(function(data) {
			if ( !data ) {
				e.editor.insertHtml(paste);
				completeMediaEmbed();
				return false;
			}
			thumb = data.thumbnail_url ? '<img src="'+ data.thumbnail_url +'" />' : '';

			html +=
				'<div class="'+ iframe_wrapper +'_wrapper" contenteditable="false">' +
					'<div class="'+ iframe_wrapper +' tiktok-embed">' +
						thumb +
						'<iframe src="https://www.tiktok.com/embed/v2/'+ id +'?lang=ko-KR" name="__tt_embed__v'+ id +'" frameborder="0" scrolling="no"></iframe>' +
					'</div>' +
				'</div>' +
				'<p>&nbsp;</p>';
			e.editor.insertHtml(html);
			completeMediaEmbed();
		}).fail(function() {
			e.editor.insertHtml(paste);
			completeMediaEmbed();
		});
	}

	function setTVSohu(e, paste, url) {
		$.get(cors + url).done(function(data) {
			if ( !data ) {
				e.editor.insertHtml(paste);
				completeMediaEmbed();
				return false;
			}
			matches = data.match(/var\s(vid|cover)(?:\s)?=(?:\s)?['|"]([^'"]+)['|"]/g);
			if ( !matches ) {
				e.editor.insertHtml(paste);
				completeMediaEmbed();
				return false;
			}

			queries = {};
			$.map(matches, function(v, i) {
				list = v.match(/var\s(vid|cover)(?:\s)?=(?:\s)?['|"]([^'"]+)['|"]/);
				queries[list[1]] = list[2].replace('http://', 'https://').replace('vrsab_hor', 'vrsa_hor');
			});

			matches = data.match(findOGUrl);
			matches = matches[1].match(tvSohuRegExp);
			if ( matches[4].match(/^[0-9]+$/) !== null ) {
				type = 'bid';
			} else {
				type = 'vid';
			}

			thumb = queries.cover ? '<img src="'+ queries.cover +'" />' : '';
			url = 'https://tv.sohu.com/s/sohuplayer/iplay.html?'+ type +'=' + queries.vid;

			html +=
				'<div class="'+ iframe_wrapper +'_wrapper" contenteditable="false">' +
					'<div class="'+ iframe_wrapper +'">' +
						thumb +
						'<iframe src="'+ url +'" frameborder="0" scrolling="no" allowtransparency="true" allowfullscreen="true"></iframe>' +
					'</div>' +
				'</div>' +
				'<p>&nbsp;</p>';
			e.editor.insertHtml(html);
			completeMediaEmbed();
		}).fail(function() {
			e.editor.insertHtml(paste);
			completeMediaEmbed();
		});
	}

});