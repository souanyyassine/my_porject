<template>
    <div>
        <h4 class="text-center">All Societes</h4><br/>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="societe in societes" :key="societe.id">
                <td>{{ societe.id }}</td>
                <td>{{ societe.name }}</td>
                <td>{{ societe.created_at }}</td>
                <td>{{ societe.updated_at }}</td>
                <td>
                    <div class="btn-group" role="group">
                        <router-link :to="{name: 'editsociete', params: { id: societe.id }}" class="btn btn-primary">Edit
                        </router-link>
                        <button class="btn btn-danger" @click="deleteSociete(societe.id)">Delete</button>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>

        <button type="button" class="btn btn-info" @click="this.$router.push('/societes/add')">Add Societe</button>
    </div>
</template>

<script>
export default {
    data() {
        return {
            societes: []
        }
    },
    created() {
        this.$axios.get('/sanctum/csrf-cookie').then(response => {
            this.$axios.get('/api/societes')
                .then(response => {
                    this.societes = response.data;
                })
                .catch(function (error) {
                    console.error(error);
                });
        })
    },
    methods: {
        deleteSociete(id) {
            this.$axios.get('/sanctum/csrf-cookie').then(response => {
                this.$axios.delete(`/api/societes/delete/${id}`)
                    .then(response => {
                        let i = this.societes.map(item => item.id).indexOf(id); // find index of your object
                        this.societes.splice(i, 1)
                    })
                    .catch(function (error) {
                        console.error(error);
                    });
            })
        }
    },
    beforeRouteEnter(to, from, next) {
        if (!window.Laravel.isLoggedin) {
            window.location.href = "/";
        }
        next();
    }
}
</script>