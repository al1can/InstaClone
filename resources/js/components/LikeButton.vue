<template>
    <div>
        <button class="btn btn-primary ms-4" @click="likePost" v-text="likeText"></button>
        <div v-text="likesStatus"></div>
    </div>
</template>

<script>
    export default {
        props: ['postId', 'likes', 'likesCount'],

        mounted() {
            console.log('Component mounted.')
        },

        data: function () {
            return {
                status: this.likes,
                likesStatus: this.likesCount,
            }
        },

        methods: {
            likePost() {
                axios.post('/like/' + this.postId)
                    .then(response => {
                        this.status = !this.status;
                        this.likesStatus = Number(this.likesStatus);
                        if (this.status) {
                            this.likesStatus += 1;
                        }
                        else {
                            this.likesStatus -= 1;
                        }
                    });
            }
        },

        computed: {
            likeText() {
                return (this.status) ? 'Unlike' : 'Like';
            }
        }
    }
</script>
