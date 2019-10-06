    <div class="container footer">
      <footer>
        <p align="right">
        <?php
                if (!isset($_SESSION['username'])) {
                    echo '<a class="nav-link" href="staff.php">Staff Login</a>
                  </li>';
                }
        ?>
        </p>
        <p align="right">
        <a href="">Bradley Projects</a> - <?php echo date('Y'); ?>
        </nav>
		</p>
      </footer>
    </div>
  </body>
</html>
