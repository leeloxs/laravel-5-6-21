<template>
    <div :key="componentKey" class="card mt-4 w-100 shadow">
        <div class="card-body">
            <div
                v-if="status_msg"
                :class="{ 'alert-success': status, 'alert-danger': !status }"
                class="alert"
                role="alert"
            >
                {{ status_msg }}
            </div>
            <form>
                <div class="row">
                    <div class="col-sm-4">
                        <div class>
                            <el-upload
                                action="https://jsonplaceholder.typicode.com/items/"
                                list-type="picture-card"
                                :on-preview="handlePictureCardPreview"
                                :on-change="updateImageList"
                                :auto-upload="false"
                            >
                                <i class="el-icon-plus" />
                            </el-upload>
                            <el-dialog :visible.sync="dialogVisible">
                                <img width="100%" :src="dialogImageUrl" alt>
                            </el-dialog>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <input
                                        id="title"
                                        v-model="title"
                                        type="text"
                                        class="form-control"
                                        placeholder="Item Title"
                                        required
                                    >
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group row">
                                    <div class="col-sm-2 text-right pr-1">
                                        <button class="btn btn-success">+</button>
                                    </div>
                                    <div class="col-sm-8  pr-0 pl-0">
                                        <input
                                            id="quantity"
                                            v-model="quantity"
                                            type="text"
                                            class="form-control text-center"
                                            placeholder="Quantity"
                                            required
                                        >
                                    </div>
                                    <div class="col-sm-2 text-left pl-1">
                                        <button class="btn btn-danger">-</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group w-100">
                                    <textarea id="item-content" v-model="body" class="form-control w-100" rows="3" placeholder="Item Description" required />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="card-footer">
            <button
                type="button"
                class="btn btn-success"
                @click="createItem"
            >
                {{ isCreatingItem ? "Posting..." : "Create Post" }}
            </button>
        </div>
    </div>
</template>

<style>
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
    width: 178px;
    height: 178px;
    line-height: 178px;
    text-align: center;
}
.avatar {
    width: 178px;
    height: 178px;
    display: block;
}
#item-content{
    resize: none;

}
</style>

<script>
import { mapActions } from 'vuex'

export default {
    name: 'CreateItem',
    data () {
        return {
            dialogImageUrl: '',
            dialogVisible: false,
            imageList: [],
            status_msg: '',
            status: '',
            isCreatingItem: false,
            title: '',
            body: '',
            quantity: 1,
            componentKey: 0
        }
    },
    computed: {},
    mounted () {},
    methods: {
        ...mapActions(['getAllItems']),
        updateImageList (file) {
            this.imageList.push(file.raw)
        },
        handlePictureCardPreview (file) {
            this.dialogImageUrl = file.url
            this.imageList.push(file)
            this.dialogVisible = true
        },
        createItem (e) {
            e.preventDefault()
            if (!this.validateForm()) {
                return false
            }
            const that = this
            this.isCreatingItem = true
            const formData = new FormData()

            formData.append('title', this.title)
            formData.append('body', this.body)
            formData.append('quantity', this.quantity)

            $.each(this.imageList, function (key, image) {
                formData.append(`images[${key}]`, image)
            })

            api
                .post('/items', formData, {
                    headers: { 'Content-Type': 'multipart/form-data' }
                })
                .then((res) => {
                    this.title = this.body = ''
                    this.quantity = 1;
                    this.status = true
                    this.showNotification('Item Successfully Created')
                    this.isCreatingItem = false
                    this.imageList = []
                    /*
                     this.getAllItems() can be used here as well
                     note: "that" has been assigned the value of "this" at the top
                     to avoid context related issues.
                     */
                    that.getAllItems()
                    that.componentKey += 1
                })
        },
        validateForm () {
            // no vaildation for images - it is needed
            if (!this.title) {
                this.status = false
                this.showNotification('Item title cannot be empty')
                return false
            }
            if (!this.body) {
                this.status = false
                this.showNotification('Item body cannot be empty')
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
