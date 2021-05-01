<template>
    <div class="container mt-3">
        <div class="row justify-content-around">
            <div class="col-sm-3 m-3" v-for="(item, i) in items" :key=i>
                <div class="card shadow">
                    <img class="card-img-top" v-if="item.images.length" width="200" height="200" :src="item.images[0].path" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title"> {{ item.title }}</h5>
                        <p class="card-text">{{ truncateText(item.body) }}.</p>
                    </div>
                    <button class="btn btn-primary m-2" @click="viewItem(i)">View Item</button>
                </div>
            </div>

            <el-dialog v-if="currentItem" :visible.sync="itemDialogVisible" width="40%">
                <span>
                    <h3>{{ currentItem.title }}</h3>
                    <div class="row">
                      <div class="col-md-6" v-for="(img, i) in currentItem.images" :key=i>
                        <img :src="img.path" class="img-thumbnail" alt="">
                      </div>
                    </div>
                    <hr>
                    <p>{{ currentItem.body }}</p>
                </span>
                <span slot="footer" class="dialog-footer">
                    <el-button type="primary" @click="itemDialogVisible = false">Okay</el-button>
                </span>
            </el-dialog>
        </div>
    </div>
</template>

<script>
import { mapState } from 'vuex';

export default {
    name: 'all-items',
    data() {
        return {
            itemDialogVisible: false,
            currentItem: '',
        };
    },
    computed: {
        ...mapState(['items'])
    },
    beforeMount() {
        this.$store.dispatch('getAllItems');
    },
    methods: {
        truncateText(text) {
            if (text.length > 24) {
                return `${text.substr(0, 24)}...`;
            }
            return text;
        },
        viewItem(itemIndex) {
            const item = this.items[itemIndex];
            this.currentItem = item;
            this.itemDialogVisible = true;
        }
    },
}
</script>
<style scoped>
.card  {
    border: none;
    border-radius: 8px;
    transition: all 0.2s;
    box-shadow: 0 0.5rem 1rem 0 rgba(0, 0, 0, 0.1);
}
.card:hover {
    margin-right: -.25rem;
    margin-left: .25rem;
    box-shadow: 0 0.5rem 1rem 0 rgba(0, 0, 0, 0.3);
}
</style>
