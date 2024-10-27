<template>
  <div class="main-container-input">
    <input :style="error ? `background-color: #fee9e8;` : undefined"
      :name="name"
      :type="type"
      :placeholder="placeholder"
      v-model="inputValue" 
      @input="updateValue" 
    />
    <p v-if="error">{{ error }}</p>
  </div>
</template>

<script>
export default {
  props: ['name', 'type', 'placeholder', 'modelValue', 'error'],
  data() {
    return {
      inputValue: this.modelValue || ''
    };
  },
  watch: {
    modelValue(newValue) {
      this.inputValue = newValue; 
    },
  },
  methods: {
    updateValue() {
      this.$emit('update:modelValue', this.inputValue); 
    },
  },
};
</script>

<style scoped>
.main-container-input {
  display: flex;
  flex-direction: column;
  align-items: flex-start;
  margin-bottom: 30px; 
  width: 100%;
}

  
.main-container-input input{
  background-color: rgba(255, 255, 255, 0.3);
  padding: 10px; 
  border: 1px solid #ccc;
  border-radius: 10px; 
  font-size: 16px; 
  outline: none; 
  width: 100%;
  min-width: 350px;
  transition: border-color 0.3s; 
}


.main-container-input input:hover {
  backdrop-filter: blur(2px);
  background-color: rgba(255, 255, 255, 0.7);
  box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
}

.main-container-input input:focus {
  outline: none;
  backdrop-filter: blur(8px);
  background-color: #f4f2f2;
  border-width: 1px;
}

.main-container-input p{

  color: #ff1a1a;
  margin: 2px;
  margin-left: 5px;
}


input::placeholder {
  color: #aaa;
}

@media (max-width: 600px) {
    .main-container-input input {
      min-width: 280px;
      max-width: 350px;
    }
  }


</style>
