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
                                <td>
                                    <show-subscriber
                                    :show="showModal(subscriber.id)"
                                    :subscriber="subscriber"
                                    @close="toggleModal(subscriber.id)" />

                                    <button type="button" class="btn-sm btn-info" @click.stop="toggleModal(subscriber.id)">
                                        View
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
    import Modal from "../widgets/Modal";
    import ShowSubscriber from "./ShowSubscriber";

    export default {
        components: {ShowSubscriber, Modal},
        data() {
            return {
                subscribers: [],
                activeModal: 0
            }
        },
        created() {
            this.getSubscribers();
        },
        methods: {
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
            getSubscribers(){
                axios.get('api/subscribers')
                    .then(response => {
                        this.subscribers = response.data.data;
                    });
            }
        }
    }
</script>
