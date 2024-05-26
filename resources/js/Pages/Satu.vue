<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
  <AuthenticatedLayout>
    <div class="container mt-5">
      <h1 class="mb-4">No. 1</h1>
      <div class="mb-3">
        <label for="patternType" class="form-label">Pattern Type:</label>
        <select v-model="patternType" id="patternType" class="form-select">
          <option value="1">Tipe 1</option>
          <option value="2">Tipe 2</option>
          <option value="3">Tipe 3</option>
        </select>
      </div>
      <div class="mb-3">
        <label for="starCount" class="form-label">Number of Stars:</label>
        <input
          type="text"
          v-model.number="starCount"
          id="starCount"
          class="form-control"
          @input="validateInput"
        />
        <div v-if="error" class="text-danger mt-1">{{ error }}</div>
      </div>
      <button class="btn btn-primary" @click="generatePattern">Submit</button>
      <div v-if="pattern" class="mt-4">
        <pre class="bg-light p-3">{{ pattern }}</pre>
      </div>
    </div>
  </AuthenticatedLayout>
</template>

<script>
export default {
  data() {
    return {
      patternType: "1",
      starCount: "",
      pattern: "",
      error: "",
    };
  },
  methods: {
    validateInput() {
      if (!Number.isInteger(Number(this.starCount))) {
        this.error = "Input must be a number";
      } else {
        this.error = "";
      }
    },
    generatePattern() {
      if (this.error) return;

      let starCount = Number(this.starCount);
      let result = "";

      switch (this.patternType) {
        case "1":
          for (let i = 1; i <= starCount; i++) {
            result += "* ".repeat(i) + "\n";
          }
          break;
        case "2":
          for (let i = starCount; i > 0; i--) {
            result += "* ".repeat(i) + "\n";
          }
          break;
        case "3":
          for (let i = 1; i <= starCount; i++) {
            let spaces = " ".repeat((starCount - i) * 2);
            result += spaces + "* ".repeat(i) + "\n";
          }
          break;
        default:
          result = "Invalid pattern type";
      }

      this.pattern = result;
    },
  },
};
</script>

<style scoped>
pre {
  white-space: pre-wrap;
  word-wrap: break-word;
}
</style>
