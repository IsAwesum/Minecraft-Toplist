@layout('templates.default')
@section('content')
<?php
if($data->port == null)
{
	$port = 25565;
} else {
	$port = $data->port;
}
?>
	<div class="container-fluid">
		<div class="row-fluid">
			<div class="span4">
			<p>IP: {{$data->ip}}</p>
			<p>Status:
			<?php $server = new MCServerStatus($data->ip, $port); ?>
			@if($server->online)
				<?php echo '<font color="green">Online</font>'; ?>
			@else
				<?php echo '<font color="red">Offline</font>'; ?>
			@endif
			</p>
			<p>Online Players: {{$server->online_players}}</p>
			
			</div>
			<div class="span8">
				<?php
				$m = new Markdown();
				?>
				{{$m->transform($data->body)}}
			</div>
		</div>
	</div>
@endsection