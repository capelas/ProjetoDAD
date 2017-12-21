<template>
   <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>face</th>
                <th>active</th>
                <th>Action</th>
                
            </tr>
        </thead>
        <tbody>

            <tr v-for="imag in image">
                <td>{{ imag.id }}</td>
                <td>{{ imag.face }}</td>
                <td>{{ imag.active}}</td>
                <th><img v-bind:src="ImageURL(imag.path)" ></th>
                <td><a class="btn btn-xs btn-primary" v-on:click.prevent="editImage(imag)">Edit</a>
                    <a class="btn btn-xs btn-danger" v-on:click.prevent="deleteImage(imag)">Delete</a></td>
            </tr>
        </tbody>
    </table>
</template>

<script type="text/javascript">
    // Component code (not registered)
    // 
    module.exports={
        props: ['image'],
        data: function(){
            return { 

                
            }
        },
        methods: {
            ImageURL: function (imag) {
                var imgSrc = String(imag);
                return 'img/' + imgSrc ;
            },
            editImage: function(Image){
                this.editingImage = image;
                this.$emit('edit-click', image);
            },      
            deleteImage: function(image){

                this.editingImage = null;
                this.$emit('delete-click', image);
                
            }
           
        },
          mounted() {
            //console.log(this.image);
            
        }
    }
</script>

<style scoped>
    tr.activerow {
        background: #123456  !important;
        color: #fff          !important;
}

</style>


