<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="text-end mb-2">
                    <button type="button" class="btn-md btn-outline-success" @click="$router.push('/add-field')">
                        Add Field
                    </button>
                </div>

                <div class="card">
                    <div class="card-header text-center">Fields</div>

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Title</th>
                                <th scope="col">Type</th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                            <tr v-for="(field, index) in fields" :key="field.id">
                                <td>{{ index + 1 }}</td>
                                <td>{{ field.title }}</td>
                                <td>{{ field.type }}</td>
                                <td>
                                    <button type="button" class="btn-sm btn-danger" @click="deleteField(field.id)">
                                        Delete Field
                                    </button>

                                    <show-field
                                        :show="showModal(field.id)"
                                        :field="field"
                                        @update-field="updateField"
                                        @close="toggleModal(field.id)" />
                                    <button type="button" class="btn-sm btn-info" @click.stop="toggleModal(field.id)">
                                        View Field
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import ShowField from "./ShowField";

    export default {
        components: {ShowField},
        data() {
            return {
                fields: [],
                activeModal: 0
            }
        },
        created() {
           this.getFields();
        },
        methods: {
            deleteField(id) {
                axios.delete(`api/fields/${id}`)
                    .then(response => {
                        let i = this.fields.map(data => data.id).indexOf(id);
                        this.fields.splice(i, 1)
                    });
            },
            updateField(field) {
                let i = this.fields.map(data => data.id).indexOf(field.id);
                this.fields[i] = field;
            },
            showModal(id) {
                return this.activeModal === id
            },
            toggleModal(id) {
                if(this.activeModal !== 0) {
                    this.activeModal = 0
                    return false
                }
                this.activeModal = id
            },
            getFields(){
                axios.get('api/fields')
                    .then(response => {
                        this.fields = response.data.data;
                    });
            }
        }
    }
</script>
