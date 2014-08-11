<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>MongoSpy | Spy on your Mongos!</title>

    <!-- Bootstrap core CSS -->
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/assets/css/dashboard.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">MongoSpy</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#">Dashboard</a></li>
            <li><a href="#">Settings</a></li>
            <li><a href="#">Profile</a></li>
            <li><a href="#">Help</a></li>
          </ul>
          <form class="navbar-form navbar-right">
            <input type="text" class="form-control" placeholder="Search...">
          </form>
        </div>
      </div>
    </div>

    <div id="content" class="container-fluid">
      <div id="sidebar" class="col-sm-3 col-md-2 sidebar"></div>
      <div id="app-content" class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main"></div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="/assets/js/vendors/underscore.min.js"></script>
    <script src="/assets/js/vendors/bootstrap.min.js"></script>
    <script src="/assets/js/vendors/backbone.min.js"></script>
    <script src="/assets/js/vendors/backbone.wreqr.min.js"></script>
    <script src="/assets/js/vendors/backbone.babysitter.min.js"></script>
    <script src="/assets/js/vendors/backbone.marionette.min.js"></script>
    <script src="/assets/js/vendors/handlebars.js"></script>


    <!-- Load Application -->
    <script src="/assets/js/mongospy.js"></script>

    <!-- Templates -->
    <script src="/assets/application/templates/application.js"></script>
    <script src="/assets/application/templates/dashboard.js"></script>

    <!-- Models -->
    <script src="/assets/application/models/database.js"></script>
    <script src="/assets/application/models/database_collection.js"></script>
    <script src="/assets/application/models/collection_record.js"></script>

    <!-- Collections -->
    <script src="/assets/application/collections/databases.js"></script>
    <script src="/assets/application/collections/database_collections.js"></script>
    <script src="/assets/application/collections/collection_records.js"></script>

    <!-- Item Views -->
    <script src="/assets/application/views/main/sidebar_item.js"></script>

    <!-- Views -->
    <script src="/assets/application/views/layouts/main.js"></script>
    <script src="/assets/application/views/layouts/dashboard.js"></script>
    <script src="/assets/application/views/main/sidebar.js"></script>

    <!-- Routers -->
    <script src="/assets/application/routers/main.js"></script>

    <!-- Load Views -->

    <script type="text/javascript">
      // Start application
      MongoSpy.start();
    </script>
  </body>
</html>
