@layout('templates.default')
@section('content')
<p>Hi {{Auth::user()->name}}</p>
<p>Your userid is {{Auth::user()->id}}</p>
<p>You are a {{Group::groupIdToName(Auth::user()->group)}}</p>
@endsection