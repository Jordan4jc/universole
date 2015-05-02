/*global module:false*/
module.exports = function(grunt) {

  // Project configuration.
  grunt.initConfig({
    // Task configuration.
    sass: {
      dev: {
        options: {
          style: 'expanded'
        },
        files: [{
          expand: true,
          cwd: 'src/sass',
          src: ['**/*.scss'],
          dest: '.',
          ext: '.css'
        }]
      }
    },
    coffee: {
      dev: {
        files: [{
          expand: true,
          cwd: 'src/coffee',
          src: ['**/*.coffee'],
          dest: 'js',
          ext: '.js'
        }]
      }
    },
    autoprefixer: {
      css: {
        src: 'style.css',
        dest: 'style.css'
      }
    },
    watch: {
      options: {
        livereload: true,
      },
      sass: {
        files: ['src/sass/**/*.scss'],
        tasks: ['sass:dev','autoprefixer']
      },
      coffe: {
        files: ['src/coffee/**/*.coffee'],
        tasks: ['coffee:dev']
      },
      livereload: {
        // Here we watch the files the sass task will compile to
        // These files are sent to the live reload server after sass compiles to them
        files: ['style.css','*.php','js/*.js'],
      },
    },
  });

  // These plugins provide necessary tasks.
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-contrib-sass');
  grunt.loadNpmTasks('grunt-contrib-coffee');
  grunt.loadNpmTasks('grunt-autoprefixer');

  // Default task.
  grunt.registerTask('default', ['watch']);

};
