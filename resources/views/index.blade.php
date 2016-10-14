@extends('layout')

@section('content')

	<div class="card flush">
		<div class="head">
			<h1>Large Collection</h1>
			<div class="controls">
				<form action="/cp/addons/largecollection/results" method="post">
				<input type="text" name="query" placeholder="Search">
				{{ csrf_field() }}
				<div class="btn-group">
					<button class="btn btn-primary">Search</button>
				</div>
				</form>
			</div>
		</div>
	</div>

	<p>
		Instructions: Search or browse to the article you wish to edit. It will open in a new tab/window.
				Edit then use [ctrl-s] on a PC or [cmd-s] on a Mac to save. You can then close that tab/window.

	</p>




	<table>
		<tr>
			<th>Title</th>
			<th>Date</th>
		</tr>

        @foreach ($articles as $article)
            <tr>
                <td><a href="/cp/collections/entries/article/{{ $article->slug() }}" target="_blank">{{ $article->get('title') }}</a></td><td>{{ $article->date() }}</td>
            </tr>
	    @endforeach

	</table>
    
    {!! $articles->render() !!}

@endsection
