<template>
    <div class="calendar-view">
        <h1 class="profile-header">Calendar</h1>
        <h2>Employee Schedule</h2>
        <vue-cal
            :events="events"
            @cell-click="addEvent"
            :time="false"
            :disable-views="['days']"
            :view="'month'"
            locale="en"
        />
    </div>
</template>

<script>
import VueCal from 'vue-cal';
import 'vue-cal/dist/vuecal.css';

export default {
    components: { VueCal },
    props: {
        events: Array,
    },
    methods: {
        addEvent(event) {
            this.$emit('add-event', event);
        },
    },
};
</script>

<style scoped>
.calendar-view {
    color: #854848;
}

.profile-header {
    font-size: 2rem;
    color: #8b0000;
    margin-bottom: 20px;
}
</style>
