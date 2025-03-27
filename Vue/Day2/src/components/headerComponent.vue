<template>
  <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
            <div class="container">
                
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <router-link class="nav-link" to="/"> <h4>BookStore</h4> </router-link>
                    <ul class="navbar-nav ms-auto">

                        <li class="nav-item">
                           <router-link class="nav-link" to="/cart"> Cart </router-link>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
</template>

<script>
export default {

}
</script>

<style>
    .navbar {
            background: linear-gradient(135deg, #abbeff, #525252);
            padding: 15px;
        }
    .navbar-brand, .nav-link {
            color: white !important;
            font-weight: bold;
            transition: 0.3s;
        }
    .nav-link:hover {
            color: #008bad !important;
        }
</style>