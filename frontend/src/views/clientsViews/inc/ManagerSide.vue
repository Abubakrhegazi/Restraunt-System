<template>
    <aside class="sidebar">
        <ul>
            <li><a href="#">QR Code</a></li>
            <li><a href="#">Sales</a></li>
            <li><a href="#">Meals</a></li>
            <li><a href="#">Team</a></li>
            <li><a href="#">Settings</a></li>
        </ul>
    </aside>
</template>

<script>
export default {
    name: 'SideBar',
};
</script>

<style scoped>
.sidebar {
    background-color: #f2f2f2;
    padding: 20px;
    width: 200px;
    height: 100vh;
    /* Full viewport height */
    box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
}

.sidebar ul {
    list-style: none;
    padding: 0;
}

.sidebar ul li {
    margin-bottom: 15px;
}

.sidebar ul li a {
    text-decoration: none;
    color: #333;
    font-weight: bold;
    display: block;
    padding: 10px;
    border-radius: 5px;
    transition: background-color 0.3s;
}

.sidebar ul li a:hover {
    background-color: #f44d43;
    color: white;
}
</style>
