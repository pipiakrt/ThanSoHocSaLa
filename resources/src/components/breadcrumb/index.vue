<template>
<div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
    <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
        <div class="d-flex align-items-center flex-wrap mr-1">
            <div class="d-flex align-items-baseline flex-wrap mr-5">
                <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                    <li class="breadcrumb-item text-muted">
                        <router-link to="/" class="text-muted">Dashboard</router-link>
                    </li>
                    <li v-for="(link, i) in data.links" :key="i" class="breadcrumb-item text-muted">
                        <router-link :to="link.url" class="text-muted" v-text="link.name"></router-link>
                    </li>
                </ul>
            </div>
        </div>
        <div class="d-flex align-items-center">
            <router-link :to="data.action.url" class="btn btn-light-primary font-weight-bolder btn-sm">
                <i :class="data.action.icon"></i>
                {{ data.action.text }}
            </router-link>
        </div>
    </div>
</div>
</template>
<script>
export default {
    props: ["data"]
}
</script>