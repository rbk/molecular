<?php
/**
 * Quote Post Format
 *
 * @category Quote
 * @package  Molecular
 * @author   Richard Keller <richard@richardkeller.net>
 * @license  Na https://blog.richardkeller.net/license
 * @version  PHP: 5.6.3 
 * @link     idk
 */
?>
<article class="excerpt">
<h2 class="caps">Favorite Quote - <?php the_date("d/m/Y"); ?></h2>
  <?php 
    $content = get_the_content();
    if (strpos("blockquote", $content) !== false) {
      echo $content;
    } else {
      $content = strip_tags($content, "<br><p><em><strong>");
      echo "<blockquote>$content</blockquote>";
    }
  ?>
</article>
