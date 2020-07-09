# REST API Server dengan CodeIgniter 3 + HMVC
REST API Server pake Codeigniter 3.1.11 + HMVC


### Membuat Controller Baru

1. Jika ingin menggunakan fitur HMVC: `class ... extends MX_Controller` atau `class ... extends MY_Controller`
1. Jika ingin murni bawaan Codeigniter saja: `class ... extends CI_Controller`
1. Jika ingin menggunakan fungsi REST: `class ... extends ke API_Controller`


### Tentang HMVC
Struktur:
```
applications
+-- modules
    +-- api
    |   +-- controllers
    |   +-- models         (jika dibutuhkan)
    |   +-- views          (jika dibutuhkan)
    |
    +-- admin
    |   +-- controllers
    |   +-- models
    |   +-- views
    |
    +-- member
    |   +-- controllers
    |   +-- models
    |   +-- views
    |
    +-- other
```

Tips: untuk memperpendek url, gunakan routing :)


### Contoh _Rest Controller_ yang siap pakai:
`applications/modules/api/controllers/User.php`

perhatikan:

`class User extends API_Controller`

`API_Controller` ada di `applications/core`

`API_Controller` meng-___extends RestController___

`RestController` ada di `vendor/chriskacerguis/codeigniter-restserver/src`

`RestController` meng-___extends MX_Controller___


### Membuat Controller RESTful lain
buat saja controller baru meng-extend API_Controller, contoh:
new file name = Another.php
```
<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Another extends API_Controller {
  ...
}
// end of: Another.php
```


### Kalau *RestServer* ga jalan
1. Posisi di root folder, HAPUS (atau rename) folder "vendor"
1. lakukan "composer update"
1. Hapus (atau rename) file `vendor/chriskacerguis/codeigniter-restserver/src/RestServer.php` dan ganti dengan file dari `/assets/patch/codeigniter-restserver/RestController.php`
1. Lihat isi file *RestServer.php*, cari baris buka class ini dan pastikan valuenya seperti ini: `class RestController extends \MX_Controller`

### Pastikan:
1. `base_url` sudah di-set
1. Pada `config.php`, baris `$config['composer_autoload'] = FCPATH . 'vendor/autoload.php';` <-- sesuaikan PATH folder vendornya

### Mengaktifkan Autentikasi
1. Setting database dengan benar
1. Export file SQL: `api_tables.sql`, itu akan menghasilkan 2 tabel: `api_keys` dan `api_logs`
1. Edit `config/rest.php`, set bagian ini menjadi true: `$config['rest_enable_keys'] = true;`
1. Buat beberapa sampel entri di tabel `api_keys`, utamanya kolom `user_id` dan `api_key`
1. Buat request GET dengan POSTMAN atau apapun, bagian header tambahkan key: `X-API-KEY` dengan value: `api_key` yang tadi dibuat di point sebelumnya

### URL yang bisa dicoba
Asumsi: base_url = `http://localhost/`
`GET` `http://localhost/api/user/userlist`
`GET` `http://localhost/api/v1/user/userlist`
`POST `http://localhost/api/user/test`
`PUT` `http://localhost/api/user/users`

