<template>
    <div class="team-section">
        <!-- Switch between Team and Roles -->
        <div class="tabs">
            <button :class="{ active: selectedTab === 'team' }" @click="selectedTab = 'team'">Team</button>
            <button :class="{ active: selectedTab === 'roles' }" @click="selectedTab = 'roles'">Roles</button>
        </div>

        <!-- Add/Import/Export buttons -->
        <div v-if="selectedTab === 'team'" class="team-content">
            <div class="actions">
                <AddItemTemplate itemType="Team Member" :fields="['name', 'role', 'status', 'shift']" />
                <button @click="importTeam">Import</button>
                <button @click="exportTeam">Export</button>
            </div>

            <!-- Filter and Search -->
            <div class="filters">
                <select v-model="selectedBulkAction">
                    <option value="">Bulk actions</option>
                    <option value="remove">Deduct</option>
                    <option value="remove">Terminate</option>
                </select>
                <button @click="applyBulkAction">Apply</button>
            </div>
            <div class="filters">
                <!-- Role Filter -->
                <select v-model="selectedRole" @change="filterTeam">
                    <option value="">Filter by role</option>
                    <option value="Manager">Manager</option>
                    <option value="Chef">Chef</option>
                    <option value="Cashier">Cashier</option>
                </select>

                <!-- Status Filter -->
                <select v-model="selectedStatus" @change="filterTeam">
                    <option value="">Filter by status</option>
                    <option value="Active">Active</option>
                    <option value="On leave">On leave</option>
                    <option value="Inactive">Inactive</option>
                </select>

                <!-- Search Input -->
                <input v-model="searchQuery" placeholder="Search by name" @input="filterTeam" />
            </div>

            <!-- Team List -->
            <table class="team-table">
                <thead>
                    <tr>
                        <th></th>
                        <th>Name</th>
                        <th>Role</th>
                        <th>Status</th>
                        <th>Shift</th>
                        <th>Modify</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(member, index) in filteredTeam" :key="index">
                        <td><input type="checkbox" v-model="member.selected" /></td>
                        <td>{{ member.name }}</td>
                        <td>{{ member.role }}</td>
                        <td>{{ member.status }}</td>
                        <td>{{ member.shift }}</td>
                        <td>
                            <button class="edit-button" @click="editMember(index)">Edit</button>
                        </td>
                        <td>
                            <button class="fire-button" @click="fireMember(index)">Deduct</button>
                            <button class="fire-button" @click="fireMember(index)">Terminate</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Roles Tab Content -->
        <div v-if="selectedTab === 'roles'" class="roles-content">
            <!-- Add roles management content here -->
        </div>
    </div>
</template>

<script>
import AddItemTemplate from '../inc/AddItemTemplate.vue';
export default {
    components: { AddItemTemplate },
    data() {
        return {
            selectedTab: 'team',
            selectedRole: '',
            selectedStatus: '',
            searchQuery: '',
            team: [
                { name: 'John Doe', role: 'Manager', status: 'Active', shift: 'Morning' },
                { name: 'Jane Smith', role: 'Chef', status: 'On leave', shift: 'Evening' },
                { name: 'Emily Johnson', role: 'Cashier', status: 'Active', shift: 'Afternoon' },
                { name: 'Michael Brown', role: 'Chef', status: 'Active', shift: 'Morning' },
                { name: 'Sarah Davis', role: 'Cashier', status: 'Inactive', shift: 'Evening' },
            ],
        };
    },
    computed: {
        filteredTeam() {
            return this.team.filter(member => {
                const matchesRole = !this.selectedRole || member.role === this.selectedRole;
                const matchesStatus = !this.selectedStatus || member.status === this.selectedStatus;
                const matchesSearch = !this.searchQuery || member.name.toLowerCase().includes(this.searchQuery.toLowerCase());
                return matchesRole && matchesStatus && matchesSearch;
            });
        },
    },
    methods: {
        applyBulkAction() {
            if (this.selectedBulkAction === 'remove') {
                this.team = this.team.filter(member => !member.selected);
            }
            else if (this.selectedBulkAction === 'deduct') {
                // ba3den
                console.log(0);
            }
        },
        addMember() {
            alert('Add new member functionality goes here.');
        },
        importTeam() {
            alert('Import team functionality goes here.');
        },
        exportTeam() {
            alert('Export team functionality goes here.');
        },
        editMember(index) {
            alert(`Edit member: ${this.team[index].name}`);
        },
        fireMember(index) {
            alert(`Fire member: ${this.team[index].name}`);
        },
        
    },
};
</script>

<style scoped>
.team-section {
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

.filters,
.actions {
    display: flex;
    gap: 15px;
    margin-bottom: 20px;
}

select,
input {
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
.team-table {
    width: 100%;
    border-collapse: collapse;
}

.team-table th,
.team-table td {
    padding: 10px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

.team-table th {
    background-color: #f5f5f5;
    font-weight: bold;
}

.team-table td {
    font-size: 16px;
}

.team-table tr:hover {
    background-color: #f1f1f1;
}

/* Button Styles */
.edit-button {
    background-color: #4CAF50;
    color: white;
    padding: 8px 12px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

.fire-button {
    background-color: #e53935;
    color: white;
    padding: 8px 12px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    margin-left: 5px;
}
</style>
