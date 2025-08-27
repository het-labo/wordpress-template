<script>
    // Toon sub-menu enkel wanneer hover over parent link:
    document.addEventListener('DOMContentLoaded', function () {
        const parents = document.querySelectorAll('.menu-item-has-children');

        parents.forEach(function (item) {
          const submenu = item.querySelector('.sub-menu');
          if (!submenu) return;

          // Hide submenu initially
          submenu.style.display = 'none';

          // Show on hover
          item.addEventListener('mouseenter', () => {
            submenu.style.display = 'block';
          });

          item.addEventListener('mouseleave', () => {
            submenu.style.display = 'none';
          });
        });
    });
</script>



<?php wp_footer(); ?>
</body>
</html>