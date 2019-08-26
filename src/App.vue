<template>
  <div id="aws-workbench-app">
    <div class="container">
    <div class="row">
      <div class="col-sm-12">
      <nav class="navbar navbar-dark bg-dark">
        <router-link class="navbar-brand" to="/">
          <img src="/docs/4.3/assets/brand/bootstrap-solid.svg" width="30" height="30" class="d-inline-block align-top" alt="">
          AWS Workbench
        </router-link>
      </nav>
      </div>
    </div>
    <router-view/>
    <!-- End container -->
    </div>
    <!-- End App container -->
  </div>
</template>

<script>
export default {
  name: 'App'
}
</script>

<style lang="scss">
#app {
  font-family: 'Avenir', Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}
</style>
