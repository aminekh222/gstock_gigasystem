<?php
include 'entete.php';
?>
<div class="home-content">
  <div class="overview-boxes">
    <div class="box">
      <div class="right-side">
        <div class="box-topic">Commandes</div>
        <div class="number">40,876</div>
        <div class="indicator">
          <i class="bx bx-up-arrow-alt"></i>
          <span class="text">Depuis hier</span>
        </div>
      </div>
      <i class="bx bx-cart-alt cart"></i>
    </div>
    <div class="box">
      <div class="right-side">
        <div class="box-topic">Ventes</div>
        <div class="number">38,876</div>
        <div class="indicator">
          <i class="bx bx-up-arrow-alt"></i>
          <span class="text">Depuis hier</span>
        </div>
      </div>
      <i class="bx bxs-cart-add cart two"></i>
    </div>
    <div class="box">
      <div class="right-side">
        <div class="box-topic">Profit</div>
        <div class="number">12,876 MAD</div>
        <div class="indicator">
          <i class="bx bx-up-arrow-alt"></i>
          <span class="text">Depuis hier</span>
        </div>
      </div>
      <i class="bx bx-cart cart three"></i>
    </div>
    <div class="box">
      <div class="right-side">
        <div class="box-topic">Revenu</div>
        <div class="number">11,086 MAD</div>
        <div class="indicator">
          <i class="bx bx-down-arrow-alt down"></i>
          <span class="text">Aujourd'hui</span>
        </div>
      </div>
      <i class="bx bxs-cart-download cart four"></i>
    </div>
  </div>

  <div class="sales-boxes">
    <div class="recent-sales box">
      <div class="title">Ventes récentes</div>
      <table class="mtable">
        <tr>
          <th>Article</th>
          <th>Prix</th>
          <th>Date</th>
        </tr>
        <?php
        $vente = getLastVente();
        if (!empty($vente) && is_array($vente)) {
            foreach ($vente as $value) {
        ?>
          <tr>
            <td><?= htmlspecialchars($value['nom_article']) ?></td>
            <td><?= htmlspecialchars($value['prix']) ?></td>
            <td><?= date('d/m/Y H:i:s', strtotime($value['date_vente'])) ?></td>
          </tr>
        <?php
            }
        }
        ?>
      </table>
      <br>
      <div class="button">
        <a href="vente.php">Voir Tout</a>
      </div>
    </div>

    <div class="top-sales box">
      <div class="title">Produits les plus vendus</div><br><br><br><br>
      <div class="sales-details">
        <table class="mtable">
          <tr>
            <th>Article</th>
            <th>Prix</th>
          </tr>
          <?php
          $vente = getMostVente();
          if (!empty($vente) && is_array($vente)) {
              foreach ($vente as $value) {
          ?>
            <tr>
              <td><?= htmlspecialchars($value['nom_article']) ?></td>
              <td><?= htmlspecialchars($value['prix']) ?></td>
            </tr>
          <?php
              }
          }
          ?>
        </table>
      </div>
    </div>
  </div>
</div>
</section>

<?php
include 'pied.php';
?>
