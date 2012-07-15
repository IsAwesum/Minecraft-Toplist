@layout('templates.default')
@section('content')
{{ Form::open("user/login") }}
@if (Session::has('login_errors'))
    <span class="error">Username or password incorrect.</span>
@endif
<p>{{ Form::label('username', 'Username') }}</p>
<p>{{ Form::text('username') }}</p>
<p>{{ Form::label('password', 'Password') }}</p>
<p>{{ Form::password('password') }}</p>
<p>{{ Form::submit('Login') }}</p>
{{Form::close()}}
@endsection