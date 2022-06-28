<template>
    <div>
        <modal :show="show" @close="close">
            <div class="container my-4">
                <div class="text-center fw-bold fs-4 mb-2">Subscriber: {{ subscriber.name }}</div>

                <ul class="list-group">
                    <li class="list-group-item">
                        <b>Name</b>: {{ subscriber.name }}
                    </li>
                    <li class="list-group-item">
                        <b>Email</b>: {{ subscriber.email }}
                    </li>
                    <li class="list-group-item">
                        <b>State</b>: {{ subscriber.state }}
                    </li>
                </ul>
            </div>

            <div class="container my-4">
                <div class="text-center fw-bold fs-5">Custom Fields</div>

                <ul v-if="fields.length > 0" class="list-group">
                    <li v-for="field in fields" class="list-group-item">
                        <b>{{ field.title }}</b>: {{ field.pivot.value }}
                    </li>
                </ul>

                <div v-else class="text-start fst-italic fs-6">No Custom Field</div>
            </div>
        </modal>
    </div>
</template>

<script>
import Modal from "./widgets/Modal";

export default {
    props: ['show', 'subscriber'],
    data() {
        return {
            fields: [],
        }
    },
    created() {
        this.fields = this.subscriber.fields;
    },
    components: {Modal},
    methods: {
        close: function() {
            this.$emit('close')
        }
    }
}
</script>
