
<!--  Student Registration Number: 2402515-->

<?php 
include('inc/header.php'); 
include('inc/db_connect.php'); 

// 1. ADD ITEM TO BASKET
if (isset($_POST['add_item_id'])) {
    $item_id = $_POST['add_item_id'];
    if (isset($_SESSION['basket'][$item_id])) {
        $_SESSION['basket'][$item_id]++;
    } else {
        $_SESSION['basket'][$item_id] = 1;
    }
    header("Location: basket.php");
    exit();
}

// 2. INCREASE QUANTITY
if (isset($_POST['increase_item_id'])) {
    $item_id = $_POST['increase_item_id'];
    if (isset($_SESSION['basket'][$item_id])) {
        $_SESSION['basket'][$item_id]++;
    }
    header("Location: basket.php");
    exit();
}

// 3. DECREASE QUANTITY
if (isset($_POST['decrease_item_id'])) {
    $item_id = $_POST['decrease_item_id'];
    if (isset($_SESSION['basket'][$item_id])) {
        $_SESSION['basket'][$item_id]--;
        // If it hits 0, remove it entirely!
        if ($_SESSION['basket'][$item_id] <= 0) {
            unset($_SESSION['basket'][$item_id]);
        }
    }
    header("Location: basket.php");
    exit();
}

// 4. CLEAR ENTIRE BASKET
if (isset($_POST['clear_basket'])) {
    $_SESSION['basket'] = [];
    header("Location: basket.php");
    exit();
}
?>

<main class="page-main">
  <section class="section-card shop-title-box">
    <h1 class="shop-title">Your Basket</h1>
  </section>

  <section class="section-card no-box">
    <div id="basket-container">
      
      <?php if (empty($_SESSION['basket'])): // IF BASKET IS EMPTY ?>
        <div class="basket-layout">
          <div class="basket-left">
            <p class="basket-empty">Your basket is empty. Browse the <a href="merchandise.php">shop</a> to add items.</p>
          </div>
          <aside class="basket-right">
            <div class="basket-totals">
              <div class="basket-total-row"><span>Subtotal</span><strong>&pound;0.00</strong></div>
              <div class="basket-total-row"><span>Shipping</span><strong>&pound;0.00</strong></div>
              <div class="basket-total-row basket-grand-total"><span>Total</span><strong>&pound;0.00</strong></div>
              <button class="btn btn-primary" type="button" disabled>Proceed to checkout</button>
            </div>
          </aside>
        </div>

      <?php else: // IF BASKET HAS ITEMS ?>
        <div class="basket-layout">
          <div class="basket-left">
            <?php 
            $subtotal = 0;
            
            // Loop through the session basket, look up each item in the database, and print it
            foreach ($_SESSION['basket'] as $id => $quantity) {
                $safe_id = $conn->real_escape_string($id);
                $sql = "SELECT title, price, thumbnail_url FROM merchandise WHERE ref_id = '$safe_id'";
                $result = $conn->query($sql);
                
                if ($result && $row = $result->fetch_assoc()) {
                    $item_total = $row['price'] * $quantity;
                    $subtotal += $item_total;
                    ?>
                    <div style="display:flex; gap:15px; margin-bottom: 1.5rem; border-bottom: 1px solid #eee; padding-bottom: 1.5rem;">
                      <img src="<?php echo htmlspecialchars($row['thumbnail_url']); ?>" alt="thumbnail" style="width: 80px; height: 80px; object-fit: cover; border-radius: 4px;">
                      
                      <div style="flex-grow: 1;">
                        <h3 style="margin: 0 0 0.5rem 0; font-size: 1.1rem;"><?php echo htmlspecialchars($row['title']); ?></h3>
                        
                        <div style="display: flex; align-items: center; gap: 10px; margin-top: 0.5rem;">
                          <p style="margin: 0;">Quantity:</p>
                          
                          <form method="POST" style="margin: 0; display: inline-flex;">
                              <input type="hidden" name="decrease_item_id" value="<?php echo htmlspecialchars($id); ?>">
                              <button type="submit" class="btn btn-secondary" style="padding: 2px 10px; min-width: auto; line-height: 1;">-</button>
                          </form>
                          
                          <strong><?php echo $quantity; ?></strong>
                          
                          <form method="POST" style="margin: 0; display: inline-flex;">
                              <input type="hidden" name="increase_item_id" value="<?php echo htmlspecialchars($id); ?>">
                              <button type="submit" class="btn btn-secondary" style="padding: 2px 10px; min-width: auto; line-height: 1;">+</button>
                          </form>
                        </div>
                        
                      </div>

                      <div style="font-weight: bold; font-size: 1.1rem;">
                        &pound;<?php echo number_format($item_total, 2); ?>
                      </div>
                    </div>
                    <?php
                }
            }
            ?>
            <form method="POST" style="margin-top: 1rem;">
                <button type="submit" name="clear_basket" class="btn btn-secondary">Clear entire basket</button>
            </form>
          </div>

          <aside class="basket-right">
            <div class="basket-totals">
              <div class="basket-total-row"><span>Subtotal</span><strong>&pound;<?php echo number_format($subtotal, 2); ?></strong></div>
              <div class="basket-total-row"><span>Shipping</span><strong>&pound;5.00</strong></div>
              <div class="basket-total-row basket-grand-total"><span>Total</span><strong>&pound;<?php echo number_format($subtotal + 5, 2); ?></strong></div>
              <button class="btn btn-primary" type="button" onclick="alert('Checkout integration is outside the scope of this assignment!');">Proceed to checkout</button>
            </div>
          </aside>
        </div>
      <?php endif; ?>

    </div>
  </section>
</main>

<?php include('inc/footer.php'); ?>
