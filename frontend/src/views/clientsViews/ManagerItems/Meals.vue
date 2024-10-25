<template>
    <div class="table-container">
        <h2>Meals</h2>
        <table class="meals-table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Stock</th>
                    <th>Price</th>
                    <th>Categories</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(meal, index) in meals" :key="index">
                    <td>{{ meal.name }}</td>
                    <td>{{ meal.stock }}</td>
                    <td>{{ meal.price }}</td>
                    <td>{{ meal.categories.join(', ') }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
export default {
    name: 'Meals',
    props: {
        meals: {
            type: Array,
            required: true,
        },
    },
};
</script>

<style scoped>
.table-container {
    background-color: white;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}
</style>