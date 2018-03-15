module.exports = function(grunt) {
    
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),
        sass: {
            dist: {
                options: {
                  style: 'nested'
                },
                files: {
                    'css/app.css' : 'scss/app.scss',
                    'css/editor_style.css' : 'scss/editor_style.scss'
                }
            }
        },
        uglify: {
            options: {
             mangle: true,
              compress: {
                drop_console: true
              }
            },
            my_target: {
                options: {
                    beautify: false
                },
                files: {
                    'js/build/production.min.js': [
                        'js/helper_functions.js',
                        'js/logo.js',
                        'js/dropdown_menus.js',
                        'js/horizontal_navigation.js',
                        'js/picturefill.js',
                        'js/plugins/fitvids.js',
                        'js/app.js'
                    ]
                }
            }
        },
        watch: {
            css: {
                files: '**/*.scss',
                tasks: ['sass']
            },
            js: {
                files: 'js/*.js',
                tasks: ['uglify']
            },
            livereload: {
                files: ['*.html', '../**/*.php', 'js/**/*.{js,json}', 'css/*.css','img/**/*.{png,jpg,jpeg,gif,webp,svg}'],
                options: {
                    livereload: 123456
                }
            }
        }
    });
    grunt.loadNpmTasks('grunt-livereload');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-sass');
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.registerTask('default', [ 'watch' ]);

};