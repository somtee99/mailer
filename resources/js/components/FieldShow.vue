<template>
    <div>
        <modal :show="show" @close="close">
            <div class="container my-4">
                <div class="text-center fw-bold fs-4 mb-2">Field: {{ field.title }}</div>

                <ul class="list-group">
                    <li class="list-group-item">
                        <b>Title</b>: {{ field.title }}
                    </li>
                    <li class="list-group-item">
                        <b>Type</b>: {{ field.type }}
                    </li>
                </ul>
            </div>
        </modal>
    </div>
</template>

<script>
import Modal from "./widgets/Modal";

export default {
    props: ['show', 'field'],
    components: {Modal},
    methods: {
        close: function() {
            this.$emit('close')
        }
    }
}
</script>
