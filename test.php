<?php
$urunler = [
    [
        "urunAdi" => "Iphone 14",
        "fiyat" => "30000",
        "satistami" => true,
    ],
    [
        "urunAdi" => "Iphone 15",
        "fiyat" => "35000",
        "satistami" => true,
    ],
    [
        "urunAdi" => "Iphone 16",
        "fiyat" => "40000",
        "satistami" => false,
    ]
];

foreach ($urunler as $urun) {
    if($urun["satistami"]){
        echo $urun["urunAdi"]." adlı ürün satışımız ".$urun["fiyat"]." fiyatı üstünden devam etmektedir."."<br>";
    }
};

$enPahali = $urunler[0];

foreach ($urunler as $urun) {
    if($urun["fiyat"] > $enPahali["fiyat"]){
        $enPahali = $urun;
    }
};

echo "En pahalı ürün {$enPahali["urunAdi"]} isimli ürünümüzdür.";