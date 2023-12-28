# laravel-keycloak
Ini merupakan package laravel untuk manajemen auth keycloak. package ini meliputi
1. mendapatkan auth URL untuk digunakan oleh frontend
2. mendapatkan access token dari parameter "code" yang diterima dari frontend
3. mendapatkan detail informasi terkait user yang berhasil terautentikasi
4. memperbaharui access token menggunakan refresh token
5. menyimpan informasi user yang login di database memory redis
6. menyimpan user yang berhasil terautentikasi ke database table user jika belum ada sebelumnya.

package ini masih berupa provider laravel dan perlu diletakkan di directory app/Providers/Keycloak di dalam project laravel.

cd app/Providers/
git clone https://github.com/tnromy/laravel-keycloak keycloak

harap diperhatikan bahwa nama repo ini adalah laravel-keycloak sehingga perlu ditambahkan parameter nama directory "keycloak" saat melakukan clone agar tersimpan sebagai "keycloak" bukan "laravel-keycloak" di directory Providers.

di masa yang akan datang, package ini akan tersedia di composer sehingga tutorial pada README ini akan diubah dan bisa saja tidak relevan lagi.