<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<ul>
@foreach($new_articles as $article)
  <li>
	[<a href="{{ $article['cat_url'] }}">{{ $article['cat_name'] }}</a>] <a href="{{ $article['url'] }}" title="{{ $article['title'] }}">{{ \Illuminate\Support\Str::limit($article['short_title'], 10, '...":true') }}</a>
	</li>
@endforeach
</ul>