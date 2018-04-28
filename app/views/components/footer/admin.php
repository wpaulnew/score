<div class="admin-footer-menu">
    <div class="admin-footer-menu-elements">
        <a href="/admin/orders" class="admin-menu-link <?php echo $_SERVER["REQUEST_URI"] == "/admin/orders" ? 'admin-active-link' : '' ?>">Заказы</a>
        <a href="/admin/clients" class="admin-menu-link <?php echo $_SERVER["REQUEST_URI"] == "/admin/clients" ? 'admin-active-link' : '' ?>"">Клиенты</a>
        <a href="/admin/products" class="admin-menu-link <?php echo $_SERVER["REQUEST_URI"] == "/admin/products" ? 'admin-active-link' : '' ?>"">Продукты</a>
        <a href="/admin/exit" class="admin-menu-link">Выход</a>
        <?php
        $_SERVER["REQUEST_URI"] == "/admin/products" ? "1" : "2"
        ?>
    </div>
</div>