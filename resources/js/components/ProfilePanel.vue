<template>
    <div class="d-flex align-items-baseline">
        <div class="me-5"><strong v-text="postCount"></strong> posts</div>

        <!-- Button trigger modal -->
        <div type="button" class="me-5" data-bs-toggle="modal" data-bs-target="#followersModal" @click="getFollowers">
            <span class="fw-bold" v-text="followersCount"></span> followers
        </div>

        <!-- Modal -->
        <div class="modal fade" id="followersModal" tabindex="-1" aria-labelledby="followersModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="followersModalLabel">Followers</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div v-for="user in followers" :key="user.id" class="d-flex align-items-center justify-content-between pb-3">
                            <a v-bind:href="'/profile/'+user.id" v-text="user.username" class="text-decoration-none text-dark fw-bold "></a>
                            <follow-button :user-id="userId" :follows="follows"></follow-button>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Button trigger modal -->
        <div type="button" class="me-5" data-bs-toggle="modal" data-bs-target="#followingModal" @click="getFollowing">
            <span class="fw-bold" v-text="followingCount"></span> following
        </div>

        <!-- Modal -->
        <div class="modal fade" id="followingModal" tabindex="-1" aria-labelledby="followingModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="followingModalLabel">Following</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div v-for="profile in following" :key="profile.id" class="d-flex align-items-center justify-content-between pb-3">
                            <div>
                                <img :src="image" alt="" class="rounded-circle" style="width: 50px">
                                <a v-bind:href="'/profile/'+profile.id" v-text="profile.title" class="text-decoration-none text-dark fw-bold px-3"></a>
                            </div>
                            <follow-button :user-id="userId" :follows="follows"></follow-button>
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
        props: ['userId', 'image', 'followingCount', 'followersCount', 'follows', 'postCount'],

        mounted() {
            //console.log('Component mounted.')
        },

        data: function() {
            return {
                followers: [],
                following: [],
            }
        },

        methods: {
            getFollowing() {
                axios.get('/profile/'+ this.userId +'/following')
                    .then(response => {
                        this.following = response.data;
                        return response.data;
                    })
            },

            getFollowers() {
                axios.get('/profile/'+ this.userId +'/followers')
                    .then(response => {
                        this.followers = response.data;
                        return response.data;
                    })
            }
            
        },

        computed: {
            
            
        }
    }
</script>
