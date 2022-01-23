<template>
    <div>
        <button class="btn btn-primary ms-4" @click="likePost" v-text="likeText"></button>
        <div v-text="currentLikesCount"></div>
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
                currentLikesCount: this.likesCount,
            }
        },

        methods: {
            likePost() {
                axios.post('/like/' + this.postId)
                    .then(response => {
                        this.status = !this.status;
                        this.currentLikesCount = Number(this.currentLikesCount);
                        if (this.status) {
                            this.currentLikesCount += 1;
                        }
                        else {
                            this.currentLikesCount -= 1;
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
