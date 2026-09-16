<script setup>
defineProps({
  card: {
    type: Object,
    required: true,
  },
  index: {
    type: Number,
    required: true,
  },
});

const colors = ["pink", "gray", "rose", "peach"];
</script>
<template>
    <a href="#" class="practice-card" :class="`practice-card--${colors[index % colors.length]}`">
        <span v-if="card.icon?.type === 'dashicons' && card.icon.value" class="dashicons" :class="card.icon.value" aria-hidden="true"></span>
        <p v-if="card.duration" class="mt-4 mb-2">{{ card.duration }}</p>
        <h3 v-if="card.title" class="mb-2 practice-title">{{ card.title }}</h3>
        <p v-if="card.description" class="practice-description">{{ card.description }}</p>
    </a>
</template>