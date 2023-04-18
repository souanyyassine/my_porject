<template>
    <div>
        <h4 class="text-center">Add Societe</h4>
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="addSociete">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" v-model="societe.name">
                    </div>
                    <button type="submit" class="btn btn-primary">Add Societe</button>
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
    methods: {
        addSociete() {
            this.$axios.get('/sanctum/csrf-cookie').then(response => {
                this.$axios.post('/api/societes/add', this.societe)
                    .then(response => {
                        this.$router.push({name: 'societes'})
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