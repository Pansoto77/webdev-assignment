
<!--  Student Registration Number: 2402515-->

<?php 
include('inc/header.php'); 
include('inc/db_connect.php'); // Connect to our database!

// 1. Get the item ID from the URL (e.g., ?id=tee-neon-rain)
$item_ref = isset($_GET['id']) ? $_GET['id'] : '';

// 2. Protect against hackers (SQL Injection)
$safe_ref = $conn->real_escape_string($item_ref);

// 3. Ask the database for THIS specific item
$sql = "SELECT * FROM merchandise WHERE ref_id = '$safe_ref'";
$result = $conn->query($sql);

$item = null;
if ($result && $result->num_rows > 0) {
    $item = $result->fetch_assoc();
}
?>

<main class="page-main">
  <section class="section-card product-details-header no-box">
    <h1 class="product-details-title">Product Details</h1>
  </section>

  <section class="section-card no-box">
    <div class="merch-details">
      <?php if ($item): // If we found the item in the database, show it! ?>
        
        <div class="merch-details-image">
          <img src="<?php echo htmlspecialchars($item['thumbnail_url']); ?>" alt="<?php echo htmlspecialchars($item['title']); ?>" class="merch-image">
        </div>
        
        <div class="merch-details-info">
          <h1><?php echo htmlspecialchars($item['title']); ?></h1>
          <p class="merch-artist-name">Elara Quinn</p>
          <div class="merch-details-price">&pound;<?php echo number_format($item['price'], 2); ?></div>
          <div class="merch-details-meta"><strong>Item Type:</strong> <?php echo htmlspecialchars($item['category']); ?></div>
          <p class="merch-product-description"><strong>Description:</strong> <?php echo htmlspecialchars($item['description']); ?></p>
          
          <div class="merch-details-actions" style="display: flex; gap: 1rem;">
  <form action="basket.php" method="POST" style="flex: 1; display: flex;">
    <input type="hidden" name="add_item_id" value="<?php echo htmlspecialchars($item['ref_id']); ?>">
    <button type="submit" class="btn btn-primary" style="width: 100%;">Add to basket</button>
  </form>
</div>
          
          <div class="merch-details-meta" style="margin-top: 1rem;">
             <strong>Published:</strong> <?php echo date("d F Y", strtotime($item['published_date'])); ?><br>
             <strong>Ref ID:</strong> <?php echo htmlspecialchars($item['ref_id']); ?>
          </div>
          <div class="merch-details-actions">
            <a href="merchandise.php" class="btn btn-secondary">Back to store</a>
          </div>
        </div>

      <?php else: // If the item ID was wrong or missing ?>
        <div class="merch-details-info">
          <p>Sorry, we couldn't find that item in the database.</p>
          <a href="merchandise.php" class="btn btn-secondary">Return to shop</a>
        </div>
      <?php endif; ?>
    </div>
  </section>
</main>

<?php include('inc/footer.php'); ?>
