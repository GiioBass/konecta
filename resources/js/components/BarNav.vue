<template>
  <nav class="navbar navbar-expand-lg bg-body-tertiary bg-dark ">
    <div class="container-fluid">
      <router-link to="/" class="navbar-brand" >Konecta Store</router-link>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">

          <li class="nav-item">
            <router-link class="nav-link" to="/">Products</router-link>
          </li>
          <li class="nav-item">
            <router-link class="nav-link" to="/product/create">Create Product</router-link>
          </li>
          <li class="nav-item">
            <router-link class="nav-link" to="/sell/create">Sell</router-link>
          </li>

        </ul>
      </div>
    </div>
  </nav>
</template>
<script setup >

import { useRouter, useRoute, RouterLink } from 'vue-router'


</script>