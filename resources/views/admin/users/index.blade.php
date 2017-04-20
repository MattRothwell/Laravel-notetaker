
<a href="/create" class="btn btn-default-sm">
    <i class="fa fa-search">Search</i></a>
@foreach($users as $user)
	$profile = $user['username'];
	<li>{!! $profile !!}</li>
@endforeach