<!--  Student Registration Number: 2402515-->
<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
// Create an empty basket if one doesn't exist yet
if (!isset($_SESSION['basket'])) {
    $_SESSION['basket'] = [];
}
?>

<?php
// Get the current filename to determine the "on-state" for navigation
$current_page = basename($_SERVER['PHP_SELF']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Artist Portfolio & Store</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="css/style.css" />
</head>
<body>
  <div class="wrapper">
    <header class="home-header">
      <div class="agency-strip">Northline Artist Agency | Portfolio Client Demo</div>
      <div class="home-nav-top">
        <div class="navbar-brand"><a href="index.php">Artist Name Studio</a></div>
      </div>
      <div class="home-nav-row">
        <div class="nav-toggle" role="button" aria-label="Toggle navigation" tabindex="0">
          <span></span><span></span><span></span>
        </div>
        <nav class="navbar-links home-links">
          <a href="index.php" class="<?php echo ($current_page == 'index.php') ? 'active' : ''; ?>">Home</a>
          <a href="artworks.php" class="<?php echo ($current_page == 'artworks.php') ? 'active' : ''; ?>">Artworks</a>
          <a href="merchandise.php" class="<?php echo ($current_page == 'merchandise.php') ? 'active' : ''; ?>">Shop</a>
          <a href="about.php" class="<?php echo ($current_page == 'about.php') ? 'active' : ''; ?>">About</a>
        </nav>
        <a href="basket.php" class="basket-link home-basket <?php echo ($current_page == 'basket.php') ? 'active' : ''; ?>">
          <span>Basket</span>
          <span class="basket-count"><?php echo isset($_SESSION['basket']) ? array_sum($_SESSION['basket']) : '0'; ?></span>
        </a>
      </div>
    </header>