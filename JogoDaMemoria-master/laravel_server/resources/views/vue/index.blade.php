@extends('master')

@section('title', 'Jogo Da Memória')

@section('content')
	
	<router-link to="/game">Game</router-link>
	<router-view></router-view>
@endsection

@section('pagescript')
<script src="js/app.js"></script>

<!-- <script src="/js/manifest.js"></script>
<script src="/js/vendor.js"></script>
<script src="/js/vueapp.js"></script>
-->
@stop 