<template>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Contact</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
            <div class="form-group">
                <label for="name">Name</label>
                <input :class="{'is-invalid':errors.name}" v-model="list.name" type="text" class="form-control" id="name" aria-describedby="namelHelp" placeholder="Enter name">
                <small class="text-danger" v-if="errors.name">{{errors.name[0]}}</small>
            </div>
            
            
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input :class="{'is-invalid':errors.email}" v-model="list.email" type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email">
                <small class="text-danger" v-if="errors.email">{{errors.email[0]}}</small>
                <small id="emailHelp" v-else class="form-text text-muted">We'll never share your email with anyone else.</small>
                
            </div>
            
            <div class="form-group">
                <label for="phone">Phone Number</label>
                <input :class="{'is-invalid':errors.phone}" v-model="list.phone" type="integer" class="form-control" id="phone" aria-describedby="phoneHelp" placeholder="Enter phone number">
                <small class="text-danger" v-if="errors.phone">{{errors.phone[0]}}</small>
            </div>           
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button @click="save" type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>


</template>


<script>
export default {
    data(){
        return {
            list:{
                name :'',
                email :'',
                phone :''
            },
            errors:{}
        }
    },
    methods:{
        save(){
                axios.post('/phonebook',this.$data.list)
                .then((response)=>{
                    $('#exampleModal').modal('hide')
                    this.$parent.lists.push(response.data)
                    
                    })                           
                .catch((err)=>this.errors = err.response.data.errors);
        }
    }
}
</script>
