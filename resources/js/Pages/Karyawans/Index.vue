<template>
    <AuthenticatedLayout>
      <h1>Data Karyawan</h1>
      <Link :href="route('karyawans.create')" class="btn btn-primary mb-3">Tambah Karyawan</Link>
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>ID</th>
            <th>NIK</th>
            <th>Nama</th>
            <th>TTL</th>
            <th>Alamat</th>
            <th>ID Jabatan</th>
            <th>ID Departemen</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="karyawan in karyawans" :key="karyawan.id">
            <td>{{ karyawan.id }}</td>
            <td>{{ karyawan.nik }}</td>
            <td>{{ karyawan.nama }}</td>
            <td>{{ karyawan.ttl }}</td>
            <td>{{ karyawan.alamat }}</td>
            <td>{{ karyawan.id_jabatan }}</td>
            <td>{{ karyawan.id_dept }}</td>
            <td>
              <!-- <Link :href="`/karyawans/${karyawan.id}/edit`" class="btn btn-warning btn-sm">Edit</Link> -->
              <button @click="destroy(karyawan.id)" class="btn btn-danger btn-sm">Hapus</button>
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
const karyawans = props.karyawans;

const destroy = (id) => {
  if (confirm('Are you sure you want to delete this item?')) {
    router.delete(`/karyawans/${id}`);
  }
};
</script>
