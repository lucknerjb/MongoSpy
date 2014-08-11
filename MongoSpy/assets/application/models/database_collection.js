var MongoSpy = window.MongoSpy || {};

MongoSpy.Models.DatabaseCollection = Backbone.Model.extend({
  defaults: {
    name: '',
    database: '',
    records: []
  }
});
