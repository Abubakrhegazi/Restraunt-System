<template>
    <div class="meals-section">
        <!-- Switch between Meals and Categories -->
        <div class="tabs">
            <button :class="{ active: selectedTab === 'meals' }" @click="selectedTab = 'meals'">Meals</button>
            <button :class="{ active: selectedTab === 'categories' }"
                @click="selectedTab = 'categories'">Categories</button>
        </div>

        <!-- Add/Import/Export buttons -->
        <div v-if="selectedTab === 'meals'" class="meals-content">
            <div class="actions">
                <AddItemTemplate itemType="Meal" :fields="['name', 'category', 'price']"
                    :categories="['Burger', 'Salad', 'Drink']" />
                <button @click="importMeals">Import</button>
                <button @click="exportMeals">Export</button>
            </div>

            <!-- Filter and Search -->
            <div class="filters">
                <select v-model="selectedBulkAction">
                    <option value="">Bulk actions</option>
                    <option value="delete">Delete</option>
                </select>
                <button @click="applyBulkAction">Apply</button>

                <select v-model="selectedCategory" @change="filterMeals">
                    <option value="">Select a category</option>
                    <!-- Populate with categories dynamically -->
                </select>

                <select v-model="selectedProductType" @change="filterMeals">
                    <option value="">Filter by product type</option>
                    <!-- Populate with product types dynamically -->
                </select>

                <select v-model="selectedStockStatus" @change="filterMeals">
                    <option value="">Filter by stock status</option>
                    <!-- Populate with stock statuses dynamically -->
                </select>

                <input v-model="searchQuery" placeholder="Search products" @input="filterMeals" />
            </div>

            <!-- Meals List -->
            <table class="meals-table">
                <thead>
                    <tr>
                        <th><input type="checkbox" v-model="selectAll" @change="toggleSelectAll" /></th>
                        <th>Name</th>
                        <th>Stock</th>
                        <th>Price</th>
                        <th>Categories</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="meal in filteredMeals" :key="meal.id">
                        <td><input type="checkbox" v-model="meal.selected" /></td>
                        <td>{{ meal.name }}</td>
                        <td :class="{ 'in-stock': meal.inStock, 'out-of-stock': !meal.inStock }">
                            {{ meal.inStock ? 'In stock' : 'Out of stock' }}
                        </td>
                        <td>{{ meal.price }}</td>
                        <td>{{ meal.categories }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Categories Tab Content -->
        <div v-if="selectedTab === 'categories'" class="categories-content">
            <!-- Add categories management content here -->
        </div>
    </div>
</template>

<script>
import AddItemTemplate from '../inc/AddItemTemplate.vue';

import { getMealsByResturantId, deleteMeals } from '@/api/mealApi';

export default {
    components: { AddItemTemplate },
    data() {
        return {
            selectedTab: 'meals',
            selectedBulkAction: '',
            selectedCategory: '',
            selectedProductType: '',
            selectedStockStatus: '',
            searchQuery: '',
            selectAll: false,
            meals: [],
        };
    },
    computed: {
        filteredMeals() {
            return this.meals.filter(meal => {
                let matchesCategory = !this.selectedCategory || meal.categories.includes(this.selectedCategory);
                let matchesStock = !this.selectedStockStatus || (this.selectedStockStatus === 'inStock' ? meal.inStock : !meal.inStock);
                let matchesSearch = meal.name.toLowerCase().includes(this.searchQuery.toLowerCase());
                return matchesCategory && matchesStock && matchesSearch;
            });
        },
    },
    methods: {
        addNewMeal() {
            alert('Adding...');

        },
        importMeals() {
            alert('Importing meals...');
        },
        exportMeals() {
            alert('Exporting meals...');
        },
        applyBulkAction() {
            if (this.selectedBulkAction === 'delete') {
                console.log(this.meals)
                let deletedMeals = this.meals.filter(meal => meal.selected);
                deletedMeals.forEach(async (meal) => {
                    console.log(meal)
                    console.log(meal.name,meal.id);
                    const response = await deleteMeals(meal.name, meal.meal_id); // Await each deleteMeals call
                    console.log(response);
                });
                this.meals = this.meals.filter(meal => !meal.selected);
            }
        },
        filterMeals() {
        },
        toggleSelectAll() {
            this.meals.forEach(meal => {
                meal.selected = this.selectAll;
            });
        },
    },
    mounted() {
        const getMeals = async () => {
            const response = await getMealsByResturantId(0)
            if (response) {
                console.log('Successful');
                console.log(response);
                this.meals = response.map(meal => ({
                    id: meal.meal_id, // Use meal_id from API response
                    name: meal.name,
                    inStock: meal.availiability === 1, // Convert availability to boolean
                    price: `${meal.price}$`, // Format price
                    categories: meal.category, // Use category from API response
                    description: meal.description, // Include description if needed
                    ingredients: meal.ingredients, // Include ingredients if needed
                }));
            } else {
                console.error(response);
            }
        }

        getMeals()
    }

};
</script>

<style scoped>
.meals-section {
    margin: 20px;
    padding: 20px;
    background-color: white;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.tabs {
    display: flex;
    gap: 10px;
    margin-bottom: 20px;
}

.tabs button.active {
    font-weight: bold;
    background-color: #d32f2f;
    color: white;
}

/* Filters and Actions */
.filters,
.actions {
    display: flex;
    gap: 15px;
    margin-bottom: 20px;
}

select {
    padding: 10px;
    border-radius: 5px;
    border: 1px solid #ccc;
    background-color: #f5f5f5;
}

button {
    padding: 10px 20px;
    border-radius: 5px;
    border: none;
    cursor: pointer;
    background-color: #3498db;
    color: white;
}

button:hover {
    background-color: #2980b9;
}

/* Table Styles */
.meals-table {
    width: 100%;
    border-collapse: collapse;
}

.meals-table th,
.meals-table td {
    padding: 10px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

.meals-table th {
    background-color: #f5f5f5;
    font-weight: bold;
}

.meals-table td {
    font-size: 16px;
}

.meals-table tr:hover {
    background-color: #f1f1f1;
}

/* Stock Status Colors */
.in-stock {
    color: green;
}

.out-of-stock {
    color: red;
}
</style>
