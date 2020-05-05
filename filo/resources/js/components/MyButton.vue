<!-- Style -->
<style>

/*
.my-button {
    background-color: #333;
    color: #fff;
}
*/

</style>

<!-- Templates -->
<template>
<!-- parent div, everything goes inside -->
<div>

    <button :type="type" class="my-button" v-text="text"></button>

</div>

</template>

<!-- Script -->
<script>

export default {
    mounted() {
        console.log('Component mounted.')
    },

    props: [
      'text',
      'type'

    ]
}

</script>
