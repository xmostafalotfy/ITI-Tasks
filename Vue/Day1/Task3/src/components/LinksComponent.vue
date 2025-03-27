<template>
  <div class="sidebar-container bg-dark rounded border border-">
    <ul class="list-group sidebar-nav">
      <li class="list-group-item d-flex align-items-center bg-dark text-light border-secondary">
        <i class="bi bi-house-door me-3"></i>
        <span>Dashboard</span>
      </li>
      <li class="list-group-item d-flex align-items-center bg-dark text-light border-secondary">
        <i class="bi bi-files me-3"></i>
        <span>Projects</span>
      </li>
      <li class="list-group-item d-flex align-items-center bg-dark text-light border-secondary">
        <i class="bi bi-question-circle me-3"></i>
        <span>Help</span>
      </li>
    </ul>
  </div>
</template>

<script>
export default {
  name: 'SidebarNavigation'
}
</script>

<style scoped>
.sidebar-container {
  margin-top: 20px;
  margin-left: 10px;
  width: 250px;
  border-right: 1px solid #343a40;
}

.list-group-item {
  padding: 1rem 1.5rem;
  cursor: pointer;
  transition: all 0.3s ease;
}

.list-group-item:hover {
  background-color: #343a40;
  padding-left: 2rem;
}

.list-group-item:active {
  background-color: #495057;
}

.list-group-item.active {
  background-color: #0d6efd;
  color: white;
  border-color: #0d6efd;
}

.list-group-item.active i {
  color: white;
}

.bi {
  font-size: 1.1rem;
  transition: all 0.3s ease;
}
</style>
