<template>
    <div class="box">
        <img :src="icon" alt="icon" class="box-icon" />
        <p class="box-label">{{ label }}</p>
    </div>
</template>

<script>
export default {
    name: 'ManagerBox',
    props: {
        label: String,
        icon: String,
    },
};
</script>

<style scoped>
.box {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    background-color: #fff;
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    cursor: pointer;
    width: 150px;
    height: 150px;
    /* More space for a larger card-like button */
}

.box-icon {
    width: 50px;
    height: 50px;
    margin-bottom: 15px;
}

.box-label {
    font-size: 18px;
    font-weight: bold;
    text-align: center;
}
</style>
