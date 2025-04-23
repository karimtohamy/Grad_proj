<template>
  <div class="flex items-center" >

    <div class="text-sm text-main me-2">
      {{ count }}
      reviews
    </div>
    <div class="stars-landing" :style="{ '--rating': rating }" aria-label="Rating of this product">
      ★★★★★
    </div>
  </div>

</template>

<script setup>
const props = defineProps({
  rating: {
    type: Number,
    required: true,
  },
  count: {
    type: Number ?? null,
    required: true
  }
})
</script>

<!-- Keep style unscoped -->
<style>
.stars-landing {
  --star-size: 1.5rem;
  --star-color: #b6b7b9;
  --star-background: #facc15;
  --percent: calc(var(--rating) / 5 * 100%);

  font-size: var(--star-size);
  font-family: monospace, 'Arial', sans-serif;
  color: var(--star-color);
  letter-spacing: 0.0001rem;
  line-height: 1;
  /* Removes vertical spacing */
  display: inline-block;
  /* Keeps container tight */
  position: relative;
  vertical-align: middle;
  /* Helps in centering */
}

.stars-landing::before {
  content: "★★★★★";
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  letter-spacing: 0.0001rem;
  background: linear-gradient(90deg,
      var(--star-background) 0%,
      var(--star-background) var(--percent),
      var(--star-color) var(--percent),
      var(--star-color) 100%);
  -webkit-background-clip: text;
  background-clip: text;
  -webkit-text-fill-color: transparent;
  pointer-events: none;
}
</style>
