<template>
  <div class="container-fluid px-4 py-3">
    <div class="card shadow-sm bg-dark text-light border border-muted">
      <div class="card-header bg-dark border-bottom border-secondary text-white d-flex justify-content-between align-items-center">
        <h5 class="mb-0 text-center w-100">Students List</h5>
      </div>
      <div class="card-body p-0">
        <div class="table-responsive">
          <table class="table table-dark table-hover mb-0">
            <thead>
              <tr>
                <th class="text-center">ID</th>
                <th>Name</th>
                <th>City</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="item in users" :key="item.id">
                <td class="text-center">{{ item.id }}</td>
                <td>{{ item.name }}</td>
                <td>{{ item.city }}</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <div class="card-footer bg-dark border-top border-secondary text-white">
        <div class="d-flex justify-content-between align-items-center">
          <span class="small">Showing {{ users.length }} students</span>
          <div class="btn-group">
            <button @click="showAddForm = true" class="btn btn-sm btn-light text-dark">
              <i class="bi bi-plus-circle me-1"></i> Add Student
            </button>
          </div>
        </div>
      </div>
    </div>

    <div v-if="showAddForm" class="modal-backdrop fade show bg-dark opacity-75"></div>
    <div v-if="showAddForm" class="modal fade show d-block" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content bg-dark text-light border-light">
          <div class="modal-header bg-primary text-white">
            <h5 class="modal-title">Add New Student</h5>
            <button type="button" class="btn-close btn-close-white" @click="closeForm"></button>
          </div>
          <div class="modal-body">
            <form @submit.prevent="submitForm">
              <div class="mb-3">
                <label for="studentName" class="form-label">Name</label>
                <input
                  type="text"
                  class="form-control bg-dark text-light border-primary"
                  id="studentName"
                  v-model="newStudent.name"
                  required
                >
              </div>
              <div class="mb-3">
                <label for="studentCity" class="form-label">City</label>
                <input
                  type="text"
                  class="form-control bg-dark text-light border-primary"
                  id="studentCity"
                  v-model="newStudent.city"
                  required
                >
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" @click="closeForm">Cancel</button>
                <button type="submit" class="btn btn-primary">Save Student</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'UserTable',
  data() {
    return {
      users: [
        {id: 100, name: "Mostafa", city: "Giza"},
        {id: 200, name: "Mohamed", city: "New York"},
        {id: 300, name: "Ahmed", city: "Alex"},
        {id: 400, name: "Mahmoud", city: "Aswan"}
      ],
      showAddForm: false,
      newStudent: {
        name: '',
        city: ''
      }
    }
  },
  methods: {
    closeForm() {
      this.showAddForm = false;
      this.newStudent = { name: '', city: '' };
    },
    submitForm() {
      const newId = Math.max(...this.users.map(user => user.id)) + 1;
      this.users.push({
        id: newId,
        name: this.newStudent.name,
        city: this.newStudent.city
      });
      this.closeForm();
    }
  }
}
</script>

<style scoped>
.table {
  font-size: 0.9rem;
  color: #f8f9fa;
}

.table th {
  font-weight: 500;
  text-transform: uppercase;
  font-size: 0.8rem;
  letter-spacing: 0.5px;
}

.table tbody tr:hover {
  background-color: #495057;
  transform: translateY(-1px);
}

.card-header,
.card-footer {
  border: none;
}

.modal-backdrop {
  z-index: 1040;
}

.modal {
  z-index: 1050;
}
</style>
