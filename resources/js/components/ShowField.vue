<template>
    <div>
        <modal :show="show" @close="close">
            <div class="container my-4">

                <div v-if="!isEditing">
                    <div class="text-center fw-bold fs-4 mb-2">Field: {{ field.title }}</div>

                    <div class="mb-3">
                        <button @click="onClick()" class="btn-primary"> Edit </button>
                    </div>

                    <ul class="list-group">
                        <li class="list-group-item">
                            <b>Title</b>: {{ field.title }}
                        </li>
                        <li class="list-group-item">
                            <b>Type</b>: {{ field.type }}
                        </li>
                    </ul>
                </div>

                <edit-field v-else :field="field" @end-edit="endEdit"/>
            </div>
        </modal>
    </div>
</template>

<script>
import Modal from "./widgets/Modal";
import EditField from "./EditField";

export default {
    props: ['show', 'field'],
    components: {EditField, Modal},
    data(){
        return {
            isEditing: false
        }
    },
    methods: {
        close: function() {
            this.$emit('close')
        },
        onClick: function (){
            this.isEditing = !this.isEditing;
        },
        endEdit: function (fieldEdit){
            this.$emit('update-field', fieldEdit);
            this.isEditing = false;
        }
    }
}
</script>
