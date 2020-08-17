import Vue from 'vue'
import Router from 'vue-router'
import Table from "@/pages/table/Table";
import Form from "@/pages/form/Form";
import Edit from "@/pages/edit/Edit";

Vue.use(Router)

export default new Router({
  routes: [
    {
      path: '/',
      name: 'Table',
      component: Table
    },
    {
      path: '/form',
      name: 'Form',
      component: Form
    },
    {
      path: '/edit/:id',
      name: 'Edit',
      component: Edit
    }
  ]
})
