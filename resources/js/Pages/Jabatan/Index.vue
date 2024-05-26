<template>
    <AuthenticatedLayout>
      <h1>Data Jabatan</h1>
      <Link href="/jabatans/create" class="btn btn-primary mb-3">Tambah Jabatan</Link>
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>ID</th>
            <th>Nama Jabatan</th>
            <th>ID Level</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="jabatan in jabatans" :key="jabatan.id">
            <td>{{ jabatan.id }}</td>
            <td>{{ jabatan.nama_jabatan }}</td>
            <td>{{ jabatan.id_level }}</td>
            <td>
              <!-- <Link :href="`/jabatans/${jabatan.id}/edit`" class="btn btn-warning btn-sm">Edit</Link> -->
              <button @click="destroy(jabatan.id)" class="btn btn-danger btn-sm">Hapus</button>
            </td>
          </tr>
        </tbody>
      </table>
    </AuthenticatedLayout>
  </template>

  <script setup>
  import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
  import { Link, usePage, router } from '@inertiajs/vue3'

  const { props } = usePage()
  const jabatans = props.jabatans;

  const destroy = (id) => {
    if (confirm('Are you sure you want to delete this item?')) {
      router.delete(`/jabatans/${id}`)
    }
  }
  </script>
