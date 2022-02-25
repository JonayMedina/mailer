<template>
    <section class="vh-100 container" style="">
        
            <div v-if="users" class="row row-cols-1 row-cols-md-3 g-4">
                <table class="table table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Rol</th>
                            <th scope="col">Email</th>
                            <th scope="col">Telefono</th>
                            <th scope="col">Fecha de Nacimiento</th>
                            <th scope="col">edad</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="user in users" :key="user.id">
                            <th scope="row" v-text="user.id"></th>
                            <th class="text-capitalize" v-text="user.name"></th>
                            <th class="text-capitalize" v-text="user.role.name"></th>
                            <th v-text="user.email"></th>
                            <th v-text="user.phone_complete"></th>
                            <th v-text="user.birthday"></th>
                            <th v-text="user.age"></th>
                            
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                        </tr>
                    </tfoot>
                </table>
                
                            <pagination :data="allData" @pagination-change-page="getUsers"></pagination>
            </div>  
        
            <div v-else class="card text-center">
                <div class="card-header">
                </div>
                <div class="card-body">
                    <h5 class="card-title">No hay usuarios Registrados</h5>

                </div>
            </div>
    </section>
</template>

<script>
    export default {
        data () {
            return {
                allData: {},
                users: []
            }
        },
        methods: {
            async getUsers(page = 1) {
                let me = this;
                var url = '/users/all?page=' + page;
                const res = await axios.get(url);
                me.allData = res.data;
                me.users = res.data.data
                
            }
        },
        mounted() {
            this.getUsers();
        }
    }
</script>