<template>
    <div class="mx-3">
        <div>
            <div class="bi bi-heart-fill fs-2 d-inline" v-bind:class="[status ? 'bi-heart-fill' : 'bi-heart']" @click="likePost"></div>
            <a :href="'/post/'+postId"><i class="bi bi-chat-right-text text-dark fs-2 d-inline ms-3"></i></a>
        </div>

        <!-- Button trigger modal -->
        <div type="button" class="fs-5 d-inline" data-bs-toggle="modal" data-bs-target="#exampleModal" @click="whoLiked">
            <span v-text="likesCountData"></span> likes
        </div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">This post liked by</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div v-for="user in likedBy" :key="user.id">
                            <a v-bind:href="'/profile/'+user.id" v-text="user.username" class="text-decoration-none text-dark fw-bold "></a>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['postId', 'likes', 'likesCount'],

        mounted() {
            //console.log('Component mounted.')
        },

        data: function () {
            return {
                status: this.likes,
                likesCountData: this.likesCount,
                likedBy: [],
            }
        },

        methods: {
            likePost() {
                axios.post('/like/' + this.postId)
                    .then(response => {
                        this.status = !this.status;
                        this.likesCountData = Number(this.likesCountData);
                        (this.status) ? this.likesCountData-=1 : this.likesCountData+=1;
                    });
            },

            whoLiked() {
                axios.get('/post/' + this.postId + '/likes')
                    .then(response => {
                        this.likedBy = response.data;
                    });
            }
            
        },

    }
</script>
