<template>
        <div :key="componentKey" class="card mt-4 w-50 ">
            <div class="card-body">
                <div
                    v-if="status_msg"
                    :class="{ 'alert-success': status, 'alert-danger': !status }"
                    class="alert"
                    role="alert"
                >
                    {{ status_msg }}
                </div>
                <div class="row">
                    <form class="w-100">
                        <div class="input-container">
                            <div class="form-group">
                                <input
                                    id="title"
                                    v-model="title"
                                    type="text"
                                    class="form-control"
                                    placeholder="Post Title"
                                    required
                                    autocomplete="off"
                                >
                            </div>
                            <div class="form-group">
                                <textarea id="post-content" v-model="body" class="form-control" rows="3" placeholder="What are looking for?" required autocomplete="off" />
                            </div>
                        </div>
                        <!--          Upload photos              -->
                        <div class>
                            <el-upload
                                class="upload-demo"
                                ref="upload"
                                :on-change="updateImageList"
                                action="https://jsonplaceholder.typicode.com/posts/"
                                :auto-upload="false">
                                <el-button slot="trigger" size="small" type="primary">select file</el-button>
                                <div class="el-upload__tip" slot="tip">jpg/png files with a size less than 500kb</div>
                            </el-upload>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card-footer">
                <button
                    type="button"
                    class="btn btn-success"
                    @click="createPost"
                >
                    {{ isCreatingPost ? "Posting..." : "Create Post" }}
                </button>
            </div>
        </div>
</template>

<script>
import { mapActions } from 'vuex'

export default {
    name: 'CreatePost',
    data () {
        return {
            dialogImageUrl: '',
            dialogVisible: false,
            imageList: [],
            status_msg: '',
            status: '',
            isCreatingPost: false,
            title: '',
            body: '',
            componentKey: 0,
        }
    },
    computed: {},
    mounted () {},
    methods: {
        handleChange(file, fileList) {
            this.fileList = fileList.slice(-3);
        },
        ...mapActions(['getAllPosts']),
        updateImageList (file) {
            this.imageList.push(file.raw)
        },
        createPost (e) {
            e.preventDefault()
            if (!this.validateForm()) {
                return false
            }
            const that = this
            this.isCreatingPost = true
            const formData = new FormData()

            formData.append('title', this.title)
            formData.append('body', this.body)

            $.each(this.imageList, function (key, image) {
                formData.append(`images[${key}]`, image)
            })

            api
                .post('/posts', formData, {
                    headers: { 'Content-Type': 'multipart/form-data' }
                })
                .then((res) => {
                    this.title = this.body = ''
                    this.status = true
                    this.showNotification('Post Successfully Created')
                    this.isCreatingPost = false
                    this.imageList = []
                    /*
                     this.getAllPosts() can be used here as well
                     note: "that" has been assigned the value of "this" at the top
                     to avoid context related issues.
                     */
                    that.getAllPosts()
                    that.componentKey += 1
                })
        },
        validateForm () {
            // no vaildation for images - it is needed
            // if (!this.title) {
            //     this.status = false
            //     this.showNotification('Post title cannot be empty')
            //     return false
            // }
            if (!this.body) {
                this.status = false
                this.showNotification('Post body cannot be empty')
                return false
            }
            return true
        },
        showNotification (message) {
            this.status_msg = message
            setTimeout(() => {
                this.status_msg = ''
            }, 3000)
        }
    }
}
</script>
<style scoped>
.avatar-uploader .el-upload {
    border: 1px dashed #d9d9d9;
    border-radius: 6px;
    cursor: pointer;
    position: relative;
    overflow: hidden;
}
.avatar-uploader .el-upload:hover {
    border-color: #409eff;
}
.avatar-uploader-icon {
    font-size: 28px;
    color: #8c939d;
    width: 50px;
    height: 50px;
    line-height: 178px;
    text-align: center;
}
.avatar {
    width: 50px;
    height: 50px;
    display: block;
}
.card  {
    border: none;
    transition: all 0.2s;
    /*box-shadow: 0 0.5rem 1rem 0 rgba(0, 0, 0, 0.1);*/
}
.card:hover {
    margin-top: -.25rem;
    margin-bottom: .25rem;
    box-shadow: 0 0.5rem 1rem 0 rgba(0, 0, 0, 0.3);
}
#post-content{
    resize: none;
}
.form-control{
    border: none;
}
.form-control:focus{
    border: none;
    box-shadow: 0 0 0 0;
}
.input-container{
    transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    border-color: #a1cbef;
}
.input-container:focus{
    border-color: #a1cbef;
    box-shadow: 0 0 0 0.2rem rgb(52 144 220 / 25%);
    border-radius: 0.25rem;
}
</style>
