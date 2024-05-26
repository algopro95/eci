<template>
    <AuthenticatedLayout>
      <h1>Data Level</h1>
      <Link href="/levels/create" class="btn btn-primary mb-3">Tambah Level</Link>
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>ID</th>
            <th>Nama Level</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="level in levels" :key="level.id">
            <td>{{ level.id }}</td>
            <td>{{ level.nama_level }}</td>
            <td>
              <!-- <Link :href="`/levels/${level.id}/edit`" class="btn btn-warning btn-sm">Edit</Link> -->
              <button @click="destroy(level.id)" class="btn btn-danger btn-sm">Hapus</button>
            </td>
          </tr>
        </tbody>
      </table>
    </AuthenticatedLayout>
  </template>

  <script setup>
  import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
  import { Link, usePage, router } from '@inertiajs/vue3';

  const { props } = usePage();
  const levels = props.levels;

  const destroy = (id) => {
    if (confirm('Are you sure you want to delete this item?')) {
      router.delete(`/levels/${id}`);
    }
  };
  </script>
