module.exports = function(grunt) {
  grunt.initConfig({
    // pkg: grunt.file.readJSON('package.json'),

    handlebars: {
      options: {
        commonjs: true,
        namespace: 'MongoSpy.Templates',
        processName: function(filePath) {
          return filePath.replace(/^assets\/application\/templates\//, '').replace(/\.hbs$/, '');
        }
      },
      all: {
        files: {
          'assets/application/templates.js': ['assets/application/templates/**/*.hbs']
        }
      }
    }
  });

  grunt.loadNpmTasks('grunt-contrib-handlebars');
};
