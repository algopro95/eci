<template>
    <AuthenticatedLayout>
      <h1>Tambah Jabatan</h1>
      <form @submit.prevent="store">
        <div class="form-group">
          <label for="nama_jabatan">Nama Jabatan</label>
          <input v-model="form.nama_jabatan" type="text" class="form-control" id="nama_jabatan" />
          <div v-if="errors.nama_jabatan" class="text-danger">{{ errors.nama_jabatan }}</div>
        </div>
        <div class="form-group">
          <label for="nama_jabatan">Id Level</label>
          <input v-model="form.id_level" type="text" class="form-control" id="id_level" />
          <div v-if="errors.id_level" class="text-danger">{{ errors.id_level }}</div>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
      </form>
    </AuthenticatedLayout>
  </template>

  <script setup>
  import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
  import { ref } from 'vue'
  import { useForm, router } from '@inertiajs/inertia-vue3'

  const form = useForm({
    nama_jabatan: '',
    id_level: '',
  })

  const errors = ref({})

  const store = () => {
    form.post('/jabatans', {
      onError: (err) => errors.value = err
    })
  }
  </script>
