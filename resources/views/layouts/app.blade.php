<!DOCTYPE html>

{{--for original code you have to install fresh jetStream or look in older commits e.g. 3b4a5ca69bd154c3a468bffed96aa1aa04f22f9b of this repo
--}}
<html lang="de">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('tth-logo.png')}}">

	
	<link rel="stylesheet" href="{{asset('vendor/jquery.auto-complete.css')}}">
	<link rel="stylesheet" href="{{asset('global.css')}}?v=1.3.02">

	{{-- does this inline the styles?? --}}
    {{-- {{ HTML::script('js/bootstrap.js') }} --}}

    <title>TTH</title>
  </head>

  <body>
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<a class="navbar-brand" href="/"><img class="logo-graphics" src="{{asset('tth-logo.png')}}" alt="Logo mit übereinanderliegenden Buchstaben TTH, in Braun und Schwarz" width="55" height="55" >@{{ __(ProjectTitel) }}</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		    	<span class="navbar-toggler-icon"></span>
  			</button>

		  <div class="collapse navbar-collapse" id="navbarSupportedContent">

			<ul class="navbar-nav ml-auto">
				<li class="nav-item">
					<a class="nav-link" href="/">Filter</a>
				</li>
			</ul>

			{{-- need route for details aricle here! --}}
			{{-- <form name="searchForm" class="form-inline my-2 my-lg-0" action="<?=rex_getUrl($detailsArticleId)?>" method="get"> --}}
			<form name="searchForm" class="form-inline my-2 my-lg-0" action="/" method="get">
			<input id="wordlistsearch" class="form-control mr-sm-2" name="wordlistsearch" type="search" placeholder="Wort(teil)" aria-label="Wort">
			<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Suchen</button>
			</form>
		</div>
	</nav>

	<div class="header-login">
		{{-- echo login state here --}}
	</div>

	<div class="container main-container">

		{{-- !!! start page only --}}
		<div class="project-logo">
				<img class="logo-graphics" src="{{asset('tth-logo.png')}}" >
				<span class="project-title">@{{ProjektTitel}}</span>
		</div>

		{{-- !!! page title --}}
		<h1>Thesaurus</h1>

		{{-- !!! blog logic ideas see tth-rex --}}

		{{ $slot }}

		{{-- more blog logic --}}
		
		<a id="comment-success"></a>
    </div>

	<footer class="footer">
      <div class="container">
        <span class="footer-item text-muted"> 
		{{-- !!! how handle project global vars?? --}}
		<a href="mailto:email@thesaurus-traditioneller-holzbau.net">email@thesaurus-traditioneller-holzbau.net</a></span>
        <span class="footer-item text-muted"><a href="/">Impressum</a></span>
      </div>
    </footer>

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
	
	<script src="{{asset('vendor/jquery.auto-complete.min.js')}}"></script>
	<script>
		$(document).ready(function() {
			$('#wordlistsearch').autoComplete({
				minChars: 1,
				delay : 100,
				source: function(term, suggest){
					term = term.toLowerCase();
					// !!! this violates default data flow, but problems passing array to this layout
					//     it is matter of formatting the output of $entityStrings 
					var choices = [{!! \App\Http\Controllers\EntitiesController::getAllNamesAsJavaScript() !!}];
					var matches = [];
					for (i=0; i<choices.length; i++)
						if (~choices[i].toLowerCase().indexOf(term)) matches.push(choices[i]);
					suggest(matches);
				},
				onSelect: function(event) {
					// !!! check if compat issues, then use document.getElementById('searchForm').submit();
					document.searchForm.submit();
				}
			});

			$('.description-link')
				.removeClass('initially-hidden')
				.click(function() {
					$('.description-card').show();
					$('.description-link-2').hide(); // don't want to hide all of them
					// return false;
				});

			$('.description-card').hide();
		});
	</script>
  </body>
</html>