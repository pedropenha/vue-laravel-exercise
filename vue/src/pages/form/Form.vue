<template>
  <div class="container my-lg-5">
    <div class="row">
      <div class="col-12 text-center">
        <router-link to="/" class="link_border">List</router-link>
        <router-link to="/form" class="link_border_active">Form</router-link>
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <div class="form-group row">
          <label for="name" class="col-sm-2 col-form-label">Name</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="name" v-model="usuario.name">
          </div>
        </div>
        <div class="form-group row">
          <label for="gender" class="col-sm-2 col-form-label">Gender</label>
          <div class="col-sm-10">
            <select class="form-control" id="gender" v-model="usuario.gender">
              <option></option>
              <option>Male</option>
              <option>Female</option>
            </select>
          </div>
        </div>
        <div class="form-group row">
          <label for="email" class="col-sm-2 col-form-label">Email</label>
          <div class="col-sm-10">
            <input id="email" type="email" class="form-control" v-model="usuario.email">
          </div>
        </div>
        <div class="form-group row">
          <label for="address" class="col-sm-2 col-form-label">Address</label>
          <div class="col-sm-10">
            <textarea class="form-control" id="address" v-model="usuario.address"></textarea>
          </div>
        </div>
        <div class="form-group row">
          <label for="Height" class="col-sm-2 col-form-label">Height</label>
          <div class="col-sm-10">
            <input class="form-control" id="Height" type="number" v-model="usuario.height"/>
          </div>
        </div>
        <div class="text-center">
          <router-link to="/" class="btn btn-outline-info" style="border-color: mediumpurple">Cancel</router-link>
          <button class="btn" style="background-color: mediumpurple; color: white" @click="save()">Save</button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from 'axios'
export default {
  name: 'Form',
  data () {
    return {
      usuario: {name: '', gender: '', email: '', address: '', height: ''},
      success: false
    }
  },
  components:{
    axios
  },
  methods:{
    save(){
      axios.post('http://localhost:8000/api/cadastro', {
        name: this.usuario.name,
        gender: this.usuario.gender,
        email: this.usuario.email,
        address: this.usuario.address,
        height: this.usuario.height
      }).then(response => {
        if(response.data.status){
          this.usuario.name = '';
          this.usuario.gender = '';
          this.usuario.email = '';
          this.usuario.address = '';
          this.usuario.height = '';
          this.$router.push('/')
        }
      }).catch(e => {
        this.errors.push(e)
      })

      console.log(this.usuario)
    }
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>

</style>
