<template>
    <div>
        <button class="btn btn-primary ms-4" @click="followUser" v-text="followText"></button>
    </div>
</template>

<script>
    export default {
        props: ['userId', 'follows'],

        mounted() {
            console.log('Component mounted.')
        },

        data: function() {
            return {
                status: this.follows,
            }
        },

        methods: {
            followUser() {
                axios.post('/follow/' + this.userId)
                    .then(response => {
                        this.status = !this.status;
                        console.log(response);
                    }).catch(err => {
                        console.log(err);
                        if (err.response.status = 401) {
                            window.location = '/login';
                        }
                    });
                /*
                axios({
                    method:'post',
                    url:'/follow/1',
                }).then(response => {
                    alert(response.data);
                }).catch(error => {
                    alert(error);
                });*/
                /*
                fetch('/follow/1',{
                    method: "GET"
                })
                .then(response => response.json())
                .then(json => alert(json))
                .catch(error => alert(error));*/
            }
        },

        computed: {
            followText() {
                return (this.status) ? 'Unfollow' : 'Follow';
            }
        }
    }
</script>
