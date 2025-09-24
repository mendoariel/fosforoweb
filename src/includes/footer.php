    </main>

    <!-- Footer -->
    <footer class="footer">
        <div class="footer-container">
            <div class="footer-section">
                <h3>Fosforo Web</h3>
                <p>Encendemos tu presencia online</p>
                <div class="social-links">
                    <a href="#" class="social-link">Facebook</a>
                    <a href="#" class="social-link">Twitter</a>
                    <a href="#" class="social-link">LinkedIn</a>
                    <a href="#" class="social-link">Instagram</a>
                </div>
            </div>
            <div class="footer-section">
                <h4>Servicios</h4>
                <ul>
                    <li><a href="servicios.php">Diseño Web</a></li>
                    <li><a href="servicios.php">Marketing Digital</a></li>
                    <li><a href="servicios.php">SEO</a></li>
                    <li><a href="servicios.php">E-commerce</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h4>Empresa</h4>
                <ul>
                    <li><a href="about.php">Nosotros</a></li>
                    <li><a href="portfolio.php">Portfolio</a></li>
                    <li><a href="blog/">Blog</a></li>
                    <li><a href="contacto.php">Contacto</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h4>Contacto</h4>
                <p>Email: <?php echo SITE_EMAIL; ?></p>
                <p>Teléfono: +54 11 1234-5678</p>
                <p>Dirección: Buenos Aires, Argentina</p>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; <?php echo date('Y'); ?> Fosforo Web. Todos los derechos reservados.</p>
        </div>
    </footer>

    <!-- JavaScript -->
    <script src="assets/js/main.js"></script>
    <script src="assets/js/admin.js"></script>
    
    <!-- Scripts adicionales por página -->
    <?php if(isset($additional_scripts)): ?>
        <?php foreach($additional_scripts as $script): ?>
            <script src="<?php echo $script; ?>"></script>
        <?php endforeach; ?>
    <?php endif; ?>
</body>
</html>
