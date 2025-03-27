<template>
  <div>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark border-bottom border-muted">
      <div class="container d-flex justify-content-center">
        <a class="navbar-brand fw-bold text-light" href="#">Open Source</a>
      </div>
    </nav>
  </div>
</template>

<script>
export default {
  name: 'AppNavbar'
}
</script>

<style scoped>
.navbar {
  padding: 0.8rem 0;
}

.navbar-brand {
  font-size: 1.5rem;
  letter-spacing: 1px;
}

@media (min-width: 992px) {
  .navbar {
    padding: 1rem 0;
  }
}
</style>
