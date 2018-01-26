<?php

echo '<p><b>Hai '. $arrayTemp['nama'] . ',</b>' ;
echo '<p>Mohon untuk melakukan pembayaran : <b>'. $arrayTemp['nama_iuran'] . 'periode tanggal '. $arrayTemp['tanggal_mulai'] . '  s/d  ' .  $arrayTemp['tanggal_selesai'] . '</b>' ;
echo '<p><b>Total iuran sebesar : '. number_format($arrayTemp['jumlah'] , 0, ".", ",") . '</b>';

echo '<p>Ke nomor rekening berikut : ';
echo '<p>5245042699';
echo '<p>Bank BCA A/n Hasiholan Purba';
echo '<p>-----------------------------';
echo '<p>1260006968299';
echo '<p>Bank Mandiri a/n Hasiholan Purba';
echo '<p>-----------------------------';
echo '<p>0283-01-033120-99-9';
echo '<p>BRI A/n :Hasiholan Purba';
echo '<p>-----------------------------';

echo '<p>Setelah melakukan pembayaran, mohon untuk melakukan konfirmasi pembayaran dengan cara upload bukti pembayaran ke sistem SIA-DEL.';
echo '<p> ';
echo '<p> ';
echo '<p>Atas perhatiannya, kami tim support SIA-DEL mengucapkan terima kasih.';

echo '<p>Salam,';
echo '<p>';
echo '<p>Support IA-DEL';
