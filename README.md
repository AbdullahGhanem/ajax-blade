# Easy AJAX with blade

## Installation

First, pull in the package through Composer.

```js
"require": {
    "ghanem/ajaxblade": "~1"
}
```
or use.

```bash
composer require ghanem/ajaxblade
```

if using Laravel 5, include the service provider within `config/app.php`.

```php
'providers' => [
    'Ghanem\Ajaxblade\AjaxbladeServiceProvider'
];
```

now run this comand:

```bash
php artisan vendor:publish
```

## Example
Within your controllers, before you perform a redirect...

```php
public function show()
{
    $articles = Article::orderBy('id', 'DESC')->Paginate(20);

    return view('home',compact('articles'));
}
```

this is home view :
```html
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
	<script src="//code.jquery.com/jquery.js"></script>
	<script src="{{ public_path('vendor/ajaxblade/ajaxblade.js') }}"></script>
</head>
<body>

<div class="container">
	
	
	<div class="abs">
		@foreach ($users as user)
			<div> $user->name </div>
		@endforeach
		@ajaxblade($users)
	</div>

</div>

</body>
</html>
```
