<template>
	<div class="gameseparator">
		<div>
			<h2 class="text-center">Hello</h2>
			<br>
		</div>
		<div class="game-zone-content">       
			<div class="board">
				<div >
					<img >
				</div>
			</div>
			<hr>
		</div>  
	</div>
</template>

<script type="text/javascript">
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