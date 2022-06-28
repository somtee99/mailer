<template>
    <form @submit="onSubmit">
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
                title: this.field.title,
                type: this.field.type
            }
        },
        methods: {
            onSubmit(e){
                e.preventDefault()

                const updatedField = {
                    title: this.title,
                    type: this.type
                }

                axios.put(`api/fields/${this.field.id}`, updatedField)
                    .then(response => {
                        this.$emit('end-edit', response.data.data)
                    });
            }
        },
    }
</script>

