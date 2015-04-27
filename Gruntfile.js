module.exports = function(grunt) {
	grunt.initConfig({
		pkg: grunt.file.readJSON('package.json'),
		sass: {
			dist: {
				files: {
					'assets/css/app.css' : 'assets/sass/app.scss'
				}
			}
		},
		concat: {
		  js: {
		    src: 'assets/js/vendor/*.min.js',
		    dest: 'assets/js/plugins.min.js'
		  },
		  css: {
		    src: 'assets/css/vendor/*.min.css',
		    dest: 'assets/css/plugins.min.css'
		  }
		},
		autoprefixer: {
			dist: {
				options: {
					browsers: ['last 1 version', '> 1%', 'ie 8']
				},
				files: {
					'assets/css/app.css': ['assets/css/app.css']
				}
			}
		},
		cssmin: {
			target: {
			    files: [{
			      expand: true,
			      cwd: 'assets/css',
			      src: ['*.css', '!*.min.css'],
			      dest: 'assets/css',
			      ext: '.min.css'
			    }]
		 	}
		},
		uglify: {
		    js: {
		      files: {
		        'assets/js/app.min.js': ['assets/js/app.js']
		      }
		    }
		},
		watch: {
			css: {
				files: ['assets/**/*.{scss,sass}'],
				tasks: ['sass'],
				options: {
					livereload: false
				}
			},
			autoprefixer: {
				files: ['assets/css/app.css'],
				tasks: ['autoprefixer']
			},
			cssmin: {
				files: ['assets/css/app.css'],
				tasks: ['cssmin']
			},
			concat: {
				files: ['assets/css/vendor/*.min.css', 'assets/js/vendor/*.min.js'],
				tasks: ['concat']
			},
			jsmin : {
				files: ['assets/js/app.js'],
				tasks: ['uglify']
			}
		}
	});
	grunt.loadNpmTasks('grunt-contrib-sass');
	grunt.loadNpmTasks('grunt-autoprefixer');
	grunt.loadNpmTasks('grunt-contrib-uglify');
	grunt.loadNpmTasks('grunt-contrib-concat');
	grunt.loadNpmTasks('grunt-contrib-cssmin');
	grunt.loadNpmTasks('grunt-contrib-watch');

	grunt.registerTask('default', ['watch']);

}