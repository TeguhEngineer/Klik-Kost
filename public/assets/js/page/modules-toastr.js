"use strict";

// Custom
$("#eror-gambar").click(function() {
  iziToast.warning({
    // title: 'Error!',
    message: 'Gambar tidak boleh lebih dari 5',
    position: 'topRight'
  });
});

$("#eror-ukuran-gambar").click(function() {
  iziToast.warning({
    // title: 'Error!',
    message: 'Gambar tidak boleh lebih dari 3mb',
    position: 'topRight'
  });
});

$("#edit-password").click(function() {
  iziToast.success({
    // title: 'Hello, world!',
    message: 'Password berhasil diubah',
    position: 'topRight'
  });
});

$("#edit-status").click(function() {
  iziToast.success({
    // title: 'Hello, world!',
    message: 'Status kos berhasil diubah',
    position: 'topRight'
  });
});

$("#gagal-login").click(function() {
  iziToast.error({
    // title: 'Hello, world!',
    message: 'Username dan Password tidak valid',
    position: 'topRight'
  });
});

$("#gagal-edit-password").click(function() {
  iziToast.error({
    // title: 'Hello, world!',
    message: 'Gagal edit password, pastikan password yang di inputkan sama!',
    position: 'topRight'
  });
});

$("#gagal-edit-data").click(function() {
  iziToast.error({
    // title: 'Hello, world!',
    message: 'Gagal edit data, pastikan data yang diinputkan sesuai ketentuan!',
    position: 'topRight'
  });
});


$("#verifikasi").click(function() {
  iziToast.success({
    // title: 'Hello, world!',
    message: 'Data berhasil diverifikasi',
    position: 'topRight'
  });
});

$("#create").click(function() {
  iziToast.success({
    // title: 'Hello, world!',
    message: 'Data berhasil disimpan',
    position: 'topRight'
  });
});

$("#edit").click(function() {
  iziToast.success({
    // title: 'Hello, world!',
    message: 'Data berhasil diubah.',
    position: 'topRight'
  });
});

$("#delete").click(function() {
  iziToast.success({
    // title: 'Hello, world!',
    message: 'Data berhasil dihapus',
    position: 'topRight'
  });
});


// Default
$("#toastr-1").click(function() {
  iziToast.info({
    title: 'Hello, world!',
    message: 'This awesome plugin is made iziToast toastr',
    position: 'topRight'
  });
});

$("#toastr-2").click(function() {
  iziToast.success({
    title: 'Hello, world!',
    message: 'This awesome plugin is made by iziToast',
    position: 'topRight'
  });
});

$("#toastr-3").click(function() {
  iziToast.warning({
    title: 'Hello, world!',
    message: 'This awesome plugin is made by iziToast',
    position: 'topRight'
  });
});

$("#toastr-4").click(function() {
  iziToast.error({
    title: 'Hello, world!',
    message: 'This awesome plugin is made by iziToast',
    position: 'topRight'
  });
});

$("#toastr-5").click(function() {
  iziToast.show({
    title: 'Hello, world!',
    message: 'This awesome plugin is made by iziToast',
    position: 'bottomRight' 
  });
});

$("#toastr-6").click(function() {
  iziToast.show({
    title: 'Hello, world!',
    message: 'This awesome plugin is made by iziToast',
    position: 'bottomCenter' 
  });
});

$("#toastr-7").click(function() {
  iziToast.show({
    title: 'Hello, world!',
    message: 'This awesome plugin is made by iziToast',
    position: 'bottomLeft' 
  });
});

$("#toastr-8").click(function() {
  iziToast.show({
    title: 'Hello, world!',
    message: 'This awesome plugin is made by iziToast',
    position: 'topCenter' 
  });
});
