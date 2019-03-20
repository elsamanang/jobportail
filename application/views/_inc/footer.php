<footer class="page-footer blue-grey">
    <div class="footer-copyright center">
        <div class="container">
            © <?php echo Date('Y');?> Designed By
            <a class="grey-text text-lighten-4" href="https://github.com/robenkr">Roben</a>
        </div>
    </div>
</footer>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('.collapsible');
        var instances = M.Collapsible.init(elems);

        var elems = document.querySelectorAll('select');
        var instances = M.FormSelect.init(elems);

        var elems = document.querySelectorAll('.datepicker');
        var options = {
            format: "yyyy-mm-dd"
        };
        var instances = M.Datepicker.init(elems, options);
    });
</script>
</body>
</html>