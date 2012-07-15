@layout('templates.default')
@section('content')
<?php $rank = 0; ?>

		<table class="table table-striped">
			<thead>
				<tr>
					<th>Rank</th>
					<th>Name</th>
					<th>IP</th>
					<th>Votes</th>
					<th>Status</th>
				</tr>
			</thead>
			<tbody>
				@foreach($data as $server)
					<tr>
						<?php
						if($server->port == null)
						{
							$port = 25565;
						} else {
							$port = $server->port;
						}
						?>
						<?php $rank++;?>
						<td><?php echo $rank; ?></td>
						<td>{{HTML::link('/servers/'.$server->id, $server->name)}}</td>
						<td>{{$server->ip}}</td>
						<td>{{$server->votes}}</td>
						<td>
						<?php $s = new MCServerStatus($server->ip, $port); ?>
						@if($s->online)
							<?php echo '<font color="green">Online</font>'; ?>
						@else
							<?php echo '<font color="red">Offline</font>'; ?>
						@endif
						</td>
				@endforeach
					</tr>
			</tbody>
		</table>
@endsection