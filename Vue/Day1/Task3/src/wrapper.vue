<template>
  <div class="bg-dark">
    <HeaderComponent/>
    <div class="d-flex">
      <LinksComponent/>
      <DataTable/>
    </div>
    <FooterComponents/>
  </div>
  
</template>

<script>
import HeaderComponent from './components/HeaderComponent.vue';
import FooterComponents from './components/FooterComponents.vue';
import LinksComponent from './components/LinksComponent.vue';
import DataTable from './components/DataTable.vue';
export default {
    components :{
      HeaderComponent,
      FooterComponents,
      LinksComponent,
      DataTable
    }
}
</script>

<style>

</style>