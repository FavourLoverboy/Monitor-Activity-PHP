    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <script>
        // REFRESH ADMIN NOTIFICATION LOG EVERY 3 SECONDS
        $(document).ready(() => {
            $('#refresh-admin-notification-log').load("refreshLog.php");
            setInterval(() => {
                $('#refresh-admin-notification-log').load("refreshLog.php");
            }, 3000);
        });
    </script>
    </body>
</html>