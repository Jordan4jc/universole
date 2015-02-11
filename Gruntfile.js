/*global module:false*/
module.exports = function(grunt) {

  // Project configuration.
  grunt.initConfig({
    // Metadata.
    pkg: grunt.file.readJSON('package.json'),
    banner: '/*! <%= pkg.title || pkg.name %> - v<%= pkg.version %> - ' +
      '<%= grunt.template.today("yyyy-mm-dd") %>\n' +
      '<%= pkg.homepage ? "* " + pkg.homepage + "\\n" : "" %>' +
      '* Copyright (c) <%= grunt.template.today("yyyy") %> <%= pkg.author.name %>;' +
      ' Licensed <%= _.pluck(pkg.licenses, "type").join(", ") %> */\n',
    // Task configuration.
    watch: {
      options: {
        livereload: true
      },
      sass: {
        files: '**/*.scss',
        tasks: ['sass:dev']
      },
      coffee: {
        files: 'scripts/*.coffee',
        tasks: ['coffee:dev']
      }
    },
    sass: {
      dev: {
        options: {
          style: 'expanded',
          loadPath: 'sass',
          compass: true
        },
        files: [{
          expand: true,
          src: ['*.scss'],
          dest: './',
          ext: '.css'
        }]
      }
    },
    coffee: {
      dev: {
        options: {
          sourceMap: true
        },
        files: [{
          expand: true,
          cwd: 'scripts',
          src: ['*.coffee'],
          dest: 'js',
          ext: '.js'
        }]
      }
    },
    concat: {
      options: {
        banner: '<%= banner %>',
        stripBanners: true
      },
      dist: {
        src: ['lib/<%= pkg.name %>.js'],
        dest: 'dist/<%= pkg.name %>.js'
      }
    },
    uglify: {
      options: {
        banner: '<%= banner %>'
      },
      dist: {
        src: '<%= concat.dist.dest %>',
        dest: 'dist/<%= pkg.name %>.min.js'
      }
    },
    browserSync: {
      dev: {
        bsFiles: {
            src : '*.css'
        },
        options: {
            watchTask: true, // < VERY important
            proxy: "localhost"
        }
      }
    }
  });

  // These plugins provide necessary tasks.
  grunt.loadNpmTasks('grunt-contrib-sass');
  grunt.loadNpmTasks('grunt-contrib-coffee');
  grunt.loadNpmTasks('grunt-contrib-concat');
  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-browser-sync');

  // Default task.
  grunt.registerTask('default', ["browserSync", "watch"]);

};
