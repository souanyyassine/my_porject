<template>
    <div>
        <h4 class="text-center">Edit Societe</h4>
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="updateSociete">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" v-model="societe.name">
                    </div>
                    <button type="submit" class="btn btn-primary">Update Societe</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            societe: {}
        }
    },
    created() {
        this.$axios.get('/sanctum/csrf-cookie').then(response => {
            this.$axios.get(`/api/societes/edit/${this.$route.params.id}`)
                .then(response => {
                    this.societe = response.data;
                })
                .catch(function (error) {
                    console.error(error);
                });
        })
    },
    methods: {
        updateSociete() {
            this.$axios.get('/sanctum/csrf-cookie').then(response => {
                this.$axios.post(`/api/societes/update/${this.$route.params.id}`, this.societe)
                    .then(response => {
                        this.$router.push({name: 'societes'});
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