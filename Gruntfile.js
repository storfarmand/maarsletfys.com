module.exports = function(grunt) {

  // Project configuration.
  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),
    watch: {
      livereload: {
        options: { livereload: true },
        files: ["css/main.css", "*.html", "js/*.js"]
      },
      scripts: {
        files: ["js/*.js"],
        tasks: []
      },
      less: {
        files: ["less/*.less"],
        tasks: ["less"],
        options: {
          nospawn: true
        }
      }
    },
    less: {
      default: {
        options: {
          paths: ['assets/css'],
          plugins: [
            new (require('less-plugin-autoprefix'))({browsers: ["last 2 versions"]}),
            new (require('less-plugin-clean-css'))(
              {
                level: {
                  2: {
                    all: false,
                    removeDuplicateRules: true
                  }
                }
              }
            )
          ],
        },
        files: {
          'css/main.css': 'less/main.less'
        }
      }
    }
  });

  grunt.loadNpmTasks('grunt-contrib-less');
  grunt.loadNpmTasks('grunt-contrib-watch');

  grunt.registerTask('default', ['watch']);

};
