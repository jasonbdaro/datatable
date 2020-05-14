<template>
    <div class="container">
        <h4>List of Users</h4>
        <Datatable :fields="fields" :opts="options"></Datatable>
    </div>
</template>

<script>
import Datatable from '@components/Datatable';
export default {
    components: {
        Datatable,
    },
    data() {
        return {
            fields: {},
            options: {
                ajax: {
                    url: '/api/users',
                    type: 'GET',
                },
                ordering: false,
                columns: [
                    {
                        name: 'ID',
                        data: 'id',
                    },
                    {
                        name: 'Name',
                        data: 'name',
                    },
                    {
                        name: 'Email Address',
                        data: 'email',
                    },
                    {
                        name: 'Verifed',
                        data: 'email_verified_at',
                        searchable: false,
                    },
                ],
            },
        };
    },
}
</script>

<style scoped>
.container {
    margin: 50px;
}
h4 {
    text-align: center;
}
</style>
