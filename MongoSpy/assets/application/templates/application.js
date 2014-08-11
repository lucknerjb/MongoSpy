var MongoSpy = window.MongoSpy || {};
MongoSpy.Templates.Main = {};

MongoSpy.Templates.Main.Layout = ' \
  <div id="sidebar" class="col-sm-3 col-md-2 sidebar"></div> \
  <div id="app-content" class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main"></div> \
';

MongoSpy.Templates.Main.SidebarItem = ' \
  <a href="javascript:void(0);">{{name}}</a> \
';
