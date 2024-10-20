<template>
    <div class="main-container-input">
        <!-- <label :for="name" :class="placeholder ?? null ">{{ name }}:</label> -->
        <input :name="name" :type="type" :placeholder="placeholder"/>
    </div>
</template>

<script>
 export default {
  props: ['name', 'type', 'placeholder']
}
</script>

<style scoped>
.main-container-input {
  display: flex;
  flex-direction: column;
  align-items: flex-start;
  margin-bottom: 15px; /* Space between inputs */
}

label {
  font-weight: bold; /* Make label text bold */
  margin-bottom: 5px; /* Space between label and input */
  color: #333; /* Dark gray color for the label */
}

input {
  padding: 10px; /* Space inside the input */
  border: 1px solid #ccc; /* Light gray border */
  border-radius: 5px; /* Rounded corners */
  font-size: 16px; /* Font size */
  outline: none; /* Remove outline on focus */
  transition: border-color 0.3s; /* Smooth transition for border color */
}

input:focus {
  border-color: #3498db; /* Change border color on focus */
}

input::placeholder {
  color: #aaa; /* Placeholder text color */
}
</style>