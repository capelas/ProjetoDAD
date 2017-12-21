<template>
    <div class="jumbotron">
        <h2>Edit Image</h2>
        <div class="form-group">

            <div>
                <h3> Editar Peça com o id:{{ image.id}}</h3>
                <th><img v-bind:src="ImageURL(image.path)" ></th>
            </div>
            <div class="form-group">
                <label for="inputFace">Face</label>
                <select class="form-control" id="inputFace" name="face" v-model="image.face" >
                    <option value="tile">Tile</option>
                    <option value="hidden"> Hidden </option>
                </select>
            </div>
            <div class="form-group">
                <label for="inputActive">Active</label>
                <select class="form-control" id="inputActive" name="active" v-model="image.active">
                    <option v-bind:value="1"> Active</option>
                    <option v-bind:value="0">Not active </option>
                </select>
            </div>



        </div>



        <div class="form-group">
            <a class="btn btn-default" v-on:click.prevent="saveUser()">Save</a>
            <a class="btn btn-default" v-on:click.prevent="cancelEdit()">Cancel</a>
        </div>
    </div>
</template>

<script type="text/javascript">
module.exports={
    props: ['image'],
    methods: {
        saveUser: function(){
            console.log(this.image.id);
            axios.put('api/image/'+this.image.id, this.image)
            .then(response=>{
                        // Copy object properties from response.data.data to this.user
                        // without creating a new reference
                        // 
                        Object.assign(this.image, response.data.data);
                        this.$emit('image-saved', this.image)
                    });
        },
        cancelEdit: function(){
            axios.get('api/image/'+this.image.id)
            .then(response=>{
                        // Copy object properties from response.data.data to this.image
                        // without creating a new reference
                        Object.assign(this.image, response.data.data);
                        this.$emit('image-canceled', this.image);
                    });
        },
        ImageURL: function (imag) {
            var imgSrc = String(imag);
            return 'img/' + imgSrc ;
        },
    },
    mounted() {

    }
}
</script>

<style scoped>  

</style>