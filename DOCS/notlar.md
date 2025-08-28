# Rehber Projesi

## DB Tanımları

### Birimler

- id
- birim_adi
- konumu

### Unvanlar

- id
- unvan_adi

## İş Listesi

- Önce adminer ile rehber adlı veritabanı oluşturulur.
- .env dosyasına veritabanı bilgileri girilir.
- Model, migration ve controller dosyaları oluşturulur.
- Örnek Prompt: "Bu tablolar için controller hazırla.
  Model Bindin kullan. REST API projesi olacak. try gibi hata kontrolleri OLMASIN,
  CRUD işlemlerini yerine getirebilsin.
- api.php dosyasına route tanımları yapılır.
- bootstrap/app.php dosyasına api satırı eklenecek.
- Rest Client için api-test.http dosyası oluşturulur
  Örnek Prompt: https://marketplace.windsurf.com/extension/humao/rest-client sayfasında bilgilere göre projemin api-test.hpp dosyasını oluştur

- `php artisan route:list` ile route'lar doğru biçimde eklendi mi kontrol et

```text
$ php artisan route:list

  GET|HEAD        / ..................................................................................
  GET|HEAD        api/birimler ................................ birimler.index › BirimController@index
  POST            api/birimler ................................ birimler.store › BirimController@store
  GET|HEAD        api/birimler/{birim} .......................... birimler.show › BirimController@show
  PUT|PATCH       api/birimler/{birim} ...................... birimler.update › BirimController@update
  DELETE          api/birimler/{birim} .................... birimler.destroy › BirimController@destroy
  GET|HEAD        api/unvanlar ................................ unvanlar.index › UnvanController@index
  POST            api/unvanlar ................................ unvanlar.store › UnvanController@store
  GET|HEAD        api/unvanlar/{unvan} .......................... unvanlar.show › UnvanController@show
  PUT|PATCH       api/unvanlar/{unvan} ...................... unvanlar.update › UnvanController@update
  DELETE          api/unvanlar/{unvan} .................... unvanlar.destroy › UnvanController@destroy
  GET|HEAD        storage/{path} ....................................................... storage.local
  GET|HEAD        up .................................................................................

                                                                                   Showing [13] routes
```

- Şimdi, `php artisan migrate` ile migration'lar uygulanır.

```text
$ php artisan migrate

   INFO  Preparing database.

  Creating migration table .............................................................. 20.07ms DONE

   INFO  Running migrations.

  0001_01_01_000000_create_users_table .................................................. 46.07ms DONE
  0001_01_01_000001_create_cache_table .................................................. 10.17ms DONE
  0001_01_01_000002_create_jobs_table ................................................... 37.02ms DONE
  2025_08_28_120232_create_birimler_table ................................................ 5.88ms DONE
  2025_08_28_120233_create_unvanlar_table ................................................ 4.77ms DONE

```

- Laravel projemiz hazır. Servisi başlatmak için `php artisan serve` komutunu kullanabilirsiniz.

## Proje Klonlama

```bash
git clone https://github.com/your-repo/rehber-laravel.git
```

- `git.env` dosyasının adı `.env` olarak değiştirilecek
- database tanımları `.env` dosyasına eklenecek
- `composer install` ile paketlerin yüklenmesi
- `php artisan key:generate` ile key oluşturulur
- `php artisan migrate` ile migration'lar uygulanır
- `php artisan route:list` ile route'lar kontrol edilir
- `php artisan serve` ile servis başlatılır

## API Testi

- `api-test.http` dosyası içinde test işlemleri yapılır
