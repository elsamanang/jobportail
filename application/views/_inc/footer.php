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

        var elems = document.querySelectorAll('.modal');
        var instances = M.Modal.init(elems);

        var elems = document.querySelectorAll('.datepicker');
        var options = {
            format: "yyyy-mm-dd"
        };
        var instances = M.Datepicker.init(elems, options);

        var elems = document.querySelectorAll('.tooltipped');
        var instances = M.Tooltip.init(elems, options);

        var elems = document.querySelectorAll('.sidenav');
        var instances = M.Sidenav.init(elems);
  });
    });
</script>
<!-- Pour l'affiche du Toast de message -->
<script>
    (function () {
        <?php if(isset($this->session->message)){?>
            var msg = '<?php echo $this->session->message?>';
            M.toast({html: msg});
        <?php }?>;

    })();
</script>
</body>
</html>