<template>
    <AuthenticatedLayout>
      <h1>Daftar Departemen</h1>
      <Link href="/departments/create" class="btn btn-primary mb-3">Tambah Departemen</Link>
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>ID</th>
            <th>Nama Departemen</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="department in departments" :key="department.id">
            <td>{{ department.id }}</td>
            <td>{{ department.nama_dept }}</td>
            <td>
              <!-- <Link :href="`/departments/${department.id}/edit`" class="btn btn-warning btn-sm">Edit</Link> -->
              <button @click="destroy(department.id)" class="btn btn-danger btn-sm">Hapus</button>
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
  const departments = props.departments;

  const destroy = (id) => {
    if (confirm('Are you sure you want to delete this item?')) {
      router.delete(`/departments/${id}`);
    }
  };
  </script>

