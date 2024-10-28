<template>
   <div class="feature-item">
            <img :src="path" alt="Chiefs Hat" />
            <h3>{{ feature }}</h3>
            <p>{{ content }}</p>
    </div>
</template>

<script setup>
    const props = defineProps(['feature', 'content', 'path'])
</script>
 
<style scoped>
.feature-item {
  padding: 20px;
  border-radius: 10px;
  width: 300px;
}

.feature-item img{
    max-width: 10vw;
    max-height: 10vh;
}

.feature-item h3 {
  font-size: 1.5em;
  margin-bottom: 10px;
  color: #c9c8c7
}

.feature-item p {
  font-size: 1em;
  color: #c9c8c7
}
</style>