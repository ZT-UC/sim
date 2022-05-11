<template>
  <form @submit.prevent="submitForm" role="form" action="" method="post">
    <div class="row">
      <div class="col-sm-6">
        <div class="card card-primary card-outline">
          <div class="card-body">
            <h5 class="card-title">Create Product</h5><br>
            <div class="card-body">
                <div class="form-group">
                  <label>Category <span class="text-danger">*</span></label>
                  <Select2 v-model="form.category_id" :options="categories" :settings="{ placeholder: 'Select category' }"></Select2>
                </div>
                <div class="form-group">
                  <label>Brand <span class="text-danger">*</span></label>
                  <Select2 v-model="form.brand_id" :options="brands" :settings="{ placeholder:'Select brand' }"></Select2>
                </div>
                <div class="form-group">
                  <label>SKU <span class="text-danger">*</span></label>
                  <input type="text" v-model="form.sku" class="form-control" :settings="{ placeholder: 'SKU' }">
                </div>
                <div class="form-group">
                  <label>Name <span class="text-danger">*</span></label>
                  <input type="text" v-model="form.name" class="form-control" :settings="{ placeholder: 'Product name' }">
                </div>
                <div class="form-group">
                  <label>Image <span class="text-danger">*</span></label>
                  <input type="file" class="form-control" :settings="{ placeholder: 'Product image' }">
                </div>
                <div class="form-group">
                  <label>Cost price ($) <span class="text-danger">*</span></label>
                  <input type="text" v-model="form.cost_price" class="form-control" :settings="{ placeholder: 'Product cost price' }">
                </div>
                <div class="form-group">
                  <label>Retail price ($) <span class="text-danger">*</span></label>
                  <input type="text" v-model="form.retail_price" class="form-control" :settings="{ placeholder: 'Product retail price' }">
                </div>
                <div class="form-group">
                  <label>Year<span class="text-danger">*</span></label>
                  <input type="text" v-model="form.year" class="form-control" :settings="{ placeholder: 'Product year (example: 2022)' }">
                </div>
                <div class="form-group">
                  <label>Description<span class="text-danger">*</span></label>
                  <input type="text" v-model="form.description" class="form-control" :settings="{ placeholder: 'Product description [max: 200]' }">
                </div>
                <div class="form-group">
                  <label>Status<span class="text-danger">*</span></label>
                  <select class="form-control" v-model="form.status">
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                  </select>
                </div>
                  </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary btn-sm">
                    <i class="fa fa-save"></i> Submit
                  </button>
            </div>
          </div>
        </div>
      </div>

      <div class="col-sm-6">
        <div class="card card-primary card-outline">
          <div class="card-body">
            <h5 class="card-title">Product Size</h5><br>
            <div class="row mb-1 mt-3" v-for="(item, index) in form.items" :key="index">
              <div class="col-sm-4">
                <select class="form-control" v-model="item.size_id">
                  <option value="">Select size</option>
                  <option v-for="(size, index) in sizes" :value="size.id" :key="index">{{ size.size }}</option>
                </select>
              </div>
              <div class="col-sm-3">
                <input type="text" v-model="item.location" class="form-control" placeholder="Location">
              </div>
              <div class="col-sm-3">
                <input type="number" v-model="item.quantity" class="form-control" placeholder="Quantity">
              </div>
              <div class="col-sm-2">
                <button @click="deleteItem(index)" type="button" class="btn-danger btn-sm"><i class="fa fa-trash"></i></button> 
              </div>
            </div> 
            <button @click="addItem" type="button" class="btn btn-primary btn-sm mt-3"><i class="fa fa-plus"></i> Add item </button>
          </div>
        </div>
      </div>
    </div>
  </form>
</template>

<script>
  import { store } from "../../store"
  import * as actions from "../../store/action-types"
  import { mapGetters } from "vuex"
  import Select2 from 'vue3-select2-component';

  export default {
    components: { Select2 },
    data() {
      return {
        form: {
          category_id: '',
          brand_id: '',
          sku: '',
          name: '',
          image: '',
          cost_price: 0,
          retail_price: 0,
          year: '',
          description: '',
          status: 1, 
          items: [
            {
              size_id: '',
              location: '',
              quantity: 0
            }
          ]
        },
      }
    },
    computed: {
      ...mapGetters({
        'categories' : 'getCategories',
        'brands' : 'getBrands',
        'sizes' : 'getSizes'
      })
    },
    mounted() {
      // Get categories
      store.dispatch(actions.GET_CATEGORIES)
      // Get brands
      store.dispatch(actions.GET_BRANDS)
      // Get sizes
      store.dispatch(actions.GET_SIZES)
    },
    methods: {
      addItem() {
        let item = {
          size_id: '',
          location: '',
          quantity: 0
        };
        this.form.items.push(item)
      },
      deleteItem(index) {
        this.form.items.splice(index, 1)
      },
      submitForm() {
        console.log(this.form)
      }
    }
  }
</script>
