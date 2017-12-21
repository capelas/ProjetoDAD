<template>
	<div>
		<div class="jumbotron">
			<h1>{{ title }}</h1>
		</div>
  
		<image-list :image="image" ref="imageListRef"></image-list>

		
	</div>
		
						
</template>

<script type="text/javascript">
	import imageList from './imageList.vue';
	
	
	export default {
		data: function(){
			return { 
		        title: 'List Images',
		        showSuccess: false,
		        successMessage: '',
		        currentUser: null,
		        image: []
			}
		},
	    methods: {
	    	getAllimage: function(){
	            axios.get('api/image')
                    .then(response=>{
                    this.image = response.data.data;
                    });
			},
	        
			
	    },
	    components: {
	    	'image-list': imageList,

	    	
	    },
	    mounted() {
	    	this.getAllimage();
		}

	
}
</script>

<style scoped>	
p {
	font-size: 2em;
	text-align: center;
}
</style>