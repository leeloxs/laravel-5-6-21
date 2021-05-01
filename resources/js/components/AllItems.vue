<template>
    <div class="row justify-content-around">
        <div class="col-md-4" v-for="(item, i) in items" :key=i>
            <div class="card m-4 shadow">
                <img v-if="item.images.length" class="card-img-top" :src="item.images[0].path">
                <div class="card-body">
                    <p class="card-text"><strong>{{ item.title }}</strong> <br>
                        {{ truncateText(item.body) }}
                    </p>
                </div>
                <button class="btn btn-success m-2" @click="viewItem(i)">View Item</button>
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
