<template>
    <div class="promotions-section">
        <!-- Tab Navigation -->
        <div class="tabs">
            <button :class="{ active: selectedTab === 'promotions' }" @click="selectedTab = 'promotions'">
                Promotions
            </button>
            <button :class="{ active: selectedTab === 'campaigns' }" @click="selectedTab = 'campaigns'">
                Campaigns
            </button>
        </div>

        <!-- Actions Section -->
        <div v-if="selectedTab === 'promotions'" class="promotions-content">
            <div class="actions">
                <button @click="addPromotion">Add Promotion</button>
                <button @click="importPromotions">Import</button>
                <button @click="exportPromotions">Export</button>
            </div>

            <!-- Filter and Search -->
            <div class="filters">
                <select v-model="selectedBulkAction">
                    <option value="">Bulk actions</option>
                    <option value="delete">Delete</option>
                </select>
                <button @click="applyBulkAction">Apply</button>
                <input v-model="searchQuery" placeholder="Search promotions" @input="filterPromotions" />
            </div>

            <!-- Promotions List -->
            <table class="promotions-table">
                <thead>
                    <tr>
                        <th><input type="checkbox" v-model="selectAll" @change="toggleSelectAll" /></th>
                        <th>Name</th>
                        <th>Discount</th>
                        <th>Validity</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="promotion in filteredPromotions" :key="promotion.id">
                        <td><input type="checkbox" v-model="promotion.selected" /></td>
                        <td>{{ promotion.name }}</td>
                        <td>{{ promotion.discount }}</td>
                        <td>{{ promotion.validity }}</td>
                        <td>
                            <button class="edit-button" @click="editPromotion(promotion.id)">Edit</button>
                            <button class="delete-button" @click="deletePromotion(promotion.id)">Delete</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Campaigns Tab Content -->
        <div v-if="selectedTab === 'campaigns'" class="campaigns-content">
            <!-- Campaigns content goes here -->
            <p>Campaigns management will be implemented here.</p>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            selectedTab: 'promotions',
            selectedBulkAction: '',
            searchQuery: '',
            selectAll: false,
            promotions: [
                { id: 1, name: 'New Year Sale', discount: '20%', validity: '2024-12-31', selected: false },
                { id: 2, name: 'Summer Discount', discount: '15%', validity: '2024-08-31', selected: false },
            ],
        };
    },
    computed: {
        filteredPromotions() {
            return this.promotions.filter((promotion) =>
                promotion.name.toLowerCase().includes(this.searchQuery.toLowerCase())
            );
        },
    },
    methods: {
        addPromotion() {
            const newPromotion = { id: Date.now(), name: 'New Promotion', discount: '10%', validity: '2025-01-01', selected: false };
            this.promotions.push(newPromotion);
            alert('New promotion added!');
        },
        importPromotions() {
            alert('Import promotions functionality will be implemented here.');
        },
        exportPromotions() {
            alert('Export promotions functionality will be implemented here.');
        },
        applyBulkAction() {
            if (this.selectedBulkAction === 'delete') {
                this.promotions = this.promotions.filter((promotion) => !promotion.selected);
                alert('Selected promotions deleted.');
            }
        },
        toggleSelectAll() {
            this.promotions.forEach((promotion) => {
                promotion.selected = this.selectAll;
            });
        },
        editPromotion(id) {
            const promotion = this.promotions.find((p) => p.id === id);
            if (promotion) {
                promotion.name = prompt('Edit Promotion Name', promotion.name) || promotion.name;
                promotion.discount = prompt('Edit Promotion Discount', promotion.discount) || promotion.discount;
                promotion.validity = prompt('Edit Promotion Validity', promotion.validity) || promotion.validity;
                alert('Promotion updated!');
            }
        },
        deletePromotion(id) {
            this.promotions = this.promotions.filter((promotion) => promotion.id !== id);
            alert('Promotion deleted.');
        },
    },
};
</script>

<style scoped>
.promotions-section {
    padding: 20px;
}

.tabs {
    display: flex;
    gap: 10px;
    margin-bottom: 15px;
}

.tabs button {
    padding: 10px 15px;
    border: none;
    background-color: #f0f0f0;
    cursor: pointer;
}

.tabs button.active {
    background-color: #4CAF50;
    color: white;
}

.actions,
.filters {
    display: flex;
    gap: 10px;
    margin-bottom: 15px;
}

.actions button {
    padding: 8px 12px;
    border: none;
    background-color: #4CAF50;
    color: white;
    cursor: pointer;
}

.filters select,
.filters input {
    padding: 8px;
    border: 1px solid #ddd;
}

.promotions-table {
    width: 100%;
    border-collapse: collapse;
}

.promotions-table th,
.promotions-table td {
    padding: 10px;
    border: 1px solid #ddd;
    text-align: left;
}

.promotions-table th {
    background-color: #f9f9f9;
}

.edit-button,
.delete-button {
    padding: 5px 8px;
    margin-right: 5px;
    border: none;
    cursor: pointer;
}

.edit-button {
    background-color: #2196F3;
    color: white;
}

.delete-button {
    background-color: #f44336;
    color: white;
}
</style>
