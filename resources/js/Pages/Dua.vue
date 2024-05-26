<script setup>
import { ref, computed } from 'vue';
import axios from 'axios';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';

const number = ref('');
const response = ref(null);
const error = ref('');

const convert = async () => {
  if (!isValidNumber(number.value)) {
    setError('Input must be a valid number');
    return;
  }

  try {
    const result = await axios.post('/dua/convert', {
      number: number.value,
    });
    setData(result.data);
  } catch (err) {
    console.error(err);
    setError('An error occurred during conversion');
  }
};

const isValidNumber = (num) => {
  return /^\d+$/.test(num);
};

const setData = (data) => {
  response.value = data;
  error.value = '';
};

const setError = (message) => {
  error.value = message;
  response.value = null;
};

const formattedNumber = computed(() =>
  response.value ? response.value.formatted_number : ''
);

const words = computed(() => (response.value ? response.value.words : ''));
</script>

<template>
  <AuthenticatedLayout>
    <Head title="Currency Converter" />
    <div class="container mt-5">
      <h1 class="mb-4">No. 2</h1>
      <div class="form-group">
        <label for="number">Enter a Number:</label>
        <div class="input-group">
          <input
            type="text"
            class="form-control"
            id="number"
            v-model="number"
            placeholder="Enter a number"
          />
          <div class="input-group-append">
            <button class="btn btn-primary" @click="convert">Convert</button>
          </div>
        </div>
        <small v-if="error" class="text-danger">{{ error }}</small>
      </div>
      <div v-if="response" class="mt-4">
        <h3>Output:</h3>
        <p><strong>Formatted Number:</strong> {{ formattedNumber }}</p>
        <p><strong>Terbilang:</strong> {{ words }}</p>
      </div>
    </div>
  </AuthenticatedLayout>
</template>

<style scoped>
.container {
  max-width: 600px;
  margin: auto;
}

.form-group {
  margin-bottom: 20px;
}
</style>
