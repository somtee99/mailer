<template>
    <div>
        <modal :show="show" @close="close">
            Field Showing....
        </modal>
    </div>
</template>

<script>
import Modal from "./widgets/Modal";

export default {
    props: ['show'],
    components: {Modal},
    methods: {
        close: function() {
            this.$emit('close')
        }
    }
}
</script>
