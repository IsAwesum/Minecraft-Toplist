<html>
	<head>
		<title>Add Server</title>
		<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
		<script type="text/javascript" src="http://toplist/js/markitup/jquery.markitup.js"></script>
		<script type="text/javascript" src="http://toplist/js/markitup/sets/markdown/set.js"></script>
		<link rel="stylesheet" type="text/css" href="http://toplist/js/markitup/skins/markitup/style.css" />
		<link rel="stylesheet" type="text/css" href="http://toplist/js/markitup/sets/markdown/style.css" />
	</head>
	<body>
	<script type="text/javascript">
	$(document).ready(function()	{
		// Add markItUp! to your textarea in one line
		// $('textarea').markItUp( { Settings }, { OptionalExtraSettings } );
		$('#markItUp').markItUp(mySettings);
		
		// You can add content from anywhere in your page
		// $.markItUp( { Settings } );	
		$('.add').click(function() {
	 		$.markItUp( { 	openWith:'<opening tag>',
							closeWith:'<\/closing tag>',
							placeHolder:"New content"
						}
					);
	 		return false;
		});
		
		// And you can add/remove markItUp! whenever you want
		// $(textarea).markItUpRemove();
		$('.toggle').click(function() {
			if ($("#markItUp.markItUpEditor").length === 1) {
	 			$("#markItUp").markItUpRemove();
				$("span", this).text("get markItUp! back");
			} else {
				$('#markItUp').markItUp(mySettings);
				$("span", this).text("remove markItUp!");
			}
	 		return false;
		});
	});
	</script>
	{{Form::open('user/add', 'POST')}}
	<p>{{ Form::label('title_label', 'Name')}}
	{{ Form::text('name')}}</p>
	<p>{{ Form::label('ip_label', 'IP')}}
	{{Form::text('ip')}}</p>
	<p>{{ Form::label('port_label', 'Port')}}
	{{Form::text('port')}}</p>	
	<p>{{Form::label('body_label', 'Body')}}
	<textarea name="body" id="markItUp" cols="80" rows="20"></textarea></p>
	{{Form::submit('Submit')}}
	{{ Form::close()}}
	<?php if ($errors->has()): ?>
	    <div id="error"><?php echo implode('', $errors->all()); ?></div>
	<?php endif; ?>
	{{Form::close()}}
</body>
</html>