module.exports = function(grunt) {

  // 1. All configuration goes here
  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),

    imagemin: {
      dynamic: {
        files: [{
          expand: true,
          cwd: 'resources/assets/images/',
          src: ['**/*.{png,jpg,gif}'],
          dest: '../public_html/site_assets/images/'
        }]
      }
    },


    sass: {
      dist: {
        options: {
          style: 'compressed'
        },
        files: {
          '../public_html/site_assets/css/site.css': 'resources/assets/stylesheets/site.scss'
        }
      }
    },

    concat: {
      dist: {
        src: ['resources/assets/javascripts/bootstrap/*.js', 'resources/assets/javascripts/*.js'],
        dest: 'resources/assets/javascripts/build/site.js'
      }

    },

    uglify: {
      build: {
        src: 'resources/assets/javascripts/build/site.js',
        dest: '../public_html/site_assets/js/site.min.js'
      }
    },

    watch: {
      scripts: {
        files: ['resources/assets/javascripts/bootstrap/*.js', 'resources/assets/javascripts/*.js'],
        tasks: ['concat', 'uglify'],
        options: {
          spawn: false,
        },
      },

      css: {
        files: ['resources/assets/stylesheets/theme1/*.scss', 'resources/assets/stylesheets/*.scss'],
        tasks: ['sass'],
        options: {
          spawn: false,
        }
      }
    }




  });

  // 3. Where we tell Grunt we plan to use this plug-in.
  grunt.loadNpmTasks('grunt-contrib-concat');
  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-contrib-imagemin');
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-contrib-sass');

  // 4. Where we tell Grunt what to do when we type "grunt" into the terminal.
  grunt.registerTask('default', ['concat', 'uglify', 'imagemin', 'sass', 'watch']);

};
