<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>elFinder 2.0</title>

    <!-- jQuery and jQuery UI (REQUIRED) -->
    <script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
    <link href="http://cdn.bootcss.com/jqueryui/1.12.0/jquery-ui.min.css" rel="stylesheet">
    <script src="http://cdn.bootcss.com/jqueryui/1.12.0/jquery-ui.min.js"></script>

    <!-- elFinder CSS (REQUIRED) -->
    <link rel="stylesheet" type="text/css" href="<?= asset($dir . '/css/elfinder.min.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= asset($dir . '/css/theme.css') ?>">

    <!-- elFinder JS (REQUIRED) -->
    <script src="<?= asset($dir . '/js/elfinder.min.js') ?>"></script>

    <?php if ($locale)
    { ?>
        <!-- elFinder translation (OPTIONAL) -->
        <script src="<?= asset($dir . "/js/i18n/elfinder.$locale.js") ?>"></script>
    <?php } ?>
    <!-- Include jQuery, jQuery UI, elFinder (REQUIRED) -->

    <script type="text/javascript">
        $().ready(function () {
            var elf = $('#elfinder').elfinder({
                // set your elFinder options here
                <?php if($locale){ ?>
                    lang: '<?= $locale ?>', // locale
                <?php } ?>
                customData: { 
                    _token: '<?= csrf_token() ?>'
                },
                url: '<?= route("elfinder.connector") ?>',  // connector URL
                dialog: {width: 900, modal: true, title: 'Select a file'},
                resizable: false,
                commandsOptions: {
                    getfile: {
                        oncomplete: 'destroy'
                    }
                },
                getFileCallback: function (file) {
                    window.parent.processSelectedFile(file.path, '<?= $input_id?>');
                    parent.jQuery.colorbox.close();
                }
            }).elfinder('instance');
        });
    </script>


</head>
<body>
<!-- Element where elFinder will be created (REQUIRED) -->
<div id="elfinder"></div>

</body>
</html>
