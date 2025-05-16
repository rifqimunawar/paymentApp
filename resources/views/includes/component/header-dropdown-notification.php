<?php
use App\Helpers\Fungsi;
use App\Helpers\GetSettings;
$notifikasi = GetSettings::getNotifikasiPesan();


function limit_text($text, $limit = 50, $end = '...')
{
  $text = strip_tags($text);
  if (strlen($text) <= $limit) {
    return $text;
  }
  return substr($text, 0, $limit) . $end;
}
?>

<div class="dropdown-menu media-list dropdown-menu-end">
  <div class="dropdown-header">NOTIFICATIONS (<?= count($notifikasi) ?>)</div>

  <?php foreach ($notifikasi as $item): ?>
    <a href="<?= "/pesan/" . $item->id ?>" class="dropdown-item media">
      <div class="media-left">
        <i class="fab fa-facebook-messenger text-blue media-object bg-gray-500"></i>
      </div>
      <div class="media-body">
        <h6 class="media-heading"><?= htmlspecialchars($item->title ?? 'Pesan Baru') ?></h6>
        <p><?= htmlspecialchars(limit_text($item->message ?? '-', 50)) ?></p>
        <div class="text-muted fs-10px"><?= date('d M Y H:i', strtotime($item->created_at)) ?></div>
      </div>
    </a>
  <?php endforeach; ?>

  <div class="dropdown-footer text-center">
    <a href="/pesan" class="text-decoration-none">View more</a>
  </div>
</div>