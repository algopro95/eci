<template>
    <AuthenticatedLayout>
      <h1>Edit Jabatan</h1>
      <form @submit.prevent="update">
        <div class="form-group">
          <label for="nama_jabatan">Nama Jabatan</label>
          <input v-model="form.nama_jabatan" type="text" class="form-control" id="nama_jabatan" />
          <div v-if="errors.nama_jabatan" class="text-danger">{{ errors.nama_jabatan }}</div>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
      </form>
    </AuthenticatedLayout>
  </template>

  <script setup>
  import { ref } from 'vue'
  import { useForm, usePage, router } from '@inertiajs/inertia-vue3'

  const { props } = usePage()
  const form = useForm({
    nama_jabatan: props.value.jabatan.nama_jabatan
  })

  const errors = ref({})

  const update = () => {
    form.put(`/jabatans/${props.value.jabatan.id}`, {
      onError: (err) => errors.value = err
    })
  }
  </script>
