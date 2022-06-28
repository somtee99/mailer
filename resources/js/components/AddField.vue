<template>
    <form @submit="onSubmit">
        <div class="text-center fw-bold fs-4 mb-2">Add Field</div>

        <div class="my-2">
            <label class="form-label">Title</label>
            <input class="form-control" type="text" v-model="title" name="title" placeholder="Enter Title" />
        </div>
        <div class="my-2">
            <label class="form-label">Type</label>
            <select class="form-control" id="type" name="type" v-model="type">
                <option value="date">Date</option>
                <option value="number">Number</option>
                <option value="string">String</option>
                <option value="boolean">Boolean</option>
            </select>
        </div>
        <input type="submit" value="Save" class="btn-primary" />
    </form>
</template>

<script>
    export default {
        props: ['field'],
        data(){
            return {
                title: '',
                type: ''
            }
        },
        methods: {
            onSubmit(e){
                e.preventDefault()

                const newField = {
                    title: this.title,
                    type: this.type
                }

                axios.post('api/fields', newField)
                    .then(response => {
                        this.$router.push('/fields');
                    });
            }
        },
    }
</script>

