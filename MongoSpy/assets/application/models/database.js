var MongoSpy = window.MongoSpy || {};

MongoSpy.Models.Database = Backbone.Model.extend({
  defaults: {
    name: '',
    selected: false,
    collections: []
  }
});
