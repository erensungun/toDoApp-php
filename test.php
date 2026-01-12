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

// ürün satıştamı bulma

foreach ($urunler as $urun) {
    if($urun["satistami"]){
        echo $urun["urunAdi"]." adlı ürün satışımız ".$urun["fiyat"]." fiyatı üstünden devam etmektedir."."<br>";
    }
};

// en pahalı hangisi

$enPahali = $urunler[0];

foreach ($urunler as $urun) {
    if($urun["fiyat"] > $enPahali["fiyat"]){
        $enPahali = $urun;
    }
};

echo "En pahalı ürün {$enPahali["urunAdi"]} isimli ürünümüzdür. <br>";

// ters çevirme

$metin = "Hello World!";
echo strrev($metin);
echo "<br>";
// asalmı kontrolü

function asalMi(int $n): bool
{
    if ($n < 2) return false;
    if ($n === 2) return true;
    if ($n % 2 === 0) return false;

    for ($i = 3; $i * $i <= $n; $i += 2) {
        if ($n % $i === 0) return false;
    }
    return true;
}

$sonucMesaji = "";
$girdi = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    echo "Kontrol başlangıcı";
    echo "<br>";
    $girdi = trim($_POST["sayi"] ?? "");
    echo "doğrulama başlangıcı";
    echo "<br>";
    // Doğrulama: boş mu, tam sayı mı?
    if ($girdi === "") {
        $sonucMesaji = "Lütfen bir sayı gir.";
    } elseif (!preg_match('/^-?\d+$/', $girdi)) {
        $sonucMesaji = "Lütfen sadece tam sayı gir (örn: 17).";
    } else {
        $n = (int)$girdi;

        if ($n < 0) {
            $sonucMesaji = "Negatif sayılar asal olarak kabul edilmez.";
        } else {
            $sonucMesaji = asalMi($n)
                ? "$n bir asal sayıdır"
                : "$n asal değildir";
        }
    }
}
?>
<!doctype html>
<html lang="tr">
<head>
    <meta charset="utf-8" />
    <title>Asal Sayı Kontrolü</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; }
        .box { max-width: 420px; padding: 16px; border: 1px solid #ddd; border-radius: 10px; }
        input { width: 100%; padding: 10px; margin: 10px 0; }
        button { padding: 10px 14px; cursor: pointer; }
        .result { margin-top: 12px; font-weight: bold; }
    </style>
</head>
<body>
<div class="box">
    <h2>Asal Sayı Kontrolü</h2>

    <form method="post">
        <label for="sayi">Sayı:</label>
        <input
            type="text"
            id="sayi"
            name="sayi"
            value="<?= htmlspecialchars($girdi, ENT_QUOTES, "UTF-8") ?>"
            placeholder="Örn: 17"
        />
        <button type="submit">Kontrol Et</button>
    </form>

    <?php if ($sonucMesaji !== ""): ?>
        <div class="result"><?= htmlspecialchars($sonucMesaji, ENT_QUOTES, "UTF-8") ?></div>
    <?php endif; ?>
</div>
</body>
</html>