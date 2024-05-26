<template>
    <AuthenticatedLayout>
      <h1>Tambah Level</h1>
      <form @submit.prevent="submit">
        <div class="mb-3">
          <label for="nama_level" class="form-label">Nama Level</label>
          <input type="text" v-model="form.nama_level" class="form-control" id="nama_level" />
          <div v-if="form.errors.nama_level" class="text-danger">{{ form.errors.nama_level }}</div>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </form>
    </AuthenticatedLayout>
  </template>

  <script setup>
  import { useForm } from '@inertiajs/inertia-vue3';

  const form = useForm({
    nama_level: '',
  });

  const submit = () => {
    form.post('/levels', {
      onSuccess: () => {
        // Redirect or handle success as needed
      },
      onError: () => {
        // Handle error
      }
    });
  };
  </script>
