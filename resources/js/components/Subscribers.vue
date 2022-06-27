<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header text-center">Subscribers</div>

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">State</th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                            <tr v-for="(subscriber, index) in subscribers" :key="subscriber.id">
                                <td>{{ index + 1 }}</td>
                                <td>{{ subscriber.name }}</td>
                                <td>{{ subscriber.email }}</td>
                                <td>{{ subscriber.state }}</td>
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
                subscribers: []
            }
        },
        created() {
            axios.get('api/subscribers')
                .then(response => {
                    this.subscribers = response.data.data;
                });
        },
        methods: {
        }
    }
</script>
