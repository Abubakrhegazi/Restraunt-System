<template>
    <div>
        <button @click="openPopup" class="btn-submit">Add {{ itemType }}</button>

        <div v-if="isPopupVisible" class="popup">
            <div class="popup-content">
                <h2>Add a {{ itemType }}</h2>
                <form @submit.prevent="addItem">
                    <!-- Dynamic fields based on itemType -->
                    <div v-for="(field, index) in fields" :key="index" class="input-group">
                        <label :for="field">{{ formatLabel(field) }}</label>
                        <input v-if="field !== 'category'" type="text" :id="field" v-model="formData[field]" required />
                        <select v-if="field === 'category'" v-model="formData.category" required>
                            <option v-for="category in categories" :key="category" :value="category">{{ category }}
                            </option>
                        </select>
                    </div>

                    <button type="submit" class="btn-submit">Add {{ itemType }}</button>
                </form>
                <button @click="closePopup" class="close-btn">Close</button>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        itemType: String,
        fields: Array,
        categories: Array,
    },
    data() {
        return {
            isPopupVisible: false,
            formData: this.fields.reduce((acc, field) => {
                acc[field] = ""; 
                return acc;
            }, {}),
        };
    },
    methods: {
        openPopup() {
            this.isPopupVisible = true;
        },
        closePopup() {
            this.isPopupVisible = false;
        },
        addItem() {
            console.log(`Added ${this.itemType}:`, this.formData);
            this.closePopup();
        },
        formatLabel(field) {
            return field.charAt(0).toUpperCase() + field.slice(1).replace(/([A-Z])/g, " $1");
        }
    },
};
</script>

<style scoped>
* {
    font-family: 'Roboto', 'sans-serif';
}

.popup {
    display: flex;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.7);
    justify-content: center;
    align-items: center;
    z-index: 1000;
}

.popup-content {
    background-color: #2c2c2c;
    padding: 30px;
    border-radius: 15px;
    width: 40%;
    border: 2px solid #8B0000;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
    text-align: center;
}

.popup-content h2 {
    color: #f5f5f5;
    font-size: 24px;
    margin-bottom: 20px;
    border-bottom: 1px solid #8B0000;
    padding-bottom: 10px;
}

.input-group {
    margin-bottom: 15px;
    text-align: left;
}

.input-group label {
    display: block;
    color: #fff;
    margin-bottom: 5px;
    font-size: 14px;
}

.input-group input,
.input-group select {
    width: 100%;
    padding: 10px;
    border-radius: 5px;
    border: 1px solid #ccc;
    font-size: 14px;
    background-color: #fff;
}

.input-group input:focus,
.input-group select:focus {
    outline: none;
    border: 1px solid #8B0000;
}

.btn-submit {
    padding: 10px 20px;
    border-radius: 5px;
    border: none;
    cursor: pointer;
    background-color: #8B0000;
    color: white;
    margin-top: 10px;
    font-size: 16px;
}

.btn-submit:hover {
    background-color: #a60000;
}

.close-btn {
    padding: 10px 20px;
    border-radius: 5px;
    border: none;
    cursor: pointer;
    background-color: #666;
    color: white;
    margin-top: 15px;
    font-size: 16px;
}

.close-btn:hover {
    background-color: #888;
}
</style>
