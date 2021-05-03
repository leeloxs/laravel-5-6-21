<template>
    <div class="container bg-white mt-5">
        <div class="row p-2 " v-for="(post, i) in posts" :key=i style="border-bottom: 1px solid #ced4da">
            <div class="media p-1 w-100" >
                <a class="pr-3 view-post" @click="viewPost(i)">      <!-- TODO: add this for dynamic photos :src="post.images[0].path"-->
                    <img class="mr-3" v-if="post.user.images.length " :src="post.user.images[0].path"  width="50" height="50"
                         alt="Generic placeholder image">
                </a>
                <div class="media-body">
                    <h5 class="mt-0 font-weight-bold view-post" @click="viewPost(i)">{{ post.title }}</h5>
                    <p class="text-muted">
                        {{ truncateText(post.body) }}
                    </p>
                </div>
            </div>


            <el-dialog v-if="currentPost" :visible.sync="postDialogVisible" width="40%">
              <span>
                <h3>{{ currentPost.title }}</h3>
                <div class="row">
                  <div class="col-md-6" v-for="(img, i) in currentPost.images" :key=i>
                    <img :src="img.path" class="img-thumbnail" alt="">
                  </div>
                </div>
                <hr>
                <p>{{ currentPost.body }}</p>
              </span>
                    <span slot="footer" class="dialog-footer">
                <el-button type="primary" @click="postDialogVisible = false">Okay</el-button>
              </span>
            </el-dialog>
        </div>
    </div>
</template>

<script>
import { mapState } from 'vuex';

export default {
    name: 'all-posts',
    data() {
        return {
            postDialogVisible: false,
            currentPost: '',
            avatar: '/img/avatar.jpg',
        };
    },
    computed: {
        ...mapState(['posts'])
    },
    beforeMount() {
        this.$store.dispatch('getAllPosts');
    },
    methods: {
        truncateText(text) {
            if (text.length > 24) {
                return `${text.substr(0, 24)}...`;
            }
            return text;
        },
        viewPost(postIndex) {
            const post = this.posts[postIndex];
            this.currentPost = post;
            this.postDialogVisible = true;
        }
    },
}
</script>
<style>
.view-post {
    cursor: pointer;
}
</style>
