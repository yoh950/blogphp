<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8" />
        <title><?= $title ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link href="public/css/style.css" rel="stylesheet" /> 
        <script src="https://cdn.tiny.cloud/1/bapu90w3nfclp0ubtp4o751mprbglbkha0xa3d02m5ccrs7y/tinymce/5/tinymce.min.js" referrerpolicy="origin"/></script>
        <script>
            tinymce.init({
                selector: '#content',
                language: 'fr_FR',
                elementpath: false, 
                menubar: false
            });
        </script>
    </head>
        
    <body>
    <div class="jumbotron" style="border-bottom: 10px double; border-top: 5px solid grey; background-color: white">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-10 text-center">
                    <h1>Les lettres de Forteroche</h1>
                    <h2>Billet simple pour l'Alaska</h2>
                </div>
                <div class="col-6 col-lg-1">
                    <?php if(isset($menu)){
                        echo $menu;
                    } ?>
                </div>
                <div class="col-6 col-lg-1">
                    <?php if(isset($secondMenu)){
                        echo $secondMenu;
                    } ?>
                </div>
            </div>
        </div>
        
</div>
        <?= $content ?>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </body>
</html>