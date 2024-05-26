<template>
    <AuthenticatedLayout>
      <h1>Tambah Karyawan</h1>
      <form @submit.prevent="submit">
        <div class="mb-3">
          <label for="nik" class="form-label">NIK</label>
          <input type="text" v-model="form.nik" class="form-control" id="nik" />
          <div v-if="form.errors.nik" class="text-danger">{{ form.errors.nik }}</div>
        </div>
        <div class="mb-3">
          <label for="nama" class="form-label">Nama</label>
          <input type="text" v-model="form.nama" class="form-control" id="nama" />
          <div v-if="form.errors.nama" class="text-danger">{{ form.errors.nama }}</div>
        </div>
        <div class="mb-3">
          <label for="ttl" class="form-label">Tanggal Lahir</label>
          <input type="date" v-model="form.ttl" class="form-control" id="ttl" />
          <div v-if="form.errors.ttl" class="text-danger">{{ form.errors.ttl }}</div>
        </div>
        <div class="mb-3">
          <label for="alamat" class="form-label">Alamat</label>
          <textarea v-model="form.alamat" class="form-control" id="alamat"></textarea>
          <div v-if="form.errors.alamat" class="text-danger">{{ form.errors.alamat }}</div>
        </div>
        <div class="mb-3">
          <label for="id_jabatan" class="form-label">ID Jabatan</label>
          <input type="text" v-model="form.id_jabatan" class="form-control" id="id_jabatan" />
          <div v-if="form.errors.id_jabatan" class="text-danger">{{ form.errors.id_jabatan }}</div>
        </div>
        <div class="mb-3">
          <label for="id_dept" class="form-label">ID Departemen</label>
          <input type="text" v-model="form.id_dept" class="form-control" id="id_dept" />
          <div v-if="form.errors.id_dept" class="text-danger">{{ form.errors.id_dept }}</div>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </form>
    </AuthenticatedLayout>
  </template>

  <script setup>
  import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
  import { useForm } from '@inertiajs/inertia-vue3';

  const form = useForm({
    nik: '',
    nama: '',
    ttl: '',
    alamat: '',
    id_jabatan: '',
    id_dept: '',
  });

  const submit = () => {
    form.post('/karyawans', {
      onSuccess: () => {
        // Redirect or handle success as needed
      },
      onError: () => {
        // Handle error
      }
    });
  };
  </script>
