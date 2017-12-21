<template>
	<div>
		<div class="jumbotron">
			<h1>{{ title }}</h1>
		</div>

		<image-list :image="image" @edit-click="editImage" @delete-click="deleteImage" @message="childMessage" ref="imageListRef"></image-list>

		<div class="alert alert-success" v-if="showSuccess">

			<button type="button" class="close-btn" v-on:click="showSuccess=false">&times;</button>
			<strong>{{ successMessage }}</strong>
		</div>
		<image-edit :image="currentImage"  @imaged-saved="savedImage" @image-canceled="cancelEdit" v-if="currentImage"></image-edit>	

		
	</div>


</template>

<script type="text/javascript">
import imageList from './imageList.vue';
import imageEdit from './imageEdit.vue';

export default {
	data: function(){
		return { 
			title: 'List Images',
			showSuccess: false,
			successMessage: '',
			currentImage: null,
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
		editImage: function(image){
			this.currentImage = image;
			this.showSuccess = false;
		},
		deleteImage: function(image){

			axios.delete('api/image/'+image.id)
			.then(response => {

				this.showSuccess = true;
				this.successMessage = 'Image Deleted';
				this.getAllimage();
			});
		},
		savedImage: function(){
			this.currentImage = null;
			this.$refs.imageListRef.editingImage = null;
			this.showSuccess = true;
			this.successMessage = 'Image Saved';
		},
		cancelEdit: function(){
			this.currentImage = null;
			this.$refs.imageListRef.editingImage = null;
			this.showSuccess = false;
		},
		childMessage: function(message){
			this.showSuccess = true;
			this.successMessage = message;
		}


	},
	components: {
		'image-list': imageList,
		'image-edit': imageEdit

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