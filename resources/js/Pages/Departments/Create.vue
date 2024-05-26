<template>
    <AuthenticatedLayout>
      <h1>Tambah Departemen</h1>
      <form @submit.prevent="submit">
        <div class="mb-3">
          <label for="nama_dept" class="form-label">Nama Departemen</label>
          <input type="text" v-model="form.nama_dept" class="form-control" id="nama_dept" />
          <div v-if="form.errors.nama_dept" class="text-danger">{{ form.errors.nama_dept }}</div>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </form>
    </AuthenticatedLayout>
  </template>

  <script>
  import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
  import { useForm } from '@inertiajs/inertia-vue3';

  export default {
    components: {
      AuthenticatedLayout,
    },

    setup() {
      const form = useForm({
        nama_dept: '',
      });

      const submit = () => {
        form.post('/departments', {
          onSuccess: () => {
            // Redirect or handle success as needed
          },
          onError: () => {
            // Handle error
          }
        });
      };

      return {
        form,
        submit,
      };
    }
  }
  </script>
