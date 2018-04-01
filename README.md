# [Nöbetçi Eczane Bulma Servisi](http://api.eczanapp.space)
## API Dökümantasyonu ve Kaynak Kodu

### [Uygulama](http://eczanapp.space)

Özellikler:

 * Şehre göre arama
 * Latitude ve Longitude değerleri


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
    "name": "Boncuk Eczanesi",
    "district": "Çankaya",
    "address": "3. Cad. No:47 / A Bahçelievler /",
    "lat": 39.9273064,
    "lng": 32.8268946
  },
  {
    "name": "Cemile Gül Eczanesi",
    "district": "Çankaya",
    "address": "Göktürk Mah. 115. Cad. No:6 / 15 Seyranbağları /",
    "lat": 39.9117223,
    "lng": 32.8715051
  },
  {
    "name": "Akkılıç Eczanesi",
    "district": "Çankaya",
    "address": "Ziya Gökalp Cad. No:62 / A Kolej /",
    "lat": 39.924801,
    "lng": 32.863478
  }
```

## Hakkında

* İstek, şikayet ve öneriler için lütfen iletişime geçin!
