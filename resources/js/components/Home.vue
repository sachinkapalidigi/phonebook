<template>
<div>
    <div class="card mb-2">
        <div class="card-header">
        Vue js Phone Book
        <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#exampleModal">Add New</button>
         <span class="float-right" v-if="loading">
	    	<i class="fa fa-refresh fa-spin fa-2x fa-fw"></i>
	    </span>
        </div>
        <div class="card-body">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" v-model="searchQuery" aria-label="Search">
            
            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
            <ul class="list-group list-group-flush mb-2" v-for="item,key in temp">
            <li class="list-group-item" >{{item.name}}
                <span><i class="fas fa-trash-alt float-right text-danger ml-3" @click="deleteContact(key,item.id)"></i></span>
                <span><i class="far fa-edit float-right text-info ml-3" @click="editContact(key)" data-toggle="modal" data-target="#updateModal"></i></span>     
                <span><i class="far fa-eye text-primary float-right" @click="showContact(key)" data-toggle="modal" data-target="#showModal"></i></span>   
            </li>
            
            
        </ul>
            <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
    </div>
    <add></add> 
    <show></show>
    <edit></edit>
</div> 
</template>

<script>
let add = require('./Add.vue');
let show = require('./Show.vue');
let edit = require('./Update.vue');
export default {
    data(){
        return {
            lists:{

            },
            errors:{

            },
            loading:false,
            searchQuery:'',
            temp:''
        }
    },
    watch:{
        searchQuery(){
            
            if(this.searchQuery.length > 0){
                this.temp = this.lists.filter((item)=>{
                    return item.name.toLowerCase().indexOf(this.searchQuery.toLowerCase())>-1
                })

            }else {
                this.temp = this.lists;
            }
        }
    },
    components: {add,show,edit},
    mounted(){
        axios.post('/getData')
                .then((response)=>this.lists = this.temp =response.data)                
                .catch((err)=>this.errors = err.response.data.errors);
    },
    methods:{
        showContact(key){

            this.$children[1].list = this.temp[key];
        },
        editContact(key){
            this.$children[2].list = this.temp[key];
        },
        deleteContact(key,id){
            console.log(key);
            if(confirm('Are you sure?')){
                this.loading = !this.loading;
                axios.delete(`/phonebook/${id}`)
                .then((response)=>{this.lists.splice(key,1);
                this.loading = !this.loading;})                
                .catch((err)=>this.errors = err.response.data.errors);
            }
            
        }
    }
}
</script>
