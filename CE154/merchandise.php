
<!--  Student Registration Number: 2402515-->


<?php 
include('inc/header.php'); 
include('inc/db_connect.php'); // Here is our new bridge!
?>

<main class="page-main">
  <section class="section-card shop-title-box">
    <h1 class="shop-title">Shop</h1>
  </section>

  <section class="shop-layout">
    <div class="section-card shop-content" style="width: 100%;">
      <div class="section-header">
        <p class="section-kicker">Featured artworks</p>
        <h2 class="section-title">Shop Items</h2>
      </div>
      
      <div class="shop-grid">
        <?php
        // Ask the database for all the merchandise
        $sql = "SELECT * FROM merchandise";
        $result = $conn->query($sql);

        // If we found items, loop through them and print the HTML cards
        if ($result && $result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                ?>
                <article class="merch-card">
                  <div>
                    <div class="merch-thumbnail">
                      <img src="<?php echo htmlspecialchars($row['thumbnail_url']); ?>" alt="<?php echo htmlspecialchars($row['title']); ?>" class="merch-image" loading="lazy">
                    </div>
                    <span class="item-type-badge"><?php echo htmlspecialchars($row['category']); ?></span>
                    <h3><?php echo htmlspecialchars($row['title']); ?></h3>
                    <p><?php echo htmlspecialchars($row['description']); ?></p>
                    <div class="merch-price">&pound;<?php echo number_format($row['price'], 2); ?></div>
                  </div>
                  <div class="merch-card-actions">
  <a href="merchandise-item.php?id=<?php echo htmlspecialchars($row['ref_id']); ?>" class="btn btn-secondary">View details</a>
  <form action="basket.php" method="POST" style="flex: 1; display: flex;">
    <input type="hidden" name="add_item_id" value="<?php echo htmlspecialchars($row['ref_id']); ?>">
    <button type="submit" class="btn btn-primary" style="width: 100%;">Add to basket</button>
  </form>
</div>
                </article>
                <?php
            }
        } else {
            echo "<p>No items found in the database.</p>";
        }
        ?>
      </div>
    </div>
  </section>
</main>

<?php include('inc/footer.php'); ?>