<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<h2>Password Reset</h2>

		<div>
            To reset your password, complete this form: 
            <br/>
            <a href="{{ URL::to('/password/reset/') }}?email={{$email}}&resetPasswordCode={{$resetPasswordCode}}">
                {{ URL::to('/password/reset/') }}?email={{$email}}&resetPasswordCode={{$resetPasswordCode}}
            </a> 
            <br/>
			This link will expire in {{ Config::get('auth.reminder.expire', 60) }} minutes.
		</div>
	</body>
</html>
