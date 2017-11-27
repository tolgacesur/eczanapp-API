# [Nöbetçi Eczane Bulma Servisi](http://eczanapp.space)
## API Dökümantasyonu ve Kaynak Kodu

### [http://eczanapp.space](http://eczanapp.space)

Özellikler:

 * Şehre göre arama


## Kullanımı

API base URL : `http://api.eczanapp.space`

### Web API Endpoint Reference:

Method | Endpoint | Return
------------ | ------------- | -------------
GET | /pharmacy/{cityName} | JSON

```url
/pharmacy/{cityName}
```

## Örnek


 ```url
 http://api.eczanapp.space/pharmacy/ankara
 ````

Return  :+1:

```json
{
  "2": {
    "eczaneAdi": " Yılmaz Eczanesi",
    "eczaneAdres": " Menderes Bulvarı Sağlık 1. Sok. No:2 Hasanoğlan /Elmadağ/ Ankara",
    "eczaneTelefon": " +903128663771"
  },
  "3": {
    "eczaneAdi": " Özlem Eczanesi",
    "eczaneAdres": " Yeni Mah. 305 Sok. No:8/A Merkez/ Kırıkkale",
    "eczaneTelefon": " +903182244999"
  }
}
```

## Hakkında

Bu serviste [Vehbi Akdoğan](http://vehbiakdogan.com)'ın Php ile Günlük Nöbetçi Eczane Listesini Json,Text,Array Olarak Veren [Php Sınıfı](https://github.com/vehbiakdogan/NobetciEczane) kullanılmıştır.


* Bu serviste veriler [hastanebul.com.tr](http://hastanebul.com.tr) adresinden alınmaktadır.
* İstek, şikayet ve öneriler için lütfen iletişime geçin!
