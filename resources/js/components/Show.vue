<template>
    <div class="modal fade" id="showModal" tabindex="-1" role="dialog" aria-labelledby="showModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="showModalLabel">Phonebook Entry</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                
                <p v-if="list.name">Name: {{list.name}}</p>
                <p v-if="list.email">Email: {{list.email}}</p>
                <p v-if="list.phone">Phone: {{list.phone}}</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                
            </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data(){
        return {
            list:'' 
        }
    }
}
</script>
