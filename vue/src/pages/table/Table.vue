<template>
  <div class="container my-lg-5">
    <div class="row">
      <div class="col-12 text-center">
        <a href="/" class="link_border_active">List</a>
        <router-link to="/form" class="link_border">Form</router-link>
      </div>
    </div>
    <div class="row">
      <div class="col-12 text-center my-lg-5">
        <router-link class="btn" style="background-color: mediumpurple; color: white" to="/form">Add Talent</router-link>
      </div>
    </div>
    <table class="table table-hover my-lg-4">
      <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Name</th>
        <th scope="col">Gender</th>
        <th scope="col">Email</th>
        <th scope="col">Address</th>
        <th scope="col">Height</th>
        <th scope="col"></th>
        <th scope="col"></th>
      </tr>
      </thead>
      <tbody v-for="item in this.usuarios" :key="item.id">
      <tr>
        <td>{{item.id}}</td>
        <td>{{item.name}}</td>
        <td>{{item.gender}}</td>
        <td>{{item.email}}</td>
        <td>{{item.address}}</td>
        <td>{{item.height}}</td>
        <td><a :href="'edit/'+item.id"><i class="material-icons">create</i></a></td>
        <td><a style="cursor: pointer"><i class="material-icons">delete</i></a></td>
      </tr>
      </tbody>
    </table>
  </div>

</template>

<script>
import axios from 'axios'
export default {
  name: 'Table',
  data () {
    return {
      usuarios: []
    }
  },
  created() {
    axios.get('http://localhost:8000/api/lista').then(response => {
      if(response.data.status){
        this.usuarios = response.data.usuarios;
      }
    })
  },
  methods:{
    delete(id){
      axios.post('http://localhost:8000/api/delete', {id}).then(response => {
        if(response.data.status){
          alert("Usuario de ID = "+id+" excluido com sucesso")
        }
      })
    }

  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>

</style>
