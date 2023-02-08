<template>

    <nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">User Payments</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarScroll">
        <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
            <li class="nav-item">
                <router-link :to="'/'" class="nav-link" style="text-decoration:none;">Home</router-link>
            </li>
            <li class="nav-item">
                <router-link :to="'/dashboard'" class="nav-link" style="text-decoration:none;">Dashboard</router-link>
            </li> 
            <li class="nav-item">
                <router-link :to="'/contact'" class="nav-link" style="text-decoration:none;">Contact</router-link>
            </li>                       
        </ul>
        <form class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
        </div>
    </div>
    </nav>
    
</template>

<script>
export default {

}
</script>

<style>

</style>