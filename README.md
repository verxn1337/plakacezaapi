# Plaka Ceza Sorgu API

Bu proje, PHP ile çekilmiş basit bir trafik ceza sorgulama API örneğini içermektedir. Kullanıcılar bu API sayesinde plaka numaralarıyla trafik cezalarını sorgulayabilirler. Proje CordisNetwork alt yapısı kullanılarak oluşturulmuştur.

## Not

Bu API, yalnızca CordisNetwork alt yapısını kullanan bir sistemdir ve tüm Türkiye'yi kapsamamaktadır.

## API Yanıtı

API, aşağıdaki bilgileri içeren cevaplar döndürmektedir:

- Plaka
- Borç Türü
- Ad Soyad
- Kimlik Numarası
- Büro
- Büro Telefon Numarası
- Yazılan Ceza
- Toplam Ceza

## Kullanım Örneği 

Aşağıda, API'yi kurduktan sonra nasıl kullanabileceğinizi gösteren bir örnek bulunmaktadır:

http://localhost/plakaceza.php?plaka=Plaka Buraya Yazılacak.
