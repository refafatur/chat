<?php
// Panggil file Database.php
include 'Database.php';

// Buat objek/instance
$db = new Database();
$con = $db->Connect();

// Proses query GET
$rows = mysqli_query($con, "SELECT * FROM chat");

$data = array();
$no = 0;
while ($row = mysqli_fetch_assoc($rows)) {
    $data[] = $row;
    $no++;
}

// Tampilkan dengan pengulangan menggunakan array indeks
foreach ($data as $chat) {
    echo "<div class='card mask-custom' style='width: 60%; '>";
    echo "<div class='card-header d-flex justify-content-between p-3' style='border-bottom: 1px solid rgba(255,255,255,.3);'>";
    echo "<p class='fw-bold mb-0'>" . $chat['nama_chat'] . "</p>";
    $date = date_create($chat['tgl_chat']);
    echo "<p class='text-light small mb-1' style='padding-left:50px;'>". date_format($date, "M d") . "</p>";
    echo "</div>";

    echo "<div class='card-body'>";
    echo "<p class='mb-0'>". $chat['text_chat'] ."</p>";
    echo "</div>";
    echo "</div>";
}
?>
