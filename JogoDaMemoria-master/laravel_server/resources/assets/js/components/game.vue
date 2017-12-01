<template>
	<div class="gameseparator">
		<div>
			<h2 class="text-center">{{game.gameID}}</h2>
			<br>
		</div>
		<div class="game-zone-content">       
			<div class="board">
				<div v-for="(piece,key) of game.board">
					<img v-bind:src="pieceImageURL(piece)">
				</div>
			</div>
			<hr>
		</div>  
	</div>
</template>

<script type="text/javascript">
	console.log(Hello);
	export default{
		props: ['game'],
		data: function () {
			return{

			}
		},
		methods:{
			pieceImageURL: function (piece) {
				var imgSrc = String(piece);
				return 'img/'+imgSrc+'.png';
			}
		}
	}
</script>