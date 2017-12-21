<template>
	<div>
        <div>
            <h3 class="text-center">{{ title }}</h3>
            <br>
            <h2>Current Player : {{ currentPlayer }}</h2>
            <br>
        </div>
        <div class="game-zone-content">       
            <div class="alert alert-success" v-if="showSuccess">
                <button type="button" class="close-btn" v-on:click="showSuccess=false">&times;</button>
                <strong>{{ successMessage }} &nbsp;&nbsp;&nbsp;&nbsp;<a v-show="gameEnded" v-on:click.prevent="restartGame">Restart</a></strong>
            </div>

            <div class="board">
                <div v-for="img in images">
                    <img v-bind:src="pieceImageURL()" v-on:click="clickPiece(key)">
                </div>
            </div>
            <hr>
        </div>  
    </div>			
</template>

<script type="text/javascript">
export default { 
    data: function () {
        return{
            title: 'Memory Game',
            showSuccess: false,
            showFailure: false,
            successMessage: '',
            failMessage: '',
            gameEnded:false,
            showSplash: false,
            started: false,
            startTime: 0,
            turns: 0,
            flipBackTimer: null,
            score: 0,
            board:[],
            images: [],
            currentValue: 1
        }
    },
    methods: {
        pieceImageURL: function () {

        },
        shuffleImages: function (images) {
            var currentIndex = array.length, temporaryValue, randomIndex;
            
              // While there remain elements to shuffle...
              while (0 !== currentIndex) {

                // Pick a remaining element...
                randomIndex = Math.floor(Math.random() * currentIndex);
                currentIndex -= 1;

                // And swap it with the current element.
                temporaryValue = array[currentIndex];
                array[currentIndex] = array[randomIndex];
                array[randomIndex] = temporaryValue;
            }
            
            return array;  
        },
        clickPiece: function(index) {
            if(this.board[index] || this.gameEnded) return;
            this.board[index] = this.currentValue;
            this.successMessage = this.currentPlayer+' has Played';
            this.showSuccess = true;
            this.currentValue = (this.currentValue == 1)? 2 : 1;
            this.checkGameEnded();
        },
        restartGame:function(){
            console.log('restartGame');
            this.board= [0,0,0,0,0,0,0,0,0];
            this.showSuccess= false;
            this.showFailure= false;
            this.successMessage= '';
            this.failMessage= '';
            this.currentValue= 1;
            this.gameEnded= false;
        },
        playerName: function(playerNumber){
            if(this.player1User != undefined && playerNumber == 1){
                return this.player1User.name;                
            }
            if(this.player2User != undefined && playerNumber == 2){
                return this.player2User.name;
            }
            if (this.player3User != undefined && playerNumber == 3) {
                return this.player3User.name;
            }
            if (this.player4User != undefined && playerNumber == 4) {
                return this.player4User.name;
            }
            return 'Player '+playerNumber;
        },
        // ----------------------------------------------------------------------------------------
        // GAME LOGIC - START
        // --------------------------------------------------------------------------------------- 
        checkGameEnded: function () {
            if (this.player1User.pairs>this.player2User && player1User.pairs>this.player3User.pairs && this.player1User>player4User.pairs) {
                this.successMessage = this.playerName(1)+' won the Game';
                this.showSuccess = true;
                this.gameEnded = true;
            }
            if (this.player2User.pairs>this.player1User && player2User.pairs>this.player3User.pairs && this.player2User>player4User.pairs) {
                this.successMessage = this.playerName(2)+' won the Game';
                this.showSuccess = true;
                this.gameEnded = true;
            }
            if (this.player3User.pairs>this.player1User && player3User.pairs>this.player2User.pairs && this.player3User>player4User.pairs) {
                this.successMessage = this.playerName(3)+' won the Game';
                this.showSuccess = true;
                this.gameEnded = true;
            }
            if (this.player4User.pairs>this.player1User && player4User.pairs>this.player2User.pairs && this.player4User>player3User.pairs) {
                this.successMessage = this.playerName(4)+' won the Game';
                this.showSuccess = true;
                this.gameEnded = true;
            }
            if (this.isBoardComplete()) {
                this.successMessage = 'The Game ended in a Tie';
                this.showSuccess = true;
                this.gameEnded = true;
            } 
            return false;  
        },
        isBoardComplete:function () {
            var returnValue = true;
            this.board.forEach(function (element) {
                if (element === 0) {
                    returnValue = false;
                    return;
                }
            });
            return returnValue;
        }
    },
    computed:{
        currentPlayer: function () {
            return this.playerName(this.currentValue);
        }
    },
    mounted(){
        if (this.$root.$data.player1) {
            this.player1User = this.$root.$data.player1;
        }
        if (this.$root.$data.player2) {
            this.player2User = this.$root.$data.player2;
        }
        if (this.$root.$data.player3) {
            this.player3User = this.$root.$data.player3;
        }
        if (this.$root.$data.player4) {
            this.player4 = this.$root.$data.player4;
        }
        axios.get('api/image')
        .then(response=>{
            console.log(response.data.data);
            this.images = response.data.data;
        })
    }
}
</script>