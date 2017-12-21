@extends('master')

@section('title', 'Jogo Da Memória')

@section('content')
	
    <router-link to="/users">Users </router-link> - 
	<router-link to="/singlememorygame"> Game </router-link> -
    <router-link to="/image"> Image </router-link>
	
    <router-view></router-view>

@endsection

@section('pagescript')
<script src="js/app.js"></script>

{{-- <script src="/js/manifest.js"></script>
<script src="/js/vendor.js"></script>
<script src="/js/vueapp.js"></script> --}}

@stop 