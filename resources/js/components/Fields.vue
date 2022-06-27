<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header text-center">Fields</div>

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Title</th>
                                <th scope="col">Type</th>
                                <th scope="col">Actions</th>
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
    export default {
        data() {
            return {
                fields: []
            }
        },
        created() {
            axios.get('api/fields')
                .then(response => {
                    this.fields = response.data.data;
                });
        },
        methods: {
            deleteField(id) {
                axios.delete(`api/fields/${id}`)
                    .then(response => {
                        let i = this.fields.map(data => data.id).indexOf(id);
                        this.fields.splice(i, 1)
                    });
            }
        }
    }
</script>
